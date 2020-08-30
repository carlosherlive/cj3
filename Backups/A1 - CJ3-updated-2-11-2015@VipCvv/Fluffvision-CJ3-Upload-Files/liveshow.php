<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<script type='text/javascript' src='js/jquery.lazyload.min.js'></script>

<?

#
function GetAge($Birthdate)
#
{
#
        // Explode the date into meaningful variables
#
        list($BirthDay,$BirthMonth,$BirthYear) = explode("/", $Birthdate);
#
        // Find the differences
#
        $YearDiff = date("Y") - $BirthYear;
#
        $MonthDiff = date("m") - $BirthMonth;
#
        $DayDiff = date("d") - $BirthDay;
#
        // If the birthday has not occured this year
#
        if ($DayDiff < 0 || $MonthDiff < 0)
#
          $YearDiff--;
#
        return $YearDiff;
#
}
?>


<? if (isset($_COOKIE["usertype"])){

	
    include("_main.header.logged.in.php");	
	
			  	  

	} else {
 
		 
	include("_main.header.php");		  
			  

	}?>













<style type="text/css">
<!--



-->
</style>
<?
if(isset($_POST['epc']) && isset($_POST['cpm'])){
include('dbase.php');
include('settings.php');
mysql_query("UPDATE chatmodels SET cpm='$_POST[cpm]',epercentage='$_POST[epc]' WHERE id = '$_POST[id]' LIMIT 1");

}
?>
<?
	
	//$secondsThisMonth=time(i)*60+time(G)*3600+time(j)*86400
	//$secondsAll=time();
		
	include('dbase.php');
	
	
	$result = mysql_query("SELECT * FROM chatmodels WHERE user='$_GET[model]' LIMIT 1");
		while($row = mysql_fetch_array($result)) 
		{
		$tempUser=$row["user"];
		$tempPass1=$row["password"];
		$tempPass2=$row["password"];
		$tempEmail=$row["email"];
		$status=$row['status'];
		$tL1=$row["language1"];
		$tL2=$row["language2"];
		$tL3=$row["language3"];
		$tL4=$row["language4"];
		
		$tBirthD=$row["birthDate"];
                $tBirthD= GetAge($row["birthDate"]);
             //   echo $row["birthDate"];
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
		
		$cpm=$row["cpm"];
		$epc=$row["epercentage"];
		$tCategory=$row["category"];
		$rowdate=$row["dateRegistered"];
		$date=date("d F Y,H:i",$rowdate);
		
		$tempName = $row["name"];
		
		$result3=mysql_query("SELECT name FROM countries WHERE id='$row[country]' LIMIT 1");
			while($row3 = mysql_fetch_array($result3)) {
			$tempCountry=$row3[name];
			}
		
		$tempState=$row["state"];
		$tempZip = $row["zip"];
		$tempCity=$row["city"];
		$tempAdress = $row["adress"];
		$tempPMethod=$row["pMethod"];
		$tempPInfo=$row["pInfo"];
		$tOwner=$row['owner'];
		$tempIdmonth=$row['idmonth'];
		$tempIdyear=$row['idyear'];
		$tempIdtype=$row['idtype'];
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
		$tempFax=$row[fax];	
		$monday=$row[monday];
$tuesday=$row[tuesday];
$wednesday=$row[wednesday];
$thursday=$row[thursday];
$friday=$row[friday];
$saturday=$row[saturday];
$sunday=$row[sunday];

		}
	?>
	
<!--<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>-->
<!--<script type="text/javascript" src="js/jquery.fancybox.min.js"></script>-->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" type="text/css" media="screen" />
	
	
<!--Start Layout-->


	
		

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />




<div align="center">
<head>
<p>
  <style type="text/css">
<!--
#videoLayer {
	z-index:9999;
}

about-me
{
width:150px;
height:150px;
overflow:scroll;
} 



-->
</style>

  
  
 
  
  <script>

