<?php
// Get the file to download
$file = isset($_GET['file']) ? $_GET['file'] : null;

// Make sure the file exists
if ($file && file_exists($file)) {
    // Set headers for download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    // Read the file and output it to the browser
    readfile($file);
    exit;
} else {
    // File doesn't exist, redirect or show error message
    echo "File not found.";
}
?>
