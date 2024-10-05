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
                header('Location: index.php');
                 exit();
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <style>
      body{
          background-image: linear-gradient(to bottom,#3ebdb4,#fff4ea);
          background-repeat: no-repeat;
          height: 100vh;
          }
      
      .form{
        margin-top:250px;

       border:2px white solid;
       box-shadow:2px 2px 80px white;
      }
      nav{
        background-color: #33576E;
        padding: 10px;
        width: 30%;
        box-shadow:5px 5px 70px white;
      }
    </style>
</head>
<body>
    <div class="form">
        <form method="POST" action="codeVerify.php">
                <h6 style="text-align: left;">Enter Verification Code</h6>
                <div class="mb-3">
                    <label for="verification_code" class="form-label">Verification Code</label>
                    <input type="text" name="verification_code" class="form-control" id="verification_code" required>
                </div>
                <button type="submit" class="btn btn-primary">Verify</button>
        </form>
    </div>
</body>
</html>