<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Edit Part</title>
	<?php include 'include/head.php'; include 'php/access.php';?>
</head>

<body>

	<?php include 'include/navbar.php'; ?>
	<?php 
	if (isset($_GET['id'])) 
	{                  
		$id =  $_GET['id'];
	}
	else
	{
		echo '
		<script type="text/javascript">
			location.href="all-parts.php";
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
			location.href="all-parts.php";
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
					<h2>Edit Part</h2>
					<span>Edit a part details or stock imformation.</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container first-container">
		<div class="row">
			<div class="col-xs-12">

				<?php
					if (isset($_SESSION['edit_part_err'])) 
					{
						$msg = $_SESSION['edit_part_err'];
						echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
						unset($_SESSION['edit_part_err']);
					}
				?>

				<form action="php/edit-part.php" method="post" class="form-horizontal" enctype="multipart/form-data">

					<div class="form-group">
						<label  class="col-xs-3 control-label">Part Image :</label>
						<div class="col-xs-2">
							<img src="<?php echo '../'.$part_info_row['image']; ?>" class="img-responsive thumbnail">
							<input type="hidden" name="old_img" value="<?php echo $part_info_row['image']; ?>">
							<input type="hidden" name="part_id" value="<?php echo $part_info_row['id']; ?>">
						</div>
						<div class="col-xs-5 col-xs-offset-3" style="clear:both;">
							<input type="file" accept="image/*" class="form-control" name="part_img">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-xs-3 control-label">Part Name :</label>
						<div class="col-xs-5">
							<input type="text" class="form-control" name="part_name" value="<?php echo $part_info_row['name']; ?>" placeholder="Part Name" required="">
						</div>
					</div>


					<div class="form-group">
						<label  class="col-xs-3 control-label">Part Company :</label>
						<div class="col-xs-5">
							<input type="text" class="form-control" name="part_company" value="<?php echo $part_info_row['company']; ?>" placeholder="Part Company" required="">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-xs-3 control-label">Suitable For :</label>
						<div class="col-xs-5">
							<select class="form-control" name="part_suitable_for">
								<option
								<?php if(strtoupper($part_info_row['suitable_for']) == "GGN-PLANTS")echo "selected"; ?>
								>GGN-PLANTS</option>
								<option
								<?php if(strtoupper($part_info_row['suitable_for']) == "GGN-POT")echo "selected"; ?>
								>GGN-POT</option>
								<option
								<?php if(strtoupper($part_info_row['suitable_for']) == "GGN-PEBBS")echo "selected"; ?>
								>GGN-PEBBS</option>
								<option
								<?php if(strtoupper($part_info_row['suitable_for']) == "GGN-TOOLS")echo "selected"; ?>
								>GGN-TOOLS</option>
								<option
								<?php if(strtoupper($part_info_row['suitable_for']) == "GGN-STAND")echo "selected"; ?>
								>GGN-STAND</option>
								<option
								<?php if(strtoupper($part_info_row['suitable_for']) == "GGN-FER")echo "selected"; ?>
								>GGN-FER</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-xs-3 control-label">Part Weight :</label>
						<div class="col-xs-5">
							<input type="text" class="form-control" name="part_size" value="<?php echo $part_info_row['size']; ?>" placeholder="Part Size" required="">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-xs-3 control-label">Part Price :</label>
						<div class="col-xs-5">
							<div class="input-group">
								<input type="number" class="form-control" name="part_price" value="<?php echo $part_info_row['price']; ?>" placeholder="Part Price" required="">
								<span class="input-group-addon"><i class="fa fa-inr"></i></span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-xs-3 control-label">Part Stock:</label>
						<div class="col-xs-5">
							<input type="number" min="0" class="form-control" name="part_stock" value="<?php echo $part_info_row['stock']; ?>" placeholder="Part Stock" required="">
						</div>
					</div>

					<hr>

					<div class="form-group">
						<div class="col-xs-offset-4 col-xs-6">
							<button type="submit" name="doeditpart" class="btn btn-primary">EDIT</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
