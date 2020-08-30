<?
if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" ) {
	header("location: ../../login.php");
} else {
	include("../../dbase.php");
	$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row[user];
	}
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
    <div class="col-md-12" align="center">
    	<ul class="w70 model_group bar_profile">
    	    <li class="padex col-md-6 li_group">
    		<div class="box_data red">
    		    <span>Date: <?php echo date("m-d-Y"); ?></span>
    		    <span>Tokens in your account: <?
		    	include("../../dbase.php");
		    	$result=mysql_query("SELECT money from chatusers where user='$username' LIMIT 1");
		   	while($row = mysql_fetch_array($result)) {
			    echo $row['money'];
		   	}
		    	?>
		    </span>
		    <a class="enviar bt_s" href="viewsessions.php"><i class="fa fa-history"></i>&nbsp;&nbsp;Account History</a>
    		</div>
    	    </li>
    	    <li class="col-md-6 padex li_group">
    	    	<div class="box_data white">
    		    <img src="../../images/icono-paypal-tarjetas.png" width="100%"/>
    		    <p class="style8">Global Payment Processing</p>
    		</div>
    	    </li>
    	    <li class="col-md-12 li_group">
    	    	<div class="p_a w90">
    	    	    <p>Add funds to your member account using a credit or debit card</p>
    	    	    <p>Now you can pay even faster with our PayPal Payment Checkout System.</p>
    	    	</div>
    	    </li>
    	    <li class="col-md-12 li_group">
    	    	<div class="model_group">
    	    	    <?php
		    $query=mysql_query("select * from package order by price asc");
		    while($row=mysql_fetch_object($query)) {
			echo '<div class="col-md-3 pd15">
			<div id="plan">
			<h1>'.$row->name.'</h1>
			<h2>'.$row->tokens.'<br>Tokens</h2>
			<h3 class="txt_white">Price $'.$row->price.'</h3>
			<a class="enviar bt_s w90" href="paypal.php?var1='.base64_encode(base64_encode($row->price)).'&var2='.base64_encode(base64_encode($username)).'&var3='.base64_encode(base64_encode($row->name)).'&var4='.base64_encode(base64_encode($row->tokens)).'"><i class="fa fa-money"></i>&nbsp;&nbsp;PAY NOW</a>
			</div>
			</div>';
		    }
	 	    ?>
    	    	</div>
    	    </li>
    	</ul>
    </div>
</div>

<script language="javascript" type="text/javascript">
function validte() {
	if (document.getElementById('txtAmount').value == "") {
		alert("Please enter Amount");
		document.getElementById('txtAmount').focus();
		return false;
	}
if (parseFloat(document.getElementById('txtAmount').value )<2.95) {
	alert("Amount should be above $ 2.95");
	document.getElementById('txtAmount').focus();
	return false;
}
return true;
}
</script>

<?
include("_members.footer.php");
?>