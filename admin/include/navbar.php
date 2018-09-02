<div class="nav-container">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="info-bar">
					<span class="alt-font"><i class="fa fa-envelope-o fa-fw"></i>green_land@gmail.com</span>
					<div class="pull-right">
						<?php 
							if (isset($_SESSION['admin_username']))
							{
								echo '<a class="btn btn-primary" href="php/logout.php">Logout</a>';
							}
							else
							{
								echo '<a class="btn btn-primary" href="index.php">Login</a>';
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
					<!--<a class="navbar-brand hidden-lg hidden-md hidden-sm" href="#">Menu</a>-->
				</div>
				<div id="navbar" class="navbar-collapse collapse">

					<ul class="nav navbar-nav logo-nav">
						<li><a class="logo" href="home.php"></a></li>
					</ul>

					<?php 
						if (isset($_SESSION['admin_username'])) {
							echo '
							<ul class="nav navbar-nav alt-font main-nav">
								<li>
									<a href="home.php">Dashboard</a>
								</li>
								<li>
									<a href="all-users.php">Registered Users</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Products <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="add-part.php"><i class="fa fa-fw fa-plus"></i>Add Part</a></li>
										<li><a href="all-parts.php"><i class="fa fa-fw fa-reorder"></i>All Parts</a></li>
									</ul>
								</li>
								<li>
									<a href="inquiries.php">Inquiries</a>
								</li>
								<li>
									<a href="orders.php">Orders</a>
								</li>
								<li>
									<a href="notification.php">Notification</a>
								</li>
							</ul>
							';
						}
					?>
					<ul class="nav navbar-nav navbar-right client-nav alt-font">
						<li><a target="_blank" href="../">Client Side</a></li>
					</ul>
				</div><!--/.nav-collapse -->
		</nav><!--/ Nav End -->
	</div>
</div>