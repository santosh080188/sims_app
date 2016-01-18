<!DOCTYPE html>
<html>
    <head>
        <title>Smart IMS Quotation Application - Registration</title>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css" />
    </head>

    <body>

        <div class="blue-box login">
            <div class="logo"><a href="#"><img src="images/logo.png" width="253" height="65" alt=""></a></div>
            <div class="login-box">
                <form method="post"  id="regis-form"  name="registrationForm" action="<?php echo site_url(); ?>/registration/register"> 
                    <h1>Registration</h1>
                    <ul class="form-login">
                        <li>
                            <!--<div class="dym-txt">All fields are mandatory</div>-->
                            <div class="defl-txt">All fields are mandatory</div>
                            <p id="reg-emailerror" class="help-block"></p>
                            <p id="reg-passworderror" class="help-block"></p>
                            <input id="reg-email" type="email" name="email" class="form-control"  placeholder="Email" required>
                        </li>
                        <li><input id="reg-firstname" type="text" name="name" class="form-control" placeholder="First Name" required></li>
                        <li><input id="reg-lastname" type="text" name="nameLast" class="form-control"  placeholder="Last Name" required></li>
                        <li><input id="reg-password" type="Password" name="password" class="form-control" placeholder="Password" required></li>
                        <li><input id="reg-confirm-password" type="Password" name="confirmPassword" class="form-control"  placeholder="Confirm Password" required></li>
                        <li>
                            <a href="<?php echo site_url(); ?>"><button type="button" class="btn btn-primary">Cancel</button></a>
                            <input type="submit" class="btn btn-primary" value="Signup">
                        </li>
                    </ul>
                </form>
            </div>
            <div class="footer">© 2015 SIMS Quotation Application. All rights reserved.</div>
        </div>

    </body>
    <script>
    //email validation in registration form
    $("#regis-form").submit(function (e) {
        var path = "http://localhost/sims_app/";
        var $email = $('#reg-email').val();
        var $firstname = $('#reg-firstname').val();
        var $lastname = $('#reg-lastname').val();
        var $pass = $('#reg-password').val();
        var $conpass = $('#reg-confirm-password').val();
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: path + "registration/emailvalidation/",
            data: {firstname: $firstname, lastname: $lastname, password: $pass, conpassword: $conpass, email: $email,},
            success: function (resp) {
                $("#reg-emailerror, #reg-passworderror").html("");
                var resultcount = jQuery.parseJSON(resp);
                var flag = 1;
                if (resultcount.temail == 0 && resultcount.password == 0) {
                    $("#regis-form").unbind("submit");
                    $("#regis-form").submit();
                }
                else if (resultcount.temail == 1) {
                    $("#reg-emailerror").html("<p>email already exists</p>");
                    flag = 0;
                }
                if (resultcount.password == 1) {
                    $("#reg-passworderror").html("<p>Passwords doesn't match</p>");
                    flag = 0;
                }
                if (flag) {
                    return false;
                }
            }

        });

    });
    </script>
</html>