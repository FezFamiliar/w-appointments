<?php


$SERVER_NAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DB_NAME = 'booking';


try
{
  $conn = new PDO("mysql:host=$SERVER_NAME;dbname=$DB_NAME", $USERNAME, $PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e)
{
  echo 'Connection failed: ' . $e->getMessage();
}

?>