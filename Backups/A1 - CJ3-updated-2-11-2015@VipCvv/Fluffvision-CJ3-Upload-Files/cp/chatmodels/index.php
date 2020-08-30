<head>
<META http-equiv="refresh" content="3;URL=paymentop.php">



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
?>

<?
include("_models.header.php");
?><style type="text/css">
<!--

-->
</style>

<p>&nbsp;</p>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr align="center" valign="middle">

     <td height="113" background=""><br>     
      <table width="97%"  border="0" cellspacing="0" cellpadding="0">

		 <tr>
		 <td align="center">&nbsp;</td>
		 </tr>

      <tr>

        <td align="left" valign="top"><p class="form_definitions style14">&nbsp;</p>
          <p class="style3">&nbsp;</p>
          <p align="center" class=style3"><a href="favorites.php" target="_self"></a><span class="style13">
          <div align="center">
  <table width="550" height="303" border="0" background="../../images/white-bg.png">
    <tr>
      <td height="299"><div align="center"><img src="../../images/loading3.gif" alt="Loading. Please Wait..." width="160" height="160" /></div></td>
    </tr>
  </table>
</div>
          </span></p>
          <p class="style3"><a href="buyminutes.php" target="_self"></a></p>          
          <p class="">&nbsp;</p>
          <p class=""><br>
            <strong> <br>
              </strong></p></td>
      </tr>

      <tr>

        <td align="left" valign="top">&nbsp;</td>
      </tr>
    </table>    
      <p class=""><br>

    </p>

    </td></tr>

</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  <?
include("_models.footer.php");
?>

