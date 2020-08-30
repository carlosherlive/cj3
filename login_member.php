<?
if(isset($_POST['accountUser']) && isset($_POST['accountPassword'])) {
include("dbase.php");
include("settings.php");
	if ($_POST['accountType']=="member"){
		$database="chatusers";
	} else if ($_POST['accountType']=="model") {
		$database="chatmodels";
	} else if ($_POST['accountType']=="studioop") {
		$database="chatoperators";
	}
	$userExists=false;
	$result = mysql_query("SELECT id,user,password,status FROM $database WHERE status!='pending' AND status!='' ");
	while($row = mysql_fetch_array($result)) {
		$tempUser=$row["user"];
		$tempPass=$row["password"];
		$tempId=$row["id"];
		if ($_POST['accountUser']==$tempUser && md5($_POST['accountPassword'])==$tempPass) {
			if ($row["status"]=="blocked") {
				$userExists=true;
				$errorMsg="Account is blocked, please contact the administrator for more details";
			} else {
			$userExists=true;
			$currentTime=time();
			mysql_query("UPDATE $database SET lastLogIn='$currentTime' WHERE id = '$tempId' LIMIT 1");
			setcookie("usertype", $database, time()+360000);
			setcookie("id", $tempId, time()+360000);
			header("Location: cp/$database/");
			}
		}
	}
	if (!$userExists) {
	$errorMsg="Wrong username or password.";
	}
} else if (isset($_GET['from']) && $_GET['from']=="recoverpass") {
	$errorMsg="Your new password has been sent to your email address";
} else {
	$errorMsg="";
}
include("_main.header.php");
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>
$( document ).ready(function() {
	$( "#btn" ).click(function() {
		$( "#loginform" ).submit();
	});
	$(document).keypress(function(e) {
    		if(e.which == 13) {
     		$( "#loginform" ).submit();
    		}
	});
});
</script>

<div class="body-container">
    <div class="col-md-12" align="center">
	<section class="login">
	    <div class="titulo"><i class="fa fa-user-circle"></i>&nbsp;&nbsp;Member Login</div>
	    <form id="loginform" action="" method="post" enctype="application/x-www-form-urlencoded">
    		<input type="text" name="accountUser" title="Username required" placeholder="Username">
        	<input type="password" name="accountPassword" title="Password required" placeholder="Password">
        	<input type="hidden" name="accountType" value="member">
            <div class="olvido">
        	<div class="col"><a href="registration/user.php" title="Register"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Register</a></div>
            	<div class="col"><a href="lostpassword.php" title="Forgot Password"><i class="fa fa-unlock"></i>&nbsp;&nbsp;Forgot Password?</a></div>
            </div>
        	<a id="btn" class="enviar"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Submit</a>
    	    </form>
	</section>
    </div>
</div>

<?
include("_main.footer.php");
?>