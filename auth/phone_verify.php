<?php
session_start();

// Check for already logged in user
if(isset($_SESSION['username'])){
	header('Location: ../mail/main.php');
	exit();
}

if($_POST['ph_ver']){
	if($_POST['ph_ver']==$_SESSION['rand']){
		unset($_SESSION['rand']); 
		// connecting to the database andd creating user record
		$servername = "localhost";
		$username = "root";
		$password = "password";
		$dbname = "mars";

		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "insert into mars_users values(\"".$_SESSION['email']."\",\"".$_SESSION['name']."\",\"".$_SESSION['phone']."\",\"".$_SESSION['password']."\")";

		$result = $conn->query($sql);
		// Unsetting all the session variables
		unset($_SESSION['email']);
		unset($_SESSION['name']);
		unset($_SESSION['phone']);
		unset($_SESSION['password']);
		// forwarding to login page
		$_SESSION['login_message'] = "You have been registered.Please login to register.";
		header('Location: login.php');
		exit();

	}else{
		$_SESSION['ph_ver_error'] = "Sorry.Code doesn't match.";
	}
}else{

	// When browser is hitting page for the first time

	$r = 1000 + rand(1,100);

	if($_POST['pass']!=$_POST['cpass']){
		$_SESSION['error_signup'] = "Password and confirm password should be same.";
		header('Location: signup.php');
		exit();
	}

	if(strpos($_POST['name'], '@') || strpos($_SESSION['name'], '!') || strpos($_SESSION['name'], '%') || strpos($_SESSION['name'], '$') || strpos($_SESSION['name'], '#')){
		$_SESSION['error_signup'] = "Name can't contain any of !,@,%,$,# letters";
		header('Location: signup.php');
		exit();
	}

	$_SESSION['rand'] = $r;
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['name'] = $_POST['fullname'];
	$_SESSION['phone'] = $_POST['phone'];
	$_SESSION['password'] = $_POST['pass'];
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Phone Verification</title>
</head>
<body>
<div class="container" style="margin-left: 30%;">
	<?php 
		if(isset($_SESSION['ph_ver_error'])){
			echo '<center style="color:red;">' .$_SESSION['ph_ver_error'] . '</center>';
			unset($_SESSION['ph_ver_error']);
		}
	?>

	<form action="phone_verify.php" method="post" >
		<input type="number" name="ph_ver" />
		<input type="submit" value="Verify">
	</form>
</div>
</body>
</html>