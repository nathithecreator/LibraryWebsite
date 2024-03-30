<?php

$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'bookstore');

if(isset($_POST['updatedata']))
{
	$id=$_POST['id'];
	$bookname =$_POST['book_name'];
	$price =$_POST['price'];
	$picture =$_POST['picture'];
	
	$query ='UPDATE tblbooks SET `id` = "'.$id.'", `book_name` = "'.$bookname.'",`price` = "'.$price.'",`picture` = "'.$picture.'" WHERE `id` = "'.$id.'" ';
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

