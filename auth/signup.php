<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MARS - User Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">((  MARS  ))</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="./../about.php">About Us</a></li>
      <li><a href="#">Sign Up</a></li>
      <li><a href="login.php">Sign In</a></li>
    </ul>
  </div>
</nav>
  


<div class="container" style="width: 340px;">
    <br>

<?php
    
    if(isset($_SESSION["mail_check"])){
      unset($_SESSION["mail_check"]);

    $mail = $_SESSION["mail_check"];

      echo '
        <center><h3>Register Here</h3></center>
    
         <br><br>

      <form action="/action_page.php">
          <div class="form-group">
            <label for="email">MARS Id:</label>
            <input type="email" class="form-control" name="email" value="'. $mail .'@marsmail.com" readonly>
          </div>

          <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" class="form-control" name="fullname"  required="required">
          </div>

          <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="number" class="form-control" name="phone"  required="required">
          </div>


          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="pass"  required="required">
          </div>


          <div class="form-group">
            <label for="pwd">Confirm Password:</label>
            <input type="password" class="form-control" name="cpass"  required="required">
          </div>

          <center><button type="submit" class="btn btn-primary" style="width: 100px;">Login</button></center>

        </form>

        ';

    }


    else{
    
    echo '
      <form action="/mail_check.php">
        <center><h3>Check For Avaibility :  </h3></center><br><br>
            <div class="form-group">
              <label for="pwd">Enter Your Choice:</label>
              <br><br>
              <input type="password" class="form-control" name="cpass"  required="required">
            </div>

            <center><button type="submit" class="btn btn-primary" style="width: 100px;">Check</button></center>
      </form>
    ';
    }


?>




<!-- 
  <form action="/action_page.php">
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email" required="required">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pwd"  required="required">
    </div>
    
    <!-- <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div> -->

<!--     <center><button type="submit" class="btn btn-primary" style="width: 100px;">Login</button></center>
  </form> -->

</div>


</body>
</html>