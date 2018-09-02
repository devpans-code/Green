<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>All Users</title>
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
					<h2>All Users</h2>
					<span>List of all registered users on your site.</span>
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
							<th>Id</th>
							<th>Name</th>
							<th>Mobile No</th>
							<th>E-mail</th>
							<th>Address</th>
						</tr>
					</thead>
					<?php 

					require 'php/connect.php';
					$str = "SELECT * FROM customers";
					$que = mysqli_query($conn,$str);
					if (mysqli_num_rows($que) > 0) {
						while ($row = mysqli_fetch_array($que)) 
						{
							echo '
							<tr>
								<td>'.$row['customer_id'].'</td>
								<td>'.$row['first_name'].' '.$row['last_name'].'</td>
								<td>'.$row['mobile'].'</td>
								<td>'.$row['email'].'</td>
								<td>'.$row['address'].'</td>
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
