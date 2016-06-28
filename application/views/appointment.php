<!DOCTYPE html>	
	<?php 
		date_default_timezone_set('America/New_York');
		$user = $this->session->userdata('user'); 
		$x = $this->session->userdata('appointment'); 
	 ?>

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
		<!-- jQuery UI -->
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
 		<script>
 			$(document).ready(function(){
				$('.datepicker').datepicker({
					minDate: "0d"
				}); 
			});
 		</script>
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
			.appointments {
				max-width: 700px; 
			}
			.btn {
				background-color: rgba(14,122,254,.8); 
				border: black; 
				box-shadow: 2px 2px 5px black; 
				color: white; 
				margin-top: 10px; 
			}
			.other {
				max-width: 400px; 
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<a href="/appointments"><p class='col-xs-offset-10 col-xs-1'>Dashboard</p></a>
				<a href="/users/logout"><p class='col-xs-1'>Logout</p></a>
			</div>
			<div class="row">
				<form action=<?php echo "/appointments/update/".$x['appointment_id']; ?> method='post' class='form form-horizontal col-xs-4'>
					<p>Add Appointment:</p>
					<div class="form-group">
						<input type='hidden' name='created_by' value=<?php echo $user['id']; ?>>
						<label for='date' class='control-label col-xs-2'>Date:</label>
						<div class="col-xs-10">
							<input type='text' name='date' id='date' class='form-control datepicker' value=<?php echo $x['date']?>>
						</div>
					</div>
					<div class="form-group">
						<label for='status' class='control-label col-xs-2'>Status</label>
						<div class="col-xs-4" name='status' >
							<select name='status' class='form-control'>
								<option value='pending'>Pending</option>
								<option value='completed'>Completed</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for='tasks' class="control-label col-xs-2">Tasks:</label>
						<div class="col-xs-12">
							<textarea id='tasks' name='tasks' class='form-control tasks' value=<?php echo $x["tasks"]?>></textarea>
						</div>
						<button type='submit' class='btn col-xs-offset-10'>Add</button>
					</div>
				</form>
			</div>
		</div> <!-- End Container -->
	</body> 
</html>