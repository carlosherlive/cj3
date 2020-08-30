<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" )

{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");



	while($row = mysql_fetch_array($result)) 

	{	$username=$row[user];	}

}

?>

<?

if(!isset($_COOKIE["id"])){



header("Location: ../../login.php");



} else if($_POST[Email]!=""  && $_POST[Name] !="" && $_POST[Country] !="" && $_POST[State] !="" && $_POST[City] !=""&& $_POST[ZipCode] !="" && $_POST[Adress] !="")

{	



	include("../../dbase.php");

	$id=$_COOKIE["id"];

	$tempUser=$username;

	

	$tempPass1=$_POST[Password1];

	$tempPass2=$_POST[Password2];

	$tempEmail=$_POST[Email];

		

	$tL1=$_POST[L1];

	$tL2=$_POST[L2];

	$tL3=$_POST[L3];

	$tL4=$_POST[L4];



	$tDay=$_POST[day];

	$tMonth=$_POST[month];

	$tYear=$_POST[year];

	

	$tBraS=$_POST[BraSize];

	$tBirthS=$_POST[BirthSign];

		

	$tEthnic=$_POST[Ethnic];

	$tEyeC=$_POST[eyeColor];

	$tHeight=$_POST[Height];

	$tWeight=$_POST[Weight];

	$tHeightM=$_POST[heightMeasure];

	$tWeightM=$_POST[weightMeasure];

			

	$tMessage=$_POST[Message];

	$tFantasies=$_POST[Fantasies];

	$tPosition=$_POST[Position];

	

	$tCategory=$_POST[Category];

	$tCPM=$_POST[CPM];



	$tempName = $_POST[Name];

	$tempCountry = $_POST[Country];

	$tempState= $_POST[State];

	$tempCity=$_POST[City];

	$tempZip = $_POST[ZipCode];

	$tempAdress = $_POST[Adress];

	$tempPMethod=$_POST[PMethod];

	$tempPInfo=$_POST[PInfo];

	

		$tempIdmonth=$_POST[idmonth];

		$tempIdyear=$_POST[idyear];

		$tempIdtype=$_POST[idtype];

		$tempIdnumber=$_POST[idnumber];

		$tempSs=$_POST[ssnumber];

		$tempPhone=$_POST[phone];

		$tempBirth=$_POST[birthplace];

		$tempYahoo=$_POST[yahoo];	

		$tempMsn=$_POST[msn];	

		$tempIcq=$_POST[icq];	

		

		$tHcolor=$_POST[hairColor];

		$tHlength=$_POST[hairLength];

		$tPhair=$_POST[pubicHair];	

		$tBfrom=$_POST[broadcastplace];

		$tHobbies=$_POST[hobby];

		$tFax=$_POST[fax];

	
$monday=implode('-',$_POST['monday']);
$tuesday=implode('-',$_POST['tuesday']);
$wednesday=implode('-',$_POST['wednesday']);
$thursday=implode('-',$_POST['thursday']);
$friday=implode('-',$_POST['friday']);
$saturday=implode('-',$_POST['saturday']);
$sunday=implode('-',$_POST['sunday']);	

	//birth date as String

		$currentSeconds = $_POST['day']."/".$_POST['month']."/".$_POST['year'];


	//$currentSeconds=strtotime($day." ".$_POST[month]." ".$_POST[year]);

	mysql_query("UPDATE chatmodels SET monday='$monday',tuesday='$tuesday',wednesday='$wednesday',thursday='$thursday',friday='$friday',saturday='$saturday',sunday='$sunday',hobby='$tHobbies', broadcastplace='$tBfrom', pubicHair='$tPhair', hairLength='$tHlength', hairColor='$tHcolor', fax='$tFax', icq='$tempIcq', msn='$tempMsn', yahoo='$tempYahoo', birthplace='$tempBirth', phone='$tempPhone',ssnumber='$tempSs', idnumber='$tempIdnumber', idmonth='$tempIdmonth',idyear='$tempIdyear',idtype='$tempIdtype', email='$tempEmail', language1='$tL1', language2='$tL2', language3='$tL3', language4='$tL4',birthDate='$currentSeconds', braSize='$tBraS', birthSign='$tBirthS', weight='$tWeight', height='$tHeight', weightMeasure='$tWeightM', heightMeasure='$tHeightM', eyeColor='$tEyeC', ethnicity='$tEthnic', message='$tMessage', position='$tPosition', fantasies='$tFantasies', category='$tCategory', name='$tempName', country='$tempCountry', state='$tempState', city='$tempCity', zip='$tempZip', adress='$tempAdress', pMethod='$tempPMethod', pInfo='$tempPInfo' WHERE id = '$id' LIMIT 1");

	

	if ($_POST[Password1]!=""){	

	$db_pass=md5($_POST[Password1]);

	mysql_query("UPDATE chatmodels SET password='$db_pass' WHERE id = '$id' LIMIT 1");

	}
        if($_POST['country']) { mysql_query("DELETE  from blockedcountry where model='$username' "); foreach($_POST['country'] as $cc) {mysql_query("INSERT INTO blockedcountry (model,cc)values('$username','$cc');");}  } 
	

	mysql_query("UPDATE chatmodelsstatus SET category='$tCategory' WHERE id = '$id' LIMIT 1");

	$errorMsg="Modifications have been completed";





}

