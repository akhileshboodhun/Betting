
// magic.js
$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {
        var $form = $(this);
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = $form.serialize();
        var method = $form.attr('method');
        var backend_url = $form.attr('action');

        // process the form
        $.ajax({
            type        : method, // define the type of HTTP verb we want to use (POST for our form)
            url         : backend_url, // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see
                console.log(data);

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        $($form).closest(".modal:visible").modal('toggle');
        $(".resetfield").val("");
        for(var i=0;i<10;i++){
            $(".remove_button").click(); 
        }
    });

});