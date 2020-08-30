<? if (isset($_COOKIE["usertype"])){

	
    include("_main.header.logged.in.php");	
	
			  	  

	} else {
 
		 
	include("_main.header.php");		  
			  

	} ?>
    
    <?



$models_per_page = 50;		// never make this 0, never

$max_page_show = 15;


 $model_order = 'order by RAND()';






	  if (!isset($_GET['page']))

	  {

		$page=1;

		$query_add = " $model_order limit ".($page-1).", $models_per_page";

	  }

	  else

	  {

		$page = $_GET['page'];

		$query_add = " $model_order limit ".(($page-1)*$models_per_page).",$models_per_page";

	  }



	$select="SELECT * FROM chatmodels WHERE 1" ;



	$result = mysql_query($select);



	$nTotal=mysql_num_rows($result);



	mysql_free_result($result);



	if ($max_page_show >= $nTotal)

	{

		$start_from = 1;

		$loop_till = ceil($nTotal/$models_per_page);

	}

	else

	{

		if ($page > $max_page_show)

		{

			$start_from = $page;

		}

		else

		{

			$start_from = 1;

		}

		$loop_till = ($max_page_show+$page);

	}



?>
<?php
include("geoip/geoip.inc");
$gi = geoip_open("geoip/GeoIP.dat", GEOIP_STANDARD);
$cc=geoip_country_code_by_addr($gi, $_SERVER['REMOTE_ADDR']);
geoip_close($gi);
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>

<script type='text/javascript' src='/js/jquery.lazyload.min.js'></script>




<style type="text/css">

<!--



.more { background: url('show-more-models-button.png') no-repeat; width: 167px; height: 45px; display: block; text-indent: -9999em; }


-->

</style>

<style type="text/css">

<!--

body,td,th {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 11px;

	font-weight: bold;

}

body {
	margin-left: 0px;
	margin-right: 0px;
	background-image: url(images/red-page-bg.png);
	background-repeat: repeat-x;
	background-attachment: fixed;
	margin-top: 0px;
	margin-bottom: 0px;
}





-->



</style>




<div align="center">





  <table width="1001" height="75" border="0" cellpadding="0" cellspacing="0" background="8F0000">

    <tr>

      <td width="1275">

		<div align="center" id="updates">

          <table width="778" border="0" cellspacing="3" cellpadding="0">

            <tr>

              <td width="13" valign="top"><p>



              </td>

              <td width="875"><div align="center">
                <p><br />
                 </p>
                <p>&nbsp;</p>
                
                <p>                    <?php echo '<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="">';







		    $count=0;



			$nTime=time();











			if (!isset($_GET['category']))



			{



			$select="SELECT * FROM chatmodels WHERE status='online'".$query_add;//100hours



			} else{



			$select="SELECT * FROM chatmodels WHERE category='$_GET[category]' AND status='online'".$query_add;



			}
