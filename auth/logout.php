<?php

session_start();

if(!isset($_SESSION['username'])){
	$_SESSION['login_message'] = "You need to login first.";
	header('Location: ../auth/login.php');
	exit();
}

unset($_SESSION['username']);
echo "logout page";

$_SESSION['login_message'] = "Successfully logged out.";

header('Location: login.php');
exit();

?>