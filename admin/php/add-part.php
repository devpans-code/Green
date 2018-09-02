<?php

	require('common_data.php');
	
	if (isset($_POST['doaddpart']) && isset($_SESSION['admin_username'])) {

		require('connect.php');

		$msg = "";
		$type = "error";

		if ($_FILES['part_img']['name']!= "") {
			$part_img_name =  $_FILES['part_img']['name'];
			$part_img_type =  $_FILES['part_img']['type'];
			$part_img_size =  $_FILES['part_img']['size'];
			$part_img_temp =  $_FILES['part_img']['tmp_name'];
			$part_img_err =  $_FILES['part_img']['error'];

			if ($part_img_err > 0) {
				$msg = "Error in uploading file. Please upload valid Image file and size must be between 1 KB to 1MB. ";
				goto addpartend;
			}
			else
			{
				if ($part_img_type == "image/jpeg" || $part_img_type == "image/png" || $part_img_type == "image/gif") {
					if ($part_img_size < 1000000 && $part_img_size > 1000 && $part_img_size != 0) {
						move_uploaded_file($part_img_temp, "../../images/parts/".$part_img_name);
						$img_path = "images/parts/".$part_img_name;
					}
					else {
						$msg = "Image size must be between 1 KB to 1MB";
						goto addpartend;
					}
				}
				else {
					$msg = "Please upload vaild image file";
					goto addpartend;
				}
			}
		}
		else
		{
			$img_path = "images/parts/part.png";
		}

		$part_name =  validate_input($_POST['part_name']);
		$part_company =  validate_input($_POST['part_company']);
		$part_suitable =  validate_input($_POST['part_suitable_for']);
		$part_size =  validate_input($_POST['part_size']);
		$part_stock =  validate_input($_POST['part_stock']);
		$part_price =  validate_input($_POST['part_price']);

		if ($part_name == "") 
		{
			$msg = "Please enter part name";
			goto addpartend;
		}

		if ($part_size == "") 
		{
			$msg = "Please enter part size";
			goto addpartend;
		}

		if ($part_company == "") 
		{
			$msg = "Please enter part's company";
			goto addpartend;
		}

		if ($part_stock == "") 
		{
			$msg = "Please enter part stock";
			goto addpartend;
		}

		if ($part_price == "") 
		{
			$msg = "Please enter part price";
			goto addpartend;
		}

		$part_ins_str = "INSERT INTO parts VALUES('','$part_name','$img_path','$part_size','$part_price','$part_company','$part_suitable','$part_stock')";

		$part_ins_que = mysqli_query($conn,$part_ins_str);
		if ($part_ins_que) 
		{
			$msg = "Part added";
			$type = "success";
			goto addpartend;
		}
		else
		{
			$msg = "Error while insertion of part details to database";
			goto addpartend;
		}

		addpartend:
		require('close.php');
		if ($type == "success") 
		{
			$_SESSION['add_part_success'] = $msg;
		}
		else if($type == "error")
		{
			$_SESSION['add_part_err'] = $msg;
		}
		else{}
			echo '
		<script type="text/javascript">
			location.href="../add-part.php";
		</script>
		';
		die();
	}
	else {
		echo '
		<script type="text/javascript">
			location.href="../add-part.php";
		</script>
		';
		die();
	}
?>