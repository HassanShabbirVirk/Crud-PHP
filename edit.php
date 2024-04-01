<?php
include("config/database.php");

if (isset($_GET['id'])) {
    $readSql = "SELECT * FROM users WHERE id = " . $_GET['id'];
    $readResult = $conn->query($readSql);
    $user = $readResult->fetch_assoc();
} else {
    echo " Invalid Request";
    exit;
}

if (isset($_POST['submit'])) {


    $name = $_POST['username'];
    $pass = $_POST['password'];
    $num = $_GET['id'];


    $editSql = "UPDATE users SET username = '$name', password = '$pass' where id = '$num'";
    $editResult = $conn->query($editSql);
    if ($editResult) {

        header("Location: users.php");
        exit();
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

    <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="post">
        <label for="username">User Name : </label>
        <input type="text" id="username" name="username" required value="<?php echo $user['username'] ?>"><br><br>
        <label for="password">Password : &nbsp;&nbsp;</label>
        <input type="password" id="password" name="password" required value="<?php echo $user['password'] ?>"><br><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>