<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Order Status</title>
	<?php include 'include/head.php'; include 'php/access.php';?>
</head>

<body>

	<?php include 'include/navbar.php'; ?>
	<?php 
	if (isset($_GET['oid'])) 
	{                  
		$oid =  $_GET['oid'];
	}
	else
	{
		echo '
		<script type="text/javascript">
			location.href="orders.php";
		</script>
		';
	}

	require('php/connect.php');
	$part_info_str = "SELECT * FROM `orders` WHERE id=".$oid;
	$part_info_que = mysqli_query($conn,$part_info_str);
	$part_info_row = mysqli_fetch_array($part_info_que);
	if (!$part_info_row) {
		echo '
		<script type="text/javascript">
			location.href="orders.php";
		</script>
		';
	}
	require('php/close.php');
	?>

	<header class="nav-bg">
	</header>

	<div class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Order Status <?php echo "$oid"; ?></h2>
					<span>Update the status of an order.</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container first-container">
		<div class="row">
			<div class="col-xs-12">

				<form action="php/order-update.php" method="post" class="form-horizontal">

					<div class="form-group">
						<label class="col-xs-3 control-label">Update Order Status :</label>
						<div class="col-xs-7">
							<input type="hidden" value='<?php echo "$oid"; ?>' name="oid">
							<label class="radio-inline">
								<input type="radio" name="order_status" value="pending"
									<?php if($part_info_row['status'] == strtolower("pending"))echo "checked"; ?>
								> Pending
							</label>
							<label class="radio-inline">
								<input type="radio" name="order_status" value="shipped"
									<?php if($part_info_row['status'] == strtolower("shipped"))echo "checked"; ?>
								> Shipped
							</label>
							<label class="radio-inline">
								<input type="radio" name="order_status" value="completed"
									<?php if($part_info_row['status'] == strtolower("completed"))echo "checked"; ?>
								> Completed
							</label>
						</div>
					</div>

					<div class="form-group btn-container">
						<div class="col-xs-8 col-xs-offset-3">
							<button type="submit" class="btn btn-primary" name="doupdateorder">Update</button>
						</div>
					</div>
					
				</form>

			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
