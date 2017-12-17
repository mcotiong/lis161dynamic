<?php

	session_start();
	//Initialize variables
	$username = "";
	$email = "";
	$discord ="";
	$password_1 = "";
	$password_2 = "";
	$password = "";
	$errors = array();

	//Connect to database
	$con = mysqli_connect("localhost","root","","lis161_finalproject");
	//Check if there are errors in connection
	if (!$con) {
		echo "Database connection error!";
	}

	//If register button is clicked
	if (isset($_POST['reg_user'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$discord = $_POST['discord'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];

		//Check if all fields have values
		if (empty($username)) {
			array_push($errors, "Username should not be blank");
		}
		if (empty($email)) {
			array_push($errors, "Email should not be blank");
		}
		if (empty($discord)) {
			array_push($errors, "Discord ID should not be blank");
		}
		if (empty($password_1)) {
			array_push($errors, "Password should not be blank");
		}
		if ($password_2 != $password_1) {
			array_push($errors, "Please retype password");
		}

		//If there is no errors in the input fields
		if (count($errors)==0) {
			$password = md5($password_1); //encrypt password
			//Prepare query statement
			$query = "INSERT INTO users(username,email,discord,password)
			VALUES ('$username','$email','$discord','$password')";
			//perform query
			mysqli_query($con,$query);
			//set session variables
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You have successfully registered";
			//redirect the user
			header("location: members.php");
		}
	}

	//if log-in button is clicked
	if (isset($_POST['login_user']))  {
		$username = $_POST['username'];
		$password = $_POST['password'];
		//input verification
		if (empty($username)) {
			array_push($errors, "Username should not be blank");
		}
		if (empty($password)) {
			array_push($errors, "Password should not be blank");
		}
		//if there are no error in the input field
		if (count($errors) == 0) {
			$password = md5($password); //encrypt password
			//prepare query statement
			$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
			//perform query
			$result = mysqli_query($con,$query);
			//check if there is a record returned
			if (mysqli_num_rows($result) == 1) {
				//set session variables
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You have successfully logged-in";
				//redirect the user
				header("location: members.php");
			}	else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	//if log-out button is clicked
	if (isset($_GET['logout'])) {
		session_destroy(); //destroy session
		unset($_SESSION['username']); //unset session var
		//redirect user
		header("location: login.php");
	}
?>