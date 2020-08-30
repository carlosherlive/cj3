<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="en">
<?php
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
  
	if (mysql_num_rows($result)==1) $errorMsg='<p align="center" style="color: #FC0; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Username exists, please choose another one!</p>';
	if(md5($_POST['Password1'])!=md5($_POST['Password2'])) $errorMsg='<p align="center" style="color: #FC0; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Passwords do not match.</p>';
	if(strlen($_POST['UserName'])< 6 || strlen($_POST['UserName'])>15) $errorMsg='<p align="center" style="color:#FC0; background:#800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Username must be 6 to 15 characters long and may not contain spaces.</p>';
	if(strlen($_POST['Password1'])< 6 || strlen($_POST['Password1'])> 15) $errorMsg='<p align="center" style="color:#FC0; background:#800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Passwords must be 6 to 15 characters long and may not contain spaces.</p>';
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

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="google" content="notranslate" />

<style>
body { margin: 0px;}
</style>

<link rel="canonical" href="http://www.angelitasonline.com/" />
<link rel="shortcut icon" href="http://www.angelitasonline.com/images/favicon.png" />
<link rel="icon" href="http://www.angelitasonline.com/images/favicon.png" type="image/x-icon" />
<link rel="stylesheet" href="http://www.angelitasonline.com/common/css-menu/style.css" type="text/css" />
<link rel="stylesheet" href="http://www.angelitasonline.com/common/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="http://www.angelitasonline.com/common/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="http://www.angelitasonline.com/styles.css" type="text/css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" type="text/css" media="screen" />

<script type="text/javascript" src="http://www.angelitasonline.com/js/jquery-3.2.0.js"></script>
<script type="text/javascript" src="http://www.angelitasonline.com/common/js/bootstrap.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
<script type='text/javascript' src='http://www.angelitasonline.com/js/jquery.lazyload.min.js'></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<script type='text/javascript' src='js/jquery.lazyload.min.js'></script>

<div id="banner18" class="girls_blue">
    <table>
    	<tbody>
    	    <tr>
      		<td>
        	    <div class="popup join">
          		<div class="title_h2 title_few_seconds">Create your <span class="b">FREE</span> account now,<br> <span>it only takes a few seconds</span></div>
                      	<div class="title_h2 title_free_tokens">¡Get <span class="b">5</span> tokens FREE! <br><span class="initial_bonus step_text">Initial Bonus</span></div>
                    	<div class="nocc">No credit card required</div>
            	    <form method="post" name="form1">
            	<div class="form join_form">
            <li class="col-md-6 li_banner18" align="center">
            	<table>
            	    <tr>
      			<td>
			    <h4><? 
				if(isset($_POST['UserName']) && $_POST['UserName']=="")
					echo "<font color=#800>Choose your Username:</font>";
				else if(isset($_POST['UserName']) && (strlen(trim($_POST['UserName']))<6 || strlen(trim($_POST['UserName']))>15))
					echo "<font color=#800>Choose your Username:</font>";
				else
					echo"Choose your Username:";
			    ?></h4>
	  		    <input name="UserName"  value="<? if (isset($_POST['UserName'])){ echo $_POST['UserName']; }  ?>" type="text" id="UserName" size="30" maxlength="15">
	  		</td>
	  	    </tr>
    		    <tr>
      			<td>
	  		    <h4><? if(isset($_POST['Email']) && $_POST['Email']==""){
		  		echo "<font color=#800>Your Email Address:</font>";
	 	    	    } else { 
	 	    	    	echo"Your Email Address:";
	 	    	    }?></h4>
      			    <input name="Email" value="<? if (isset($_POST['Email'])){ echo $_POST['Email']; }  ?>" type="text" id="Email" size="30" maxlength="48"></td>
    		    </tr>
    		    <tr>
      			<td>
	    		    <h4><? 
				if(isset($_POST['Password1']) && $_POST['Password1']=="")
					echo "<font color=#800>Choose a Password:</font>";
				else if(isset($_POST['Password1']) && (strlen(trim($_POST['Password1']))<6 || strlen(trim($_POST['Password1']))>15))
					echo "<font color=#800>Choose a Password:</font>";
				else
					echo"Choose a Password:";
			    ?></h4>
  			    <input name="Password1" type="password" id="Password1" size="30" maxlength="15">
  			</td>
	  	    </tr>
    		    <tr>
      			<td>
      			    <h4><? if(isset($_POST['Password2']) && $_POST['Password2']==""){
		  		echo "<font color=#800>Re-type Password:</font>";
	 	 	    } else {
	 	 		echo"Re-type Password:";
	  		    }?></h4>
	  		    <input name="Password2" type="password" id="Password2" size="30" maxlength="15">
	  		</td>
    		    </tr>
    		    <tr>
      			<td>
      			    <input class="check" name="checkbox" type="checkbox" value="checkbox" <? if( isset($_POST['checkbox']) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>&nbsp;&nbsp;I am over 18 years old. I have read the <a href="/registration/memberterms.php" target="_blank">Terms and Conditions</a>.
      			    <input name="emailtype" type="hidden" value="html" checked>
	  		</td>
    		    </tr>
    		    <tr>
    		        <td>
      		    	    <div align="center">
      		        	<h4><?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?></h4>
          			<input type="submit" class="plus18" name="Submit" value="Create Account" />
      		    	    </div>
      			</td>
      		    </tr>
    		</table>
    	    </li>
    	    	</div>
  		    </form>
  		    	<div class="clr"><!-- --></div>
        	    </div>
        	    <div class="free_reg_text">The register is <span class="b">FULLY FREE</span>, no subscription will be charged.</div>
      		</td>
       	    </tr>
  	</tbody>
    </table>
    <div class="no-register">
        <span>If you are over 18 and do not want to register</span>
        <a href="javascript:parent.$.fancybox.close();">Enter</a>
        <span>If you are under 18, Please</span>
        <a href="javascript:history.go(-1)">Exit</a>
    </div>
</div>
</html>