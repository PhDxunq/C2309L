<?php
    $sevrrname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
    $conn = new mysqli($sevrrname, $username, $password);
    if($conn->connect_error){
        die("Kết nối thất bại: " . $conn->connect_error);   
    }
    $sql = "CREATE DATABASE IF NOT EXISTS mydb";
    if($conn->query($sql) === false){
        die("Error create databasae" . $conn->error);
    }
    $conn->select_db("mydb");
    $sql = "CREATE TABLE IF NOT EXISTS mydb_user (
        USERNAME VARCHAR (100) UNIQUE,
        PASSWORD_HASH  VARCHAR (40),
        PHONE VARCHAR(10)
    )";
    IF($conn->query($sql) === FALSE){
        die("ERROR CREATE TABLE".$conn->error);
    }
?>