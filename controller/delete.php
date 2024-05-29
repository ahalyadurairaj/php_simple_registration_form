<?php
require('../model/db_connection.php');
require('../config.php');

$databaseConnection = new DatabaseConnection($config);
$conn = $databaseConnection->getConnection();

if (isset($_GET['id'])) {   
    $id = $_GET['id'];

    $deletequery = 'DELETE FROM `registration_data` WHERE id = ?';
    $stmt = $conn->prepare($deletequery);

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location:../view/admin_page.php"); // Redirect to index.php
    } else {
        echo "Record not deleted: " . htmlspecialchars($stmt->error); // Debugging line
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
