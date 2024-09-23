<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database configuration file
include 'config/Config.php';

$id = $_SESSION['id']; // User's ID (stored in session)

// Status message initialization
$statusMsg = '';

// Insert artist details into the artist table
$artistInsert = $conn->prepare("INSERT INTO artist (artName, artDescription) VALUES(?, ?)");
$artistInsert->bind_param('ss', $_POST['artName'], $_POST['artDescription']);
$artistInsert->execute();

// File upload path
$targetDir = "assets/images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES["file"]["name"])) {
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Create the upload directory if it doesn't exist
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert album details into the album table, including user ID
            $albumInsert = $conn->prepare("INSERT INTO album (albName, albDescription, fk_genre_id, fk_artist_id, fk_record_label_id, fk_user_id, image) VALUES (?, ?, ?, LAST_INSERT_ID(), ?, ?, ?)");
            $albumInsert->bind_param('ssiiis', $_POST['albName'], $_POST['albDescription'], $_POST['fk_genre_id'], $_POST['fk_record_label_id'], $id, $fileName);

            if ($albumInsert->execute()) {
                $statusMsg = "The file " . $fileName . " has been uploaded and album inserted successfully.";
            } else {
                $statusMsg = "File upload succeeded but album insertion failed: " . $conn->error;
            }
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Redirect with the status message
header("Location: uploads");

?>