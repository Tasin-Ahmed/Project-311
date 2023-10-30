<?php
//Checking if server request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Including dbconnect file
    include 'Partials/_dbconnect.php';

    //Parameters for SQL
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    //Checking whether email exists
    $existsSql = "SELECT * FROM signup WHERE Email = '$email' ";
    $result = mysqli_query($connct, $existsSql);
    $numExistsRow = mysqli_num_rows($result);
    if ($numExistsRow > 0) {
        echo "Email already exists<br>";
    } else {
        $sql = "INSERT INTO signup (Name,Email,Password) VALUES ('$name','$email','$password')";
        $result = mysqli_query($connct, $sql);

        if ($result) {
            header("location: LogIn.php");
        }
    }
}
?>

<!-- HTML CODE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce website</title>
</head>

<body>
    <!-- <?php require 'partials/_nav.php' ?> -->
    <div class="sign_up">
        <div class="shipping_img">
            <img src="./Pictures/kindpng_7329685.png" alt="" class="cart_img" />
        </div>
        <div class="sign_up_input">

            <div class="heading">
                <h1>Welcome to InstaShipin</h1>
                <h3>Ship Smarted Today</h3>
            </div>
            <form id="form" action="/LogIN_System/SignUp.php" method="post">
                <div class="inputBox">
                    <div class="name">
                        <input type="name" name="name" id="name" class="design" placeholder="Enter your name here" required>
                    </div>
                    <div class="email">
                        <input type="email" name="email" id="email" placeholder="Enter your email Address" class="design" required />
                    </div>
                    <div class="pw">
                        <input type="password" name="pass" id="pass" class="design" placeholder="Password please!" required>
                    </div>



                    <button type="submit" id="submit">Sign up</button>
                    <!-- <button type="submit" id="submit">Log In</button> -->
                </div>
                <span id="text"></span>
            </form>
        </div>
    </div>
</body>

</html>