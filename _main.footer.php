<footer class="w3-hide-small">
    <div class="footer_top">    
    	<div class="footer-container" align="center">
    	    <div class="col-md-12 no-padd">
		<ul class="cen">
			<li><a class="footer_link" href="https://www.sexliive.com/"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
			<li><a class="footer_link" href="login_model.php">Login Performer</a></li>
			<li><a class="footer_link" href="registration/model.php">Become A Performer</a></li>
			<li><a class="footer_link" href="mailto:contact@sexliive.com">Contact Us: contact@sexliive.com</a></li>
			<li><a class="footer_link social-icon" href="https://www.facebook.com/sexliive" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
			<li><a class="footer_link social-icon" href="https://twitter.com/sexliive" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
			<li><a class="footer_link social-icon" href="https://instagram.com/sexliive" target="_blank"><i class="fa fa-instagram"></i></a></li>
			<li><a class="footer_link social-icon" href="https://www.youtube.com/channel/UCkOUtJUM04gCppVs5EC-uRA" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
			<li><a class="footer_link social-icon" href="https://plus.google.com/104516888377694726392" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			<li><a class="footer_link social-icon" href="https://sexliive.tumblr.com" target="_blank"><i class="fa fa-tumblr-square"></i></a></li>
			<li><a class="footer_link" href="faq.php">F.A.Q.</a></li>
			<li><a class="footer_link" href="#">DMCA Claim</a></li>
			<li><a class="footer_link" href="#">Support Online</a></li>
		</ul>
	    </div>	
	</div>
    </div>
    <div class="footer_middle">
	<p>The site contains sexually explicit material. Enter ONLY if you are at least 18 years of age and accept our <a href="#">cookies policies.</a></p>
	<p><a href="law.php" target="_self">18 U.S.C. 2257 Record-Keeping Requirements Compliance Statement</a></p>
	<p><a href="https://www.rtalabel.org/" target="_blank"><img src="images/88x31_RTA-5042-1996-1400-1577-RTA_a.gif" style="margin: 0 15px;"></a>
	   <a href="https://www.asacp.org/ASACP.php" target="_blank"><img src="images/ApprovedASACPmember.gif"></a></p>
    </div>
    <div class="footer_bottom">
	<div class="bottom_width">
	    <?php
        require_once ('Mobile_Detect.php');
        $detect = new Mobile_Detect();
        if ($detect->isPuffin()) { // Detecta si es Puffin
            echo '<div class="footer-container-puffin">';
        } else { 
            echo '<div class="footer-container">';
        }
        ?>
    	    	<div class="col-md-12">
	    	    <p>Copyright &copy; <?=date('Y')?> ~ <a href="https://www.sexliive.com/"><? echo $copyright; ?></a></p>
	    	    <ul>
			<li><a href="#">Help</a></li>
			<li><a href="#">Terms and Conditions</a></li>
			<li><a href="#">Declaration of Property Rights</a></li>
			<li><a href="#">Money Back Policy</a></li>
			<li><a href="#">Personal Data Protection</a></li>
	   	    </ul>
		</div>
	    </div>
	</div>
    </div>
</footer>
</body>
</html>
