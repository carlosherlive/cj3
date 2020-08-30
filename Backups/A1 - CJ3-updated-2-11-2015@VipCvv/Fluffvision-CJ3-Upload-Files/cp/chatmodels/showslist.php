<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");



	while($row = mysql_fetch_array($result)) 

	{	$username=$row[user];	}

}

mysql_free_result($result);



$msgError="";

include("../../dbase.php");

$id=$_COOKIE["id"];

$model=$username;



if (isset($_POST[paymentSum])){

mysql_query("UPDATE chatmodelsstatus SET minimum='$_POST[paymentSum]' WHERE id = '$id' LIMIT 1");

$msgError="Value has been changed";

}

?>

<?
include("_models.header.php");
?><style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #FFFFFF;
	font-weight: bold;
}



-->
</style>

<table width="1223" border="0" align="center" cellpadding="7" cellspacing="0" bgcolor="#7D0000">

  <tr valign="top">

   <td height="113" class="form_definitions">      <p>&nbsp;</p>
      
	    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
		
        <ul id="css3menu1" class="topmenu">
	 <li class="topmenu"><a href="paymentop.php" style="height:10px;line-height:10px;">View Payments</a></li>
	<li class="topmenu"><a href="showslist.php" style="height:10px;line-height:10px;">View Show History</a></li>
	 

      </tr>

    </table>

      <p>&nbsp;</p>

      <table width="1223" height="37" border="0" cellpadding="0" cellspacing="0">

        <tr align="center">

          <td width="100" height="26"><strong>Member</strong></td>

          <td width="130"><strong>Date</strong></td>

          <td width="80"><strong>Length</strong></td>

          <td width="80"><strong>CPM     </strong></td>

          <td width="80"><strong>Percentage</strong></td>

          <td width="100"><strong>Earned       </strong></td>

          <td width="50"><strong>Paid</strong></td>

          <td width="100"><div align="center">
            <p><strong>Type</strong></p>
            </div></td>

        </tr>

      </table>

    </div>
    <div align="center">
      <table width="1223" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><?

	

	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400

	//$secondsAll=time();

		

	include('../../dbase.php');

	$count=0;

	$result = mysql_query("SELECT * FROM videosessions WHERE model='$model' ORDER BY date DESC");

	while($row = mysql_fetch_array($result)) 

	{

	$count++;

		

	$ammount= $row['ammount'];

	$member=$row['member'];

	$epercentage=$row['epercentage'];

	$duration=$row['duration'];

	$cpm=$row['cpm'];

	$type=$row['type'];

	

	if (($duration/60)<round($duration/60))

	{

	$tempMinutesPv=round($duration/60)-1;

	} else {

	$tempMinutesPv=$duration/60;

	}

	$tempSecondsPv=$duration % 60;

	
if($type=='show'){
	$ammount=floor( (    ($duration/60)*$cpm)*($epercentage/100)   ) ;}
if($type=='tip'){
	$ammount=floor( ($cpm)*($epercentage/100)   ) ;}
	

	if ($row[paid]!="1"){

	$paied="no";

	}else{

	$paied="yes";

	}

	echo'<table width="1223" border="0" cellpadding="0" cellspacing="0">

	      <tr align="center">

		  <td width="100">'.$member.'</td>

          <td width="130">'.date("d M Y, G:i:s", $row[date]) .'</td>

          <td width="80">'.($type=='tip'?"NA":$tempMinutesPv.":".$tempSecondsPv).'</td>

          <td width="80">'.$cpm .' Tokens</td>

          <td width="80">'.$epercentage.'%</td>

          <td width="100">$'.$ammount.'</td>

          <td width="50">'.$paied.'</td>

		  <td width="100">'.$type.'</td>

        </tr>

      </table>';

	 }

	 mysql_free_result($result);

	?></td>
        </tr>
      </table>
    </div></td>

  </tr>

</table>
<?
include("_models.footer.php");
?>
