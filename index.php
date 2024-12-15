<?php

// Database connection settings
$servername = "localhost";  // Change this to your server address if not localhost
$username = "root";         // Replace with your MySQL username
$password = "";             // Replace with your MySQL password
$dbname = "testdb";         // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully.<br>";

// Optional: Create a table if it doesn't exist
$tableName = "sample_table";
$createTableSQL = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createTableSQL) === TRUE) {
    echo "Table '$tableName' created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Fetch the current time from the database
$currentTimeSQL = "SELECT CURRENT_TIME AS current_time";
$result = $conn->query($currentTimeSQL);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "The current time is: " . $row['current_time'] . "<br>";
} else {
    echo "Error fetching the current time: " . $conn->error . "<br>";
}

// Close connection
$conn->close();

?>

