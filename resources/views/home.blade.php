<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet"  href="css/app.css"/>
<link rel="stylesheet"  href="css/styleHome.css"/> 


    
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@include('inc.navbar')
<body>

	
    	
    	
    	
		<div class="row">
		
			<img src="images\logo3.png" id="logo"></img>
			
		</div>
        	
		
    	<div class="container">
    	<div class="row">
    		<div class="col-xs-1 col-sm-1 col-lg-1"></div>
        	<div class="col-xs-5 col-sm-5 col-lg-5">
        		<h2>Trending</h2>
            	<p class="trending">
            	This website is about videos. You can upload videos to the trending category about adventures, sports, humor etc...
            	The website automically generates the top 100 list. Trending videos remain in the server for 2 weeks and are deleted after this period.
            	Most voted videos are moved to the top 100 list. I hope you enjoy the videos stored in the website and you upload good ones!
            	
            	</p>
       		</div>
       		<div class="col-xs-1 col-sm-1 col-lg-1"></div>
       		<div class="col-xs-5 col-sm-5 col-lg-5">
        		<h2>Top 100</h2>
            	<p class="top100">
            	Here we find the list with the top 100 videos of this webpage.
            	I hope you endjoy the videos in this section. 
            	
            	</p>
       		</div>
		</div>
		</div>
	
	
	 
<script src="js/videosController.js"></script>	
</body>


</html>

