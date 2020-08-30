<?php
$item_name = $_POST['item_name']; //El nombre de nuestro artículo o producto.
$tokens = $_POST['tokens']; //El numero o ID de nuestro producto o invoice.
$username = $_POST['username']; //Nombre del Usuario
$status = $_POST['status']; //El estado del pago
$amount = $_POST['amount']; //El monto total pagado
$currency = $_POST['currency']; //La moneda con que se ha hecho el pago
$transaction_id = $_POST['transaction_id']; //EL ID o Código de transacción.
$fecha = date("Y-m-d H:i:s");
?>
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
<?php
include('../../dbase.php');
    $sql2="select * from paypal where code='1'";
    $res2=mysql_query($sql2);
    $row2=mysql_fetch_object($res2);
    
$email=$row2->email;
$currency=$row2->currency;
?>	
<?
include("_members.header.php");
?>


<div class="body-container">
    <div  class="col-md-12" align="center">
  	<center>
  		<div>
  		<h1>Transaction <?=$status;?></h1>
  		<p>&nbsp;</p>
  		<p>Transaction ID: <?=$transaction_id;?></p>
  		<p>Username: <?=$username;?></p>
  		<p>Package: <?=$item_name;?> - <?=$tokens;?> Tokens</p>
  		<p>Price: <?=$amount;?> <?=$currency;?></p>
  		<p>Payment Gateway: PayPal</p>
  		<p>Date: <?=$fecha;?></p>
  		<p>&nbsp;</p>
  		<a class="save" href="https://www.angelitaslive.com">Continue</a>
  		</div>
  	</center>
    </div>
</div>

<?
include("_members.footer.php");
?>