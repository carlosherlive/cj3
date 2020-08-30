<?php
//require_once ('../../Mobile_Detect.php');
//$detect = new Mobile_Detect();
//if ($detect->isPuffin()) { // Detecta si es Puffin
	
//} else if ($detect->isMobile()) { // Detecta si es un móvil
//	header ("Location: ../../mobile.php");
//} else if ($detect->isTablet()) { // Si es un tablet
//	header ("Location: ../../mobile.php");
//} else if ($detect->isAndroidOS()) { // Si es Android
//	header ("Location: ../../mobile.php");
//} else if ($detect->isiOS()) { //Si es iOS
//	header ("Location: ../../mobile.php");
//}
?>
<html xmlns="https://www.w3.org/1999/xhtml" lang="es" xml:lang="en">
<?
include("dbase.php");
include("settings.php");
$result=mysql_query("SELECT user,freetime,freetimeexpired from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row['user'];	
		$freetime=$row['freetime'];
		$freetimeexpired=$row['freetimeexpired'];
	}
	if ($freetime==0 && (time()-$freetimeexpired)>(3600*$freehours)){
	mysql_query("UPDATE chatusers SET freetime='120', freetimeexpired='0' WHERE id='$_COOKIE[id]' LIMIT 1");
	$freetime=120;
	}
		  //we set the status to offline to models that have not changed theyr status for 30 seconds
		  mysql_query("UPDATE chatmodels SET status='offline' WHERE $nTime-lastupdate>30 AND status!='rejected' AND status!='blocked' AND status!='pending' AND forcedOnline='0'");
?>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="google" content="notranslate" />
<title><? echo $sitename; ?> - Live Sex Cam Shows, Free Webcam Chat</title>
<meta name="description" content="Chat for FREE and watch HD Cams with Live Sex! Our Models are waiting for you. Enjoy a Private Show with the girl of your dreams now! NO registration required." />
<meta name="keywords" content="en vivo, sexo, cams, cam, real, web, amateur, webcams, personal, livesex, sexo en vivo, free sex videos, sexvideos, free porn videos, porn videos, free videos, gratis, real, cámara web, cam, cams, chicas, video, women, lesbianas, porn, porno, men, guys, nude, privado, pussy, sexy, camgirls, homecams, video chat, vídeo gratis, xxx, adulto, naked" />
<link rel="canonical" href="https://www.sexliive.com/" />
<link rel="shortcut icon" href="images/favicon.png" />
<link rel="icon" href="images/favicon.png" type="image/x-icon" />
<link rel="stylesheet" href="common/css-menu/style.css" type="text/css" />
<link rel="stylesheet" href="common/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="common/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1">
<script type="text/javascript" src="js/jquery-3.2.0.js"></script>
<script type="text/javascript"	 src="common/js/bootstrap.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="https://malsup.github.io/jquery.cycle.all.js"></script>
<script type='text/javascript' src='js/jquery.lazyload.min.js'></script>
<link rel="stylesheet" href="emision.css" type="text/css"/>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="common/js/bootstrap.js"></script>

<link rel="stylesheet" href="css/jquery.emojiarea.css">
		<script src="js/jquery.emojiarea.js"></script>
		<script src="packs/basic/emojis.js"></script>

<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
    <script src="js/webrtc/modernizr.custom.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheets/normalize.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.pubnub.com/pubnub.min.js"></script>
<script src="js/webrtc/webrtc.js"></script>
<script src="js/webrtc/rtc-controller.js"></script>
</head>

<body>
	<script>
	function viewsearch(){
        if ($("#inputsearch").hasClass('opensearch')) {
        	$("#inputsearch").removeClass('opensearch');
        	$("#inputsearch").addClass('closesearch');
        	$("#searchmovil").addClass('subir');
        	$("#searchmovil").removeClass('bajar');
        }else{
        	$("#inputsearch").addClass('opensearch');
        	$("#inputsearch").removeClass('closesearch');
        	$("#searchmovil").addClass('bajar');
        	$("#searchmovil").removeClass('subir');
        }
    }
    
