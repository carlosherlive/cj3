<?
if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" ) {
	header("location: ../../registration/user.php");
} else {
	include("../../dbase.php");
	$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row[user];
	}
}

$temail="";
$tsms="";

if ( $_POST[hiddenField]=="yes" &&$_POST[email]=="true") {
	mysql_query("UPDATE chatusers SET emailnotify='1' WHERE user='$username'");
	$temail="1";
} else if ($_POST[hiddenField]=="yes" &&$_POST[email]=="") {
	mysql_query("UPDATE chatusers SET emailnotify='0' WHERE user='$username'");
	$temail="0";
}

if ( $_POST[hiddenField]=="yes" && $_POST[sms]=="true") {
	mysql_query("UPDATE chatusers SET smsnotify='1' WHERE user='$username'");
	$tsms="1";
} else if ($_POST[hiddenField]=="yes" && $_POST[sms]=="") {
	mysql_query("UPDATE chatusers SET smsnotify='0' WHERE user='$username'");
	$tsms="0";
}

if ($temail=="") {
	$result=mysql_query("SELECT emailnotify from chatusers WHERE user='$username' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
	$temail=$row[emailnotify];
	}
}

if ($tsms=="") {
	$result=mysql_query("SELECT smsnotify from chatusers WHERE user='$username' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
	$tsms=$row[smsnotify];
	}
}

if (isset($_GET[remove]) && $_GET[remove]!="") {
	mysql_query("DELETE from favorites WHERE model='$_GET[remove]' AND member='$username' LIMIT 1");
}
?>

<?
include("_members.header.php");
?>

<script>
$(document).ready(function() {
	$("img.lazy").lazyload({
		effect : "fadeIn",
    		effectspeed: 1
    	});
});
</script>

<div class="body-container">
    <div class="col-md-12" align="center">
        <div>
    	<?php echo '<ul class="w90 model_group" align="center">';
	$count=0;
	$nTime=time();
	$result = mysql_query("SELECT t1.*, t2.* FROM favorites AS t1,chatmodels AS t2 WHERE t1.member='$username' AND t2.user=t1.model AND t2.status!='pending' AND t2.status!='offline' AND t2.status!='rejected'"  );					
	while($row = mysql_fetch_array($result)) {
		$tBirthD=$row[birthDate];
		$nYears=date('Y',time()-$tBirthD)-1970;
		$username=$row[user];
		$tempMessage=$row[message];
		$tempCity=$row[city];
		$tempPlace=$row[broadcastplace];
		$tempL1=$row[language1];
		$tempL2=$row[language2];
		$status=$row[status];
		$count++;
		if ($count==1) {echo '<div>';}
		echo '<li class="col-md-3 padd li_group" align="center">';
          	echo '<div>
          	<a class="showThumbnail" href="/liveshow.php?model='.$username .'" rel="'.$username .'">
          	<div class="hoverbox">
          	<img class="lazy" src="/models/'.$username.'/thumbnail.jpg" data-original="/models/'.$username.'/thumbnail.jpg" width="100%" height="auto" border="0">
          	</div>
          	</a>
          	</div>';
          	echo '<div height="auto" align="center" valign="middle">
		<span class="modelbox_title">
		<a title="Delete" class="col-md-4" href="favorites.php?remove='.$username .'">
		<h3><i class="fa fa-trash"></i></h3>
		</a>
		<a class="col-md-12" href="/liveshow.php?model='.$username .'">
		<p class="name">'.$username .'</p>
		</a>
		</span>
		</div>';
		if ($count==4) {
			$count=0;
		}
	}
        echo'</li>';
	mysql_free_result($result);
	echo'</ul>';
 	?>
 	<br/>
 	</div>
    </div>
</div>
        
<?
include("_members.footer.php");
?>