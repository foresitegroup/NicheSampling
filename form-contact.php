<?php
session_start();

$salt = "NicheSamplingContactForm";

if ($_POST['confirmationCAP'] == "") {
  require_once "inc/recaptchalib.php";
  $response = null;
  $reCaptcha = new ReCaptcha($RCkey);
  if ($_POST["g-recaptcha-response"]) $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
  
  if ($response != null && $response->success) {
    if (
        $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
        $_POST[md5('company' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
        $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
        $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
        $_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])] != ""
       )
    {
      // Send email
      $Subject = "Comment From Niche Sampling Website";
      $SendTo = "target@nichesampling.com";
      $Headers = "From: Contact Form <contactform@nichesampling.com>\r\n";
      $Headers .= "Reply-To: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\r\n";
      $Headers .= "Bcc: mark@foresitegrp.com\r\n";

      $Message = "Comment from " . $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] . " (" . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . ")\n";
      $Message = $_POST[md5('company' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
      $Message .= $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

      $Message .= "\n";

      $Message .= $_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

      $Message = stripslashes($Message);
    
      mail($SendTo, $Subject, $Message, $Headers);

      $feedback = "Your request has been sent!  Thank you for your interest in Niche Sampling.";
      
      if (!empty($_REQUEST['src'])) {
        header("HTTP/1.0 200 OK");
        echo $feedback;
      }
    } else {
      $feedback = "<strong>Some required information is missing! Please go back and make sure all required fields are filled.</strong>";

      if (!empty($_REQUEST['src'])) {
        header("HTTP/1.0 500 Internal Server Error");
        echo $feedback;
      }
    }
  } else {
    $feedback = "<strong>Some required information is missing! Please go back and make sure all required fields are filled.</strong>";
  }
}

if (empty($_REQUEST['src'])) {
  $_SESSION['feedback'] = $feedback;
  header("Location: " . $_POST['referrer'] . "#contact-form");
}
?>