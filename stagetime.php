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
    $start_time = strftime('%Y-%m-%dT%H:%M:%S', strtotime($_POST['start_time']));
    echo $start_time;
    $end_time = strftime('%Y-%m-%dT%H:%M:%S', strtotime($_POST['end_time']));
    echo $end_time;
    
    $sql = "INSERT INTO stagetimes (band_id,worker_id,stage_id, start_time, end_time)". 
        " VALUES({$_POST['band_id']},{$_POST['worker_id']},{$_POST['stage_id']},'{$_POST['start_time']}','{$_POST['end_time']}')";
    echo "<br>";
    echo $sql;
    echo "<br>";
    if ($conn->query($sql) === TRUE) {
        echo "Spelning har blivit bokad";
    } else {
        echo "Något fel hände". $conn->error;
    }
    $conn->close();
?>
<br><a href="/kansli_app">Hem</a>
