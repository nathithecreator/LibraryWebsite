<?php

// Establish database connection
include 'DBConn.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully\n";
} else {
  echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db($dbname);

// Create books table
$sql = "CREATE TABLE IF NOT EXISTS books (
  id INT(25) AUTO_INCREMENT PRIMARY KEY,
  book_name VARCHAR(255) NOT NULL,
  picture VARCHAR(255) NOT NULL,
  price FLOAT NOT NULL
)";
if ($conn->query($sql) === TRUE) {
  echo "Table books created successfully\n";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();
?>
