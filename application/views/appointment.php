<!DOCTYPE html>	
	<head>
		<title>JCAgenda - Event</title>
		<meta charset="UTF-8">
		<!-- SEO -->
		<meta name="description" content="The new JCAgenda app is designed to save you time and help you make the most of everyday.">
		<meta name="keywords" content="Schedule app, scheduler, appointment application, jose chery, full stack web developer Fort Myers">
		<meta name="author" content="Jose Chery">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="./../../assets/img/event-icon.png">
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
 		<!-- Appointment Edit CSS  -->
 		<link rel="stylesheet" type="text/css" href="./../../assets/css/event_update.css">
 		<script>
 			$(document).ready(function(){
				$('.datepicker').datepicker({
					minDate: "0d"
				}); 
			});
 		</script>
		<?php 
			date_default_timezone_set('America/New_York');
			$user = $this->session->userdata('user'); 
			$x = $this->session->userdata('appointment'); 
		 ?>
	</head>
	<body>
		<div class="col-xs-12 header">
			<a href="/users/logout">Logout</a>
			<a href="/appointments">Dashboard</a>
			<h2>Update Appointment</h2>
		</div>
		<div class="container-fluid col-xs-12 col-sm-offset-1 col-sm-10 col-md-8 col-md-offset-2">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-lg-5 form-section">
					<form action=<?php echo "/appointments/update/".$x['appointment_id']; ?> method='post' class='form form-horizontal'>
						<h4>Edit Appointment:</h4>
						<div class="form-group">
							<input type='hidden' name='created_by' value=<?php echo $user['id']; ?>>
							<label for='date' class='control-label col-xs-2'>Date:</label>
							<div class="col-xs-6">
								<input type='text' name='date' id='date' class='form-control datepicker' value=<?php echo $x['date'];?>>
							</div>
						</div>
						<div class="form-group">
							<label for='status' class='control-label col-xs-2'>Status</label>
							<div class="col-xs-6" name='status' >
								<select name='status' class='form-control'>
									<option value='pending'>Pending</option>
									<option value='completed'>Completed</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for='tasks' class="control-label col-xs-2">Tasks:</label>
							<div class="col-xs-12">
								<textarea type='text' id='tasks' name='tasks' class='form-control tasks'><?php echo $x["tasks"];?></textarea>
							</div>
							<button type='submit' class='btn btn-primary'>Add</button>
						</div>
					</form>
				</div>
			</div>
		</div> <!-- End Container -->
	</body> 
</html>