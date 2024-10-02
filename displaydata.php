<?php
// Database credentials
$servername = "127.0.0.1:3307"; // Database server (usually localhost)
$username = "root"; // Database username
$password = ""; // Database password (change if necessary)
$dbname = "iap"; // Replace with your database name

try {
    // Create a new PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement to fetch all users
    $stmt = $conn->prepare("SELECT email, password, remember FROM users");
    // Execute the statement
    $stmt->execute();

    // Fetch all users as an associative array
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

// Close connection (optional, PDO closes connection automatically when the script ends)
$conn = null;
?>