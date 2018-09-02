<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Part</title>
	<?php include 'include/head.php'; ?>
</head>

<body>

	<?php include 'include/navbar.php'; ?>

	<header class="nav-bg">
	</header>

	<?php 
		if (isset($_GET['id'])) 
		{
			$id = $_GET['id'];
		}
		else
		{
			echo '
			<script type="text/javascript">
				location.href="parts.php";
			</script>
			';
		}
		require('php/connect.php');
		$part_info_str = "SELECT * FROM `parts` WHERE id=".$id;
		$part_info_que = mysqli_query($conn,$part_info_str);
		$part_info_row = mysqli_fetch_array($part_info_que);
		if (!$part_info_row) {
			echo '
			<script type="text/javascript">
			location.href="parts.php";
			</script>
			';
		}
		require('php/close.php');
	?>

	<div class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2><?php echo $part_info_row['name']; ?></h2>
					<span>A part from our store</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container part-container">
		<div class="row">
			<div class="col-xs-4">
			<img class="thumbnail" src="<?php echo $part_info_row['image']; ?>" >
				<h4 class="product-image-title">Product Image</h4>
			</div>
			<div class="col-xs-8 part-desc">
			<h1 class="product-title"><?php echo $part_info_row['name']; ?> - <?php echo $part_info_row['suitable_for']; ?> - <?php echo $part_info_row['size']; ?></h1>
			<p class="lead"><?php echo $part_info_row['price']; ?> <i class="fa fa-inr"></i></p>
				<br>
				<?php
				$stock = $part_info_row['stock'];
				if (isset($_SESSION['cust_id']) && $stock > 0) {
					echo '
					<form class="form-inline" action="php/cart.php" method="post">
						<div class="form-group">
							<label>Quantity :</label>
							<input type="hidden" name="id" value="'.$part_info_row['id'].'">
							<input type="number" value="1" name="qty" autocomplete="off" min="1" class="form-control" style="width:70px;">
						</div>
						<button type="submit" name="addPart" class="btn btn-primary"><i class="fa fa-cart-plus fa-lg fa-fw"></i> Add To Cart</button>
					</form>
					';
				}
				else if ($stock <= 0) {
					echo '<span class="text-danger">Sorry this item is out of stock. Please check back later.</span>';
				}
				else {
					echo 'Please <a href="login.php">login</a> to buy this item';
				}
				?>

			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<legend class="text-center"><span>SPECIFICATION</span></legend>
				<table class="table table-bordered">
					<tr>
						<td width="200px"><b>Name</b></td>
						<td><?php echo $part_info_row['name']; ?></td>
					</tr>
					<tr>
						<td><b>Weight</b></td>
						<td><?php echo $part_info_row['size']; ?></td>
					</tr>
					<tr>
						<td><b>Price</b></td>
						<td><?php echo $part_info_row['price']; ?> <i class="fa fa-inr"></i></td>
					</tr>
					<tr>
						<td><b>Company</b></td>
						<td><?php echo $part_info_row['company']; ?></td>
					</tr>
					<tr>
						<td><b>Suitable For</b></td>
						<td><?php echo $part_info_row['suitable_for']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
