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
	<form method="post" ng-app="myapp" ng-controller="mainController" name="userForm" ng-submit="submitForm()" novalidate> 
		<h1>Registration</h1>
		<ul class="form-login">
			<li ng-class="{ 'has-error' : userForm.email.$invalid && (userForm.email.$dirty || submitted)}">
				<div class="dym-txt">Please complete the fields below</div>
				<div class="defl-txt">All fields are mandatory</div>
				<input type="email" name="email" class="form-control" ng-model="user.email" placeholder="Email" ng-required="true">
				<p ng-show="userForm.email.$error.required && (userForm.email.$dirty || submitted)" class="help-block">Email is required.</p>
				<p ng-show="userForm.email.$error.email && (userForm.email.$dirty || submitted)" class="help-block">Enter a valid email.</p>
			</li>
			<li ng-class="{ 'has-error' : userForm.name.$invalid && (userForm.name.$dirty || submitted)}">
				<input type="text" name="name" class="form-control" ng-model="user.name" placeholder="First Name" ng-required="true">
                <p ng-show="userForm.name.$error.required && (userForm.name.$dirty || submitted)" class="help-block">You name is required.</p>
			</li>
			<li ng-class="{ 'has-error' : userForm.nameLast.$invalid && (userForm.nameLast.$dirty || submitted)}">
				<input type="text" name="nameLast" class="form-control" ng-model="user.nameLast" placeholder="Last Name" ng-required="true">
                <p ng-show="userForm.nameLast.$error.required && (userForm.nameLast.$dirty || submitted)" class="help-block">You name is required.</p>
			</li>
			<li ng-class="{ 'has-error' : userForm.password.$invalid && (userForm.password.$dirty || submitted)}">
				<input type="Password" name="password" class="form-control" ng-model="user.password" placeholder="Password" ng-required="true">
                <p ng-show="userForm.password.$error.required && (userForm.password.$dirty || submitted)" class="help-block">Password is required.</p>
			</li>
			<li ng-class="{ 'has-error' : userForm.confirmPassword.$invalid && (userForm.confirmPassword.$dirty || submitted)}">
				<input type="Password" name="confirmPassword" class="form-control" ng-model="user.confirmPassword" placeholder="Confirm Password" ng-compare="password" ng-required="true">
				<p ng-show="userForm.confirmPassword.$error.required && (userForm.confirmPassword.$dirty || submitted)" class="help-block">Confirm password is required.</p>
				<p ng-show="userForm.confirmPassword.$error.compare  && (userForm.confirmPassword.$dirty || submitted)" class="help-block">Confirm password doesnot match.</p>
			</li>
			<li>
				<button type="reset" class="btn btn-primary" onclick="window.location.href='index.html'">Cancel</button> <button type="submit" class="btn btn-primary">Sign up</button>
				
			</li>
		</ul>
	</form>
	</div>
	<div class="footer">© 2015 SIMS Quotation Application. All rights reserved.</div>
</div>

</body>
</html>