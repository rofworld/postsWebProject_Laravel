<link rel="stylesheet"  href="css/app.css"/>
<link rel="stylesheet"  href="css/registration.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<html>

<head>
</head>

<body>

<div class="registrationForm">
@foreach($errors->all() as $message)
        <div class="alert alert-danger">{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/registration')) }}

    
   
 
	<div class="form-group">
    {{-- Username field. ------------------------}}
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username', null, ['class' => 'form-control']) }}
	</div>
	
	<div class="form-group">
    {{-- Email address field. -------------------}}
    {{ Form::label('email', 'Email address') }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
	</div>
	
	<div class="form-group">
    {{-- Password field. ------------------------}}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
	</div>
	
	<div class="form-group">
    {{-- Password confirmation field. -----------}}
    {{ Form::label('password_confirmation', 'Password confirmation') }}
    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
	</div>
	
	<div class="form-group">
    {{-- Form submit button. --------------------}}
    {{ Form::submit('Register', ['class' => 'btn btn-primary btn-register']) }}
	</div>
	
{{ Form::close() }}
<button class="btn btn-success btn-register" onclick="window.location='{{ url("signin") }}'">Sign In</button>
</div>
</body>

</html>