<META http-equiv="refresh" content="3;URL=paymentop.php">
<?
if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" ) {
	header("location: ../../login.php");
} else {
	include("../../dbase.php");
	$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row['user'];
	}
}
mysql_free_result($result);
$welcomeQuery = "SELECT models FROM welcome"; 
$resultModel = mysql_query($welcomeQuery) or die(mysql_error()); 
$chkN = mysql_num_rows($resultModel) ; 
if($chkN > 0 ) {
	$valueWM = mysql_result($resultModel,0,'models'); 
} else {
	$valueWM = "Welcome text not defined"; 
}
?>

<?
include("_models.header.php");
?>

<div class="body-container">
    <div  class="col-md-12" align="center">
        <div class="padi">
        <div class="box_charging">
            <br><br>
            <h3><img src="../../images/loading.gif" alt="Loading. Please Wait..."/><br>Loading. Please Wait...</h3>
            <br><br>
        </div>
        </div>
    </div>
</div>

<?
include("_models.footer.php");
?>

