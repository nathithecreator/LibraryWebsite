<?php

$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'bookstore');

if(isset($_POST['insertdata']))
{
    $id=$_POST['id'];
    $name =$_POST['name'];
    $surname =$_POST['surname'];
    $email =$_POST['email'];
	$studentno =$_POST['studentno'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $status =$_POST['status'];
    
    $query ='INSERT INTO `tbluser` (`id`,`name`,`surname`,`email`,`studentno`,`password`,`status`) VALUES("'.$id.'","'.$name.'","'.$surname.'","'.$email.'","'.$studentno.'","'.$password.'","'.$status.'")';
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


