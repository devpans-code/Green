<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Login</title>
	<?php include 'include/head.php'; ?>
</head>

<body>

	<?php include 'include/navbar.php'; 
	if (isset($_SESSION['cust_id'])) {
		echo '
		<script type="text/javascript">
			location.href="index.php";
		</script>
		';
		die();
	}
	?>

	<header class="nav-bg">
	</header>

	<div class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Login</h2>
					<span>Login to cotinue buying</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container first-container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<form class="form-horizontal form-login" method="POST" action="php/login.php">
					<h3>Please Login Or <a href="register.php">Register</a></h3>

					<?php
					if (isset($_SESSION['login_msg'])) 
					{
						$msg = $_SESSION['login_msg'];
						echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
						unset($_SESSION['login_msg']);
					}
					?>

					<div class="form-group">
						<label for="email" class="col-xs-12 control-label">E-Mail :</label>
						<div class="col-xs-12">
							<input type="email" class="form-control" name="username" id="email" placeholder="Your E-Mail Address" autofocus required>
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
							<button type="submit" name="dologin" class="btn btn-primary">Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
