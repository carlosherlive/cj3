<? if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatusers" )

{

header("location: ../../registration/user.php");

} else{

include("../../dbase.php");

$result=mysql_query("SELECT user from chatusers WHERE id='$_COOKIE[id]' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{	$username=$row[user];	}

}



$temail="";

$tsms="";



if ( $_POST[hiddenField]=="yes" &&$_POST[email]=="true"){

	mysql_query("UPDATE chatusers SET emailnotify='1' WHERE user='$username'");

	$temail="1";

} else if ($_POST[hiddenField]=="yes" &&$_POST[email]==""){

	mysql_query("UPDATE chatusers SET emailnotify='0' WHERE user='$username'");

	$temail="0";

	}







if ( $_POST[hiddenField]=="yes" && $_POST[sms]=="true"){

	mysql_query("UPDATE chatusers SET smsnotify='1' WHERE user='$username'");

	$tsms="1";

	} else if ($_POST[hiddenField]=="yes" && $_POST[sms]=="") {

	mysql_query("UPDATE chatusers SET smsnotify='0' WHERE user='$username'");

	$tsms="0";

	}



if ($temail==""){

	$result=mysql_query("SELECT emailnotify from chatusers WHERE user='$username' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{

	$temail=$row[emailnotify];

	}

}



if ($tsms==""){

	$result=mysql_query("SELECT smsnotify from chatusers WHERE user='$username' LIMIT 1");

	while($row = mysql_fetch_array($result)) 

	{

	$tsms=$row[smsnotify];

	}



}



if (isset($_GET[remove]) && $_GET[remove]!=""){

mysql_query("DELETE from favorites WHERE model='$_GET[remove]' AND member='$username' LIMIT 1");

}





?>
<?
include("_members.header.php");
?>

<script>
$(document).ready(function() {
$("img.lazy").lazyload({effect : "fadeIn",

    	effectspeed: 1000 });
});
 </script>
<br><br>

 <div align="center">

          <table width="778" border="0" cellspacing="3" cellpadding="0">

            <tr>

              <td width="13" valign="top"><p>



              </td>

              <td width="875"><div align="center">

                <?php echo '<table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#8F0000">';







		    $count=0;



			$nTime=time();










$result = mysql_query("SELECT t1.*, t2.* FROM favorites AS t1,chatmodels AS t2 WHERE t1.member='$username' AND t2.user=t1.model AND t2.status!='pending' AND t2.status!='offline' AND t2.status!='rejected'"  );					




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



			    echo '<td  align="center" valign="middle" background="/images/modelbox_red_v2.png">';





  				echo '<table width="200" height="10" border="0" cellpadding="0" cellspacing="2">';







				echo '<td width="200" height="0" align="center" valign="middle">';



				 echo '<tr>';



          echo '<td height="200" align="center" valign="middle">

          <a class="showThumbnail" href="/liveshow.php?model='.$username .'" rel="'.$username .'">

          <div class="hoverbox"><img class="lazy" src="/graphics/ajax-loader.gif" data-original="/models/'.$username.'/thumbnail.jpg" width="250" height="200" border="0"></div>';

          //echo '<div style="display:block"></div>';



        echo '</a></td>';

				//echo '<td height="168" align="center" valign="middle"><a href="ladydetails.php?user='.$username .'"><img src="/models/'.$username.'/thumbnail.jpg" width="224" height="168" border="1"></a></td>';

				//echo '<td width="270" height="40" align="center" valign="middle" background="images/modelbox_red_v2.png">';



		 		echo '</tr><tr>';

				echo '</tr><tr>';

				echo '<tr>';





				echo '<td height=40 align="center" valign="middle"><span class="modelbox_title"><a href="/liveshow.php?model='.$username .'"><p style="font-size:14px; color:#ffffff; font-weight:bold;">'.$username .'</p></a><a href="favorites.php?remove='.$username .'"><h3>Remove</h3></a></span></td>';



				echo '</tr><tr>';



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

              </div></td>

              <td width="14">&nbsp;</td>

            </tr>

          </table>

        </div>
<?
include("_members.footer.php");
?>