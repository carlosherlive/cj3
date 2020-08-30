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
?>

<?
include("_models.header.php");
?>

<div class="body-container">
    <div  class="col-md-12" align="center">
    	<ul class="bar_profile">
	    <h2 class="topmenu col-md-12" align="center">RULES</h2>
        </ul>
        <br/><br/>
        <ul class="bar_profile">
        <div class="w90">
            <li class="col-md-4 li_group" align="center">
                <h3 class="tit">Rule Number 1</h3>
                <p class="txt">The money displayed in the broadcast interface window are the ammount of money you deducted from the member. these money are divided between the site and you according to the epercentages set by the admin. Studio operators recieve a fix sum of 10%.</p>
            </li>
            <li class="col-md-4 li_group" align="center">
                <h3 class="tit">Rule Number 2</h3>
                <p class="txt">Once a member requests a private chat you are automatically sent toa private chat rom, the other users still are in your public room and they will see you when you get back.</p>
            </li>
            <li class="col-md-4 li_group" align="center">
                <h3 class="tit">Rule Number 3</h3>
                <p class="txt">this is another important rule: You shoud respect your clients!</p>
            </li>
        </div>
	</ul>
    </div>
</div>

<?
include("_models.footer.php");
?>