<?php

	require('common_data.php');

	if (isset($_POST['doeditpart']) && isset($_SESSION['admin_username'])) {

		require('connect.php');

		$msg = "";
		$type = "error";

		if ($_FILES['part_img']['name'] != "") {
			$part_img_name =  $_FILES['part_img']['name'];
			$part_img_type =  $_FILES['part_img']['type'];
			$part_img_size =  $_FILES['part_img']['size'];
			$part_img_temp =  $_FILES['part_img']['tmp_name'];
			$part_img_err =  $_FILES['part_img']['error'];
			if ($part_img_err > 0) {
				$msg = "Error in uploading file. Please upload valid Image file and size must be between 1 KB to 1MB. ";
				goto editpartend;
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
						goto editpartend;
					}
				}
				else {
					$msg = "Please upload vaild image file";
					goto editpartend;
				}
			}
		}
		else {
			$img_path = $_POST['old_img'];
		}

		$part_id =  validate_input($_POST['part_id']);
		$part_name =  validate_input($_POST['part_name']);
		$part_company =  validate_input($_POST['part_company']);
		$part_suitable =  validate_input($_POST['part_suitable_for']);
		$part_size =  validate_input($_POST['part_size']);
		$part_stock =  validate_input($_POST['part_stock']);
		$part_price =  validate_input($_POST['part_price']);

		if ($part_name == "") 
		{
			$msg = "Please enter part name";
			goto editpartend;
		}

		if ($part_size == "") 
		{
			$msg = "Please enter part size";
			goto editpartend;
		}

		if ($part_company == "") 
		{
			$msg = "Please enter part's company";
			goto editpartend;
		}

		if ($part_suitable == "") 
		{
			$msg = "Please enter part's suitable company";
			goto editpartend;
		}

		if ($part_stock == "") 
		{
			$msg = "Please enter part stock";
			goto editpartend;
		}

		if ($part_price == "") 
		{
			$msg = "Please enter part price";
			goto editpartend;
		}

		$part_edit_str = "
					UPDATE parts
					SET name='".$part_name."',
					image='".$img_path."',
					size='".$part_size."',
					price='".$part_price."',
					company='".$part_company."',
					suitable_for='".$part_suitable."',
					stock='".$part_stock."'
					WHERE id='".$part_id."'";

		$part_edit_que = mysqli_query($conn,$part_edit_str);
		if ($part_edit_que)
		{
			$msg = "Part ".$part_id." successfully updated";
			$type = "success";
			goto editpartend;
		}
		else
		{
			$msg = "Error while insertion of parts details to database";
			goto editpartend;
		}

		editpartend:
		require('close.php');
		if ($type == "success") 
		{
			$_SESSION['edit_part_success'] = $msg;
			echo '
			<script type="text/javascript">
				location.href="../all-parts.php";
			</script>
			';
			die();
		}
		else if($type == "error")
		{
			$_SESSION['edit_part_err'] = $msg;
			echo '
			<script type="text/javascript">
				location.href="../edit-part.php?id='.$part_id.'";
			</script>
			';
			die();
		}
		else{}
	}
	else {
		echo '
			<script type="text/javascript">
				location.href="../all-parts.php";
			</script>
			';
		die($msg);
	}
?>