else if (!isset($_POST[Password1]))//if we need to laod the variables from the database

{



	if (isset($_FILES['ImageFile']['tmp_name']))

	{

		$urlThumbnail="../../models/".$username."/thumbnail.jpg";

		//we copy the thumbail image




		if ($check=getimagesize($_FILES['ImageFile']['tmp_name']))

		{
$src=imagecreatefromstring(file_get_contents($_FILES['ImageFile']['tmp_name']));	
$theight=250;
$twidth=200;
$tmp=imagecreatetruecolor($theight,$twidth);
imagecopyresampled($tmp,$src,0,0,0,0,$theight,$twidth,$check[0],$check[1]);
imagejpeg($tmp,$urlThumbnail,100);
$errorMsg="File Copied";		} 


		else

		{		$errorMsg="File not Copied";		}



	}



	

	include("../../dbase.php");

	$id=$_COOKIE["id"];

	$result = mysql_query("SELECT * FROM chatmodels WHERE id='".$id."'");

	while($row = mysql_fetch_array($result)) 

	{

	$tempUser=$row["user"];

	$tempPass1=$row["password"];

	$tempPass2=$row["password"];

	$tempEmail=$row["email"];

	$tL1=$row["language1"];

	$tL2=$row["language2"];

	$tL3=$row["language3"];

	$tL4=$row["language4"];

	

	$tBirth = explode('/',$row["birthDate"]);
	
	$tDay=$tBirth[0];

	$tMonth=$tBirth[1];

	$tYear=$tBirth[2];

	

	$tBraS=$row["braSize"];

	$tBirthS=$row["birthSign"];

	$tMessage=$row["message"];

	$tFantasies=$row["fantasies"];

	$tPosition=$row["position"];

	$tEthnic=$row["ethnicity"];

	$tEyeC=$row["eyeColor"];

	$tHeight=$row["height"];

	$tWeight=$row["weight"];

	$tHeightM=$row["heightMeasure"];

	$tWeightM=$row["weightMeasure"];

	$tCPM=$row["cpm"];

	$tCategory=$row["category"];

	$tempName = $row["name"];

	$tempCountry = $row["country"];

	$tempState=$row["state"];

	$tempZip = $row["zip"];

	$tempCity=$row["city"];

	$tempAdress = $row["adress"];

	$tempPMethod=$row["pMethod"];

	$tempPInfo=$row["pInfo"];

	$tempIdmonth=$row[idmonth];

	$tempIdyear=$row[idyear];

	$tempIdtype=$row[idtype];

	$tempIdnumber=$row[idnumber];

	$tempSs=$row[ssnumber];

	$tempPhone=$row[phone];

	$tempBirth=$row[birthplace];

	$tempYahoo=$row[yahoo];	

	$tempMsn=$row[msn];	

	$tempIcq=$row[icq];	

	$tHcolor=$row[hairColor];

	$tHlength=$row[hairLength];

	$tPhair=$row[pubicHair];	

	$tBfrom=$row[broadcastplace];

	$tHobbies=$row[hobby];

	$tFax=$row[fax];

	}

	mysql_free_result($result);

}else

