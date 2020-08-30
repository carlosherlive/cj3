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

<div class="body-container">
    <div  class="col-md-12" align="center">
        <div class="padi">
        <div  class="box_charging">
            <h1>Please wait. Logging you out. </h1>
            <br><br>
            <h3><img src="images/loading.gif" alt="Logging Out"/><br>Please Wait...</h3>
        </div>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="0" height="0">
      	    <param name="movie" value="logout_redirect.swf" />
            <param name="quality" value="high" />
      	<embed src="logout_redirect.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="0" height="0"></embed>
    </object>
        </div>
    </div>
</div>

<?
include("_main.footer.php");
?>
