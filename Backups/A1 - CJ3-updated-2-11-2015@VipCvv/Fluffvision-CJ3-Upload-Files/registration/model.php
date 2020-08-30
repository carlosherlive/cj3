<?php
session_start();
?>
<?php


$errorMsg="";



if($_POST['UserName']!="" && $_POST['Password1']!="" && $_POST['Password2']!="" && $_POST['Email']!="" && $_POST['Name'] !="" && $_POST['Country'] !="" && $_POST['State'] !="" && $_POST['City'] !=""&& $_POST['ZipCode'] !="" && $_POST['Adress'] !=""  &&  $_POST['phone']!="" && $_FILES['ActImage']['tmp_name']!="" && $_FILES['RImage']['tmp_name']!="" && $_POST['checkbox']!="" && $_POST['L1'] != "" && $_POST['day'] != "" && $_POST['month'] != "" && $_POST['year'] != ""){



	//database settings and connection

	include("../dbase.php");

	include("../settings.php");



	

	//check if we have a user with the same username

	$replacevalues = array('&','/'," ","?","+","%","$","#","@");

	$username=str_replace($replacevalues,"", $_POST['UserName']);

	$result = mysql_query("SELECT user FROM chatmodels WHERE user='$username'");

	if (mysql_num_rows($result)>=1){

	//if username already exists

		$errorMsg.="Username exists, please choose another one!<br>";

	} else {

		if($_POST['Password1']!=$_POST['Password2']) {

		//if passwords do not match

			$errorMsg.="<br>Passwords do not match<br>";

		}

		if(strlen($_POST['Password1'])<6){

		//if password length is less than 6

			$errorMsg.="<br>Passwords must be at least 6 characters long<br>";

		}

		//if we can not m,ake the dir

		@rmdir("../models/".$username."/");

		@mkdir("../models/".$username."/");

		

		

		$dateRegistered=time();

		$currentTime=date("YmdHis");

		$userId=md5("$currentTime".$_SERVER['REMOTE_ADDR']);

		$urlIdentityImage="../models/".$username."/".$userId.".jpg";

		$urlRImage="../models/".$username."/representative.jpg";


		if($_FILES['ImageFile']['tmp_name']!="" && isset($_POST['L1'])){
			//we copy the thumbail image

			$urlThumbnail="../models/".$username."/thumbnail.jpg";

			/*if (!copy($_FILES['ImageFile']['tmp_name'],$urlThumbnail))

			{

				$errorMsg='Thumbnail image file could not be copied, please try again.';

			}*/
if ($check=getimagesize($_FILES['ImageFile']['tmp_name']))

		{
$src=imagecreatefromstring(file_get_contents($_FILES['ImageFile']['tmp_name']));	
$theight=250;
$twidth=200;
$tmp=imagecreatetruecolor($theight,$twidth);
imagecopyresampled($tmp,$src,0,0,0,0,$theight,$twidth,$check[0],$check[1]);
imagejpeg($tmp,$urlThumbnail,100);
		} 


		else

		{		$errorMsg="File not Copied";		}
		}

		

		if(!copy($_FILES['ActImage']['tmp_name'],$urlIdentityImage)){

			$errorMsg.="<br>Could not load ID image to database";

		}

		

		if(!copy($_FILES['RImage']['tmp_name'],$urlRImage)){

			$errorMsg.="<br>Could not load representative image to database";

		}

		}

	

	if($errorMsg==""){

		//user ID

		

		$pass=$_POST['Password1'];

		$db_pass=md5($pass);

		$birthDate = $_POST['day']."/".$_POST['month']."/".$_POST['year'];

			

		$_SESSION['dateregistered']=$dateRegistered;

		$_SESSION['userid']=$userId;

		$_SESSION['userid3']='nasnas';

		$_SESSION['username']=$username;

		$_SESSION['password']=$_POST['Password1'];

		$_SESSION['L1'] = $_POST['L1'];

		$_SESSION['password_encrypted']=$db_pass;

		$_SESSION['name']=$_POST['Name'];

		$_SESSION['email']=$_POST['Email'];

		$_SESSION['country']=$_POST['Country'];

		$_SESSION['state']=$_POST['State'];

		$_SESSION['city']=$_POST['City'];

		$_SESSION['zipcode']=$_POST['ZipCode'];

		$_SESSION['adress']=$_POST['Adress'];

		$_SESSION['phone']=$_POST['phone'];

		$_SESSION['emailtype']=$_POST['emailtype'];

		$_SESSION['birthDate'] = $birthDate;

		session_write_close();

		
mysql_query("insert into chatmodels (id,user,password,email,phone,name,country,state,city,zip,adress,dateRegistered,status,birthDate,language1,category)values('$userId','$username','$db_pass','$_SESSION[email]','$_SESSION[phone]','$_SESSION[name]','$_SESSION[country]','$_SESSION[state]','$_SESSION[city]','$_SESSION[zipcode]','$_SESSION[adress]','$dateRegistered','pending', '$_SESSION[birthDate]', '$_SESSION[L1]','$_POST[Category]')");
		

$dt=date('m/d/Y H:i:s', $_SESSION['dateregistered']);		

$subject="New model registration ($_SESSION[username])";

$charset="Content-type: text/plain; charset=iso-8859-1\r\n";

$message="$_SESSION[username] has just registered at $siteurl

To view the models details use the link below:

$siteurl/admin/subscriptionviewdetails.php?id=$_SESSION[userid]

Date and time registered: $dt ";



		mail($registrationemail, $subject, $message,

     	"MIME-Version: 1.0\r\n".

    	 $charset.

     	"From:'$registrationemail'\r\n".

		"Reply-To:'$registrationemail'\r\n".

    	"X-Mailer:PHP/". phpversion());
header("Location: modelregistered.php");

	}

	

	

}else

