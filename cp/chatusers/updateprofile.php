<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" ) {
	header("location: ../../login.php");
} else {
	include("../../dbase.php");
	include("../../settings.php");
	$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row[user];
	}
}
?>

<?
if($_POST[Email]!=""  && $_POST[Name] !="" && $_POST[Country] !="" && $_POST[State] !="" && $_POST[City] !=""&& $_POST[ZipCode] !="" && $_POST[Adress] !="" && $_POST[Phone] !="") {
	include("../../dbase.php");
	$id=$_COOKIE["id"];
	$tempUser=$username;
	$tempPass1=$_POST[Password1];
	$tempPass2=$_POST[Password2];

	$tempEmail=$_POST[Email];
	$tempName = $_POST[Name];
	$tempCountry = $_POST[Country];
	$tempState= $_POST[State];
	$tempPhone=$_POST[Phone];
	$tempCity=$_POST[City];
	$tempZip = $_POST[ZipCode];
	$tempAdress = $_POST[Adress];

	$month=date("n");
	$year=date("Y");
	$endDate=mktime (0,0,0,22,$month,$year);	

	mysql_query("UPDATE chatusers SET phone=$tempPhone, email='$tempEmail', name='$tempName', country='$tempCountry', state='$tempState', city='$tempCity', zip='$tempZip', adress='$tempAdress' WHERE id = '$id' LIMIT 1");
     	$errorMsg='<p align="center" style="color: #FC0; background: darkgreen; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Your Profile Has Been Updated</p>';

	if ($_POST[Password1]!="") {	
    		if(strlen(trim($_POST[Password1]))<9 && strlen(trim($_POST[Password1]))>5 ) {
	 		$db_pass=md5($_POST[Password1]);
     			mysql_query("UPDATE chatusers SET password='$db_pass' WHERE id = '$id' LIMIT 1");
			$errorMsg='<p align="center" style="color: #FC0; background: darkgreen; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Your Password Has Been Updated</p>';
		} else {
			$errorMsg='<p align="center" style="color: #FC0; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Password must be 6 to 8 characters long and may not contain spaces.</p>';
		}
	}
} else if (!isset($_POST[Password1])) {
	include("../../dbase.php");
	$id=$_COOKIE["id"];
	$result = mysql_query("SELECT * FROM chatusers WHERE id='".$id."'");
	while($row = mysql_fetch_array($result)) {
		$tempUser=$row["user"];
		$tempPass1=$row["password"];
		$tempPass2=$row["password"];
		$tempState=$row["state"];
		$tempEmail=$row["email"];
		$tempName = $row["name"];
		$tempCountry = $row["country"];
		$tempZip = $row["zip"];
		$tempCity=$row["city"];
		$tempAdress = $row["adress"];
		$tempPhone= $row[phone];
	}
} else {
	$id=$_COOKIE["id"];
	$tempUser=$username;
	$tempPass1=$_POST[Password1];
	$tempPass2=$_POST[Password2];	
	$tempEmail=$_POST[Email];
	$tempName = $_POST[Name];
	$tempCountry = $_POST[Country];
	$tempState= $_POST[State];
	$tempPhone=$_POST[Phone];	
	$tempCity=$_POST[City];
	$tempZip = $_POST[ZipCode];
	$tempAdress = $_POST[Adress];
	$errorMsg='<p align="center" style="color: #FFF; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Please fill in all boxes with valid information.</p>';
}
?>

<?
include("_members.header.php");
?>

