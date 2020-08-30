<?
error_reporting(0);
?>
<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" )
{

header("location: ../../login.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");



	while($row = mysql_fetch_array($result)) 

	{	$username=$row['user'];	}

}

mysql_free_result($result);

$errorMsg="";





//function that handles creation of thumbnails

function LoadJpeg ($imgname,$tocreate) {

    $tnsize="200";//thumbnail size


    //$bigimage = @ImageCreateFromJPEG ($imgname); // Attempt to open 

$bigimage = @ImageCreateFromstring (file_get_contents($imgname)); // Attempt to open
	if (!$bigimage){

	$result=false;

	echo "<font color=#ffffff>The image could not be uploaded. Please try again.</font><br> You can resave the file by using any image editor and then try again<br><br>Thank You! $endstr ";

	//exit();

	}

    

	$tnimage = imagecreatetruecolor ($tnsize,$tnsize);

	$white = imagecolorallocate ($tnimage,143, 0, 0);

	$sz = GetImageSize($imgname);

	// load our internal variables

	$x = $sz[0];	// big image width

	$y = $sz[1];	// big image height



	// find the larger dimension

		if ($x>$y) {	// if it is the width then

		$dx = 0;					// the left side of the new image

		$w = $tnsize;				// the width of the new image

		$h = ($y / $x) * $tnsize;	// the height of the new image

		$dy = ($tnsize - $h) / 2;	// the top of the new image

		}else{	// if the height is larger then

		$dy = 0;					// the top of the new image

		$h = $tnsize;				// the height of the new image

		$w = ($x / $y) * $tnsize;	// the width of the new image

		$dx = ($tnsize - $w) / 2;	// the left edge of the new image

		}

    // copy the resized version into the thumbnal image

   ImageCopyResized($tnimage, $bigimage, $dx, $dy, 0, 0, $w, $h, $x, $y);

    //if we manage to create the thumbnail

   if (ImageJPEG($tnimage,$tocreate,100) && $x<1920 && $y<1920){

   $result=true;

   } else{ //if we dont

 	$result=false;

		  	if ($x>1920 || $y>1920){

		   	$errorMsg="File size is to large. Maximum picture size is 1920x1920.";

		  	} else{

		  	$errorMsg="Picture could not be uploaded. Please try again.";

		  	}

		  //exit();

   	}

  return $result;

}









if(!isset($_COOKIE["id"]))

{

header("Location: ../../login.php");

} else if (isset($_FILES['ImageFile']['tmp_name']))

	{	

		$currentTime=time();

		$pictureName=md5("$currentTime".$_SERVER['REMOTE_ADDR']);

	

		$urlImage="../../models/".$username."/".$pictureName.".jpg";

		$urlThumbnail="../../models/".$username."/".$pictureName."_thumbnail.jpg";

		



		//we copy the thumbail image

		if (copy ($_FILES['ImageFile']['tmp_name'],$urlImage) && LoadJpeg($urlImage,$urlThumbnail))

		{

		$id=$_COOKIE["id"];

		

		mysql_query("INSERT INTO modelpictures ( user , name, dateuploaded ) VALUES ('$username', '$pictureName', '$currentTime')");

		$errorMsg.='<img src="../../models/'.$username.'/'.$pictureName.'_thumbnail.jpg"> Picture was uploaded successfully';		

		} 		

		else		

		{		

		$errorMsg.="Picture did not upload. Check resolution. Maximum 1920x1920 files accepted.";		

		}

	} else  if(isset($_GET['delete']))

	{

	unlink("../../models/$username/$_GET[delete]_thumbnail.jpg");

	unlink("../../models/$username/$_GET[delete].jpg");

	mysql_query('DELETE from modelpictures WHERE name="'.$_GET[delete].'" LIMIT 12'); //Change to maximum upload allowed

	$errorMsg+="Image Has Been Deleted";	

	}

?>

<?
include("_models.header.php");
?><style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
body {
	background-color: #8F0000;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	color: #FFCC00;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
-->
</style>
<table width="1223" height="268" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#7D0000">

  <tr valign="top">

    <td height="113"><form action="uploadpicture.php" method="post" enctype="multipart/form-data" name="form2">

        <p><span class="error">
        &nbsp;</span></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><span class="error">&nbsp;&nbsp;&nbsp;
          <?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?>
        </span></p>
        <table width="720" border="0" align="center" cellpadding="4" cellspacing="0">

          <tr class="barbg">

            <td colspan="2"><span class="form_header_title">&nbsp;&nbsp;&nbsp;&nbsp;Upload new Image </span></td>
          </tr>

          <tr align="right">

            <td width="149" class="form_definitions">Image:</td>

            <td width="555" align="left"><input name="ImageFile" type="file" id="ImageFile">

                <input type="submit" name="Submit2" value="Upload Image"></td>
          </tr>
        </table>

        <br>

        <table width="720" border="0" align="center" cellpadding="4" cellspacing="0">

          <tr class="barbg">

            <td class="barbg"><span class="form_header_title">&nbsp;&nbsp;&nbsp;&nbsp;My Pictures </span></td>
          </tr>

          <tr>

            <td>

              <table width="700" border="0" align="center" cellpadding="5" cellspacing="0" bordercolor="#333333">

                <?

		    $count=0;

			$result = mysql_query('SELECT * FROM modelpictures WHERE user="'.$username.'" ORDER BY dateuploaded DESC');

			while($row = mysql_fetch_array($result)) 

			{

			$count++;

			if ($count==1) {echo"<tr>";}

			echo "<td width='200'class='form_definitions' height='150' align='center' valign='middle'><img src ='../../models/".$username."/".$row['name']."_thumbnail.jpg' ><br><a href='uploadpicture.php?delete=$row[name]'>Delete</a></td>";

			if ($count==5){ echo"</tr>"; $count=0;}

			}

			mysql_free_result($result);

			for($i=0; $i<5-$count; $i++)

			{

			echo"<td width='200' height='150' align='center' valign='middle'>&nbsp</td>";

			}

			echo"</tr>";

 			?>
              </table></td>
          </tr>
        </table>

        </form></td>
  </tr>

  <tr>

    <td>&nbsp;</td>
  </tr>
</table>

<?
include("_models.footer.php");
?>