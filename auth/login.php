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

<!-- Header Section -->
  <nav class="navbar navbar-inverse" style="background-color: black;margin-bottom: 0px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="../index.php">
          <!-- <span style="color:white;">@mars.com</span> -->
          <img src="../img/logo.png" width="10%" height="120%" style="margin-left: 27px;">
        </a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php" style="color: white;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

    </div>
  </nav>

<!-- End of Header Section -->


<div class="container" style="width: 340px;">
    <br>

    <center><h3>Sign in to your Account</h3></center>
    
    <br><br>

  <form action="./action_login.php">
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

    <center><button type="submit" class="btn btn-primary" style="width: 100px;">Login</button></center>
  </form>
</div>


</body>
</html>
