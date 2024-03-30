<?php
include 'DBConn.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<title> Admin Approval </title>
	<nav style="background-color: black; color: white;  display: flex; justify-content: space-between; align-items: center; padding: 10px; ">
  <div>
    <h1 style="margin: 0;"><a href="index.php" style="color: white; text-decoration: none; font-size: 34px; font-family: Arial, sans-serif;">Admin</a></h1>
  </div>
  <ul style="list-style: none; margin: 0; display: flex; align-items: center;">
    <li style="margin-right: 130px;"><a href="AdminHome.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Home</a></li>
    <li style="margin-right: 100px;"><a href="Manage/Users/index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Users</a></li>
    <li style="margin-right: 100px;"><a href="Manage/Admins/index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Admins</a></li>
    <li style="margin-right: 100px;"><a href="Manage/Books/index.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Books</a></li>
    <li style="margin-right: 100px;"><a href="admin-approval.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Messages</a></li>
    <li><a href="admin-approval.php" style="color: white; text-decoration: none; font-size: 25px; font-family: Arial, sans-serif;">Requests</a></li>
  </ul>
</nav>
<style>
      body {
        margin: 0;
      }
      nav {
        background-color: black;
        color: white;
        height: 90px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
      }
      nav h1 {
        margin: 0;
        font-family: Arial, sans-serif;
      }
      nav ul {
        list-style: none;
        margin: 0;
        display: flex;
        align-items: center;
      }
      nav ul li {
        margin-right: 20px;
      }
      nav ul li:last-child {
        margin-right: 0;
      }
      nav a {
        color: white;
        text-decoration: none;
        font-family: Arial, sans-serif;
        font-size: 16px;
      }
	  div.center {
		margin-top: 50px;
		margin-left: 200px;
	  }
	  
	  h1 {
		margin-left: 200px;
		}
    </style>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="center">
  <h1>Registration Management</h1>

  <table id="users" class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM tbluser WHERE status = 'pending' ORDER BY id ASC";
      $result = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['surname']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td>
            <form action="admin-approval.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
              <button type="submit" name="approve" class="btn btn-success" onclick="location.reload();">Approve</button>
              <button type="submit" name="deny" class="btn btn-danger" onclick="location.reload();">Deny</button>
            </form>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>


<?php	
		
	if(isset($_POST['approve'])){
		$id = $_POST['id'];
		
		$select = "UPDATE tbluser SET status = 'approved' WHERE id = '$id'";
		$result = mysqli_query($con, $select);
		
		echo '<script type = "text/javascript">';
		echo 'alert("User Approval!")';
		header("Location: admin-approval.php");
		exit();
	}
	if(isset($_POST['deny'])){
		$id = $_POST['id'];
		$select = "DELETE FROM tbluser WHERE id = '$id'";
		$result = mysqli_query($con,$select);
		
		echo '<script type = "text/javascript">';
		echo 'alert("User Denied!")';
		header("Location: admin-approval.php");
		exit();
	}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>
