<?php

session_start();

//error_reporting(E_ALL);

//header("Cache-control: private");


if($_POST['Submit']){
	$allempty = false;
	foreach ($_POST as $p) {
		if (empty($p)) $allempty = true;
	}
	if (!$allempty){
    include_once "../dbase.php";
	include_once "../settings.php";
	
	$errorMsg = "";
	$username = $_POST['UserName'];
	if (!get_magic_quotes_gpc()){
		$username = addslashes($username);
	}
	
	$result = mysql_query("SELECT user FROM chatusers WHERE user='$username'") or die(mysql_error());
  
	if (mysql_num_rows($result)==1) $errorMsg="Username exists, please choose another one!";
	if(md5($_POST['Password1'])!=md5($_POST['Password2'])) $errorMsg="Passwords do not match";
	if(strlen($_POST['UserName'])< 6 || strlen($_POST['UserName'])>8) $errorMsg="Username must be 6 to 8 characters long and may not contain spaces.";
	if(strlen($_POST['Password1'])< 6 || strlen($_POST['Password1'])> 8) $errorMsg="Passwords must be 6 to 8 characters long and may not contain spaces.";
	//if (preg_match("/^[a-z0-9]+?\.
	if ($errorMsg == ""){
		$dateRegistered=time();
		$currentTime=date("YmdHis");
		$userId=md5("$currentTime".$_SERVER['REMOTE_ADDR']);
		$db_pass=md5($_POST['Password1']);
		
		$_SESSION['UID']=$userId;
		$_SESSION['email']=$_POST['Email'];
		$_SESSION['password']=$_POST['Password1'];
		$_SESSION['emailtype']=$_POST['emailtype'];
		
		$subject = "Your account activation at $siteurl"; 
	
		if ($_POST['emailtype']=="text"){
			$message = "Thank you for registering at $siteurl. \n
			
			In order to activate your newly created account clcik on or copy and paste the link below in your browser:
			
			 $siteurl/actm.php?UID=$userId 
			 
			 Once you activate your membership you will recieve an email with your login information.\n\n
			
			Thanks!
			The Webmaster
			
			This is an automated response, please do not reply!";
		}
		else if($_POST['emailtype']=="html"){
			$message = "Thank you for registering at $siteurl
			 
			In order to activate your newly created account click on or copy and paste the link below in your browser:
			<br><br>
			<a href='$siteurl/actm.php?UID=$userId'>$siteurl/actm.php?UID=$userId</a><br><br>
			Once you activate your membership you will recieve an email with your login information.<br><br>
			Thanks! <br>
			The Webmaster <br>
			This is an automated response, please do not reply!<br>";
		}
		
		include_once("../settings.php");
		$header = "From: ".$registrationemail; 
		mail($_POST['Email'], $subject, $message,$header);
		
		mysql_query("INSERT INTO chatusers ( id , user , password , email , name , country , state , city, phone, zip , adress , dateRegistered,lastLogIn, emailnotify ,smsnotify,status,emailtype ) VALUES ('$userId','$username', '{$_POST['Password1']}', '{$_POST['Email']}', '{$_POST['Name']}', '{$_POST['Country']}', '{$_POST['State']}','{$_POST['City']}','{$_POST['phone']}', '{$_POST['ZipCode']}', '{$_POST['Adress']}', '$dateRegistered', '$currentTime','0','0','pending','{$_POST['emailtype']}')") or die(mysql_error());
		header("Location: userregistered.php");
	}}
}
?>
 <? 
 include("_reg.header.php");
 ?>
<style type="text/css">
<!--



