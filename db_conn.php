<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";  // Replace with your actual username
$password = "";  // Replace with your actual password
$dbname = "dtr_blaganes";    // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verify table exists
$tableCheck = $conn->query("SHOW TABLES LIKE 'dtr_employees'");
if ($tableCheck->num_rows == 0) {
    die("Error: Table 'dtr_employees' doesn't exist in the database");
}
?>