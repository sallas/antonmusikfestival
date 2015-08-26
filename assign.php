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
    $sql = "UPDATE bands SET worker_id = {$_POST['worker_id']} WHERE id = {$_POST['band_id']}";

    if ($conn->query($sql) === TRUE) {
        echo "Kontant personen har blivit tilldelad";
    } else {
        echo "Något fel hände". $conn->error;
    }
    $conn->close();
?>
<br><a href="/kansli_app">Hem</a>