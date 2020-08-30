<?
include("dbase.php");

include("settings.php");

$sql="UPDATE chatmodels set status='offline' where id='{$_COOKIE['id']}'";
mysql_query($sql);

setcookie("username", "loggedOut", time()-3600);

setcookie("usertype",  "loggedOut", time()-3600);

setcookie("id", "loggedOut", time()-3600);

echo "<META HTTP-EQUIV=\"Refresh\"
CONTENT=\"5; URL=index.php\">";



?>

<?
include("_main.header.php");
?>
<style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: regular;
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
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	color: #FFFFCC;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
.please-wait-text {color: #ffffff}

-->
</style>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="720" height="377" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#8F0000">

  <tr>

    <td height="377" align="center" valign="middle"><table width="522" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="361"><h3 align="center" class="please-wait-text">Please wait. Logging you out. 
        </h3>
          <div align="center">
  <table width="550" height="303" border="0" background="images/white-bg.png">
    <tr>
      <td height="299"><div align="center">
        <h3><img src="images/loading2.gif" alt="Logging Out" width="160" height="160" /></h3>
      </div></td>
    </tr>
  </table>
</div></p></td>
      </tr>
      <tr>
        
      </tr>
    </table>
    <br />
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="0" height="0">
      <param name="movie" value="logout_redirect.swf" />
      <param name="quality" value="high" />
      <embed src="logout_redirect.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="0" height="0"></embed>
    </object></td>

  </tr>
</table>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?
include("_main.footer.php");
?>
