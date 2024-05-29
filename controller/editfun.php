<?php
require('../model/db_connection.php');
require('../config.php');

$databaseConnection = new DatabaseConnection($config);
$conn = $databaseConnection->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatebtn'])) {
    $id = $_POST['id'];
    $name = $_POST['u_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $course = $_POST['course'];

    // Validate inputs and ensure confirm-password matches password
    if ($_POST['password'] !== $_POST['confirm-password']) {
        echo "Passwords do not match.";
        exit();
    }

    // Update the record in the database
    $query = "UPDATE `registration_data` SET `name` = ?, `email` = ?, `password` = ?, `coursename` = ? WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $name, $email, $password, $course, $id);

    if ($stmt->execute()) {
        header("Location:../view/admin_page.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
