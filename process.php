<?php
session_start();

if ($_POST['submit'] == true and $_SESSION['id'] == 0) {
    include("config/connect_db.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $insertionQuery = "INSERT INTO user_data (name, email) VALUES('$name', '$email')";
    $result = mysqli_query($conn, $insertionQuery);
    if ($result) {
        $_POST['submit'] = false;

        $conn->close();
        header("Location: index.php");
    } else {
        die("Record is not inserted. Try again.");
    }
}



if ($_POST['submit'] == true and $_SESSION['id'] != 0) {
    include("config/connect_db.php");
    $_id = $_SESSION['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $updatQuery = "UPDATE user_data SET name = '$name', email = '$email' WHERE id = $_id";
    $result = mysqli_query($conn, $updatQuery);
    if ($result) {
        $_id = $_SESSION['id'] = 0;
        $name = $_POST['name'] = '';
        $email = $_POST['email'] = '';
        $conn->close();
        header("Location: index.php");
    } else {
        die("Record is not updated. Try again.");
    }
}
