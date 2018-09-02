<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Your Orders</title>
	<?php include 'include/head.php'; ?>
</head>

<body>

	<?php include 'include/navbar.php'; ?>
	<?php if (!isset($_SESSION['cust_id'])) {
		echo '
		<script type="text/javascript">
			location.href="index.php";
		</script>
		';
	} ?>

	<header class="nav-bg">
	</header>

	<div class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Your Orders</h2>
					<span>A Little bit history of the orders that you have placed on our site</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container cart-container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">

				<?php

				if (isset($_SESSION['order_success_msg'])) 
				{
					$msg = $_SESSION['order_success_msg'];
					echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
					unset($_SESSION['order_success_msg']);
				}

				require 'php/connect.php';
				$str = "SELECT * FROM orders WHERE cust_id=".$_SESSION['cust_id']." ";
				$que = mysqli_query($conn,$str);
				if (mysqli_num_rows($que) > 0) {
					echo '
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Order Id</th>
								<th>Order Items</th>
								<th>Order Total</th>
								<th>Order Status</th>
							</tr>
						</thead>
						<tbody>
							';
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
							<td>'.$data.'</td>
							<td>'.$total_price.' <i class="fa fa-inr"></i></td>
							<td style="text-transform:capitalize">'.$status.'</td>
						</tr>';
					}
					echo '
						</tbody>
					</table>
					';
				}
				else
				{
					echo '
					<div class="nodata">
						<i class="fa fa-database"></i>
						<p>No order history found</p>
					</div>
					';
				}
				?>

			</div> 
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
