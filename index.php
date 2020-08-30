<?
if (isset($_COOKIE["usertype"])) {
	include("_main.header.logged.in.php");
	} else {
	include("_main.header.php");
}
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

<?php
include("geoip/geoip.inc");
$gi = geoip_open("geoip/GeoIP.dat", GEOIP_STANDARD);
$cc=geoip_country_code_by_addr($gi, $_SERVER['REMOTE_ADDR']);
geoip_close($gi);
?>

<div class="body-container">
	<div style="height:25px;width:100%; padding-right:20px;">
    	<i class="fas fa-th" style="float: right;font-size: 20" onclick="zigzag();" aria-hidden="true"></i>
    </div>
    <div class="col-md-12 no-padd" id="origingalery">

        <div class="listgalery">
            <?php //echo '<ul class="model_group">';
	 	$count=0;
		$nTime=time();
		if (!isset($_GET['category'])) {
		$select="SELECT * FROM chatmodels WHERE status='online'".$query_add;//100hours
		} else {
		$select="SELECT * FROM chatmodels WHERE category='$_GET[category]' AND status='online'".$query_add;
		}
		$select="select * from chatmodels c where not exists(select id from blockedcountry b where  b.model=c.user  and b.cc='$cc') and c.status='online' order by rand() limit 50;";
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
			/*if ($count==1) {
				echo '<li class="w40 right col-md-6 padd li_group">';
  				echo '<table width="100%" height="auto" border="0" cellpadding="0" cellspacing="0">';
				echo '<tr>';
          			echo '<td height="auto" align="center" valign="middle">';
          			echo '<a href="liveshow.php?model='.$username.'"><img src="models/'.$username .'/thumbnail.jpg" width="600px" height="420px"></a>';
        			echo '</td><tr></table></li>';
        		} elseif ($count==13) {
				echo '<li class="w40 col-md-6 padd li_group">';
  				echo '<table width="100%" height="auto" border="0" cellpadding="0" cellspacing="0">';
				echo '<tr>';
          			echo '<td height="auto" align="center" valign="middle">';
          			echo '<a href="liveshow.php?model='.$username.'"><img src="models/'.$username .'/thumbnail.jpg" width="600px" height="420px"></a>';
        			echo '</td><tr></table></li>';
        		} else {
			    	echo '<li class="w20 col-md-3 padd li_group">';
  				echo '<table width="100%" height="auto" border="0" cellpadding="0" cellspacing="0">';
				echo '<tr>';
          			echo '<td height="auto" align="center" valign="middle">';
          			echo '<a href="liveshow.php?model='.$username.'"><img src="models/'.$username .'/thumbnail.jpg" width="300px" height="210px"></a>';
        			echo '</td><tr></table></li>';
        		}
			if ($count==24) {
				$count=0;
			}*/
		}
		mysql_free_result($result);
		echo'</ul>';
    		?>
    	    <div class="hoverbox hide" align="center" id="botonmas">
    	            <img src="images/show-more-models.png" onclick="cargar()" alt="Show More Models" width="192" height="49" border="0" />
            </div>
    	</div>
    </div>
</div>

<?
	include("_main.footer.php");
?>

<script type="text/javascript">
	$("img.lazy").lazyload({effect : "fadeIn", effectspeed: 1 }).removeClass("lazy");
	$(document).ajaxStop(function(){
	    $("img.lazy").lazyload({effect: 1}).removeClass("lazy");
	});
</script>
<script>
	$('.showThumbnail').live('mouseenter', function() {
            $(this).find(':first-child').css('display', 'none');
	    var hiddenDiv = $(this).find(':last-child');
      	    var iFrameHtml = hiddenDiv.html();
            if (iFrameHtml.indexOf('iframe') == -1) {
      		var username = $(this).attr('rel');
      		hiddenDiv.html('<iframe width="300" height="200" src="thumbnail.php?model='+username+'" style="border:none;" scrolling="no" align="top" frameborder="no" allowtransparency="true" background-color="transparent" allowfullscreen="true"></iframe>');
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
<script>
var contador = 1;
$(window).scroll(function () {
var otro =0;
var mas = 0;
   if ($(window).scrollTop() > $(document).height() -screen.height) {
	console.log("cargar mas modelos");
	//alert("cargar mas modelos");
	//$(#origingalery).append();
	cargar();
   }
//mas = $(document).height()-screen.height;
//otro = screen.height;

//console.log(mas+'-'+$(window).scrollTop()+'-'+otro);
});
function cargar(){
	if (contador<3){
	    contador = contador + 1;
            var url="test.php";
	    	var boton = "<div class='hoverbox' align='center' id='botonmas'><img src='images/show-more-models.png' onclick='cargar()' alt='Show More Models' width='192' height='49' border='0' /></div>";
            $.ajax({
                type: "get",
                url:url,
                data:{},
                success: function(datos){
	   	    //$("#botonmas").remove();
                    $(".listgalery").append(datos);
                    //$("#origingalery").append(boton);
                }
            });
	}
}
function zigzag() {
	$("#cell1").removeClass('gallery5');
	$("#cell1").addClass('galleryw40');
	$("#cell21").removeClass('gallery5');
	$("#cell21").addClass('galleryw40r');
	$("#cell35").removeClass('gallery5');
	$("#cell35").addClass('galleryw40');
	$(".gallery5").addClass('galleryz5');
	$(".gallery5").removeClass('gallery5');
	alert($( window ).width());
	alert($( window ).height());
}

</script>
