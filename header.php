<?php
if (!isset($TopDir)) $TopDir = "";

if (!isset($Description)) $Description = "Niche Sampling Inc. distributes brand samples to reach the most influential consumers, creating the perfect marriages between brands, retailers, sample distribution venues, media and consumers.";
if (!isset($Keywords)) $Keywords = "brand sampling, target sampling, sampling agency, market research, market study, marketing sampling, product marketing sampling, sampling in marketing, free samples marketing, product sampling, yoga marketing, yogafit, yoga fit, free product sampling, NSI, niche sampling";

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

    <meta name="description" content="<?php echo $Description; ?>">
    <meta name="keywords" content="<?php echo $Keywords; ?>">
    <meta name="author" content="Foresite Group">

    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/main.css?<?php if ($TopDir == "") echo filemtime('inc/main.css'); ?>">

    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');
        
        $(".nsi-header LI [href]").each(function() {
          if (this.href == window.location.href) {
            $(this).addClass("current");
          }
        });

        <?php if ($TopDir != "") echo "$('.nsi-header LI.blog A').addClass('current');"; ?>

        $(".programs-sidebar [href]").each(function() {
          if (this.href == window.location.href) {
            $(this).addClass("current");
            $(".nsi-header LI.programs-menu A").addClass("current");
          }
        });
      });
    </script>

    <!-- BEGIN Google Analytics - THIS WILL STOP WORKING JULY 1, 2023 -->
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-28497665-1']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
    <!-- END Google Analytics -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W3ZZLX61B7"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-W3ZZLX61B7');
    </script>
  </head>
  <body>

    <div class="site-width">
      <div class="menu-top">
        <a href="<?php echo $TopDir; ?>womens-fitness-clubs.php">WOMEN'S HEALTH &amp; FITNESS CLUB<br>REGISTRATION</a>
        <a href="<?php echo $TopDir; ?>yoga-sign-up.php">YOGA INSTRUCTOR<br>REGISTRATION</a>

        <div class="social">
          <a href="https://www.facebook.com/NSI.ProductSampling/" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="https://twitter.com/NicheSampling" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <!-- <a href="#" class="pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a> -->
          <a href="https://www.linkedin.com/company/10952955" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </div>
      </div>

      <div class="nsi-header">
        <a href="<?php echo $TopDir; ?>."><img src="<?php echo $TopDir; ?>images/logo.png" alt="Niche Sampling Inc."></a>
        
        <input type="checkbox" id="show-menu" role="button">
        <label for="show-menu" id="menu-toggle"></label>
        <?php include "menu.php"; ?>
      </div>
