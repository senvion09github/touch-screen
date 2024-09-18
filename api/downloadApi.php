<?php 
include 'config.php';
session_start();
//echo "<pre>";print_r($_POST);exit;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name     = htmlspecialchars(trim($_POST['name']));
  $email    = htmlspecialchars(trim($_POST['email']));
  $countryCode    = htmlspecialchars(trim($_POST['countryCode']));
  $mobile    = htmlspecialchars(trim($_POST['mobile']));
  $company_name   = htmlspecialchars(trim($_POST['company_name']));
  $message   = htmlspecialchars(trim($_POST['message']));
  $created_at   = date("Y-m-d H:i:s");
  $status = 0;
  //START validation
  $required_fields = [
    'name' => 'Name',
    'email' => 'Email',
    'countryCode' => 'countryCode',
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

  // save entries
  $stmt = $conn->prepare("INSERT INTO `contact_us` ( `name`, `email`, `countryCode`, `mobile`, `company_name`, `message`, `status`, `created_at`) VALUES (?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssss", $name, $email, $countryCode, $mobile , $company_name, $message, $status, $created_at);


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
