<?

if(isset($_POST['accountUser']) && isset($_POST['accountPassword']))

{

	

include("dbase.php");

include("settings.php");

	if ($_POST['accountType']=="member")

	{

	$database="chatusers";

	} else if ($_POST['accountType']=="model")

	{

	$database="chatmodels";



	} else if ($_POST['accountType']=="studioop")

	{

	$database="chatoperators";

	}

	

	

	$userExists=false;

	$result = mysql_query("SELECT id,user,password,status FROM $database WHERE status!='pending' AND status!='' ");

	while($row = mysql_fetch_array($result)) 

	{

		$tempUser=$row["user"];

		$tempPass=$row["password"];

		$tempId=$row["id"];

		

		if ($_POST['accountUser']==$tempUser && md5($_POST['accountPassword'])==$tempPass)

		{

			if ($row["status"]=="blocked")

			{

			$userExists=true;

			$errorMsg="Account is blocked, please contact the administrator for more details";

			} else {

			

			$userExists=true;

			$currentTime=time();

			mysql_query("UPDATE $database SET lastLogIn='$currentTime' WHERE id = '$tempId' LIMIT 1");

			setcookie("usertype", $database, time()+3600000);

			setcookie("id", $tempId, time()+3600000);

			header("Location: cp/$database/");

			}

		}

	

	}

	if (!$userExists){

	$errorMsg="Wrong Username or password, Having trouble logging in? Try reseting your password.";

	}

	

	

} else if (isset($_GET['from']) && $_GET['from']=="recoverpass"){

	$errorMsg="Your new password has been sent to your email address";

} else {

	$errorMsg="";

}


include("_main.header.php");
?><style type="text/css">
<!--

-->
</style>

<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="938" height="505" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center" valign="middle" bgcolor="#8F0000"><form action="login.php" method="post" enctype="application/x-www-form-urlencoded" name="form1">
      <table width="900" height="450" border="0">
        <tr>
          <td><div align="center"><img src="images/white-bg-login.png" alt="Login System" width="760" height="335" border="0" usemap="#Map" />
              <map name="Map" id="Map">
                <area shape="rect" coords="341,78,627,133" href="login_member.php" />
                <area shape="rect" coords="341,175,628,230" href="login_model.php" />
              </map>
          </div></td>
        </tr>
      </table>
      
      </map>
    </form></td>
  </tr>
</table>
<p>

</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
  <?
include("_main.footer.php");
?>