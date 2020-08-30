
<?

include("_header-admin.php");		
	
	  
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












<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td bgcolor="#ffffff"><?
$nTime=time();
$onlinemodels=0;
$onlinemembers=0;
include('../dbase.php');
include('../settings.php');

if($_POST[offline])
{
mysql_query("UPDATE chatmodels SET status='offline',forcedOnline='0' WHERE status!='rejected' AND status!='blocked' AND status!='pending' ");
}
if($_POST[online])
{
mysql_query("UPDATE chatmodels SET status='online',forcedOnline='1' WHERE status!='rejected' AND status!='blocked' AND status!='pending'");
}
mysql_query("UPDATE chatmodels SET status='offline' WHERE $nTime-lastupdate>30 AND status!='rejected' AND status!='blocked' AND status!='pending' AND forcedOnline !=1");  
$result=mysql_query("SELECT onlinemembers FROM chatmodels WHERE status='online'");
while($row = mysql_fetch_array($result)) 
	{
	$onlinemembers+=$row['onlinemembers'];
	}
$onlinemodels=mysql_num_rows($result);

?>


 <?php

$perpage=36;

if($_GET[page])
{
$page=$_GET[page];
}
else
{
$page=1;
}
$start=($page-1)*$perpage;

	$nTotal=0;
	$nThisMonth=0;
	$nPending=0;
	$nBoys=0;
	$nLesbian=0;
	$nCouple=0;
	$nGirls=0;
	$nTransgender=0;
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		

	
	$result = mysql_query("SELECT dateRegistered FROM chatmodels"); 
	while($row = mysql_fetch_array($result)) 
	{
	if (date( "m",$row['dateRegistered'])==date("m")){
	$nThisMonth++;	
	}
	}
	
	
	
	$result = mysql_query("SELECT * FROM chatmodels");
	while($row = mysql_fetch_array($result)) 
	{	
	if ($row['status']=="pending")
	{
	$nPending++;
	} else
	if ($row['status']!="pending" && $row['status']!="rejected")
	{
	$nTotal++;
	}
	
	switch ($row[category])
	{
	case "girls":
  		if ($row['status']!="pending") $nGirls++;
  		break;  
	case "boys":
		if ($row['status']!="pending") $nBoys++;
		break;
  	case "lesbian":
		if ($row['status']!="pending") $nLesbian++;
		break;
	case "couple":
		if ($row['status']!="pending") $nCouple++;
		break;
	case "transgender":
		if ($row['status']!="pending") $nTransgender++;
		break;
	}	
	
	}
	
	
	?>




      <table width="1010" border="0" align="center">
        <tr align="center">
          <td>

</td>
        </tr>
 <tr align="center">
          <td>

</td>
        </tr>
      </table>
</table>
      <table width="1010"  border="0" align="center">
        <tr>
          <td width="241" class="big_title"><div align="left">
		  
            <strong>Performer Information </strong><br>
            Online Performers : <? echo $onlinemodels;?><br>
			  Registered Performers: <? echo $nTotal; ?><br>
              Pending Performers: <? echo $nPending; ?><br>
          </div></td>
          <td width="759" class="">
          <div align="center"><iframe width="450" height="150" src="http://versions.camscripts.com/cj3.php" rel="nofollow" frameborder="0" scrolling="no" allowfullscreen></iframe></div></td>
        </tr>
</table>
      <div align="center">
        <table width="1010" border="0">
          <tr>
            <td width="880"><div align="left">Search Performers <br />
                <form method="post" action="<? echo $PHP_SELF ?>">
              <input type="text" name="search" value="<?=$_POST['search'];?>"/>
  <input type="submit" name="submit" value="Search" />
  </form>
  
                <br />
              <form method="post" action="<? echo $PHP_SELF ?>">
  <input type="submit" name="offline" value="Make Performers Offline" /> <input type="submit" name="online" value="Make Performers Online" />
</form></div></td>
            <td width="120">Welcome, Admin </td>
          </tr>
              </table>
        </td>
        </tr>
        </table>
        <?php
