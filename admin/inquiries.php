<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Inquiries</title>
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
					<h2>Inquiries</h2>
					<span>Inquiries sent will be shown here.</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container first-container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Mobile No</th>
							<th>E-Mail</th>
							<th>Message</th>
						</tr>
					</thead>
					<?php 

					require 'php/connect.php';
					$str = "SELECT * FROM inquiry";
					$que = mysqli_query($conn,$str);
					if (mysqli_num_rows($que) > 0) {
						while ($row = mysqli_fetch_array($que)) 
						{
							echo '
							<tr>
								<td>'.$row['name'].'</td>
								<td>'.$row['mobile'].'</td>
								<td>'.$row['email'].'</td>
								<td>'.$row['message'].'</td>
							</tr>';
						}
					}
					else {
						echo '
						<td colspan="5">
							<div class="nodata">
								<i class="fa fa-database"></i>
								<p>No Data Found</p>
							</div>
						</td>
						';
					}
					?>
				</table>

			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