$cat=htmlentities($_GET[category]);
$select="select * from chatmodels c where not exists(select id from blockedcountry b where  b.model=c.user  and b.cc='$cc') and c.status='online' AND c.category='$cat' order by rand() limit 50;";
			$result = mysql_query($select);



			while($row = mysql_fetch_array($result))



				{





				$tBirthD=$row[birthDate];



				$nYears=date('Y',time()-$tBirthD)-1970;







				$username=$row[user];



				$tempMessage=$row[message];



				$tempCity=$row[city];



				$tempPlace=$row[broadcastplace];



				$tempL1=$row[language1];



				$tempL2=$row[language2];



				$status=$row[status];

























				$count++;



				if ($count==1) {echo' <tr>';}



				echo '<td width="200" height="0" align="center" valign="left">';



			    //echo '<td width="260" height="240" align="center" valign="middle" background="images/modelbox_red_v2.png">';





  				echo '<table width="200" height="10" border="0" cellpadding="0" cellspacing="1">';







				//echo '<td width="200" height="0" align="center" valign="middle">';



				 echo '<tr>';



          echo '<td height="200" align="center" valign="middle">

          <a class="showThumbnail" href="liveshow.php?model='.$username .'" rel="'.$username .'">

          <img class="lazy" src="/graphics/ajax-loader.gif" data-original="models/'.$username.'/thumbnail.jpg" width="250" height="200" border="0">';

          echo '<div style="display:none"></div>';
		  

        echo '</a></td>';

				//echo '<td height="168" align="center" valign="middle"><a href="ladydetails.php?user='.$username .'"><img src="models/'.$username.'/thumbnail.jpg" width="224" height="168" border="1"></a></td>';

				//echo '<td width="270" height="40" align="center" valign="middle" background="images/modelbox_red_v2.png">';



		 		//echo '</tr><tr>';

				//echo '</tr><tr>';

				//echo '<tr>';





				//echo '<td height=40 align="center" valign="middle"><span class="modelbox_title"><a href="ladydetails.php?user='.$username .'">'.$username .'</a></span></td>';



				//echo '</tr><tr>';



				echo '<tr>';





			  //  echo '</tr><tr>';



			//	echo '<tr>';



              //  echo '<td height=0 align="center" valign="top"><span class="modelbox_title"><a href="ladydetails.php?user='.$username .'">BIO</a></span></td>';



			  //  echo '</tr><tr>';



				//echo '<tr>';



              //  echo '<td height=0 align="center" valign="top"><span class="modelbox_title"><a href="gallery.php?user='.$username .'">PICTURE GALLERY</a></span></td>';



			   // echo '</tr><tr>';



	 			//echo '<tr>';



               // echo '<td height=0 align="center" valign="top"><span class="modelbox_title"><a href="videos.php?model='.$username .'">VIDEO GALLERY</a></span></td>';



			   // echo '</tr><tr>';



		      	echo '<td height=0 align="center" valign="top">';



		       // echo '<span class="model_title_small">';





				//echo '<span class="model_message"><a href="liveshow.php?model='.$username .'">FREE CHAT</a></span><br>';





		        	//echo '<span class="model_message">&nbsp&nbsp&nbsp&nbsp&nbsp'.$tempMessage.'</span></td>';



				echo '</tr></table>';



				echo '  </td>';



				if ($count==5){ echo"</tr>"; $count=0;}



				}








            echo'</tr>';


			if ($count==1){



			echo'<td width="200"  height="300" align="center" valign="middle">&nbsp</td>';



			echo'<td width="200"  height="300" align="center" valign="middle">&nbsp</td>';



			echo'<td width="200"  height="300" align="center" valign="middle">&nbsp</td>';



			echo'<td width="200"  height="300" align="center" valign="middle">&nbsp</td>';



			//echo'<td width="115"  height="214" align="center" valign="middle">&nbsp</td>';



			echo'</tr>';



			} else if ($count==2){



			echo'<td width="200"  height="300" align="center" valign="middle">&nbsp</td>';



			echo'<td width="200"  height="300" align="center" valign="middle">&nbsp</td>';



			echo'<td width="200"  height="300" align="center" valign="middle">&nbsp</td>';



			//echo'<td width="115"  height="214" align="center" valign="middle">&nbsp</td>';



			echo'</tr>';



			} else if ($count==3){



			echo'<td width="200"  height="300" align="center" valign="middle">&nbsp</td>';



			echo'<td width="200"  height="300" align="center" valign="middle">&nbsp</td>';



			//echo'<td width="115"  height="214" align="center" valign="middle">&nbsp</td>';



			echo'</tr>';



			} else if ($count==4){



			echo'<td width="200"  height="300" align="center" valign="middle">&nbsp</td>';



			//echo'<td width="115"  height="214" align="center" valign="middle">&nbsp</td>';



			echo'</tr>';



			//} else if ($count==5){



			//echo'<td width="115"  height="214" align="center" valign="middle">&nbsp</td>';



			//echo'</tr>';



			}







			mysql_free_result($result);



			echo'</table>';



 			?><br />
                  
                  
                  </p>
              </div></td>




              <td width="14">&nbsp;</td>

            </tr>

          </table>

          
        </div>




      </p></td>

    </tr>

  </table>

</div>

<br />

</p>

  <p>

</p>

    </p>



    <div align="center">
      <p>
        <script type="text/javascript">$("img.lazy").lazyload({effect : "fadeIn",

    	effectspeed: 1000 }).removeClass("lazy");

		$(document).ajaxStop(function(){
			$("img.lazy").lazyload({
				effect: 1000
			}).removeClass("lazy");
		});

		

      </script>
        
        
        
        
        <script>

	$('.showThumbnail').live('mouseenter', function() {
      $(this).find(':first-child').css('display', 'none');

      var hiddenDiv = $(this).find(':last-child');

      var iFrameHtml = hiddenDiv.html();

      if (iFrameHtml.indexOf('iframe') == -1) {

      	var username = $(this).attr('rel');

      	hiddenDiv.html('<iframe width="250" height="200" src="thumbnail.php?model='+username+'" scrolling="no" frameborder="0"  allowfullscreen></iframe>');

      }

      hiddenDiv.css('display', 'block');
    });

	$('.showThumbnail').live('mouseleave', function() {
      var hiddenDiv = $(this).find(':last-child');

      hiddenDiv.css('display', 'none');

      hiddenDiv.html('');

      $(this).find(':first-child').css('display', 'block');
	});

      </script>
        
        
        
        
        <?
$start = microtime(true);
$end = microtime(true);

printf("Page was generated in %f seconds", $end - $start);


?>
      </p>
</div>
 <?
 include("_main.footer.php");
 ?>       