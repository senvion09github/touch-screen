<?php
session_start();

// Define the base redirect path
$baseRedirect = 'http://localhost/touch-screen/';

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
