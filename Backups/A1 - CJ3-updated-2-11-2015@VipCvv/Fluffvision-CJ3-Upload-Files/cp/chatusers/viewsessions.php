<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{	$username=$row[user];	}

}

?>



<?

$msgError="";

include("../../dbase.php");

$id=$_COOKIE["id"];

$member=$username;



if (isset($_POST[paymentSum])){

mysql_query("UPDATE chatmodelsstatus SET minimum='$_POST[paymentSum]' WHERE id = '$id' LIMIT 1");

$msgError="Value has been changed";

}

?>

<?
include("_members.header.php");
?><style type="text/css">
<!--
body,td,th {
	color: #FFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
body {
	background-color: #8F0000;
}
.style7 {font-size: 24px; font-weight: bold; }

.style88 {color: #fff; font-size: 14px;}
-->
</style>

<br />
<table width="720" height="37" border="0" align="center" cellpadding="5" cellspacing="3" background="../../images/your-image-here.png" bgcolor="#7D0000" style="background-repeat:no-repeat;">

  <tr valign="top">

   <td height="113" class="form_definitions">      

     <p>&nbsp;</p>
     <table width="1000" border="0" align="center" cellpadding="5" cellspacing="0">

        <tr align="left">

          <td width="270" height="49" valign="top"><span class="style7">&nbsp;&nbsp;&nbsp;&nbsp;Performer</span></td>

          <td width="205" valign="top"><span class="style7">Date</span></td>

          <td width="183" valign="top"><span class="style7">  Duration</span></td>

          <td width="147" valign="top"><span class="style7">  CPM</span></td>

          <td width="106" valign="top"><span class="style7">  Paid </span></td>

          <td width="89" valign="top"><span class="style7"> Type</span>
       </td>
        </tr>
  </table>    

        <p>
          <?

	

	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400

	//$secondsAll=time();

		

	include('../../dbase.php');

	$count=0;

	$result = mysql_query("SELECT * FROM videosessions WHERE member='$member' ORDER BY date DESC");
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
$result = mysql_query("SELECT * FROM videosessions WHERE member='$member' ORDER BY date DESC LIMIT $start,$perpage");

	while($row = mysql_fetch_array($result)) 

	{

	$count++;

		

	$ammount= $row[ammount];

	$model=$row[model];

	$epercentage=$row[epercentage];

	$duration=$row[duration];

	$cpm=$row[cpm];

	$type=$row['type'];

	

	if (($duration/60)<round($duration/60))

	{

	$tempMinutesPv=round($duration/60)-1;

	} else {

	$tempMinutesPv=$duration/60;

	}

	$tempSecondsPv=$duration % 60;

	

	$ammount=round((($duration/60)*$cpm)) ;

	

		echo'<table width="1000" border="0" align="center" cellpadding="7" cellspacing="2" border-color="#f80000">

        <tr align="center">

          <td width="98">'.$model.'</td>

          <td width="170">'.date("d M Y, G:i:s", $row[date]) .'</td>

          <td width="100">'.(($type=='tip')?'NA':$tempMinutesPv.":".$tempSecondsPv).'</td>

          <td width="100">'.$cpm.' Tokens</td>

          <td width="70">'.$ammount.' Tokens</td>

		   <td width="70">'.$type.'</td>

        </tr>

      </table>';

	 }

	?>
          </div>
      </p>
    <p></p></td>

  </tr>

</table>


<div align="center">
  <table width="1010" height="37" border="0" background="../../images/your-image-here.png">
    <tr>
      <td align="center"><span class="style88">Pages
        <?php 
if($total)  
{
 $pages=range(1,ceil($total/$perpage)); 
foreach($pages as $pagez) 
{
if($pagez==$page) { echo "<b>$pagez</b>";echo  " ";}
else { echo "<a href=\"viewsessions.php?page=$pagez\">$pagez</a>"; echo  " ";} 
}
}
?>
      </span></td>
    </tr>
  </table>
</div>
<br />
<?
include("_members.footer.php");
?>