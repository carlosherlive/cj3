<?
if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" ) {
	echo "<META HTTP-EQUIV=\"Refresh\"
	CONTENT=\"0; URL=registration/user.php\">";
} else {
	include("dbase.php");
	include("settings.php");
	$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row['user'];
	}
}
?>
<? if (isset($_COOKIE["usertype"])){
	include("_main.header.logged.in.php");	
} else {
	include("_main.header.php");	
}
?>

<div class="body-container">
    <div class="col-md-12" align="center">

<?
if (isset($_COOKIE['usertype']) && $_COOKIE['usertype']=="chatusers") {
	$result = mysql_query('SELECT cpm FROM chatmodels WHERE user="'.$_GET[model].'" LIMIT 1');
	while($row = mysql_fetch_array($result)) {
		$cpm=$row['cpm'];
	};
	$result = mysql_query('SELECT id,user,money,freetime,freetimeexpired FROM chatusers WHERE id="'.$_COOKIE[id].'" LIMIT 1');
	while($row = mysql_fetch_array($result)) {
		$freetime=$row['freetime'];
		$freetimeexpired=$row['freetimeexpired'];
		$sUser=$row['user'];
		$sId=$row['id'];
		$nMoney=$row['money'];
	}
	if ($freetime==0 && (time()-$freetimeexpired)>(3600*$freehours)) {
		mysql_query("UPDATE chatusers SET freetime='120', freetimeexpired='0' WHERE id='$_COOKIE[id]' LIMIT 1");
		$freetime=110;	
	}
	$result=mysql_query("SELECT * from favorites WHERE member='$sUser' AND model='$_GET[model]'");
	if (mysql_num_rows($result)>=1) {
		$nFav=1;
	} else {
		$nFav=0;
	}
} else {
	$sUser="guest";
	$sId="00";
	$nMoney=0;
	$nFav=0;
}
?>
<object class="videos" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="720" height="620">

	<param name=FlashVars VALUE="&fuser=<? echo $sUser; ?>&fmodel=<? echo $_GET[model]; ?>&fid=<? echo $sId; ?>&fmoney=<? echo $nMoney;?>&favorite=<? echo $nFav;?>&freetime=<? echo $freetime;?>&connection=<? echo $connection_string;?>&cpm=<? echo $cpm; ?>">
	<param name="quality" value="high">
        <param name="movie"recordedshows.swf" />
        <param name="allowFullScreen" value="true" />
  
        <embed flashvars="&fuser=<? echo $sUser; ?>&fmodel=<? echo $_GET[model]; ?>&fid=<? echo $sId; ?>&fmoney=<? echo $nMoney;?>&favorite=<? echo $nFav;?>&freetime=<? echo $freetime;?>&connection=<? echo $connection_string;?>&cpm=<? echo $cpm; ?>" src="recordedshows.swf" width="720" height="620" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
</object>
    </div>
</div>

<?
include("_main.footer.php");
?>