if($_POST['search'])
{
echo '<table width="720" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
  <tr>
    <td><p class="style3">
      Search result </p>
    </td>
  </tr>
</table>';
echo '<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff">';

		    $count=0;
			$nTime=time();	
			
			$result = mysql_query("SELECT * FROM chatmodels WHERE user like '%$_POST[search]%' ");
			while($row = mysql_fetch_array($result)) 
				{			
				
				$tBirthD=$row[birthDate];
				$nYears=date('Y',time()-$tBirthD)-1970;
				$modelid = $row[id];	
				$username=$row[user];
				$tempMessage=$row[message];
				$tempCity=$row[city];
				$tempPlace=$row[broadcastplace];
				$tempL1=$row[language1];
				$tempL2=$row[language2];	
				$tempL3=$row[language3];	
				$tempL4=$row[language4];	

					
				$languagestring=$tempL1;
				if (strtolower($tempL2)!="none"){
				$languagestring.= ", ".$tempL2;
				}
				if (strtolower($tempL3)!="none"){
				$languagestring.= ", ".$tempL3;
				}
				if (strtolower($tempL4)!="none"){
				$languagestring.= ", ".$tempL4;
				}
			
				$count++;
				if ($count==1) {echo' <tr bgcolor="#ffffff">';}
				echo '<td width="250" height="200" align="center" valign="middle">';
  				echo '<table width="250" height="200" border="0" cellpadding="2" cellspacing="1">';
	 			echo '<tr bgcolor="#ffffff">';
				echo '<td align="center" valign="middle"><a href="viewshow.php?model='.$username.'" target="_blank"><img src="../models/'.$username.'/thumbnail.jpg" width="250" height="200" border="0"></a></td>';			
				echo '</tr><tr bgcolor="#ffffff">';
		      	echo '<td align="left" valign="top">';
				echo '<span class="model_title">'.$username.'</span><br>';
				echo '<a href="makeOffline.php?model='.$modelid.'" >Make Offline </a><br>';
		     	
		        //echo '<span class="model_title_small">, '.$nYears.' years from '.$tempPlace.', speaks: '.$languagestring.'</span><br>';
		        //echo '<span class="model_message">'.$tempMessage.'</span></td>';
				echo '</tr></table>';
				echo '  </td>';
				if ($count==4){ echo"</tr>"; $count=0;}
				}
			

			if ($count==1){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			} else if ($count==2){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			} else if ($count==3){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			}
			
			mysql_free_result($result);
			echo'</table>';
}
 			?>
      </div>

<?php 

if($_GET[show]!='off')
{
if (!isset($_GET['category']))
			{
			$select="SELECT * FROM chatmodels WHERE status='online' LIMIT $start,$perpage";//100hours
			} else{
			$select="SELECT * FROM chatmodels WHERE category='$_GET[category]' AND status='online' LIMIT $start,$perpage";
			}
						
			
			$result = mysql_query($select);

$total=mysql_num_rows(mysql_query("SELECT * FROM chatmodels WHERE status='online'"));

echo '<table width="1010" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><p class="style3"><br />
      Online Performers<span class="style4"></span></p>
    </td><td align="right">Pages ';
$pages=range(1,ceil($total/$perpage));

foreach($pages as $pagez)
{
if($page==$pagez)
{
echo "<b>$pagez</b> ";
}
else
{
echo "<a href=\"index.php?show=on&page=$pagez\">$pagez</a> ";
}
}

echo '</td></tr>
</table>
<table width="1010" border="0" align="center" cellpadding="0" cellspacing="0">    
  <tr>
    <td align="center" valign="top"><table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff">';

		    $count=0;
			$nTime=time();
			
			
			
			while($row = mysql_fetch_array($result)) 
				{			
				
				$tBirthD=$row[birthDate];
				$nYears=date('Y',time()-$tBirthD)-1970;
				$modelid = $row[id];	
				$username=$row[user];
				$tempMessage=$row[message];
				$tempCity=$row[city];
				$tempPlace=$row[broadcastplace];
				$tempL1=$row[language1];
				$tempL2=$row[language2];	
				$tempL3=$row[language3];	
				$tempL4=$row[language4];	

					
				$languagestring=$tempL1;
				if (strtolower($tempL2)!="none"){
				$languagestring.= ", ".$tempL2;
				}
				if (strtolower($tempL3)!="none"){
				$languagestring.= ", ".$tempL3;
				}
				if (strtolower($tempL4)!="none"){
				$languagestring.= ", ".$tempL4;
				}
			
				$count++;
				if ($count==1) {echo' <tr bgcolor="#ffffff">';}
				echo '<td width="250" height="200" align="center" valign="middle">';
  				echo '<table width="250" height="200" border="0" cellpadding="2" cellspacing="1">';
	 			echo '<tr bgcolor="#ffffff">';
				echo '<td align="center" valign="middle"><a href="viewshow.php?model='.$username.'" target="_blank"><img src="../models/'.$username.'/thumbnail.jpg" width="250" height="200" border="0"></a></td>';			
				echo '</tr><tr bgcolor="#ffffff">';
		      	echo '<td align="center" valign="top">';
				echo '<span class="model_title">'.$username.'</span><br>';
				echo '<a href="makeOffline.php?model='.$modelid.'" >Make Offline </a><br>';
		     	
		        //echo '<span class="model_title_small">, '.$nYears.' years from '.$tempPlace.', speaks: '.$languagestring.'</span><br>';
		        //echo '<span class="model_message">'.$tempMessage.'</span></td>';
				echo '</tr></table>';
				echo '  </td>';
				if ($count==4){ echo"</tr>"; $count=0;}
				}
			

			if ($count==1){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			} else if ($count==2){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			} else if ($count==3){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			}
			
			mysql_free_result($result);
			echo'</table></td></tr></table>';
}
?>
<?php

