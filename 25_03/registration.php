
<?php
    require_once("./connect.php");
    IF(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = sha1($_POST["password"]); 
        $phone = $_POST["phone"];

    $check_username = "SELECT * FROM abc12users WHERE USERNAME ='$username'";
    if($conn->query($check_username)->num_rows > 0){
        echo "Da ton tai. Vui long nhap ten khac";
    } else {
        $insert_data = "INSERT INTO abc12users (USERNAME,PASSWORD_HASH,PHONE)
        VALUES('$username','$password','$phone')";
        IF($conn->query($insert_data) === TRUE){
            echo "Đăng Ký Thành Công";
        }else{
            echo "Đăng Ký Thất Bại" . $conn->error;
        }
    }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <p>Registration Form</p>
    <form action="" method="POST">
        <label for="user_name">UserName</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>
        <label for="phone">Phone Number</label>
        <input type="tel" name="phone" id="phone" required><br>
        <input type="submit" value="Registration">
    </form>
</body>
</html>

