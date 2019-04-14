<link rel="stylesheet"  href="css/app.css"/>
<link rel="stylesheet"  href="css/styleVideos.css"/>
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
<div class="row">
	<h1>Best Videos</h1>
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
                </tr>
            </thead>
            <tbody>
            @if (count($best_videos)>0)
				@foreach ($best_videos as $best_video)
					
						<tr>
                    		<td>
                        		<video class='videoShow' controls>
  			                       <source src='{{$best_video->url}}' type={{$best_video->video_type}}>
  		                    	</video>
                        	</td>
                            <td hidden>
                                 <div class='idVideo'>
                                   	{{$best_video->id}}
                                 </div>
                            </td>
                            <td>
                                {{$best_video->total_rate}}
                            </td>
                	</tr>
					
				@endforeach
			@endif
			</tbody>

</table>
</div>
<script src="js/videosController.js"></script>	
</body>
</html>