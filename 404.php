<?
if (isset($_COOKIE["usertype"])) {
	include("_main.header.logged.in.php");	
	} else {
	include("_main.header.php");		  
}
?>

<div class="body-container">
    <div  class="col-md-12" align="center">
        <div class="error">
            <h1>Error 404</h1>
            <h2>Something is wrong here!</h2>
        </div>
        <br>
        <div class="line"></div>
        <div class="error">
            <h3>Uups! Sorry, an error has occurred. The requested page is not available!</h3>
            <br>
            <div class="w50">
            	<a href="index.php" class="enviar bt_s"><i class="fa fa-home"></i>&nbsp;&nbsp;Go to Home Page</a>
            </div>
        </div>
    </div>
</div>

<?
	include("_main.footer.php");
?>