{

$errorMsg="You must fill in all required fields marked with a *.";

}

?>
<?php 
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
a {
	font-size: 11px;
	color: #FFFFFF;
	font-weight: bold;
}
a:visited {
	color: #FFFFFF;
}
a:hover {
	color: #ECE9D8;
}
a:active {
	color: #FFFFFF;
}
#Layer1 {
	position:absolute;
	width:352px;
	height:175px;
	z-index:1;
	left: -200px;
	top: -200px;
}
.style5 {font-size: 12px}
-->
</style>

<form action="model.php" method="post" enctype="multipart/form-data" name="form1" target="_self">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div id="Layer1">
    <tr>
      <td colspan="3" class="form_definitions"><div align="center">
          <p>&nbsp; </p>
        <p>
            <? if($_POST[checkbox]!="checkbox"){ echo "<font color=#ffdd54>You must agree with the terms of service to register:</font><br>";

}?>
          </p>
        <p>
            <input name="checkbox" type="checkbox" value="checkbox" checked="checked" <? if( isset($_POST[checkbox]) && $_POST[checkbox]=="checkbox"){echo "checked";}?> />
          I Agree with the <a href="modelterms.php" target="_blank" class="left">Terms of Service </a>.<br />
          <br />
          Send registration email as:
          <input name="emailtype" type="radio" value="text" checked="checked" />
          Plain text
          <input name="emailtype" type="radio" value="html" />
          Html</p>
      </div></td>
    </tr>
  </div>
  <p>&nbsp;</p>
  <table width="1000" height="991" border="0" align="center" cellpadding="0" cellspacing="0" background="../images/model-registration-bg.png">
    <tr class="form_header_title">
      <td height="16" colspan="3" align="center" valign="middle" bgcolor=""><table width="1000" height="808" border="0" align="center" cellpadding="3" cellspacing="0">

    <tr class="form_header_title">

      <td height="16" colspan="3" align="center" valign="middle"><div align="left">
        <p class="error">&nbsp;          </p>
        <p class="error">
           &nbsp;&nbsp;&nbsp;&nbsp;</p>
      </div></td>
    </tr>

    <tr>

      <td height="26" colspan="3" class="form_definitions"><p class="error">&nbsp;</p>
        <p class="error">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>
          </p></td>
    </tr>

    <tr>

      <td width="134" height="28" align="right" valign="top" class="form_definitions">

	  <? if(isset($_POST[UserName]) && $_POST[UserName]==""){

		  echo "<font color=#ffdd54>Username*</font>";

	 	 } else{

	 	 echo"Username*";

	  }?>	  </td>

      <td width="509" align="left" valign="top"> &nbsp;
        <input name="UserName"  value="<? if (isset($_POST[UserName])){ echo $_POST[UserName]; }  ?>" type="text" id="UserName" size="24" maxlength="24"> 
        &nbsp;&nbsp;<span class="form_informations">Username must be between 6 and 8 characters.</span></td>

      <td width="357" align="left" valign="top">&nbsp;</td>
    </tr>

    <tr>

      <td height="28" align="right" valign="top" class="form_definitions">

	  <? if(isset($_POST[Password1]) && $_POST[Password1]==""){

		  echo "<font color=#ffdd54>Password*</font>";

	 	 } else{

	 	 echo"Password*";

	  }?>	  </td>

      <td align="left" valign="top"> &nbsp;
        <input name="Password1" type="password" id="Password1" size="24" maxlength="24"> 
        &nbsp;&nbsp; <span class="form_informations">Password must be between 6 and 8 characters. </span></td>

      <td align="left" valign="top" class="form_informations">&nbsp;</td>
    </tr>

    <tr>

      <td height="28" align="right" valign="top" class="form_definitions">

	  <? if(isset($_POST[Password2]) && $_POST[Password2]==""){

		  echo "<font color=#ffdd54>Password*</font>";

	 	 } else{

	 	 echo"Password*";

	  }?>	  </td>

      <td align="left" valign="top">
        &nbsp;&nbsp;<input name="Password2" type="password" id="Password2" size="24" maxlength="24"></td>

      <td align="left" valign="top">&nbsp;</td>
    </tr>

    <tr>

      <td height="86" align="right" valign="top" class="form_definitions">

	  <? if(isset($_POST[Email]) && $_POST[Email]==""){

		  echo "<font color=#ffdd54>E-mail*</font>";

	 	 } else{ echo"E-mail*";} 

	  ?>	  </td>

      <td align="left" valign="top">
        &nbsp;&nbsp;<input name="Email" value="<? if (isset($_POST[Email])){ echo $_POST[Email]; }  ?>" type="text" id="Email" size="24" maxlength="24"></td>

      <td align="left" valign="top" class="form_informations">&nbsp;</td>
    </tr>

  <!--</table></td>
    </tr>-->
    <tr>
      <td width="133" height="28" align="right" class="form_definitions"><? if(isset($_POST[Name]) && $_POST[Name]==""){

		  echo "<font color=#ffdd54>Full Name*</font>";

	 	 } else{ echo"Full Name*";}

	  	  ?>      </td>
      <td width="510" align="left">&nbsp;
        <input name="Name" value="<? if (isset($_POST[Name])){ echo $_POST[Name]; }  ?>" type="text" id="Name" size="24" maxlength="24" /></td>
      <td width="357">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" class="form_definitions"><? if(isset($_POST['day']) && $_POST['day'] == "") { echo "<font color=#ffdd54>"; }?>Date of Birth*</td>

      <td align="left">&nbsp;&nbsp;<select name="day" id="day">

          <?

		  for($i=1; $i<=31; $i++)

		  {
			if ($i<9)
			{
				$a = $i;
				$i='0'.$i;
			}
		  echo "<option value='$i'";

		  if ($_POST[day]==$i){ echo "selected";}

		  echo">$i</option>";
			if ($i<9)
				$i = $a;
		  }

		  ?>

      </select>

        <select name="month" id="month">

          <option value="Jan" <? if ($_POST[month]=="January"){ echo "selected";} else if (!isset($_POST[month])){ echo "selected";}?>>January</option>

          <option value="Feb" <? if ($_POST[month]=="February"){ echo "selected";}?>>February</option>

          <option value="Mar" <? if ($_POST[month]=="March"){ echo "selected";}?>>March</option>

		  <option value="Apr" <? if ($_POST[month]=="April"){ echo "selected";}?>>April</option>

          <option value="May" <? if ($_POST[month]=="May"){ echo "selected";}?>>May</option>  

          <option value="Jun" <? if ($_POST[month]=="June"){ echo "selected";}?>>June</option>

          <option value="Jul" <? if ($_POST[month]=="July"){ echo "selected";}?>>July</option>

          <option value="Aug" <? if ($_POST[month]=="August"){ echo "selected";}?>>August</option>

          <option value="Sep" <? if ($_POST[month]=="September"){ echo "selected";}?>>September</option>

          <option value="Oct" <? if ($_POST[month]=="October"){ echo "selected";}?>>October</option>

          <option value="Nov" <? if ($_POST[month]=="November"){ echo "selected";}?>>November</option>

          <option value="Dec" <? if ($_POST[month]=="December"){ echo "selected";}?>>December</option>
        </select>

        <select name="year" id="year">

          <?

		  for($i=1950; $i<=date(Y)-18; $i++)

		  {

		  echo "<option value='$i'";

		   if ($_POST[year]==$i){ echo "selected";}

		  echo ">$i</option>";

		  }

		  

		  ?>
        </select>	  </td>

      <td>&nbsp;</td>
    </tr>

    <tr>
      <td align="right" class="form_definitions">Country*</td>
      <td align="left">&nbsp;&nbsp;<select name="Country" id="Country">
          <?

		include ("../dbase.php");

		include ("../settings.php");

		$result = mysql_query('SELECT * FROM countries ORDER BY id');

    	while($row = mysql_fetch_array($result)) {

		echo"<option value='$row[id]'";

		if (isset($_POST[Country]) && $_POST[Country]==$row[id]){

		echo "selected";

		}

		

		echo ">$row[name]</option>";

		}

		  

		  

		  ?>
        </select>
        &nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td align="right" class="form_definitions">Language*</td>

      <td align="left" class="form_definitions">&nbsp;&nbsp;<select name="L1" id="L1">

	      <option value="English"  <? if (isset($_POST[L1]) && $_POST[L1]=="English"){echo "selected";}  else if (!isset($_POST[L1])){ echo "selected"; }?>>English</option>

          <option value="Dutch" <? if (isset($_POST[L1]) && $_POST[L1]=="Dutch"){echo "selected";}?>>Dutch</option>

          <option value="French" <? if (isset($_POST[L1]) && $_POST[L1]=="French"){echo "selected";}?>>French</option>

          <option value="German" <? if (isset($_POST[L1]) && $_POST[L1]=="German"){echo "selected";}?>>German</option>

		  <option value="Italian" <? if (isset($_POST[L1]) && $_POST[L1]=="Italian"){echo "selected";}?>>Italian</option>

		  <option value="Japanese" <? if (isset($_POST[L1]) && $_POST[L1]=="Japanese"){echo "selected";}?>>Japanese</option>

		  <option value="Korean" <? if (isset($_POST[L1]) && $_POST[L1]=="Korean"){echo "selected";}?>>Korean</option>

		  <option value="Portuguese" <? if (isset($_POST[L1]) && $_POST[L1]=="Portuguese"){echo "selected";}?>>Portuguese</option>

	      <option value="Spanish" <? if (isset($_POST[L1]) && $_POST[L1]=="Spanish"){echo "selected";}?>>Spanish</option>	       

	    </select></td>

      <td width="286" align="left">&nbsp;</td>
    </tr>

	<tr>

      <td width="160" align="right" class="form_definitions">Category </td>

      <td width="250" align="left" class="form_definitions"> &nbsp;
        <select name="Category" id="Category">
