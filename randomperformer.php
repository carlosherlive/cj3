<?php
include("dbase.php");
include("settings.php");

$select="SELECT * FROM chatmodels WHERE status='online' limit 4" ;
        $result = mysql_query($select);
        $nTotal=mysql_num_rows($result);
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

        	//echo '<div class="div_iframe" style="display: block"><iframe width="100%" height="100%" src="thumbnail.php?model='.$username .'" style="border:none;" scrolling="no" align="top" frameborder="no" allowtransparency="true" background-color="transparent" allowfullscreen="true"></iframe></div>';
        	echo '<div class="performer"><img src="models/'.$username .'/thumbnail.jpg" width="305px" height="155px"></div>';
    	}
        mysql_free_result($result);
