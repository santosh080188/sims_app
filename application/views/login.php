<!DOCTYPE html>
<html>
    <head>
        <title>Smart IMS Quotation Application - Login</title>

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

        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/responsive.css" />
    </head>

    <body>

        <div class="blue-box login">
            <div class="logo"><a href="#"><img src="<?php echo $this->config->site_url() ?>assets/images/logo.png" width="253" height="65" alt=""></a></div>
            <div class="login-box">
                <form method="post"  id="loginForm" name="loginForm" action="<?php echo site_url(); ?>/login/signin"> 
                    <h1>Login</h1>
                    <p id="error_login" class="help-block"></p>
                    <ul class="form-login">
                        <li><input id="email_login" type="email" name="loginemail" class="form-control"  placeholder="Email id" required></li>
                        <li><input id="password_login" type="Password" name="password" class="form-control"  placeholder="Password" required></li>
                        <li>New User <a href="<?php echo base_url(); ?>registration">Signup</a> <input type="submit" class="btn btn-primary" value="Login"></li>
                    </ul>
                </form>
            </div>
            <div class="footer">© 2015 SIMS Quotation Application. All rights reserved.</div>
        </div>

    </body>
    <script>
    // login validation
    $("#loginForm").submit(function (e) {
        var path = "http://localhost/sims_app/";
        var $password = $('#password_login').val();
        var $email = $('#email_login').val();
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: path + "login/signin/",
            data: {email: $email, password: $password},
            success: function (resp) {
                $("#error_login").html("");
                var rowcount = jQuery.parseJSON(resp);
                var flag = 0;
                if (rowcount.temail === 1 && rowcount.tpassword === 1) {
                    window.location.replace("http://localhost/sims_app/dashboard");
                }
                else if (rowcount.tuser === 0 || rowcount.tpassword === 0) {
                    $("#error_login").html("<p>username/password Missmatch</p>");
                    flag = 1;
                }
                if (flag) {
                    return false;
                }
            }

        });

    });
    </script>
</html>