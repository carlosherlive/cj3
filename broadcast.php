<?php
error_reporting(0); // Turn off all error reporting
?>

<?
if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" ) {
	header("location: login.php");
} else {
	include("dbase.php");
	include("settings.php");
	$result=mysql_query("SELECT user from $_COOKIE[usertype] WHERE id='$_COOKIE[id]' LIMIT 1");
	while($row = mysql_fetch_array($result)) {
		$username=$row[user];
	}
}
mysql_free_result($result);
?>

<?
include("_models.header.php");
?>

<div class="body-container">
    <div  class="col-md-12 no-padd" align="center">
    <?
    include("dbase.php");
    $model=$username;
    $tempMoneyEarned=0;
    $tempMoneySent=0;
    $result = mysql_query("SELECT * FROM videosessions WHERE model='$model'");
    while($row = mysql_fetch_array($result)) {
    	$epercentage=$row['epercentage'];
    	$duration=$row['duration'];
    	$cpm=$row['cpm'];
    	$ammount=(($duration/60)*$cpm)*$epercentage/10000 ;
    	$tempMoneyEarned+=$ammount;
    	if ($row['paid']=="1") {
    	    $tempMoneySent+=$ammount;
    	}
    }
    mysql_free_result($result);
    $nMoney=$tempMoneyEarned-$tempMoneySent;
    $result = mysql_query('SELECT id,user,cpm,epercentage FROM chatmodels WHERE id="'.$_COOKIE["id"].'" LIMIT 1');
    while($row = mysql_fetch_array($result)) {
	$nCpm=$row[cpm];
	$sUser=$row[user];
	$sId=$row[id];
	$epercentage=$row[epercentage];
    }
    ($result);
    ?>
    	<div>
<form name="streamForm" id="stream" action="#" onsubmit="return errWrap(stream,this);">
    <span class="input input--nao">
        <input class="input__field input__field--nao" type="text" name="streamname" placeholder="Enter Stream Name" id="streamname"/>
                <label class="input__label input__label--nao" for="streamname">
                    <span class="input__label-content input__label-content--nao">
                    </span>
                </label>
            <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
            </svg>
    </span>

      <button class="cbutton cbutton--effect-radomir" type="submit" value="Stream" name="stream_submit" style="margin-top: 40px; margin-left:-10px">
            <i class="cbutton__icon fa fa-fw fa fa fa-video-camera"></i>
        </button>
</form>
	<div id="vid-box"></div> 
 		<div id="stream-info" hidden="true">
        		<button id="end" onclick="end()" hidden="true">Done</button>
        		<img src="img/person_dark.png"/>
        		<span id="here-now">0</span>       
		</div> 
        </div>
    </div>
    </div>
</div>
        <div class="w3-display-container">
			<form><textarea rows="5" class="emojis-wysiwyg"></textarea></form>
            <img src="../../packs/basic/smile.png" id="smile" class="w3-display-right">
            <button class="signup-button w3-display-right">Send</button>
		</div>

		<script>
		var $wysiwyg = $('.emojis-wysiwyg').emojiarea({wysiwyg: true});
		$('textarea').emojiarea({button: '#smile'});
//		$wysiwyg.on('change', function() {
//			$wysiwyg_value.text($(this).val());
//		});
//		$wysiwyg.trigger('change');
		</script>
<script type="text/javascript">
//$( document ).ready(function() {
//console.log( "ready!" );
var video_out  = document.getElementById("vid-box");
var embed_code = document.getElementById("embed-code");
var embed_demo = document.getElementById("embed-demo");
var here_now   = document.getElementById('here-now');
var stream_info= document.getElementById('stream-info');
var end_stream = document.getElementById('end');

var streamName;

function stream(form) {
        streamName = form.streamname.value || Math.floor(Math.random()*100)+'';
        var phone = window.phone = PHONE({
            number        : streamName, // listen on username line else random
            publish_key   : 'pub-c-5ca32e2d-79bb-486c-913e-ea3d45a4a89d', // Your Pub Key
            subscribe_key : 'sub-c-c572189a-b303-11e9-a469-36ba0d0c6e6b', // Your Sub Key
            oneway        : true,
            broadcast     : true,
        });
        //phone.debug(function(m){ console.log(m); })
        var ctrl = window.ctrl = CONTROLLER(phone, get_xirsys_servers);
        ctrl.ready(function(){
                form.streamname.style.background="#55ff5b";
                form.streamname.value = phone.number();
                form.stream_submit.hidden="true";
                ctrl.addLocalStream(video_out);
                ctrl.stream();
        stream_info.hidden=false;
        end_stream.hidden =false;
                addLog("Streaming to " + streamName);
        });
        ctrl.receive(function(session){
            session.connected(function(session){ addLog(session.number + " has joined."); });
            session.ended(function(session) { addLog(session.number + " has left."); console.log(session)});
        });
        ctrl.streamPresence(function(m){
                here_now.innerHTML=m.occupancy;
                addLog(m.occupancy + " currently watching.");
        });
        return false;
}

function watch(form){
        var num = form.number.value;
        var phone = window.phone = PHONE({
            number        : "Viewer" + Math.floor(Math.random()*100), // listen on username line else random
            publish_key   : 'pub-c-5ca32e2d-79bb-486c-913e-ea3d45a4a89d', // Your Pub Key
            subscribe_key : 'sub-c-c572189a-b303-11e9-a469-36ba0d0c6e6b', // Your Sub Key
            oneway        : true
        });
        var ctrl = window.ctrl = CONTROLLER(phone, get_xirsys_servers);
        ctrl.ready(function(){
                ctrl.isStreaming(num, function(isOn){
                        //if (isOn) ctrl.joinStream(num);
                        //else alert("User is not streaming!" +num);
ctrl.joinStream(num);
                });
                addLog("Joining stream  " + num);
        });
        ctrl.receive(function(session){
            session.connected(function(session){
            video_out.appendChild(session.video);
            addLog(session.number + " has joined.");
            stream_info.hidden=false;
        });
            session.ended(function(session) { addLog(session.number + " has left."); });
        });
        ctrl.streamPresence(function(m){
                here_now.innerHTML=m.occupancy;
                addLog(m.occupancy + " currently watching.");
        });
        return false;
}

function getVideo(number){
        return $('*[data-number="'+number+'"]');
}

function addLog(log){
        $('#logs').append("<p>"+log+"</p>");
}

function end(){
        if (!window.phone) return;
        ctrl.hangup();
    video_out.innerHTML = "";
//      phone.pubnub.unsubscribe(); // unsubscribe all?
}

function genEmbed(w,h){
        if (!streamName) return;
        var url = "https://kevingleason.me/SimpleRTC/embed.html?stream=" + streamName;
        var embed    = document.createElement('iframe');
        embed.src    = url;
        embed.width  = w;
        embed.height = h;
        embed.setAttribute("frameborder", 0);
        embed_demo.innerHTML = "<a href='embed_demo.html?stream="+streamName+"&width="+w+"&height="+h+"'>Embed Demo</a>"
        embed_code.innerHTML = 'Embed Code: ';
        embed_code.appendChild(document.createTextNode(embed.outerHTML));
}
function get_xirsys_servers() {
    var servers;
    console.log('xirsys');
    $.ajax({
        type: 'POST',
        url: 'https://service.xirsys.com/ice',
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

function errWrap(fxn, form){
        try {
                return fxn(form);
        } catch(err) {
                alert("WebRTC is currently only supported by Chrome, Opera, and Firefox"+err);
                return false;
        }
}

//});
</script>


<?
include("_models.footer.php");
?>
</body>
</html>

