<?php
    //<!--Include the database connection code here-->
    $servername = "your_database_host";
    $username = "your_username";
    $password = "your_password";
    $dbname = "minecraft_servers";

    //<!--Create connection-->
    $conn = new mysqli($servername, $username, $password, $dbname);

    //<!--Check connection-->
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


   // <!--  Query to retrieve all servers-->
    $sql = "SELECT * FROM servers";
    $result = $conn->query($sql);

    //<!--Check if there are rows in the result-->
    if ($result->num_rows > 0) {
        // <!--Output data of each row-->
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>Server Name:</strong> " . $row["server_name"] . "</p>";
            echo "<p><strong>IP Address:</strong> " . $row["ip_address"] . "</p>";

            //<!--Add more fields as needed-->
            echo "<hr>";
        }
    } else {
        echo "<p>No results</p>";
    }

    //<!--Close the database connection-->
    $conn->close();
?>