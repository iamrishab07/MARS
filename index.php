<?php
session_start();

// Check for already logged in user

if(isset($_SESSION['username'])){
  header('Location: mail/main.php');
  exit();
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Mars</title>
  <!-- External Libraries -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- personal css -->
  <link rel="stylesheet" type="text/css" href="css/main_styles.css">

</head>
<body>

<!-- Header Secction -->
  <nav class="navbar navbar-inverse" style="background-color: black;margin-bottom: 0px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="/index.php">
          <!-- <span style="color:white;">@mars.com</span> -->
          <img src="img/logo.png" width="14%" height="140%" style="margin-left: 27px;">
        </a>
      </div>

      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul> -->


      <ul class="nav navbar-nav navbar-right">
        <li><a href="auth/signup.php" style="color: white;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="auth/login.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

    </div>
  </nav>

<!-- End of Header Section -->

<!-- Main Body Section -->
<div class="container-fluid" style="background-color: black; height: 600px;";>
  <h1 style="font-size: 107px;color: white;margin-left: 10%;margin-top: 18%;">
  MARS
  <span style="font-size: 30px;">Mail for everyone</span>
  </h1>

</div>
<!-- background-image: url(img/back01.png); -->

<!-- End of Body Section -->

</body>
</html>