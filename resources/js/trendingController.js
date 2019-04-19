$('[type=radio]').change(function() {
			/* find id */
			var id = $(this).parent().parent().parent().parent().find(".idVideo").html();
			console.log(id);
			
			var votedIDS = "[]";
			//Examine wether SessionStorage is set
			if (localStorage.getItem('votedIDS')!=null){
    			
    			var votedIDS = localStorage.getItem('votedIDS');
			}

			console.log("This are the already voted IDS:")
			console.log(votedIDS);

			var isVoted=false;
		
			votedIDS=JSON.parse(votedIDS);
			console.log("Recorriendo Array")
			//Examine if the post is already voted
			for (var x=0;x<votedIDS.length;x++){
				console.log(votedIDS[x]);
				if (votedIDS[x]==id){
			    	isVoted=true; 
				}
			}  
			console.log("is Voted = " + isVoted);
			
			if (isVoted==false){

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
    	    			votedIDS.push(id);
    	    			//Set SessionStorage
    	    			localStorage.setItem('votedIDS',JSON.stringify(votedIDS));
    	    			
    	    			location.reload();
					});

					request.fail(function (jqXHR, textStatus, errorThrown){
							// Log the error to the console
							console.error(
							"The following error occurred: "+
							textStatus, errorThrown
        					);
    				});


				
			}else{
				alert('You already voted for this id');
			}
		  	
		});