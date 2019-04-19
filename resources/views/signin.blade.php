<link rel="stylesheet"  href="css/app.css"/>
<link rel="stylesheet"  href="css/signin.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<html>

<head>
</head>

<body>

<div class="signinForm">
@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
@endif

@foreach($errors->all() as $message)
        <div class="alert alert-danger">{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/login')) }}

    
   
 
	<div class="form-group">
    {{-- Username field. ------------------------}}
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username', null, ['class' => 'form-control']) }}
	</div>
	
	
	<div class="form-group">
    {{-- Password field. ------------------------}}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
	</div>
	
	<div class="form-group">
    {{-- Form submit button. --------------------}}
    {{ Form::submit('Sign In', ['class' => 'btn btn-success btn-signin']) }}
	</div>
	
{{ Form::close() }}
</div>
</body>

</html>