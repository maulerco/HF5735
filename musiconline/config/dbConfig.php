<?php


$hn = "localhost";
$un = "dopamine";
$pw = "123456";
$db = "musiconline";

// Create database connection
$conn = new mysqli($hn, $un, $pw, $db);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $db->connect_error);
}


?>