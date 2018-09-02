<?php 

	require('common_data.php');
	if (isset($_POST['doupdateorder']) && isset($_SESSION['admin_username'])) 
	{
		require('connect.php');

		$oid = validate_input($_POST['oid']);
		$status = validate_input($_POST['order_status']);

		$order_upd_string = "
					UPDATE orders
					SET status='".$status."'
					WHERE id='".$oid."'
					";
		$order_upd_query = mysqli_query($conn,$order_upd_string);

		if ($order_upd_query) 
		{
			$_SESSION['ord_upd_success'] = "The order ".$oid." is updated.";
			echo '
			<script type="text/javascript">
				location.href="../orders.php";
			</script>
			';
			die();
		}
		else
		{
			$_SESSION['ord_upd_err'] = "Error while updating order:".$oid." details to database.";
			echo '
			<script type="text/javascript">
			location.href="../orders.php";
			</script>
			';
			die();
		}
		require('close.php');
	}
	else
	{
		echo '
          <script type="text/javascript">
            location.href="../home.php";
          </script>
        ';
	}
?>