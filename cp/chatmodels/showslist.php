<?
if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" ) {
	header("location: ../../login.php");
} else {
	include("../../dbase.php");
	$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row[user];
	}
}
mysql_free_result($result);

$msgError="";
include("../../dbase.php");
$id=$_COOKIE["id"];
$model=$username;
if (isset($_POST[paymentSum])) {
	mysql_query("UPDATE chatmodelsstatus SET minimum='$_POST[paymentSum]' WHERE id = '$id' LIMIT 1");
	$msgError="Value has been changed";
}
?>

<?
include("_models.header.php");
?>

<div class="body-container">
    <div  class="col-md-12" align="center">
     	<ul class="bar_profile topmenu" id="css-menu">
     	    <li class="topmenu col-md-2" align="left">
     	    	<a href="paymentop.php"><i class="fa fa-money"></i>&nbsp;&nbsp;View Payments</a>
     	    </li>
	    <h2 class="topmenu col-md-8" align="center">Session History</h2>
	    <li class="topmenu col-md-2" align="right">
	    	<a href="uploadpicture.php">View Pictures&nbsp;&nbsp;<i class="fa fa-picture-o"></i></a>
	    </li>
        </ul>
        <br><br><br><br>
    	<div class="w90">
    	    <table class="tab fond">
    	    	<tr align="center">
    	    	   <td class="style11" width="15%" height="49" valign="top">
    	    	   	<span>Member</span>
    	    	   </td>
    	    	   <td class="style11" width="15%" valign="top">
    	    	   	<span>Date</span>
    	    	   </td>
    	    	   <td class="style11" width="15%" valign="top">
    	    	   	<span>Length</span>
    	    	   </td>
    	    	   <td class="style11" width="15%" valign="top">
          		<span>CPM</span>
          	   </td>
    	    	   <td class="style11" width="10%" valign="top">
    	    	   	<span>Percentage</span>
    	    	   </td>
    	    	   <td class="style11" width="10%" valign="top">
    	    	   	<span>Earned</span>
    	    	   </td>
    	    	   <td class="style11" width="10%" valign="top">
    	    	   	<span>Paid</span>
    	    	   </td>
    	    	   <td class="style11" width="10%" valign="top">
    	    	   	<span>Type</span>
    	    	   </td>
    	        </tr>
    	    </table> 

    	    <div class="fond">
            <?
	    //$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	    //$secondsAll=time();
	    include('../../dbase.php');
	    $count=0;
	    $result = mysql_query("SELECT * FROM videosessions WHERE model='$model' ORDER BY date DESC");
	    while($row = mysql_fetch_array($result)) {
	    $count++;
	    $ammount= $row['ammount'];
	    $member=$row['member'];
	    $epercentage=$row['epercentage'];
	    $duration=$row['duration'];
	    $cpm=$row['cpm'];
	    $type=$row['type'];
	    if (($duration/60)<round($duration/60)) {
		$tempMinutesPv=round($duration/60)-1;
	    } else {
		$tempMinutesPv=$duration/60;
	    }
	    $tempSecondsPv=$duration % 60;
	    if($type=='show') {
		$ammount=floor((($duration/60)*$cpm)*($epercentage/100));
	    }
	    if($type=='tip') {
		$ammount=floor(($cpm)*($epercentage/100));
	    }
	    if ($row[paid]!="1") {
		$paied="no";
	    } else {
		$paied="yes";
	    }
	    echo'<table class="tab">
	      	<tr align="center">
		    <td class="style11" width="15%">'.$member.'</td>
          	    <td class="style11" width="15%">'.date("d M Y, G:i:s", $row[date]) .'</td>
          	    <td class="style11" width="15%">'.($type=='tip'?"NA":$tempMinutesPv.":".$tempSecondsPv).'</td>
          	    <td class="style11" width="15%">'.$cpm .' Tokens</td>
          	    <td class="style11" width="10%">'.$epercentage.'%</td>
          	    <td class="style11" width="10%">'.$ammount.' Tokens</td>
          	    <td class="style11" width="10%">'.$paied.'</td>
		    <td class="style11" width="10%">'.$type.'</td>
                </tr>
            </table>';
	    }
	    mysql_free_result($result);
	    ?>
	    </div>
	</div>
    </div>
</div>
<?
include("_models.footer.php");
?>
