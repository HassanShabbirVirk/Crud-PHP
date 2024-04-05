<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phptutorial";

    try{
        $conn = new mysqli($servername, $username, $password, $dbname);
    }catch(EXCEPTION $e){
        echo "Connection error: " . $e->getMessage()."<br>";
    }

?>