body,td,th {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
}
body {
	background-color: #8F0000;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	color: #FFFFFF;
	text-decoration: none;
}
a:hover {
	color: #ECE9D8;
	text-decoration: none;
}
a:active {
	color: #FFFFFF;
	text-decoration: none;
}
#Layer1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 50px;
	top: -114px;
}
a {
	font-size: 11px;
	font-weight: bold;
}
.style1 {font-size: 12px}
.style3 {font-size: 14px}
-->
</style>
<form method="post" name="form1">
<div id="Layer1">
    <tr>

      <td colspan="3" class="form_definitions"><div align="center">
        <? if($_POST['checkbox']!="checkbox"){ echo "<font color=#ffdd54>You must agree with the terms:</font><br>";

}?>
        <br />
      <input name="checkbox" type="checkbox" value="checkbox" checked="checked" <? if( isset($_POST['checkbox']) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>
        
        I Agree with the <a href="memberterms.php" target="_blank" class="left">Terms of Service</a><br>
        
  <br>
        
        Send registration emails as:: 
  <input name="emailtype" type="radio" value="text" checked>
        
        Plain text 
        
  <input name="emailtype" type="radio" value="html">
        
        Html
</div></td>
  </tr></div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="1000" height="746" border="0" align="center" cellpadding="4" cellspacing="0" background="../images/member-registration-bg.png" bgcolor="#8F0000">

    <tr>

      <td class="" height="16" colspan="3"><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="52"><h3 align="left"><span class="small_title"><br />
                  <span class="error"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                  <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>
                  </span> </span></h3>            </td>
        </tr>
      </table></td>
    </tr>

    <tr align="left">

      <td colspan="3" class="style1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3">Login information.</span> </td>
    <tr>

      <td width="191" height="60" align="right" valign="top" class="form_definitions">

		<? 
		if(isset($_POST['UserName']) && $_POST['UserName']=="")
		echo "<font color=#ffdd54>Username*</font>";
		else if(isset($_POST['UserName']) && (strlen(trim($_POST['UserName']))<6 || strlen(trim($_POST['UserName']))>8))
		echo "<font color=#ffdd54>Username*</font>";
		else
		echo"Username*";
		?>      </td>

      <td>
	  <input name="UserName"  value="<? if (isset($_POST['UserName'])){ echo $_POST['UserName']; }  ?>" type="text" id="UserName" size="24" maxlength="8">
	   <p><span class="form_informations style1">Username must be 6 to 8 characters long and may not contain spaces.</span></p>	  </td>

      <td width="286" class="form_informations">&nbsp;</td>
    </tr>

    <tr>

      <td height="60" align="right" valign="top" class="form_definitions">

	    <p>
	   <? 
		if(isset($_POST['Password1']) && $_POST['Password1']=="")
		echo "<font color=#ffdd54>Password*</font>";
		else if(isset($_POST['Password1']) && (strlen(trim($_POST['Password1']))<6 || strlen(trim($_POST['Password1']))>8))
		echo "<font color=#ffdd54>Password*</font>";
		else
		echo"Password*";
		?>
	    </p>
      <p>&nbsp;	        </p></td>

      <td><p>
  <input name="Password1" type="password" id="Password1" size="24" maxlength="8">
  </p>
      <p><span class="form_informations style1">Password must be 6 to 8 characters long and may not contain spaces.</span></p></td>

      <td class="form_informations">&nbsp;</td>
    </tr>

    <tr>

      <td height="30" align="right" valign="top" class="form_definitions">

	  <? if(isset($_POST['Password2']) && $_POST['Password2']==""){

		  echo "<font color=#ffdd54>Re-type Password*</font>";

	 	 } else{

	 	 echo"Re-type Password*";

	  }?>	  </td>

      <td valign="top"><input name="Password2" type="password" id="Password2" size="24" maxlength="8"></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td height="84" align="right" class="form_definitions">

	  <? if(isset($_POST['Email']) && $_POST['Email']==""){

		  echo "<font color=#ffdd54>E-mail*</font>";

	 	 } else{ echo"E-mail*";} 

	  ?>	  </td>

      <td><input name="Email" value="<? if (isset($_POST['Email'])){ echo $_POST['Email']; }  ?>" type="text" id="Email" size="24" maxlength="48"></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td height="35" align="right">&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td class="" colspan="3">&nbsp;</td>
    </tr>

    <tr align="left">

      <td colspan="3" class="form_definitions">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3">Personal Information (Only we see this)</span> </td>
    </tr>

    <tr>

      <td align="right" class="form_definitions"><? if(isset($_POST['Name']) && $_POST['Name']==""){

		  echo "<font color=#ffdd54>Full Name*</font>";

	 	 } else{ echo"Full Name*";}

	  	  ?>	  </td>

      <td><input name="Name" value="<? if (isset($_POST['Name'])){ echo $_POST['Name']; }  ?>" type="text" id="Name" size="24" maxlength="24"></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td align="right" class="form_definitions">Country*</td>

      <td width="499">

	  <select name="Country" id="Country">

          <?

		  include ("../dbase.php");

include ("../settings.php");

		$result = mysql_query('SELECT * FROM countries ORDER BY id');

    	while($row = mysql_fetch_array($result)) {

		echo"<option value='$row[id]'";

		if (isset($_POST['Country']) && $_POST['Country']==$row['id']){

		echo "selected";

		}

		

		echo ">$row[name]</option>";

		}

		  mysql_free_result($result);

		  

		  ?>
      </select>	  </td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td align="right" class="form_definitions"><? if(isset($_POST['State']) && $_POST['State']==""){

		  echo "<font color=#ffdd54>State*</font>";

	 	 } else{ echo"State*";}

	  	  ?>	  </td>

      <td><input name="State" value="<? if (isset($_POST['State'])){ echo $_POST['State']; } ?>" type="text" id="State" size="24" maxlength="24"></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td align="right" class="form_definitions">

	  <? if(isset($_POST['City']) && $_POST['City']==""){

		  echo "<font color=#ffdd54>City*</font>";

	 	 } else{ echo"City*";}

	  	  ?>	  </td>

      <td><input name="City" value="<? if (isset($_POST['City'])){ echo $_POST['City']; } ?>" type="text" id="City" size="24" maxlength="24"></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td align="right" class="form_definitions">

        <? if(isset($_POST['ZipCode']) && $_POST['ZipCode']==""){

		  echo "<font color=#ffdd54>Zip Code*</font>";

	 	 } else{ echo"Zip Code*";}

	  	  ?>      </td>

      <td><input name="ZipCode" value="<? if (isset($_POST['ZipCode'])){ echo $_POST['ZipCode']; }  ?>" type="text" id="ZipCode" size="24" maxlength="24"></td>

      <td>&nbsp;</td>
    </tr>

    

    <tr>

      <td height="115" align="right">&nbsp;</td>

      <td valign="top"><div align="center">
        <p align="left">
          <input type="submit" name="Submit" value="I am at least 18 years of age" />
        </p>
        <p>&nbsp;</p>
      </div></td>

      <td>&nbsp;</td>
    </tr>
  </table>

</form>

	  <?
include("_reg.footer.php");
?>