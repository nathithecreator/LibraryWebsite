<?php

$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'bookstore');

if(isset($_POST['insertdata']))
{
	$id=$_POST['id'];
	$bookname =$_POST['book_name'];
	$price =$_POST['price'];
	$picture =$_POST['picture'];
	
	$query ='INSERT INTO `tblbooks` (`id`,`book_name`,`price`,`picture`) VALUES("'.$id.'","'.$bookname.'","'.$price.'","'.$picture.'")';
	$query_run = mysqli_query($connection, $query);
	
	if($query_run)
	{
		echo '<script> alert("Data Saved");</script>';
		header('Location: BookRequests.php');
	}
	else
	{
		echo '<script> alert("Data Not Saved");</script>';
	}	
}

?>


