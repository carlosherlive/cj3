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
  height: 50px;
  z-index: 10;

}



textarea {
   font-size: 18pt;
   font-family:Geneva, Arial, Helvetica, sans-serif;
   font-weight:bold;
    
} 



-->

</style>





<?php
include('../dbase.php');
 if(isset($_POST['submit']))
 {
 	$val = $_POST['welcome']; 
	$insertQuery = "UPDATE  welcome set models ='$val' where 1";
	$conn = mysql_query($insertQuery) or die ( mysql_error()); 
	if($conn) 
	{
		?>
		<script type="text/javascript">
		alert("The data was saved successfully.");
		</script>
		<?
	}
 }		
 
  	$welcomeQuery = "SELECT models FROM welcome"; 
	$result = mysql_query($welcomeQuery) or die(mysql_error()); 
	$chkN = mysql_num_rows($result) ; 
	if($chkN > 0 ) 
	{
		$valueW = mysql_result($result,0,'models'); 
	}
	else
	{
		$valueW = "Please write something"; 
	}

?>


<?
  include ("../dbase.php");
include ("../settings.php");
$tempMinutesPv=0;
$tempSecondsPv=0;
$sitemoney=0;
$tempMoneyEarned=0;
$tempMoneySent=0;
$tempMoneyEarned30=0;
$ammount=0;
$result = mysql_query("SELECT * FROM videosessions ");
while($row = mysql_fetch_array($result)) 
	{
	$member=$row['member'];
	$epercentage=$row['epercentage'];
	$duration=$row['duration'];
	$cpm=$row['cpm'];
	$tempSecondsPv+=$row['duration'];
if($row['type']=='show')
{
$ammount=((($duration/60)*$cpm)*($epercentage/100)) ;
	$ammount2=((($duration/60)*$cpm)*((100-$epercentage)/100)) ;
	$tempMoneyEarned+=$ammount;
	$sitemoney+=$ammount2;
}
if($row['type']=='tip')
{
$ammount=($cpm*($epercentage/100)) ;
	$ammount2=($cpm*((100-$epercentage)/100)) ;
	$tempMoneyEarned+=$ammount;
	$sitemoney+=$ammount2;
}
	
	if(time()-604800<$row['date']){
	$tempMoneyEarned30+=$ammount;
	$sitemoney30+=$ammount2;
	}
	if ($row['paid']=="1"){ 
	$tempMoneySent+=$ammount;}
	}
mysql_free_result($result);
?>
<p>


<script>
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>




	
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">
  <table width="1010" border="0">
    <tr>
      <td><div align="center">
        <h1>Current List Of All Registered Performers </h1>
      </div></td>
    </tr>
  </table>
</div>
<table width="1010" border="0" align="center" cellpadding="10" cellspacing="1" bgcolor="#F8F8F8">
	<tr>
		<td align="center">
			<table>
				<tr>
					<td align="center">
					<h2>Enter Welcome text for Performers </h2>
					</td>
				</tr>
				<tr>
					<form method="post" action="<? echo $PHP_SELF?>" >
					<td align="center">
					    
						<p>
						  <textarea onkeyup="textCounter(this,'counter',1200);" name="welcome" style="width:900px; height:300px; color:#FF0000" ><?=$valueW?>
	</textarea>
					  </p>
						<p>  
						  <input disabled  maxlength="6" size="6" value="1200" id="counter">
						  
						  
					        </p></td>
				</tr>
				<tr>
					<td align="center" valign="middle">
						<input type="submit" name="submit" value="Save" />
					</td>
					</form>			
				</tr>


<tr>
			<td align="center">
			<h3>Search Performers</h3>
			</td>
		</tr>
		<tr>
			<form method="post" action="<? echo $PHP_SELF?>" >
			<td align="center">
				<input type="text" name="srn" value="" />
			</td>
		</tr>
		<tr>
			<td align="center" valign="middle">
				<input type="submit" name="search" value="Search" />
			</td>
			</form>			
		</tr>

			</table>
  </td>
	</tr>
  <tr>
    <td bgcolor="#F8F8F8" class="small_title"><p class="message"><strong>Performer funds earned total: $<? echo $tempMoneyEarned;?><br>
        Site funds earned from Performers total: $<? echo $sitemoney; ?> <br>
        Unpaid Performer funds total: $<? echo $tempMoneyEarned-$tempMoneySent ?><br>
    Site funds earned from Performers total (last 7 days): $<? echo $sitemoney30; ?></strong></p></td>
  </tr>
</table>

<div align="center">
  <table width="1010" border="0" cellpadding="10">
    <tr>
      <td><div class="pages" align="right"></div></td>
    </tr>
  </table>
</div>
<table width="1010" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
  <tr>
    <td bgcolor="#ffffff">
	<br>
	<table width="1010"  bgcolor="#ffffff" border="0" align="center" cellpadding="1" cellspacing="1">
	<?php
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	

	
		$result = mysql_query("SELECT * FROM chatmodels WHERE status!='pending' AND status!='rejected'");


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
$result = mysql_query("SELECT * FROM chatmodels WHERE status!='pending' AND status!='rejected' LIMIT $start,$perpage");
if($_POST[srn])
{
$result = mysql_query("SELECT * FROM chatmodels WHERE user like '%$_POST[srn]%' OR email='$_POST[srn]' ");
}


		while($row2 = mysql_fetch_array($result)) 
			{
			$result3=mysql_query("SELECT name FROM countries WHERE id='$row2[country]' LIMIT 1");
			while($row3 = mysql_fetch_array($result3)) 
				{
				$tempCountry=$row3[name];
				}
			
			$tempCity=$row2[city];	
			
			if ($color=="#ffffff"){
			$color="#ffffff";
			}else{ $color="#ffffff";}
			echo'<tr bgcolor="'.$color.'" class="form_definitions"><td align="left"><b>'.$row2[user].'</b></td><td>'.$tempCountry.'</td><td>'.$row2[email].'</td><td align="right"><a href="modelviewdetails.php?id='.$row2[id].'">View Details</a></td></tr>';	
			}


if(!$_POST[srn])
{
if($total)  
{
 $pages=range(1,ceil($total/$perpage)); 
echo "<tr><td>";
foreach($pages as $pagez) 
{
if($pagez==$page) { 
echo "<b>$pagez</b>";
echo  " ";}
else { 
echo "<a href=\"models.php?page=$pagez\">$pagez</a>"; echo  " ";} 
}
echo "</td></tr>";
}
}

	?>







	
      </table>
<br>	</td>
  </tr>
</table>
<div align="center">
  <table width="1010" border="0">
    <tr>
      <td></td>
    </tr>
  </table>
  <?
include("_footer-admin.php")
?>
</div>
