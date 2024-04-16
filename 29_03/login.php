<?php
    require_once("./connect.php");
    if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = sha1($_POST["password"]);
        $check_account = "SELECT * FROM mydb_user  WHERE USERNAME = '$username' AND PASSWORD_HASH ='$password'";
        $result = $conn->query($check_account);
        if ($result->num_rows == 1) {
            echo "Welcome";
        } else {
            echo "không hợp lệ vào biểu mẫu đăng nhập";
        }
    }
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <p>Login Form</p>
    <form action="" method="POST">
        <label for="username">UserName</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>