<!-- This page is for the inbox implementation part -->
<?php
session_start();

echo 'Signed in as : ' . $_SESSION['username'];

unset($_SESSION['username']);

?>
