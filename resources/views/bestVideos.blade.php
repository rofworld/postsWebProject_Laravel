<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet"  href="css/app.css"/>
<link rel="stylesheet"  href="css/styleVideos.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<html>

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
@include('inc.navbar')
<body>

	<div class="searchForm">
    		{{ Form::open(array('url' => '/searchTop')) }}
    		
    		<div class="form-group">
    		{{-- search text field. ------------------------}}
        	{{ Form::text('searchText',null,['class' => 'searchText']) }}
    		
    		{{-- Form submit button. --------------------}}
        	{{ Form::submit('Search', ['class' => 'btn btn-primary btn-search']) }}
        	</div>
        	
        	
        	{{ Form::close() }}
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
                </tr>
            </thead>
            <tbody>
            @if (count($best_videos)>0)
				@foreach ($best_videos as $best_video)
					
						<tr>
                    		<td>
                    		<div id="videoInfo">
        	           	   		<div class="row">
        	           	   		<label>Title: {{$best_video->title}}</label>
        	           	   		</div>
        	           	   		<div class="row">
        	           	   		<label>User: {{$best_video->user}}</label>
        	           	   		</div>
        	           		</div>
                    			<div class="row">
                        		<video class='videoShow' controls>
  			                       <source src='{{$best_video->url}}' type='{{$best_video->video_type}}'>
  		                    	</video>
  		                    	</div>
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

<div class="pagination">
	
	{{ $best_videos->links() }}
</div>	

</body>
</html>