<?php
session_start();

// Check for already logged in user
if(isset($_SESSION['username'])){
	header('Location: ../mail/main.php');
	exit();
}

// Normal User login Process

$email = $_POST['email'];
$pass = $_POST['pwd'];


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

$sql = "select * from mars_users where email = \"" . $email . "\"";

$result = $conn->query($sql);

if(mysqli_num_rows($result)==0){
	$_SESSION['error_login'] = "Email id doesn't exist";
	header('Location: login.php');
	exit();
}


while($row = mysqli_fetch_assoc($result)){
	if($row['password']==$pass){
		$_SESSION['username'] = $email;
		header('Location: ../mail/main.php');
		exit();
	}else{
		$_SESSION['error_login'] = "Password is not correct";
	header('Location: login.php');
	exit();
	}
}

?>