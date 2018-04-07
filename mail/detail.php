<!-- This page is for the inbox implementation part -->
<?php
session_start();
/* Commented for testign purpose only 
if(!isset($_SESSION['username'])){
  header('Location: /mars/auth/login.php');
  exit();
}
*/

$id = $_GET['x'];
include '../db.php';

$sql = "";// change this to update statement

$result = $conn->query($sql);

?>



<!DOCTYPE html>
<html>
<head>
  <title>Inbox</title>
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
        <a class="navbar-brand" href="/mars/index.php">
          <!-- <span style="color:white;">@mars.com</span> -->
          <img src="/mars/img/logo.png" width="14%" height="140%" style="margin-left: 27px;">
        </a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="/mars/auth/signup.php" style="color: white;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/mars/auth/login.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

    </div>
  </nav>

<!-- End of Header Section -->

<br>

<!-- Search Bar via Subject -->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12" style="padding-left: 34%;margin-bottom: 5%;">
		<form action="/mail/main.php" method="post">
			<input type="text" name="search_box" style="width: 400px;" placeholder="Search with Subject here ...">
			<input type="submit" name="search_submit" value="Search Mail">
		</form>
		</div>
	</div>
</div>

<!-- End of Search Section -->

<!-- Start of Inbox Section -->
<div class="container-fluid">
	<div class="row">
		<!-- Left part for showing links -->
			<div class="col-md-2"><br><br><br>
				<ul class="list-group">
				  <li class="list-group-item">
				  	<a href="/mars/mail/compose.php">Compose</a>
				  </li>
				  <li class="list-group-item">
				  	<a href="/mars/mail/main.php">Inbox</a>
				  </li>
				  <li class="list-group-item">
				  	<a href="/mars/mail/sent.php">Sent Mail</a>
				  </li>
				</ul>

			</div>
		<!-- End of links -->
			
		<!-- Division for seperation -->
		<div class="col-md-2"></div>

		
		<!-- Section where mails will be listed using php -->
			
		<div class="col-md-8" style="	padding-top: 5px;padding-bottom: 15px;">
			
			<?php
				// connecting to the database
				// include '../db.php';

				$sql = "select * from mars_mailbox where id=" . $id;

				$result = $conn->query($sql);

		  
		    	if(mysqli_num_rows($result)==0){
					echo '<center style="margin-top:10%;">No Such Mail Exists.</center>';	
				}else{
					
					while($row = mysqli_fetch_assoc($result)){

							$seen_status = "Unseen";

							if($row['sender']==$_SESSION['username']) $_SESSION['rec'] = $row['receiver'];
							else $_SESSION['rec'] = $row['sender'];

							$_SESSION['mail_subject'] = $row['subject'];

							if($row['rec_end']==1){
								$seen_status = "Seen";
							}

							echo '
								<div class="row">
								<div class="col-md-2">Subject</div>
								<div class="col-md-8">'.$row['subject'].'</div>
								<div class="col-md-2">Seen Status : '.$seen_status.'</div>
								</div>
								<br>
								<div class="row">
								<div class="col-md-2">Sender</div>
								<div class="col-md-8">'.$row['sender'].'</div>
								<div class="col-md-2"></div>
								</div>
								<br>
								<div class="row">
								<div class="col-md-2">Receiver</div>
								<div class="col-md-8">'.$row['receiver'].'</div>
								<div class="col-md-2"></div>
								</div>
								<br>
								<div class="row">
								<div class="col-md-2">Body</div>
								<div class="col-md-8">'.$row['body'].'</div>
								<div class="col-md-2"></div>
								</div>

								<form action="/mars/mail/compose.php" method="post">
								<input type="submit" value="Reply">
								</form>
							';

						}
				}

			    ?>
			    
		</div>

		<!-- End of mail listing section -->

	</div>
</div>





</body>
</html>