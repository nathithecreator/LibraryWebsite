<?php

$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'bookstore');

if(isset($_POST['updatedata']))
{
    $id=$_POST['id'];
    $name =$_POST['name'];
    $surname =$_POST['surname'];
    $email =$_POST['email'];
    $studentno =$_POST['studentno'];
    $password =$_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // hash the password using password_hash()
    $status =$_POST['status'];

    $query ='UPDATE tbluser SET `id` = "'.$id.'", `name` = "'.$name.'", `surname` = "'.$surname.'",`email` = "'.$email.'",`studentno` = "'.$studentno.'",`password` = "'.$hashed_password.'",`status` = "'.$status.'" WHERE `id` = "'.$id.'" ';
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

