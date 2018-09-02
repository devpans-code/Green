<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Notifications</title>
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
					<h2>Notifications</h2>
					<span>All your notifications are shown here.</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container first-container" style="font-size:16px;">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">

				<?php 
				require 'php/connect.php';
				$str = "SELECT * FROM admin_notification";
				$que = mysqli_query($conn,$str);
				if (mysqli_num_rows($que) > 0) {
					echo "<ul>";
					while ($row = mysqli_fetch_array($que)) 
					{
						echo '<li>'.$row['message'].'</li>';
					}
					echo "</ul>";
				}
				else {
					echo '
					<p>No notification available</p>
					';
				}
				require 'php/close.php';
				?>
			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
