<?php
require_once("./connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $sql = "SELECT * FROM mydb_user WHERE USERNAME = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $password_hash = $row["PASSWORD_HASH"];
        if (sha1($current_password) == $password_hash) {
            $new_password_hash = sha1($new_password); 
            $sql_update = "UPDATE mydb_user SET PASSWORD_HASH = '$new_password_hash' WHERE USERNAME = '$username'";
            if ($conn->query($sql_update) === TRUE) {
                echo "Password updated successfully.";
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "Current password is incorrect.";
        }
    } else {
        echo "Username not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password Form</title>
</head>
<body>
    <h2>Change Password Form</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="current_password">Current Password:</label>
        <input type="password" name="current_password" required><br>
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required><br>
        <input type="submit" value="Change Password">
    </form>
</body>
</html>
