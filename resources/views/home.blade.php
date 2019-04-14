<link rel="stylesheet"  href="css/app.css"/>
<link rel="stylesheet"  href="css/styleVideos.css"/> 
<link rel="stylesheet" href="css/rating.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@include('inc.navbar')
<body>
<input type="file" id="videoFile" style="display:none">
	
	<div class="popup-overlay">
        <!--Creates the popup content-->
       	<div  class="popup-content">
          <h2>Uploading video...</h2>
          <div class="loader"></div>
        </div>
	</div>
	
    
    
    	<br>
    	<br>
    	<br>
    	<h1  style="text-align: center;">ThePostOfToday.com</h1>
    	<br>
    	<br>
    	<p>
    	This website is about videos. You can upload videos to the trending category about adventures, sports, humor etc...
    	The website automically generates the top 100 list. Trending videos remain in the server for 2 weeks.
    	Most voted videos are moved to the top 100 list. I hope you enjoy the videos stored in the website and you upload good ones!
    	
    	</p>
   

	
	
	 
<script src="js/videosController.js"></script>	
</body>


</html>

