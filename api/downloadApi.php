<?php 
include 'config.php';
session_start();
//echo "<pre>";print_r($_POST);exit;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name     = htmlspecialchars(trim($_POST['name']));
  $email    = htmlspecialchars(trim($_POST['email']));
  $mobile    = htmlspecialchars(trim($_POST['mobile']));
  $company_name   = htmlspecialchars(trim($_POST['company_name']));
  $message   = htmlspecialchars(trim($_POST['message']));
  $token    = $_POST['token'];
  $created_at   = date("Y-m-d H:i:s");
  $status = 0;
  //START validation
  $required_fields = [
    'name' => 'Name',
    'email' => 'Email',
    'mobile' => 'Mobile',
    'company_name' => 'company_name',
  ];
    
    foreach ($required_fields as $key => $value) {
      if(isset($_POST[$key]) )
      {
        if( trim($_POST[$key]) == '' ){
          sendResponse(0,$value.' is required');
        }
      }else{
        sendResponse(0,$value.' is missing');
      }
    }

  if($mobile != '' && !preg_match('/^\d{10}$/',$mobile))
  {
      sendResponse(0,'Invalid mobile number');
  }
  
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      sendResponse(0,'Invalid email');
  }

  if ($token) {
      //validate google recaptcha
      $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
      $recaptcha_secret = '6LfrpRYqAAAAAL7YZ61AmKfB-yebONnmPtS1SrGc';
      $recaptcha_response = $token;

      // Make and decode POST request:
      $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
      $recaptcha = json_decode($recaptcha);

      // Take action based on the score returned:
      if ($recaptcha->success != true || $recaptcha->success != 1) {
          sendResponse(0, "Invalid captcha.");
      }

  }
  else {
      sendResponse(0, 'Captcha is missing.');
  }


  // save entries
  $stmt = $conn->prepare("INSERT INTO `download_brochure` ( `name`, `email`, `mobile`, `company_name`, `message`, `status`, `created_at`) VALUES (?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssss", $name, $email, $mobile, $company_name, $message, $status, $created_at);


  if ($stmt->execute()) {
    // Set session variable to allow PDF access
    $_SESSION['form_submitted'] = true;
    sendResponse(1, 'Thank you for enquiry.');
  } 
  else {
    sendResponse(0,'Failed to save data');
  }
    
}else{
  header("Location: ".$base_url);
  die;
}   
?>
