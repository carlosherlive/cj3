<?php
session_start();
?>
<?php

$errorMsg="";

if($_POST['UserName']!="" && $_POST['Password1']!="" && $_POST['Password2']!="" && $_POST['Email']!="" && $_POST['Name'] !="" && $_POST['Country'] !="" && $_POST['State'] !="" && $_POST['City'] !=""&& $_POST['ZipCode'] !="" && $_POST['Adress'] !=""  &&  $_POST['phone']!="" && $_FILES['ActImage']['tmp_name']!="" && $_FILES['RImage']['tmp_name']!="" && $_POST['checkbox']!="" && $_POST['L1'] != "" && $_POST['day'] != "" && $_POST['month'] != "" && $_POST['year'] != ""){

	//database settings and connection
	include("../dbase.php");
	include("../settings.php");

	//check if we have a user with the same username
	$replacevalues = array('&','/'," ","?","+","%","$","#","@");
	$username=str_replace($replacevalues,"", $_POST['UserName']);
	$result = mysql_query("SELECT user FROM chatmodels WHERE user='$username'");
	if (mysql_num_rows($result)>=1){
	//if username already exists
		$errorMsg.="Username exists, please choose another one!<br>";
	} else {
		if($_POST['Password1']!=$_POST['Password2']) {
		//if passwords do not match
			$errorMsg.="<br>Passwords do not match<br>";
		}
		if(strlen($_POST['Password1'])<6){
		//if password length is less than 6
			$errorMsg.="<br>Passwords must be at least 6 characters long<br>";
		}
		//if we can not m,ake the dir
		@rmdir("../models/".$username."/");
		@mkdir("../models/".$username."/");
		$dateRegistered=time();
		$currentTime=date("YmdHis");
		$userId=md5("$currentTime".$_SERVER['REMOTE_ADDR']);
		$urlIdentityImage="../models/".$username."/".$userId.".jpg";
		$urlRImage="../models/".$username."/representative.jpg";
		if($_FILES['ImageFile']['tmp_name']!="" && isset($_POST['L1'])){
			//we copy the thumbail image
			$urlThumbnail="../models/".$username."/thumbnail.jpg";
			/*if (!copy($_FILES['ImageFile']['tmp_name'],$urlThumbnail))
			{
				$errorMsg='Thumbnail image file could not be copied, please try again.';
			}*/
if ($check=getimagesize($_FILES['ImageFile']['tmp_name']))

		{
$src=imagecreatefromstring(file_get_contents($_FILES['ImageFile']['tmp_name']));
$theight=300;
$twidth=210;
$tmp=imagecreatetruecolor($theight,$twidth);
imagecopyresampled($tmp,$src,0,0,0,0,$theight,$twidth,$check[0],$check[1]);
imagejpeg($tmp,$urlThumbnail,100);
		} else {
			$errorMsg="File not Copied";
		}
		}
		if(!copy($_FILES['ActImage']['tmp_name'],$urlIdentityImage)){
			$errorMsg.="<br>Could not load ID image to database";
		}
		if(!copy($_FILES['RImage']['tmp_name'],$urlRImage)){
			$errorMsg.="<br>Could not load representative image to database";
		}
	}

	if($errorMsg==""){
	//user ID
		$pass=$_POST['Password1'];
		$db_pass=md5($pass);
		$birthDate = $_POST['day']."/".$_POST['month']."/".$_POST['year'];
		$_SESSION['dateregistered']=$dateRegistered;
		$_SESSION['userid']=$userId;
		$_SESSION['userid3']='nasnas';
		$_SESSION['username']=$username;
		$_SESSION['password']=$_POST['Password1'];
		$_SESSION['L1'] = $_POST['L1'];
		$_SESSION['password_encrypted']=$db_pass;
		$_SESSION['name']=$_POST['Name'];
		$_SESSION['email']=$_POST['Email'];
		$_SESSION['country']=$_POST['Country'];
		$_SESSION['state']=$_POST['State'];
		$_SESSION['city']=$_POST['City'];
		$_SESSION['zipcode']=$_POST['ZipCode'];
		$_SESSION['adress']=$_POST['Adress'];
		$_SESSION['phone']=$_POST['phone'];
		$_SESSION['emailtype']=$_POST['emailtype'];
		$_SESSION['birthDate'] = $birthDate;
		session_write_close();

mysql_query("insert into chatmodels (id,user,password,email,phone,name,country,state,city,zip,adress,dateRegistered,status,birthDate,language1,category,pMethod,pInfo)values('$userId','$username','$db_pass','$_SESSION[email]','$_SESSION[phone]','$_SESSION[name]','$_SESSION[country]','$_SESSION[state]','$_SESSION[city]','$_SESSION[zipcode]','$_SESSION[adress]','$dateRegistered','pending', '$_SESSION[birthDate]', '$_SESSION[L1]','$_POST[Category]','$_POST[PMethod]','$_POST[PInfo]')");


$dt=date('m/d/Y H:i:s', $_SESSION['dateregistered']);

$subject="New model registration ($_SESSION[username])";

$charset="Content-type: text/plain; charset=iso-8859-1\r\n";

$message="$_SESSION[username] has just registered at $siteurl

To view the models details use the link below:

$siteurl/admin/subscriptionviewdetails.php?id=$_SESSION[userid]

Date and time registered: $dt ";



		mail($registrationemail, $subject, $message,

     	"MIME-Version: 1.0\r\n".

    	 $charset.

     	"From:'$registrationemail'\r\n".

		"Reply-To:'$registrationemail'\r\n".

    	"X-Mailer:PHP/". phpversion());
header("Location: modelregistered.php");

	}
}else{

$errorMsg='<p align="center" style="color: #FC0; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">You must fill in all required fields marked with a *</p>';

}

