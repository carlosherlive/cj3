<META http-equiv="refresh" content="3;URL=buyminutes.php">
<?
if (isset($_COOKIE["usertype"])) {
	include("_members.header.php");	
} else {
	include("_members.header.php"); 	 
	echo "<META HTTP-EQUIV=\"Refresh\"
	CONTENT=\"1; URL=../../index.php\">";
?>

<?
include("../../dbase.php");
include("../../settings.php");
$result=mysql_query("SELECT user,freetime,freetimeexpired from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row['user'];	
		$freetime=$row['freetime'];
		$freetimeexpired=$row['freetimeexpired'];
	}
	if ($freetime==0 && (time()-$freetimeexpired)>(3600*$freehours)) {
	mysql_query("UPDATE chatusers SET freetime='120', freetimeexpired='0' WHERE id='$_COOKIE[id]' LIMIT 1");
	$freetime=120;
	}
}
$welcomeQuery = "SELECT members FROM welcome"; 
$result = mysql_query($welcomeQuery) or die(mysql_error()); 
$chkN = mysql_num_rows($result) ; 
if($chkN > 0 ) {
	$valueW = mysql_result($result,0,'members'); 
} else {
	$valueW = "Welcome Text Not Defined"; 
}
?>

<div class="body-container">
    <div  class="col-md-12" align="center">
        <div class="padi">
        <div  class="box_charging">
            <br><br>
            <h3><img src="../../images/loading.gif" alt="Loading. Please Wait..."/><br>Loading. Please Wait...</h3>
            <br><br>
        </div>
        </div>
    </div>
</div>

<?
include("_members.footer.php");
?>
