<?php

$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'bookstore');

if(isset($_POST['delete']))
{
	$id=$_POST['id'];
	
	$query ='DELETE FROM `tbluser` WHERE `id` = "'.$id.'"';
	$query_run = mysqli_query($connection, $query);
	
	if($query_run)
	{
		echo '<script> alert("Data Updated");</script>';
		header('Location:index.php');
	}
	else
	{
		echo '<script> alert("Data Not Updated");</script>';
	}	
}

?>