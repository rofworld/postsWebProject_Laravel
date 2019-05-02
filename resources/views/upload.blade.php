  
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet"  href="css/app.css"/>
	<link rel="stylesheet"  href="css/upload.css"/> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--  <script src="http://malsup.github.com/jquery.form.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
@include('inc.navbar')
<body>

	
    
	
    
	
	<!--  <div class="row">
		
		
		<button type="button" id="fileUploadButton" class="btn btn-primary">...</button>
    
    	<textarea class="form-control" rows="1" id="filePath" maxlength="200" disabled></textarea>
    	
    	<button type="button" id="addButton" class="btn btn-primary">Add Video</button>
    	
    	<input type="file" id="videoFile" style="display:none">
    	
    	
	
	</div> -->
<div class="uploadForm">
	
	<div id="status"></div>
	<div id="validation-errors"></div>
	
	
	
	{{ Form::open(array('url' => '/insertVideo', 'files' => true)) }}


	<div class="form-group">
    {{-- Title field. ------------------------}}
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
	</div>
	
	<div class="form-group">
    	
    	
       <button type="button" id="fileUploadButton" class="btn-primary form-control">Choose file</button>
    </div>
    <div class="form-group">
       <label  id="filePath" class="form-control"></label>
       <input type="file" id="videoFile" name="videoFile" hidden>
	</div>
	
	<div class="form-group">
		<div class="progress">
                        <div class="bar"></div >
                        <div class="percent">0%</div >
        </div>
	</div>
	
	<div class="form-group">
    {{-- Form submit button. --------------------}}
    {{ Form::submit('Upload', ['class' => 'btn btn-primary btn-upload']) }}
	</div>
	
	{{ Form::close() }}
	
</div>
	 
<script src="js/uploadController.js"></script>	
</body>


</html>