<div class="body-container">
    <div  class="col-md-12" align="center">
        <ul class="bar_profile">
	    <h2 class="topmenu col-md-12" align="center">Profile</h2>
        </ul>
        <br/><br/>
        <ul class="bar_profile">
        <div class="w90">
            <form name="form1" method="post" action="updateprofile.php">
            <li class="col-md-6 li_group" align="center">
                <h3 class="tit">Personal Data & Access</h3>
                <table>
        	    <tr>
          		<td width="37%"><h4>Username:</h4></td>
          		<td width="63%" class="user_n"><? echo $tempUser;?></td>
        	    </tr>
        	    <tr>
          		<td><h4><? if($tempEmail==""){ echo "<font color=blue>Email: *</font>";} else { echo"Email: *"; }?></h4></td>
          		<td><input name="Email" type="text" id="Email" value="<? echo $tempEmail;?>" size="30" maxlength="30"></td>
        	    </tr>
        	    <tr>
          		<td><h4><? if($tempName==""){ echo "<font color=blue>Full Name: *</font>";} else { echo"Full Name: *"; }?></h4></td>
          		<td><input name="Name" type="text" id="Name" value="<? echo $tempName;?>" size="30" maxlength="30"></td>
        	    </tr>
        	    <tr>
        	    	<td><h4><? if($tempPhone==""){ echo "<font color=blue>Phone: *</font>";} else { echo"Phone: *"; }?></h4></td>
        	    	<td><input name="Phone" type="text" id="Phone" value="<? echo $tempPhone;?>" size="30" maxlength="30"></td>
        	    </tr>
        	    <tr>
          		<td><h4>New Passsword:</h4></td>
          		<td><input name="Password1" type="password" id="Password1" size="30" maxlength="30"></td>
          	    </tr>
        	    <tr>
        	    	<td></td>
          		<td><span>Required only if changing password</span></td>
        	    </tr>
    		</table>
            </li>
            <li class="col-md-6 li_group" align="center">
                <h3 class="tit">Main Address</h3>
                <table>
                    <tr>
                    	<td width="37%"><h4><? if($tempAdress==""){ echo "<font color=blue>Address: *</font>";} else { echo"Address: *"; }?></h4></td>
            		<td width="63%"><textarea name="Adress" cols="30" rows="3" id="Adress"><? echo $tempAdress;?></textarea></td>
          	    </tr>
		    <tr>
		    	<td><h4><? if($tempCity==""){ echo "<font color=blue>City: *</font>";} else { echo"City: *"; }?></h4></td>
		    	<td><input name="City" type="text" id="City" value="<? echo $tempCity;?>" size="30" maxlength="30"></td>
		    </tr>
		    <tr>
		    	<td><h4><? if($tempZip==""){ echo "<font color=blue>Zip Code: *</font>";} else { echo"Zip Code: *"; }?></h4></td>
		    	<td><input name="ZipCode" type="text" id="ZipCode" value="<? echo $tempZip;?>" size="30" maxlength="30"></td>
        	    </tr>
        	    <tr>
        	    	<td><h4><? if($tempState==""){ echo "<font color=blue>State: *</font>";} else { echo"State: *"; }?></h4></td>
        	    	<td><input name="State" type="text" id="State" value="<? echo $tempState;?>" size="30" maxlength="30"></td>
          	    </tr>
          	    <tr>
          	    	<td><h4>Country: *</h4></td>
          	    	<td>
          	    	    <select name="Country" id="Country">
          	    	    <?
          	    	    	$result = mysql_query('SELECT * FROM countries ORDER BY id');
          	    	    	while($row = mysql_fetch_array($result)) {
          	    	    	    echo"<option value='$row[id]'";
          	    	    	    if ($tempCountry==$row[id]) {
          	    	    	        echo "selected";
          	    	    	    }
          	    	    	    echo ">$row[name]</option>";
          	    	    	}
          	    	    ?>
          	    	    </select>
          	    	</td>
          	    </tr>
   		</table>
            </li>
            <li class="col-md-12 li_group" align="center">
            	<table>
            	    <tr>
            	    	<td>
            	    	    <h4><?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?></h4>
            	    	    <div align="center"><input class="update" type="submit" value="Update Now" align="center"></div>
            	    	</td>
            	    </tr>
           	</table>    
            </li>
            </form>
        </div>
        </ul>
        <br/><br/>
    </div>
</div>

<?
include("_members.footer.php");
?>

