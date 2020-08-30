<?
error_reporting(0);
?>

<?
if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" ) {
	header("location: ../../login.php");
} else {
	include("../../dbase.php");
	$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row['user'];
	}
}
mysql_free_result($result);
$errorMsg="";
//function that handles creation of thumbnails
function LoadJpeg ($imgname,$tocreate) {
	$tnsize="200";//thumbnail size
    	//$bigimage = @ImageCreateFromJPEG ($imgname); // Attempt to open 
	$bigimage = @ImageCreateFromstring (file_get_contents($imgname)); // Attempt to open
	if (!$bigimage) {
		$result=false;
		echo '<p align="center" style="color: #FC0; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">The image could not be uploaded. Please try again.<br> You can resave the file by using any image editor and then try again<br><br>Thank You! $endstr</p>';
	}
	$tnimage = imagecreatetruecolor ($tnsize,$tnsize);
	$white = imagecolorallocate ($tnimage,143, 0, 0);
	$sz = GetImageSize($imgname);
	// load our internal variables
	$x = $sz[0];	// big image width
	$y = $sz[1];	// big image height
	// find the larger dimension
	if ($x>$y) {				// if it is the width then
		$dx = 0;			// the left side of the new image
		$w = $tnsize;			// the width of the new image
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
   	if (ImageJPEG($tnimage,$tocreate,100) && $x<1920 && $y<1920) {
   		$result=true;
   	} else { //if we dont
 	$result=false;
		if ($x>1920 || $y>1920) {
			$errorMsg='<p align="center" style="color: #FC0; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">File size is to large. Maximum picture size is 1920x1920.</p>';
		} else {
			$errorMsg='<p align="center" style="color: #FC0; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Picture could not be uploaded. Please try again.</p>';
		}
	  //exit();
   	}
return $result;
}
if(!isset($_COOKIE["id"])) {
	header("Location: ../../login.php");
} else if (isset($_FILES['ImageFile']['tmp_name'])) {	
	$currentTime=time();
	$pictureName=md5("$currentTime".$_SERVER['REMOTE_ADDR']);
	$urlImage="../../models/".$username."/".$pictureName.".jpg";
	$urlThumbnail="../../models/".$username."/".$pictureName."_thumbnail.jpg";
	//we copy the thumbail image
	if (copy ($_FILES['ImageFile']['tmp_name'],$urlImage) && LoadJpeg($urlImage,$urlThumbnail)) {
		$id=$_COOKIE["id"];
		mysql_query("INSERT INTO modelpictures ( user , name, dateuploaded ) VALUES ('$username', '$pictureName', '$currentTime')");
		$errorMsg.='<p align="center" style="color: #FC0; background: darkgreen; margin: 25px 20%; padding: 15px 0; border-radius: 10px;"><img src="../../models/'.$username.'/'.$pictureName.'_thumbnail.jpg"> Picture was uploaded successfully</p>';		
	} else {		
		$errorMsg.='<p align="center" style="color: #FC0; background: #800; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Picture did not upload. Check resolution. Maximum 1920x1920 files accepted.</P>';		
	}
} else  if(isset($_GET['delete'])) {
	unlink("../../models/$username/$_GET[delete]_thumbnail.jpg");
	unlink("../../models/$username/$_GET[delete].jpg");
	mysql_query('DELETE from modelpictures WHERE name="'.$_GET[delete].'" LIMIT 12'); //Change to maximum upload allowed
	$errorMsg+='<p align="center" style="color: #FC0; background: darkgreen; margin: 25px 20%; padding: 15px 0; border-radius: 10px;">Image Has Been Deleted</p>';	
}
?>

<?
include("_models.header.php");
?>

<div class="body-container">
    <div  class="col-md-12" align="center">
    	<form action="uploadpicture.php" method="post" enctype="multipart/form-data" name="form2">
    	<div class="w90 fond">
    	    <h1 class="red pd15"><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Upload New Image</h1>
    	    <h4>
    	    	<span class="err"><?php if ( isset($errorMsg) && $errorMsg!=""){ echo $errorMsg; } ?></span>
    	    </h4>
            <h3>Select the image to load:</h3>
            <br>
	    <input class="imagefile" name="ImageFile" type="file" id="ImageFile">
	    <div align="center">
	    	<input class="update" type="submit" name="Submit2" value="Upload Image">
	    </div>
	</div>
        <br>
        <div class="w90 fond pd_bt">
    	    <h1 class="red pd15"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;My Pictures</h1>
    	    <div class="w95 pd_bt">
    	    	<div>
                <? echo '<ul class="w90 model_group" align="center">';
		$count=0;
		$result = mysql_query('SELECT * FROM modelpictures WHERE user="'.$username.'" ORDER BY dateuploaded DESC');
		while($row = mysql_fetch_array($result)) {
			$count++;
			if ($count==1) {
				echo"<div>";
			}
			echo '<li class="col-md-3 padd li_group" align="center">';
			echo "<div>
			<img src ='../../models/".$username."/".$row['name']."_thumbnail.jpg' width='100%' height='auto' border='0'>
			<br>
			<a class='del' href='uploadpicture.php?delete=$row[name]'><i class='fa fa-trash'></i>&nbsp;&nbsp;Delete</a>
			</div>";
			if ($count==5) {
				$count=0;
			}
		}
		echo"</li>";
		mysql_free_result($result);
		for($i=0; $i<4-$count; $i++) {
		}
		echo"</ul>";
 		?>
            	</div>
            </div>
    	</div>
	</form>
    </div>
</div>

<?
include("_models.footer.php");
?>