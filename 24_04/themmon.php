<?php
include 'connect.php';

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject_name = $_POST["subject_name"];
    
    $sql = "INSERT INTO subjects (subject_name) VALUES ('$subject_name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Thêm môn học thành công<br>";
    } else {
        echo "Lỗi khi thêm môn học: " . $conn->error . "<br>";
    }
    header("./index.php");
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="subject_name">Tên Môn Học:</label>
        <input type="text" name="subject_name" id="subject_name"><br>
        <input type="submit" value="Thêm Môn Học">
    </form>
</body>
</html>
