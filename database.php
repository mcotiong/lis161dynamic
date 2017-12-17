<?php
	session_start();

	//Initialize variables
	$username = "";
	$email = "";
	$discord = "";
	$id = 0;
	$edit_state = false;


	//Connect to database
	$con = mysqli_connect("localhost","root","","lis161_finalproject");
	if (!$con) {
		echo "Connection to database unsuccessful!";
	} else {
	//	echo "Connection success!";
	}


	//READ Records
	$member_records = mysqli_query($con,"SELECT * FROM users"); //Query all records


	//UPDATE Record
	if (isset($_POST['update'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$discord = $_POST['discord'];
		$id = $_POST['id'];

		//Prepare query statement
		$query = "UPDATE users SET 
		username='$username' ,
		email='$email' ,
		discord='$discord' 
		WHERE id='$id'";

		//Perform query 
		mysqli_query($con,$query);
		//Set status message
		$_SESSION['message'] = "Member record successfully updated!";
		//redirect user to homepage
		header('location: members.php');

	}

?>