<?php
session_start(); // Start the session to access session variables

// Unset the user_login session variable
unset($_SESSION['user_login']);

// Optionally destroy the entire session to clear all session data
session_destroy();

// Redirect to the login page or homepage
header("Location: login.php"); // Replace with the actual page you want to redirect to
exit();
?>
