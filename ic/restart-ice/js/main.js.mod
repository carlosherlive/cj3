/*
 *  Copyright (c) 2015 The WebRTC project authors. All Rights Reserved.
 *
 *  Use of this source code is governed by a BSD-style license
 *  that can be found in the LICENSE file in the root of the source
 *  tree.
 */
//hola
'use strict';

const startButton = document.getElementById('startButton');
const callButton = document.getElementById('callButton');
const callButton2 = document.getElementById('callButton2');
const restartButton = document.getElementById('restartButton');
const hangupButton = document.getElementById('hangupButton');
callButton.disabled = false;
hangupButton.disabled = true;
restartButton.disabled = true;
startButton.onclick = start;
callButton.onclick = call;
callButton2.onclick = call2;
hangupButton.onclick = hangup;
restartButton.onclick = restart;

let startTime;
const localVideo = document.getElementById('localVideo');
const remoteVideo = document.getElementById('remoteVideo');

localVideo.addEventListener('loadedmetadata', function() {
  console.log(`Local video videoWidth: ${this.videoWidth}px,  videoHeight: ${this.videoHeight}px`);
});

remoteVideo.addEventListener('loadedmetadata', function() {
  console.log(`Remote video videoWidth: ${this.videoWidth}px,  videoHeight: ${this.videoHeight}px`);
});

remoteVideo.onresize = () => {
  console.log(`Remote video size changed to ${remoteVideo.videoWidth}x${remoteVideo.videoHeight}`);
  // We'll use the first onsize callback as an indication that video has started
  // playing out.
  if (startTime) {
    const elapsedTime = window.performance.now() - startTime;
    console.log('Setup time: ' + elapsedTime.toFixed(3) + 'ms');
    startTime = null;
    // Have run these functions again in order to get the getStats() reports
    // with type candidatePair and populate the candidate id
    // elements.
    checkStats(pc1);
    checkStats(pc2);
  }
};

let localStream;
let pc1;
let pc2;
const offerOptions = {
  offerToReceiveAudio: 1,
  offerToReceiveVideo: 1
};

function getName(pc) {
  return (pc === pc1) ? 'pc1' : 'pc2';
}

function getOtherPc(pc) {
  return (pc === pc1) ? pc2 : pc1;
}

function gotStream(stream) {
  console.log('Received local stream');
  localVideo.srcObject = stream;
  localStream = stream;
  callButton.disabled = false;
}

function start() {
  console.log('Requesting local stream');
  startButton.disabled = true;
  navigator.mediaDevices
    .getUserMedia({
      audio: true,
      video: true
    })
    .then(gotStream)
    .catch(e => alert(`getUserMedia() error: ${e.name}`));
}

// Simulate an ice restart.
function restart() {
  restartButton.disabled = true;
  offerOptions.iceRestart = true;
  console.log('pc1 createOffer restart');
  pc1.createOffer(offerOptions).then(onCreateOfferSuccess, onCreateSessionDescriptionError);
}

function call() {
  callButton.disabled = true;
  hangupButton.disabled = false;
  console.log('Starting calls');
  const audioTracks = window.localStream.getAudioTracks();
  const videoTracks = window.localStream.getVideoTracks();
  if (audioTracks.length > 0) {
    console.log(`Using audio device: ${audioTracks[0].label}`);
  }
  if (videoTracks.length > 0) {
    console.log(`Using video device: ${videoTracks[0].label}`);
  }
  // Create an RTCPeerConnection via the polyfill.
  const servers = 'stun:stun.l.google.com:19302';
  pc1Local = new RTCPeerConnection(servers);
  pc1Remote = new RTCPeerConnection(servers);
  pc1Remote.ontrack = gotRemoteStream1;
  pc1Local.onicecandidate = iceCallback1Local;
  pc1Remote.onicecandidate = iceCallback1Remote;
  console.log('pc1: created local and remote peer connection objects');

  //pc2Local = new RTCPeerConnection(servers);
  //pc2Remote = new RTCPeerConnection(servers);
  //pc2Remote.ontrack = gotRemoteStream2;
  //pc2Local.onicecandidate = iceCallback2Local;
  //pc2Remote.onicecandidate = iceCallback2Remote;
  //console.log('pc2: created local and remote peer connection objects');

  window.localStream.getTracks().forEach(track => pc1Local.addTrack(track, window.localStream));
  console.log('Adding local stream to pc1Local');
  pc1Local
    .createOffer(offerOptions)
    .then(gotDescription1Local, onCreateSessionDescriptionError);

  //window.localStream.getTracks().forEach(track => pc2Local.addTrack(track, window.localStream));
  //console.log('Adding local stream to pc2Local');
  //pc2Local.createOffer(offerOptions)
  //  .then(gotDescription2Local, onCreateSessionDescriptionError);
}
function call2() {
  callButton.disabled = true;
  hangupButton.disabled = false;
  console.log('Starting calls');
  //const audioTracks = window.localStream.getAudioTracks();
  //const videoTracks = window.localStream.getVideoTracks();
  //if (audioTracks.length > 0) {
  //  console.log(`Using audio device: ${audioTracks[0].label}`);
  //}
  //if (videoTracks.length > 0) {
  //  console.log(`Using video device: ${videoTracks[0].label}`);
  //}
  // Create an RTCPeerConnection via the polyfill.
  const servers = 'stun:stun.l.google.com:19302';
  //pc1Local = new RTCPeerConnection(servers);
  //pc1Remote = new RTCPeerConnection(servers);
  //pc1Remote.ontrack = gotRemoteStream1;
  //pc1Local.onicecandidate = iceCallback1Local;
  //pc1Remote.onicecandidate = iceCallback1Remote;
  //console.log('pc1: created local and remote peer connection objects');

  pc2Local = new RTCPeerConnection(servers);
  pc2Remote = new RTCPeerConnection(servers);
  pc2Remote.ontrack = gotRemoteStream2;
  pc2Local.onicecandidate = iceCallback2Local;
  pc2Remote.onicecandidate = iceCallback2Remote;
  console.log('pc2: created local and remote peer connection objects');

  //window.localStream.getTracks().forEach(track => pc1Local.addTrack(track, window.localStream));
  //console.log('Adding local stream to pc1Local');
  //pc1Local
  //  .createOffer(offerOptions)
  //  .then(gotDescription1Local, onCreateSessionDescriptionError);

  window.localStream.getTracks().forEach(track => pc2Local.addTrack(track, window.localStream));
  console.log('Adding local stream to pc2Local');
  pc2Local.createOffer(offerOptions)
    .then(gotDescription2Local, onCreateSessionDescriptionError);
}
function onCreateSessionDescriptionError(error) {
  console.log(`Failed to create session description: ${error.toString()}`);
}

