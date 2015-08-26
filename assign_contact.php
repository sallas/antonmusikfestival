<html>
<head>
<title>Book band</title>
</head>
<body>
<div>
    <form action="assign.php" method="post">

    Band ID:<br>
    <input type="number" name="band_id" value="">
    <br>
    Jobbare ID:<br>
    <input type="number" name="worker_id" value="">
    <br><br>
    <input type="submit" value="Submit">
    </form> 
</div>
<div>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "pass";
    $dbname = "festival";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    $sql = "SELECT * FROM bands";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<div>Band<br><ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "Namn: ". $row["name"]. " ID: ". $row["id"];
            echo "</li>";
        }
        echo "</ul></div>";
    }
    
    $sql = "SELECT * FROM workers";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<div>Arbetare<br><ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "Namn: ". $row["name"]. " Person-nr: ". $row["ssn"]. " ID: ". $row["id"];
            echo "</li>";
        }
        echo "</ul></div>";
    }
    $conn->close();
?>
</div>
</body>
</html>