<?php
session_start();

// Path to the protected PDF file
$filePath = 'assets/pdf/sample.pdf'; // Adjust the path as needed

// Check if the form was submitted
if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    // Check if the PDF file exists
    if (file_exists($filePath)) {
        // Send appropriate headers to serve the PDF file
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="sample.pdf"');
        readfile($filePath);
        
        // Unset the session variable to prevent further access
        unset($_SESSION['form_submitted']);
    } else {
        // File not found
        header('HTTP/1.0 404 Not Found');
        echo 'File not found.';
    }
} else {
    // If session variable is not set or has expired, redirect to index page
    header('Location: http://localhost/touch-screen/'); // Update with your index page path
    exit;
}
?>
