<?php
if (!isset($TopDir)) $TopDir = "";

function email($address, $name="") {
  $email = "";
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

    <title>Niche Sampling Inc.<?php if ($PageTitle != "") echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TopDir; ?>images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $TopDir; ?>images/apple-touch-icon.png">

    <meta name="description" content="Niche Sampling Inc. (NSI) distributes samples to reach the heaviest users and most influential consumers, creating the perfect marriages between brands, retailers, sample distribution venues, media and consumers.<?php if (isset($Description)) echo " " . $Description; ?>">
    <meta name="keywords" content="brand awareness, yoga instructors, target sampling, target audience, nsi, market research, market study, niche sampling, nichesampling, market sampling, market sample, product samples, brand samples, sample distribution, shopper sampling, yoga, yogafit, yoga fit, curves, product sampling, product sampling programs<?php if (isset($Keywords)) echo ", " . $Keywords; ?>">
    <meta name="author" content="Foresite Group">

    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/main.css?<?php if ($TopDir == "") echo filemtime('inc/main.css'); ?>">

    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');

        $(".programs-sidebar [href]").each(function() {
        if (this.href == window.location.href) {
          $(this).addClass("current");
        }
        });
      });
    </script>
  </head>
  <body>

    <div class="site-width">
      <div class="menu-top">
        <a href="<?php echo $TopDir; ?>womens-fitness-clubs.php">WOMEN'S HEALTH &amp; FITNESS CLUB<br>REGISTRATION</a>
        <a href="<?php echo $TopDir; ?>yoga-sign-up.php">YOGA INSTRUCTOR<br>REGISTRATION</a>

        <div class="social">
          <a href="https://www.facebook.com/niche.sampling" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="https://twitter.com/NicheSampling" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <!-- <a href="#" class="pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a> -->
          <a href="https://www.linkedin.com/in/philgruber" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </div>
      </div>

      <div class="nsi-header">
        <a href="<?php echo $TopDir; ?>."><img src="<?php echo $TopDir; ?>images/logo.png" alt="Niche Sampling Inc."></a>
        
        <input type="checkbox" id="show-menu" role="button">
        <label for="show-menu" id="menu-toggle"></label>
        <?php include "menu.php"; ?>
      </div>
