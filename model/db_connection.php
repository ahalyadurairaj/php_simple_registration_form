
<?php
$config = require '../config.php'; 


class DatabaseConnection {
    public $conn;

    public function __construct($config) {
        $this->conn = mysqli_connect(
            $config['host'],
            $config['root'],
            $config['password'],
            $config['database']
        );

        if (!$this->conn) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

// Usage:



//check the connection................

// try {
//     $config = require('../config.php');
//     $databaseConnection = new DatabaseConnection($config);
//     $conn = $databaseConnection->getConnection();
//     echo "Connection established";
// } catch (Exception $e) {
//     echo "Error: " . $e->getMessage();
// }













   


?>
