<?
if(isset($_POST['epc']) && isset($_POST['cpm'])){
include('../dbase.php');
include('../settings.php');
mysql_query("UPDATE chatmodels SET cpm='$_POST[cpm]',epercentage='$_POST[epc]' WHERE id = '$_POST[id]' LIMIT 1");

}
?>


<?
function GetAge($Birthdate)
#
{
#
        // Explode the date into meaningful variables
#
        list($BirthDay,$BirthMonth,$BirthYear) = explode("/", $Birthdate);
#
        // Find the differences
#
        $YearDiff = date("Y") - $BirthYear;
#
        $MonthDiff = date("m") - $BirthMonth;
#
        $DayDiff = date("d") - $BirthDay;
#
        // If the birthday has not occured this year
#
        if ($DayDiff < 0 || $MonthDiff < 0)
#
          $YearDiff--;
#
        return $YearDiff;
#
}
?>




<?
include("_header-admin.php")
?>
<?
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	include('../dbase.php');
	
	
	$result = mysql_query("SELECT * FROM chatmodels WHERE id='$_GET[id]' LIMIT 1");
		while($row = mysql_fetch_array($result)) 
		{
		$tempUser=$row["user"];
		$tempPass1=$row["password"];
		$tempPass2=$row["password"];
		$tempEmail=$row["email"];
		$status=$row['status'];
		$tL1=$row["language1"];
		$tL2=$row["language2"];
		$tL3=$row["language3"];
		$tL4=$row["language4"];
		
		$tBirthD=$row["birthDate"];
                $tBirthD= GetAge($row["birthDate"]);
		//$birthdateString = date("d F Y,H:i",$row["birthDate"]);
		$birthDateString = $row["birthDate"];
		

		$tBraS=$row["braSize"];
		$tBirthS=$row["birthSign"];
		$tMessage=$row["message"];
		$tFantasies=$row["fantasies"];
		$tPosition=$row["position"];
		$tEthnic=$row["ethnicity"];
		$tEyeC=$row["eyeColor"];
		$tHeight=$row["height"];
		$tWeight=$row["weight"];
		$tHeightM=$row["heightMeasure"];
		$tWeightM=$row["weightMeasure"];
		
		$cpm=$row["cpm"];
		$epc=$row["epercentage"];
		$tCategory=$row["category"];
		$rowdate=$row["dateRegistered"];
		$date=date("d F Y,H:i",$rowdate);
		$tempName = $row["name"];
		
		$result3=mysql_query("SELECT name FROM countries WHERE id='$row[country]' LIMIT 1");
			while($row3 = mysql_fetch_array($result3)) {
			$tempCountry=$row3[name];
			}
		
		$tempState=$row["state"];
		$tempZip = $row["zip"];
		$tempCity=$row["city"];
		$tempAdress = $row["adress"];
		$tempPMethod=$row["pMethod"];
		$tempPInfo=$row["pInfo"];
		$tOwner=$row['owner'];
		$tempIdmonth=$row['idmonth'];
		$tempIdyear=$row['idyear'];
		$tempIdtype=$row['idtype'];
		$tempIdnumber=$row['idnumber'];
		$tempSs=$row['ssnumber'];
		$tempPhone=$row['phone'];
		$tempBirth=$row['birthplace'];
		$tempYahoo=$row['yahoo'];	
		$tempMsn=$row['msn'];	
		$tempIcq=$row['icq'];	
		
		$tHcolor=$row['hairColor'];
		$tHlength=$row['hairLength'];
		$tPhair=$row['pubicHair'];	
		$tBfrom=$row['broadcastplace'];
		$tHobbies=$row['hobby'];
		$tempFax=$row['fax'];	
		

		}
	?>
	
	<style type="text/css">
<!--


.selector
{
  background-image: url();
  background-color: #FFFFFF;
  
  position: fixed;
  
  top: 0;
  left: 0;
  width: 100%;
  height: 40px;
  z-index: 10;

}


