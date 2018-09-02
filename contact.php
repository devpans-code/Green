<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Contact US</title>
	<?php include 'include/head.php'; ?>
</head>

<body>

	<?php include 'include/navbar.php'; ?>

	<header class="nav-bg">
	</header>

	<div class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Contact Us</h2>
					<span>We would like to hear</span>
				</div>
			</div>
		</div>
	</div>

		<div class="container">


			<div class="row">

				<div class="col-sm-12 gmap">

					<iframe style="pointer-events:none;" class="googlemap" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1836.5948480852999!2d72.4927876858473!3d22.980050879248875!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1426072634644"></iframe>

				</div>

			</div>

		</div>
		<br>
		<br>

		<div class="container">
			<div class="row">

				<legend class="line-header text-center"><span>LEAVE US A MESSAGE</span>
				</legend>

				<div class="col-md-8 contact-form">

					<h3 class="text-center">INQUIRY FORM</h3>

					<?php
						if (isset($_SESSION['inq_err_msg'])) 
						{
							$msg = $_SESSION['inq_err_msg'];
							echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
							unset($_SESSION['inq_err_msg']);
						}
						if (isset($_SESSION['inq_success_msg'])) {
							$msg = $_SESSION['inq_success_msg'];
							echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
							unset($_SESSION['inq_success_msg']);
						}
					?>

					<form id="contact-form" action="php/inquiry.php" class="form-horizontal" method="post">
						<div class="form-group">
							<label class="col-lg-2 control-label">Name</label>
							<div class="col-lg-8">
								<input type="text" title="Enter Your Name" name="name" class="form-control" placeholder="Name" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Email</label>
							<div class="col-lg-8">
								<input type="email" title="Enter Your e-Mail address" name="email" class="form-control" placeholder="Email" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Mobile</label>
							<div class="col-lg-8">
								<input type="text" name="mobile" title="Enter Your Mobile Number Only Without +91" class="form-control" maxlength="10" pattern="[0-9]{10}"  placeholder="Contact Number">
							</div>
						</div>
						<div class="form-group">
							<label for="Message" class="col-lg-2 control-label">Message</label>
							<div class="col-lg-8">
								<textarea name="message" class="form-control" rows="5" style="resize:none;" placeholder="Your Message For Us" title="Enter Your Message" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-8 col-lg-offset-2">
								<input type="submit" name="send_inquiry" class="btn btn-primary" value="Submit">
							</div>
						</div>
					</form>
				</div>

				<div class="col-md-4 address">
					<h3>CONTACT INFO</h3>

					<p class="lead">
						<h4><i class="fa fa-map-marker"></i>&nbsp;ADDRESS</h4><span class="text-muted">
						Plants Nursery
						<br/>D-I/1159 Vasant Kunj,
						<br/>New Delhi,
						<br/>New delhi-110070,
						<br/>India</span>
						<br>
						<h4><i class="fa fa-phone"></i>&nbsp;PHONE</h4>
						<b> Mr. Shashank Panchal : +91-8141589799</b>
						<br/>
					</span>
					<br>
					<br>
					<h4><i class="fa fa-globe"></i>&nbsp;EMAIL</h4>
					<span class="text-muted">Email : green_land@gmail.com</span>
					</div>


				</div>
			</div>

		</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
