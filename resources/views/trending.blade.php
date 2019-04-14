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
	
    	<table class='table'>
    	<thead> 
    	   <tr>
    	       <td>
    	           <b>Videos</b>
    	       </td>
    	       <td hidden>
    	           <b>Id</b>
    	       </td>
    	       <td>
    	           <b>Total Hits</b>
    	       </td>
    	       <td>
    	           <b>Rate</b>
    	       </td>
    	   </tr>
    	
    	</thead>
    	    
    	    <tbody>
    	    @if (count($videos)>0)
			@foreach ($videos as $video)
    	       <tr>
    	           <td>
    	               <video class='videoShow' controls>
  			                       <source src='{{$video->url}}' type={{$video->video_type}}>
  		                    </video>
    	           </td>
    	           <td hidden>
    	               <div class='idVideo'>
    	                   {{$video->id}}
    	               </div>
                   </td>
    	           <td>
    	              {{$video->total_rate}}
                   </td>
    	           
    	           <td class='rateShowing'>
    	               @include ('inc.var_html_rate')
    	           </td>
    	       </tr>
    	    @endforeach
    	    @endif   
    	    </tbody>
    	
		
        </table>

	
	
	 
<script src="js/videosController.js"></script>	
</body>


</html>

