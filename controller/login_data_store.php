<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


$config = require "../config.php";
require("../model/db_connection.php");
require('../view/reachedpage.php');

$databaseConnection = new DatabaseConnection($config);
$conn = $databaseConnection->getConnection();

// if ($conn) {
//     echo "connected successfully<br>";
// } else {
//     die("failed to connect: " . mysqli_connect_error());
// }


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginsubmit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_encrypt = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password_encrypt); // Not recommended for real applications

    $sql1 = "SELECT * FROM registration_data WHERE email = '$email' AND password = '$password'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        header("Location: ../view/reachedpage.php");
        exit;
    }else{
        echo "Invalid email or password";
    }

    //sessio storage.............
    $_SESSION['email'] = $email;
   
}
