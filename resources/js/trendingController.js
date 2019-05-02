$('[type=radio]').change(function() {
			/* find id */
			var id = $(this).parent().parent().parent().parent().find(".idVideo").html();
			console.log(id);
			
			
			
			
			

					var params = {id:id ,rate:this.value};
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					request = $.ajax({
						url: "insertVideoRate",
						type: "post",
						data: params
					});

					// Callback handler that will be called on success
					request.done(function (response, textStatus, jqXHR){
						// Log a message to the console
						console.log(response);
						console.log(textStatus);
    			      	
    	    			//push array
    	    			
    	    			$('#status').css('visibility','visible');
    					$('#status').html(response);
                        window.scrollTo(0,0);
					});

					request.fail(function (jqXHR, textStatus, errorThrown){
							// Log the error to the console
							console.error(
							"The following error occurred: "+
							textStatus, errorThrown
        					);
    				});


			
		  	
		});