{

$id=$_COOKIE["id"];

	$tempUser=$username;

	$tempPass1=$_POST[Password1];

	$tempPass2=$_POST[Password2];

	$tempEmail=$_POST[Email];

	

	$tL1=$_POST[L1];

	$tL2=$_POST[L2];

	$tL3=$_POST[L3];

	$tL4=$_POST[L4];

	

	$tDay=$_POST[day];

	$tMonth=$_POST[month];

	$tYear=$_POST[year];	

	

	$tBraS=$_POST[BraSize];

	$tBirthS=$_POST[BirthSign];

		

	$tEthnic=$_POST[Ethnic];

	$tEyeC=$_POST[eyeColor];

	$tHeight=$_POST[Height];

	$tWeight=$_POST[Weight];

	$tHeightM=$_POST[heightMeasure];

	$tWeightM=$_POST[weightMeasure];

		

	$tMessage=$_POST[Message];

	$tFantasies=$_POST[Fantasies];

	$tPosition=$_POST[Position];

	

	$tCategory=$_POST[Category];

	$tCPM=$_POST[CPM];



	

	$tempName = $_POST[Name];

	$tempCountry = $_POST[Country];

	$tempState= $_POST[State];

	$tempCity=$_POST[City];

	$tempZip = $_POST[ZipCode];

	$tempAdress = $_POST[Adress];

	$tempPMethod=$_POST[PMethod];

	$tempPInfo=$_POST[PInfo];

	

		$tempIdmonth=$_POST[idmonth];

		$tempIdyear=$_POST[idyear];

		$tempIdtype=$_POST[idtype];

		$tempIdnumber=$_POST[idnumber];

		$tempSs=$_POST[ssnumber];

		$tempPhone=$_POST[phone];

		$tempBirth=$_POST[birthplace];

		$tempYahoo=$_POST[yahoo];	

		$tempMsn=$_POST[msn];	

		$tempIcq=$_POST[icq];	

		

		$tHcolor=$_POST[hairColor];

		$tHlength=$_POST[hairLength];

		$tPhair=$_POST[pubicHair];	

		$tBfrom=$_POST[broadcastplace];

		$tHobbies=$_POST[hobby];

		$tFax=$_POST[fax];



$errorMsg="Please complete the boxes withy the right specifications.";



} 

?>
<?php
$s_array=array('off','12am','1am','2am','3am','4am','5am','6am','7am','8am','9am','10am','11am','12pm','1pm','2pm','3pm','4pm','5pm','6pm','7pm','8pm','9pm','10pm','11pm');
$id=$_COOKIE["id"];

	$result = mysql_query("SELECT * FROM chatmodels WHERE id='".$id."'");

	while($row = mysql_fetch_array($result)) 

	{
$monday=explode('-',$row['monday']);
$tuesday=explode('-',$row['tuesday']);
$wednesday=explode('-',$row['wednesday']);
$thursday=explode('-',$row['thursday']);
$friday=explode('-',$row['friday']);
$saturday=explode('-',$row['saturday']);
$sunday=explode('-',$row['sunday']);
}
?>
<?
include("_models.header.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js?ver=3.3.1"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
<script src="webcam.js"></script>
<script language="JavaScript">
		webcam.set_api_url( 'upload.php' );
		webcam.set_quality( 100 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true ); // play shutter click sound


// A $( document ).ready() block.
$( document ).ready(function() {
 $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}); 
});

	</script>
<style type="text/css">
<!--






-->

