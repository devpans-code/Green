<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Register</title>
	<?php include 'include/head.php'; ?>
</head>

<body>

	<?php include 'include/navbar.php'; ?>

	<header class="nav-bg">
	</header>

	<div class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2>Register</h2>
					<span>Register to buy online parts</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container first-container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">

				<form class="form-horizontal register-form" method="post" action="php/register.php">

					<legend class="text-center"><span>Register</span></legend>

					<?php
					if (isset($_SESSION['reg_err_msg'])) 
					{
						$msg = $_SESSION['reg_err_msg'];
						echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
						unset($_SESSION['reg_err_msg']);
					}
					if (isset($_SESSION['reg_success_msg'])) {
						$msg = $_SESSION['reg_success_msg'];
						echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
						unset($_SESSION['reg_success_msg']);
					}
					?>

					<div class="form-group">
						<label for="name" class="col-lg-3 control-label">Name :</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" id="name" name="fname" placeholder="First Name" pattern="[a-zA-Z]{3,20}" autofocus required>
						</div>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="lname" placeholder="Last Name" pattern="[a-zA-Z]{3,20}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="mobile" class="col-lg-3 control-label">Mobile No :</label>
						<div class="col-lg-5">
							<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Your Mobile No" maxlength="10" pattern="[0-9]{10}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="address" class="col-lg-3 control-label">Address :</label>
						<div class="col-lg-5">
							<textarea class="form-control" id="address" name="address" placeholder="Your Address" required rows="4"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-lg-3 control-label">E-Mail :</label>
						<div class="col-lg-5">
							<input type="email" class="form-control" id="email" name="email" placeholder="Your E-Mail Address" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" required>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-lg-3 control-label">Password :</label>
						<div class="col-lg-5">
							<input type="password" class="form-control" id="password" name="pass" placeholder="Password" required>
						</div>
					</div>

					<div class="form-group">
						<label for="cfm-password" class="col-lg-3 control-label">Confirm Password :</label>
						<div class="col-lg-5">
							<input type="password" class="form-control" id="cfm-password" name="conf_pass" placeholder="Confirm Password" required>
						</div>
					</div>

					<hr>

					<div class="form-group btn-container">
						<div class="col-lg-8 col-lg-offset-3">
							<button type="submit" class="btn btn-primary" name="doregister">Register</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
