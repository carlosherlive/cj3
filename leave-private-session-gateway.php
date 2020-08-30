<? if (isset($_COOKIE["usertype"])) {
    include("_main.header.logged.in.php");	
} else {	 
    include("_main.header.php");
}
?>

<script>
	location.replace("index.php");
</script>

<?
include("_main.footer.php");
?>
