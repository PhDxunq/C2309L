<?php
require_once("./connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $sql = "SELECT * FROM mydb_user WHERE USERNAME = '$username' AND PHONE = '$phone'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $new_password = "123456789";
        $password_hash = sha1($new_password); 
        $sql_update = "UPDATE mydb_user SET PASSWORD_HASH = '$password_hash' WHERE USERNAME = '$username' AND PHONE = '$phone'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Your new password has been set to: $new_password";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Username and phone combination not found. Unable to reset password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password Form</title>
</head>
<body>
    <h2>Reset Password Form</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required><br>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
