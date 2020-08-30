<?
include("_main.header.php");
?>
<?php
error_reporting(0); // Turn off all error reporting
echo "<META HTTP-EQUIV=\"Refresh\"
CONTENT=\"3; URL=cp/chatusers/favorites.php\">";
	include('dbase.php');
	$modelUser =  $_GET['user']; 
	$memberId =  $_COOKIE['id'];

	$query = "SELECT * FROM chatusers where id='$memberId'";
	$result = mysql_query($query) or die(mysql_error()); 
	$memberName = mysql_result($result,0,'user'); 
	$date = date('Y-m-d:h:m:s');
	$ok = $_GET['ok'];
	
	$chkQuery = "SELECT * FROM favorites where member='$memberName' AND model = '$modelUser'"; 
	$counterQ = mysql_query($chkQuery) or die ( mysql_error()); 
	$numQ = mysql_num_rows($counterQ) ; 
	
	if($numQ > 0 ) {
		$msG = " "; 
	} else {
		$insertedQuery = "INSERT into favorites values ('$memberName','$modelUser','$date')";
		$val= mysql_query($insertedQuery); 
		$msG = " "; 
	}
?>

<table height="20" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#8F0000" style="height:200px; width:550px;">
    <tr>
	<td valign="bottom">
	
<?
echo $msG;
?>

	</td>
    </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">One moment please... </p>
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