$( document ).ready(function() {


$("img.lazy").lazyload({effect : "fadeIn",

    	effectspeed: 1000 }).removeClass("lazy");
	$('.showThumbnail').live('mouseenter', function() {
     $(this).find(':first-child').css('display', 'none');

      var hiddenDiv = $(this).find(':last-child');

      var iFrameHtml = hiddenDiv.html();

      if (iFrameHtml.indexOf('iframe') == -1) {

      	var username = $(this).attr('rel');

      	hiddenDiv.html('<iframe width="217" class="showThumbnail" href="flash_load.php?model='+username+'" height="174" src="thumbnail-small.php?model='+username+'" scrolling="no" frameborder="0"  allowfullscreen></iframe>');

//hiddenDiv.html('<embed class="showThumbnail fancybox.ajax" href="flash_load.php?model='+username+'" height="174" flashvars="&fuser=guest&fmodel=aysa&fid=00&fmoney=0&favorite=0&freetime=&connection=rtmp://camscripts.srfms.com/ppm2/&cpm=" src="thumbnail.swf" width="217" height="174" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>');
      }

      hiddenDiv.css('display', 'block');
    });

	$('.showThumbnail').live('mouseleave', function() {
      var hiddenDiv = $(this).find(':last-child');

      hiddenDiv.css('display', 'none');

      hiddenDiv.html('');

      $(this).find(':first-child').css('display', 'block');
	});

$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
$( "#next" ).click(function() {
<?php
$row=mysql_fetch_object(mysql_query("SELECT user from chatmodels  WHERE user!='{$_GET[model]}'   ORDER BY RAND() LIMIT 1"));
$next=$row->user;
unset($row);
?>
window.location='liveshow.php?model=<?=$next;?>';
});

});
$(document).ready(function() {

    $("#bio").fancybox({
     'onStart ': function(){ $.fancybox.hideActivity(); },
'onComplete' : function(){ $.fancybox.hideActivity(); }, 
'autoSize' : true,'openEffect':'none',
'padding':0,'margin':10,'scrolling':'no',
    'transitionIn'      : 'fade',
    'transitionOut'     : 'fade',
    'titleShow' : false,
    'overlayColor'  :   '#8F0000',
    'overlayOpacity':   0.8,
	'closeBtn'    : false,
        }).trigger('click');
    });
$(document).ready(function() {

    $(".showThumbnail").fancybox({
     'onStart ': function(){ $.fancybox.hideActivity(); },
'onComplete' : function(){ $.fancybox.hideActivity(); }, 
'autoSize' : true,'openEffect':'none',
'padding':0,'margin':10,'scrolling':'no',
    'transitionIn'      : 'fade',
    'transitionOut'     : 'fade',
    'titleShow' : false,
    'overlayColor'  :   '#8F0000',
    'overlayOpacity':   0.8,
        }); 
$('#layer').mousedown(function() {
  alert('mouse down');
});
    });
function openchatbox(model)
{
alert(model);
}
      </script>  
  </head>
  
  
  <?

include("dbase.php");

include("settings.php");

$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{	$username=$row['user'];	

	}


?>
  
  
  
  
  
  
  <style type="text/css">
<!--

-->
</style>
</p>



<p>&nbsp;</p>
<table width="1120" height="61" border="0" cellpadding="12" background="images/bio-top-bar-bg.png">
  <tr>
    <td width="99">&nbsp;&nbsp;&nbsp;<strong><? echo $tempUser;?></strong></td>
    <td width="680">&nbsp;</td>
    <td width="261"><ul id="css3menu1" class="topmenu">
	<li class="topmenu">
	  <a href="javascript:history.go(-1)" style="height:10px;line-height:10px;"> GO BACK </a>
	</li>
	<li class="topmenu">
	  <a id="next" style="height:10px;line-height:10px;"> NEXT PERFORMER </a>
	</li></td>
  </tr>
