<?php
// Establish database connection
include 'DBConn.php';

// Check if table exists
$tableExists = mysqli_query($con, "SELECT 1 FROM tblUser");

if($tableExists) {
  // If table exists, delete it
  mysqli_query($con, "DROP TABLE tblUser");
}

// Create table
mysqli_query($con, "CREATE TABLE tblUser (
  userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstName VARCHAR(30) NOT NULL,
  lastName VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(255),
  studentno VARCHAR(20) NOT NULL,
  status VARCHAR(20) DEFAULT 'pending'
)");

// Load data from userData.txt
$file = fopen("userData.txt", "r");

while(!feof($file)) {
  $line = fgets($file);

  // Extract values from line
  list($firstName, $lastName, $email, $password, $studentno) = explode(",", $line);

  // Hash password
  $passwordHash = password_hash($password, PASSWORD_DEFAULT);

  // Insert data into table
  mysqli_query($con, "INSERT INTO tblUser (firstName, lastName, email, password, studentno) VALUES ('$firstName', '$lastName', '$email', '$passwordHash', '$studentno')");
}

fclose($file);

echo "Table created and data loaded successfully!";
?>
