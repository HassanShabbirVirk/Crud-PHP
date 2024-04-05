<?php
    include("config/connect_db.php");
    if(isset($_GET['id'])){
        extract($_GET);
        $delSql = "DELETE from user_data where id = '$id'";
        $delResult = $conn->query($delSql);
        if($delResult){
            $conn->close();
            header("Location: index.php");
        }else{
            die("<br>something went wrong. Try again");
        }
    }
?>