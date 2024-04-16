<?php
    IF(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $f_name = $_POST["f_name"];
        $birth_day = $_POST["birth_day"];
        $new_pass = sha1($_POST["new_pass"]); 
        $conf_pass = sha1($_POST["conf_pass"]);
        $old_pass = sha1($_POST["old_pass"]);
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        if (isset($_FILES["picture"]) && $_FILES["picture"]["error"] == 0) {
            $allowed_types = array("image/jpeg", "image/png", "image/gif");
            $file_type = $_FILES["picture"]["type"];
            if (in_array($file_type, $allowed_types)) {
                $upload_dir = "";
                $file_name = $_FILES["picture"]["name"];
                $file_tmp = $_FILES["picture"]["tmp_name"];
                move_uploaded_file($file_tmp, $upload_dir . $file_name);
                echo "File uploaded successfully.";
            } else {
                echo "Only JPG, PNG, GIF files are allowed.";
            }
        } else {
            echo "No file uploaded.";
        }
        
        echo "Success";
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
    <h2>Edit Profile</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <input type="file" name="picture" id="picture" accept="image/jpeg, image/png, image/gif"><br>
        </div>
        <div>
            <h3>Personal Info</h3>
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" id="f_name" placeholder="test"> <br>
            <label for="birth_day">Birth Day</label>
            <input type="date" name="birth_day" id="birth_day"><br>
            <label for="new_pass">New Password</label>
            <input type="password" name="new_pass" id="new_pass"><br>
            <label for="conf_pass">Confirm new password</label>
            <input type="password" name="conf_pass" id="conf_pass"><br>
            <label for="old_pass">Old Pass</label>
            <input type="password" name="old_pass" id="old_pass"><br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="example@gmail.com"><br>
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone" placeholder="09********"><br>
            <input type="submit" value="Save">
        </div>
    </form>
</body>
</html>