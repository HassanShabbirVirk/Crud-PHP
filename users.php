<?php
    include("config/database.php");
    if(isset($_GET['id'])){
        extract($_GET);
        $delSql = "DELETE from users where id = '$id'";
        $delResult = $conn->query($delSql);
        if($delResult){
            echo "<br>Deleted Successfully";
        }else{
            echo "<br>something went wrong. Try again";
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
    
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Password</th>
                <th>Created_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php 
            $readSql = "SELECT * FROM users";
            $readResult = $conn->query($readSql);
           
            if ($readResult->num_rows > 0) {
                while ($row = $readResult->fetch_assoc()) {

                    ?>
                   <tr>
                        <td>
                            <?php 
                                echo($row['username']);
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo($row['password']);
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo($row['created_at']);
                            ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                            <a href="users.php?id=<?php echo $row['id'] ?>">Delete</a>
                        </td>
                   </tr>
    
                    <?php
                }
            }
        ?>
        
    </table>
    <br><br>
    <form>
        <button type="submit" formaction="index.php">Add User</button>
    </form>
</body>
</html>