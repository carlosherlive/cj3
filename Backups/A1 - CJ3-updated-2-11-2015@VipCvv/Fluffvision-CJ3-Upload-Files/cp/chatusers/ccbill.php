<?php
include('../../dbase.php');
    $sql2="select * from payccbill where code='1'";
    $res2=mysql_query($sql2);
    $row2=mysql_fetch_object($res2);

$amount=$_GET['amt'];
$username=$_GET['usr'];
$salt=$row2->codtxt;
$formDigest=md5($amount.'30840'.$salt); //formPrice formPeriod currencyCode salt
$form=$row2->frmname;
$accno=$row2->act;
$subacc=$row2->subact;
?>						

<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
}
body {
	background-color: #8f0000;
}
-->
</style></head>
	<body onLoad="javascript:submitform();">
	<br/><br/><br/>
	<center>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>LOADING.......
	  </p>
	</center>
<form  name="frmPayment" action='https://bill.ccbill.com/jpost/signup.cgi'  method=POST >
<input type="hidden" name="clientAccnum"  value="<?=$accno;?>">
<input type="hidden" name="clientSubacc"  value="<?=$subacc;?>">
<input type="hidden" name="formName"  value="<?=$form;?>">
<input type="hidden" name="formPrice"  value='<?=$amount?>'>
<input type="hidden" name="formPeriod"  value='30'>
<input type="hidden" name="currencyCode"  value='840'>
<input type="hidden" name="formDigest"  value="<?=$formDigest?>">
<input type="hidden" name="username1" value="<?=$username?>"/>
<input type="hidden" name="password" value="********"/>


</form>

	<SCRIPT language="JavaScript">
	window.setTimeout(submitform,5000);
	function submitform()
	{
	
document.frmPayment.submit();
	}
</SCRIPT> 
	</body></html>
