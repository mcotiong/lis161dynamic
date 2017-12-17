<?php include "server.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  	<link rel="stylesheet" href="css/style.css">
  	<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

	<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right">
    </a>
    <a href="index.php" class="w3-bar-item w3-button">HOME</a>
    <a href="about.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> ABOUT</a>
    <a href="members.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> MEMBERS</a>
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small "><i class="fa fa-shield"></i> LOG-IN</a>
  </div>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">
		<!-- Alert for record save -->
  		<?php if (isset($_SESSION['warning'])) { ?>
    	<div class="error">
      	<?php
        	echo $_SESSION['warning'];
        	unset($_SESSION['warning']);
      	?>
    	</div>
  		<?php } ?>
  		
		<?php include "errors.php" ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>

</body>
</html>