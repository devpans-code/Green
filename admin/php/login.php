<?php 

	if (isset($_POST['doadminlogin'])) 
	{
		require('connect.php');
		require('common_data.php');

		$username = validate_input($_POST['username']);
		$password = validate_input($_POST['password']);

		$str = "SELECT * FROM admin_login WHERE username ='".$username."'";
		$que = mysqli_query($conn,$str);
		if (mysqli_num_rows($que) > 0) 
		{
			$row = mysqli_fetch_array($que);
			if ($password== $row['password'])
			{
				$_SESSION['admin_username'] = $row['username'];
				require('close.php');
				
				echo '
				<script type="text/javascript">
					location.href="../home.php";
				</script>
				';
				die();
			}
			else
			{
				require('close.php');
				$_SESSION['admin_login_msg'] = "Invalid Password";
				echo '
				<script type="text/javascript">
					location.href="../index.php";
				</script>
				';
				die();
			}
		}
		else
		{
			require('close.php');
			$_SESSION['admin_login_msg'] = "Invalid Username";
			echo '
			<script type="text/javascript">
				location.href="../index.php";
			</script>
			';
			die();
		}
	}
	else
	{
		echo '
		<script type="text/javascript">
			location.href="../index.php";
		</script>
		';
		die();
	}

?>