<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Admin Home</title>
	<?php include 'include/head.php'; include 'php/access.php';?>
</head>

<body>

	<?php include 'include/navbar.php'; ?>

	<header class="nav-bg">
	</header>

	<div class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Admin Home</h2>
					<span>Homepage of the administrative site.</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container first-container">
		<div class="row">
			<div class="col-xs-12">

				<legend class="text-center"><span>Dashboard</span></legend>

				<div class="col-xs-2 text-center">
					<div class="small-box">
					<a href="all-users.php">
							<div class="inner">
								<i class="fa fa-3x fa-users"></i>
								<p>
									Registered Users
								</p>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xs-2 text-center">
					<div class="small-box">
						<a href="add-part.php">
							<div class="inner">
								<i class="fa fa-3x fa-plus"></i>
								<p>
									Add Part
								</p>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xs-2 text-center">
					<div class="small-box">
						<a href="all-parts.php">
							<div class="inner">
								<i class="fa fa-3x fa-list"></i>
								<p>
									All Parts
								</p>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xs-2 text-center">
					<div class="small-box">
						<a href="orders.php">
							<div class="inner">
								<i class="fa fa-3x fa-shopping-cart"></i>
								<p>
									Orders
								</p>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xs-2 text-center">
					<div class="small-box">
						<a href="inquiries.php">
							<div class="inner">
								<i class="fa fa-3x fa-bullhorn"></i>
								<p>
									Inquiries
								</p>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xs-2 text-center">
					<div class="small-box">
						<a href="notification.php">
							<div class="inner">
								<i class="fa fa-3x fa-bell-o"></i>
								<p>
									Notifications
								</p>
								<?php 
								require 'php/connect.php';
								$str = "SELECT * FROM admin_notification";
								$que = mysqli_query($conn,$str);
								if (mysqli_num_rows($que) > 0) {
									echo '<span class="badge">'.mysqli_num_rows($que).'</span>';
								}
								require 'php/close.php';
								?>
							</div>
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
