<?php

$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "test"; 

$con = new mysqli($host, $user, $password, $database);
$query = "SELECT * FROM users";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>