<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="./19_03.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    if (isset($_POST['click'])) {
        $result = rand(0, 1); 
        $coin = ($result == 0) ? "Chan" : "Le"; 
        echo "<p>The result is: $coin</p>";
    }
    ?>
    <form method="POST">
        <input type="submit" name="click" value="Toss Coin">
    </form>

    <form action="" method="POST">
        <p>Nhap he so phuong trinh: </p>
        <label for="first_number">First Number</label> <br>
        <input type="number" name="first_number" id="first_number"><br>
        <label for="second_number">Second Number</label><br>
        <input type="number" name="second_number" id="second_number"><br>
        <label for="third_number"> Third Number</label><br>
        <input type="number" name="third_number" id="third_number"><br>
        <input type="submit" name="submit" id="submit">
    </form>
    <?php
        if(isset($_POST['submit'])) {
            $a = $_POST['first_number'];
            $b = $_POST['second_number'];
            $c = $_POST['third_number'];
            if(!empty($a)  && !empty($b) && !empty($c) ){
                $delta = ($b * $b) - (4 * $a * $c);
                if($delta > 0){
                    $x_1 = (-$b + sqrt($delta))/ (2 *$a);
                    $x_2 = (-$b - sqrt($delta))/ (2 *$a);
                    echo "Nghiem cua phuong trinh: $x_1, $x_2";
                }
                elseif($delta = 0){
                    $x_1 = $x_2 = -$b/(2*$a);
                    echo "Nghiem cua phuong trinh: $x_1";
                }
                else{
                    echo "Phuong trinh vo nghiem";
                }
            }
        }
    ?>
    <br>
    <h1 class="text_center" >Contact me now</h1><br>
    <hr>
    <h2 class="text_center">For any related questions, feel free to contract me</h2>
    <div class="form">
    <form action="" method="POST">
        <input type="text" name="your_name" id="your_name" placeholder="Your Name*"><br>
        <input type="tel" name="your_phone" id="your_phone" placeholder="Your Phone Number*"><br>
        <input type="email" name="your_mail" id="your_mail" placeholder="Email*"><br>
        <span>Event Date: </span> <input type="date" name="event_date" id="event_date"><br>
        <label for="flex_date">Flexiable Date:</label>
        <input type="radio" name="flex_date" id="yes" value="yes"><span>Yes</span>
        <input type="radio" name="flex_date" id="no" value="no"><span>No</span><br>
        <label for="types">What type of photography services are you interested in?</label><br>
        <input type="checkbox" name="wedding" id="wedding" value="wedding"><span>Wedding</span>
        <input type="checkbox" name="engagement" id="engagement" value="engagement"><span>Engagement</span>
        <input type="checkbox" name="couple" id="couple" value="couple"><span>Couple</span>
        <input type="checkbox" name="elopment" id="elopment" value="elopment"><span>Elopment</span>
        <input type="checkbox" name="family" id="family" value="family"><span>Family</span>
        <input type="checkbox" name="single" id="single" value="single"><span>Single</span>
    </form>
    </div>
</body>
</html>
