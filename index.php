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
    height: 57vh;
}
      
      .form{
        margin-top:250px;

       border:2px white solid;
       box-shadow:2px 2px 80px white;
      }
    </style>
    
</head>
<body>
  <nav> <ul>
    <li><a href="displaydata.php"> Click here to display current users</a></li>
  </ul></nav>
    <div class="form">
    <form method="POST"action="process_form.php" >
        <h1 style="text-align: center;">Sign Up</h1>
        <div class="mb-3 ">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" minlength="8" id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" style="background-color:#33576E;" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
</html>