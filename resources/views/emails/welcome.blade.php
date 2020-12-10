<!DOCTYPE html>
<html>
<head>
    <title>Varify Code</title>
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="logo">
			<img src="{{url('frontend/assets/imgs/Orange-logo.png')}}" alt="">
		</div>
		<h2>Welcome to the Orange Tutoring {{$user['name']}}</h2>
<br/>
<h1>{{$user['code']}}</h1>

Your registered email-id is {{$user['email']}}
	</div>

</body>

</html>