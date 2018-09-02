<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Add Part</title>
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
					<h2>Add Part</h2>
					<span>Add a new part to your store</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container first-container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<?php
				if (isset($_SESSION['add_part_err'])) 
				{
					$msg = $_SESSION['add_part_err'];
					echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
					unset($_SESSION['add_part_err']);
				}
				if (isset($_SESSION['add_part_success'])) {
					$msg = $_SESSION['add_part_success'];
					echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
					unset($_SESSION['add_part_success']);
				}
				?>

				<form action="php/add-part.php" method="post" class="form-horizontal" enctype="multipart/form-data">

					<div class="form-group">
						<label  class="col-xs-3 control-label"> Image :</label>
						<div class="col-xs-5">
							<input type="file" accept="image/*" class="form-control" name="part_img">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-xs-3 control-label"> Name :</label>
						<div class="col-xs-5">
							<input type="text" class="form-control" name="part_name" placeholder="Name" required="">
						</div>
					</div>


					<div class="form-group">
						<label  class="col-xs-3 control-label"> Company :</label>
						<div class="col-xs-5">
							<input type="text" class="form-control" name="part_company" placeholder="Company" required="">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-xs-3 control-label"> Size :</label>
						<div class="col-xs-5">
							<input type="text" class="form-control" name="part_size" placeholder="Size" required="">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-xs-3 control-label"> Weight :</label>
						<div class="col-xs-5">
							<div class="input-group">
								<input type="number" min="0"  class="form-control" name="part_price" placeholder="Weight" required="">
								<!--<span class="input-group-addon"><i class="fa fa-inr"></i></span>-->
							</div>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-xs-3 control-label"> Price :</label>
						<div class="col-xs-5">
							<div class="input-group">
								<input type="number" min="0" class="form-control" name="part_price" placeholder="Price" required="">
								<span class="input-group-addon"><i class="fa fa-inr"></i></span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-xs-3 control-label"> Stock:</label>
						<div class="col-xs-5">
							<input type="number" min="0" class="form-control" name="part_stock" placeholder="Stock" required="">
						</div>
					</div>

					<hr>

					<div class="form-group">
						<div class="col-xs-offset-4 col-xs-6">
							<button type="submit" name="doaddpart" class="btn btn-primary">ADD</button>&nbsp;
							<button type="reset" class="btn btn-default">RESET</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
