<?php
include("_header-admin.php");
include('../dbase.php');
include('../settings.php');
?>
<?php
if($_POST[reject])
{
$result2 = mysql_query("SELECT * FROM chatmodels WHERE status='pending'");
		while($row2 = mysql_fetch_array($result2)) 

{
mysql_query('DELETE from modelpictures WHERE user="'.$_row2['user'].'"');
mysql_query('DELETE from chatmodels WHERE user="'.$row2['user'].'"');
mysql_query('DELETE from favorites WHERE model="'.$row2['user'].'"');
	
$dir="../models/".$row2[user]."/";
$files=scandir($dir);
foreach($files as $file)
{
if(strlen($file)>2)
{
unlink($dir.$file);
}
}
rmdir($dir);

	mail($row2[email], "Your submission at $siteurl was rejected", "your registration has been denied",
     "MIME-Version: 1.0\r\n".
     "Content-type: text/plain; charset=iso-8859-1\r\n".
     "From:$registrationemail\r\n".
     "Reply-To?:$registrationemail\r\n".
     "X-Mailer: PHP/" . phpversion() );

}
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
  height: 50px;
  z-index: 10;

}
-->

</style>




<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h1 align="center" class="style1">Performers awaiting approval</h1>
<table width="1010" border="0" align="center" cellpadding="0" cellspacing="1">
<tr><td><form action="" method="post"><input type="hidden" name="reject" value="1"/><input type="submit" value="Reject all"></td></tr>
  <tr>
    <td><div align="center"><br>
        <?
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	
	
	

	              echo '<table width="1010" bgcolor="#ffffff" border="0" align="left" cellpadding="0" cellspacing="0">';
		$result2 = mysql_query("SELECT * FROM chatmodels WHERE status='pending'");
		while($row2 = mysql_fetch_array($result2)) 
		{
			$tempCity=$row2[city];
			$result3=mysql_query("SELECT name FROM countries WHERE id='$row2[country]' LIMIT 1");
			while($row3 = mysql_fetch_array($result3)) {
			$sName=$row3[name];
			}
		if ($color=="#ffffff"){
			$color="#ffffff";
			}else{ $color="#ffffff";}
			
		echo'<tr class="form_definitions"><td><b>'.$row2[user].'</b></td><td>'.$sName.'</td><td>'.$row2[cpm] .' Tokens per minute</td><td><a href="subscriptionviewdetails.php?id='.$row2[id].'">View Details</a></td></tr>'; 
		}
echo '</table>';
	?>
        	
    </div></td>
  </tr>
</table><br>
<?
include("_footer-admin.php")
?>
