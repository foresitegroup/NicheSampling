<?php
session_start();

$salt = "NicheSamplingWomensFitnessForm";

if ($_POST['confirmationCAP'] == "") {
  if (
      $_POST[md5('firstname' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('lastname' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('businessname' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('address' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('city' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST['state'] != "" &&
      $_POST[md5('zip' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('numberstudents' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST['hear']
     )
  {
    //Add to database
    include_once "inc/dbconfig.php";
    $mysqli->query("INSERT INTO `womensfitness` (
                  firstname,
                  lastname,
                  businessname,
                  address,
                  address2,
                  city,
                  state,
                  zip,
                  phone,
                  email,
                  numberstudents,
                  hear
                  ) VALUES (
                  '" . $mysqli->real_escape_string($_POST[md5('firstname' . $_POST['ip'] . $salt . $_POST['timestamp'])]) . "',
                  '" . $mysqli->real_escape_string($_POST[md5('lastname' . $_POST['ip'] . $salt . $_POST['timestamp'])]) . "',
                  '" . $mysqli->real_escape_string($_POST[md5('businessname' . $_POST['ip'] . $salt . $_POST['timestamp'])]) . "',
                  '" . $mysqli->real_escape_string($_POST[md5('address' . $_POST['ip'] . $salt . $_POST['timestamp'])]) . "',
                  '" . $mysqli->real_escape_string($_POST[md5('address2' . $_POST['ip'] . $salt . $_POST['timestamp'])]) . "',
                  '" . $mysqli->real_escape_string($_POST[md5('city' . $_POST['ip'] . $salt . $_POST['timestamp'])]) . "',
                  '" . $_POST['state'] . "',
                  '" . $mysqli->real_escape_string($_POST[md5('zip' . $_POST['ip'] . $salt . $_POST['timestamp'])]) . "',
                  '" . $mysqli->real_escape_string($_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])]) . "',
                  '" . $mysqli->real_escape_string($_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])]) . "',
                  '" . $mysqli->real_escape_string($_POST[md5('numberstudents' . $_POST['ip'] . $salt . $_POST['timestamp'])]) . "',
                  '" . $_POST['hear'] . "'
                  )");
    $mysqli->close();

    $feedback = "Your request has been sent!  Thank you for your interest.";
    
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
}

if (empty($_REQUEST['src'])) {
  $_SESSION['feedback'] = $feedback;
  header("Location: " . $_POST['referrer'] . "#womens-fitness-form");
}
?>