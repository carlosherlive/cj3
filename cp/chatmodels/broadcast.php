<?php
error_reporting(0); // Turn off all error reporting
?>

<?
if (!isset($_COOKIE["id"]) || $_COOKIE['usertype']!="chatmodels" ) {
	header("location: ../../login.php");
} else {
	include("../../dbase.php");
	include("../../settings.php");
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
<?
        include("../../dbase.php");
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
<body>

<a href="https://www.sexliive.com">
    <span class="w3-display-topright model_back">
        <?php echo $model?>
        <i class="fa fa-sign-out model_back"></i>
    </span>
</a>
<div class="row">
    <div class="col-md-12 no-padd" align="center">
        <div class="space"></div>
        <div id="modelemision" class="modelemision">
            <div id="vid-box"></div>
            <div id="stream-info" hidden="true">
                <button id="end" onclick="end()" hidden="true">Done</button>
                <img src="../../images/person_dark.png"/>
                <span id="here-now">0</span>
            </div>
            <img src="../../images/model.png" class="offline imgoffline">
            <div class="w3-display-middle w3-large offline"><h1>Off Line</H1></div>
        </div>
    </div>
</div>
<div class="tabspanel">
    <div class="menutabs">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#bodychats">Chat</a></li>
          <li><a data-toggle="tab" href="#bodyusers">Users</a></li>
          <li><a data-toggle="tab" href="#bodyprivatechat">Private Chat</a></li>
          <li><a data-toggle="tab" href="#bodycolorusers">Chat Colors</a></li>
        </ul>
    </div>
    <div class="bodytabs tab-content">
        <div id="bodychats" class="bodychats tab-pane fade in active">
            a
        </div>
        <div id="bodyusers" class="bodyusers tab-pane fade">
            b
        </div>
        <div id="bodyprivatechat" class="bodyprivatechat tab-pane fade">
            c
        </div>
        <div id="bodycolorusers" class="bodycolorusers tab-pane fade">
            <span class="chatred">Red: </span>Model<br>
            <span class="chatorange">Orange: </span>1 a 50 tips<br>
            <span class="chatpruple">Purple: </span>50 a 250 tips<br>
            <span class="chatgreen">Green: </span>251 a 1000 tips<br>
            <span class="chatblue">Blue: </span>1001 tips or more<br>
            <span class="chatgray">Gray: </span>Users with 0 tips
        </div>
    </div>
</div>
<div class="rowchatmodel">
    <div class="col-md-12 no-padd">
        <div class="startstreaming"><button class="private_show_emision_model">Start Private Show</button></div>
        <div class="inputchat">
            <form>
                <textarea class="emojis-wysiwyg"></textarea>
            </form>
            <button class="signup-button send_model">Send</button></div>
    </div>
</div>
<div class="w3-display-container hide">
    <form><textarea rows="5" class="emojis-wysiwyg"></textarea></form>
    <img src="../../packs/basic/smile.png" id="smile" class="w3-display-right">
    <button class="signup-button w3-display-right">Send</button>
</div>

<script>
    // var $wysiwyg = $('.emojis-wysiwyg').emojiarea({wysiwyg: true});
    // $('textarea').emojiarea({button: '#smile'});
    // 		$wysiwyg.on('change', function() {
    // 			$wysiwyg_value.text($(this).val());
    // 		});
    // 		$wysiwyg.trigger('change');
</script>
<script type="text/javascript">
    //$( document ).ready(function() {
    console.log( "ready!" );
    $("#header-menu").hide();
    var video_out  = document.getElementById("vid-box");
    var embed_code = document.getElementById("embed-code");
    var embed_demo = document.getElementById("embed-demo");
    var here_now   = document.getElementById('here-now');
    var stream_info= document.getElementById('stream-info');
    var end_stream = document.getElementById('end');

    var streamName;

    function stream(model) {
        streamName = model;//form.streamname.value || Math.floor(Math.random()*100)+'';
        var phone = window.phone = PHONE({
            number        : streamName, // listen on username line else random
            publish_key   : 'pub-c-5ca32e2d-79bb-486c-913e-ea3d45a4a89d', // Your Pub Key
            subscribe_key : 'sub-c-c572189a-b303-11e9-a469-36ba0d0c6e6b', // Your Sub Key
            oneway        : true,
            broadcast     : true,
        });
        //phone.debug(function(m){ console.log(m); })
        var ctrl = window.ctrl = CONTROLLER(phone);
        ctrl.ready(function(){
            //form.streamname.style.background="#55ff5b";
            //form.streamname.value = phone.number();
            //form.stream_submit.hidden="true";
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
        $(".offline").hide();
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
            headers: {"X-HTTP-Method-Override": "PUT","Access-Control-Allow-Headers": "*"},
            data: {
                room: 'default',
                application: 'test',
                ident: 'seienshi',
                secret: '9778485e-677e-11e9-b2cd-0242ac110003',
                secure: 1,
            },
            success: function(res) {
                console.log('servidores obtnidos: ' +res);
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
            alert("WebRTC is currently only supported by Chrome, Opera, and Firefox");
            return false;
        }
    }

    $( document ).ready(function() {
        alert("iniciando straming");
        stream("<?php echo $model ?>");
    });
</script>
<div class="w3-hide-small w3-hide-medium">
    <?
    include("_models.footer.php");
    ?>
</div>
</body>
</html>
