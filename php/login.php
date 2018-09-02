<?php 

	if (isset($_POST['dologin'])) 
	{
		require('common_data.php');
		require('connect.php');

		$username = validate_input($_POST['username']);
		$password = validate_input($_POST['password']);

		$str = "SELECT * FROM customers WHERE email = '".$username."'";
		$que = mysqli_query($conn,$str);
		if (mysqli_num_rows($que) > 0) 
		{
			$row = mysqli_fetch_array($que);
			if (crypt($password,"sf2CvI9")==$row['password']) 
			{
				$_SESSION['cust_id'] = $row['customer_id'];
				$_SESSION['cust_name'] = $row['first_name']." ".$row['last_name'];
				
				$cart_str = "SELECT * FROM cart WHERE cust_id = '".$_SESSION['cust_id']."'";
				$cart_que = mysqli_query($conn,$cart_str);

				if (mysqli_num_rows($cart_que) > 0) {
					$row = mysqli_fetch_array($cart_que);
					$_SESSION['cart'] = json_decode($row['cart_items'],true);
					$_SESSION['cart_type'] = "old";
				}
				else
				{
					$_SESSION['cart'] = array();
					$_SESSION['cart_type'] = "new";
				}

				require('close.php');
				echo '
				<script type="text/javascript">
					location.href="../index.php";
				</script>
				';
			}
			else
			{
				require('close.php');
				$_SESSION['login_msg'] = "Invalid Password";
				echo '
				<script type="text/javascript">
					location.href="../login.php";
				</script>
				';
			}
		}
		else
		{
			require('close.php');
			$_SESSION['login_msg'] = "Invalid Username";
			echo '
			<script type="text/javascript">
				location.href="../login.php";
			</script>
			';
		}
	}
	else
	{
		echo '
		<script type="text/javascript">
			location.href="../login.php";
		</script>
		';
	}

?>