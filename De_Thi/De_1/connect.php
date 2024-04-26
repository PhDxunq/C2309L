<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "abc12";
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Kết nối thất bại". $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $db ";
    $result = $conn->query($sql);
    if ($result === false) {
        echo "Error creat database";
        $conn -> close();
    }

    $conn -> select_db($db);
    
    $sql = "CREATE TABLE IF NOT EXISTS abc12users(
        USERNAME VARCHAR (100) UNIQUE,
        PASSWORD_HASH  VARCHAR (40),
        PHONE VARCHAR(10)
    )";
    $result = $conn->query($sql);
    if ($result === false) {
        echo "Error creat table";
        $conn -> close();
    }
    
?>
