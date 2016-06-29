<!DOCTYPE html>
<html lang="en">
	<head>
		<title>JCAgendas</title>
		<meta charset="UTF-8">
		<!-- SEO -->
		<meta name="description" content="The new JCAgenda app is designed to save you time and help you make the most of everyday.">
		<meta name="keywords" content="Schedule app, scheduler, appointment application, jose chery, full stack web developer Fort Myers">
		<meta name="author" content="Jose Chery">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="./../../assets/img/event-icon.png">
		<!-- Login CSS -->
		<link rel="stylesheet" type="text/css" href="./../../assets/css/login.css">
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
		
		<!-- jQuery UI -->
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> 
		<script>
			$(document).ready(function(){
				$('.datepicker').datepicker({
					maxDate: "-1Y", 
					changeMonth: true, 
					changeYear: true
				}); 
			}); 
		</script>
	</head>
	<body>
		<div class="row">
			<div class="header col-xs-12">
				<h1 class="col-xs-12">Welcome to JCAgendas</h1>
			</div>
		</div>
		<div class="container-fluid col-xs-12 col-sm-offset-1 col-sm-10 col-md-8 col-md-offset-2">
			<div class="row">
				<div class="col-xs-12 errors-section">
					<span class='errors'><?php echo $this->session->flashdata('errors'); ?></span>
				</div>
			</div>
			<div class="row">
				<!-- REGISTER SECTION -->
				<div class="col-sm-6 col-xs-12 register">
					<h4 class='col-xs-12'>Register</h4>
					<form action='/users/register' method='post' class='form form-horizontal'>
						<input type='hidden' name='form' value='registration'>
						<div class="form-group">
							<label for='name' class='control-label col-xs-3'>Name:</label>
							<div class='col-xs-9'>
								<input type='text' name='name' id='name' class='form-control' autofocus>
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
						<div class="form-group">
							<label for='email' class='control-label col-xs-4'>Email Address:</label>
							<div class="col-xs-8">
								<input type='text' name='email' id='email' class='form-control'>
							</div>
						</div>
						<div class="form-group">
							<label for='dob' class='control-label col-xs-4'>Date of Birth:</label>
							<div class="col-xs-8">
								<input type='text' class='form-control datepicker' name='dob' id='dob' placeholder='mm/dd/yyyy'>
							</div>
						</div>
						<button type='submit' class='btn btn-success'>Register</button>
					</form>
				</div>
				<!-- LOGIN SECTION -->
				<div class="col-sm-6 col-xs-12 login">
					<h4 class='col-xs-12'>Login</h4>
					<form action='/Users/login' method='post' class='form form-horizontal'>
						<input type='hidden' name='form' value='login'>
						<div class="form-group">
							<label for='email_2' class='control-label col-xs-3'>Email:</label>
							<div class='col-xs-9'>
								<input type='text' name='email_2' id='email_2' class='form-control'>
							</div>
						</div>
						<div class="form-group">
							<label for='password_2' class='control-label col-xs-3'>Password:</label>
							<div class='col-xs-9'>
								<input type='password' name='password_2' id='password_2' class='form-control'>
							</div>
						</div>
						<button type='submit' class='btn btn-success'>Login</button>
					</form>
				</div>
			</div>	
		</div> <!-- End Container -->
		<!-- Copy Right Section -->
		<div class="col-xs-12 copyright">Copyright &copy; 2016 <a href="https://www.linkedin.com/in/jose-chery-763110a1" target="_blank">Jose Chery</a>. All rights reserved.</div>
	</body> 
</html>