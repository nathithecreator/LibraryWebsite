<!DOCTYPE html>
<html>
<head>
	<title>Admin Home </title>
	<link rel="stylesheet" type="text/css" href="./styleAdminHome.css">
</head>
<body>
	<img src ="images/300.png" class="logo">
	<nav>
	<ul>
		<li><a href="Home.php">LOG OUT</a><li>
		<li><a href="Manage/Books/index.php">BOOKS </a><li>
		<li><a href="Manage/Users/index.php">USERS</a><li>
		<li><a href="Manage/Admins/index.php"> ADMINS</a><li>
		<li><a href="Manage/Messages/index.php"> MESSAGES</a><li>
	</ul>
	</nav>
	<div class="login-form">
	<h1>SAINT ROSÉ ADMIN </h1>
	<form action="#" method ="post">
		
		<button type ="submit"formaction="admin-approval.php">Approve Users</button>
		
		<button type ="submit"formaction="Shop/BookRequests.php">Book Requests</button>
		
		<button type ="submit"formaction="Manage/Messages/index.php">Write Message To User</button>
		
		<button type ="submit"formaction="Manage/Users/index.php">Manage Users Accounts</button>
		
		<button type ="submit"formaction="Manage/Admins/index.php">Manage Admin Accounts</button>
		
		
		<button type ="submit"formaction="Home.php">Log Out</button>
		
	</form>
	</div>
</body>
</html>