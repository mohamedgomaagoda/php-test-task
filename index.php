<!DOCTYPE html>
<html>
<head>
    <title>PHP Test1</title>
</head>
<body>
    <?php

    // Database connection settings
    $servername = "localhost";  
    $username = "web_user";         
    $password = "simple123";             
    $dbname = "web_db";         

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<h1>Connected successfully.</h1><br>";

    // Optional: Create a table if it doesn't exist
    $tableName = "sample_table";
    $createTableSQL = "CREATE TABLE IF NOT EXISTS $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTableSQL) === TRUE) {
        echo "<p>Table '$tableName' created successfully or already exists.</p><br>";
    } else {
        echo "<p>Error creating table: " . $conn->error . "</p><br>";
    }

    // Fetch the current time from the database
    $currentTimeSQL = "SELECT NOW() AS current_time";
    $result = $conn->query($currentTimeSQL);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentTime = $row['current_time'];
        echo "<p>The current time is: $currentTime</p><br>";
    } else {
        $currentTime = "unknown";
        echo "<p>Error fetching the current time: " . $conn->error . "</p><br>";
    }

    // Get the visitor's IP address
    $visitorIP = $_SERVER['REMOTE_ADDR'];
    echo "<p>Welcome! Your IP address is: $visitorIP</p>";
    echo "<p>The current time is: $currentTime</p>";

    // Close connection
    $conn->close();

    ?>
</body>
</html>



