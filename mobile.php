<?php
//session_start();
//error_reporting(E_ALL);
//header("Cache-control: private");
if($_POST['Submit']){
	$allempty = false;
	foreach ($_POST as $p) {
		if (empty($p)) $allempty = true;
	}
	if (!$allempty){
    	include_once "dbase.php";
	include_once "settings.php";
	
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
		
		include_once("settings.php");
		$header = "From: ".$registrationemail; 
		mail($_POST['Email'], $subject, $message, $header);
		
		mysql_query("INSERT INTO chatusers ( id , user , password , email , name , country , state , city, phone, zip , adress , dateRegistered,lastLogIn, emailnotify ,smsnotify,status,emailtype ) VALUES ('$userId','$username', '{$_POST['Password1']}', '{$_POST['Email']}', '', '', '','','', '', '', '$dateRegistered', '$currentTime','0','0','pending','{$_POST['emailtype']}')") or die(mysql_error());
		header("Location: registration/userregistered.php");
	}}
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="en">
<?
include("dbase.php");
include("settings.php");
$nTime=time(); 
	//we set the status to offline to models that have not changed theyr status for 30 seconds
	mysql_query("UPDATE chatmodels SET status='offline' WHERE $nTime-lastupdate>30 AND status!='rejected' AND status!='blocked' AND status!='pending' AND forcedOnline='0'");
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="google" content="notranslate" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><? echo $sitename; ?> - Live Sex Cam Shows, Free Webcam Chat</title>
<meta name="description" content="Chat for FREE and watch HD Cams with Live Sex! Our Models are waiting for you. Enjoy a Private Show with the girl of your dreams now! NO registration required." />
<meta name="keywords" content="en vivo, sexo, cams, cam, real, web, amateur, webcams, personal, livesex, sexo en vivo, free sex videos, sexvideos, free porn videos, porn videos, free videos, gratis, real, cámara web, cam, cams, chicas, video, women, lesbianas, porn, porno, men, guys, nude, privado, pussy, sexy, camgirls, homecams, video chat, vídeo gratis, xxx, adulto, naked" />
<link rel="canonical" href="https://www.angelitaslive.com/" />
<link rel="shortcut icon" href="images/favicon.png" />
<link rel="stylesheet" href="styles.css" type="text/css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"/>
</head>

<body>
<header id="header-menu">
    <div class="header-container">
        <div class="left_side col-sm-7">
        <center>
            <a href="https://www.angelitaslive.com/" class="header-logo" title:"Home"> <? echo $sn1; ?> <b><? echo $sn2; ?></b></a>
        </center>
        </div>
    </div>
</header>
<div class="mobile-container">
    <center>
    	<b>Descarga el Siguiente Navegador para poder Tener una Mejor Experiencia<br><br><a target="_blank" href="https://play.google.com/store/apps/details?id=com.cloudmosa.puffinFree" class="intro-btns"><img src="https://www.puffinbrowser.com/images/v2/img_google_play.png"  width="280px"></a><br><br><a target="_blank" href="https://itunes.apple.com/us/app/puffin-web-browser-free/id472937654?mt=8" class="intro-btns"><img src="https://www.puffinbrowser.com/images/v2/img_app_store.png" width="280px"></a></b>
    </center>
</div>
</body>
</html>