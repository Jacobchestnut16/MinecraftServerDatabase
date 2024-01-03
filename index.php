<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Minecraft Server Manager</title>
</head>
<body>

<h1>Minecraft Servers</h1>
<?php
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

<!-- Button to trigger the form -->
<button onclick="showForm()">Add New Server</button>

<!-- Form to add a new server -->
<div id="addServerForm" style="display: none;">
    <form action="add_server.php" method="post">
        <label for="serverName">Server Name:</label>
        <input type="text" name="serverName" required>
        <br>

        <label for="ipAddress">IP Address:</label>
        <input type="text" name="ipAddress" required>
        <br>

        <!-- Add more fields as needed -->

        <input type="submit" value="Add Server">
    </form>
</div>

<script>
    function showForm() {
        document.getElementById("addServerForm").style.display = "block";
    }
</script>
</body>
</html>
