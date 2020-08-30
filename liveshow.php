<?
if (isset($_COOKIE["usertype"])) {
	//include("_main.header.logged.in.php");
} else {
	//include("_main.header.php");
}
include('dbase.php');

function GetAge($Birthdate) {
        // Explode the date into meaningful variables
        list($BirthDay,$BirthMonth,$BirthYear) = explode("/", $Birthdate);
        // Find the differences
        $YearDiff = date("Y") - $BirthYear;
        $MonthDiff = date("m") - $BirthMonth;
        $DayDiff = date("d") - $BirthDay;
        // If the birthday has not occured this year
        if ($DayDiff < 0 || $MonthDiff < 0)
        $YearDiff--;
        return $YearDiff;
}
	$result = mysql_query("SELECT * FROM chatmodels WHERE user='$_GET[model]' LIMIT 1");
		while($row = mysql_fetch_array($result)) {
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
                //echo $row["birthDate"];
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
<html xmlns="https://www.w3.org/1999/xhtml" lang="es" xml:lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="google" content="notranslate" />
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="expires" content="0">
		<title><? echo $sitename; ?> - Live Sex Cam Shows, Free Webcam Chat</title>
		<meta name="description" content="Chat for FREE and watch HD Cams with Live Sex! Our Models are waiting for you. Enjoy a Private Show with the girl of your dreams now! NO registration required." />
		<meta name="keywords" content="en vivo, sexo, cams, cam, real, web, amateur, webcams, personal, livesex, sexo en vivo, free sex videos, sexvideos, free porn videos, porn videos, free videos, gratis, real, cámara web, cam, cams, chicas, video, women, lesbianas, porn, porno, men, guys, nude, privado, pussy, sexy, camgirls, homecams, video chat, vídeo gratis, xxx, adulto, naked" />
		<meta name="google-site-verification" content="QBZgi2zWrY1xY1ZJaxaADyw1tTbbQyhw8Qjg8qEmCRo" />
		<link rel="canonical" href="https://www.sexliive.com/" />
		<link rel="shortcut icon" href="images/favicon.png" />
		<link rel="icon" href="images/favicon.png" type="image/x-icon" />
		<link rel="stylesheet" href="common/css-menu/style.css" type="text/css" />
		<link rel="stylesheet" href="common/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
		<link rel="stylesheet" href="styles.css" type="text/css"/>
		<link rel="stylesheet" href="emision.css" type="text/css"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js/jquery-3.2.0.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://malsup.github.io/jquery.cycle.all.js"></script>
		<script type='text/javascript' src='js/jquery.lazyload.min.js'></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
		<script type='text/javascript' src='js/jquery.lazyload.min.js'></script>
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="common/js/bootstrap.js"></script>
		<!--<script src="https://kit.fontawesome.com/707bd3388d.js"></script> -->
		<link rel="stylesheet" href="../../css/jquery.emojiarea.css">
		<script src="../../js/jquery.emojiarea.js"></script>
		<script src="../../packs/basic/emojis.js"></script>
		<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
		<script src="js/webrtc/modernizr.custom.js"></script>
		<link rel="stylesheet" type="text/css" href="stylesheets/normalize.css" />
	</head>

	<body>
		<div class="row  w3-hide-small w3-hide-medium">
			<div id="banner_top" class="col-sm-12" style="height:10%;">

			</div>
		</div>
		<div class="row">
			<div class="col-sm-9" id="emision_container">
				<div id="">
					<div id="vid-box">
						<iframe id="emision" style="height: 64vh; width: 70vw;" src="https://www.sexliive.com:3443/group_video_chat/?callid=user4cf279ab"></iframe>
					</div>
					<img src="images/model.png"  style="width:100%;max-width:407px;" class="offline">
					<div class="w3-display-middle w3-large offline"><h1>Off Line</H1></div>
				</div>
				<div id="stream-info" hidden="false">
			        <button id="end" onclick="end()" hidden="true">Done</button>
			        <span id="here-now">0</span>
				</div>
			</div>
			<div id="sidebar_performer" class="col-sm-3 randomperformer" >
				<?php
				require_once('randomperformer.php');  ?>
			</div>
		</div>
		<div id="card_bio" class="card_bio collapse">
			<div class="model_title">
				<h3>Modelo: <? echo $_GET[model] ?></h3>
			</div>
			<div class="foto-perfil">
				<img id='thumbnail-stream' width="90%"  src="models/<? echo $_GET[model] ?>/thumbnail.jpg" style="border:none;" scrolling="no" align="top" frameborder="no" allowtransparency="true" background-color="transparent" allowfullscreen="true">
			</div>
			<div class="model_details">
				<span>Race: </span><?=$tEthnic;?><br>
	        	<span>Age: </span><?=$tBirthD;?> <br>
	        	<span>Location: </span><?=$tempCountry;?><br>
	        	<span>About me: </span><?=$tMessage;?> <br>
        	</div>
        	<div class="model_schedule">
        		<h4>My Schedule</h4>
          		<span>Monday:</span><?=$monday;?><br>
				<span>Tuesday:</span><?=$tuesday;?><br>
				<span>Wednesday:</span><?=$wednesday;?><br>
        		<span>Thursday:</span><?=$thursday;?><br>
        		<span>Friday:</span><?=$friday;?><br>
        		<span>Saturday:</span><?=$saturday;?><br>
        		<span>Sunday:</span><?=$sunday;?><br>
        	</div>
		</div>
		<div class="model_options">
			<span class="icon_options" data-toggle="collapse" data-target="#card_bio" aria-expanded="false" aria-controls="card_bio"><i class="fa fa-info-circle fa-sm"></i></span>
			<a class="options" href="addfavourite.php?user=roxana&ok=ok"><span class="icon_options"><i class="fa fa-heart fa-sm"></i></span></a>
			<span class="icon_options"><i class="far fa-money-bill-alt fa-sm"></i></span>
			<span class="icon_options"><i class="fa fa-database fa-sm"></i></span>
			<span class="icon_options"><i class="fas fa-envelope"></i></span>
		</div>

		<div class="model_options_2">
			<a href="galellery.php?user=<? echo $_GET[model];?>" class="options"><span class="icon_options"><i class="far fa-images fa-sm"></i></span></a>
			<a href="galellery.php?user=<? echo $_GET[model];?>" class="options"><span class="icon_options"><i class="fas fa-video fa-sm"></i></span></a>
			<span class="icon_options"><i class="fas fa-microphone fa-sm"></i></span>
            <span class="icon_options"><span class="icon_options"><i class="far fa-images fa-sm" onclick="tooglescreen()"></i></span>
		</div>
		<div id="chatlist" class="chatlist">
		    <p id="chat1" style="opacity: 0.1">prueba linea 1</p>
		    <p id="chat1" style="opacity: 0.2">prueba linea 1</p>
		    <p id="chat2" style="opacity: 0.3">prueba linea 1</p>
		    <p id="chat3" style="opacity: 0.5">prueba linea 1</p>
		    <p id="chat4" style="opacity: 0.7">prueba linea 1</p>
		    <p id="chat5" style="opacity: 0.9">prueba linea 1</p>
		    <p id="chat5" style="opacity: 0.9">prueba linea 1</p>
		</div>
		<div class="w3-display-container  w3-hide-small w3-hide-medium" style="position: absolute; bottom: 50px; left: 4.3%" id="button_bar">
			<input type="number" class="tip_emision hidden">
			<button class="tip_me_emision">Tip Me</button>
			<button class="private_show_emision">Start Private Show</button>
			<button class="buy_token_emision">Buy Tokens</button>
		</div>
		<div class="w3-display-container chat_client">
				<form>
					<textarea rows="2" class="emojis-wysiwyg"></textarea>
				</form>
	            <img src="../../packs/basic/smile.png" id="smile_client">
	            <button class="signup-button send_client w3-hide-small w3-hide-medium">Send</button>
	            <button class="signup-button_mobile send_client w3-hide-large">Start Private Show</button>
		</div>

		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="../../js/webrtc/pubnub.js"></script>
		<script src="https://kevingleason.me/SimpleRTC/js/webrtc.js"></script>

		<script src="../../js/webrtc/rtc-controller.js"></script>-->
		<script>

		//var $wysiwyg = $('.emojis-wysiwyg').emojiarea({wysiwyg: true});
		$('textarea').emojiarea({button: '#smile_client'});
//		$wysiwyg.on('change', function() {
//			$wysiwyg_value.text($(this).val());
//		});
//		$wysiwyg.trigger('change');


$( document ).ready(function() {
	//alert($( window ).width());
    console.log( "ready!" );

var video_out  = document.getElementById("vid-box");
var embed_code = document.getElementById("embed-code");
var embed_demo = document.getElementById("embed-demo");
var here_now   = document.getElementById('here-now');
var stream_info= document.getElementById('stream-info');
var end_stream = document.getElementById('end');

var streamName;

function watch(model){
	console.log('buscando canal');
	console.log(model);
    var num = model.toLowerCase();
    var phone = window.phone = PHONE({
        number        : "Viewer" + Math.floor(Math.random()*100), // listen on username line else random
        publish_key   : 'pub-c-5ca32e2d-79bb-486c-913e-ea3d45a4a89d', // Your Pub Key
        subscribe_key : 'sub-c-c572189a-b303-11e9-a469-36ba0d0c6e6b', // Your Sub Key
        oneway        : true
    });
    var ctrl = window.ctrl = CONTROLLER(phone, get_xirsys_servers);
    ctrl.ready(function(){
             ctrl.isStreaming(num, function(isOn){
                 if (isOn) ctrl.joinStream(num);
                 else alert("User is not streaming!" +num);
            	ctrl.joinStream(num);
             });
            addLog("Joining stream  " + num);
    });
    ctrl.receive(function(session){
        //console.log('receive liveshow:');
        session.connected(function(session){
            console.log('entrando como conectado');
            video_out.appendChild(session.video);
            addLog(session.number + " has joined.");
            console.log(" has joined.");
            stream_info.hidden=false;
        });
        session.ended(function(session) { addLog(session.number + " has left."); });
    });
    ctrl.streamPresence(function(m){
            here_now.innerHTML=m.occupancy;
            addLog(m.occupancy + " currently watching.");
    });
    $(".offline").hide();
    return false;
}

function get_xirsys_servers() {
    var servers;
    console.log('xirsys');
    $.ajax({
        type: 'POST',
        url: 'https://service.xirsys.com/ice',
        headers: {"X-HTTP-Method-Override": "PUT","Access-Control-Allow-Headers": "*"},
        data: {
            room: 'default',
            application: 'test',
            ident: 'seienshi',
            secret: '9778485e-677e-11e9-b2cd-0242ac110003',
            secure: 1,
        },
        success: function(res) {
                console.log(res);
            res = JSON.parse(res);
            if (!res.e) servers = res.d.iceServers;
        },
        async: false
    });
    return servers;
}
function addLog(log){
        $('#logs').append("<p>"+log+"</p>");
}
function end(){
	if (!window.phone) return;
	ctrl.hangup();
    video_out.innerHTML = "";
//	phone.pubnub.unsubscribe(); // unsubscribe all?
	$(".offline").show();

}
watch("<?php echo $_GET['model']?>");
});
function tooglescreen() {
    if ($('#banner_top').hasClass('hide')){
        $('#banner_top').removeClass('hide');
        $('.performer').removeClass('performer-full');
        $('#emision').removeClass('full-screen');
        $('.chat_client').removeClass('chat_full');
        $('#button_bar').removeClass('button_bar_full');
        $('.model_options').removeClass('model_option_full');
        $('.model_options_2').removeClass('model_option_full');
    }else{
        $('#banner_top').addClass('hide');
        $('.performer').addClass('performer-full');
        $('#emision').addClass('full-screen');
        $('.chat_client').addClass('chat_full');
        $('#button_bar').addClass('button_bar_full');
        $('.model_options').addClass('model_option_full');
        $('.model_options_2').addClass('model_option_full');
    }
}
		</script>
	</body>
</html>

