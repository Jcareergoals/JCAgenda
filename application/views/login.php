<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login / Registration</title>
		<meta charset="UTF-8">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
		integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
		integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
		integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<style type="text/css">
			* {
				padding: 0px; 
				margin: 0px; 
			}
			body {
				background-color: rgb(245,245,245); 
			}
			.container {
				background-color: white; 
				border: 1px solid black; 
				margin: 40px auto; 
				padding: 20px; 
				box-shadow: 2px 2px 7px black; 
			}
			.submit	{
				background-color: green; 
				color: white; 
				border: 1px solid black; 
				box-shadow: 2px 2px 5px black; 
				font-weight: bold; 
			}
			.errors {
				color: red; 
				text-align: center; 
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<!-- $this->session->flashdata('errors') -->
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h3  class='col-xs-12'>Welcome!</h3>
				</div>
			</div>	
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<h5 class='col-xs-12'>Register</h5>
					<form action='/users/add' method='post' class='form form-horizontal'>
						<input type='hidden' name='form' value='registration'>
						<div class="form-group">
							<label for='f_name' class='control-label col-xs-3'>First Name:</label>
							<div class='col-xs-9'>
								<input type='text' name='first_name' id='f_name' class='form-control'>
							</div>
						</div>
						<div class="form-group">
							<label for='l_name' class='control-label col-xs-3'>Last Name:</label>
							<div class='col-xs-9'>
								<input type='text' name='last_name' id='l_name' class='form-control'>
							</div>
						</div>
						<div class="form-group">
							<label for='username' class='control-label col-xs-3'>User Name:</label>
							<div class='col-xs-9'>
								<input type='text' name='username' id='username' class='form-control'>
							</div>
						</div>
						<div class="form-group">
							<label for='password' class='control-label col-xs-3'>Password:</label>
							<div class='col-xs-9'>
								<input type='password' name='password' id='password' class='form-control'>
							</div>
						</div>
						<div class="form-group">
							<label for='confirm_password' class='control-label col-xs-4'>Confirm Password:</label>
							<div class='col-xs-8'>
								<input type='password' name='confirm_password' id='confirm_password' class='form-control'>
							</div>
						</div>
						<div class="col-xs-offset-10">
							<input type='submit' value='Register' class='form-control submit'>
						</div>
					</form>
				</div>
				<div class="col-sm-6 col-xs-12">
					<h5 class='col-xs-12'>Login</h5>
					<form action='/users/login' method='post' class='form form-horizontal'>
						<input type='hidden' name='form' value='login'>
						<div class="form-group">
							<label for='username_2' class='control-label col-xs-3'>User Name:</label>
							<div class='col-xs-9'>
								<input type='text' name='username_2' id='username_2' class='form-control'>
							</div>
						</div>
						<div class="form-group">
							<label for='password_2' class='control-label col-xs-3'>Password:</label>
							<div class='col-xs-9'>
								<input type='password' name='password_2' id='password_2' class='form-control'>
							</div>
						</div>
						<div class="col-xs-offset-10">
							<input type='submit' value='Login' class='form-control submit'>
						</div>
					</form>
				</div>
			</div>	
		</div> <!-- End Container -->
	</body> 
</html>