function onCreateOfferSuccess(desc) {
  console.log(`Offer from pc1\n${desc.sdp}`);
  console.log('pc1 setLocalDescription start');
  pc1.setLocalDescription(desc).then(() => onSetLocalSuccess(pc1), onSetSessionDescriptionError);
  console.log('pc2 setRemoteDescription start');
  pc2.setRemoteDescription(desc).then(() => onSetRemoteSuccess(pc2), onSetSessionDescriptionError);
  console.log('pc2 createAnswer start');
  // Since the 'remote' side has no media stream we need
  // to pass in the right constraints in order for it to
  // accept the incoming offer of audio and video.
  pc2.createAnswer().then(onCreateAnswerSuccess, onCreateSessionDescriptionError);
}

function onSetLocalSuccess(pc) {
  console.log(`${getName(pc)} setLocalDescription complete`);
}

function onSetRemoteSuccess(pc) {
  console.log(`${getName(pc)} setRemoteDescription complete`);
}

function onSetSessionDescriptionError(error) {
  console.log(`Failed to set session description: ${error.toString()}`);
}

function gotRemoteStream(e) {
  if (remoteVideo.srcObject !== e.streams[0]) {
    remoteVideo.srcObject = e.streams[0];
    console.log('pc2 received remote stream');
  }
}

function onCreateAnswerSuccess(desc) {
  console.log(`Answer from pc2:\n${desc.sdp}`);
  console.log('pc2 setLocalDescription start');
  pc2.setLocalDescription(desc).then(() => onSetLocalSuccess(pc2), onSetSessionDescriptionError);
  console.log('pc1 setRemoteDescription start');
  pc1.setRemoteDescription(desc).then(() => onSetRemoteSuccess(pc1), onSetSessionDescriptionError);
}

function onIceCandidate(pc, event) {
  getOtherPc(pc)
    .addIceCandidate(event.candidate)
    .then(() => onAddIceCandidateSuccess(pc), err => onAddIceCandidateError(pc, err));
  console.log(`${getName(pc)} ICE candidate:\n${event.candidate ? event.candidate.candidate : '(null)'}`);
}

function onAddIceCandidateSuccess(pc) {
  console.log(`${getName(pc)} addIceCandidate success`);
}

function onAddIceCandidateError(pc, error) {
  console.log(`${getName(pc)} failed to add ICE Candidate: ${error.toString()}`);
}

function onIceStateChange(pc, event) {
  if (pc) {
    console.log(`${getName(pc)} ICE state: ${pc.iceConnectionState}`);
    console.log('ICE state change event: ', event);
    // TODO: get rid of this in favor of http://w3c.github.io/webrtc-pc/#widl-RTCIceTransport-onselectedcandidatepairchange
    if (pc.iceConnectionState === 'connected' ||
      pc.iceConnectionState === 'completed') {
      checkStats(pc);
    }
  }
}

function checkStats(pc) {
  pc.getStats(null).then(results => {
    // figure out the peer's ip
    let activeCandidatePair = null;
    let remoteCandidate = null;

    // Search for the candidate pair, spec-way first.
    results.forEach(report => {
      if (report.type === 'transport') {
        activeCandidatePair = results.get(report.selectedCandidatePairId);
      }
    });
    // Fallback for Firefox.
    if (!activeCandidatePair) {
      results.forEach(report => {
        if (report.type === 'candidate-pair' && report.state === 'succeeded' && report.selected) {
          activeCandidatePair = report;
        }
      });
    }
    if (activeCandidatePair && activeCandidatePair.remoteCandidateId) {
      results.forEach(report => {
        if (report.type === 'remote-candidate' && report.id === activeCandidatePair.remoteCandidateId) {
          remoteCandidate = report;
        }
      });
    }
    console.log(remoteCandidate);
    if (remoteCandidate && remoteCandidate.id) {
      // TODO: update a div showing the remote ip/port?
      document.getElementById(pc === pc1 ? 'localCandidateId' : 'remoteCandidateId').textContent = remoteCandidate.id;
    }
  });
}

function hangup() {
  console.log('Ending call');
  pc1.close();
  pc2.close();
  pc1 = null;
  pc2 = null;
  hangupButton.disabled = true;
  restartButton.disabled = true;
  callButton.disabled = false;
}