if($_GET[show]!='on')
{
if (!isset($_GET['category']))
			{
			$select="SELECT * FROM chatmodels WHERE status='offline' LIMIT $start,$perpage";//100hours
			} else{
			$select="SELECT * FROM chatmodels WHERE category='$_GET[category]' AND status='offline' LIMIT $start,$perpage";
			}
						
			
			$result = mysql_query($select);
$total=mysql_num_rows(mysql_query("SELECT * FROM chatmodels WHERE status='offline'"));

echo '<table width="1010" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><span class="style3"><br />
    Offline Performers </span></td><td align="right">Pages ';
$pages=range(1,ceil($total/$perpage));

foreach($pages as $pagez)
{
if($page==$pagez)
{
echo "<b>$pagez</b> ";
}
else
{
echo "<a href=\"index.php?show=off&page=$pagez\">$pagez</a> ";
}
}

echo '</td></tr>
</table>
<table width="1010" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff">';
		    $count=0;
			$nTime=time();
			
			while($row = mysql_fetch_array($result)) 
				{			
				$tBirthD=$row['birthDate'];
				$nYears=date('Y',time()-$tBirthD)-1970;
				$modelid = $row['id'];	
				$tempMessage=$row['message'];
				$username=$row['user'];
				$tempCity=$row['city'];
				$tempPlace=$row['broadcastplace'];
				$tempL1=$row['language1'];
				$tempL2=$row['language2'];	
				$tempL3=$row['language3'];	
				$tempL4=$row['language4'];	
						
				$languagestring=$tempL1;
				if (strtolower($tempL2)!="none"){
				$languagestring.= ", ".$tempL2;
				}
				if (strtolower($tempL3)!="none"){
				$languagestring.= ", ".$tempL3;
				}
				if (strtolower($tempL4)!="none"){
				$languagestring.= ", ".$tempL4;
				}
				$count++;
				if ($count==1) {echo' <tr bgcolor="#ffffff">';}
				echo '<td width="250" height="200" align="center" valign="middle">';
  				echo '<table width="250" height="200" border="0" cellpadding="2" cellspacing="1">';
	 			echo '<tr bgcolor="#ffffff">';
				
		 		echo '<td align="center" valign="middle"><a href="viewshow.php?model='.$username.'" target="_blank"><img src="../models/'.$username.'/thumbnail.jpg" width="250" height="200" border="0"></a></td>';
				echo '</tr><tr bgcolor="#ffffff">';
		      	echo '<td align="center" valign="top">';
				echo '<span class="model_title">'.$username .'</span><br>';
				echo '<a href="makeOnline.php?model='.$modelid.'" >Make Online </a><br>';
		     	
		        //echo '<span class="model_title_small">, '.$nYears.' years from '.$tempPlace.', speaks: '.$languagestring.'</span><br>';
		        //echo '<span class="model_message">'.$tempMessage.'</span></td>';
				echo '</tr></table>';
				echo '  </td>';
				if ($count==4){ echo"</tr>"; $count=0;}
				}
			

			if ($count==1){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			} else if ($count==2){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			} else if ($count==3){
			echo'<td width="240"  height="120" align="center" valign="middle">&nbsp</td>';
			echo'</tr>';
			}
			
			mysql_free_result($result);
			echo'</table></td></tr></table>';
}
?>


<div align="center">
  <table width="1010" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div align="left">
       
      </div></td>
    </tr>
  </table>
</div>








<table width="1010"  border="0" align="center" cellpadding="2" cellspacing="1">
  <tr>

<?
include("_footer-admin.php")
?>