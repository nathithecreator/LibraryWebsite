<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'bookstore');

if(isset($_POST['insertdata']))
{
	$title =$_POST['title'];
	$author =$_POST['author'];
	$description =$_POST['description'];
	$price =$_POST['price'];
	$picture =$_POST['picture'];
	// Retrieve the email from the session
	$email = $_SESSION["email"];

	// Assign the email value to the "seller" label
	$seller = $email;
	
	$query ='INSERT INTO `bookrequests` (`seller`,`title`,`author`,`description`,`price`,`picture`) VALUES("'.$seller.'","'.$title.'","'.$author.'","'.$description.'","'.$price.'","'.$picture.'")';
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

