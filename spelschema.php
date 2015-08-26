<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<title>Spel Schema</title>
</head>
<body>
<table class="table">
    <tr>
        <th>Start tid</th>
        <th>Slut tid</th>
        <th>Scene</th>
        <th>Band namn</th>
    </tr>
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
    
    
    $sql = "SELECT st.*, s.name AS stage_name, b.* 
            FROM stagetimes st
                inner join stages s on st.stage_id = s.id
                inner join bands b on st.band_id = b.id
            ORDER BY start_time";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["start_time"]. "</td><td>". $row["end_time"]. "</td><td>". $row["stage_name"]. "</td><td>". $row["name"]. "</td><td> ". $row["genre"]. "</td><td> ". $row["country"]. "</td>";
            echo "</tr>";
        }
    }
    $conn->close();
?>
</table>
</body>
</html>
