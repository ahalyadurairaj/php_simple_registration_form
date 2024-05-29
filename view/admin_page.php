<?php
    require('../model/db_connection.php');
    require('../config.php');

    

    $databaseConnection = new DatabaseConnection($config);
    $conn = $databaseConnection->getConnection();

    // if ($conn) {
    //     echo "connected successfully<br>";
    // } else {
    //     die("failed to connect: ". mysqli_connect_error());
    // }

   $table = "SELECT * FROM registration_data";

   $result = mysqli_query($conn, $table);
   if($result) {
    echo "<table style='width: 100%; border-collapse: collapse;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='border: 1px solid #ddd; padding: 8px; text-align: left;'>id</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px; text-align: left;'>Name</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px; text-align: left;'>Email</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px; text-align: left;'>Password</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px; text-align: left;'>Course Name</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px; text-align: center;'>Actions</th>";
    echo "</tr>";

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>". htmlspecialchars($row['id']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>". htmlspecialchars($row['name']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>". htmlspecialchars($row['email']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>". htmlspecialchars($row['password']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>". htmlspecialchars($row['coursename']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px; text-align: center;'>";
        // echo "<button type='submit' name='deleteBtn' style='margin-right: 5px; padding: 5px 10px; background-color: #007bff; color: white; border: none; cursor: pointer;'" . $row['id'] . "'>Edit</button>";
        echo "<a href='../view/edit.php?id=" . $row['id'] . "' style='display: inline-block; padding: 5px 20px; margin-right: 15px; background-color: blue; color: white; text-decoration: none; border: none; cursor: pointer;'>Edit</a>" ;
        echo "<a href='../controller/delete.php?id=" . $row['id'] . "' style='display: inline-block; padding: 5px 10px; background-color: #dc3545; color: white; text-decoration: none; border: none; cursor: pointer;'>DELETE</a>";
        // echo "<button type='submit' name='deleteBtn' style='margin-right: 5px; padding: 5px 10px; background-color:red; color: white; border: none; cursor: pointer;'" . $row['id'] . "'>DELETE</button>";

        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}






mysqli_close($conn);
   

?>

<script>
   
</script>