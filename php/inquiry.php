<?php 

	if (isset($_POST['send_inquiry'])) 
	{
		require('connect.php');
		require('common_data.php');

		$name = validate_input($_POST['name']);
		$email = validate_input($_POST['email']);
		$mobile = validate_input($_POST['mobile']);
		$message = validate_input($_POST['message']);
		$msg = "";
		$type = "error";

		if ($name == "") 
		{
			$msg = "Please Enter Your Name";
			goto inqend;
		}
		if ($email == "") 
		{
			$msg = "Please Enter Your email";
			goto inqend;
		}
		if ($mobile == "") 
		{
			$msg = "Please Enter Your Mobile No";
			goto inqend;
		}
		if ($message == "") 
		{
			$msg = "Please Enter Message";
			goto inqend;
		}

		$inq_ins_str = "INSERT INTO inquiry VALUES('','$name','$email','$mobile','$message')";
		$inq_ins_que = mysqli_query($conn,$inq_ins_str);
		require('close.php');
		if ($inq_ins_que) 
		{
			$type = "success";
			goto inqend;
		}
		else
		{
			$msg = "There is some error in sending your message please try again later or mail us at info@srautoparts.com";
			goto inqend;
		}
	}
	else{
		echo '
          <script type="text/javascript">
            location.href="../contact.php";
          </script>
        ';
	}
	inqend:
		if ($type=="error") 
		{
			$_SESSION['inq_err_msg'] = $msg;
		}
		else if ($type=="success")
		{
			$_SESSION['inq_success_msg']  = 'Your message is recieved. We will get back to you soon.' ;
		}
		else{}
		echo '
		<script type="text/javascript">
			location.href="../contact.php";
		</script>
		';
?>