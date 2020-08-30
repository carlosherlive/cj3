<?
include("_header-admin.php");
?>
<?
	include('../dbase.php');
	if (isset($_POST['btnSubmit']) != "")
	{
		$sql="Update paypal set email = '".$_POST['email']."', sandbox_mode = '".$_POST['sandbox_mode']."', currency = '".$_POST['currency']."' where code ='1'";
		$res=mysql_query($sql);
	}

    $sql="select * from paypal where code='1'";
    $res=mysql_query($sql);
    $row=mysql_fetch_array($res);
    
    
?>
<style type="text/css">
input {
    margin-top: 10px;
    padding: 10px 15px;
    font-size: 14px;
    text-align: center;
}
.save {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
}
select {
    margin-top: 10px;
    padding: 10px 15px;
    font-size: 16px;
    text-align: center;
}
</style>

<form action="" method="POST" onsubmit="return check();">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div align="center">
<table width="1010" border="0">
  <tr>
    <td>
      <div align="center">          
        <h1>PAYPAL PAYMENTS STANDARD</h1>
      </div>
    </td>
  </tr>
</table>
</div>
<table width="1010" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#ffffff">
  <tr>
    <td bgcolor="#ffffff" class="form_definitions"><p align="center">EMAIL:<br> 
        <input type="text" name="email" id="email" value="<?=$row['email']?>" size="40" />    
    </td>
  </tr>
  <tr>
    <td bgcolor="#ffffff" class="form_definitions"><p align="center">CURRENCY:<br> 
	<input type="text" name="currency" id="currency" value="<?=$row['currency']?>" size="20" />
    </td>
  </tr>
  <tr>
    <td bgcolor="#ffffff" class="form_definitions"><p align="center">SANDBOX MODE:<br>
	<select name="sandbox_mode" id="sandbox_mode" class="sel">
		<?php if ($row['sandbox_mode'] == 'Yes') { ?>
                    <option value="Yes" selected="selected">Yes</option>
                    <option value="No">No</option>
                    <?php } else { ?>
                    <option value="Yes">Yes</option>
                    <option value="No" selected="selected">No</option>
                <?php } ?>
        </select>
    </td>
  </tr>
  <tr>
    <td bgcolor="#ffffff" class="form_definitions"><p align="center">
        <input type="submit" value="SAVE" class="save" name="btnSubmit"/>
    </td>
  </tr>
  <tr>
    <td bgcolor="#ffffff" class="form_definitions">
        <a href="https://www.paypal.com/co" target="_blank"><img src="images/PP.png" rel="nofollow" alt="PayPal Payments Express By: hardsoftech.com" width="110" height="110" border="0" /></a>
    </td>
  </tr>
</table>
</form>
<script language="javascript" type="text/javascript">
function check()
{
	if (document.getElementById('email').value =="")
	{
		alert("Please enter email.");
		document.getElementById('email').focus();
		return false;
	}
	if (document.getElementById('sandbox_mode').value =="")
	{
		alert("Please enter Sandbox Mode.");
		document.getElementById('sandbox_mode').focus();
		return false;
	}
	if (document.getElementById('currency').value =="")
	{
		alert("Please enter Currency.");
		document.getElementById('currency').focus();
		return false;
	}
	return true;
}
</script>
<?
include("_footer-admin.php")
?>
