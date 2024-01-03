<?php

// Include the database connection code here
//<!--Include the database connection code here-->
$servername = "localhost";
$username = "jchestnut";
$password = "Spicyleaf82";
$dbname = "minecraft_servers";

//<!--Create connection-->
$conn = new mysqli($servername, $username, $password, $dbname);

//<!--Check connection-->
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serverName = $_POST["serverName"];
    $ipAddress = $_POST["ipAddress"];
    $serverVersion = $_POST["serverVersion"];
    $description = $_POST["Description"];

    // Add more variables for additional form fields

    // Insert into the 'servers' table
    $sql = "INSERT INTO $dbname (server_name, ip_address, server_version, description) VALUES ('$serverName', '$ipAddress', '$serverVersion', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New server added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>