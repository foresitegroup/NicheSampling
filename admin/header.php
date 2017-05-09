<?php
include_once "../inc/dbconfig.php";

function email($address, $name="") {
  for ($i = 0; $i < strlen($address); $i++) { $email .= (rand(0, 1) == 0) ? "&#" . ord(substr($address, $i)) . ";" : substr($address, $i, 1); }
  if ($name == "") $name = $email;
  echo "<a href=\"&#109;&#97;&#105;&#108;&#116;&#111;&#58;$email\">$name</a>";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Niche Sampling Inc. Administration<?php if ($PageTitle != "") echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">

    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../inc/main.css">

    <link rel="stylesheet" href="inc/admin.css" type="text/css" media="screen,print">

    <script type="text/javascript" src="../inc/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="inc/jquery.tipTip.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');

        $("a[title]").tipTip({ keepAlive: true, maxWidth: "400px", defaultPosition: "left" });
      });
    </script>
    <link rel="stylesheet" href="inc/tipTip.css" type="text/css" media="screen,print">
  </head>
  <body>

    <div class="site-width">
      <div class="nsi-header">
        <a href="."><img src="../images/logo.png" alt="Niche Sampling Inc."></a>
        
        <?php if ($PageTitle != "Login") { ?>
        <ul>
          <li><a href="womens-fitness-index.php">women's fitness sign-ups</a></li>
          <li><a href="yoga-index.php">yoga sign-ups</a></li>
        </ul>
        <?php } ?>
      </div>
