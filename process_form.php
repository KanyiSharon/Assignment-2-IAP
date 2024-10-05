<?php

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

class FormProcessor {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db->conn;
    }

    public function processForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $remember = isset($_POST['remember']) ? 1 : 0;

                $stmt = $this->db->prepare("INSERT INTO users (email, password, remember) VALUES (:email, :password, :remember)");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':remember', $remember);

                if ($stmt->execute()) {
                    echo "New record created successfully";
                } else {
                    echo "Error: Could not execute the query.";
                }
            } else {
                echo "Error: Email or Password is missing.<br>";
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
            }
        } else {
            echo "Form not submitted via POST.";
        }
    }
}

$db = new Database();
$formProcessor = new FormProcessor($db);
$formProcessor->processForm();

?>
?>
