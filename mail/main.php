<!-- This page is for the inbox implementation part -->
<?php
session_start();
/* Commented for testign purpose only 
if(!isset($_SESSION['username'])){
  header('Location: /mars/auth/login.php');
  exit();
}
*/

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
			<center style="font-weight:bold;font-size: 24px;margin-top: 5%;">Your MARS Inbox</center>
			<?php
				// connecting to the database
				include '../db.php';

				$sql = "select * from mars_mailbox where rec=\"" . $_SESSION['username'] ."\"";

				$result = $conn->query($sql);

		  
		    	if(mysqli_num_rows($result)==0){
					echo '<center style="margin-top:10%;">No mails to show</center>';	
				}else{
					echo '<table class="table table-hover">
						    <thead>
						      <tr>
						        <th>Sender</th>
						        <th>Subject</th>
						        <th>Body</th>
						      </tr>
						    </thead>
						    <tbody>
						';

					while($row = mysqli_fetch_assoc($result)){

							$font = "normal";

							if($row['rec_end']==1){
								$font = "bold";
							}

							echo '<tr>
							        <td style="font-weight: '.$font.'">'.$row['sender'].'</td>
							        <td style="font-weight: '.$font.'"><a href="/mars/mail/detail.php?x='.$row['id'].'" style="text-decoration:none;">'.$row['subject'].'</a></td>
							        <td style="font-weight: '.$font.'">'.$row['body'].'</td>
							        <td style="font-weight: '.$font.'">'.$row['timestamp'].'</td>
							      </tr>';
						}

						echo '</tbody></table>';
				}

			    ?>
			    
		</div>

		<!-- End of mail listing section -->

	</div>
</div>





</body>
</html>