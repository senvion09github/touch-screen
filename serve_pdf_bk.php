<?php
session_start();

if ($_GET['pdf'] == 1) {
    $filePath = 'assets/pdf/2.7-brochure.pdf'; // Adjust the path as needed
    $file_name = "2.7-brochure.pdf";
}elseif ($_GET['pdf'] == 2) {
    $filePath = 'assets/pdf/3.1-brochure.pdf'; // Adjust the path as needed
    $file_name = "3.1-brochure.pdf";
}elseif ($_GET['pdf'] == 3) {
    $filePath = 'assets/pdf/4.2-brochure.pdf'; // Adjust the path as needed
    $file_name = "4.2-brochure.pdf";
}elseif ($_GET['pdf'] == 4) {
    $filePath = 'assets/pdf/2.3-brochure.pdf'; // Adjust the path as needed
    $file_name = "2.3-brochure.pdf";
}elseif ($_GET['pdf'] == 5) {
    $filePath = 'assets/pdf/sample.pdf'; // Adjust the path as needed
    $file_name = "sample.pdf";
}elseif ($_GET['pdf'] == 6) {
    $filePath = 'assets/pdf/sample.pdf'; // Adjust the path as needed
    $file_name = "sample.pdf";
}elseif ($_GET['pdf'] == 'c') {
    $filePath = 'assets/pdf/Senvion-Corporate-Brochure.pdf'; // Adjust the path as needed
    $file_name = "Senvion-Corporate-Brochure.pdf";
}
// Path to the protected PDF file

// Check if the form was submitted
if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    // Check if the PDF file exists
    if (file_exists($filePath)) {
        // Send appropriate headers to serve the PDF file
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="'.$file_name.'"');
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
