<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
   
    <?php
    if ($_SESSION['id'] != 0) {
        $name_user = $_SESSION['user_name'];
        $email_user = $_SESSION['user_email'];
    } else {
        $name_user = '';
        $email_user = '';
    }
    ?>
   <h2>User Entry Form</h2>
    <form action="process.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required value=<?php echo $name_user ?>><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required value=<?php echo $email_user ?>><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
    <br>
    <hr>
    <b>Users Data</b><br><br>
    <?php include("display_data.php"); ?>
</body>

</html>