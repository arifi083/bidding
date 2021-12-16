<div class="row">
	<div class="col-md-12">

		<h1 style="margin-bottom: 10px"><a href="index.php"><u>Auction Management System</u></a></h1>
		<h4>Place your bid to win !</h4>

	</div>

	<div class="row clearfix" style="margin-top:40px;">
		<div class="col-md-12 col-xs-12 column">
			<ul class="nav nav-pills navbar-static-top">

				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="#">About Us</a>
				</li>
				<li>
					<a href="#">Services</a>
				</li>
				<li>
					<a href="#">Terms & Policy</a>
				</li>
				<li>
					<a href="#">Contact Us</a>
				</li>
				
				
				<?php
if (isset( $_SESSION['user'])) {
				?>
				<li>
					<?php
					require 'view/submit_ad.php';
					?>
				</li>
				<?php } ?>
				
								
				<li class="pull-right"> . </li>

				<?php
if (!isset($_SESSION['user'])) {
				?>
				<li class="pull-right">
					<?php
					require 'login_signup.php';
					?>
				</li>
				<?php } ?>
				
				<?php
if (isset( $_SESSION['user'])) {
				?>
				<li class="pull-right">
					<form method="post" action="user.php">
						<input name="logout"  class="btn btn-danger" value="Logout" type="submit" />
					</form>
				</li>
				<?php } ?> <li class="pull-right"> . </li>

				<li class="pull-right">
					<form method="get" action="products.php">
						<input name="srch" type="text" class="form-control" placeholder="Search for...">
						<input type="submit" style="display: none;" name="search" />
					</form>

				</li>
				
			</ul>
		</div>
	</div>
