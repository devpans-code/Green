<?php
	require('common_data.php');
	if ( isset($_GET['pid']) && isset($_SESSION['admin_username']) ) {

		require('connect.php');

		$id = validate_input($_GET['pid']);

		$part_del_str = "DELETE FROM parts WHERE id='".$id."';";

		$part_del_que = mysqli_query($conn,$part_del_str);
		if ($part_del_que) 
		{
			$_SESSION['del_part_success'] = "Part successfully deleted";
			require 'close.php';
			echo '
			<script type="text/javascript">
				location.href="../all-parts.php";
			</script>
			';
			die();
		}
		else
		{
			$_SESSION['del_part_err'] = "Error while deleting part from database";
			require 'close.php';
			echo '
			<script type="text/javascript">
				location.href="../all-parts.php";
			</script>
			';
			die();
		}
	}
	else {
		echo '
			<script type="text/javascript">
				location.href="../home.php";
			</script>
			';
		die();
	}
?>