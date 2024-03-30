<?php
session_start();

include("DBConn.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//something was posted
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if(!empty($email) && !empty($password))
	{
		// read from database
		
		$query = 'select * from `tbladmin` where `email` = "'.$email.'" limit 1';
		
		$result = mysqli_query($con, $query);
		
		
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			if($user_data['password'] === $password)
			{
				$_SESSION['id'] = $user_data['id'];
				header("Location:AdminHome.php");
				die;
			}
		}
		
		header("Location: login.php");
		die;
	}else
	{
		echo "Please enter some valid information";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Sign In</title>
	<link rel="stylesheet" type="text/css" href="./styleSignIn.css">
</head>
<body>
	<a href = "Home.php"><img src ="images/300.png" class="logo"></a>
	<nav>
	<ul>
		<li><a href="Home.php">HOME</a><li>
		<li><a href="AboutUS.php">About Us</a><li>
		<li><a href="SignIn.php">Sign In </a><li>
		<li><a href="Register.php">Sign Up</a><li>
	</ul>
	</nav>
	<div class="login-form">
	<h1>Admin 
	Sign In </h1>
	<form action ="AdminHome.php" method ="post">
		<p>Email</p>
		<input type="text" name="email" placement="Email">
		<p>Password</p>
		<input type="text" name="password" placement="Password">
		<button type ="submit">Sign In</button>
	</form>
	</div>
</body>
</html>