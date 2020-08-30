<?

if($_POST[accountUser]!="")

{

	include("dbase.php");

include("settings.php");

	if ($_POST[accountType]=="member")

	{

	$database="chatusers";

	} else if ($_POST[accountType]=="model")

	{

	$database="chatmodels";



	} else if ($_POST[accountType]=="studioOp")

	{

	$database="chatoperators";

	}

	

	

	$userExists=false;

	$result = mysql_query("SELECT user,email,id FROM $database WHERE status!='pending' && status!='rejected'");

	while($row = mysql_fetch_array($result))

	{

		$tempUser=$row["user"];

		$tempEmail=$row["email"];

		$tempId=$row["id"];

		

		if ($_POST[accountUser]==$tempUser){

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

$charset = "Content-type: text/plain; charset=iso-8859-1\r\n";

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

	

	

} else

{

	$errorMsg="Please complete the username field";

}



?>



<?
include("_main.header.php");
?><style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
}
body {
	background-color: #8F0000;
}
a {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #FFFFFF;
	font-weight: bold;
}
a:visited {
	color: #FFFFFF;
}
a:hover {
	color: #EEEEEE;
}
a:active {
	color: #FFFFFF;
}
.style420 {font-size: 18px}
-->
</style>

<table width="100%" height="200" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#8F0000">

  <tr>

    <td align="center" valign="middle"><form action="lostpassword.php" method="post" enctype="application/x-www-form-urlencoded" name="form1">

      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="27%" border="0" align="center" cellpadding="0" bgcolor="#8F0000">

        <tr>

          <td colspan="3"><p align="center" class="style420">

            Password Reset

           

</p></td>
        </tr>

        <tr>

          <td align="right" class="">Username:</td>
          <td align="left" valign="top"><p align="center">

              <input name="accountUser" type="text" id="accountUser" size="24" maxlength="24">

          </p></td>

          <td align="left" valign="top" class="form_informations"><div align="left"></div></td>
        </tr>

        <tr>

          <td width="100" height="66" align="right" valign="middle" class=""><p>Account Type:</p>
            <p><br />
              </p></td>
          <td width="313" align="left" valign="top"><p align="center">

            <select name="accountType" id="select">

              <option value="member">Member Account </option>

              <option value="model">Performer Account </option>
            </select>

          </p></td>

          <td width="0" align="left" valign="top" class="form_informations"><div align="left"></div></td>
        </tr>

        <tr>

          <td align="right" valign="top" class="form_definitions"><div align="right"></div></td>

          <td align="center" valign="top"><INPUT TYPE="image" SRC="images/reset_password.png" HEIGHT="49" WIDTH="192" BORDER="0" ALT="Login"></td>

          <td align="left" valign="top" class="form_informations"><div align="left"></div></td>
        </tr>

        <tr>

          <td colspan="3" align="right" valign="top" class="form_definitions"><div align="right">
            <p align="center">Your new password will be sent to you via email. </p>
            <p><br />
            </p>
          </div>            
          <div align="left">The system will generate a new password for you. After you login again you can change it from the &quot;My Profile&quot; link in your account control panel. </div></td>
          </tr>
        <tr>
          <td colspan="3" align="right" valign="top" class="form_definitions">&nbsp;</td>
        </tr>
      </table>

    </form></td>

  </tr>

</table>


<p><br>
  
  
  
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


<p>&nbsp;</p>
<p>&nbsp;</p>
<?
include("_main.footer.php");
?>