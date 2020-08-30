<?
if($_POST[accountUser]!="") {
include("dbase.php");
include("settings.php");
	if ($_POST[accountType]=="member") {
		$database="chatusers";
	} else if ($_POST[accountType]=="model") {
		$database="chatmodels";
	} else if ($_POST[accountType]=="studioOp") {
		$database="chatoperators";
	}
	$userExists=false;
	$result = mysql_query("SELECT user,email,id FROM $database WHERE status!='pending' && status!='rejected'");
	while($row = mysql_fetch_array($result)) {
		$tempUser=$row["user"];
		$tempEmail=$row["email"];
		$tempId=$row["id"];
		if ($_POST[accountUser]==$tempUser) {
			$userExists=true;
			function makeRandomPassword() { 
        	  		$salt = "abchefghjkmnpqrstuvwxyz0123456789"; 
	          		srand((double)microtime()*1000000); 
	          		$i = 0; 
	         		 while ($i <= 7) { 
	                	$num = rand() % 33; 
	                	$tmp = substr($salt, $num, 1); 
	                	$pass = $pass . $tmp; 
	                	$i++; 
    	      			}
        	 		return $pass;
    			}
			$random_password = makeRandomPassword(); 
    			$db_password = md5($random_password);
			mysql_query("UPDATE $database SET password='$db_password' WHERE id = '$tempId' LIMIT 1");
			$subject = "New password for $siteurl account"; 	   		
			$charset = "Content-type: text/plain; charset=utf-8\r\n";
			$message = "

	Your password has been reset. 


	New Password: $random_password 

	 	
	$siteurl/login.php 


	For your security we keep the passwords encrypted. 

	That is why we can not recover your lost password.


	This is an automated response, please do not reply!"; 

	

			@mail($tempEmail, $subject, $message,
			"MIME-Version: 1.0\r\n".
			$charset.
			"From:$registrationemail\r\n".
			"Reply-To:$registrationemail\r\n".
			"X-Mailer:PHP/" . phpversion() );
			header("Location: passwordsent.php");
			exit();
		}
	}
	$errorMsg="Username does not exists";
} else {
	$errorMsg="Please complete the username field";
}
?>

<?
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
	    <div class="min-us titulo"><i class="fa fa-refresh"></i>&nbsp;&nbsp;Password Reset</div>
	    <form id="loginform" action="lostpassword.php" method="post" enctype="application/x-www-form-urlencoded">
	        <p><i class="fa fa-user"></i>&nbsp;&nbsp;Username:</p>
    		<input type="text" class="radius-10" name="accountUser" title="Username required" placeholder="Username">
    		<p><i class="fa fa-list-ul"></i>&nbsp;&nbsp;Account Type:</p>
    		<select name="accountType" class="radius-10" >
    		    <option value="member">Member Account </option>
    		    <option value="model">Performer Account </option>
            	</select>
            	<p> </p>
        	<a id="btn" class="enviar"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Submit</a>
    	    </form>
	</section>
	<p>Your new password will be sent to you via email.</p>
	<p>The system will generate a new password for you. After you login again you can change it from the &quot;My Profile&quot; link in your account control panel.</p>
    </div>
</div>

<?
include("_main.footer.php");
?>