<?php
$query=mysql_query("select * from category order by name asc");
while($row=mysql_fetch_object($query))
{
if($row->name==$_POST['Category'])
echo '<option selected>'.$row->name.'</option>';
else
echo '<option>'.$row->name.'</option>';
}
?>
	    </select></td>

      <td width="286" align="left">&nbsp;</td>
    </tr>



    <tr>
      <td align="right" class="form_definitions"><? if(isset($_POST[State]) && $_POST[State]==""){

		  echo "<font color=#ffdd54>State*</font>";

	 	 } else{ echo"State*";}

	  	  ?>      </td>
      <td align="left">&nbsp;&nbsp;<input name="State" value="<? if (isset($_POST[State])){ echo $_POST[State]; } ?>" type="text" id="State" size="24" maxlength="24" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" class="form_definitions"><? if(isset($_POST[City]) && $_POST[City]==""){

		  echo "<font color=#ffdd54>City*</font>";

	 	 } else{ echo"City*";}

	  	  ?>      </td>
      <td align="left">&nbsp;&nbsp;<input name="City" value="<? if (isset($_POST[City])){ echo $_POST[City]; } ?>" type="text" id="City" size="24" maxlength="24" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" class="form_definitions"><? if(isset($_POST[ZipCode]) && $_POST[ZipCode]==""){

		  echo "<font color=#ffdd54>Zip Code*</font>";

	 	 } else{ echo"Zip Code*";}

	  	  ?>      </td>
      <td align="left">&nbsp;&nbsp;<input name="ZipCode" value="<? if (isset($_POST[ZipCode])){ echo $_POST[ZipCode]; }  ?>" type="text" id="ZipCode" size="24" maxlength="24" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="22" align="right" class="form_definitions"><? if(isset($_POST[phone]) && $_POST[phone]==""){

		  echo "<font color=#ffdd54>Phone*</font>";

	 	 } else{ echo"Phone*";}

	  	  ?>      </td>
      <td>&nbsp;&nbsp;<input name="phone" value="<? if (isset($_POST[phone])){ echo $_POST[phone]; }  ?>" type="text" id="phone" size="24" maxlength="24" /></td>
      <td class="form_informations">&nbsp;</td>
    </tr>
    <tr>
      <td height="83" align="right" class="form_definitions"><? if(isset($_POST[Adress]) && $_POST[Adress]==""){

		  echo "<font color=#ffdd54>Address*</font>";

	 	 } else{ echo"Street Adress*";}

	  	  ?></td>
		  
		  
      <td align="left">&nbsp;&nbsp;<textarea name="Adress" cols="24" rows="5" id="Adress"><? if (isset($_POST[Adress])){echo "$_POST[Adress]"; } ?></textarea>      </td>
    </tr>

    <tr>

      <td align="right" class="form_definitions"><? if(isset($_FILES['ImageFile']['name'])){

		  echo "<font color=#ffdd54>Your Profile Picture*</font>";

	 	 } else{ echo"Your Profile Picture*";}

	  	  ?></td>

      <td align="left">&nbsp;&nbsp;<input name="ImageFile" type="file" value="asdf" id="ImageFile"> &nbsp;&nbsp;<span class="form_informations">What users see when they browse.</span></td>

      <td align="left">&nbsp;</td>
    </tr>
	
    <tr>
      <td align="right" class="form_definitions"><? if(isset($_FILES['ActImage']['name'])){

		  echo "<font color=#ffdd54>Photo ID*</font>";

	 	 } else{ echo"Photo ID*";}

	  	  ?>      </td>
      <td>&nbsp;&nbsp;<input name="ActImage" type="file" value="" id="ActImage" /> 
        &nbsp;&nbsp;Valid picture ID required. </td>
      <td class="form_informations">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" class="form_definitions"><? if(isset($_FILES['RImage']['name'])){

		  echo "<font color=#ffdd54>Your Picture*</font>";

	 	 } else{ echo"Your Picture*";}

	  	  ?>      </td>
      <td align="left">&nbsp;&nbsp;<input name="RImage" type="file" value="" id="RImage" /> &nbsp;&nbsp;<span class="form_informations">Picture of you for our records. </span></td>
      <td class="form_informations">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><div align="left">
        <p>
            &nbsp;&nbsp;<input type="submit" name="Submit" value=" I am at least 18 years of age" />
          </p>
      </div></td>
      <td><p>&nbsp;</p>
          <p>&nbsp;</p></td>
    </tr>
  </table></td></tr>
</form>
  <?
include("_reg.footer.php");
?>

