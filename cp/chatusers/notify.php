<?
	include("_members.header.php");
?>

<?php
include('../../dbase.php');
    $sql2="select * from paypal where code='1'";
    $res2=mysql_query($sql2);
    $row2=mysql_fetch_object($res2);

$email = $row2->email;
$currency = $row2->currency;
$test = $row2->sandbox_mode;

$paypal_account = $email; //Mi cuenta de paypal
$paypal_currency = $currency; //La moneda con la que estamos trabajando
 
$item_name = $_POST['item_name']; //El nombre de nuestro artículo o producto.
$tokens = $_POST['item_number']; //El numero o ID de nuestro producto o invoice.
$username = $_POST['custom']; //Nombre del Usuario
$payment_status = $_POST['payment_status']; //El estado del pago
$amount = $_POST['mc_gross']; //El monto total pagado
$payment_currency = $_POST['mc_currency']; //La moneda con que se ha hecho el pago
$transaction_id = $_POST['txn_id']; //EL ID o Código de transacción.
$receiver_email = $_POST['receiver_email']; //La cuenta que ha recibido el pago.
$customer_email = $_POST['payer_email']; //La cuenta que ha enviado el pago.
$fecha = date("Y-m-d H:i:s");

$sql3="select * from payments where id='$transaction_id'";
$res3=mysql_query($sql3) or die (mysql_error());

if($test == 'Yes'){
	if($payment_status == "Pending") {
		if (mysql_num_rows($res3) == 0) {
		//El pago ha sido recibido y completado con éxito, entonces aqui colocamos el código que deseamos.        
        	mysql_query("update chatusers set money=money+'$tokens' where user='$username'");
        	mysql_query("insert into payments (id,ammount,method,details,date) values ('$transaction_id','$amount','PayPal - SandBox','$username -
 $tokens tokens - $customer_email',UNIX_TIMESTAMP())");
 		mysql_query("insert into pagseguro (referencia,fecha,usuario,item,descripcion,valor,moneda,estado,metodo,id_transac) values ('$transaction_id','$fecha','$username','$item_name','$tokens Tokens','$amount','$payment_currency','$payment_status','PayPal - SandBox','$transaction_id')");
 		} else {
 		mysql_query("update pagseguro set estado='$payment_status' where referencia='$transaction_id'");
 		}
	}else{
		if (mysql_num_rows($res3) == 0) {
          	//El pago ha sido recibido pero no esta completado, asi que pueden poner el pedido como pendiente.
          	mysql_query("insert into payments (id,ammount,method,details,date) values ('$transaction_id','$amount','PayPal - SandBox','$username -
 $tokens tokens - $customer_email',UNIX_TIMESTAMP())");
 		mysql_query("insert into pagseguro (referencia,fecha,usuario,item,descripcion,valor,moneda,estado,metodo,id_transac) values ('$transaction_id','$fecha','$username','$item_name','$tokens Tokens','$amount','$payment_currency','$payment_status','PayPal - SandBox','$transaction_id')");
 		} else {
 		mysql_query("update pagseguro set estado='$payment_status' where referencia='$transaction_id'");
 		}
        }
} else {
// En la siguiente linea formaremos el query para mandar al servidor de paypal y verificar el pago.
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
     $value = urlencode(stripslashes($value));
     $req .= "&$key=$value";
}

// Aqui verificamos si la cuenta que ha recibido el pago es nuestra cuenta.
if($paypal_account != $receiver_email){
   exit;
}

$res=file_get_contents($url."?".$req);
if (strcmp (trim($res), "VERIFIED") == 0) {
  // Verificamos si la moneda con la que se ha pagado es la misma que nosotros hemos configurado
  if($payment_currency != $paypal_currency) { 
    exit;
  }
	if($payment_status == "Completed") {
		if (mysql_num_rows($res3) == 0) {
		//El pago ha sido recibido y completado con éxito, entonces aqui colocamos el código que deseamos.        
        	mysql_query("update chatusers set money=money+'$tokens' where user='$username'");
        	mysql_query("insert into payments (id,ammount,method,details,date) values ('$transaction_id','$amount','PayPal','$username -
 $tokens tokens - $customer_email',UNIX_TIMESTAMP())");
 		mysql_query("insert into pagseguro (referencia,fecha,usuario,item,descripcion,valor,moneda,estado,metodo,id_transac) values ('$transaction_id','$fecha','$username','$item_name','$tokens Tokens','$amount','$payment_currency','$payment_status','PayPal','$transaction_id')");
 		} else {
 		mysql_query("update pagseguro set estado='$payment_status' where referencia='$transaction_id'");
 		}
	}else{
		if (mysql_num_rows($res3) == 0) {
          	//El pago ha sido recibido pero no esta completado, asi que pueden poner el pedido como pendiente.
          	mysql_query("insert into payments (id,ammount,method,details,date) values ('$transaction_id','$amount','PayPal','$username -
 $tokens tokens - $customer_email',UNIX_TIMESTAMP())");
 		mysql_query("insert into pagseguro (referencia,fecha,usuario,item,descripcion,valor,moneda,estado,metodo,id_transac) values ('$transaction_id','$fecha','$username','$item_name','$tokens Tokens','$amount','$payment_currency','$payment_status','PayPal','$transaction_id')");
 		} else {
 		mysql_query("update pagseguro set estado='$payment_status' where referencia='$transaction_id'");
 		}
        }
}
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

<form name="frmPaymentPay" action="thanks.php" method="post">
<input type="hidden" name="item_name" value="<?=$item_name;?>">
<input type="hidden" name="tokens" value="<?=$tokens;?>">
<input type="hidden" name="username" value="<?=$username;?>">
<input type="hidden" name="currency" value="<?=$payment_currency;?>">
<input type="hidden" name="status" value="<?=$payment_status;?>">
<input type="hidden" name="amount" value="<?=$amount?>">
<input type="hidden" name="transaction_id" value="<?=$transaction_id?>">
</form>

<SCRIPT language="JavaScript">
window.setTimeout(submitform,500);
function submitform() {	
	document.frmPaymentPay.submit();
}
</SCRIPT> 

<?
include("_members.footer.php");
?>