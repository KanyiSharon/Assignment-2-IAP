<?php
//Databse Credentials
class Database {
    private $servername = "127.0.0.1:3307";
    private $username = "root";
    private $password = "";
    private $dbname = "iap";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function __destruct() {
        $this->conn = null;
    }
}

class DataDisplayer {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db->conn;
    }

    public function displayData() {
        try {
            // Prepare the SQL statement to fetch all users
            $stmt = $this->db->prepare("SELECT email, password, remember FROM users");
            // Execute the statement
            $stmt->execute();
            // Fetch all users as an associative array
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Add styling to table
            echo "
                <style>
                    body {
                        background-image: linear-gradient(to bottom, #3ebdb4, #fff4ea);
                        background-repeat: no-repeat;
                    }
                    table {
                        margin: 20%;
                        margin-left: 30%;
                        border-radius: 20px;
                        background-color: #A2AEB3;
                        padding: 20px;
                        border: 2px white solid;
                        box-shadow: 2px 2px 80px white;
                    }
                </style>
            ";

            // Display the users in an HTML table
            echo "<table border='1'>";
            echo "<tr><th>Email</th><th>Password</th><th>Remember</th></tr>";
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                echo "<td>" . htmlspecialchars($user['password']) . "</td>";
                echo "<td>" . ($user['remember'] ? 'Yes' : 'No') . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

$db = new Database();
$dataDisplayer = new DataDisplayer($db);
$dataDisplayer->displayData();

?>