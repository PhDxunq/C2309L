

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST" >
        <h1>Input Employee Information</h1>
            <div class="form-group">
                <label for="numberOfEmploy" >Employee NO</label>
                <input type="number" id="numberOfEmploy" name="numberOfEmploy">
            </div>
            <div class="form-group">
                <label for="name" >Name</label>
                <input type="text" id="name" name="name">
            </div>    
            <div class="form-group">
                <label for="placeOfWork" ">Place Of Work</label>
                <input type="text"  id="placeOfWork" name="placeOfWork"><br>
            </div>
            <div class="form-group">
                <label for="phone" >Phone</label>
                <input type="tel" id="phone" name="phone"><br>
            </div>
            <div>
                <button type="submit" name="submit" class="btn-blue">Add New</button>
                <button class="btn-blue">Back To List</button>
            </div>
        </form>
    </div>

</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"])) {
        $numberOfEmploy = $_POST["numberOfEmploy"];
        $name = $_POST["name"];
        $placeOfWork = $_POST["placeOfWork"];
        $phone = $_POST["phone"];
        if(empty($numberOfEmploy)) {
            echo"<p>You must input a number of employee <br></p>";
        }
        if(empty($name)){
            echo "<p>You must input a name<br></p>";
        }
        if(empty($placeOfWork)) {
            echo "<p>You must input a place of work<br></p>";
        }
        if(empty($phone)) {
            echo "<p>You must input a phone number<br></p>";
        }
    }
?>
