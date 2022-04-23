<?php
// Initialize the session
session_start();

require_once "config.php";
$index = $_SESSION["last_playlist"];
$current_user = $_SESSION["username"];

$sql = "UPDATE users SET last_playlist = '$index' WHERE username = '$current_user'";
$conn->query($sql);


// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>