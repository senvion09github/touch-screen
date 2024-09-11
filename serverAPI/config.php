<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	// error_reporting(E_ALL);
require 'PHPMailer/PHPMailerAutoload.php';
date_default_timezone_set('Asia/Calcutta');

if(isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'){
	$servername = "localhost";
	$username = "root";
	$password = '';
	$dbname = "db_agecy09_in";
}
else{
	$servername = "localhost";
	$username = "agencyin_2024";
	$password = '}ceVB-aR-wj9';
	$dbname = "agencyin_2024";

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

function sendMail($to, $subject, $message, $is_admin = 0, $cc_email = '', $file_name_ext = '')
{
    // sendResponse(0, $file_name_ext.' - '.$file_address);
    $mail = new PHPMailer;
    $mail->IsSMTP();        
    // $mail->SMTPDebug  = 3;      
    // $mail->Debugoutput = 'html';                       
    $mail->Host = 'smtp.gmail.com';               
    $mail->SMTPAuth = true;                              
    $mail->Username = 'info@agency09.in';                
    $mail->Password = 'hybvmpxolqmaiqtx';   

    // $mail->Port = 465;
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';

    $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ]);

    if($is_admin == 0){
		include 'emailers/email_template.php';
	}

    // $to = 'nilesh@agency09.in';

    $mail->From = 'info@agency09.in'; 
    $mail->FromName = 'AGENCY09';
    $mail->AddAddress($to);

    $new_address = "assets/uploads/".$file_name_ext;
    if(!empty($file_name_ext)){
        $mail->addAttachment($new_address, $file_name_ext); // Name is optional
    }

    if($cc_email){
		// $headers .= 'Cc: '.$cc_email . "\r\n";
        $mail->AddCC($cc_email);
	}

    $mail->IsHTML(true);

    $mail->Subject = $subject;
    $mail->Body    = $message;

    $result = $mail->Send();
    // return $result;
}