<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $enteredCode = $_POST['verification_code'];

        if ($enteredCode == $_SESSION['verification_code']) {
                // Verification successful, proceed with login
                $email = $_SESSION['email'];
                $password = $_SESSION['password'];
                $remember = $_SESSION['remember'];

                // Here you can add code to log the user in, e.g., set session variables, redirect, etc.
                echo "Verification successful. You are now logged in.";
                // Clear the session variables
                session_unset();
                session_destroy();
        } else {
                echo "Invalid verification code.";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verify Code</title>
        <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form">
        <form method="POST" action="codeVerify.php">
                <h1 style="text-align: center;">Enter Verification Code</h1>
                <div class="mb-3">
                    <label for="verification_code" class="form-label">Verification Code</label>
                    <input type="text" name="verification_code" class="form-control" id="verification_code" required>
                </div>
                <button type="submit" class="btn btn-primary">Verify</button>
        </form>
    </div>
</body>
</html>