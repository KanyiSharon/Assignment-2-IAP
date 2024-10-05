<?php
use PHPMailer\PHPMailer\PHPMailer;
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'vendor/autoload.php'; // Ensure you have installed PHPMailer via Composer

    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? 'Yes' : 'No';

     // Generate a random verification code
     $verificationCode = rand(100000, 999999);
     $_SESSION['verification_code'] = $verificationCode;
     $_SESSION['email'] = $email;
     $_SESSION['password'] = $password;
     $_SESSION['remember'] = $remember;
 
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sharon.kanyi@strathmore.edu'; // SMTP username
        $mail->Password   = 'fmok fuxw trnm vqck'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('sharon.kanyi@strathmore.edu', 'Mailer');
        $mail->addAddress($email); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Here is your Verification code..';
        $mail->Body    = 'Your verification code is' .$verificationCode;
        

        $mail->send();
        echo 'Message has been sent to your email';
   // Redirect to verification page
        header('Location: codeverify.php');
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function validateForm() {
            const email = document.forms["signupForm"]["email"].value;
            const password = document.forms["signupForm"]["password"].value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }

            return true;
        }
    </script>
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
  <nav>
    <ul>
      <li style="list-style-type:none; color:white;">
        <a href="displaydata.php" style="text-decoration:none;background-color:white;">Click here to display current users</a>
      </li>
    </ul>
  </nav>
  <div class="form">
    <form name="signupForm" method="POST" action="index.php" onsubmit="return validateForm()">
        <h1 style="text-align: center;">Sign Up</h1>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>
