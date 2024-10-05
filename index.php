<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
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
    <form name="signupForm" method="POST" action="process_form.php" onsubmit="return validateForm()">
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