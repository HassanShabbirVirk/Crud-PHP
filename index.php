<?php
include("config/database.php");

if (isset($_POST['submit'])) {
    $date = date("Y-m-d H:i:s");
    extract($_POST);

    $insertSql = "INSERT INTO users (username, password, created_at) VALUES('$username', '$password', '$date')";
    $result = $conn->query($insertSql);
    if ($result) {
        echo "<br>Record submitted successfully<br>";
    } else {
        echo 'something wrong';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="index.php" method="post">
        <label for="username">User Name : </label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password : &nbsp;&nbsp;</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="submit" value="submit">
    </form>
    <br><br><br>
    <form>
        <button type="submit" formaction="users.php">See Users</button>
    </form>

</body>

</html>

<?php

?>