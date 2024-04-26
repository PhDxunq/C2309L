<?php
require_once("./connect.php");

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $tenlop = $_POST["classes"];
    
    $sql = "INSERT INTO classes (class_name) VALUES ('$class_name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Thêm lớp học thành công<br>";
    } else {
        echo "Lỗi khi thêm lớp học: " . $conn->error . "<br>";
    }
}


?>
