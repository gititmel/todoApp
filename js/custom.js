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

			$("#todoForm").submit();
	});

});