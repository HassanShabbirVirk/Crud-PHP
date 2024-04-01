<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phptutorial";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // echo "Connected successfully";
} catch (Exception $e) {
    echo "Connection error: " . $e->getMessage();
}

?>

