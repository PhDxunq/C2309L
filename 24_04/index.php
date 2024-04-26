<?php
require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <h1>Quản lý sinh viên</h1>
        </div>
        <div>
            <label for="student_name">Tên SV:</label>
            <input type="text" name="student_name" id="student_name">
        </div>
        <div>
            <label for="date">Năm Sinh:</label>
            <input type="date" name="date" id="date">
        </div>
        <div>
            <label for="sex">Giới tính:</label>
            <select name="sex" id="sex">
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
            </select>
        </div>
        <div>
            <label for="subject_name">Môn Học:</label>
            <?php
            $sql = "SELECT * FROM subjects";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $subject_id = $row['id'];
                    $subject_name = $row['subject_name'];
                    echo "<input type='checkbox' name='subjects[]' id='$subject_id' value='$subject_id'>";
                    echo "<label for='$subject_id'>$subject_name</label>";
                }
            }
            ?>
        </div>

        <div>
            <label for="class_name">Lớp học:</label>
            <select name="class_name" id="class_name">
                <?php
                $sql = "SELECT * FROM classes";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $class_id = $row['id'];
                        $class_name = $row['class_name'];
                        echo "<option value='$class_id'>$class_name</option>";
                    }
                } else {
                    echo "<option value=''>Không có lớp nào</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit">Thêm sinh viên</button>
    </form>

</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = $_POST['student_name'];
    $date = $_POST['date'];
    $sex = $_POST['sex'];
    $selected_subjects  = $_POST['subjects'];
    $class_name = $_POST['class_name'];

    $sql = "INSERT INTO sinhvien (name, date, sex, class_id) VALUES ('$student_name', '$date', '$sex','$class_name')";
    // $student_id = $conn->insert_id;
    foreach ($selected_subjects as $subject_id) {
        $sql = "INSERT INTO student_subject (subject_id) VALUES ('$subject_id')";
        if ($conn->query($sql) !== TRUE) {
            echo "Lỗi khi chèn môn học: " . $conn->error;
        }
    }
    if ($conn->query($sql) === TRUE) {
        echo "Thêm sinh viên thành công!";
    } else {
        echo "Lỗi khi thêm sinh viên: " . $conn->error;
    }

}

$sql = "SELECT sv.name AS student_name, sv.date, sv.sex, sb.subject_name, cl.class_name
    FROM sinhvien sv
    INNER JOIN classes cl ON sv.class_id = cl.id
    LEFT JOIN student_subject ss ON sv.id = ss.student_id
    LEFT JOIN subjects sb ON ss.subject_id = sb.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Danh sách sinh viên</h2>";
    echo "<table border = 1 >";
    echo "<tr><th>Tên SV</th><th>Năm Sinh</th><th>Giới Tính</th><th>Môn Học</th><th>Lớp</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['student_name'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['sex'] . "</td>";
        echo "<td>". $row["subjects"] . "</td>";
        echo "<td>" . $row['class_name'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
$conn->close();
?>