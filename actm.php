<?
include("_main.header.php");
?>

<table width="720" height="450" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#8F0000">
  <tr>
    <td align="center" valign="middle"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="51"><p class="message"> 
        
<?
$result=mysql_query("SELECT email,user,password,emailtype,status from chatusers WHERE id = '$_GET[UID]' LIMIT 1");
while($row = mysql_fetch_array($result)) {
	$email=$row['email'];
	$user=$row['user'];
	$pass=$row['password'];
	$my_pass=$row['password'];
	$db_pass=md5($pass);
	$status=$row['status'];
	$emailtype=$row['emailtype'];
}
if ($status!="pending") {
echo '<center><h5>This account is already active</h5></center>';
} else {
	mysql_query("UPDATE chatusers SET password='$db_pass', status='active' WHERE id ='$_GET[UID]' LIMIT 1");	
	if ($emailtype=="text"){
	$charset="Content-type: text/plain; charset=utf-8\r\n";
	$message = "Here are your login details for your member account.
	Please keep a record of your login details for future use.
	
	Username: $user
	Password: $my_pass
	
	You can login at the following address:
	
	$siteurl/login.php?user=$user
	
	Thanks.
	
	
	The Webmaster 
	
	
	This is an automated system email, please do not reply!";
	} else if ($emailtype=="html") {
	$charset="Content-type: text/html; charset=utf-8\r\n";
	$message = "Here are your login details for your member account account.
	Please keep a record of your login details for future use.
	
	Username: $user
	Password: $my_pass
	
	You can login at the following address: 
	
	<a href='$siteurl/login.php?user=$user'>$siteurl/login.php?user=$user</a>
	
	
	The Webmaster
	
	 
	This is an automated system email, please do not reply!";
	} else {
	echo"Email variable not set";
	}
$subject = "Your login information at $siteurl"; 
mail($email, $subject, $message,
     "MIME-Version: 1.0\r\n".
     $charset.
     "From:$registrationemail\r\n".
     "Reply-To:$registrationemail\r\n".
     "X-Mailer: PHP/" . phpversion() );
echo '<h5>Activation Successful, You may now login to your member account</h5><a href="login.php">HERE</a>.';
}
?>

        </p></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
<?
include("_main.footer.php");
?>