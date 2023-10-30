<?php
    //Database Parameters
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "e-commerce";

    //Connecting to database
    $connct = mysqli_connect($server,$username,$password,$database);

    // if($connct){
    //     echo "Success";
    // }
    // else {
    //     die("Error".mysqli_connect_error());
    // }
?>