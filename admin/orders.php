<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Orders</title>
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
					<h2>Orders</h2>
					<span>The list of all the orders placed untill now.</span>
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
							<th>Order Id</th>
							<th>Customer Id</th>
							<th>Order Items</th>
							<th>Order Total</th>
							<th>Order Status</th>
							<th>Edit Status</th>
						</tr>
					</thead>
					<tbody>
					<?php

						if (isset($_SESSION['ord_upd_success'])) 
						{
							$msg = $_SESSION['ord_upd_success'];
							echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
							unset($_SESSION['ord_upd_success']);
						}

						if (isset($_SESSION['ord_upd_err'])) 
						{
							$msg = $_SESSION['ord_upd_err'];
							echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
							unset($_SESSION['ord_upd_err']);
						}

						require 'php/connect.php';
						$str = "SELECT * FROM orders";
						$que = mysqli_query($conn,$str);
						if (mysqli_num_rows($que) > 0) {
							while ($row = mysqli_fetch_array($que)) 
							{
								$cart = json_decode($row['items'],true);
								$total_items = count($cart);
								$total_price = 0;
								$data = " ";
								for ($i=0; $i <$total_items ; $i++) { 
									$total_price += $cart[$i]['total'];
									$data .= $cart[$i]['qty']." * ".$cart[$i]['name']." ".$cart[$i]['size']."<br>";
								}
								$status = strtolower($row['status']);
								if ($status == "pending") {
									$status = '<span class="label label-warning">'.$row['status'].'</sapn>';
								}
								elseif ($status == "shipped") {
									$status = '<span class="label label-primary">'.$row['status'].'</sapn>';
								}
								elseif ($status == "completed") {
									$status = '<span class="label label-success">'.$row['status'].'</sapn>';
								}
								else {}
									echo '
								<tr>
									<td>'.$row['id'].'</td>
									<td>'.$row['cust_id'].'</td>
									<td>'.$data.'</td>
									<td>'.$total_price.' <i class="fa fa-inr"></i></td>
									<td style="text-transform:capitalize">'.$status.'</td>
									<td><a href="order-status.php?oid='.$row['id'].'" style="display:block;"><i class="fa fa-lg fa-edit"></i></a></td>
								</tr>';
							}
						}
						else
						{
							echo '
							<td colspan="6">
								<div class="nodata">
									<i class="fa fa-database"></i>
									<p>No Data Found</p>
								</div>
							</td>
							';
						}
					?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
