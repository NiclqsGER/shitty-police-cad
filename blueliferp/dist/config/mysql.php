<?php 

    $myUsername = "root";
    $myHost     = "127.0.0.1";
    $myDatabase = "blueliferp";
    $myPassword = "";

    try {
        $mysql = new PDO("mysql:host=$myHost;dbname=$myDatabase", $myUsername, $myPassword);
    } catch (PDOException $e) {
        echo ("SQL-Error: " . $e -> getMessage());
    }

?>