</table>
<table width="1120" height="280" cellpadding="20" background="images/bio-page-header-bg.png">

  
  
  <tr>
    <td width="263" height="281" valign="top"><table width="108%" height="237" border="0">
      <tr>
        <td><embed flashvars="&fuser=<? echo $sUser; ?>&fmodel=<? echo $_GET[model]; ?>&fid=<? echo $sId; ?>&fmoney=<? echo $nMoney;?>&favorite=<? echo $nFav;?>&freetime=<? echo $freetime;?>&connection=<? echo $connection_string;?>&cpm=<? echo $cpm; ?>" src="thumbnail.swf" width="250" height="200" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed></td>
      </tr>
    </table>
      </td>
	
	
    <td width="197" align="left" valign="top"><table width="115%" height="45" border="0">
      <tr>
        <td><p><strong><? echo $tempUser;?>'s BIO</strong></p>          </td>
      </tr>
    </table>
      <table width="115%">
        <tr>
          <td width="37%">Race:</td>
          <td width="63%"><?=$tEthnic;?></td>
        </tr>
        <tr>
          <td>Age:</td>
          <td><?=$tBirthD;?></td>
        </tr>
        <tr>
          <td>Location:</td>
          <td><?=$tempCountry;?></td>
        </tr>
    </table>
      <p>&nbsp;</p>
      <table width="94%" border="0">
        <tr>
          <td width="36%"><ul id="css3menu1" class="topmenu">
	<li class="topmenu">
	  <a class="bio" href="#bioo" id="bio" style="height:10px;line-height:10px;"> Live Chat </a>	</li></td>
          <td width="64%"><ul id="css3menu1" class="topmenu">
	<li class="topmenu">
	  <a class="bio" href="addfavourite.php?user=<? echo $tempUser ?>&ok=ok" style="height:10px;line-height:10px;"> Add As Favorite </a>	</li></td>
        </tr>
      </table>      <p>&nbsp;</p>
    </td>
    <td width="256" align="left" valign="top"><table width="100%" height="45" border="0">
      <tr>
        <td><strong>About Me</strong></td>
      </tr>
    </table>
      <table width="107%" height="185" border="0">
        <tr>
          <td valign="top"><div style="float: left; display: inline; width: 250px; word-break: keep-all; word-wrap: break-word; overflow:hidden;"><?=$tMessage;?></div></td>
		  
        </tr>
    </table></td>
    <td width="232" valign="top"><table width="112%" height="45" border="0">
      <tr>
        <td><strong>My Schedule</strong></td>
      </tr>
    </table>
      <table width="112%" border="0">
        <tr>
          <td width="47%">Monday:</td>
          <td width="53%"><?=$monday;?></td>
        </tr>
        <tr>
          <td>Tuesday:</td>
          <td><?=$tuesday;?></td>
        </tr>
        <tr>
          <td>Wednesday:</td>
          <td><?=$wednesday;?></td>
        </tr>
        <tr>
          <td>Thursday:</td>
          <td><?=$thursday;?></td>
        </tr>
        <tr>
          <td>Friday:</td>
          <td><?=$friday;?></td>
        </tr>
        <tr>
          <td>Saturday:</td>
          <td><?=$saturday;?></td>
        </tr>
        <tr>
          <td>Sunday:</td>
          <td><?=$sunday;?></td>
        </tr>
    </table></td>
	
  </tr>
  
</table>


