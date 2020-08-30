<?
include("_header-admin.php")
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
-->

</style>

<?
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	include('../dbase.php');
	
	
	$result = mysql_query("SELECT * FROM chatusers WHERE id='$_GET[id]' LIMIT 1");
		while($row = mysql_fetch_array($result)) 
		{
		$tempId=$row["id"];
		$tempUser=$row["user"];
		$tempEmail=$row["email"];
		$tBirthD=$row["birthDate"];
		$tempPhone=$row["phone"];
		$tempName = $row["name"];
		$status=$row['status'];
		$result3=mysql_query("SELECT name FROM countries WHERE id='$row[country]' LIMIT 1");
			while($row3 = mysql_fetch_array($result3)) {
			$tempCountry=$row3[name];
			}
		
		$tempState=$row["state"];
		$tempZip = $row["zip"];
		$tempCity=$row["city"];
		$tempAdress = $row["adress"];
		$tempDReg=$row["dateRegistered"];
		$tempMoney=$row[money];
		
		$rowdate=$row["dateRegistered"];
		$date=date("d F Y, H:i",$rawdate);
		}
	?>




<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">
  <table width="1010" border="0" cellpadding="10">
    <tr>
      <td><div align="center"><div align="center">
  <table width="1010" height="70" background="../images/rounded.php.png">
    <tr>
      <td background="images/rounded.png"><div align="center"><h1><? echo $tempName ?></h1></div></td>
    </tr>
  </table>
</div></div></td>
    </tr>
  </table>
</div>
<table width="1190" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td width="1188" bgcolor="#ffffff">
      
      <table width="1010" height="102" align="center" cellpadding="10" bgcolor="#F3F3F3" class="form_definitions">
      <tr>
        <td width="342" valign="bottom"><p><strong class="big_title">Account Holder:&nbsp; <? echo $tempName ?></strong><br />
        <strong>Account Status: &nbsp;<? echo $status;?></strong><br />
        </p>
          <table width="496" align="center" cellpadding="1" class="form_definitions">
            <tr>
              <td width="107" align="left">User Name:</td>
              <td width="93"><? echo $tempUser; ?></td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td align="left">Email:</td>
              <td><? echo $tempEmail; ?></td>
              <td >&nbsp;</td>
            </tr>

            <tr>
              <td align="left">Full Name: </td>
              <td><? echo $tempName; ?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left">Country:</td>
              <td><? echo $tempCountry; ?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left">State:</td>
              <td><? echo $tempState; ?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left">City:</td>
              <td><? echo $tempCity; ?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left">Zip Code:</td>
              <td><? echo $tempZip; ?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left">Date Registered: </td>
              <td><? echo date("d F Y",$tempDReg); ?></td>
              <td>&nbsp;</td>
            </tr>
          </table>
          
          </td>
        <td width="490" valign="middle"><table width="300" height="96"  border="0" align="center" cellpadding="0" cellspacing="0">
            <tr align="center">
              <form name="form1" method="post" action="deleteaccount.php">
                <td height="30">
                  <input type="submit" name="Submit22" value="Delete Account">
                  <input name="id" type="hidden" id="id5" value="<? echo $_GET['id']; ?>">
                  <input name="type" type="hidden" id="type4" value="member">
                  <input name="username" type="hidden" id="type5" value="<? echo $tempUser; ?>">
                  <input name="date" type="hidden" id="datds" value="<? echo $date; ?>"></td>
              </form>
            </tr>
            <tr>
