<?php

session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$config = require "../config.php";
require("../model/db_connection.php");


$databaseConnection = new DatabaseConnection($config);
$conn = $databaseConnection->getConnection();

if ($conn) {
    echo "connected successfully<br>";
} else {
    die("failed to connect: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Sanitize user input
    $u_name = mysqli_real_escape_string($conn, $_POST['u_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $password_encrypt = md5( $password);
    // Create the SQL query
    $sql = "INSERT INTO `registration_data` (`name`, `email`, `password`, `coursename`) VALUES ('$u_name', '$email', '$password_encrypt ', '$course')";

    // Execute the query and check the result
    if (mysqli_query($conn, $sql)) {
        header("Location: ../view/login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
// Close the connection
mysqli_close($conn);

?>
