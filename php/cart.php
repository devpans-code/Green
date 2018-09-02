<?php

	require('connect.php');
	require('common_data.php');

	//add item
	if(isset($_POST["addPart"]))
	{
		$part_id = validate_input($_POST["id"]);
		$part_qty = validate_input($_POST["qty"]);

		$part_info_str = "SELECT * FROM parts WHERE id=".$part_id;
		$part_info_que = mysqli_query($conn,$part_info_str);
		$part_info_row = mysqli_fetch_array($part_info_que);

		$store_qty = $part_info_row['stock'];

		if ( $store_qty<$part_qty ) {
			$_SESSION['cart_err_msg'] = 'The quantity you have selected is not available at store ';
			require 'close.php';
			echo '
			<script type="text/javascript">
				location.href="../parts.php";
			</script>
			';
			die();
		}
		else
		{
			$part_img = $part_info_row['image'];
			$part_name = $part_info_row['name'];
			$part_company =  $part_info_row['company'];
			$part_suitable =  $part_info_row['suitable_for'];
			$part_size =  $part_info_row['size'];

			$part_price = $part_info_row['price'];
			$part_total_price = $part_qty*$part_price;

			$item_add = array(
				'id' => $part_id,
				'img' => $part_img,
				'name' => $part_name, 
				'company' => $part_company,
				'suitable_for' => $part_suitable,
				'size' => $part_size,
				'qty' => $part_qty,
				'price' => $part_price,
				'total' => $part_total_price
				);

			array_push ($_SESSION['cart'], $item_add);

			if ($_SESSION['cart_type'] == "new") {

				$cust_id = $_SESSION['cust_id'];
				$items_cart = json_encode($_SESSION['cart']);

				$cart_ins_str = "INSERT INTO cart VALUES('','$cust_id','$items_cart')";
				$cart_ins_que = mysqli_query($conn,$cart_ins_str);

				if ($cart_ins_que) 
				{
					$_SESSION['cart_add_msg'] = 'Part is added to your cart. View your cart <a class="alert-link" href="cart.php">here</a>';
					require 'close.php';
					echo '
					<script type="text/javascript">
						location.href="../parts.php";
					</script>
					';
					die();
				}
			}
			else if ($_SESSION['cart_type'] == "old") {
				$cust_id = $_SESSION['cust_id'];
				$items_cart = json_encode($_SESSION['cart']);

				$cart_update_str = "
				UPDATE cart
				SET cart_items='".$items_cart."'
				WHERE cust_id='".$cust_id."'
				";

				$cart_update_que = mysqli_query($conn,$cart_update_str);

				if ($cart_update_que) 
				{
					$_SESSION['cart_add_msg'] = 'Part is added to your cart. View your cart <a class="alert-link" href="cart.php">here</a>';
					require 'close.php';
					echo '
					<script type="text/javascript">
						location.href="../parts.php";
					</script>
					';
					die();
				}
			}
			else{
				echo '
				<script type="text/javascript">
					location.href="../parts.php";
				</script>
				';
				die();
			}		
		}
	}

	//delete Item
	if(isset($_GET["removeat"]))
	{
		$index = intval($_GET['removeat']);
		unset($_SESSION['cart'][$index]);
		$_SESSION['cart'] = array_values($_SESSION['cart']);

		if ( count($_SESSION['cart']) == 0 ) {
			
			$cust_id = $_SESSION['cust_id'];

			$cart_del_str = "DELETE FROM cart WHERE cust_id=".$cust_id.";";
			$cart_del_que = mysqli_query($conn,$cart_del_str);
			if ($cart_del_que) {
				unset($_SESSION['cart']);
				$_SESSION['cart'] = array();
				$_SESSION['cart_type'] = "new";
			}
		}
		else
		{
			$cust_id = $_SESSION['cust_id'];
			$items_cart = json_encode($_SESSION['cart']);

			$cart_update_str = "
			UPDATE cart
			SET cart_items='".$items_cart."'
			WHERE cust_id='".$cust_id."'
			";

			$cart_update_que = mysqli_query($conn,$cart_update_str);
		}

		require 'close.php';
		echo '
          <script type="text/javascript">
            location.href="../cart.php";
          </script>
        ';
        die();
	}

	//Empty cart
	if(isset($_GET["operation"]) && $_GET["operation"]=="empty_cart")
	{
		$cust_id = $_SESSION['cust_id'];

		$cart_del_str = "DELETE FROM cart WHERE cust_id=".$cust_id.";";
		$cart_del_que = mysqli_query($conn,$cart_del_str);
		if ($cart_del_que) {
			unset($_SESSION['cart']);
			$_SESSION['cart'] = array();
			$_SESSION['cart_type'] = "new";
		}
		require 'close.php';
		echo '
          <script type="text/javascript">
            location.href="../cart.php";
          </script>
        ';
        die();
	}

	//Place Order
	if(isset($_GET["operation"]) && $_GET["operation"] == "checkout")
	{

		//Update Stock
		$cart = $_SESSION['cart'];
		$total_items = count($cart);

		for ($i=0; $i < $total_items ; $i++) {

			$item_id = $cart[$i]['id'];
			$cart_stock = $cart[$i]['qty'];
			$store_stock = 0;
			$new_stock = 0;

			$order_check_string = "SELECT stock FROM parts WHERE id=".$item_id." ";
			$order_check_que = mysqli_query($conn,$order_check_string);
			$order_check_row = mysqli_fetch_array($order_check_que);

			$store_stock = $order_check_row['stock'];
			$new_stock = $store_stock-$cart_stock;

			$order_stock_update_string = "
				UPDATE parts
				SET stock='".$new_stock."'
				WHERE id='".$item_id."'
			";

			$order_stock_update_que = mysqli_query($conn,$order_stock_update_string);
			if (!$order_stock_update_que) 
			{
				$_SESSION['order_fail_msg'] = 'There is some error in processing your order. Please try again later';
				require 'close.php';
				echo '
				<script type="text/javascript">
					location.href="../cart.php";
				</script>
				';
				die();
			}
		}

		//Add order to database
		$cust_id = $_SESSION['cust_id'];
		$items_order = json_encode($_SESSION['cart']);

		$order_ins_str = "INSERT INTO orders VALUES('','$cust_id','$items_order','pending')";
		$order_ins_que = mysqli_query($conn,$order_ins_str);

		$date = date("d.m.y");
		$noti_ins_str = "INSERT INTO admin_notification VALUES('','$date - A new order has placed on your site.')";
		$noti_ins_que = mysqli_query($conn,$noti_ins_str);

		if ($order_ins_que) 
		{
			unset($_SESSION['cart']);
			$_SESSION['order_success_msg'] = 'Your order is recieved. You will recieve your items in 2 to 5 working days. You can also check your order status by opening your order\'s page. Thank You for shopping with us.';
			require('close.php');
			echo '
			<script type="text/javascript">
				location.href="../orders.php";
			</script>
			';
			die();
		}
		else
		{
			$_SESSION['order_fail_msg'] = 'There is some error in processing your order. Please try again later';
			require 'close.php';
			echo '
			<script type="text/javascript">
				location.href="../cart.php";
			</script>
			';
			die();
		}
	}
	require 'close.php';
	echo '
	<script type="text/javascript">
		location.href="../parts.php";
	</script>
	';
	die();
?>