.wordwrapper
{
    min-width: 300px;
    word-wrap: break-word;
    overflow: auto;
}


-->

</style>
	
	
	
	
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">
  <table width="1010" height="70" background="../images/rounded.php.png">
    <tr>
      <td background="images/rounded.png"><div align="center"><h1><? echo $tempUser; ?></h1></div></td>
    </tr>
  </table>
</div>
<table width="1010" height="214" align="center" cellpadding="20" bgcolor="#F2F2F2" class="form_definitions">
  <tr>
    <td width="250" height="96" align="center" valign="top"><p><img height="200" width="250" src="../models/<? echo $tempUser."/thumbnail.jpg" ?>"></p>
    </td>
    <td width="234" valign="top"><p style="36px"><strong><? echo $tempUser; ?><br>
          <span class="a_small_title">Status: <? echo $status;?></span>      </strong></p>
		  



<div calss="wordwrapper">

<?PHP


	  echo '<table border="0" cellspacing="0" cellpadding="0" class="wordwrapper" style="table-layout:fixed" width="130%" height="5%">

  <tr>
    
    <td width="130%" height="5%" class="wordwrapper">'.$tMessage.' 
    </td>
  </tr>
</table>'; 
	  

	  ?>
</div>



      
      <p><strong class="big_title"><br>
      </strong> </p></td>
    <td width="486">
      <div align="left">
        <table width="150" height="96"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
          <form name="form1" method="post" action="deleteaccount.php">
            <td width="292" height="30">
              <div align="center">
                <input type="submit" name="Submit2" value="Delete Account">
                <input name="id" type="hidden" id="id5" value="<? echo $_GET['id']; ?>">
                <input name="type" type="hidden" id="type4" value="model">
                <input name="username" type="hidden" id="type5" value="<? echo $tempUser; ?>">
                <input name="date" type="hidden" id="username" value="<? echo $date; ?>">
              </div></td>
          </form>
        </tr>
        <tr>
<? if($status!='blocked'){ 
	echo ' <form name="form2" method="post" action="blockaccount.php">';
} else {
	echo ' <form name="form2" method="post" action="activateaccount.php">';
}
?> 
			 
                <td height="30">
                  <div align="center">
                    <input type="submit" name="Submit22" value="<? if($status!='blocked'){echo 'Block Account';} else {echo 'Activate Account';}?> ">
                    <input name="id" type="hidden" id="id35" value="<? echo $_GET['id']; ?>">
                    <input name="type" type="hidden" id="type" value="model">
                    <input name="username" type="hidden" id="username" value="<? echo $tempUser; ?>">
                    <input name="date" type="hidden" id="date23" value="<? echo $date; ?>">
            </div></td>
          </form>
        </tr>
        <tr>
          <form name="form3" method="post" action="sendemail.php">
            <td height="33">
              <div align="center">
                <input type="submit" name="Submit222" value="Send Email">
                <input name="id" type="hidden" id="id45" value="<? echo $_GET['id']; ?>">
                <input name="type" type="hidden" id="type2" value="model">
                <input name="username" type="hidden" id="username4" value="<? echo $tempUser; ?>">
                <input name="email" type="hidden" id="date4" value="<? echo $tempEmail; ?>">
              </div></td>
          </form>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
<div align="center">
  <table width="1010" border="0" cellpadding="5">
    <tr>
      <td width="493"><h1>Performers Details  </h1></td>
      <td width="491"><h1>Performers Private Information</h1></td>
    </tr>
  </table>
