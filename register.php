<?php include "server.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  	<link rel="stylesheet" href="css/style.css">
  	<link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">
		<?php include "errors.php";?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username;?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email;?>">
		</div>
		<div class="input-group">
			<label>Discord ID</label>
			<input type="text" name="discord" value="<?php echo $discord;?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>