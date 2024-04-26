<?php

// Thông tin kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tạo cơ sở dữ liệu "exam" nếu chưa tồn tại
$sql_create_db = "CREATE DATABASE IF NOT EXISTS exam";
if ($conn->query($sql_create_db) === FALSE) {
    die("Error creating database: " . $conn->error);
}

// Chọn cơ sở dữ liệu "exam"
$conn->select_db("exam");

$conn->close();

?>