</div>
<table width="1010"  border="0" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td width="471" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
      <tr>
        <td width="133" height="19" align="left" valign="top" class="form_definitions"><strong>User Name</strong></td>
        <td width="501" align="left" valign="top" class="form_definitions"><strong><? echo $tempUser; ?></strong></td>
      </tr>
      <tr>
        <td align="left" valign="top" class="form_definitions">Email</td>
        <td align="left" valign="top" class="form_definitions"><? echo $tempEmail; ?></td>
      </tr>

      <tr>
        <td align="left" valign="top" class="form_definitions">Language</td>
        <td align="left" valign="top" class="form_definitions"><? echo $tL1; ?></td>
      </tr>
      <tr>
        <td align="left" valign="top" class="form_definitions">Race</td>
        <td align="left" valign="top" class="form_definitions"><? echo $tEthnic; ?></td>
      </tr>
    </table></td>
    <td width="516" valign="top"><div align="center">
      <table width="100%"  border="0" cellpadding="5" cellspacing="2">
        <tr>
          <td width="179" align="left" valign="top" class="form_definitions">Full Name:</td>
          <td width="311" align="left" valign="top" class="form_definitions"><? echo $tempName; ?></td>
        </tr>
        <tr>
          <td width="179" align="left" valign="top" class="form_definitions">Country:</td>
          <td align="left" valign="top" class="form_definitions"><? echo $tempCountry; ?></td>
        </tr>
        <tr>
          <td width="179" align="left" valign="top" class="form_definitions">State:</td>
          <td align="left" valign="top" class="form_definitions"><? echo $tempState; ?></td>
        </tr>
        <tr>
          <td width="179" height="21" align="left" valign="top" class="form_definitions">City:</td>
          <td align="left" valign="top" class="form_definitions"><? echo $tempCity; ?></td>
        </tr>
        <tr>
          <td width="179" align="left" valign="top" class="form_definitions">Adress:</td>
          <td align="left" valign="top" class="form_definitions"><? echo $tempAdress; ?></td>
        </tr>
        <tr>
          <td width="179" align="left" valign="top" class="form_definitions">Zip Code:</td>
          <td align="left" valign="top" class="form_definitions"><? echo $tempZip; ?></td>
        </tr>
        <tr class="form_definitions">
          <td width="179" align="left">Phone#:</td>
          <td><? echo $tempPhone; ?></td>
        </tr>
        <tr>
          <td align="left" class="form_definitions">Age:</td>
          <td align="left" class="form_definitions"><? echo $tBirthD; ?></td>
        </tr>
	<tr>
	  <td align="left" class="form_definitions">Birth Date:</td>
	  <td align="left" class="form_definitions"><?=$birthDateString?></td>
        <tr>
          <td width="179" align="left" class="form_definitions">Date Registered: </td>
          <td align="left" class="form_definitions"><? echo $date;?> </td>
        </tr>
      </table>
    </div>
    <div align="center"></div></td>
  </tr>
</table>
<form name="form1" method="post" action="">
  <table width="1010"  border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#F2F2F2" class="form_definitions">
    <tr>
      <td bgcolor="#F2F2F2"><p> Earning percentage.<br>
              <input name="epc" type="text" id="epc" value="<? echo $epc;?>" size="2" maxlength="2">
          %<br>
          <br />
          Cost Per minute<br>
          <input name="cpm" type="text" id="cpm4" value="<? echo $cpm;?>" size="4" maxlength="4">
           Now Charging (<? echo $cpm ?>  Tokens per minute) <br>
           <br />
          <input type="submit" name="Submit" value="   Save   ">
          <input name="id" type="hidden" id="id4" value="<? echo $_GET['id']; ?>">
      </p></td>
    </tr>
  </table>
</form>
<p>
  <?php
$result = mysql_query("SELECT * FROM videosessions WHERE model='$tempUser' ORDER BY date DESC");
if($_POST[vs])
{
$result = mysql_query("SELECT * FROM videosessions WHERE model='$tempUser' AND member like '%$_POST[vs]%' ORDER BY date DESC");
}
$total=mysql_num_rows($result);
$perpage=35;
if($_GET[page])
{
$page=$_GET[page];
}
else
{
$page=1;
}
$start=($page-1)*$perpage;
if(!$_POST[vs])
{
$result = mysql_query("SELECT * FROM videosessions WHERE model='$tempUser' ORDER BY date DESC LIMIT $start,$perpage");
}
echo '<table width="1010"  border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#ffffff">
<tr><td width="100"><form method="post" action=""><input type="text" name="vs"/> <input type="submit" value=" Search "/></form></td></tr>
<tr><td>Member</td><td>Date</td><td>Duration</td><td>CPM</td><td>Performer earned</td><td>Type</td></tr>';

