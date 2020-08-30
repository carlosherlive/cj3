<? if (isset($_COOKIE["usertype"])) {
    include("_main.header.logged.in.php");	
} else {	 
    include("_main.header.php");
}
?>

<script>
if(navigator.userAgent.indexOf("Firefox") != -1) {
	window.location = "searchModel.php";
} else {
	window.location = "searchModel_ie.php";
}
</script>

<div class="body-container">
    <div  class="col-md-12" align="center">
        <div class="padi">
        <div  class="box_charging">
            <h1>SEARCH...</h1>
            <br><br>
            <h3><img src="images/loading.gif" alt=Search..."/><br>Please Wait...</h3>
        </div>
        </div>
    </div>
</div>

<?
include("_main.footer.php");
?>