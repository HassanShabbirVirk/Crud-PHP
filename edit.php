<?php
include("config/connect_db.php");
session_start();
if (isset($_GET['id'])) {


    $readSql = "SELECT * FROM user_data WHERE id = " . $_GET['id'];
    $readResult = $conn->query($readSql);
    $user = $readResult->fetch_assoc();

    $_SESSION['id'] = $_GET['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
} else {
    $_SESSION['user_name'] = '';
    $_SESSION['user_email'] = '';
    $_SESSION['id'] = 0;
}


header("Location: index.php");

?>