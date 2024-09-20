<?php
session_start();

<<<<<<< Updated upstream
// Define the base redirect path
$baseRedirect = 'http://localhost/touch-screen/';
=======
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
    $filePath = 'assets/pdf/leaflet_3_15022023_13-09-24.pdf'; // Adjust the path as needed
    $file_name = "leaflet_3_15022023_13-09-24.pdf";
}elseif ($_GET['pdf'] == 6) {
    $filePath = 'assets/pdf/leaflet_3_15022023_13-09-24.pdf'; // Adjust the path as needed
    $file_name = "leaflet_3_15022023_13-09-24.pdf";
}elseif ($_GET['pdf'] == 'c') {
    $filePath = 'assets/pdf/Senvion-Corporate-Brochure.pdf'; // Adjust the path as needed
    $file_name = "Senvion-Corporate-Brochure.pdf";
}
// Path to the protected PDF file
>>>>>>> Stashed changes

// Check the query parameter for pdf
if (isset($_GET['pdf'])) {
    switch ($_GET['pdf']) {
        case 'c':
            // Check if the form was submitted
            if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
                // Redirect to the specified path for pdf = 1
                header('Location: http://localhost/touch-screen/assets/pdf/flipbook-corporate/index.html');
                exit;
            }

            // Redirect to the index page if the form is not submitted
            header('Location: ' . $baseRedirect);
            exit;

        case '1':
            // Check if the form was submitted
            if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
                // Redirect to the specified path for pdf = 1
                header('Location: http://localhost/touch-screen/assets/pdf/flipbook-source_2.7M130/');
                exit;
            }

            // Redirect to the index page if the form is not submitted
            header('Location: ' . $baseRedirect);
            exit;

        case '2':
            // Check if the form was submitted
            if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
                // Redirect to the specified path for pdf = 2
                header('Location: http://localhost/touch-screen/assets/pdf/flipbook-source_3.1M130/');
                exit;
            }

            // Redirect to the index page if the form is not submitted
            header('Location: ' . $baseRedirect);
            exit;

        case '3':
            // Check if the form was submitted
            if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
                // Redirect to the specified path for pdf = 3
                header('Location: http://localhost/touch-screen/assets/pdf/flipbook-source_4.2M160/');
                exit;
            }

            // Redirect to the index page if the form is not submitted
            header('Location: ' . $baseRedirect);
            exit;

        case '4':
            // Check if the form was submitted
            if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
                // Redirect to the specified path for pdf = 4
                header('Location: http://localhost/touch-screen/assets/pdf/flipbook-source_2.3M120/');
                exit;
            }

            // Redirect to the index page if the form is not submitted
            header('Location: ' . $baseRedirect);
            exit;

        default:
            // Redirect if the pdf parameter is invalid
            header('Location: ' . $baseRedirect);
            exit;
    }
} else {
    // Redirect if the pdf parameter is missing
    header('Location: ' . $baseRedirect);
    exit;
}
?>