<? if($status!='blocked'){ 
	echo ' <form name="form2" method="post" action="blockaccount.php">';
} else {
	echo ' <form name="form2" method="post" action="activateaccount.php">';
}
?> 
			 
                <td height="30" align="center">
                  <input type="submit" name="Submit22" value="<? if($status!='blocked'){echo 'Block Account ';} else {echo 'Activate Account';}?> ">
                  <input name="id" type="hidden" id="id35" value="<? echo $_GET['id']; ?>">
                  <input name="type" type="hidden" id="type" value="member">
                  <input name="username" type="hidden" id="username" value="<? echo $tempUser; ?>">
                  <input name="date" type="hidden" id="daste" value="<? echo urlencode($date); ?>"></td>
              </form>
            </tr>
            <tr align="center">
              <form name="form3" method="post" action="sendemail.php">
                <td height="33" valign="middle">
                  <input type="submit" name="Submit222" value="Email account holder">
                  <input name="id" type="hidden" id="id45" value="<? echo $_GET['id']; ?>">
                  <input name="type" type="hidden" id="type" value="member">
                  <input name="username" type="hidden" id="username4" value="<? echo $tempUser; ?>">
                  <input name="email" type="hidden" id="date4" value="<? echo $tempEmail; ?>"></td>
              </form>
            </tr>
        </table></td>
      </tr>
    </table>
	<br>
	<table width="1010" align="center" cellpadding="10" bgcolor="#F5F5F5" class="form_definitions">
      <tr>
        <td width="162" align="left"><strong>Available Tokens :</strong></td>
        <td width="426"><p><strong><? echo $tempMoney; ?> Tokens </strong></p>
          </td>
      </tr>
	  <form name="form1" method="post" action="">
	    </form>
    </table>	
	<p>&nbsp;</p>
	<form name="form2" method="post" action="depositmoney.php">
	  <table width="1010" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr class="form_definitions">
          <td width="290" align="right"><input name="cents" type="text" id="cents" value="0" size="4" maxlength="4">
    Tokens </td>
          <td width="310">
            &nbsp;
            <input type="submit" name="Submit" value="Add tokens to this account">
            <input name="username" type="hidden" id="username" value="<? echo $tempUser;?>">
            <input name="email" type="hidden" id="email" value="<? echo $tempEmail;?>">
            <input name="id" type="hidden" id="email3" value="<? echo $tempId;?>"></td>
          </tr>
      </table>
	  </form>	
	  <form name="form2" method="post" action="removemoney.php">
        <table width="1010" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr class="form_definitions">
            <td width="290" align="right"><input name="cents" type="text" id="cents" value="0" size="4" maxlength="4">
        Tokens</td>
            <td width="310">
               &nbsp;
               <input type="submit" name="Submit2" value="Remove tokens from this account">
              <input name="username" type="hidden" id="username" value="<? echo $tempUser;?>">
              <input name="email" type="hidden" id="email" value="<? echo $tempEmail;?>">
            <input name="id" type="hidden" id="id" value="<? echo $tempId;?>"></td>
          </tr>
        </table>
        <p>&nbsp;</p>
    </form>	</td>
  </tr>
</table>
<?php
$result = mysql_query("SELECT * FROM videosessions WHERE member='$tempUser' ORDER BY date DESC");
if($_POST[vs])
{
$result = mysql_query("SELECT * FROM videosessions WHERE member='$tempUser' AND model like '%$_POST[vs]%' ORDER BY date DESC");
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
$result = mysql_query("SELECT * FROM videosessions WHERE member='$tempUser' ORDER BY date DESC LIMIT $start,$perpage");
}
echo '<table width="900"  border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
<tr><td width="100"><form method="post" action=""><input type="text" name="vs"/> <input type="submit" value=" search sessions "/></form></td></tr>
<tr><td>Member</td><td>Date</td><td>Duration</td><td>CPM</td><td>Paid</td><td>Type</td></tr>';

while($row = mysql_fetch_array($result)) 
{

echo "<tr><td>$row[model]</td><td>".date("d M Y, G:i:s", $row[date])."</td><td>$row[duration] Seconds</td><td>$row[cpm] Tokens</td><td>".round((($row[duration]/60)*$row[cpm]))." Tokens</td><td>$row[type]</td></tr>";
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
<?
include("_footer-admin.php")
?>
