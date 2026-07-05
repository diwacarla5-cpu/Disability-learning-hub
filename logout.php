<?php
include 'config/config.php';

// Remove all session data
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to Home Page
header("Location: index.php");
exit();
?>