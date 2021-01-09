<?php


const SERVER_NAME = 'localhost';
const USERNAME = 'root';
const PASSWORD = 'rot13';
CONST DB_NAME = 'appointment';


try
{
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e)
{
  echo 'Connection failed: ' . $e->getMessage();
}

$conn = null;


?>