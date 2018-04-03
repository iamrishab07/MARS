<?php
session_start();

if(!isset($_SESSION['username'])){
	$_SESSION['login_message'] = "You need to login first.";
	header('Location: ../auth/login.php');
	exit();
}

if($_POST['mail_body'] && $_POST['mail_to']){
	// incase someone is sending some mail
}




?>


<!DOCTYPE html>
<html>
<head>
  <title>Compose</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/mars/main_styles.css">
</head>
<body>

	<!-- Header Secction -->
  <nav class="navbar navbar-inverse" style="background-color: black;margin-bottom: 0px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="/mars/index.php">
          <!-- <span style="color:white;">@mars.com</span> -->
          <img src="/mars/img/logo.png" width="14%" height="140%" style="margin-left: 27px;">
        </a>
      </div>

      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul> -->


      <ul class="nav navbar-nav navbar-right">
        <li><a href="/mars/auth/signup.php" style="color: white;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/mars/auth/login.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

    </div>
  </nav>

<!-- End of Header Section -->


	  
	  <div class="header" style="margin-top: 10%;margin-left: 45%;">
	  	<h2>Compose</h2>
	  </div>
	
	<div class="container-fluid" style="margin-top: 2%;margin-left: 38%;">

	  <form method="post" action="sent.php">
	  	<div class="input-group">
	  	  <label style="margin-right: 12px;">Send to</label>
	  	  <input type="email" name="email" value="" placeholder="Send to" style="width: 250px;">
	  	</div>

	  	<div class="input-group">
	  	  <label style="margin-right: 12px;">Subject</label>
	  	  <input type="subject" name="subject" value="" placeholder="Subject" style="width: 250px;">
	  	</div>
	  	<div class="input-group">
	  	  <label style="margin-right: 12px;">Content</label>
	  	  <textarea name="content" style="width: 250px;height:120px;" placeholder="Your message here..."></textarea>
	  	  <!-- <input type="content" name="content" value=""> -->
	  	</div>

	  	<div class="input-group" style="margin-left: 20%;margin-top: 15px;">
	  	  <button type="submit" class="btn" name="reg_user">Send</button>
	  	</div>
	  </form>
	
	</div>

</body>
</html>