?>
<?php
include("_reg.header.php");
?>

<div class="body-container">
    <div  class="col-md-12" align="center" id="Layer1">
        <ul class="bar_profile">
    	    <h2 class="topmenu col-md-12" align="center">START MAKING MONEY AS A LIVE WEBCAM PERFORMER TODAY!</h2>
        </ul>
        <br/><br/>
    	<ul class="bar_profile">
            <div class="w90">
                <form action="model.php" method="post" enctype="multipart/form-data" name="form1" target="_self">
                    <li class="col-md-6 li_group" align="center">
                        <h3 class="tit">Login Information</h3>
                            <div class="w3-hide-large">
                                <?if(isset($_POST['UserName']) && $_POST['UserName']=="")
                                    echo "<font color=#ffdd54>Username: *</font>";
                                else if(isset($_POST['UserName']) && (strlen(trim($_POST['UserName']))<6 || strlen(trim($_POST['UserName']))>15))
                                    echo "<font color=#ffdd54>Username: *</font>";
                                else
                                    echo"Username: *";
                                ?><br>
                                <input name="UserName"  value="<? if (isset($_POST['UserName'])){ echo $_POST['UserName']; }  ?>" type="text" id="UserName" maxlength="15" class="inputtextmodel">
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
                                <input name="Password1" type="password" id="Password1" maxlength="15" class="inputtextmodel">
                                <p>Password must be 6 to 15 characters long and may not contain spaces.</p>
                            </div>
                            <div class="w3-hide-large">
                                <? if(isset($_POST['Password2']) && $_POST['Password2']==""){
                                    echo "<font color=#ffdd54>Re-type Password: *</font>";
                                    } else {
                                    echo"Re-type Password: *";
                                }?><br>
                                <input name="Password2" type="password" id="Password2" maxlength="15" class="inputtextmodel">
                            </div>
                            <div class="w3-hide-large">
                                <? if(isset($_POST['Email']) && $_POST['Email']==""){
                                    echo "<font color=#ffdd54>E-mail: *</font>";
                                    } else {
                                        echo"E-mail: *";
                                    }
                                ?><br>
                                <input name="Email" value="<? if (isset($_POST['Email'])){ echo $_POST['Email']; }  ?>" type="text" id="Email" maxlength="48"  class="inputtextmodel">
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
                			    ?></h4>
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
                        		    <h4><?
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
                        	  		    }?>
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

                		<h3 class="tit">Images</h3>
                        <div class="w3-hide-large">
                            <?
                                if(isset($_FILES['ImageFile']['name'])){
                                    echo "<font color=#ffdd54>Your Profile Picture: *</font>";
                                } else { echo"Your Profile Picture: *";}
                            ?>
                            <br>
                            <input name="ImageFile" type="file" value="" id="ImageFile" class="inputfilemodel">
                            <p><span>What users see when they browse.</span></p>
                            <? if(isset($_FILES['ActImage']['name'])){
                                echo "<font color=#ffdd54>Photo ID: *</font>";
                            } else{ echo"Photo ID: *";}
                            ?>
                            <br>
                            <input name="ActImage" type="file" value="" id="ActImage" class="inputfilemodel"/>
                            <p><span>Valid picture ID required.<span></p>
                            <? if(isset($_FILES['RImage']['name'])){
                                echo "<font color=#ffdd54>Your Picture: *</font>";
                            } else { echo"Your Picture: *";}
                            ?>
                            <input name="RImage" type="file" value="" id="RImage" class="inputfilemodel"/>
                            <p><span>Picture of you for our records.</span></p>
                        </div>
                		<table class="w3-hide-small w3-hide-medium">
                		    <tr>
                      			<td>
                      			    <h4><? if(isset($_FILES['ImageFile']['name'])){
                    		  		echo "<font color=#ffdd54>Your Profile Picture: *</font>";
                    	 	 	    	} else { echo"Your Profile Picture: *";}
                    	  	  	    ?></h4>
                    	  	  	</td>
                      			<td>
                      			    <input name="ImageFile" type="file" value="" id="ImageFile">
                      			    <span>What users see when they browse.</span>
                      			</td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4>
                                        <? if(isset($_FILES['ActImage']['name'])){
                        		  		echo "<font color=#ffdd54>Photo ID: *</font>";
                        	 	 		} else{ echo"Photo ID: *";}
                        	  	  	    ?>
                                    </h4>
                    	  	  	</td>
                      			<td>
                      			    <input name="ActImage" type="file" value="" id="ActImage" />
                      			    <span>Valid picture ID required.<span>
                      			</td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4><? if(isset($_FILES['RImage']['name'])){
                    		  		echo "<font color=#ffdd54>Your Picture: *</font>";
                    	 	 		} else { echo"Your Picture: *";}
                    	  	  	    ?></h4>
                    	  	  	</td>
                      			<td>
                      			    <input name="RImage" type="file" value="" id="RImage" />
                      			    <span>Picture of you for our records.</span>
                      			</td>
                		    </tr>
                        </table>
            	    </li>
            	    <li class="col-md-6 li_group" align="center">
                        <h3 class="tit">Personal Information</h3>
                        <div class="w3-hide-large">
                            <? if(isset($_POST[Name]) && $_POST[Name]==""){
                                    echo "<font color=#ffdd54>Full Name: *</font>";
                                    } else {
                                    echo"Full Name: *";
                                    }
                            ?><br>
                            <input name="Name" value="<? if (isset($_POST[Name])){ echo $_POST[Name]; }  ?>" type="text" id="Name"  maxlength="24" class="inputtextmodel"/>
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST['day']) && $_POST['day'] == "") { echo "<font color=#ffdd54>"; }?>Date of Birth: *
                                <br>
                                <select name="day" id="day">
                                    <? for($i=1; $i<=31; $i++) {
                                        if ($i<9) {
                                        $a = $i;
                                        $i='0'.$i;
                                        }
                                        echo "<option value='$i'";
                                        if ($_POST[day]==$i){ echo "selected";}
                                        echo">$i</option>";
                                        if ($i<9)
                                        $i = $a;
                                        }
                                    ?>
                                </select>
                                <select name="month" id="month">
                                    <option value="Jan" <? if ($_POST[month]=="January"){ echo "selected";} else if (!isset($_POST[month])){ echo "selected";}?>>January</option>
                                    <option value="Feb" <? if ($_POST[month]=="February"){ echo "selected";}?>>February</option>
                                    <option value="Mar" <? if ($_POST[month]=="March"){ echo "selected";}?>>March</option>
                                    <option value="Apr" <? if ($_POST[month]=="April"){ echo "selected";}?>>April</option>
                                    <option value="May" <? if ($_POST[month]=="May"){ echo "selected";}?>>May</option>
                                    <option value="Jun" <? if ($_POST[month]=="June"){ echo "selected";}?>>June</option>
                                    <option value="Jul" <? if ($_POST[month]=="July"){ echo "selected";}?>>July</option>
                                    <option value="Aug" <? if ($_POST[month]=="August"){ echo "selected";}?>>August</option>
                                    <option value="Sep" <? if ($_POST[month]=="September"){ echo "selected";}?>>September</option>
                                    <option value="Oct" <? if ($_POST[month]=="October"){ echo "selected";}?>>October</option>
                                    <option value="Nov" <? if ($_POST[month]=="November"){ echo "selected";}?>>November</option>
                                    <option value="Dec" <? if ($_POST[month]=="December"){ echo "selected";}?>>December</option>
                                </select>
                                <select name="year" id="year">
                                    <? for($i=1950; $i<=date(Y)-18; $i++) {
                                            echo "<option value='$i'";
                                        if ($_POST[year]==$i){ echo "selected";}
                                            echo ">$i</option>";
                                        }
                                    ?>
                                </select>
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST[phone]) && $_POST[phone]=="") {
                                    echo "<font color=#ffdd54>Phone: *</font>";
                                } else {
                                    echo"Phone: *";
                                }
                            ?><br>
                            <input name="phone" value="<? if (isset($_POST[phone])){ echo $_POST[phone]; }  ?>" type="text" id="phone" maxlength="24" class="inputtextmodel"/>
                        </div>
                        <div class="w3-hide-large">
                            Language: *<br>
                            <select name="L1" id="L1">
                                <option value="English"  <? if (isset($_POST[L1]) && $_POST[L1]=="English"){echo "selected";}  else if (!isset($_POST[L1])){ echo "selected"; }?>>English</option>
                                <option value="Dutch" <? if (isset($_POST[L1]) && $_POST[L1]=="Dutch"){echo "selected";}?>>Dutch</option>
                                <option value="French" <? if (isset($_POST[L1]) && $_POST[L1]=="French"){echo "selected";}?>>French</option>
                                <option value="German" <? if (isset($_POST[L1]) && $_POST[L1]=="German"){echo "selected";}?>>German</option>
                                <option value="Italian" <? if (isset($_POST[L1]) && $_POST[L1]=="Italian"){echo "selected";}?>>Italian</option>
                                <option value="Japanese" <? if (isset($_POST[L1]) && $_POST[L1]=="Japanese"){echo "selected";}?>>Japanese</option>
                                <option value="Korean" <? if (isset($_POST[L1]) && $_POST[L1]=="Korean"){echo "selected";}?>>Korean</option>
                                <option value="Portuguese" <? if (isset($_POST[L1]) && $_POST[L1]=="Portuguese"){echo "selected";}?>>Portuguese</option>
                                <option value="Spanish" <? if (isset($_POST[L1]) && $_POST[L1]=="Spanish"){echo "selected";}?>>Spanish</option>
                            </select>
                        </div>
                        <div class="w3-hide-large">
                            Categoria<br>
                            <select name="Category" id="Category">
                                <?php
                                $query=mysql_query("select * from category order by name asc");
                                while($row=mysql_fetch_object($query)) {
                                if($row->name==$_POST['Category'])
                                    echo '<option selected>'.$row->name.'</option>';
                                else
                                    echo '<option>'.$row->name.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST[Adress]) && $_POST[Adress]==""){
                                echo "<font color=#ffdd54>Address: *</font>";
                                } else {echo"Street Adress: *";}
                            ?><br>
                            <textarea name="Adress" cols="20" rows="5" id="Adress"><? if (isset($_POST[Adress])){echo "$_POST[Adress]"; } ?></textarea>
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST[City]) && $_POST[City]=="") {
                                echo "<font color=#ffdd54>City: *</font>";
                                } else { echo"City: *";}
                            ?><br>
                            <input name="City" value="<? if (isset($_POST[City])){ echo $_POST[City]; } ?>" type="text" id="City"  maxlength="24" />
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST[State]) && $_POST[State]==""){
                                echo "<font color=#ffdd54>State: *</font>";
                                } else { echo"State: *";}
                            ?><br>
                            <input name="State" value="<? if (isset($_POST[State])){ echo $_POST[State]; } ?>" type="text" id="State" maxlength="24" />
                        </div>
                        <div class="w3-hide-large">
                            <? if(isset($_POST[ZipCode]) && $_POST[ZipCode]==""){
                                echo "<font color=#ffdd54>Zip Code: *</font>";
                                } else { echo"Zip Code: *";}
                            ?><br>
                            <input name="ZipCode" value="<? if (isset($_POST[ZipCode])){ echo $_POST[ZipCode]; }  ?>" type="text" id="ZipCode" maxlength="24" />
                        </div>
                        <div class="w3-hide-large">
                            Country<br>
                            <select name="Country" id="Country">
                                <?
                                    include ("../dbase.php");
                                    include ("../settings.php");
                                    $result = mysql_query('SELECT * FROM countries ORDER BY id');
                                        while($row = mysql_fetch_array($result)) {
                                        echo"<option value='$row[id]'";
                                    if (isset($_POST[Country]) && $_POST[Country]==$row[id]) {
                                        echo "selected";
                                    }
                                        echo ">$row[name]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    	<table class="w3-hide-small w3-hide-medium">
                    	    <tr>
                      			<td witdh="37%">
                      			    <h4><? if(isset($_POST[Name]) && $_POST[Name]==""){
                    		  		echo "<font color=#ffdd54>Full Name: *</font>";
                    	 	 	    } else {
                    	 	 	   	echo"Full Name: *";
                    	 	 	    }
                    	  	  	    ?></h4>
                    	  	  	</td>
                      			<td width="67%">
                        		    <input name="Name" value="<? if (isset($_POST[Name])){ echo $_POST[Name]; }  ?>" type="text" id="Name" size="30" maxlength="24" />
                        		</td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4><? if(isset($_POST['day']) && $_POST['day'] == "") { echo "<font color=#ffdd54>"; }?>Date of Birth: *</h4>
                      			</td>
                      			<td>
                      			    <select name="day" id="day">
                          			<? for($i=1; $i<=31; $i++) {
                    				    if ($i<9) {
                    					$a = $i;
                    					$i='0'.$i;
                    				    }
                    		  			echo "<option value='$i'";
                    		  		    if ($_POST[day]==$i){ echo "selected";}
                    		  			echo">$i</option>";
                    				    if ($i<9)
                    					$i = $a;
                        		  		}
                    		  		?>
                      			    </select>
                        		    <select name="month" id="month">
                              			<option value="Jan" <? if ($_POST[month]=="January"){ echo "selected";} else if (!isset($_POST[month])){ echo "selected";}?>>January</option>
                              			<option value="Feb" <? if ($_POST[month]=="February"){ echo "selected";}?>>February</option>
                              			<option value="Mar" <? if ($_POST[month]=="March"){ echo "selected";}?>>March</option>
                        	  			<option value="Apr" <? if ($_POST[month]=="April"){ echo "selected";}?>>April</option>
                              			<option value="May" <? if ($_POST[month]=="May"){ echo "selected";}?>>May</option>
                              			<option value="Jun" <? if ($_POST[month]=="June"){ echo "selected";}?>>June</option>
                              			<option value="Jul" <? if ($_POST[month]=="July"){ echo "selected";}?>>July</option>
                              			<option value="Aug" <? if ($_POST[month]=="August"){ echo "selected";}?>>August</option>
                              			<option value="Sep" <? if ($_POST[month]=="September"){ echo "selected";}?>>September</option>
                              			<option value="Oct" <? if ($_POST[month]=="October"){ echo "selected";}?>>October</option>
                              			<option value="Nov" <? if ($_POST[month]=="November"){ echo "selected";}?>>November</option>
                              			<option value="Dec" <? if ($_POST[month]=="December"){ echo "selected";}?>>December</option>
                        		    </select>
                        		    <select name="year" id="year">
                              			<? for($i=1950; $i<=date(Y)-18; $i++) {
                            		  			echo "<option value='$i'";
                            		   		if ($_POST[year]==$i){ echo "selected";}
                            		  			echo ">$i</option>";
                            		  		}
                        		  		?>
                        		    </select>
                        		</td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4><? if(isset($_POST[phone]) && $_POST[phone]=="") {
                    		  		echo "<font color=#ffdd54>Phone: *</font>";
                    	 	 	    } else {
                    	 	 	    	echo"Phone: *";
                    	 	 	    }
                    	  	  	    ?></h4>
                    	  	  	</td>
                      			<td>
                      			    <input name="phone" value="<? if (isset($_POST[phone])){ echo $_POST[phone]; }  ?>" type="text" id="phone" size="30" maxlength="24" />
                      			</td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4>Language: *</h4>
                      			</td>
                      			<td>
                      			    <select name="L1" id="L1">
                        	  			<option value="English"  <? if (isset($_POST[L1]) && $_POST[L1]=="English"){echo "selected";}  else if (!isset($_POST[L1])){ echo "selected"; }?>>English</option>
                              			<option value="Dutch" <? if (isset($_POST[L1]) && $_POST[L1]=="Dutch"){echo "selected";}?>>Dutch</option>
                              			<option value="French" <? if (isset($_POST[L1]) && $_POST[L1]=="French"){echo "selected";}?>>French</option>
                              			<option value="German" <? if (isset($_POST[L1]) && $_POST[L1]=="German"){echo "selected";}?>>German</option>
                        		  		<option value="Italian" <? if (isset($_POST[L1]) && $_POST[L1]=="Italian"){echo "selected";}?>>Italian</option>
                        		  		<option value="Japanese" <? if (isset($_POST[L1]) && $_POST[L1]=="Japanese"){echo "selected";}?>>Japanese</option>
                        		  		<option value="Korean" <? if (isset($_POST[L1]) && $_POST[L1]=="Korean"){echo "selected";}?>>Korean</option>
                        		  		<option value="Portuguese" <? if (isset($_POST[L1]) && $_POST[L1]=="Portuguese"){echo "selected";}?>>Portuguese</option>
                    	      			<option value="Spanish" <? if (isset($_POST[L1]) && $_POST[L1]=="Spanish"){echo "selected";}?>>Spanish</option>
                	    		    </select>
                	    		</td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4>Category:</h4>
                      			</td>
                      			<td>
                        		    <select name="Category" id="Category">
                        				<?php
                        				$query=mysql_query("select * from category order by name asc");
                        				while($row=mysql_fetch_object($query)) {
                        				if($row->name==$_POST['Category'])
                        					echo '<option selected>'.$row->name.'</option>';
                        				else
                        					echo '<option>'.$row->name.'</option>';
                        				}
                        				?>
                	    		    </select>
                	    		</td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4><? if(isset($_POST[Adress]) && $_POST[Adress]==""){
                        		  		echo "<font color=#ffdd54>Address: *</font>";
                        	 	 		} else {echo"Street Adress: *";}
                        	  	  	    ?>
                                    </h4>
                    	  	  	</td>
                      			<td>
                      			    <textarea name="Adress" cols="30" rows="5" id="Adress"><? if (isset($_POST[Adress])){echo "$_POST[Adress]"; } ?></textarea>
                  		        </td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4><? if(isset($_POST[City]) && $_POST[City]=="") {
                    		  		echo "<font color=#ffdd54>City: *</font>";
                    	 	 		} else { echo"City: *";}
                    	  	  	    ?>
                                    </h4>
                    	  	  	</td>
                      			<td>
                      			    <input name="City" value="<? if (isset($_POST[City])){ echo $_POST[City]; } ?>" type="text" id="City" size="30" maxlength="24" />
                      			</td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4><? if(isset($_POST[State]) && $_POST[State]==""){
                        		  		echo "<font color=#ffdd54>State: *</font>";
                        	 	 		} else { echo"State: *";}
                        	  	  	    ?>
                                    </h4>
                    	  	  	</td>
                      			<td>
                      			    <input name="State" value="<? if (isset($_POST[State])){ echo $_POST[State]; } ?>" type="text" id="State" size="30" maxlength="24" />
                      			</td>
                		    </tr>
                		    <tr>
                      			<td>
                      			    <h4><? if(isset($_POST[ZipCode]) && $_POST[ZipCode]==""){
                        		  		echo "<font color=#ffdd54>Zip Code: *</font>";
                        	 	 	    } else { echo"Zip Code: *";}
                        	  	  	    ?>
                                    </h4>
                    	  	  	</td>
                      			<td>
                      			    <input name="ZipCode" value="<? if (isset($_POST[ZipCode])){ echo $_POST[ZipCode]; }  ?>" type="text" id="ZipCode" size="30" maxlength="24" />
                      			</td>
                		    </tr>
                    	    <tr>
                      			<td>
                      			    <h4>Country: *</h4>
                      			</td>
                      			<td>
                      			    <select name="Country" id="Country">
                              			<?
                            				include ("../dbase.php");
                            				include ("../settings.php");
                            				$result = mysql_query('SELECT * FROM countries ORDER BY id');
                                				while($row = mysql_fetch_array($result)) {
                            					echo"<option value='$row[id]'";
                            				if (isset($_POST[Country]) && $_POST[Country]==$row[id]) {
                            					echo "selected";
                            				}
                            					echo ">$row[name]</option>";
                            				}
                        		  		?>
                        		    </select>
                        		</td>
                		    </tr>
                    	</table>
                    	<h3 class="tit">Payout Information</h3>
                        <div class="w3-hide-large">
                            Payout Method:<br>
                            <select name="PMethod" id="PMethod" onChange="mostrar(this.value);">
                                <option value="PayPal" <? if ($_POST[PMethod]=="PayPal"){ echo "selected";} else if (!isset($_POST[PMethod])){ echo "selected";}?> >Paypal</option>
                                <option value="Payoneer" <? if ($_POST[PMethod]=="Payoneer"){ echo "selected";}?> >Payoneer</option>
                                <option value="Transferencia" <? if ($_POST[PMethod]=="Transferencia"){ echo "selected";}?> >Transferencia Bancaria</option>
                            </select>
                        </div>
                        <div class="w3-hide-large">
                        </div>
                        <div class="w3-hide-large" id="paypal">
                            Paypal Email:<br>
                            <input name='PInfo' type='text' id='PInfo' value='<? if (isset($_POST[PInfo])){ echo $_POST[PInfo]; }  ?>'>
                        </div>
                        <div class="w3-hide-large" id='payoneer' style='display: none;'>
                            Full Name<br>Phone Number<br>Address<br>City<br>Country<br>
                            <textarea name='PInfo' id='PInfo' cols='20' rows='5'><? if (isset($_POST[PInfo])){ echo $_POST[PInfo]; }  ?></textarea>
                        </div>
                        <div class="w3-hide-large" id='transfer'style='display: none;'>
                            Full Name<br>Bank Name<br>Account Number<br>IBAN Code<br>Swift Code<br>Address<br>City<br>Country<br>
                            <textarea name='PInfo' id='PInfo' cols='20' rows='8'><? if (isset($_POST[PInfo])){ echo $_POST[PInfo]; }  ?></textarea>
                        </div>
                      	<table class="w3-hide-small w3-hide-medium">
                    	    <tr>
                          		<td width="37%"><h4>Payout Method:</h4></td>
                          		<td width="63%">
                          		    <select name="PMethod" id="PMethod" onChange="mostrar(this.value);">
                            	   	<option value="PayPal" <? if ($_POST[PMethod]=="PayPal"){ echo "selected";} else if (!isset($_POST[PMethod])){ echo "selected";}?> >Paypal</option>
                            	   	<option value="Payoneer" <? if ($_POST[PMethod]=="Payoneer"){ echo "selected";}?> >Payoneer</option>
                            	   	<option value="Transferencia" <? if ($_POST[PMethod]=="Transferencia"){ echo "selected";}?> >Transferencia Bancaria</option>
                            	    </select>
                          		</td>
                    	    </tr>
                    	    <tr id='paypal'>
                    	    	<td>
                    	    	    <h4>PayPal Email:</h4>
                    	    	</td>
                    	    	<td>
                    	    	    <input name='PInfo' type='text' id='PInfo' size='30' value='<? if (isset($_POST[PInfo])){ echo $_POST[PInfo]; }  ?>'>
                    	    	</td>
                    	    </tr>
                    	    <tr id='payoneer' style='display: none;' >
                          		<td>
                          		    <h4>Full Name<br>Phone Number<br>Address<br>City<br>Country</h4>
                          		</td>
                          		<td>
                          		    <textarea name='PInfo' id='PInfo' cols='30' rows='5'><? if (isset($_POST[PInfo])){ echo $_POST[PInfo]; }  ?></textarea>
                          		</td>
                    	    </tr>
                    	    <tr id='transfer' style='display: none;' >
                          		<td>
                          		    <h4>Full Name<br>Bank Name<br>Account Number<br>IBAN Code<br>Swift Code<br>Address<br>City<br>Country</h4>
                          		</td>
                          		<td>
                          		    <textarea name='PInfo' id='PInfo' cols='30' rows='8'><? if (isset($_POST[PInfo])){ echo $_POST[PInfo]; }  ?></textarea>
                          		</td>
                    	    </tr>
                   		</table>
                    </li>
                    <li class="col-md-12 li_group w3-hide-medium w3-hide-small" align="center">
                        <div class="w3-hide-large">
                            <? if($_POST['checkbox']!="checkbox"){ echo "<h3>You must agree with the terms of service to register:</h3>";}?>
                            <br>
                            <input name="checkbox" type="checkbox" value="checkbox" checked="checked" <? if( isset($_POST['checkbox']) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>&nbsp;&nbsp;I Agree with the <a class="footer_link style20" href="modelterms.php" target="_blank">Terms of Service</a>
                            <br><br>Send registration emails as:&nbsp;&nbsp;
                            <input name="emailtype" type="radio" value="text" checked>&nbsp;&nbsp;Plain text&nbsp;&nbsp;
                            <input name="emailtype" type="radio" value="html">&nbsp;&nbsp;HTML
                        </div>
                        <div class="w3-hide-large">
                            <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>
                            <input type="submit" class="signup-button" name="Submit" value=" I am at least 18 years of age " style="font-size: 16; text-align: center; height: unset;"/>
                        </div>
            	    	<table class="w3-hide-small w3-hide-medium">
                    	    <tr>
                      			<td>
                      		    	<div align="center"><? if($_POST['checkbox']!="checkbox"){ echo "<h3>You must agree with the terms of service to register:</h3>";}?>
                        	    	    <br>
                      		    	    <input name="checkbox" type="checkbox" value="checkbox" checked="checked" <? if( isset($_POST['checkbox']) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>&nbsp;&nbsp;I Agree with the <a class="footer_link style20" href="modelterms.php" target="_blank">Terms of Service</a>
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
                          			<input type="submit" class="signup-button" name="Submit" value=" I am at least 18 years of age " style="font-size: 22; text-align: center; height: unset;"/>
                      		    	    </div>
                      			</td>
            	    	    </tr>
                    	</table>
                    </li>
                    <li class="col-md-6 li_group w3-hide-large" align="center">
                        <div class="w3-hide-large">
                            <? if($_POST['checkbox']!="checkbox"){ echo "<h3>You must agree with the terms of service to register:</h3>";}?>
                            <br>
                            <input name="checkbox" type="checkbox" value="checkbox" checked="checked" <? if( isset($_POST['checkbox']) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>&nbsp;&nbsp;I Agree with the <a class="footer_link style20" href="modelterms.php" target="_blank">Terms of Service</a>
                            <br><br>Send registration emails as:&nbsp;&nbsp;
                            <input name="emailtype" type="radio" value="text" checked>&nbsp;&nbsp;Plain text&nbsp;&nbsp;
                            <input name="emailtype" type="radio" value="html">&nbsp;&nbsp;HTML
                        </div>
                        <div class="w3-hide-large">
                            <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>
                            <input type="submit" class="signup-button" name="Submit" value=" I am at least 18 years of age " style="font-size: 16; text-align: center; height: unset;"/>
                        </div>
                        <table class="w3-hide-small w3-hide-medium">
                            <tr>
                                <td>
                                    <div align="center"><? if($_POST['checkbox']!="checkbox"){ echo "<h3>You must agree with the terms of service to register:</h3>";}?>
                                        <br>
                                        <input name="checkbox" type="checkbox" value="checkbox" checked="checked" <? if( isset($_POST['checkbox']) && $_POST[checkbox]=="checkbox"){echo "checked";}?>>&nbsp;&nbsp;I Agree with the <a class="footer_link style20" href="modelterms.php" target="_blank">Terms of Service</a>
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
                                    <input type="submit" class="signup-button" name="Submit" value=" I am at least 18 years of age " style="font-size: 22; text-align: center; height: unset;"/>
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
<script type="text/javascript">
    function mostrar(id) {
        if (id == "PayPal") {
            $("#paypal").show();
            $("#payoneer").hide();
            $("#transfer").hide();
        }

        if (id == "Payoneer") {
            $("#paypal").hide();
            $("#payoneer").show();
            $("#transfer").hide();
        }

        if (id == "Transferencia") {
            $("#paypal").hide();
            $("#payoneer").hide();
            $("#transfer").show();
        }
    }
</script>
<?
include("_reg.footer.php");
?>

