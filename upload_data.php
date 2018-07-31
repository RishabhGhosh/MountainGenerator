<?php
session_start();
$upload_dir = "images1/";
$img = $_POST['hidden_data'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $_SESSION['username'] . time() .".jpeg";
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';
?>