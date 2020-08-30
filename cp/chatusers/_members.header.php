<?php
require_once ('../../Mobile_Detect.php');
$detect = new Mobile_Detect();
if ($detect->isPuffin()) { // Detecta si es Puffin
	
} else if ($detect->isMobile()) { // Detecta si es un móvil
	header ("Location: ../../mobile.php");
} else if ($detect->isTablet()) { // Si es un tablet
	header ("Location: ../../mobile.php");
} else if ($detect->isAndroidOS()) { // Si es Android
	header ("Location: ../../mobile.php");
} else if ($detect->isiOS()) { //Si es iOS
	header ("Location: ../../mobile.php");
}
?>
<html xmlns="https://www.w3.org/1999/xhtml" lang="es" xml:lang="en">
<?
include("../../dbase.php");
include("../../settings.php");
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
<link rel="canonical" href="https://www.angelitaslive.com/" />
<link rel="shortcut icon" href="../../images/favicon.png" />
<link rel="icon" href="../../images/favicon.png" type="image/x-icon" />
<link rel="stylesheet" href="../../common/css-menu/style.css" type="text/css" />
<link rel="stylesheet" href="../../common/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="../../common/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="../../styles.css" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

<script type="text/javascript" src="../../js/jquery-3.2.0.js"></script>
<script type="text/javascript" src="../../common/js/bootstrap.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="https://malsup.github.io/jquery.cycle.all.js"></script>
<script type='text/javascript' src='../../js/jquery.lazyload.min.js'></script>
</head>

<body>
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
        <div class="left_side col-md-7">
            <a href="https://www.angelitaslive.com/" class="header-logo" title:"Home"> <? echo $sn1; ?> <b><? echo $sn2; ?></b></a>
            <form action="../../search_model.php" method="post" id="search">
                <input name="search" type="text" size="40" placeholder="Search..." />
            </form>
        </div>
        <div class="right_side col-md-5">
        <?php
	if($_COOKIE['usertype']=='chatmodels') {
		$result=mysql_fetch_array(mysql_query("SELECT user from chatmodels WHERE id='$_COOKIE[id]' LIMIT 1"));
		$model=$result['user'];
	}
	?>
	    <ul id="css-menu" class="topmenu">
		<li class="topmenu">
		    <a href="#"><i class="fa fa-user-circle"></i>&nbsp;&nbsp;<? if (isset($username)){echo $username;} ?><? if (isset($model)){echo $model;} ?>&nbsp;<i class="fa fa-caret-down"></i></a>
		    <div class="submenu" style="width:<?=(120*$columns);?>px;">
		    <ul>
		        <?php if($username) {
			    echo '<li><a href="index.php"><i class="fa fa-credit-card-alt"></i>&nbsp;&nbsp;My Account</a></li>
			    <li><a href="favorites.php"><i class="fa fa-star"></i>&nbsp;&nbsp;My Favorites</a></li>
			    <li><a href="updateprofile.php"><i class="fa fa-user"></i>&nbsp;&nbsp;My Profile</a></li>
			    <li><a href="viewsessions.php"><i class="fa fa-history"></i>&nbsp;&nbsp;My History</a></li>
			    <li><a href="buyminutes.php"><i class="fa fa-money"></i>&nbsp;&nbsp;My Money</a></li>
		            <li><a href="../../logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a></li>';} ?>
			<?php if($model) {
			    echo '<li><a href="../chatmodels/index.php"><i class="fa fa-credit-card-alt"></i>&nbsp;&nbsp;My Account</a></li>
			    <li><a href="../chatmodels/broadcast.php"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;Broadcast</a></li>
			    <li><a href="../chatmodels/updateprofile.php"><i class="fa fa-user"></i>&nbsp;&nbsp;My Profile</a></li>
			    <li><a href="../chatmodels/showslist.php"><i class="fa fa-history"></i>&nbsp;&nbsp;My History</a></li>
			    <li><a href="../chatmodels/uploadpicture.php"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;My Pictures</a></li>
			    <li><a href="../chatmodels/paymentop.php"><i class="fa fa-money"></i>&nbsp;&nbsp;My Money</a></li>
			    <li><a href="../../logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a></li>';} ?>
		     </ul>
		</li>
	    </ul>
	    <ul id="css-menu" class="topmenu mar-rig left_side">
		<li class="topmenu">
		    <a href="../../index.php"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;Live WebCams</a>
		</li>
		<li class="topmenu">
		    <a href="#"><i class="fa fa-bars"></i>&nbsp;&nbsp;Categories&nbsp;<i class="fa fa-caret-down"></i></a>
	            <div class="submenu" style="width:<?=(120*$columns);?>px;">
			<?php
			foreach($cat_array as $cat)
			{
			echo '<div class="column" style="width:'.(100/$columns).'%"><ul>';
			foreach($cat as $c)
			{
			echo '<li><a href="../../category.php?category='.$c.'">'.$c.'</a></li>';
			}	
			echo '</ul></div>';
			}
			?>
		    </div>
		</li>
	    </ul>
        </div>
    </div>
</header>