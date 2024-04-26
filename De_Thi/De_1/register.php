<?php

    require_once('./connect.php');
    $errors = [];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            $phone = $_POST['phone'];

            $check_user = "SELECT * FROM abc12users WHERE username = '$username'";
            $result = $conn->query($check_user);
            if($result->num_rows > 0){
                echo "Username already exists";
                $conn->close();
            }else{
                $insert_query = "INSERT INTO abc12users (USERNAME, PASSWORD_HASH, PHONE) VALUES ('$username', '$password', '$phone')";
                $result = $conn->query($insert_query);
                if($result){
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                    </head>
                    <body>
                        Xin chao <br>
                        <?php 
                        echo "User Name : $username<br>";
                        echo "Phone : $phone";
                        ?>
                    </body>
                    </html>
                    <?php
                    exit();
                }else{
                    echo "Error";
                    $conn->close();
                }
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <h3>Register Form</h3><br>
        <span>Username:</span> <input type="text" name="username" id="username" required><br>
        <span>Password:</span> <input type="password" name="password" id="password" required><br>
        <span>Phone Number:</span> <input type="tel" name="phone" id="phone" required><br>
        <br>
        <input type="submit" value="Resgister" name="submit">
    </form>
</body>
</html>