$(document).ready(function(){
	console.log("JS ready!");

	$("#taskInput").focus(); //sets blinking cursor on field

	var task = "";

	$("#actionBtn").click(function(){
		console.log("clicked");

			task = $("#taskInput").val();
			//pre clean up (not stripped)

			// alert(task); test to confirm value from text field is selected

			task = cleanUp(task);
			//cleank up function strips characters to HTML entities

			//alert(task);

			if( task != ""){
				$("#todoForm").submit();
			}else{
				alert("enter task")
			}

			
	});

	$(".taskActions span").click( function(){
		console.log("test click")
		console.log( $(this) );
		console.log( $(this).attr("class") );

		var actionType 	= $(this).attr("class");
		var taskID 	 	= $(this).parent().parent().parent().parent().parent().attr("id");

		console.log(taskID)

		if( actionType == "fa fa-trash"){
			console.log( "Clicked Trash" );
			 var userconfirm = confirm("you sure?");
				 console.log(userconfirm);
				 
				if(userconfirm){

					$.post( "processData.php", { actionType: "delete", taskID: taskID}).done(function(data){
				 	data = JSON.parse(data);
					$("#"+data.taskID).hide();
					console.log(taskID+"!!!");
					console.log(data.taskID+"!!!");
					});
				 }
				// console.log( JSON.parse(data) );

			
				
			

		}else if( actionType == "fa fa-check"){
			console.log("clicked Check");

			$.post( "processData.php", { actionType: "update", taskID: taskID, taskStatus: 1 }).done(function( data ) {
    		 data = JSON.parse(data);
				    console.log( data.status );
				    console.log( data.taskID )

				    if( data.status == "update complete"){
				    	$("#"+data.taskID).css("background", "green")
				    }


				  });
		}



	})


});