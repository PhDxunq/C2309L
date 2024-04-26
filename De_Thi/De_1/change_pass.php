<?php 
    require_once("./connect.php");
    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['username'];
        $current_password = sha1($_POST['current_password']);
        $new_password = sha1($_POST['new_password']);
        $sql = "Select * from abc12users where username = '$username' and password_hash = '$current_password' ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $update = "Update abc12users set password_hash = '$new_password' where username = '$username' ";
            $check = $conn->query($update);
            if($check){
                echo "Password updated successfully";
            } else {
                echo "Error in updating password";
            }
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
        <label for="password">Current Password</label>
        <input type="password" name="current_password" id="current_password" required><br>
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="new_password" required><br>
        <input type="submit" name="submit" value="Change">
    </form>
    <?php 
        foreach($errors as $error) {
            echo $error;
        }
    ?>
</body>
</html>