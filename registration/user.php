<?php
session_start();
//error_reporting(E_ALL);
//header("Cache-control: private");
if($_POST['Submit']){
	$allempty = false;
	foreach ($_POST as $p) {
		if (empty($p)) $allempty = true;
	}
	if (!$allempty){
    include_once "../dbase.php";
	include_once "../settings.php";

	$errorMsg = "";
	$username = $_POST['UserName'];
	if (!get_magic_quotes_gpc()){
		$username = addslashes($username);
	}

	$result = mysql_query("SELECT user FROM chatusers WHERE user='$username'") or die(mysql_error());

	if (mysql_num_rows($result)==1) $errorMsg='<p align="center" style="color: #FC0; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Username exists, please choose another one!</p>';
	if(md5($_POST['Password1'])!=md5($_POST['Password2'])) $errorMsg='<p align="center" style="color: #FC0; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Passwords do not match.</p>';
	if(strlen($_POST['UserName'])< 6 || strlen($_POST['UserName'])>15) $errorMsg='<p align="center" style="color:#FC0; background:#800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Username must be 6 to 15 characters long and may not contain spaces.</p>';
	if(strlen($_POST['Password1'])< 6 || strlen($_POST['Password1'])> 15) $errorMsg='<p align="center" style="color:#FC0; background:#800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Passwords must be 6 to 15 characters long and may not contain spaces.</p>';
	//if (preg_match("/^[a-z0-9]+?\.
	if ($errorMsg == ""){
		$dateRegistered=time();
		$currentTime=date("YmdHis");
		$userId=md5("$currentTime".$_SERVER['REMOTE_ADDR']);
		$db_pass=md5($_POST['Password1']);

		$_SESSION['UID']=$userId;
		$_SESSION['email']=$_POST['Email'];
		$_SESSION['password']=$_POST['Password1'];
		$_SESSION['emailtype']=$_POST['emailtype'];

		$subject = "Your account activation at $siteurl";

		if ($_POST['emailtype']=="text"){
			$message = "Thank you for registering at $siteurl. \n

			In order to activate your newly created account clcik on or copy and paste the link below in your browser:

			 $siteurl/actm.php?UID=$userId

			 Once you activate your membership you will recieve an email with your login information.\n\n

			Thanks!
			The Webmaster

			This is an automated response, please do not reply!";
		}
		else if($_POST['emailtype']=="html"){
			$message = "Thank you for registering at $siteurl

			In order to activate your newly created account click on or copy and paste the link below in your browser:
			<br><br>
			<a href='$siteurl/actm.php?UID=$userId'>$siteurl/actm.php?UID=$userId</a><br><br>
			Once you activate your membership you will recieve an email with your login information.<br><br>
			Thanks! <br>
			The Webmaster <br>
			This is an automated response, please do not reply!<br>";
		}

		include_once("../settings.php");
		$header = "From: ".$registrationemail;
		mail($_POST['Email'], $subject, $message,$header);

		mysql_query("INSERT INTO chatusers ( id , user , password , email , name , country , state , city, phone, zip , adress , dateRegistered,lastLogIn, emailnotify ,smsnotify,status,emailtype ) VALUES ('$userId','$username', '{$_POST['Password1']}', '{$_POST['Email']}', '{$_POST['Name']}', '{$_POST['Country']}', '{$_POST['State']}','{$_POST['City']}','{$_POST['phone']}', '{$_POST['ZipCode']}', '{$_POST['Adress']}', '$dateRegistered', '$currentTime','0','0','pending','{$_POST['emailtype']}')") or die(mysql_error());
		header("Location: userregistered.php");
	}}
}
?>

<?
 include("_reg.header.php");
?>

