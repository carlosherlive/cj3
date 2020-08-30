<?
include("_main.header.php");
require_once("dbase.php");
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type='text/javascript' src='/js/jquery.lazyload.min.js'></script>
<script>
$(document).ready(function() {
    $("img.lazy").lazyload({effect : "fadeIn",effectspeed: 1 });
    $('.showThumbnail').live('mouseenter', function() {
    	$(this).find(':first-child').css('display', 'none');
    	var hiddenDiv = $(this).find(':last-child');
    	var iFrameHtml = hiddenDiv.html();
    	if (iFrameHtml.indexOf('iframe') == -1) {
	    var username = $(this).attr('rel');
      	    hiddenDiv.html('<iframe width="314" height="251" src="thumbnail.php?model='+username+'" style="border:none;" scrolling="no" align="top" frameborder="no" allowtransparency="true" background-color="transparent" allowfullscreen="true"></iframe>');
    	}
    	hiddenDiv.css('display', 'block');
    });
    $('.showThumbnail').live('mouseleave', function() {
    	var hiddenDiv = $(this).find(':last-child');
    	hiddenDiv.css('display', 'none');
    	hiddenDiv.html('');
    	$(this).find(':first-child').css('display', 'block');
    });
});
</script>

<div class="body-container">
    <div class="col-md-12 no-padd">
        <div>
            <section class="w95 model_group">
                <?php
		$model=htmlentities($_POST[search]);
		if($model) {
		    $result = mysql_query("SELECT * FROM chatmodels  WHERE user like '%$model%' AND status!='rejected' AND status!='blocked' AND status!='pending' ");
		    while($row = mysql_fetch_array($result)) {
			   $count++;
			   if ($count==1) {
        echo '<li class="w40 right col-md-6 padd li_group">';
          echo '<table width="100%" height="auto" border="0" cellpadding="0" cellspacing="0">';
        echo '<tr>';
                echo '<td height="auto" align="center" valign="middle">';
                echo '<a href="liveshow.php?model='.$row['user'].'"><img src="models/'.$row['user'] .'/thumbnail.jpg" width="600px" height="420px"></a>';
              echo '</td><tr></table></li>';
            } elseif ($count==13) {
        echo '<li class="w40 col-md-6 padd li_group">';
          echo '<table width="100%" height="auto" border="0" cellpadding="0" cellspacing="0">';
        echo '<tr>';
                echo '<td height="auto" align="center" valign="middle">';
                echo '<a href="liveshow.php?model='.$row['user'].'"><img src="models/'.$row['user'] .'/thumbnail.jpg" width="600px" height="420px"></a>';
              echo '</td><tr></table></li>';
            } else {
            echo '<li class="w20 col-md-3 padd li_group">';
          echo '<table width="100%" height="auto" border="0" cellpadding="0" cellspacing="0">';
        echo '<tr>';
                echo '<td height="auto" align="center" valign="middle">';
                echo '<a href="liveshow.php?model='.$row['user'].'"><img src="models/'.$row['user'] .'/thumbnail.jpg" width="300px" height="210px"></a>';
              echo '</td><tr></table></li>';
            }
      if ($count==24) {
        $count=0;
      }
		    }
		}
		echo'</section>';
    		?><br/>
    	</div>
    </div>
</div>

<?
include("_main.footer.php");
?>
