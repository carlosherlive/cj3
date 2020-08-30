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

			setcookie("usertype", $database, time()+360000);

			setcookie("id", $tempId, time()+360000);

			header("Location: cp/$database/");

			}

		}

	

	}

	if (!$userExists){

	$errorMsg="Wrong Username or password";

	}

	

	

} else if (isset($_GET['from']) && $_GET['from']=="recoverpass"){

	$errorMsg="Your new password has been sent to your email address";

} else {

	$errorMsg="";

}


include("_main.header.php");
?>


 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
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

<style type="text/css">
<!--








body,td,th {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;

}
body {
	background-color: #8F0000;
	margin-left: 0px;
	margin-right: 0px;
	background-image: url(images/asses-bg.jpg);
	background-repeat: no-repeat;
}
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style4 {
	color: #FFFFFF;
	font-size: 14px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.style5 {font-size: 14px; font-weight: bold; font-family: Arial, Helvetica, sans-serif; }
#Layer1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 170px;
	top: -114px;
}
a {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #FFFFFF;
}
.style7 {font-size: 24px}
.style8 {font-size: 18px}
.style9 {font-size: 12px}

}


::-webkit-input-placeholder {
   color: #8f0000;
}

:-moz-placeholder { /* Firefox 18- */
   color: #8f0000;  
}

::-moz-placeholder {  /* Firefox 19+ */
   color: #8f0000;  
}

:-ms-input-placeholder {  
   color: #8f0000;  
}


-->
</style>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<table width="760" height="335" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>

          <td colspan="2"><p align="center"><?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?></p></td>
  </tr>
  <tr>

    <td align="center" valign="middle"><!--<form action="login.php" method="post" enctype="application/x-www-form-urlencoded" name="form1">
      <table width="500" border="0" align="center">

        <tr>

          <td colspan="2"><p align="right"><?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>
          </span></p>
 
              

            </p></td>
        </tr>

        <tr>

          <td width="1" height="41" align="right" valign="top"><div align="right" class="style5"></div></td>

          <td width="564" align="left" valign="top">
		  
		  <div align="right">
           
          <br />
              
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="accountUser" style="font-size:20px" type="text" id="accountUser" style="width:175px;  height:30px; background-image: url(images/red-page-bg.png); " value="<? echo $_GET[user];?>" size="18" placeholder="username" maxlength="24" />
&nbsp;               
              <input name="accountPassword" style="font-size:20px"  type="password" id="accountPassword2" style="width:175px; height:30px; background-color: #000000;" size="18" placeholder="password" maxlength="24" />
              <br />
            </p>
          </div>
		  
		  
		  </td>
          </tr>

        <tr>

          <td align="right" valign="top"><div align="right" class="style4"></div></td>

          <td align="left" valign="top"><div align="center"></div></td>
          </tr>

        <tr>

          <td align="right" valign="top"><div align="right" class="style5"></div></td>

          <td align="left" valign="top" color="000000"><div id="Layer1">
                <select name="accountType" id="select">
                  <option value="member" selected="selected">Member</option>
                  <option value="model">Model</option>
                </select>
</div>
            <div align="left"></div></td>
          </tr>

        <tr>

          <td align="right" valign="top" class="form_definitions">&nbsp;</td>

          <td align="left" valign="top"><div class="hoverbox" align="center" width="100">
              
                <div align="center">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
<INPUT TYPE="image" SRC="images/login.png" HEIGHT="52" WIDTH="99" BORDER="0" ALT="Login">
                </div>
          </div>
            <div align="left"></div></td></tr>

        <tr>

          <td align="right" valign="top" class="form_definitions">&nbsp;</td>

          <td align="right" valign="top"><p align="center"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not yet a member? <a href="registration/user.php" class="style9">Register Now</a>. &nbsp;</p>
            <p align="center"><a href="lostpassword.php" class="left style1 "> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Click Here! to reset your password.</a></p>
            <p>&nbsp;</p>            </td>
          </tr>
      </table>


    </form>-->
<style>

.login {
    width: 300px;
    height: 285px;
    overflow: hidden;
    background: #1e1e1e;
    border-radius: 6px;
    margin: 50px auto;
    box-shadow: 0px 0px 50px rgba(0,0,0,.8);
}

.login .titulo {
    width: 298px;
    height: 14px;
    padding-top: 13px;
    padding-bottom: 13px;
    font-size: 14px;
    text-align: center;
    color: #bfbfbf;
    font-weight: bold;
    background: #121212;
    border: #2d2d2d solid 1px;
    margin-bottom: 30px;
    border-top-right-radius: 6px;
    border-top-left-radius: 6px;
    font-family: Arial;
}

.login form {
    width: 240px;
    height: auto;
    overflow: hidden;
    margin-left: auto;
    margin-right: auto;
}

.login form input[type=text], .login form input[type=password] {
    width: 200px;
    font-size: 12px;
    padding-top: 14px;
    padding-bottom: 14px;
    padding-left: 40px;
    border: none;
    color: #bfbfbf;
    background: #141414;
    outline: none;
    margin: 0;
}

.login form input[type=text] {
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}

.login form input[type=password] {
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;

}

.login form .enviar {
    width: 240px;
    height: 12px;
    display: block;
    padding-top: 14px;
    padding-bottom: 14px;
    border-radius: 6px;
    border: none;
    background: #8f0000;
    text-align: center;
    text-decoration: none;
    font-size: 12px;
    font-weight: bold;
    color: #FFF;
    text-shadow: 0 -1px #1d7464, 0 1px #7bb8b3;
    font-family: Arial;
}

.login .olvido {
    width: 240px;
    height: auto;
    overflow: hidden;
    padding-top: 25px;
    padding-bottom: 25px;
    font-size: 10px;
    text-align: center;
}

.login .olvido .col {
    width: 50%;
    height: auto;
    float: left;
}

.login .olvido .col a {
    color: #fff;
    text-decoration: none;
    font: 12px Arial;
}
::-webkit-input-placeholder { /* WebKit browsers */
    color:    #fff;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:    #ff;
    opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:    #fff;
    opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
    color:    #fff;
}
</style>
<section class="login">
	<div class="titulo">Model Login</div>
	<form id="loginform" action="" method="post" enctype="application/x-www-form-urlencoded">
    	<input type="text" name="accountUser" title="Username required" placeholder="Username">
        <input type="password" name="accountPassword" title="Password required" placeholder="Password">
<input type="hidden" name="accountType" value="model">
        <div class="olvido">
        	<div class="col"><a href="registration/model.php" title="Ver Carásteres">Register</a></div>
            <div class="col"><a href="lostpassword.php" title="Recuperar Password">Forgot Password?</a></div>
        </div>
        <a id="btn" class="enviar">Submit</a>
    </form>
</section></td>

  </tr>

</table>