<div class="body-container">
    <div  class="col-md-12" align="center" id="Layer1">
        <ul class="bar_profile">
    	    <h2 class="topmenu col-md-12" align="center">Member Registration</h2>
        </ul>
        <br/><br/>
    	<ul class="bar_profile">
            <div class="w90">
                <form method="post" name="form1">
                    <li class="col-md-6 li_group" align="center">
                        <h3 class="tit">Login Information</h3>
                        <div class="w3-hide-large">
                            <?
                                if(isset($_POST['UserName']) && $_POST['UserName']=="")
                                    echo "<font color=#ffdd54>Username: *</font>";
                                else if(isset($_POST['UserName']) && (strlen(trim($_POST['UserName']))<6 || strlen(trim($_POST['UserName']))>15))
                                    echo "<font color=#ffdd54>Username: *</font>";
                                else
                                    echo"Username: *";
                            ?><br>
                            <input name="UserName"  value="<? if (isset($_POST['UserName'])){ echo $_POST['UserName']; }  ?>" type="text" id="UserName" class="inputtextmodel" maxlength="15">
                            <p>Username must be 6 to 15 characters long and may not contain spaces.</p>
                        </div>
                        <div class="w3-hide-large">
                            <?
                                if(isset($_POST['Password1']) && $_POST['Password1']=="")
                                    echo "<font color=#ffdd54>Password: *</font>";
                                else if(isset($_POST['Password1']) && (strlen(trim($_POST['Password1']))<6 || strlen(trim($_POST['Password1']))>15))
                                    echo "<font color=#ffdd54>Password: *</font>";
                                else
                                    echo"Password: *";
                            ?><br>
                            <input name="Password1" type="password" id="Password1"  class="inputtextmodel" maxlength="15">
                            <p>Password must be 6 to 15 characters long and may not contain spaces.</p>
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST['Password2']) && $_POST['Password2']==""){
                                echo "<font color=#ffdd54>Re-type Password: *</font>";
                                } else {
                                echo"Re-type Password: *";
                                }
                            ?><br>
                            <input name="Password2" type="password" id="Password2" class="inputtextmodel"  maxlength="15">
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST['Email']) && $_POST['Email']==""){
                                    echo "<font color=#ffdd54>E-mail: *</font>";
                                } else {
                                    echo"E-mail: *";
                                }
                            ?><br>
                            <input name="Email" value="<? if (isset($_POST['Email'])){ echo $_POST['Email']; }  ?>" type="text" id="Email" class="inputfilemodel" maxlength="48">
                        </div>
                    	<table class="w3-hide-small w3-hide-medium">
                    	    <tr>
                      			<td width="37%">
                    			    <h4><?
                        				if(isset($_POST['UserName']) && $_POST['UserName']=="")
                        					echo "<font color=#ffdd54>Username: *</font>";
                        				else if(isset($_POST['UserName']) && (strlen(trim($_POST['UserName']))<6 || strlen(trim($_POST['UserName']))>15))
                        					echo "<font color=#ffdd54>Username: *</font>";
                        				else
                        					echo"Username: *";
                        			    ?>
                                    </h4>
                    			</td>
                  		    	<td width="63%">
                    	  		    <input name="UserName"  value="<? if (isset($_POST['UserName'])){ echo $_POST['UserName']; }  ?>" type="text" id="UserName" size="30" maxlength="15">
                    	  		</td>
                	  	    </tr>
                	  	    <tr>
                	  	    	<td></td>
                    	  		<td>
                    	   		    <p>Username must be 6 to 15 characters long and may not contain spaces.</p>
                	   	    	</td>
                		    </tr>
                		    <tr>
                      			<td>
                	    		    <h4>
                                        <?
                            				if(isset($_POST['Password1']) && $_POST['Password1']=="")
                            					echo "<font color=#ffdd54>Password: *</font>";
                            				else if(isset($_POST['Password1']) && (strlen(trim($_POST['Password1']))<6 || strlen(trim($_POST['Password1']))>15))
                            					echo "<font color=#ffdd54>Password: *</font>";
                            				else
                            					echo"Password: *";
                        			    ?>
                                    </h4>
                     			</td>
                      			<td>
                      			    <input name="Password1" type="password" id="Password1" size="30" maxlength="15">
                      			</td>
                	  	    </tr>
                	  	    <tr>
                	  	    	<td></td>
                    	  		<td>
                      			    <p>Password must be 6 to 15 characters long and may not contain spaces.</p>
                      			</td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4>
                                        <? if(isset($_POST['Password2']) && $_POST['Password2']==""){
                            		  		echo "<font color=#ffdd54>Re-type Password: *</font>";
                            	 	 	    } else {
                            	 	 		echo"Re-type Password: *";
                            	  		    }
                                        ?>
                                    </h4>
                    	  		</td>
                    	  		<td>
                    	  		    <input name="Password2" type="password" id="Password2" size="30" maxlength="15">
                    	  		</td>
                		    </tr>
                		    <tr>
                      			<td>
                    	  		    <h4>
                                        <? if(isset($_POST['Email']) && $_POST['Email']==""){
                                		  		echo "<font color=#ffdd54>E-mail: *</font>";
                        	 	    	    } else {
                        	 	    	    	echo"E-mail: *";
                        	 	    	    }
                                        ?>
                                    </h4>
                	 	        </td>
                      			<td>
                      			    <input name="Email" value="<? if (isset($_POST['Email'])){ echo $_POST['Email']; }  ?>" type="text" id="Email" size="30" maxlength="48">
                                </td>
                		    </tr>
                		</table>
            	    </li>
            	    <li class="col-md-6 li_group" align="center">
                        <h3 class="tit">Personal Information</h3>
                        <div class="w3-hide-large">
                            <? if(isset($_POST['Name']) && $_POST['Name']==""){
                                    echo "<font color=#ffdd54>Full Name: *</font>";
                                } else {
                                    echo"Full Name: *";
                                }
                            ?><br>
                            <input name="Name" value="<? if (isset($_POST['Name'])){ echo $_POST['Name']; }  ?>" type="text" id="Name" class="inputtextmodel" maxlength="24">
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST['City']) && $_POST['City']==""){
                                echo "<font color=#ffdd54>City: *</font>";
                                } else {
                                echo"City: *";
                                }
                            ?><br>
                            <input name="City" value="<? if (isset($_POST['City'])){ echo $_POST['City']; } ?>" type="text" id="City" class="inputtextmodel" maxlength="24">
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST['State']) && $_POST['State']==""){
                                echo "<font color=#ffdd54>State: *</font>";
                                } else {
                                echo"State: *";
                                }
                            ?><br>
                            <input name="State" value="<? if (isset($_POST['State'])){ echo $_POST['State']; } ?>" type="text" id="State" class="inputtextmodel" maxlength="24">
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST['ZipCode']) && $_POST['ZipCode']==""){
                                echo "<font color=#ffdd54>Zip Code: *</font>";
                                } else {
                                echo"Zip Code: *";
                                }
                            ?><br>
                            <input name="ZipCode" value="<? if (isset($_POST['ZipCode'])){ echo $_POST['ZipCode']; }  ?>" type="text" id="ZipCode" class="inputtextmodel" maxlength="24">
                        </div>
                        <div class="w3-hide-large">
                            Country: *
                            <br>
                            <select name="Country" id="Country" style="width:180px !important;font-weight:300">
                                <? include ("../dbase.php");
                                include ("../settings.php");
                                $result = mysql_query('SELECT * FROM countries ORDER BY id');
                                while($row = mysql_fetch_array($result)) {
                                echo"<option value='$row[id]'";
                                if (isset($_POST['Country']) && $_POST['Country']==$row['id']) {
                                echo "selected";
                                }
                                echo ">$row[name]</option>";
                                }
                                mysql_free_result($result);
                                ?>
                            </select>
                        </div>
                    	<table class="w3-hide-small w3-hide-medium">
                		    <tr>
                      			<td width="37%">
                      			    <h4>
                                        <? if(isset($_POST['Name']) && $_POST['Name']==""){
                            		  			echo "<font color=#ffdd54>Full Name: *</font>";
                            	 	 		} else {
                            	 	 			echo"Full Name: *";
                            	 	 		}
                                        ?>
                                    </h4>
                    	 	 	</td>
                                <td width="63%">
                                    <input name="Name" value="<? if (isset($_POST['Name'])){ echo $_POST['Name']; }  ?>" type="text" id="Name" size="30" maxlength="24">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>
                                        <? if(isset($_POST['City']) && $_POST['City']==""){
                                            echo "<font color=#ffdd54>City: *</font>";
                                            } else {
                                            echo"City: *";
                                            }
                                        ?>
                                    </h4>
                                </td>
                                <td>
                                    <input name="City" value="<? if (isset($_POST['City'])){ echo $_POST['City']; } ?>" type="text" id="City" size="30" maxlength="24">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>
                                        <? if(isset($_POST['State']) && $_POST['State']==""){
                                            echo "<font color=#ffdd54>State: *</font>";
                                            } else {
                                            echo"State: *";
                                            }
                                        ?>
                                    </h4>
                                </td>
                                <td>
                                    <input name="State" value="<? if (isset($_POST['State'])){ echo $_POST['State']; } ?>" type="text" id="State" size="30" maxlength="24">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>
                                        <? if(isset($_POST['ZipCode']) && $_POST['ZipCode']==""){
                                            echo "<font color=#ffdd54>Zip Code: *</font>";
                                            } else {
                                            echo"Zip Code: *";
                                            }
                                        ?>
                                    </h4>
                                </td>
                                <td>
                                    <input name="ZipCode" value="<? if (isset($_POST['ZipCode'])){ echo $_POST['ZipCode']; }  ?>" type="text" id="ZipCode" size="30" maxlength="24">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Country: *</h4>
                                </td>
                                <td>
                                    <select name="Country" id="Country">
                                        <? include ("../dbase.php");
                                        include ("../settings.php");
                                        $result = mysql_query('SELECT * FROM countries ORDER BY id');
                                        while($row = mysql_fetch_array($result)) {
                                        echo"<option value='$row[id]'";
                                        if (isset($_POST['Country']) && $_POST['Country']==$row['id']) {
                                        echo "selected";
                                        }
                                        echo ">$row[name]</option>";
                                        }
                                        mysql_free_result($result);
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li class="col-md-6 li_group w3-hide-large w3-hide-medium" align="center">
                        <div align="center">
                            <? if($_POST['checkbox']!="checkbox"){ echo "<h3>You must agree with the terms:</h3>";}?>
                            <br>
                            <input name="checkbox" type="checkbox" value="checkbox" checked="checked" <? if( isset($_POST['checkbox']) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>&nbsp;&nbsp;I Agree with the <a class="footer_link style20" href="memberterms.php" target="_blank">Terms of Service</a>
                            <br><br>Send registration emails as:&nbsp;&nbsp;
                            <input name="emailtype" type="radio" value="text" checked>&nbsp;&nbsp;Plain text&nbsp;&nbsp;
                            <input name="emailtype" type="radio" value="html">&nbsp;&nbsp;HTML
                        </div>
                        <div align="center">
                            <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?><br>
                            <input type="submit" class="signup-button" name="Submit" value=" I am at least 18 years of age "  style="font-size: 16; text-align: center; height: unset;"/>
                        </div>
                    </li>
                    <li class="col-md-12 li_group w3-hide-small" align="center">
                        <table>
                            <tr>
                                <td>
                                    <div align="center">
                                        <? if($_POST['checkbox']!="checkbox"){ echo "<h3>You must agree with the terms:</h3>";}?>
                                        <br>
                                        <input name="checkbox" type="checkbox" value="checkbox" checked="checked" <? if( isset($_POST['checkbox']) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>&nbsp;&nbsp;I Agree with the <a class="footer_link style20" href="memberterms.php" target="_blank">Terms of Service</a>
                                        <br><br>Send registration emails as:&nbsp;&nbsp;
                                        <input name="emailtype" type="radio" value="text" checked>&nbsp;&nbsp;Plain text&nbsp;&nbsp;
                                        <input name="emailtype" type="radio" value="html">&nbsp;&nbsp;HTML
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center">
                                        <h4><?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?></h4>
                                        <input type="submit" class="signup-button" name="Submit" value=" I am at least 18 years of age "  style="font-size: 22; text-align: center; height: unset;"/>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </li>
                </form>
            </div>
        </ul>
    </div>
</div>

<?
include("_reg.footer.php");
?>
