<?php

$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'bookstore');

if(isset($_POST['delete']))
{
	$id=$_POST['id'];
	
	$query ='DELETE FROM `bookrequests` WHERE `id` = "'.$id.'"';
	$query_run = mysqli_query($connection, $query);
	
	if($query_run)
	{
		echo '<script> alert("Data Updated");</script>';
		header('Location:BookRequests.php');
	}
	else
	{
		echo '<script> alert("Data Not Updated");</script>';
	}	
}

?>