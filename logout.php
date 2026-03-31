<?php
session_start();

// remove all session variables
$_SESSION = [];

// destroy session
session_destroy();

// redirect
header("Location: home.php");
echo "logged out";
exit;
?>