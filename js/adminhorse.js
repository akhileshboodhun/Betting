function adminrow() {

    $('#num_horses').change(function() {
        var n = $('#num_horses').val();
        for (var i = 1; i <= n; i++) {
            $('#adminform').append("<input type=\"text\" placeholder=\"Horse " + i + " Name\" name=\"horse" + i + "\" maxlength=\"100\"><br>");
        }

    });
}