.chosen-container .chosen-drop{background:#8F0000;}
</style>

<table width="1223" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#800000">

  <tr valign="top">

    <td width="1215" height="113"><span class="error"><?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?></span>       

      <form action="updateprofile.php" method="post" enctype="multipart/form-data" name="form2">

        <table width="720" height="307" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#8F0000">

          <tr class="barbg">

            <td height="53" colspan="3">&nbsp;</td>
          </tr>

          <tr>

            <td width="1" align="right" class="form_definitions">&nbsp;</td>

            <td width="250" valign="top"><div align="center"><img id="pic" src="../../models/<? echo $username; ?>/thumbnail.jpg" width="250" height="200"><br />
            Current thumbnail image. </div></td>

            <td width="250" valign="top">


              <div align="center">
  <script language="JavaScript">
function my_completion_handler(msg)
{
document["pic"].src ='../../models/<? echo $username; ?>/thumbnail.jpg?'+ new Date().getTime();
webcam.reset();
}
webcam.set_hook( 'onComplete', 'my_completion_handler' );
document.write( webcam.get_html(250,200) );
</script>


<script>
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>






  <br>
  <br />
  <input type=button value="Capture" onClick="webcam.freeze()"> 
  <input type=button value="Upload" onClick="webcam.upload()"> 
  <input type=button value="Reset" onClick="webcam.reset()">
  <br />
  <br />
              </div>
            <td>
<td width="250"> <p>Upload an image from your computer.
  <br>
      <input name="ImageFile" id="ImageFile" type="file">
  <br>
  </p>
  <p>
    <input name="image" src="../../images/update-btn.png" alt="" width="99" height="52" border="0" type="image">
  </p></td>
          


</tr>
        </table>

        <br />
      </form>
<form>
</form>
      <form name="form1" method="post" action="updateprofile.php">

        <table width="720" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#800000">

          <tr align="left" class="barbg">

            <td colspan="3"><span class="form_header_title">User Information </span></td>
          </tr>

          <tr>

            <td width="160" class="form_definitions">&nbsp;</td>

            <td width="250">&nbsp;</td>

            <td width="286"><span class="style1"></span></td>
          </tr>

          <tr>

            <td align="right" class="form_definitions"> User name: </td>

            <td class="small_title"><? echo $tempUser;?></td>

            <td><span class="style1"></span></td>
          </tr>

          <tr>

            <td align="right" class="form_definitions">New	Password:			</td>

            <td><input name="Password1" type="password" id="Password1" size="24" maxlength="24"></td>

            <td class="form_informations style1">Leave this blank unless you're changing your password.</td>
          </tr>

          <tr>

            <td align="right" class="form_definitions"><? if($tempEmail==""){ echo "<font color=#ffdd54>Email*</font>";

	 	 	} else{ echo"Email*"; }?>			</td>

            <td><input name="Email" type="text" id="Email" value="<? echo $tempEmail;?>" size="24" maxlength="24"></td>

            <td><span class="style1"></span></td>
          </tr>
        </table>

        <br>

        <div align="center">

          <table width="720" border="0" cellspacing="0" cellpadding="4">

            <tr align="left" class="barbg">

              <td colspan="3"><span class="form_header_title">Profile Information </span></td>
            </tr>

            <tr>

              <td width="167">&nbsp;</td>

              <td width="350">&nbsp;</td>

              <td width="179"><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="right" valign="top" class="form_definitions">Native Language:</td>

              <td align="left" valign="top" class="form_definitions"><select name="L1" id="select2">
                <option value="Dutch"  <? if ($tL1=="Dutch"){echo "selected";}?> >Dutch</option>
                <option value="English" <? if ($tL1=="English"){echo "selected";}?> >English</option>
                <option value="French" <? if ($tL1=="French"){echo "selected";}?> >French</option>
                <option value="German" <? if ($tL1=="German"){echo "selected";}?> >German</option>
                <option value="Italian" <? if ($tL1=="Italian"){echo "selected";}?> >Italian</option>
                <option value="Japanese" <? if ($tL1=="Japanese"){echo "selected";}?> >Japanese</option>
                <option value="Korean" <? if ($tL1=="Korean"){echo "selected";}?> >Korean</option>
                <option value="Portuguese" <? if ($tL1=="Portuguese"){echo "selected";}?> >Portuguese</option>
                <option value="Spanish" <? if ($tL1=="Portuguese"){echo "selected";}?> >Spanish</option>
              </select></td>

              <td><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="right" valign="top" class="form_definitions"> Birth Date:* </td>

              <td align="left" valign="top">

                <select name="day" id="day">

                  <?

		  for($i=1; $i<=31; $i++)
		  {
				if ($i<9)
			{
				$a = $i;
				$i='0'.$i;
			}
		  echo "<option value='$i'";

		  if ($tDay==$i){ echo "selected";}

		  echo">$i</option>";
		  if ($i<9)
				$i = $a;

		  }

		  ?>
                </select>

                <select name="month" id="month">

                  <option value="Jan" <? if ($tMonth=="Jan"){ echo "selected";}?>>January</option>

                  <option value="Feb" <? if ($tMonth=="Feb"){ echo "selected";}?>>February</option>

                  <option value="Mar" <? if ($tMonth=="Mar"){ echo "selected";}?>>March</option>

                  <option value="Apr" <? if ($tMonth=="Apr"){ echo "selected";}?>>April</option>

                  <option value="May" <? if ($tMonth=="May"){ echo "selected";}?>>May</option>

                  <option value="Jun" <? if ($tMonth=="Jun"){ echo "selected";}?>>June</option>

                  <option value="Jul" <? if ($tMonth=="Jul"){ echo "selected";}?>>July</option>

                  <option value="Aug" <? if ($tMonth=="Aug"){ echo "selected";}?>>August</option>

                  <option value="Sep" <? if ($tMonth=="Sep"){ echo "selected";}?>>September</option>

                  <option value="Oct" <? if ($tMonth=="Oct"){ echo "selected";}?>>October</option>

                  <option value="Nov" <? if ($tMonth=="Nov"){ echo "selected";}?>>November</option>

                  <option value="Dec" <? if ($tMonth=="Dec"){ echo "selected";}?>>December</option>
                </select>

                <select name="year" id="year">

                  <?

		  for($i=1950; $i<=date(Y)-17; $i++)

		  {

		  echo "<option value='$i'";

		   if ($tYear==$i){ echo "selected";}

		  echo ">$i</option>";

		  }

		  

		  ?>
              </select></td>

              <td><span class="style1"></span></td>
            </tr>
			
            <tr>

              <td align="right" valign="top" class="form_definitions">Race:</td>

              <td align="left" valign="top"><select name="Ethnic" id="select">

			    <option value="White"  <? if ($tEthnic=="White"){echo "selected";}?> >White</option>

                <option value="Black" <? if ($tEthnic=="Black"){echo "selected";}?> >Black</option>

                <option value="Hispanic" <? if ($tEthnic=="Hispanic"){echo "selected";}?> >Hispanic</option>
				
				<option value="Asian" <? if ($tEthnic=="Asian"){echo "selected";}?> >Asian</option>
				
				<option value="Indian" <? if ($tEthnic=="Indian"){echo "selected";}?> >Indian</option>
				
				<option value="Other" <? if ($tEthnic=="Other"){echo "selected";}?> >Other</option>

              </select></td>

              <td><span class="style1"></span></td>
            </tr>
<tr>

              <td align="right" valign="top" class="form_definitions">Category:</td>

              <td align="left" valign="top"><select name="Category" id="select">
<?php
$query=mysql_query("select * from category order by name asc");
while($row=mysql_fetch_object($query))
{
if($row->name==$tCategory)
echo '<option selected>'.$row->name.'</option>';
else
echo '<option>'.$row->name.'</option>';
}
?>

              </select></td>

              <td><span class="style1"></span></td>
            </tr>
            <tr>

              <td align="right" class="form_definitions">Location: </td>

              <td align="left"><input name="broadcastplace" type="text" id="broadcastplace" size="24" value="<? if (isset($tBfrom)){ echo $tBfrom; }  ?>" maxlength="24"></td>

              <td align="left"><span class="style1"></span></td>
            </tr>
<tr>

              <td align="right" class="form_definitions">Block Countries: </td>

              <td align="left"><select name="country[]" multiple class="chosen-select" style="width:350px;" data-placeholder="Choose countries"><?php
		$result = mysql_query("SELECT c.*,b.id as status FROM country c left join  (select * from blockedcountry where model='$username') b on b.cc=c.country_code ORDER BY c.country_name");

    	while($row = mysql_fetch_object($result)) { echo '<option '.($row->status?'selected':'').' value="'.$row->country_code.'">'.$row->country_name.'</option>'; } ?>
              </select></td>

              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>

              <td align="right" valign="top" class="form_definitions"><p><br />
                About Me: </p>
              </td>

              <td align="left" valign="top"><div align="right">
			    <input disabled  maxlength="6" size="6" value="285" id="counter">
                <textarea onkeyup="textCounter(this,'counter',285);" name="Message" cols="50" rows="8" id="Message"><? echo $tMessage;?></textarea>
				
				
				
				
				
				
				
				
				
				
				
              </div></td>
              <td align="left" valign="top" class="form_informations style1">Max: 340 characters.</td>
            </tr>
          </table>
<br>

          <table width="720" border="0" cellspacing="0" cellpadding="4">

            <tr align="left" class="barbg">

              <td colspan="3"><span class="form_header_title">Schedule Information</span></td>
            </tr>

            <tr>

              <td width="160">&nbsp;</td>

              <td width="250">&nbsp;</td>

              <td width="286"><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="left" valign="top" class="form_definitions">Monday:</td>

              <td align="left" valign="top"><select name="monday[]" id="monday">
                <?php
foreach($s_array as $s)
{
if($monday[0]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select>
<select name="monday[]" id="monday">
                <?php
foreach($s_array as $s)
{
if($monday[1]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select></td>

              <td><span class="style1"></span></td>
            </tr>
<tr>

              <td align="left" valign="top" class="form_definitions">Tuesday:</td>

              <td align="left" valign="top"><select name="tuesday[]" id="tuesday">
                <?php
foreach($s_array as $s)
{
if($tuesday[0]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select>
<select name="tuesday[]" id="tuesday">
                <?php
foreach($s_array as $s)
{
if($tuesday[1]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select></td>

              <td><span class="style1"></span></td>
            </tr>
<tr>

              <td align="left" valign="top" class="form_definitions">Wednesday:</td>

              <td align="left" valign="top"><select name="wednesday[]" id="wednesday">
                <?php
foreach($s_array as $s)
{
if($wednesday[0]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select>
<select name="wednesday[]" id="wednesday">
                <?php
foreach($s_array as $s)
{
if($wednesday[1]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select></td>

              <td><span class="style1"></span></td>
            </tr>
<tr>

              <td align="left" valign="top" class="form_definitions">Thursday:</td>

              <td align="left" valign="top"><select name="thursday[]" id="thursday">
                <?php
foreach($s_array as $s)
{
if($thursday[0]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select>
<select name="thursday[]" id="thursday">
                <?php
foreach($s_array as $s)
{
if($thursday[1]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select></td>

              <td><span class="style1"></span></td>
            </tr>
<tr>

              <td align="left" valign="top" class="form_definitions">Friday:</td>

              <td align="left" valign="top"><select name="friday[]" id="friday">
                <?php
foreach($s_array as $s)
{
if($friday[0]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select>
<select name="friday[]" id="friday">
                <?php
foreach($s_array as $s)
{
if($friday[1]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select></td>

              <td><span class="style1"></span></td>
            </tr>
<tr>

              <td align="left" valign="top" class="form_definitions">Saturday:</td>

              <td align="left" valign="top"><select name="saturday[]" id="saturday">
                <?php
foreach($s_array as $s)
{
if($saturday[0]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select>
<select name="saturday[]" id="saturday">
                <?php
foreach($s_array as $s)
{
if($saturday[1]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select></td>

              <td><span class="style1"></span></td>
            </tr>
<tr>

              <td align="left" valign="top" class="form_definitions">Sunday:</td>

              <td align="left" valign="top"><select name="sunday[]" id="sunday">
                <?php
foreach($s_array as $s)
{
if($sunday[0]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select>
<select name="sunday[]" id="sunday">
                <?php
foreach($s_array as $s)
{
if($sunday[1]==$s)
echo '<option selected>'.$s.'</option>';
else
echo '<option>'.$s.'</option>';
}
?>
              </select></td>

              <td><span class="style1"></span></td>
            </tr>
          </table>
          <br>

          <table width="720" border="0" cellspacing="0" cellpadding="4">

            <tr align="left" class="barbg">

              <td colspan="3"><span class="form_header_title">Personal Information</span></td>
            </tr>

            <tr>

              <td colspan="3">&nbsp;</td>
            </tr>

            <tr>

              <td width="160" align="right" valign="top" class="form_definitions"><? if($tempName==""){ echo "<font color=#ffdd54>Full Name: *</font>";

	 	 	} else{ echo"Full Name: *"; }?>              </td>

              <td width="250" align="left" valign="top"><input name="Name" type="text" id="Name" value="<? echo $tempName;?>" size="24" maxlength="24"></td>

              <td width="286"><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="right" valign="top" class="form_definitions">Country: *</td>

              <td align="left" valign="top">

			  <select name="Country" id="Country">

          <?

		  include ("../../dbase.php");

include ("../../settings.php");

		$result = mysql_query('SELECT * FROM countries ORDER BY name');

    	while($row = mysql_fetch_array($result)) {

		echo"<option value='$row[id]'";

		if ($tempCountry==$row[id]){

		echo "selected";

		}

		

		echo ">$row[name]</option>";

		}

		  

		  

		  ?>
        </select>

			  

&nbsp;</td>

              <td><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="right" valign="top" class="form_definitions"><? if($tempState==""){ echo "<font color=#ffdd54>State: *</font>";

	 	 	} else{ echo"State: *"; }?>              </td>

              <td align="left" valign="top"><input name="State" type="text" id="State" value="<? echo $tempState;?>" size="24" maxlength="24"></td>

              <td><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="right" valign="top" class="form_definitions">

                <? if($tempCity==""){ echo "<font color=#ffdd54>City: *</font>";

	 	 	} else{ echo"City: *"; }?>              </td>

              <td align="left" valign="top"><input name="City" type="text" id="City" value="<? echo $tempCity;?>" size="24" maxlength="24"></td>

              <td><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="right" valign="top" class="form_definitions"><? if($tempZip==""){ echo "<font color=#ffdd54>Zip Code: *</font>";

	 	 	} else{ echo"Zip Code: *"; }?>              </td>

              <td align="left" valign="top"><input name="ZipCode" type="text" id="ZipCode" value="<? echo $tempZip;?>" size="24" maxlength="24"></td>

              <td><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="right" class="form_definitions">

                <? if(isset($tempPhone) && $tempPhone==""){

		  echo "<font color=#ffdd54>Phone*</font>";

	 	 } else{ echo"Phone*";}

	  	  ?>              </td>

              <td align="left"><input name="phone" value="<? if (isset($tempPhone)){ echo $tempPhone; }  ?>" type="text" id="phone" size="24" maxlength="24"></td>

              <td><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="right" valign="top" class="form_definitions"><? if($tempAdress==""){ echo "<font color=#ffdd54>Adress: *</font>";

	 	 	} else{ echo"Adress: *"; }?>              </td>

              <td align="left" valign="top"><textarea name="Adress" cols="24" rows="5" id="Adress"><? echo $tempAdress;?></textarea></td>

              <td><span class="style1"></span></td>
            </tr>
          </table>

          <br>

          <table width="720" border="0" cellspacing="0" cellpadding="4">

            <tr align="left" class="barbg">

              <td colspan="3"><span class="form_header_title">Payout Information</span></td>
            </tr>

            <tr>

              <td width="160">&nbsp;</td>

              <td width="250">&nbsp;</td>

              <td width="286"><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="left" valign="top" class="form_definitions">Payout Method:</td>

              <td align="left" valign="top"><select name="PMethod" id="PMethod">
                <option value="pp"  <? if ($tempPMethod=="pp"){echo "selected";}?> >Paypal</option>
              </select></td>
              <td><span class="style1"></span></td>
            </tr>

            <tr>

              <td align="left" valign="top" class="form_definitions">PayPal Email::</td>

              <td align="left" valign="top"><input name="PInfo" type="text" id="PInfo" value="<? echo $tempPInfo;?>" size="24" /></td>

              <td><span class="style1"></span></td>
            </tr>

            <tr>

              <td height="24">&nbsp;</td>

              <td align="left" valign="top"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="image2" type="image" src="../../images/update-btn.png" alt="" width="99" height="52" border="0" /></td>
              <td><span class="style1"></span></td>
            </tr>
			<tr>
			<td colspan="3" align="center"><a href="javascript:history.go(-1)"></a>			</td>
			</tr>
          </table>

        </div>

    </form></td>
	
	  </tr>

</table>
	
<?
include("_models.footer.php");
?>


