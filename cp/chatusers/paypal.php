<?
	include("_members.header.php");
?>

<?php
include('../../dbase.php');
    $sql2="select * from paypal where code='1'";
    $res2=mysql_query($sql2);
    $row2=mysql_fetch_object($res2);

$var1 = base64_decode($_REQUEST['var1']);
$amount = base64_decode($var1);
$var2 = base64_decode($_REQUEST['var2']);
$username = base64_decode($var2);
$var3 = base64_decode($_REQUEST['var3']);
$item_name = base64_decode($var3);
$var4 = base64_decode($_REQUEST['var4']);
$item_number = base64_decode($var4);
$email = $row2->email;
$currency = $row2->currency;
$test = $row2->sandbox_mode;

if($test == 'Yes'){
    $url="https://www.sandbox.paypal.com/cgi-bin/webscr";
}else{
    $url="https://www.paypal.com/cgi-bin/webscr";
}
?>				

<body onLoad="javascript:submitform();">
<div class="body-container">
    <div  class="col-md-12" align="center">
        <div class="padi">
        <div  class="box_charging">
            <br><br>
            <h3><img src="../../images/loading.gif" alt="Loading. Please Wait..."/><br>Loading. Please Wait...</h3>
            <br><br>
        </div>
        </div>
    </div>
</div>

<form name="frmPaymentPaypal" action="<?=$url;?>" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?=$email;?>">
<input type="hidden" name="shopping_url" value="https://www.angelitaslive.com" />
<input type="hidden" name="custom" value="<?=$username;?>">
<input type="hidden" name="item_name" value="<?=$item_name;?>">
<input type="hidden" name="item_number" value="<?=$item_number;?>">
<input type="hidden" name="currency_code" value="<?=$currency;?>">
<input type="hidden" name="charset" value="utf-8">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="amount" value="<?=$amount?>">
<input type="hidden" name="return" value="https://www.angelitaslive.com/cp/chatusers/notify.php">
<input type="hidden" name="cancel_return" value="https://www.angelitaslive.com/cp/chatusers/buyminutes.php">
<input type="hidden" name="notify_url" value="https://www.angelitaslive.com/cp/chatusers/notify.php">
</form>

<SCRIPT language="JavaScript">
window.setTimeout(submitform,500);
function submitform() {
	document.frmPaymentPaypal.submit();
}
</SCRIPT>

<?
include("_members.footer.php");
?>