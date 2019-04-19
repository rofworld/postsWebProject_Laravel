<link rel="stylesheet"  href="css/app.css"/>
<link rel="stylesheet"  href="css/upload.css"/> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@include('inc.navbar')
<body>

	
    <div class="alert alert-success" id="status" style="visibility:hidden;">
                
    </div>
	
    <div class="form">
	<div class="row">
		<h5>Upload your trending video here (mp4, ogv, webm) MAX: 120Mbytes</h5>
	</div>
	<div class="row">
		
		
		<button type="button" id="fileUploadButton" class="btn btn-primary">...</button>
    
    	<textarea class="form-control" rows="1" id="filePath" maxlength="200" disabled></textarea>
    	
    	<button type="button" id="addButton" class="btn btn-primary">Add Video</button>
    	
    	<input type="file" id="videoFile" style="display:none">
    	
    	
	
	</div> 
	</div>
	 
<script src="js/uploadController.js"></script>	
</body>


</html>