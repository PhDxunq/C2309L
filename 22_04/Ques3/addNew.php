<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
</head>
<body>

<h2>Add New Employee</h2>

<form action="addEmployee.php" method="POST">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>
    
    <label for="dept_id">Department:</label><br>
    <select name="dept_id" id="dept_id" required>
        <?php
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "exam";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch departments
        $sql = "SELECT id, name FROM department";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
            }
        } else {
            echo "<option value=''>No departments found</option>";
        }

        $conn->close();
        ?>
    </select><br><br>

    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age" required><br><br>

    <label for="sex">Sex:</label><br>
    <input type="text" id="sex" name="sex" required><br><br>

    <input type="submit" value="Add New">
</form>

</body>
</html>
