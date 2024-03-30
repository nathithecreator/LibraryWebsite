<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="./styleLogin.css">
</head>
<body>
	<a href="Home.php"><img src="images/300.png" class="logo"></a>
	<nav>
		<ul>
			<li><a href="Home.php">HOME</a></li>
			<li><a href="AboutUS.php">About Us</a></li>
			<li><a href="SignIn.php">Sign In </a></li>
			<li><a href="Register.php">Sign Up</a></li>
		</ul>
	</nav>
	<div class="login-form">
		<h1>Sign Up</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<p>Name</p>
			<input type="text" name="fname" placeholder="User Name" required>
			<p>Surname</p>
			<input type="text" name="lname" placeholder="User Surname" required>
			<p>Student Number</p>
			<input type="text" name="studentno" placeholder="Student Number" required>
			<p>Email</p>
			<input type="text" name="email" placeholder="Email" required>
			<p>Password</p>
			<input type="password" name="password" placeholder="Password" required>
			<button type="submit" name="Register" value="Register">Sign Up</button>
		</form>
	</div>
<?php
include 'DBConn.php';

	if(isset($_POST['Register'])){
	
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
	$studentno = mysqli_real_escape_string($con, $_POST['studentno']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $select = "SELECT * FROM tbluser WHERE email = '$email'";
    $result = mysqli_query($con,$select);

    if(mysqli_num_rows($result) > 0){
        echo '<script type="text/javascript">';
        echo 'alert("Email Already Taken!")';
        echo 'window.location.href = "Register.php"';
        echo '</script>';
    }else{
        $register = "INSERT INTO tbluser (name, surname, email, studentno, password) VALUES ('$fname', '$lname', '$email', '$studentno', '$hashed_password')";
        mysqli_query($con, $register);
        echo '<script type="text/javascript">';
        echo 'alert("Your account is now pending for approval!")';
        header("Location: thankYou.php");
		exit();

        echo '</script>';
		}
	}

	mysqli_close($con);

	?>
</body>
</html>