<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$db="demo";

$dsn = "mysql:host=$dbhost;dbname=$db";

try{
  $conn= new PDO($dsn, $dbuser, $dbpass);
  //echo "You have connected";
  return $conn;
}catch(PDOException $e){
  $error_message = $e->getMessage();
  echo $error_message;
  exit();
}




?>