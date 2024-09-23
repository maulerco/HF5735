<?php


$hn = "localhost";
$un = "dopamine";
$pw = "135798462";
$db = "musiconline";

// Create database connection
$conn = new mysqli($hn, $un, $pw, $db);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $db->connect_error);
}


?>