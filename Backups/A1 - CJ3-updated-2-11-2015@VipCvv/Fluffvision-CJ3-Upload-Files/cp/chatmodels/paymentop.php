<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");



	while($row = mysql_fetch_array($result)) 

	{	$username=$row['user'];	}

}

mysql_free_result($result);

$welcomeQuery = "SELECT models FROM welcome"; 
	$resultModel = mysql_query($welcomeQuery) or die(mysql_error()); 
	$chkN = mysql_num_rows($resultModel) ; 
	if($chkN > 0 ) 
	{
		$valueWM = mysql_result($resultModel,0,'models'); 
	}
	else
	{
		$valueWM = "Welcome text not defined"; 
	}


$msgError="";

include("../../dbase.php");

$id=$_COOKIE["id"];

$model=$username;



if (isset($_POST['paymentSum'])){
$cpm=$_POST[cpm];
mysql_query("UPDATE chatmodels SET minimum='$_POST[paymentSum]',cpm='$cpm' WHERE id = '$id' LIMIT 1");

$msgError="Change Successful";

}

?>



<?
include("_models.header.php");
?><style type="text/css">
<!--



body,td,th {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
body {
	background-color: #8F0000;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	color: #FFFFFF;
	text-decoration: none;
}
a:hover {
	color: #FFCC00;
	text-decoration: none;
}
a:active {
	color: #FFFFFF;
	text-decoration: none;
}
#Layer1 {
	position:absolute;
	width:700px;
	height:425px;
	z-index:0;
	left: 40.5%;
	top: 8%;
	overflow-y: hidden;
	overflow-x: hidden;
	padding: 10pt;
}
-->
</style>


<table width="1223" border="0" align="center" cellpadding="7" bgcolor="#7D0000">

  <tr valign="top">

  

  <?

	$tempMinutesPv=0;

	$tempSecondsPv=0;

	$tempMoneyEarned=0;

	$tempMoneySent=0;

	$ammount=0;

 	$result = mysql_query("SELECT * FROM videosessions WHERE model='$model'");

	while($row = mysql_fetch_array($result)) 

		{

		$member=$row['member'];

		$epercentage=$row['epercentage'];

		$duration=$row['duration'];

		$cpm=$row['cpm'];

		$tempSecondsPv+=$row['duration'];



		//$ammount=round((($duration/60)*$cpm)*$epercentage/10000,2) ;

if($row['type']=='show')
{

$ammount=round((($duration/60)*$cpm)*($epercentage/100),2) ;
}
else
{
$ammount=round($cpm*($epercentage/100),2) ;
}

		$tempMoneyEarned+=$ammount;

		if ($row['paid']=="1"){ $tempMoneySent+=$ammount;}

		}

	mysql_free_result($result);

		

	

	//minimum payment & epercentage

	$result = mysql_query("SELECT minimum,epercentage,cpm FROM chatmodels WHERE id='".$id."' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{ 

	$tempMinimum=$row["minimum"];

	$tempCPM=$row['cpm'];

	$tempEPercentage=$row['epercentage'];

	}

	mysql_free_result($result);

  

  ?>

    
      <td height="113" class="form_definitions">      <p>&nbsp;</p>
      
	    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
		
        <ul id="css3menu1" class="topmenu">
	 <li class="topmenu"><a href="paymentop.php" style="height:10px;line-height:10px;">View Payments</a></li>
	<li class="topmenu"><a href="showslist.php" style="height:10px;line-height:10px;">View Show History</a></li>
	 

      </tr>

    </table>

      <br>

      <table width="100%"  border="0" align="center" cellpadding="2" cellspacing="0">

        <tr>

          <td colspan="2" align="left" valign="top"><p class="error"><strong>

            <?

			if (isset($msgError) && $msgError!="")

			{

			echo $msgError;

			}

			?>

            </p>

            <p class="form_definitions">

            <strong>You are currently receiving <? echo $tempEPercentage;?>% of your earnings.<br>

            You are currently charging  <? echo $tempCPM;?> Tokens

  per minute.</strong></p>
            <p class="form_definitions"><strong><br />
            </strong></p></td>
        </tr>

        <tr>

          <td width="50%" height="120" align="left" valign="top">Your earnings: $<? echo $tempMoneyEarned; ?><br>

Payouts so far: $<? echo $tempMoneySent; ?><br>

<b> Current account balance: $<? echo ($tempMoneyEarned-$tempMoneySent) ;?></b></td>

          <td width="50%" height="120" align="left" valign="bottom">          
		  </td>
        </tr>

        <tr>

          <td colspan="2" align="left" valign="top"><form name="form1" method="post" action="paymentop.php">

            <p align="left">$ <select name="paymentSum" id="paymentSum">
                <option value="100"  <? if ($tempMinimum=="100"){echo "selected";}?>>100</option>
                <option value="250"  <? if ($tempMinimum=="250"){echo "selected";}?>>250</option>
                <option value="500"  <? if ($tempMinimum=="500"){echo "selected";}?>>500</option>
                <option value="1000"  <? if ($tempMinimum=="1000"){echo "selected";}?>>1000</option>
                <option value="2500"  <? if ($tempMinimum=="2500"){echo "selected";}?>>2500</option>
                <option value="5000"  <? if ($tempMinimum=="5000"){echo "selected";}?>>5000</option>
              </select> 
              &nbsp;Minimum Payout Goal.</p>
<p align="left">
   &nbsp;&nbsp;
   <input size="5" name="cpm" value="<?=($tempCPM);?>"> 
  &nbsp;Tokens Per Minute.</p>
            <p align="left">
              &nbsp;&nbsp;<input name="image" type="image" src="../../images/update-btn.png" alt="" width="99" height="52" border="0" />
            </p>
          </form></td>
        </tr>
      </table>            
      <p><strong>Previous Payouts</strong></p>

      <p>	<?

	

	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400

	//$secondsAll=time();

		

	include('../../dbase.php');

	$count=0;

	$result = mysql_query("SELECT * FROM payments WHERE id='$id' ORDER BY date DESC");

	while($row = mysql_fetch_array($result)) 

	{

	$count++;	

	$ammount= $row['ammount'];

	echo'<table class="form_definitions" width="1223" bgcolor="#8F0000" border="0" align="center" cellpadding="2" cellspacing="1">

		<tr>

		<td class="barbg">'.$count.') <b>Amount: $'.$ammount .'</b> sent on '.date("d M Y, G:i", $row['date']).'</td>

		</tr> 

		<tr>

		<td class="tablebg"><p><b>Payout Method:</b> '.$row['method'].'<br><b>Payout Information: </b>'.$row['details'].'</p></td>

		</tr>

		</table>

		<br>';

	}

	mysql_free_result($result);

	?>

	</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>

  </tr>

</table>


<div id="Layer1"><h2>Site information & latest news.</h2>
  <h3>
    <?php 
		 	echo $valueWM; 
		 ?>	 
  </h3>
</div>



<?
include("_models.footer.php");
?>