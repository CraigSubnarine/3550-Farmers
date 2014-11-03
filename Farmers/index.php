<?php session_start(); ?>
<html class="no-js">
	<head>
		<title>Farmers</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
			body{
	                padding-top: 50px;
	                padding-bottom: 20px;
			}
			.stdheight{
					height: 525px;
					max-height: 525px;
			}
		</style>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/main.css">
		<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>

		<div class="container">
				<div class=" well col-lg-3 stdHeight" id="aboutSec">
					<h2>About</h2>
					<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
				</div>
				<div class="well col-lg-5 stdHeight" name="registerSec" id="registerSec">
					<?php if(!isset($_SESSION['username'])){ ?>
						<h2>Register</h2>
						<form action="register.php" method="post" name="registerFrom" id="registerForm">
							<div class="form-group">
								<label for="fname">First Name</label>
								<input type="text" class="form-control" id="fname" name="firstname" placeholder="Enter fname">
							</div>
							<div class="form-group">
								<label for="lname">Last Name</label>
								<input type="text" class="form-control" id="lname" name="lastname" placeholder="Enter lname">
							</div>
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
							</div>
							<div class="form-group">
								<label for="address">Username</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
							<input type="submit" class="btn btn-default" value="Register"/>
						</form>
						<?php } else { ?>
							<h1> Crops </h1>
							<button type="button" class="btn btn-default" onclick="loadTable()">View My Crops</button>
						<?php } ?>
				</div>
				<div class="well col-lg-3 stdHeight" id="loginSec">
					<?php if(!isset($_SESSION['username'])){ ?>
						<div id="lgdout">
							<h2>Login</h2>
							<form id="loginForm"  action="login.php" method="post" onsubmit="return validateLoginForm()">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Password">
								</div>
								<input type="submit" class="btn btn-default" value="Login"/>
							</form>
						</div>
					<?php } else { ?>
						<div id="lgdin">
							<?php echo "<h2> Welcome ".$_SESSION['username']."</h2>"; ?>
							<h3> Sell A Crop </h3>
							<form id="cropForm" action="crops.php" method="post">
								<div class="form-group">
									<label for="crop">Crop</label>
									<select class="form-control" value="Crops" name="crop" id="crop">
										<option>Banana</option>
										<option>Bodi</option>
										<option>Carrots</option>
										<option>Cassava</option>
										<option>Mango</option>
										<option>Orange</option>
									</select>
								</div>
								<div class="form-group">
									<label for="amount">Date</label>
									<input type="date" class="form-control" name="date" id="date">
								</div>
								<div class="form-group">
									<label for="amount">Amount</label>
									<input type="text" class="form-control" name="amount" id="amount">
								</div>
								<button type="submit" class="btn btn-default">Submit</button>
								<button type="submit" class="btn btn-default">Clear</button>
							</form>
							<form action="logout.php">
								<button type="submit" class="btn btn-default">Logout</button>
							</form>
						</div>
					<?php } ?>
				</div>
		</div>
		<hr>
		<footer><p>&copy; Company 2013</p></footer>
		<script src="js/vendor/jquery-2.1.1.js"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-2.1.1.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
