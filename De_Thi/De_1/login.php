<?php 
    require_once("./connect.php");
    $errors = []; 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];
        $password = sha1($_POST["password"]);
        $sql = "SELECT * FROM abc12users WHERE USERNAME = '$username' AND PASSWORD_HASH = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                Welcome <br>
                <?php echo $username;?>
            </body>
            </html>
            <?php
            exit();
        } else {
            $errors[] = "Wrong username or password";
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
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <?php 
        foreach($errors as $error) {
            echo $error;
        }
    ?>
</body>
</html>