while($row = mysql_fetch_array($result)) 
{
echo "<tr><td>$row[member]</td><td>".date("d M Y, G:i:s", $row[date])."</td><td>".(($row[type]=='show')?"$row[duration] seconds":"NA")."</td><td>$row[cpm] tokens</td><td>$".(($row[type]=='show')?round((($row[duration]/60)*$row[cpm])*($row[epercentage]/100),1):round(($row[cpm])*($row[epercentage]/100),1))."</td><td>$row[type]</td></tr>";
}
if(!$_POST[vs])
{
if($total)  
{
 $pages=range(1,ceil($total/$perpage)); 
echo "<tr><td>";
foreach($pages as $pagez) 
{
if($pagez==$page) { echo "<b>$pagez</b>";echo  " ";}
else { echo "<a href=\"$_SERVER[REQUEST_URI]&page=$pagez\">$pagez</a>"; echo  " ";} 
}
echo "</td></tr>";
}
}
echo '</table>';
?>
</p>
<p>
  
  
  <?
$tempMinutesPv=0;
$tempSecondsPv=0;
$sitemoney=0;
$tempMoneyEarned=0;
$tempMoneySent=0;
$tempMoneyEarned30=0;
$ammount=0;
$result = mysql_query("SELECT * FROM videosessions WHERE model='$tempUser'");
while($row = mysql_fetch_array($result)) 
	{
	$member=$row['member'];
	$epercentage=$row['epercentage'];
	$duration=$row['duration'];
	$cpm=$row['cpm'];
	$tempSecondsPv+=$row['duration'];
if($row['type']=='show')
{
$ammount=(($duration/60)*$cpm)*($epercentage/100) ;
$sitemoney+=   (  ($duration/60)*$cpm)  *((100-$epercentage)/100) ;
}
else
{
$ammount=($cpm)*($epercentage/100) ;
$sitemoney+=($cpm)*  ((100-$epercentage)/100) ;
}
	
	$tempMoneyEarned+=$ammount;
	
	if(time()-604800<$row['date']){
	$tempMoneyEarned30+=$ammount;
	}
	if ($row['paid']=="1"){ 
	$tempMoneySent+=$ammount;}
	}
mysql_free_result($result);
?>
</p>
<table width="1010" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#ffffff">
  <tr>
    <td bgcolor="#ffffff" class="small_title"><p class="message"><span class="message">Funds earned total: $<? echo $tempMoneyEarned;?></span><br>
      Site funds earned from Performer total: $<? echo $sitemoney; ?><br>
        Funds not yet paid: $<? echo $tempMoneyEarned-$tempMoneySent ?><br>
    Funds earned by Performer in last 7 days: $<? echo $tempMoneyEarned30; ?></p>      </td>
  </tr>
</table>
<table width="1010" align="center" bgcolor="#ffffff" class="form_definitions">
  <tr>
    <td><strong class="a_small_title">Copy of photo ID </strong></td>
  </tr>
  <tr>
    <td><img src="../models/<? echo $tempUser."/".$_GET[id].".jpg";  ?>"></td>
  </tr>
</table>
<br />
<table width="1010" align="center" bgcolor="#ffffff" class="form_definitions">
  <tr>
    <td><strong class="a_small_title">Recorded photo of Performer </strong></td>
  </tr>
  <tr>
    <td><img src="../models/<? echo $tempUser."/representative.jpg";  ?>"></td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>

