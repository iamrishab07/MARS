<!-- This page is for the inbox implementation part -->
<?php
session_start();

echo 'Signed in as : ' . $_SESSION['username'];

unset($_SESSION['username']);

?>



<!DOCTYPE html>
<html>
<head>
  <title>Compose</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Compose</h2>
  </div>
	
  <form method="post" action="sent.php">
  	<div class="input-group">
  	  <label>Send to</label>
  	  <input type="email" name="email" value="">
  	</div>
  	<div class="input-group">
  	  <label>Subject</label>
  	  <input type="subject" name="subject" value="">
  	</div>
  	<div class="input-group">
  	  <label>Content</label>
  	  <input type="content" name="content" value="">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Send</button>
  	</div>
  </form>
</body>
</html>