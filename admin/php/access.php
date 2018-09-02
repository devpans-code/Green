<?php
	session_start();
	if (!isset($_SESSION['admin_username'])) 
	{
		echo '
		  <script type="text/javascript">
			location.href="index.php";
		  </script>
		';
		die();
	}
?>