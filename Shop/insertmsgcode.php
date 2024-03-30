<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'bookstore');

if(isset($_POST['insertdata']))
{
	$message =$_POST['message'];
	
	// Retrieve the email from the session
	$email = $_SESSION["email"];
	
	$date = date('Y-m-d H:i:s'); // Get the current date and time in the format: YYYY-MM-DD HH:MM:SS


	// Assign the email value to the "user" label
	$user = $email;
	
	
	$query ='INSERT INTO `messagesusers` (`username`,`date`,`message`) VALUES("'.$user.'","'.$date.'","'.$message.'")';
	$query_run = mysqli_query($connection, $query);
	
	if($query_run)
	{
		echo '<script> alert("Data Saved");</script>';
		header('Location: index.php');
	}
	else
	{
		echo '<script> alert("Data Not Saved");</script>';
	}	
}

?>

