@extends('frontend.layouts.master')
@section('front-page-title',' | About ')
@section('frontend-style')

@endsection


@section('frontend-content')
<div class="container mt-5 mb-5">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('user/dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Class Room</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-md-6">
            <h1 class="text-warning wid-header-title wid-c-font-1"> Video Conference</h1>
            <br><br>
<p id="my-peer">Your Id : </p>
 <video id="localStream" width="300" controls></video>
        <br /><br />
        <video id="remoteStream" width="300" controls></video>
        <br /><br />
        <div class="d-flex">
            <input type="text" id="remoteId" placeholder="remote id" class="mr-2">
            <button class="btn btn-warning text-white" id="btnCall">Call</button>
        </div>

</div>
        
        <div class="col-md-6">
            

            <iframe src="{{url('iframe')}}" style="width: 100%;height: 500px;"></iframe>

        </div>
    </div>
</div>
@section('frontend-scripts')
<script src="https://cdn.jsdelivr.net/npm/peerjs@0.3.20/dist/peer.min.js"></script>
<script>
	//const socket = io('http://localhost:3000');

</script>
<script>


function openStream() {
    const config = { audio: false, video: true };
    return navigator.mediaDevices.getUserMedia(config);
}

function playStream(idVideoTag, stream) {
    const video = document.getElementById(idVideoTag);
    video.srcObject = stream;
    video.play();
}

// openStream()
// .then(stream => playStream('localStream', stream));

const peer = new Peer({ key: 'lwjd5qra8257b9' });
peer.on('open', id=> $('#my-peer').append(id));

//Caller
$('#btnCall').click(() => {
    const id = $('#remoteId').val();
    openStream()
    .then(stream => {
        playStream('localStream', stream);
        const call = peer.call(id, stream);
        call.on('stream', remoteStream => playStream('remoteStream', remoteStream));
    });
});

//Callee
peer.on('call', call => {
    openStream()
    .then(stream => {
        call.answer(stream);
        playStream('localStream', stream);
        call.on('stream', remoteStream => playStream('remoteStream', remoteStream));
    });
});

</script>
@endsection


@endsection