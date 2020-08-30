<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" ) {
header("location: ../../login.php");
} else {
include("../../dbase.php");
$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row['user'];
	}
}
mysql_free_result($result);
$welcomeQuery = "SELECT models FROM welcome"; 
	$resultModel = mysql_query($welcomeQuery) or die(mysql_error()); 
	$chkN = mysql_num_rows($resultModel) ; 
	if($chkN > 0 ) {
		$valueWM = mysql_result($resultModel,0,'models'); 
	} else {
		$valueWM = "Welcome text not defined"; 
	}
$msgError="";
include("../../dbase.php");
$id=$_COOKIE["id"];
$model=$username;
if (isset($_POST['paymentSum'])) {
	$cpm=$_POST[cpm];
	mysql_query("UPDATE chatmodels SET minimum='$_POST[paymentSum]',cpm='$cpm' WHERE id = '$id' LIMIT 1");
	$msgError="Change Successful";
}
?>

<?
include("_models.header.php");
?>

<div class="body-container">
    <div  class="col-md-12" align="center">
    	<ul class="bar_profile topmenu" id="css-menu">
    	<?php
        require_once ('../../Mobile_Detect.php');
        $detect = new Mobile_Detect();
        if ($detect->isPuffin()) { // Detecta si es Puffin
	        echo '<li class="topmenu col-md-3" align="left">
     	        <a href="paymentop.php"><i class="fa fa-money"></i>&nbsp;&nbsp;View Payments</a>
     	    </li>
	        <h2 class="topmenu col-md-6" align="center">Account Settings</h2>
	        <li class="topmenu col-md-3" align="right">
	    	    <a href="uploadpicture.php">View Show History&nbsp;&nbsp;<i class="fa fa-list"></i></a>
	        </li>';
        } else {
            echo '<li class="topmenu col-md-2" align="left">
     	        <a href="paymentop.php"><i class="fa fa-money"></i>&nbsp;&nbsp;View Payments</a>
     	    </li>
	        <h2 class="topmenu col-md-8" align="center">Account Settings</h2>
	        <li class="topmenu col-md-2" align="right">
	    	    <a href="uploadpicture.php">View Show History&nbsp;&nbsp;<i class="fa fa-list"></i></a>
	        </li>';
        }
        ?>
        </ul>
        <br/><br/><br/><br/>
        <?
	$tempMinutesPv=0;
	$tempSecondsPv=0;
	$tempMoneyEarned=0;
	$tempMoneySent=0;
	$ammount=0;
 	$result = mysql_query("SELECT * FROM videosessions WHERE model='$model'");
	while($row = mysql_fetch_array($result)) {
		$member=$row['member'];
		$epercentage=$row['epercentage'];
		$duration=$row['duration'];
		$cpm=$row['cpm'];
		$tempSecondsPv+=$row['duration'];
		if($row['type']=='show') {
			$ammount=round((($duration/60)*$cpm)*($epercentage/100),2) ;
		} else {
			$ammount=round($cpm*($epercentage/100),2) ;
		}
		$tempMoneyEarned+=$ammount;
		if ($row['paid']=="1") {
			$tempMoneySent+=$ammount;
		}
	}
	mysql_free_result($result);

	//minimum payment & epercentage
	$result = mysql_query("SELECT minimum,epercentage,cpm FROM chatmodels WHERE id='".$id."' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$tempMinimum=$row["minimum"];
		$tempCPM=$row['cpm'];
		$tempEPercentage=$row['epercentage'];
	}
	mysql_free_result($result);
  	?>
  	<ul class="bar_profile">
            <div class="w90 pdx">
            	<li class="col-md-5 li_group" align="center">
            	    <h2 class="tit">Previous Payouts</h3>
      		    <table>
        		<tr>
          		    <td>
          		    	<h4 class="error"><?if (isset($msgError) && $msgError!="") { echo $msgError; }?></h4>
            		    	<h4>You are currently receiving <? echo $tempEPercentage;?>% of your earnings.<br>You are currently charging <? echo $tempCPM;?> Tokens per minute.</strong></h4>
            		    	<br>
            		    </td>
        		</tr>
        		<tr>
          		    <td>
          		      	<p class="txt_red">Your earnings:&nbsp;&nbsp;<b><? echo $tempMoneyEarned; ?>&nbsp;&nbsp;Tokens</b></p>
          		      	<p class="txt_red">Payouts so far:&nbsp;&nbsp;<b><? echo $tempMoneySent; ?>&nbsp;&nbsp;Tokens</b></p>
          		      	<p class="txt_red"><b>Current account balance:&nbsp;&nbsp;<? echo ($tempMoneyEarned-$tempMoneySent) ;?>&nbsp;&nbsp;Tokens</b></p>
          		    </td>
        		</tr>
        		<tr>
          		    <td>
          		    	<form name="form1" method="post" action="paymentop.php">
            			    <p class="txt_red">
            			    	<select name="paymentSum" id="paymentSum">
                				<option value="100"  <? if ($tempMinimum=="100"){echo "selected";}?>>100 Tokens</option>
                				<option value="250"  <? if ($tempMinimum=="250"){echo "selected";}?>>250 Tokens</option>
                				<option value="500"  <? if ($tempMinimum=="500"){echo "selected";}?>>500 Tokens</option>
                				<option value="1000"  <? if ($tempMinimum=="1000"){echo "selected";}?>>1000 Tokens</option>
                				<option value="2500"  <? if ($tempMinimum=="2500"){echo "selected";}?>>2500 Tokens</option>
                				<option value="5000"  <? if ($tempMinimum=="5000"){echo "selected";}?>>5000 Tokens</option>
              			    	</select><b>&nbsp;Minimum Payout Goal.</b>
              			    </p>
				    <p class="txt_red">
				    	<input size="10" name="cpm" value="<?=($tempCPM);?>"><b>&nbsp;&nbsp;Tokens Per Minute.</b>
				    </p>
              			    <input name="image" type="submit" class="update" alt="Update Now" value="Update Now"/>
          			</form>
          		    </td>
        		</tr>
        	    </table>
        	</li>
  	 	<li class="col-md-7 li_group" align="center">
  	 	    <h2 class="tit">Site information & latest news.</h3>
  	 	    <br><br>
		    <div id="Layer1" class="padd banner-youtube">
  			<?php echo $valueWM; ?>
		    </div>
		</li>
        	<li class="col-md-12 li_group" align="center">
        	    <h2 class="tit" align="center">Previous Payouts</h3>
        	    <table>
        		<tr>
        		    <td>
        			<?
				include('../../dbase.php');
				$count=0;
				$result = mysql_query("SELECT * FROM payments WHERE id='$id' ORDER BY date DESC");
				while($row = mysql_fetch_array($result)) {
				$count++;
				$ammount= $row['ammount'];
				echo'<table>
				<tr>
				    <td>'.$count.') <b>Amount: $'.$ammount .'</b> sent on '.date("d M Y, G:i", $row['date']).'</td>
				</tr> 
				<tr>
				    <td>
					<p><b>Payout Method:</b> '.$row['method'].'<br><b>Payout Information: </b>'.$row['details'].'</p>
				    </td>
				</tr>
				</table>
				<br><br>';
				}
				mysql_free_result($result);
				?>
			    </td>
  			</tr>
  	 	    </table>
  	 	</li>
	    </div>
	</ul>
    </div>
</div>

<?
include("_models.footer.php");
?>