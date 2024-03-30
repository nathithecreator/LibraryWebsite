<?php

$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'bookstore');

if(isset($_POST['insertdata']))
{
    $user=$_POST['username'];
    $message =$_POST['message'];
    $date = date('Y-m-d H:i:s'); // Get the current date and time in the format: YYYY-MM-DD HH:MM:SS

    
    $query ='INSERT INTO `messagesadmin` (`username`,`date`,`message`) VALUES("'.$user.'","'.$date.'","'.$message.'")';
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


