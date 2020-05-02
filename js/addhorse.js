$(".horse-add-form").submit(function(event){
	event.preventDefault(); //prevent default action 
	var post_url = "http://localhost/betting/backend/admin/addhorse.php"; //get form action url
	var request_method = $(this).attr("method"); //get form GET/POST method
	var form_data = $(this).serialize(); //Encode form elements for submission
	
	$.ajax({
		url : post_url,
        type: request_method,
        cache: false,
		data : form_data
	}).done(function(response){ //
	});
});