<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">

  <?

  if (isset($_COOKIE['usertype']) && $_COOKIE['usertype']=="chatusers")

  	{	 $result = mysql_query('SELECT cpm FROM chatmodels WHERE user="'.$_GET[model].'" LIMIT 1');

		 while($row = mysql_fetch_array($result)) 

			{$cpm=$row['cpm'];};

		 $result = mysql_query('SELECT id,user,money,freetime,freetimeexpired FROM chatusers WHERE id="'.$_COOKIE[id].'" LIMIT 1');

		 while($row = mysql_fetch_array($result)) 

			{

			$freetime=$row['freetime'];

			$freetimeexpired=$row['freetimeexpired'];

			$sUser=$row['user'];

			$sId=$row['id'];

			$nMoney=$row['money'];

			}

	

		if ($freetime==0 && (time()-$freetimeexpired)>(3600*$freehours)){

		mysql_query("UPDATE chatusers SET freetime='120', freetimeexpired='0' WHERE id='$_COOKIE[id]' LIMIT 1");

		$freetime=110;

		}

		$result=mysql_query("SELECT * from favorites WHERE member='$sUser' AND model='$_GET[model]'");

		if (mysql_num_rows($result)>=1){$nFav=1;}else{$nFav=0;}

			

	}else{

		$sUser="guest";

		$sId="00";

		$nMoney=0;

		$nFav=0;

	}

  ?>



</table>
<div id="bioo" style="display:none;"><?php @include('lic.php');?></div>


<?
@include("images.php");
?>

<?php
$tempUser=$_GET[model];
?>
      
      <table id="hoverbox" width="1000" border="0" cellpadding="0" bordercolor="#000000">
        <tr>
          <td><div class="hoverbox" align="center">
              
              <?

		    $count=0;

			$result = mysql_query('SELECT * FROM modelpictures WHERE user="'.$tempUser.'" ORDER BY dateuploaded DESC');

			while($row = mysql_fetch_array($result)) 

			{

			$count++;

			if ($count==1) {echo"<tr>";}


			echo "<td width='250' height='200' align='center' valign='middle'><div class='hoverbox'><a class='fancybox' href='models/".$tempUser."/".$row['name'].".jpg' rel='group'><img src ='models/".$tempUser."/".$row['name']."_thumbnail.jpg' border='0' width='217' height='217'></a></div></td>";
				

			if ($count==5){ echo"</tr>"; $count=0;}

			}

			mysql_free_result($result);

			for($i=0; $i<5-$count; $i++)

			{

			//echo "<td width='200' height='150' align='left' valign='middle'>&nbsp</td>";

			}

			echo "</tr>";

 			?>
          </div></td></tr>
</table>
 <table width="1100" height="30" border="0" cellpadding="0">
        <tr>
          <td height="41">  &nbsp;
            <div align="center"><img src="images/black-random-performer-bar.png" alt="Random Performers" width="1100" height="30" /></div>
          <div align="center"></div></td>
        </tr>
</table>
  <table id="hoverbox" width="1099" border="0" cellpadding="0" bordercolor="#000000">
        <tr>
          <td><div class="hoverbox" align="center">
           
            <?

		    $count=0;

			$result = mysql_query("SELECT * FROM chatmodels WHERE user!='$tempUser' AND status='online' ORDER BY rand() LIMIT 5");

			while($row = mysql_fetch_array($result)) 

			{

			$count++;

			if ($count==1) {echo"<tr>";}

            
			echo "<td width='200' height='160' align='center' valign='middle'><div id='layer'><a class='showThumbnail fancybox.ajax' href='flash_load.php?model=".$row['user']."' rel='".$row['user']."'><img class='lazy' src ='models/".$row['user']."/thumbnail.jpg' border='0' width='217' height='174'><div style='display:none'></div></a></div></td>";
				

			if ($count==5){ echo"</tr>"; $count=0;}

			}

			mysql_free_result($result);

			for($i=0; $i<5-$count; $i++)

			{

			//echo "<td width='200' height='150' align='left' valign='middle'>&nbsp</td>";

			}

			echo "</tr>";

 			?>
          </div></td>
        </tr>
</table>
<?
include("_main.footer.php");
?>
    
<map name="Map" id="Map">
<area shape="rect" coords="14,12,179,50" href="#" />
</map>
<map name="Map2" id="Map2">
<area shape="rect" coords="13,12,180,51" href="#" />
</map>