<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Preflight request. Respond with 200 OK.
    exit(0);
}
// Database credentials
$servername = "127.0.0.1:3307"; // Database server (usually localhost)
$username = "root2"; // Database username
$password = ""; // Database password (change if necessary)
$dbname = "iap"; // Replace with your database name

try {
    // Create a new PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Debugging: Check if form data is being posted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "Form submitted via POST.<br>";

        // Debugging: Check if $_POST['email'] and $_POST['password'] are set
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $remember = isset($_POST['remember']) ? 1 : 0;

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO users (email, password, remember) VALUES (:email, :password, :remember)");

            // Bind parameters to the SQL query
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':remember', $remember);

            // Execute the statement
            $stmt->execute();

            echo "New record created successfully";
        } else {
            echo "Error: Email or Password is missing.<br>";
            // Debugging: Print the content of $_POST
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
        }
    } else {
        echo "Form not submitted via POST.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection (optional, PDO closes connection automatically when the script ends)
$conn = null;
?>
