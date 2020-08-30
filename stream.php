<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>PubRTC + Mobile</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript">
	    var host = "kevingleason.me";
	    if ((host == window.location.host) && (window.location.protocol != "https:"))
	        window.location.protocol = "https";
	</script>
    
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
    <script src="js/webrtc/modernizr.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheets/normalize.css" />
<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>

</head>
<body>

<div class = "bodyDiv">

<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<!-- My Phone Number & Dial Areas -->
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

    
<div id="vid-box"></div>
    
    
 <div id="stream-info" hidden="true">
        <button id="end" onclick="end()" hidden="true">Done</button>
        <img src="img/person_dark.png"/>
        <span id="here-now">0</span>       
</div> 

    
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
    

<form name="watchForm" id="watch" action="#" onsubmit="return errWrap(watch,this);">
    <span class="input input--nao">
        <input class="input__field input__field--nao" type="text" name="number" placeholder="Enter Stream To Watch!"/>
                <label class="input__label input__label--nao" for="number">
                    <span class="input__label-content input__label-content--nao">        
                    </span>
                </label>
            <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
            </svg>
    </span>

       <button class="cbutton cbutton--effect-radomir" type="submit" value="Watch" style="margin-top: 40px; margin-left:-10px">
                <i class="cbutton__icon fa fa-fw fa fa-eye"></i>
        </button>
</form>  
    
<div id="inStream" class="ptext">
	Embed Style: <button onclick="genEmbed(400,600)">Tall</button><button onclick="genEmbed(600,400)">Wide</button><button onclick="genEmbed(500,500)">Square</button><br>
	<div id="embed-code"></div>
	<div id="embed-demo"></div>
</div>
    
<div id="logs" class="ptext" style="background-color:white"></div>

<div class="ptext">
    <p><b>To Use:</b></p>
    <p>Type a channel to stream to and click Stream.</p>
    <p>In a separate browser window, join the steam you created.</p>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
<!-- WebRTC Peer Connections -->
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.pubnub.com/pubnub.min.js"></script>
<script src="js/webrtc/webrtc.js"></script>
<script src="js/webrtc/rtc-controller.js"></script>

<script type="text/javascript">

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
	var ctrl = window.ctrl = CONTROLLER(phone, get_xirsys_servers());
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
	//console.log(get_xirsys_servers);
	//console.log('asf');
	var ctrl = window.ctrl = CONTROLLER(phone, get_xirsys_servers());
	//console.log(ctrl);
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
//	phone.pubnub.unsubscribe(); // unsubscribe all?
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

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Request fresh TURN servers from XirSys - Need to explain.
// room=default&application=default&domain=kevingleason.me&ident=gleasonk&secret=b9066b5e-1f75-11e5-866a-c400956a1e19
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function get_xirsys_servers() {
    var servers;
    console.log('xirsys');
	var authorizationToken = "Basic " + btoa("seienshi:9778485e-677e-11e9-b2cd-0242ac110003");
        jQuery.ajax({
                        type: 'PUT',
                        cache: false,
                        beforeSend: function(request) {
                       		request.setRequestHeader("Authorization", authorizationToken),
                        	request.setRequestHeader ("Content-Type", "application/json");
                        },
                        async: true,
                        url: 'https://global.xirsys.net/_turn/test',
                        dataType: 'json',
                                success: function(data){
                                        //console.log(data);
                                        console.log(data.v.iceServers);
                                        servers = data.v.iceServers;
                                }
                });
         console.log('end');
        return servers;


}
function errWrap(fxn, form){
	try {
		return fxn(form);
	} catch(err) {
		alert("WebRTC is currently only supported by Chrome, Opera, and Firefox");
		return false;
	}
}

</script>


</div>
</body>
</html>