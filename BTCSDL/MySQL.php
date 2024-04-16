<?php
$host = 'localhost';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công!";
$conn->close();
?>