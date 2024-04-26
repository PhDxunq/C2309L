<?php 
    require_once("./connect.php");
    require_once("./ultis.php");
    $errors = []; 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];
        $phone = $_POST["phone"];
        $sql = "SELECT * FROM abc12users WHERE USERNAME = '$username' AND PHONE = '$phone' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $new_password = randompass();
            $password = sha1($new_password);
            $update_pass = "UPDATE abc12users SET PASSWORD_HASH = '$password' where USERNAME = '$username' ";
            $check = $conn->query($update_pass);
            if ($check) {
                echo "New Password: $new_password ";
            }
        } else {
            $errors[] = "Wrong username or phone number";
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
    <form action="" method="POST">
        <label for="username">User Name</label>
        <input type="text" name="username" id="username" required><br>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" required><br>
        <input type="submit" value="Submit">
    </form>
    <?php 
        foreach($errors as $error) {
            echo $error;
        }
    ?>
</body>
</html>