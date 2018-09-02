<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Your Cart</title>
	<?php include 'include/head.php'; ?>
</head>

<body>

	<?php include 'include/navbar.php'; ?>
	<?php if (!isset($_SESSION['cust_id'])) {
		echo '
		<script type="text/javascript">
			location.href="parts.php";
		</script>
		';
	} ?>

	<header class="nav-bg">
	</header>

	<div class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Your Cart</h2>
					<span>Your online bag</span>
				</div>
			</div>
		</div>
	</div>

	<div class="container cart-container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">

				<?php

				if (isset($_SESSION['order_fail_msg'])) 
				{
					$msg = $_SESSION['order_fail_msg'];
					echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
					unset($_SESSION['order_fail_msg']);
				}

				if (isset($_SESSION['cart']) && count($_SESSION['cart']) !== 0) {

					echo '
					<table class="table table-bordered cart-table" style="font-size:16px;">
						<thead>
							<tr>
								<th class="cart-product-hd">Product</th>
								<th class="cart-description-hd">Description</th>
								<th class="cart-unit-hd">Unit price</th>
								<th class="cart-qty-hd">Quantity</th>
								<th class="cart-total-hd">Total Price</th>
								<th class="cart-delete-hd">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							';

							$cart = $_SESSION['cart'];
							$total_items = count($cart);
							$total_price = 0;

							for ($i=0; $i < $total_items ; $i++) {
								$total_price+=$cart[$i]['total'];
								echo '
								<tr class="cart-item">
									<td class="cart-img">
										<img src="'.$cart[$i]['img'].'">
									</td>
									<td class="cart-info">
										<p class="product-name alt-font">'.$cart[$i]['name'].'</p>
										<small > '.$cart[$i]['company'].' </small>
										<small> '.$cart[$i]['suitable_for'].' </small>
										<small> '.$cart[$i]['size'].' </small>
									</td>
									<td class="cart-price">
										<span class="alt-font">'.$cart[$i]['price'].' <i class="fa fa-inr"></i></span>
									</td>
									<td class="text-center cart-qty">
										<span class="alt-font">'.$cart[$i]['qty'].'</span>
									</td>
									<td class="cart-price">
										<span class="alt-font">'.$cart[$i]['total'].' <i class="fa fa-inr"></i></span>
									</td>
									<td class="text-center">
										<div>
											<a class="cart-quantity-delete" href="php/cart.php?removeat='.$i.'"><i class="fa fa-lg fa-trash-o"></i></a>
										</div>
									</td>
								</tr>
								';
							}

							echo '
						</tbody>
						<tfoot>
							<tr class="cart-foot">
								<td colspan="4" class="text-right alt-font">Total Amount</td>
								<td colspan="3" class="alt-font" >'.$total_price.' <i class="fa fa-inr"></i></td>
							</tr>
						</tfoot>
					</table>
					<div class="pull-right">
						<a class="btn btn-primary" href="php/cart.php?operation=checkout"><i class="fa fa-fw fa-lg fa-cart-arrow-down"></i>Check Out</a>

						<a class="btn btn-danger" href="php/cart.php?operation=empty_cart"><i class="fa fa-lg fa-fw fa-trash-o"></i>Empty Cart</a>
					</div>
					';
				}
				else
				{
					echo '
					<div class="nodata">
						<i class="fa fa-cart-arrow-down fa-2x"></i>
						<p>Your cart is empty.</p>
					</div>
					';
				}
				?>

			</div> 
		</div>
	</div>

	<?php include 'include/footer.php'; ?>

</body>

</html>
