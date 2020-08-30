<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" ) {
	header("location: ../../login.php");
} else {
	include("../../dbase.php");
	$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row[user];
	}
}
?>

<?
$msgError="";
include("../../dbase.php");
$id=$_COOKIE["id"];
$member=$username;
if (isset($_POST[paymentSum])) {
	mysql_query("UPDATE chatmodelsstatus SET minimum='$_POST[paymentSum]' WHERE id = '$id' LIMIT 1");
	$msgError="Value has been changed";
}
?>

<?
include("_members.header.php");
?>

<div class="body-container">
    <div  class="col-md-12" align="center">
     	<ul class="bar_profile topmenu" id="css-menu">
     	    <li class="topmenu col-md-2" align="left">
     	    	<a href="favorites.php"><i class="fa fa-star"></i>&nbsp;&nbsp;My Favorites</a>
     	    </li>
	    <h2 class="topmenu col-md-8" align="center">Session History</h2>
	    <li class="topmenu col-md-2" align="right">
	    	<a href="buyminutes.php">My Money&nbsp;&nbsp;<i class="fa fa-money"></i></a>
	    </li>
        </ul>
        <br/><br/><br/><br/>
    	<div class="w90">
    	    <table class="tab fond">
    	    	<tr align="center">
    	    	   <td class="style11" width="25%" height="49" valign="top">
    	    	   	<span>Performer</span>
    	    	   </td>
    	    	   <td class="style11" width="20%" valign="top">
    	    	   	<span>Date</span>
    	    	   </td>
    	    	   <td class="style11" width="15%" valign="top">
    	    	   	<span>Duration</span>
    	    	   </td>
    	    	   <td class="style11" width="15%" valign="top">
    	    	   	<span>CPM</span>
    	    	   </td>
    	    	   <td class="style11" width="15%" valign="top">
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
            $result = mysql_query("SELECT * FROM videosessions WHERE member='$member' ORDER BY date DESC");
	    $total=mysql_num_rows($result);
	    $perpage=35;
	    if($_GET[page]) {
		$page=$_GET[page];
	    } else {
		$page=1;
	    }
	    $start=($page-1)*$perpage;
	    $result = mysql_query("SELECT * FROM videosessions WHERE member='$member' ORDER BY date DESC LIMIT $start,$perpage");
	    while($row = mysql_fetch_array($result)) {
	    	$count++;
		$ammount= $row[ammount];
		$model=$row[model];
		$epercentage=$row[epercentage];
		$duration=$row[duration];
		$cpm=$row[cpm];
		$type=$row['type'];
		if (($duration/60)<round($duration/60)) {
		    $tempMinutesPv=round($duration/60)-1;
		} else {
		    $tempMinutesPv=$duration/60;
		}
		$tempSecondsPv=$duration % 60;
		$ammount=round((($duration/60)*$cpm));
		echo'<table class="tab">
        	<tr align="center">
          	    <td class="style11" width="25%">'.$model.'</td>
          	    <td class="style11" width="20%">'.date("d M Y, G:i:s", $row[date]) .'</td>
          	    <td class="style11" width="15%">'.(($type=='tip')?'NA':$tempMinutesPv.":".$tempSecondsPv).'</td>
          	    <td class="style11" width="15%">'.$cpm.' Tokens</td>
          	    <td class="style11" width="15%">'.$ammount.' Tokens</td>
		    <td class="style11" width="10%">'.$type.'</td>
        	</tr>
      	        </table>';
	    }
	    ?>
	    </div>
	<br>
	    <div align="center">
	    	<table class="tab">
    		    <tr>
      			<td align="center">
      			<span class="pages">Pages&nbsp;&nbsp;&nbsp;
        		<?php 
			if($total) {
			    $pages=range(1,ceil($total/$perpage)); 
			    foreach($pages as $pagez) {
				if($pagez==$page) {
				    echo "<b>$pagez</b>";
				    echo  "&nbsp;&nbsp;";
				} else {
				    echo "<a href=\"viewsessions.php?page=$pagez\">$pagez</a>";
				    echo  "&nbsp;";
				} 
			    }
			}
			?>
      			</span>
      			</td>
    		    </tr>
  		</table>
  		<br><br>
	    </div>
	</div>
    </div>
</div>

<?
include("_members.footer.php");
?>