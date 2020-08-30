
<html xmlns="https://www.w3.org/1999/xhtml" lang="es" xml:lang="en">
<?
include("../dbase.php");
include("../settings.php");
$nTime=time();
	//we set the status to offline to models that have not changed theyr status for 30 seconds
	mysql_query("UPDATE chatmodels SET status='offline' WHERE $nTime-lastupdate>30 AND status!='rejected' AND status!='blocked' AND status!='pending' AND forcedOnline='0'");
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="google" content="notranslate" />
<title><? echo $sitename; ?> - Live Sex Cam Shows, Free Webcam Chat</title>
<meta name="description" content="Chat for FREE and watch HD Cams with Live Sex! Our Models are waiting for you. Enjoy a Private Show with the girl of your dreams now! NO registration required." />
<meta name="keywords" content="en vivo, sexo, cams, cam, real, web, amateur, webcams, personal, livesex, sexo en vivo, free sex videos, sexvideos, free porn videos, porn videos, free videos, gratis, real, cámara web, cam, cams, chicas, video, women, lesbianas, porn, porno, men, guys, nude, privado, pussy, sexy, camgirls, homecams, video chat, vídeo gratis, xxx, adulto, naked" />
<meta name="google-site-verification" content="QBZgi2zWrY1xY1ZJaxaADyw1tTbbQyhw8Qjg8qEmCRo" />
<link rel="canonical" href="https://www.sexliive.com/" />
<link rel="shortcut icon" href="../images/favicon.png" />
<link rel="icon" href="../images/favicon.png" type="image/x-icon" />
<link rel="stylesheet" href="../common/css-menu/style.css" type="text/css" />
<link rel="stylesheet" href="../common/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="../common/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="../styles.css" type="text/css"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" type="text/css" media="screen" />

<script type="text/javascript" src="../js/jquery-3.2.0.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://malsup.github.io/jquery.cycle.all.js"></script>
<script type='text/javascript' src='../js/jquery.lazyload.min.js'></script>
<script type="text/javascript" src="../js/lightbox.js"></script>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../common/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
<script src="https://kit.fontawesome.com/707bd3388d.js" crossorigin="anonymous"></script>
<script src="../js/webrtc/modernizr.custom.js"></script>
<link rel="stylesheet" type="text/css" href="../stylesheets/normalize.css" />
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
<header id="header-menu">
    <div class="header-container">
        <a href="../index.php" class="w3-display-topmiddle w3-hide-large" title:"Home"><img src="../images/logosexliive.png" class="logotablet" style="width:80%; padding: 5px; top: 5px;"></a>
        <a href="../index.php" class="w3-hide-small" style="position: absolute;left: 50;top: 12px;" title:"Home"><img src="../images/logosexliive.png" style="width:50%; padding: 5px;"></a>
        <form action="search_model.php" method="post" id="search" class="w3-display-topright w3-hide-small">
                <label for="search" style="margin-top:15px;"><i class="fa fa-search" style="color:#FFF; font-size: 23;"></i> </label>
                <input name="search" type="text" size="40" placeholder="Search..." />
        </form>
        <form action="search_model.php" method="post" id="searchmovil" class="w3-display-topright w3-hide-large">
                <label for="search" style="margin-top: 5px;"><i class="fa fa-search" style="color:#FFF; font-size: 23;" onclick="viewsearch()"></i> </label>
                <input id="inputsearch" class="closesearch" name="search" type="text" size="40" placeholder="Search..." />
        </form>
        <div class="auto_side w3-dropdown-click">
            <button class="w3-button" onclick="myFunction1()" ><i class="fa fa-bars" style="font-size: 20;"></i></button>
            <div id="Demo1" class="w3-dropdown-content w3-bar-block w3-border" style="background: linear-gradient(to bottom, rgba(218,0,0,0.8), rgba(166,0,0,0.8))">
                <div class="w3-bar-item">
                    <a href="../switchlogin.php" class="signup-button" style="width:100%"><i class="fa fa-user-circle"></i>&nbsp;&nbsp;Login</a>
                </div>
                <div class="w3-bar-item">
                    <a href="../switchregistration.php" class="signup-button" style="width:100%"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Register</a>
                </div>
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
        <div class="hide right_side col-sm-6 ">
            <ul id="css-menu" class="topmenu">
            <li class="topmenu w3-hide-small">
                <a href="login_member.php"><i class="fa fa-user-circle"></i>&nbsp;&nbsp;Login</a>
            </li>
            <li class="topmenu w3-hide-small">
                <a href="registration/user.php"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Register</a>
            </li>
            </ul>
            <ul id="css-menu" class="topmenu mar-rig left w3-hide-small">
            <li class="topmenu">
                <a href="index.php"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;Live WebCams</a>
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
                echo '<li><a href="category.php?category='.$c.'">'.$c.'</a></li>';
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
