$(document).ready(function() {

    $(".alert").hide();

    /**
     * submit signup form
     * validating field and serializing 
     */

    $("#signup-form").on("submit", function(e) {

        e.preventDefault();

        var signup_form = $("#signup-form");
        var user_fname = $("input[name=su-user_fname]").val();
        var user_lname = $("input[name=su-user_lname]").val();
        var user_contact = $("input[name=su-user_contact]").val();
        var user_email = $("input[name=su-user_mail]").val();
        var user_password = $("input[name=su-user_pass]").val();
        var user_rpassword = $("input[name=su-user_rpass]").val();

        var chk_contact = /^[0-9]{10}$/;
        var chk_password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
        // var chk_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9])+$/;
        var chk_email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (user_fname == "") {

            $(".alert").show().addClass("alert alert-warning");
            $(".alert").html("FirstName is required");
            $(".alert").fadeTo(3000, 500).slideUp(3000, function() {
                $(".alert").slideUp(3000);
            });

        } else if (user_lname == "") {

            $(".alert").show().addClass("alert alert-warning");
            $(".alert").html("LastName is required");
            $(".alert").fadeTo(3000, 500).slideUp(3000, function() {
                $(".alert").slideUp(3000);
            });

        } else if (user_contact == "") {

            $(".alert").show().addClass("alert alert-warning");
            $(".alert").html("Phone Number is required");
            $(".alert").fadeTo(3000, 500).slideUp(3000, function() {
                $(".alert").slideUp(3000);
            });

        } else if (!(chk_contact.test(user_contact))) {

            $(".alert").show().addClass("alert alert-warning");
            $(".alert").html("ONLY 10 DIGITS required");
            $(".alert").fadeTo(3000, 500).slideUp(3000, function() {
                $(".alert").slideUp(3000);
            });

        } else if (user_email == "") {

            $(".alert").show().addClass("alert alert-warning");
            $(".alert").html("Email Address is required");
            $(".alert").fadeTo(3000, 500).slideUp(3000, function() {
                $(".alert").slideUp(3000);
            });

        } else if (!(chk_email.test(user_email))) {

            $(".alert").show().addClass("alert alert-warning");
            $(".alert").html("Valid Email Address is required");
            $(".alert").fadeTo(3000, 500).slideUp(3000, function() {
                $(".alert").slideUp(3000);
            });

        } else if (user_password == "") {

            $(".alert").show().addClass("alert alert-warning");
            $(".alert").html("Password is required");
            $(".alert").fadeTo(3000, 500).slideUp(3000, function() {
                $(".alert").slideUp(3000);
            });

        } else if (user_rpassword != user_password) {

            $(".alert").show().addClass("alert alert-warning");
            $(".alert").html("Passwords do not match");
            $(".alert").fadeTo(3000, 500).slideUp(3000, function() {
                $(".alert").slideUp(3000);
            });

        } else if (!(chk_password.test(user_password))) {

            $(".alert").show().addClass("alert alert-warning");
            $(".alert").html("Password should contain between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character");
            $(".alert").fadeTo(3000, 500).slideUp(3000, function() {
                $(".alert").slideUp(3000);
            });

        } else {

            $.ajax({

                // url: "server_side_api.php",
                method: "POST",
                data: signup_form.serialize(),
                success: function(SignUp_Response) {

                    // SignUp_Response = JSON.parse(SignUp_Response);
                    console.log(SignUp_Response);

                }

            });

        }




    });

});