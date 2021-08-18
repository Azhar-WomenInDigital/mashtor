@extends('frontend.layouts.master')
@section('front-page-title',' | About ')
@section('frontend-style')

@endsection


@section('frontend-content')
<br>
<br>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center pb-4">Mashtor Login Process</h3>
            <iframe width="100%" height="450" src="https://www.youtube.com/embed/s5p0xKlMr9g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <!--<div class="row">
        <div class="col-md-12">
            <video width="100%" height="" autoplay muted controls id="vid">
                <source src="{{url('frontend/Demo_1.mp4')}}" type="video/mp4">
                <source src="{{url('frontend/Demo_1.mp4')}}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>
        
        
    </div>-->
</div>

@section('frontend-scripts')
<script>
    document.getElementById('vid').play();
</script>
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