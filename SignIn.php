<?php
session_start();
include 'DBConn.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $studentno = $_POST['studentno'];
    $password = $_POST['password'];

    $select = mysqli_query($con, "SELECT * FROM tbluser WHERE email = '$email'");
    $row = mysqli_fetch_array($select);

    if($row){
        $status = $row['status'];
        $hashed_password = $row['password'];

        $check_user = password_verify($password, $hashed_password);

        if($check_user){
            $_SESSION["status"] = $status;
            $_SESSION["email"] = $email;
            $_SESSION["studentno"] = $studentno;
            $_SESSION["password"] = $hashed_password;

            if($status == "approved"){
                echo '<script type = "text/javascript">';
                echo 'alert("Login Success!");';
                header("Location: Shop/index.php");
				exit();
            } elseif($status == "pending"){
                echo '<script type = "text/javascript">';
                echo 'alert("Your account is still pending for approval!");';
                echo 'window.location.href = "SignIn.php"';
                echo '</script>';
            }
        } else {
            echo "Incorrect email or password";
        }
    } else {
        echo "Incorrect email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="./styleSignIn.css">
</head>
<body>
    <a href="Home.php"><img src="images/300.png" class="logo"></a>
    <nav>
    <ul>
        <li><a href="Home.php">HOME</a></li>
        <li><a href="AboutUS.php">About Us</a></li>
        <li><a href="adminSignIn.php">Admin</a></li>
        <li><a href="Register.php">Sign Up</a></li>
    </ul>
    </nav>
    <div class="login-form">
    <h1>Sign In</h1>
    <form action="SignIn.php" method="post">
        <p>Email/Username</p>
        <input type="text" name="email" placeholder="Email">
        <p>Student Number</p>
        <input type="text" name="studentno" placeholder="StudentNumber">
        <p>Password</p>
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="login">Sign In</button>
    </form>
    </div>
</body>
</html>
