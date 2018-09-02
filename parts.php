<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Parts</title>
	<?php include 'include/head.php'; ?>
</head>

<body>

	<?php include 'include/navbar.php'; ?>

	<header class="nav-bg">
	</header>

	<div class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Tools</h2>
					<span>our online store</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container products-container">

		<div class="row">

			<div class="col-xs-6 col-xs-offset-1">
				<form action="parts.php" method="get" class="form-inline">
					<div class="form-group">
						<input type="text" class="form-control" name="sq" placeholder="Enter your keywords here" style="width:350px;" required>
					</div>
					<button type="submit" class="btn btn-primary">Search</button>
				</form>
			</div>

			<div class="col-xs-5">
				<form action="parts.php" method="get" class="form-inline">
					<div class="form-group">
						<label class="control-label">Sort by Price :</label>
						<select class="form-control" name="sort-by">
							<option>Low to High</option>
							<option>High to Low</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Sort</button>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="row">

					<?php 

					function validate_input ($data) {
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						$array = explode('\'',$data);
						$str = "";
						foreach ($array as $data) 
						{
							$str .= $data;
						}
						return $str;
					}

					if (isset($_SESSION['cart_add_msg'])) 
					{
						$msg = $_SESSION['cart_add_msg'];
						echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
						unset($_SESSION['cart_add_msg']);
					}

					if (isset($_SESSION['cart_err_msg'])) 
					{
						$msg = $_SESSION['cart_err_msg'];
						echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
						unset($_SESSION['cart_err_msg']);
					}

					if (isset($_GET['sort-by'])) {

						$filter_price = validate_input($_GET['sort-by']);

						if ($filter_price == "Low to High") {
							$filter_price = "ASC";
						}
						else
						{
							$filter_price = "DESC";
						}

						require 'php/connect.php';
						$filter_product_str = "SELECT * FROM parts ORDER BY price ".$filter_price." ";

						$filter_product_que = mysqli_query($conn,$filter_product_str);
						if (mysqli_num_rows($filter_product_que) > 0) 
						{
							while ($product_row = mysqli_fetch_array($filter_product_que)) 
							{
								echo '
								<div class="col-xs-4">
									<div class="products-part" onclick="viewPart('.$product_row['id'].')">
										<div>
											<h4 class="text-center">'.$product_row['name'].'</h4>
										</div>
										<div>
											<img src="'.$product_row['image'].'" class="img-responsive">
										</div>
										<div>
											<span class="pull-left type">Company : '.$product_row['company'].'</span>
											<span class="pull-right price">'.$product_row['size'].'</span>
										</div>
										<div>
											<span class="pull-left type">Suitable For : '.$product_row['suitable_for'].' </span>
											<span class="pull-right price"> '.$product_row['price'].' <i class="fa fa-inr"></i></span>
										</div>
									</div>
								</div>
								';
							}
						}
						require 'php/close.php';
					}
					elseif (isset($_GET['sq'])) {
						$searchq = validate_input($_GET['sq']);

						require 'php/connect.php';
						$search_product_str = "SELECT * FROM parts WHERE `name` LIKE '%$searchq%' or `company` LIKE '%$searchq%' or `suitable_for` LIKE '%$searchq%'";

						$search_product_que = mysqli_query($conn,$search_product_str);
						if (mysqli_num_rows($search_product_que) > 0) 
						{
							while ($product_row = mysqli_fetch_array($search_product_que)) 
							{
								echo '
								<div class="col-xs-4">
									<div class="products-part" onclick="viewPart('.$product_row['id'].')">
										<div>
											<h4 class="text-center">'.$product_row['name'].'</h4>
										</div>
										<div>
											<img src="'.$product_row['image'].'" class="img-responsive">
										</div>
										<div>
											<span class="pull-left type">Company : '.$product_row['company'].'</span>
											<span class="pull-right price">'.$product_row['size'].'</span>
										</div>
										<div>
											<span class="pull-left type">Suitable For : '.$product_row['suitable_for'].' </span>
											<span class="pull-right price"> '.$product_row['price'].' <i class="fa fa-inr"></i></span>
										</div>
									</div>
								</div>
								';
							}
						}
						else
						{
							echo '
							<div class="nodata">
							<i class="fa fa-database fa-lg"></i>
								<p>No part found of your choice.Please try some different keywords.</p>
								<p><a href="parts.php">View all parts</a></p>
							</div>
							';
						}
						require 'php/close.php';
					}
					elseif (isset($_GET['company'])) {
						$company = strtoupper(validate_input($_GET['company']));

						require 'php/connect.php';
						$company_str = "SELECT * FROM parts WHERE `suitable_for` = \"$company\" ";

						$company_que = mysqli_query($conn,$company_str);
						if (mysqli_num_rows($company_que) > 0) 
						{
							while ($product_row = mysqli_fetch_array($company_que)) 
							{
								echo '
								<div class="col-xs-4">
									<div class="products-part" onclick="viewPart('.$product_row['id'].')">
										<div>
											<h4 class="text-center">'.$product_row['name'].'</h4>
										</div>
										<div>
											<img src="'.$product_row['image'].'" class="img-responsive">
										</div>
										<div>
											<span class="pull-left type">Company : '.$product_row['company'].'</span>
											<span class="pull-right price">'.$product_row['size'].'</span>
										</div>
										<div>
											<span class="pull-left type">Suitable For : '.$product_row['suitable_for'].' </span>
											<span class="pull-right price"> '.$product_row['price'].' <i class="fa fa-inr"></i></span>
										</div>
									</div>
								</div>
								';
							}
						}
						else
						{
							echo '
							<div class="nodata">
								<i class="fa fa-database fa-lg"></i>
								<p>No part found suitable for selected company.</p>
								<p><a href="parts.php">View all parts</a></p>
							</div>
							';
						}
						require 'php/close.php';
					}
					else
					{
						require 'php/connect.php';
						$product_str = "SELECT * FROM parts";
						$product_que = mysqli_query($conn,$product_str);
						if (mysqli_num_rows($product_que) > 0) 
						{
							while ($product_row = mysqli_fetch_array($product_que)) 
							{
								echo '
								<div class="col-xs-4">
									<div class="products-part" onclick="viewPart('.$product_row['id'].')">
										<div>
											<h4 class="text-center">'.$product_row['name'].'</h4>
										</div>
										<div>
											<img src="'.$product_row['image'].'" class="img-responsive">
										</div>
										<div>
											<span class="pull-left type">Company : '.$product_row['company'].'</span>
											<span class="pull-right price">'.$product_row['size'].'</span>
										</div>
										<div>
											<span class="pull-left type">Suitable For : '.$product_row['suitable_for'].' </span>
											<span class="pull-right price"> '.$product_row['price'].' <i class="fa fa-inr"></i></span>
										</div>
									</div>
								</div>
								';
							}
						}
						else
						{
							echo '
							<div class="nodata">
								<i class="fa fa-database"></i>
								<p>No part available in store</p>
							</div>
							';
						}
						require 'php/close.php';
					}

					?>

				</div>
			</div>

		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
