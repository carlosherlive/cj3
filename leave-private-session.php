<? if (isset($_COOKIE["usertype"])) {
    include("_main.header.logged.in.php");	
} else {	 
    include("_main.header.php");
}
?>

<?
include("dbase.php");
include("settings.php");
echo "<META HTTP-EQUIV=\"Refresh\"
CONTENT=\"5; URL=index.php\">";
?>

<div class="body-container">
    <div  class="col-md-12" align="center">
        <div class="padi">
        <div  class="box_charging">
            <h1>END OFF SHOW</h1>
            <br><br>
            <h3><img src="images/loading.gif" alt="Logging Out"/><br>Please Wait...</h3>
        </div>
        </div>
    </div>
</div>

<?
include("_main.footer.php");
?>
