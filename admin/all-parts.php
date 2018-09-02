<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>All Parts</title>
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
					<h2>All Parts</h2>
					<span>List of the Parts available in your store.</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container first-container">
		<div class="row">
			<div class="col-xs-12">

				<?php
				if (isset($_SESSION['edit_part_success'])) {
					$msg = $_SESSION['edit_part_success'];
					echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
					unset($_SESSION['edit_part_success']);
				}
				if (isset($_SESSION['del_part_success'])) {
					$msg = $_SESSION['del_part_success'];
					echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
					unset($_SESSION['del_part_success']);
				}
				if (isset($_SESSION['del_part_err'])) {
					$msg = $_SESSION['del_part_err'];
					echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
					unset($_SESSION['del_part_err']);
				}
				?>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Weight</th>
							<th>Company</th>
							<th>Suitable For</th>
							<th>Price</th>
							<th>Stock</th>
							<th width="120px">Edit ― Delete</th>
						</tr>
					</thead>
					<?php 

					require 'php/connect.php';
					$str = "SELECT * FROM parts";
					$que = mysqli_query($conn,$str);
					if (mysqli_num_rows($que) > 0) {
						while ($row = mysqli_fetch_array($que)) 
						{
							echo '
							<tr>
								<td>'.$row['id'].'</td>
								<td>'.$row['name'].'</td>
								<td>'.$row['size'].'</td>
								<td>'.$row['company'].'</td>
								<td>'.$row['suitable_for'].'</td>
								<td>'.$row['price'].'</td>
								<td>'.$row['stock'].'</td>
								<td>
									&nbsp;&nbsp;
									<a href="edit-part.php?id='.$row['id'].'" ><i class="fa fa-edit fa-fw fa-lg"></i></a>
									&nbsp;&nbsp;&nbsp;
									<a href="php/delete-part.php?pid='.$row['id'].'" ><i class="fa fa-trash-o fa-fw fa-lg"></i></a>
								</td>
							</tr>';
						}
					}
					else {
						echo '
						<td colspan="7">
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
