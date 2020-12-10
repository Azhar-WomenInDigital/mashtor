@extends('frontend.layouts.dashboard_mastering')
@section('franchise-dashboard-title',' Dashboard ')

<script>
	// On load:
var state = history.state || {};
var reloadCount = state.reloadCount || 0;
if (performance.navigation.type === 1) { // Reload
    state.reloadCount = ++reloadCount;
    history.replaceState(state, null, document.URL);
} else if (reloadCount) {
    delete state.reloadCount;
    reloadCount = 0;
    history.replaceState(state, null, document.URL);
    </script>
    <iframe src="{{url('audio/01.mp3')}}" allow="autoplay" id="audio" style="display:none"></iframe>
<audio id="audio" autoplay>
  <source src="helloworld.mp3">
</audio>
<script>
}
if (reloadCount >= 2) {
    // Now, do whatever you want...
    
}
</script>

@section('frontend-content')
<br><br>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6">
			<div class="dashboard-image">
				<img src="{{asset('frontend/assets/imgs/student_dashboard_math.png')}}" alt="">
			</div>
		</div>
		<div class="col-md-6">
			<h2>Connecting Tutors And Students Globally</h2>
			<form action="{{url('search')}}" method="post" role="search">
                
				@csrf
			<div class="input-group mb-3 mt-3">
				<input type="text" class="form-control" placeholder=" Entre a Subject , Tutor Name or TNR " name="search" id="search">

				<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
				</div>
				
			</div>
			</form>
			<div id="search-list"></div>
			<br>
			<div class="search-content">
				
				<span><b>Levels</b></span>
				@foreach($levels as $level)
				<a href="#" id="serchforClick"><span class="badge badge-pill badge-light">{{$level->level}}</span></a>
				@endforeach
				
				<br><br>
				<span><b>Trending</b></span>
				@foreach($subjects as $subject)
				<a href="#" id="serchforClick"><span class="badge badge-pill badge-light">{{$subject->subject}}</span></a>
				@endforeach
				
			</div>
		</div>
		
		
	</div>
	<br><br>
	<div class="row mt-5">
		<div class="col-md-6 offset-md-6">
			@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
			<div class="suggesion">
				<div class="card">
					<div class="card-header">
						Write us your valuable suggesion
					</div>
					<div class="card-body">
						<form action="{{url('student/dashboard')}}" method="post">
							@csrf
							<textarea name="suggesion" class="form-control" id="" cols="10" rows="5" required></textarea>
							<br>
							<input type="submit" class="btn btn-success custom-btn" value="Submit">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<br>
<br>
<!-- <audio  controls autoplay>
  <source src="horse.ogg" type="audio/ogg">
  <source src="{{url('audio/01.mp3')}}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
 -->
@section('frontend-scripts')
	<script>

		$(document).ready(function(){
			$('#search').keyup(function(){
				var query = $(this).val();
				if( query != ''){
					var _token = $('input[name="_token"]').val();
					$.ajax({
						url:"{{ route('autocomplete.fetch') }}",
						method:"POST",
						data:{query:query, _token:_token},
						success:function(data){
							$('#search-list').fadeIn();
							$('#search-list').html(data);
						}
					})
				}
			});
		});
		  $(document).on('click', '#serchforClick', function(){  
        $('#search').val($(this).text());  
        $('#search-list').fadeOut();  
    });  


		  function myFunction() {
  var x = document.getElementById("myAudio").autoplay;
  document.getElementById("demo").innerHTML = x;
}
	</script>
@endsection
@endsection