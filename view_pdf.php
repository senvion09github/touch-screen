<?php
// view_pdf.php
session_start();

// Check if the form was submitted
if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    // Provide the link to view the brochure
    echo '<a href="serve_pdf.php" id="lnk_download_brochure" target="_blank">View Brochure</a>';
    // Clear the session variable if you want to allow access only once
    unset($_SESSION['form_submitted']);
} else {
    header('HTTP/1.0 403 Forbidden');
    echo 'You must submit the form to view the brochure.';
    exit;
}
?>
