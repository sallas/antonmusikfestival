<html>
<head>
<title>Book spelning</title>
</head>
<body>
<div>
    <form action="stagetime.php" method="post">
    Band ID:<br>
    <input type="number" name="band_id" value="">
    <br>
    Scene ID:<br>
    <input type="number" name="stage_id" value="">
    <br>
    Jobbare ID:<br>
    <input type="number" name="worker_id" value="">
    <br>
    Start tid:<br>
    <input type="datetime-local" name="start_time" >
    <br>
    Slut tid:<br>
    <input type="datetime-local" name="end_time" >
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
    
    $sql = "SELECT * FROM stages";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<div>Scener<br><ul>";
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
    
    $sql = "SELECT st.*, s.name AS stage_name, b.*, w.name AS worker_name
            FROM stagetimes st
                inner join stages s on st.stage_id = s.id
                inner join bands b on st.band_id = b.id
                inner join workers w on st.worker_id = w.id
            ORDER BY start_time";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<div>Schema";
        echo "<table><tr><th>Start tid</th><th>Slut tid</th><th>Scene</th><th>Band namn</th><th>Genre</th><th>Ursprungsland</th><th>Säkerhets personal</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["start_time"]. "</td><td>". $row["end_time"]. "</td><td>". $row["stage_name"]. "</td><td>". $row["name"]. "</td><td> ". $row["genre"]. "</td><td>". $row["country"]. "</td><td>". $row["worker_name"]. "</td>";
            echo "</tr>";
        }
        echo "</table></div>";
    }
    
    $conn->close();
?>
</div>
</body>
</html>