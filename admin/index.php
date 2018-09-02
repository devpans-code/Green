<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Admin Login</title>
	<?php session_start();
	include 'include/head.php'; 
	if (isset($_SESSION['admin_username'])) {
		echo '
		<script type="text/javascript">
			location.href="home.php";
		</script>
		';
		die();
	}
	?>
</head>

<body>

	<?php include 'include/navbar.php'; ?>

	<header class="nav-bg">
	</header>

	<div class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Admin Login</h2>
					<span>login to manage the site</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">

				<form class="form-horizontal form-login" method="POST" action="php/login.php">

					<legend class="text-center"><span>Admin Login</span></legend>

					<?php
					if (isset($_SESSION['admin_login_msg'])) 
					{
						$msg = $_SESSION['admin_login_msg'];
						echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
						unset($_SESSION['admin_login_msg']);
					}
					?>

					<div class="form-group">
						<label for="username" class="col-xs-12 control-label">Username :</label>
						<div class="col-xs-12">
							<input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus required>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-xs-12 control-label">Password :</label>
						<div class="col-xs-12">
							<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<button type="submit" name="doadminlogin" class="btn btn-primary">Login</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
