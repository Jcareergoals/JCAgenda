<!DOCTYPE html>	
	<head>
		<title>JCAgenda - Dashboard</title>
		<meta charset="UTF-8">
		<!-- SEO -->
		<meta name="description" content="The new JCAgenda app is designed to save you time and help you make the most of everyday.">
		<meta name="keywords" content="Schedule app, scheduler, appointment application, jose chery, full stack web developer Fort Myers">
		<meta name="author" content="Jose Chery">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="./../assets/img/event-icon.png">

 		<!-- jQuery CDN -->
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> 
 		<!-- Latest compiled and minified CSS -->
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 		<!-- Optional theme -->
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
 		<!-- Latest compiled and minified JavaScript -->
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- Appointment CSS -->
		<link rel="stylesheet" type="text/css" href="./../../assets/css/appointment.css">
		<!-- jQuery UI & CDN library -->
 		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script>
 			$(document).ready(function(){
				$('.datepicker').datepicker({minDate: "0d"}); 
			});
 		</script>
		<?php
			date_default_timezone_set('America/New_York');
			$user = $this->session->userdata('user'); 
			$appointments = $this->session->userdata('appointments'); 
		?>
	</head>
	<body>
		<div class="header col-xs-12">
			<a href="">Logout</a>
			<h2>JCAgenda</h2>
		</div>
		<div class="container-fluid col-xs-12 col-sm-offset-1 col-sm-10 col-md-8 col-md-offset-2">
			<div class="row">
				<div class="col-xs-12">
					<h4><?php echo "Hello, ".$user['name']; ?></h4>
					<p><? echo "Here are your appointments for today, ".date("F d, Y").":"; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<table class='table appointments table-bordered table-striped'>
						<tr>
							<th>Tasks</th>
							<TH>Date</TH>
							<th>Status</th>
							<th>Action</th>
						</tr>
						<?php 
							foreach($appointments as $x)
							{?>
								<tr>
									<td><?echo $x['tasks']?></td>
									<td><?echo date("F d, Y", strtotime($x['date']))?></td>
									<td><?echo $x['status']?></td>
								<?
									if($x['status'] == 'completed')
									{?>
										<td></td>
									<?} 
									else 
									{?>
										<td><a href=<?echo "/appointments/edit/".$x['appointment_id']?>>Edit</a>  <a href=<?echo "/appointments/delete/".$x['appointment_id'] ?>>Delete</a></td>
									<?}
								 ?>
								</tr>
							<?}
						 ?>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<p>Your other appointments:</p>
					<table class='table other table-bordered table-striped'>
						<tr>
							<th>Tasks</th>
							<th>Date</th>
						</tr>
					</table>
				</div>
			</div>
			<!-- FORM SECTION -->
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-lg-5 form-section">
					<form action='/appointments/add' method='post' class='form form-horizontal'>
						<h4>Add Appointment</h4>
						<div class="form-group">
							<input type='hidden' name='created_by' value=<?php echo $user['id']; ?>>
							<input type='hidden' name='status' value='pending'>
							<label for='date' class='control-label col-xs-2'>Date:</label>
							<div class="col-xs-8 col-sm-10">
								<input type='text' name='date' id='date' class='form-control datepicker' placeholder='MM/DD/YYYY'>
							</div>
						</div>
						<div class="form-group">
							<label for='tasks' class="control-label col-xs-2">Tasks:</label>
							<div class="col-xs-12">
								<textarea id='tasks' name='tasks' class='form-control tasks'></textarea>
							</div>
							<button type='submit' class='btn btn-primary'>Add</button>
						</div>
					</form>
				</div>
			</div>
		</div> <!-- End Container -->
		<!-- Copy Right Section -->
		<div class="col-xs-12 copyright"><p>Copyright &copy; 2016 <a href="https://www.linkedin.com/in/jose-chery-763110a1" target="_blank">Jose Chery</a>. All rights reserved.</p></div
	</body> 
</html>