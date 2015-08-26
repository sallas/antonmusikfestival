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
    echo $_POST["name"];
    echo $_POST["country"];
    echo $_POST["genre"];
    
    $sql = "INSERT INTO bands (name,genre,country) VALUES('{$_POST['name']}','{$_POST['genre']}','{$_POST['country']}')";

    if ($conn->query($sql) === TRUE) {
        echo "Band bokat";
    } else {
        echo "Något fel hände";
    }
    $conn->close();
?>
<br><a href="/kansli_app">Hem</a>