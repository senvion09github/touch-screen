<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	// error_reporting(E_ALL);
date_default_timezone_set('Asia/Calcutta');

if(isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'){
	$servername = "localhost";
	$username = "root";
	$password = '';
	$dbname = "db_touch_screen";
}
else{
	$servername = "localhost";
	$username = "agencyin_2024";
	$password = '}ceVB-aR-wj9';
	$dbname = "db_touch_screen";

}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	// die("Connection failed: " . $conn->connect_error);
	die("Connection failed: " );
} 

$admin_email = 'tech.agency09@gmail.com';
$site_key = "6LfrpRYqAAAAAFboLVF_GR6QM2qEZJn_hykGUZcV";
$recaptcha_secret = "6LfrpRYqAAAAAL7YZ61AmKfB-yebONnmPtS1SrGc";

// function sendMail($to, $subject, $message, $attachment=NULL,$size=NULL,$type=NULL)
// {
//     $sender_email = "info@vihangahead.com";

//     $sender_name = "Vihang Ahead";

//     // Always set content-type when sending HTML email
//     $headers = 'MIME-Version: 1.0' . "\r\n";
//     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//     $headers .= 'From: ' . $sender_name . ' <' . $sender_email . '>' . "\r\n";

//     if(!empty($attachment)){
//         //read from the uploaded file & base64_encode content
//         $handle = fopen($attachment, "r");  // set the file handle only for reading the file
//         $content = fread($handle, $size); // reading the file
//         fclose($handle);                  // close upon completion

//         $encoded_content = chunk_split(base64_encode($content));

//         $message .="Content-Type: $type; name=".$attachment."\r\n";
//         $message .="Content-Disposition: attachment; filename=".$attachment."\r\n";
//         $message .="Content-Transfer-Encoding: base64\r\n";
//         $message .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
//         $message .= $encoded_content; // Attaching the encoded file with email
//     }

//     $result = mail($to, $subject, $message, $headers);
//     return $result;
// }


function d($data){
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}
function dd($data){
  echo "<pre>";
  print_r($data);
  echo "</pre>";
  die();
}

function sendResponse($status,$message,$data=''){
  $arr = array('status' => $status, 'message' => $message, 'data' => $data);
  echo json_encode($arr);
  die;
}


function validateRecaptcha($token){
  GLOBAL $site_key;
  GLOBAL $recaptcha_secret;
      //validate google recaptcha
      $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
      $recaptcha_response = $token;
      
      // Make and decode POST request:
      $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
      $recaptcha = json_decode($recaptcha);
      
      
      // Take action based on the score returned:
      if ($recaptcha->success != true || $recaptcha->success != 1) {
          return false;
      }else{
        return true;
      }
}

?>
