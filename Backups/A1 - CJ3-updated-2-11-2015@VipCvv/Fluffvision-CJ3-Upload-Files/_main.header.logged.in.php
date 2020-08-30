<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?

include("dbase.php");

include("settings.php");

$result=mysql_query("SELECT user,freetime,freetimeexpired from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{	$username=$row['user'];	

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

		<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="Camscripts-menuebar_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}


#search {

}

#search input[type="text"] {
    background: url(search-dark.png) no-repeat 10px 6px #8F0000;
    border: 0 none;
    font: bold 9px Arial,Helvetica,Sans-serif;
    color: #fff;
    width: 150px;
    padding: 6px 15px 6px 35px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    text-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 3px rgba(0, 0, 0, 0.2) inset;
    -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 3px rgba(0, 0, 0, 0.2) inset;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 3px rgba(0, 0, 0, 0.2) inset;
    -webkit-transition: all 0.7s ease 0s;
    -moz-transition: all 0.7s ease 0s;
    -o-transition: all 0.7s ease 0s;
    transition: all 0.7s ease 0s;
    }

#search input[type="text"]:focus {
    width: 200px;
    }




</style>
	<!-- End css3menu.com HEAD section -->




<?php
$query=mysql_query("select * from category order by name asc");
while($row=mysql_fetch_object($query))
{
$cats[]=$row->name;
}
$cat_array=array_chunk($cats,7);
$columns=count($cat_array);
?>
<html>
<div class="selector" align="left">
  <table width="100%" border="0">
    <tr>
      
      <td valign="top"><!-- Start css3menu.com BODY section -->
<ul id="css3menu1" class="topmenu">
	<li class="topmenu"><a href="index.php" style="height:10px;line-height:10px;">Live Webcams</a>	</li>
	<li class="topmenu"><a href="#" style="height:10px;line-height:10px;"><span>Categories</span></a>
	<div class="submenu" style="width:<?=(120*$columns);?>px;">
<?php
foreach($cat_array as $cat)
{
echo '<div class="column" style="width:'.(100/$columns).'%"><ul>';
foreach($cat as $c)
{
echo '<li><a href="category.php?category='.$c.'" class="style6">'.$c.'</a></li>';
}	
echo '</ul></div>';
}
?>
</div>
</li>  
<li class="topmenu"><form action="searchModel_ff.php" method="post" id="search">
  <input name="search" type="text" size="40" placeholder="Search..." />
</form></li>



	<li class="topmenu"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><img src="images/camscripts-v2.2-logo.png" alt="Camscripts-logo" width="200" height="30" align="absmiddle" /><center></li>
</ul>
<!-- End css3menu.com BODY section --></td>




      <td align="left"></td>
	  
<?php
if($_COOKIE['usertype']=='chatmodels')
{
$result=mysql_fetch_array(mysql_query("SELECT user from chatmodels WHERE id='$_COOKIE[id]' LIMIT 1"));
$model=$result['user'];
}
?>	  
	  
	  
	  
      <td align="right" valign="top"><!-- Start css3menu.com BODY section -->
<ul id="css3menu1" class="topmenu">
	<li class="topmenu"><a href="#" style="height:10px;line-height:10px;"><span><? if (isset($username)){echo $username;} ?><? if (isset($model)){echo $model;} ?></span></a>
	<div class="submenu" style="width:92px;">
	<ul>   <?php if($username) {
		echo '<li><a href="cp/chatusers/index.php">My Account</a></li>
		<li><a href="cp/chatusers/favorites.php">My Favorites</a></li>
		<li><a href="cp/chatusers/updateprofile.php">My Profile</a></li>
		<li><a href="cp/chatusers/viewsessions.php">My History</a></li>
		<li><a href="cp/chatusers/buyminutes.php">My Money</a></li>
		<li><a href="logout.php">Logout</a></li>';} ?>

<?php if($model) {
		echo '<li><a href="index.php">My Account</a></li>
		<li><a href="cp/chatmodels/broadcast.php">Broadcast</a></li>
		<li><a href="cp/chatmodels/updateprofile.php">My Profile</a></li>
		<li><a href="cp/chatmodels/showslist.php">My History</a></li>
		<li><a href="cp/chatmodels/uploadpicture.php">My Pictures</a></li>
		<li><a href="cp/chatmodels/paymentop.php">My Money</a></li>
		<li><a href="logout.php">Logout</a></li>';} ?>

	</ul></li>
</ul>
<!-- End css3menu.com BODY section --></td>
    </tr>
  </table>
</div>
<head>





<title><? echo $sitename; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="styles.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--

.selector
{
  background-image: url(images/top-bar-red.png);
  
  position: fixed;
  
  top: 0;
  left: 0;
  width: 100%;
  height: 38px;
  z-index: 10;

}


div.hoverbox
  {
  opacity:0.9;
  filter:alpha(opacity=97); /* For IE8 and earlier */
  }
  
  div.hoverbox:hover
  {
  opacity:1.0;
  filter:alpha(opacity=100); /* For IE8 and earlier */
  }






body,td,th {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}

body {
	margin-left: 0px;
	
	margin-right: 0px;
	
	background-color: #8F0000;
	
	
	
	background-repeat: repeat-x;
	
	background-attachment: fixed;
	
	margin-top: 0px;
	
	margin-bottom: 0px;

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
	color: #FFFFFF;
	text-decoration: none;
}
a:active {
	color: #FFCC00;
	text-decoration: none;
}
.style2 {font-size: 14px; font-family: Arial, Helvetica, sans-serif;}
.style3 {
	font-weight: bold;
	font-size: 11;
}
a {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.style6 {font-size: 11px}
.style7 {font-weight: bold; font-size: 11px; 

}


.modelbox_title {

	font-family: Arial, Verdana, Tahoma, Helvetica, sans-serif;

	font-size: 16px;

	color: #ffffff;

	font-weight: bold;

}

-->
</style>