function myFunction() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) {  
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
<script>
function myFunction1() {
  var x = document.getElementById("Demo1");
  if (x.className.indexOf("w3-show") == -1) {  
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
<?php
$query=mysql_query("select * from category order by name asc");
while($row=mysql_fetch_object($query))
{
$cats[]=$row->name;
}
$cat_array=array_chunk($cats,7);
$columns=count($cat_array);
?>
<header id="header-menu" align="left">
    <div class="header-container">
    	<a href="index.php" class="w3-display-topmiddle" title:"Home"><img src="images/logosexliive.png" style="width:90%; padding: 5px;"></a>
        <form action="search_model.php" method="post" id="search" class="w3-display-topright w3-hide-small">
        		<label for="search"><i class="fa fa-search" style="color:#FFF; font-size: 23;"></i> </label>
                <input name="search" type="text" size="40" placeholder="Search..." />
        </form>
        <form action="search_model.php" method="post" id="searchmovil" class="w3-display-topright w3-hide-large">
        		<label for="search"><i class="fa fa-search" style="color:#FFF; font-size: 23;" onclick="viewsearch()"></i> </label>
                <input id="inputsearch" class="closesearch" name="search" type="text" size="40" placeholder="Search..." />
        </form>
        <div class="auto_side w3-dropdown-click">
        	<button class="w3-button" onclick="myFunction1()" ><i class="fa fa-bars" style="font-size: 30;"></i></button>
        	<div id="Demo1" class="w3-dropdown-content w3-bar-block w3-border" style="background: linear-gradient(to bottom, rgba(218,0,0,0.8), rgba(166,0,0,0.8))">
        		<?php if(!isset($_COOKIE["usertype"])){ ?>
        		<div class="w3-bar-item">
        			<a href="login_member.php" class="signup-button" style="width:100%"><i class="fa fa-user-circle"></i>&nbsp;&nbsp;Login</a>
        		</div>
        		<div class="w3-bar-item">
        			<a href="registration/user.php" class="signup-button" style="width:100%"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Register</a>
        		</div>
        	<?php } ?>
        		<div class="w3-bar-item">
        			<a class="w3-bar-item w3-button" style="color: #fff!important; font-size:13px;" href="broadcast.php"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;Broadcast</a>
        		</div>
        		<?php
					if($_COOKIE['usertype']=='chatmodels') {
						$result=mysql_fetch_array(mysql_query("SELECT user from chatmodels WHERE id='$_COOKIE[id]' LIMIT 1"));
						$model=$result['user'];
					}
				if($model) {
			    echo '
			    <div class="w3-bar-item"><a class="signup-button" style="width:100%" href="index.php"><i class="fa fa-credit-card-alt"></i>&nbsp;&nbsp;My Account</a></div>
			    <div class="w3-bar-item"><a class="signup-button" style="width:100%" href="broadcast.php"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;Broadcast</a></div>
			    <div class="w3-bar-item"><a class="signup-button" style="width:100%" href="updateprofile.php"><i class="fa fa-user"></i>&nbsp;&nbsp;My Profile</a></div>
			    <div class="w3-bar-item"><a class="signup-button" style="width:100%" href="showslist.php"><i class="fa fa-history"></i>&nbsp;&nbsp;My History</a></div>
			    <div class="w3-bar-item"><a class="signup-button" style="width:100%" href="uploadpicture.php"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;My Pictures</a></div>
			    <div class="w3-bar-item"><a class="signup-button" style="width:100%" href="paymentop.php"><i class="fa fa-money"></i>&nbsp;&nbsp;My Money</a></div>
			    <div class="w3-bar-item"><a class="signup-button" style="width:100%" href="../../logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a></div>';} ?>
        		<div class="w3-dropdown-click">
        			<button class="w3-button" onclick="myFunction()" style="color: #fff">Categories</button>
        			<div id="Demo" class="w3-dropdown-content"  style="background: linear-gradient(to bottom, rgba(218,0,0,0.8), rgba(166,0,0,0.8))">
	        			<?php
							foreach($cat_array as $cat)
							{
								foreach($cat as $c)
								{
									echo '<a class="w3-bar-item w3-button"  style="color: #fff!important; font-size:13px;" href="category.php?category='.$c.'">'.$c.'</a>';
								}	
							}
						?>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="right_side col-md-5">
        </div>
    </div>
</header>
