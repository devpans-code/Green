<?php 
	session_start();
	function validate_input ($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$array = explode('\'',$data);
		$str = "";
		foreach ($array as $data) 
		{
			$str .= $data;
		}
		return $str;
	}
?>