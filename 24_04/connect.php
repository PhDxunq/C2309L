<?php 

$host = "localhost";
$username = "root";
$password = "";
$dbname = "QLSV";
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
//Tạo bảng Classes
$sql = "CREATE TABLE IF NOT EXISTS classes (
    id INT  PRIMARY KEY,
    class_name VARCHAR(255)
)";

if ($conn->query($sql) === False) {
    echo "Lỗi khi tạo bảng classes: " . $conn->error . "<br>";
}

//Tạo bảng subjects
$sql = "CREATE TABLE IF NOT EXISTS subjects (
    id INT  PRIMARY KEY,
    subject_name VARCHAR(255)
)";
if ($conn->query($sql) === false) {
    echo "Lỗi khi tạo bảng subjects: " . $conn->error . "<br>";
}

//Tạo bảng sinhvien
$sql = "CREATE TABLE IF NOT EXISTS sinhvien (
    id INT AUTO_INCREMENT  PRIMARY KEY,
    name VARCHAR(255),
    date DATETIME,
    sex VARCHAR(255),
    class_id INT ,
    FOREIGN KEY (class_id) REFERENCES classes(id)
)";
if ($conn->query($sql) === FALSE) {
    echo "Lỗi khi tạo bảng sinhvien: " . $conn->error . "<br>";
} 

//Tạo bảng student_subject
$sql = "CREATE TABLE IF NOT EXISTS student_subject (
    student_id INT AUTO_INCREMENT,
    subject_id INT,
    FOREIGN KEY (student_id) REFERENCES sinhvien(id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
)";

if ($conn->query($sql) === FALSE) {
    echo "Lỗi khi tạo bảng student_subject: " . $conn->error . "<br>";
}
?>
