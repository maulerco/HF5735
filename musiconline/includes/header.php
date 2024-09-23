<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('ROOT_DIR', '/HF5735/musiconline/');




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Online</title>
    <link rel="stylesheet" href="<?= ROOT_DIR ?>assets/css/styles.css">
</head>
<body>
  <?php include 'navigation.php'; ?>  
