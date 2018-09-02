<?php session_start(); ?>
<div class="nav-container">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="info-bar">
					<!--<span class="alt-font"><i class="fa fa-envelope-o fa-fw"></i>plant_nursery@gmail.com</span>-->
					<span class="alt-font"><i class="fa fa-envelope-o fa-fw"></i>&nbsp;green_land@gmail.com</span>
					<div class="pull-right">
						<?php 
							if (isset($_SESSION['cust_id'])) {
								echo '<span class="alt-font user-welcome">WelCome '.$_SESSION['cust_name'].' </span>';
								echo '<a class="btn btn-primary" href="php/logout.php">Logout</a>';
							}
							else
							{
								echo '<a class="btn btn-primary" href="login.php">Login</a> ';	
								echo ' <a class="btn btn-success" href="register.php">register</a>';	
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<i class="fa fa-navicon fa-lg"></i>
					</button>
					<a class="navbar-brand hidden-lg hidden-md hidden-sm" href="#">Menu</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav logo-nav">
						<li><a class="logo" href="index.php"></a></li>
					</ul>
					<ul class="nav navbar-nav alt-font main-nav">
						<li><a href="index.php">Home</a></li>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="parts.php">All Products</a></li>
								<li><a href="parts.php?company=GGN-PLANTs">Plants</a></li>
								<li><a href="parts.php?company=GGN-TOOLS">Farming Tools</a></li>
								<li><a href="parts.php?company=GGN-STAND">Stands</a></li>
								<li><a href="parts.php?company=GGN-POT">Pots</a></li>
								<li><a href="parts.php?company=GGN-PEBBS">Pebbs</a></li>
								<li><a href="parts.php?company=GGN-FER">Fertilizers</a></li>
								<!--<li><a href="parts.php?company=cars"></a></li>
								<li><a href="parts.php?company=trailor"></a></li>-->
							</ul>
						</li>
						
						<li><a href="about.php">About Us</a></li>
						<li><a href="contact.php">Contact Us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right alt-font cart-nav">
						<?php 
							if (isset($_SESSION['cust_id'])) {
								echo '<li><a href="cart.php"><i class="fa fa-lg fa-shopping-cart"></i>  Your Cart</a></li>
									<li><a href="orders.php"><i class="fa fa-lg fa-cart-arrow-down"></i>  Your Orders</a></li>
								';
							}
						?>
					</ul>
				</div><!--/.nav-collapse -->
		</nav><!--/ Nav End -->
	</div>
</div>