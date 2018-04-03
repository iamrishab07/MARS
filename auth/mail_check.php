<?php

session_start();

// Check for already logged in user

if(isset($_SESSION['username'])){
	header('Location: ../mail/main.php');
	exit();
}

// Normal User login Process

$email = $_POST['email'];

if(strpos($email, '@')){
	$_SESSION['error_mail_check'] = "<b>" . $email . "</b>  contains @ sign";
	header('Location: signup.php');
	exit();
}

// Connecting to the database

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "mars";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Updating the information in the database

$sql = "select * from mars_users where email = \"" . $email . "@mars.com\"";

$result = $conn->query($sql);

if(mysqli_num_rows($result)==0){
	$_SESSION['mail_check'] = $email;
	header('Location: signup.php');
	exit();
}

while($row = mysqli_fetch_assoc($result)){
	$_SESSION['error_mail_check'] = "Id:  <b>" . $email . "</b>  already exists.";
	header('Location: signup.php');
	exit();
}

?>