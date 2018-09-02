<?php 

	if (isset($_POST['doregister'])) 
	{
		require('connect.php');
		require('common_data.php');
		$fname = validate_input($_POST['fname']);
		$lname = validate_input($_POST['lname']);
		$mobile = validate_input($_POST['mobile']);
		$address = validate_input($_POST['address']);
		$email = validate_input($_POST['email']);
		$password = validate_input($_POST['pass']);
		$conf_password = validate_input($_POST['conf_pass']);
		$msg = "";
		$type = "error";

		if ($fname == "") 
		{
			$msg  = "Please Enter First Name";
			goto endreg;
		}
		if ($lname == "") 
		{
			$msg = "Please Enter Last Name";
			goto endreg;
		}
		if ($mobile == "") 
		{
			$msg = "Please Enter Mobile Number";
			goto endreg;
		}
		if ($address == "") 
		{
			$msg = "Please Enter Address";
			goto endreg;
		}
		if ($email == "") 
		{
			$msg = "Please Enter Username";
			goto endreg;
		}
		if ($password == "") 
		{
			$msg = "Please Enter Password";
			goto endreg;
		}
		if ($conf_password == "") 
		{
			$msg = "Please Enter Confirm Password";
			goto endreg;
		}
		if ($password != $conf_password) 
		{
			$msg = "Password and Confirm Password must be same";
			goto endreg;
		}
		else
		{
			$password = crypt($password,"sf2CvI9");
		}

		$user_ins_str = "INSERT INTO customers VALUES('','$fname','$lname','$email','$password','$mobile','$address')";
		$user_ins_que = mysqli_query($conn,$user_ins_str);

		$date = date("d.m.y");
		$noti_ins_str = "INSERT INTO admin_notification VALUES('','$date - New user $fname $lname registered on your site.')";
		$noti_ins_que = mysqli_query($conn,$noti_ins_str);

		if ($user_ins_que && $noti_ins_que) 
		{
			$type = "success";
			goto endreg;
		}
		else
		{
			$msg  = "There is some problem in registeration. Please try again later";
			goto endreg;
		}
		require('close.php');
	}
	else
	{
		echo '
          <script type="text/javascript">
            location.href="../register.php";
          </script>
        ';
	}
	endreg:
		if ($type=="error") 
		{
			$_SESSION['reg_err_msg'] = $msg;
		}
		else if ($type=="success")
		{
			$_SESSION['reg_success_msg']  = 'You have registered sucsessfully. Please login <a href="login.php" class="alert-link">here</a>';
		}
		else{}
		echo '
		<script type="text/javascript">
			location.href="../register.php";
		</script>
		';

?>