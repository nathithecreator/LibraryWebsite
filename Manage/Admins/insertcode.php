<?php

$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'bookstore');

if(isset($_POST['insertdata']))
{
	$id=$_POST['id'];
	$email =$_POST['email'];
	$password =$_POST['password'];
	
	
	$query ='INSERT INTO `tbladmin` (`id`,`email`,`password`) VALUES("'.$id.'","'.$email.'","'.$password.'")';
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


