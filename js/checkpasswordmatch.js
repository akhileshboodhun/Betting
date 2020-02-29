var check = function() {
    $("#reg_pass, #reg_pass_confirm").on("keyup", function() {
        if ($("#reg_pass").val() == $("#reg_pass_confirm").val()) {
            if ($("#reg_pass").val() == "") {
                $("#password_match_msg").hide();
            } else {
                $("#password_match_msg")
                    .html("Passwords Match!") //TO DOWNLOAD A TICK ICON
                    .css("color", "green");
            }

        } else
            $("#password_match_msg")
            .html("Passwords does not match!!!") //TO DOWNLOAD A CROSS ICON
            .css("color", "red");
    });
};

//THE CODE BELOW IS THE EQUIVALENT IN JAVASCRIPT...THE ABOVE IS IN JQUERY
/*
var check = function() {
  if (
    document.getElementById("reg_pass").value ==
    document.getElementById("reg_pass_confirm").value
  ) {
    document.getElementById("password_match_msg").style.color = "green";
    document.getElementById("password_match_msg").innerHTML =
      "Passwords Match!";
  } else {
    document.getElementById("password_match_msg").style.color = "red";
    document.getElementById("password_match_msg").innerHTML =
      "Passwords does not match!!! matching";
  }
};
*/