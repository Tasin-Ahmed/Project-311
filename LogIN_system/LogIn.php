<?php
$showalert = false;
//Checking if server request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Including dbconnect file
  include 'Partials/_dbconnect.php';

  //Parameters for SQL
  // $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['pass'];


  // $sql = "INSERT INTO signup (Name,Email,Password) VALUES ('$name','$email','$password')";
  $sql = "SELECT * FROM signup WHERE Email = '$email' AND Password = '$password'";
  $result = mysqli_query($connct, $sql);
  $num = mysqli_num_rows($result);

  if ($num == 1) {
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    // $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    echo $_SESSION['email'];
    header("location: Welcome.php");
    // echo "successful";
  } else {
    // echo "Invalid Credentials";
    //   echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    //   <strong>Invalid Credentials!</strong> You should check in on some of those fields below.
    //   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    // </div>";
    // $login = false;
    $showalert = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="styles_Login.css" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>

<body>
  <?php
  if ($showalert) {

    echo ' <div class="alert alert-warning alert-dismissible fade show my-0"  role="alert">
  <strong>Invalid Credentials!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    
  }
  ?>
  <div class="log_in">
    <div class="intro_form">
      <div class="heading">
        <h1>Login quickly to buy your desired products</h1>
      </div>
      <form id="form" action="/LogIN_System/LogIn.php" method="post">
        <div class="inputBox">
          <div class="email">
            <input type="email" name="email" id="email" placeholder="Enter your email Address" class="design">
          </div>
          <div class="pw">
            <input type="password" name="pass" id="pass" class="design" placeholder="Password please!">
          </div>
          <button type="submit" id="submit" class="blueButtons">Login</button>
          <!-- <button class="blueButtons" href="/LogIN_System/Welcome.php" id="home">Home</button> -->
        </div>
        <span id="text"></span>
      </form>
    </div>
    <div class="login_image">
      <img src="Pictures/5860.png" alt="" class="login_img">
    </div>


  </div>
</body>

</html>