<?
include("_header-admin.php")
?>

<style type="text/css">
<!--

-->
</style>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="1010" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td><p><?
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	include('../dbase.php');
	
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
	
	
	

	
	$result = mysql_query("SELECT * FROM chatmodels WHERE id='$_GET[id]' LIMIT 1");
	
		while($row = mysql_fetch_array($result)) 
		{
		$tempUser=$row["user"];
		$tempPass1=$row["password"];
		$tempPass2=$row["password"];
		$tempEmail=$row["email"];
		
		$tL1=$row["language1"];
		$tL2=$row["language2"];
		$tL3=$row["language3"];
		$tL4=$row["language4"];
		
		$tBirthD=$row["birthDate"];
		$tBirthFull = $tBirthD;
                $tBirthD= GetAge($row["birthDate"]);
		
		
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
		
		$tCPM=$row["cpm"];
		$tCategory=$row["category"];
		
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
		$tOwner=$row["owner"];
		$tempIdmonth=$row[idmonth];
		$tempIdyear=$row[idyear];
		$tempIdtype=$row[idtype];
		$tempIdnumber=$row[idnumber];
		$tempSs=$row[ssnumber];
		$tempPhone=$row[phone];
		$tempBirth=$row[birthplace];
		$tempYahoo=$row[yahoo];	
		$tempMsn=$row[msn];	
		$tempIcq=$row[icq];	
		$tempFax=$row[fax];	


		}
	?>
	
	
	
	
      <table width="1017" align="center">
      <tr>
        <td width="96" height="96" align="center" valign="middle"><div align="left"><img height="200" width="250" src="../models/<? echo $tempUser."/thumbnail.jpg" ?>"></div></td>
        <td width="496" valign="bottom" class="form_definitions"><strong>Details for <? echo $tempName ?> </strong></td>
      </tr>
    </table>
	<br>
	<table width="1010" align="center" cellpadding="2" class="form_definitions">
	<tr>
	  <td width="367"><strong>User Name </strong></td>
	<td width="448"><strong><? echo $tempUser; ?></strong></td>
	<td width="173">&nbsp;</td>
	</tr>
	<tr>
	  <td>Email</td>
	<td><? echo $tempEmail; ?></td>
	<td >&nbsp;</td>
	</tr>
	<tr>
	  <td>Native Language </td>
	  <td><? echo $tL1; ?></td>
	  <td>&nbsp;</td>
	  </tr>  
	<tr>
	  <td>Full Name </td>
	<td><? echo $tempName; ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	  <td>Country</td>
	<td><? echo $tempCountry; ?></td>
	<td>&nbsp;</td>
	</tr>  
	<tr>
	  <td>State</td>
	<td><? echo $tempState; ?></td>
	<td>&nbsp;</td>
	</tr>  
	<tr>
	  <td>City</td>
	<td><? echo $tempCity; ?></td>
	<td>&nbsp;</td>
	</tr>  
	<tr>
	  <td>Address</td>
	<td><? echo $tempAdress; ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr><td>Zip Code</td>
	<td><? echo $tempZip; ?></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	  <td>Phone</td>
	  <td><? echo $tempPhone; ?></td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
      <td>Birth Date </td>
      <td>       
	  
	  <? echo $tBirthFull; ?>
	  
	  	  </td>
      <td>&nbsp;</td>
	  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td></td>
	  <td>&nbsp;</td>
	  </tr>  
	</table>
	
	<table width="1010" border="0" align="center" cellpadding="4" cellspacing="0" class="form_definitions">
      <tr bgcolor="#FFFFFF">
        <td width="357" bgcolor="#FFFFFF"><strong>Approve Model </strong></td>
        <td width="637"><strong>Reject Model </strong></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td><form name="form1" method="post" action="acceptsubmission.php">
            <p>Payout percentage<br>
                <input name="epc" type="text" id="epc" value="50" size="2" maxlength="2">
                %<br>
                Cost per minute<br>
                <input name="cpm" type="text" id="cpm" value="10" size="3" maxlength="3">
                 Tokens per minute <br>
                <br>
                <input type="submit" name="Submit" value="Approve Performer">
                <input name="id" type="hidden" id="id4" value="<? echo $_GET[id]; ?>">
                <input name="username" type="hidden" id="username3" value="<? echo $tempUser; ?>">
                <input name="email" type="hidden" id="username" value="<? echo $tempEmail; ?>">
                <input name="studio" type="hidden" id="email2" value="<? echo  $tOwner; ?>">
              </p>
          </form></td>
        <td bgcolor="#FFFFFF">Reason:
          <form name="form1" method="post" action="rejectsubmission.php">
            <textarea name="Reason" cols="32" rows="4" id="textarea"></textarea>
            <br>
            <input type="submit" name="Submit2" value="Reject Model">
            <input name="id" type="hidden" id="id22" value="<? echo $_GET[id]; ?>">
            <input name="username" type="hidden" id="username22" value="<? echo $tempUser; ?>">
            <input name="email" type="hidden" id="email" value="<? echo $tempEmail; ?>">
            <input name="studio" type="hidden" id="studio" value="<? echo  $tOwner; ?>">
        </form></td>
      </tr>
    </table>
	<table width="1010" align="center" class="form_definitions">
      <tr>
        <td><strong>Copy of photo ID</strong></td>
        </tr>
      <tr>
        <td><img src="../models/<? echo $tempUser."/".$_GET[id].".jpg";  ?>"></td>
      </tr>
    </table>	
    <table width="1010" align="center" class="form_definitions">
      <tr>
        <td><strong>Recorded photo of model  </strong></td>
      </tr>
      <tr>
        <td><img src="../models/<? echo $tempUser."/representative.jpg";  ?>"></td>
      </tr>
    </table>    <br>	</td>
  </tr>
</table>
<?
include("_footer-admin.php")
?>