<?
    include_once "dbase.php";
    include_once "settings.php";
?>

<?
$models_per_page = 48;		// never make this 0, never
$max_page_show = 15;
$model_order = 'order by RAND()';
	  if (!isset($_GET['page'])) {
		$page=1;
		$query_add = " $model_order limit ".($page-1).", $models_per_page";
	  } else {
		$page = $_GET['page'];
		$query_add = " $model_order limit ".(($page-1)*$models_per_page).",$models_per_page";
	  }
	$select="SELECT * FROM chatmodels WHERE 1" ;
	$result = mysql_query($select);
	$nTotal=mysql_num_rows($result);
	mysql_free_result($result);
	if ($max_page_show >= $nTotal) {
		$start_from = 1;
		$loop_till = ceil($nTotal/$models_per_page);
	} else {
		if ($page > $max_page_show) {
			$start_from = $page;
		} else {
			$start_from = 1;
		}
		$loop_till = ($max_page_show+$page);
	}
?>

            <?php;
	 	$count=0;
		$nTime=time();
		if (!isset($_GET['category'])) {
		$select="SELECT * FROM chatmodels WHERE status='online'".$query_add;//100hours
		} else {
		$select="SELECT * FROM chatmodels WHERE category='$_GET[category]' AND status='online'".$query_add;
		}
		$select="select * from chatmodels c where not exists(select id from blockedcountry b where  b.model=c.user  and b.cc='$cc') and c.status='online' order by rand() limit 48;";
		$result = mysql_query($select);
		while($row = mysql_fetch_array($result)) {
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
			if ($count==1) {
			echo '<div class="gallery5" id="cell'.$count.'"><a href="liveshow.php?model='.$username.'">
					<img src="models/'.$username .'/thumbnail.jpg" width="100%">
					</a></div>';
			}else{
				echo '<div class="gallery5" id="cell'.$count.'"><a href="liveshow.php?model='.$username.'">
					<img src="models/'.$username .'/thumbnail.jpg" width="100%">
					</a></div>';
			}
		}
		mysql_free_result($result);
		;
    		?>
    	
