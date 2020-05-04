$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML="";
    var field2 = "<div class=\"form-group\"><label class=\"col-sm-12\">Select Participant";

    var xhr= new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/betting/frontend/admin/select_horses2.php', true);
    xhr.onreadystatechange= function() {
        if (this.readyState!==4) return;
        if (this.status!==200) return; // or whatever error handling you want
        fieldHTML = this.responseText;
        };
xhr.send();

   var fieldbuttonHTML = "<a href=\"javascript:void(0);\" class=\"remove_button fa fa-trash-o\"></a></div>"; //New input field html 
   
   var x = 1; //Initial field counter is 1
    /*
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML);
            $(wrapper).append(fieldbuttonHTML); //Add field html
        }
    }); */



    $(addButton).click(function() {
        if(x < maxField){
            x++; 
        $('<div/>').append($(field2  + fieldHTML))
        .insertBefore( this );
        }
    });
/*
    $('.select_race').click( function(){
        var h_size = 3;
        var select_race_id = $('#select_race')[0].val();
       /* var xhr= new XMLHttpRequest();
        xhr.open('GET', 'http://localhost/betting/frontend/admin/no_horses.php?raceid='+ select_race_id, true);
        xhr.onreadystatechange= function() {
            if (this.readyState!==4) return;
            if (this.status!==200) return; // or whatever error handling you want
            h_size = this.responseText;
            };
        xhr.send();
            alert("xd");




        var result_wrapper = $('.result_wrapper');
        $(result_wrapper).empty();
        for(i=0;i<h_size;i++){
        $(result_wrapper).append($(field2  + (i+1) + fieldHTML));
        }

    });
*/
    $('#select_race select').on('click', function(){
        var select_race_id = $(this).val();

        var h_size = 3;
       var xhr= new XMLHttpRequest();
        xhr.open('GET', 'http://localhost/betting/frontend/admin/no_horses.php?raceid='+ select_race_id, true);
        xhr.onreadystatechange= function() {
            if (this.readyState!==4) return;
            if (this.status!==200) return; // or whatever error handling you want
            h_size = this.responseText;
            };
        xhr.send();
        if(h_size==""){h_size=0;}





        var result_wrapper = $('.result_wrapper');
        $(result_wrapper).empty();
        for(i=0;i<h_size;i++){
        $(result_wrapper).append($(field2  + (i+1) + fieldHTML));
        }

    });

/*
    //Once Race button is changed
    var result = $('.result-add-form');
    $('form').on('change', '#select_race', function(e){
        var h_size = 3;
        var select_race_id = $('#select_race').val();
       /* var xhr= new XMLHttpRequest();
        xhr.open('GET', 'http://localhost/betting/frontend/admin/no_horses.php?raceid='+ select_race_id, true);
        xhr.onreadystatechange= function() {
            if (this.readyState!==4) return;
            if (this.status!==200) return; // or whatever error handling you want
            h_size = this.responseText;
            };
        xhr.send();





        var result_wrapper = $('.result_wrapper');
        $(result_wrapper).empty();
        for(i=0;i<h_size;i++){
        $(result_wrapper).append($(field2  + (i+1) + fieldHTML));
        }
        


    });*/

});