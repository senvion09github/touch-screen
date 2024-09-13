<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	// error_reporting(E_ALL);
//require 'PHPMailer/PHPMailerAutoload.php';
date_default_timezone_set('Asia/Calcutta');

if(isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'){
	$servername = "localhost";
	$username = "root";
	$password = '';
	$dbname = "db_agecy09_in";
}
else{
	$servername = "localhost";
	$username = "appadmin";
	$password = 'App$^&min!23';
	$dbname = "corporate_website_2023";

}
$admin_email	= "info@agency09.in";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	// die("Connection failed: " . $conn->connect_error);
	die("Connection failed: " );
} 

// Function to send JSON response
function sendResponse($status, $message) {
    echo json_encode(array("status" => $status, "message" => $message));
    exit;
}