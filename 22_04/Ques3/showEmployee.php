<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Employee List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Age</th>
        <th>Sex</th>
    </tr>

    <?php
    // Thực hiện kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "exam";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lấy danh sách nhân viên từ cơ sở dữ liệu
    $sql = "SELECT e.id, e.name AS employee_name, d.name AS department_name, e.age, e.sex 
            FROM employee e
            LEFT JOIN department d ON e.dept_id = d.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Hiển thị dữ liệu trên trang web
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["employee_name"]."</td>";
            echo "<td>".$row["department_name"]."</td>";
            echo "<td>".$row["age"]."</td>";
            echo "<td>".$row["sex"]."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No employees found</td></tr>";
    }

    // Đóng kết nối sau khi sử dụng
    $conn->close();
    ?>
</table>

</body>
</html>
