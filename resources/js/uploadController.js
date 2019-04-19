
		
		$("#fileUploadButton").click(function() {
			$("#videoFile").click();
			
		});
		
        $('#videoFile').on('change', function () {
			if ($("#videoFile")[0].files.length>0){
    			var fileName = $("#videoFile")[0].files[0].name;
    			console.log(fileName);
			  	$("#filePath").val(fileName);
			}else{
				$("#filePath").val("");
			}
		});
	
		$("#addButton").click(function() {
			if ($("#videoFile")[0].files.length>0){
				var fileName = $("#videoFile")[0].files[0].name;
				console.log("fileName = " + $("#videoFile")[0].files[0].name + ". File Size = " + $("#videoFile")[0].files[0].size);
				if (isVideo(fileName)){
					//console.log("Is video");
    				if ($("#videoFile")[0].files[0].size < 120000000){
        				
							 
							  
								var fd = new FormData();
								fd.append("videoFile", $("#videoFile")[0].files[0]);
								
								$.ajaxSetup({
									headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									}
								});
								request = $.ajax({
									url: "insertVideo",
                                    type: "post",
                                    processData: false,
                                    contentType: false,
                                    cache:false,
									data: fd
									
								});

								// Callback handler that will be called on success
								request.done(function (response, textStatus, jqXHR){
                                    console.log(response);
                                    console.log(textStatus);
                                    $('#status').css('visibility','visible');
    								$('#status').html(response);
								});

								request.fail(function (jqXHR, textStatus, errorThrown){
										// Log the error to the console
										console.error(
										"The following error occurred: "+
										textStatus, errorThrown
										);
								});
		
        					
    				}else{
    					alert("The video size is over 120Mbytes")
    				}
				}else{
					alert("The file selected is not a valid video");
				}
				
    			

			}else{
    			alert("There is no file selected");
			}

			function getExtension(filename) {
			    var parts = filename.split('.');
			    return parts[parts.length - 1];
			}

			function isVideo(filename) {
			    var ext = getExtension(filename);
			    switch (ext.toLowerCase()) {
			    case 'mp4':
			    case 'ogv':
			    case 'webm':
			        // etc
			        return true;
			    }
			    return false;
			}
			function openDialog() {
                
				$(".popup-overlay, .popup-content").addClass("active");
                    
            }
            
            function closeDialog() {
            	$(".popup-overlay, .popup-content").removeClass("active");
            }
		});
  	
