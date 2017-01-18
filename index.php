<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Niche Sampling Inc.<?php if ($PageTitle != "") echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Foresite Group">

    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:500,700,900|Rubik+One" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="inc/main.css">

    <script type="text/javascript" src="inc/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');
      });
    </script>
  </head>
  <body>

    <div class="site-width">
      <div class="menu-top">
        <a href="#">WOMENS FITNESS CLUBS</a>
        <a href="#">YOGA INSTRUCTORS</a>

        <div class="social">
          <a href="https://www.facebook.com/niche.sampling"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
          <a href="https://www.linkedin.com/in/philgruber"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </div>
      </div>

      <div class="nsi-header">
        <a href="."><img src="images/logo.png" alt="Niche Sampling Inc."></a>
        
        <input type="checkbox" id="show-menu" role="button">
        <label for="show-menu" id="menu-toggle"></label>
        <?php include "menu.php"; ?>
      </div>

      <script type="text/javascript" src="inc/jquery.cycle2.min.js"></script>
      <div class="cycle-slideshow" data-cycle-slides="> div" data-cycle-timeout="7000" data-cycle-pause-on-hover="true" data-cycle-pager-template="<span></span>">
        <p class="cycle-pager"></p>

        <div style="background-image: url(images/home-slider1.jpg);">
          <div>
            TARGETED <span class="bluetext">SAMPLING</span> PROGRAMS

            <div class="learnmore">LEARN MORE <i class="fa fa-arrow-down" aria-hidden="true"></i></div>
          </div>
        </div>

        <div style="background-image: url(images/home-slider2.jpg);">
          <div>
            <div class="smaller">INFLUENTIAL</div> <span class="bluetext">HEAVY</span> USERS

            <div class="learnmore">LEARN MORE <i class="fa fa-arrow-down" aria-hidden="true"></i></div>
          </div>
        </div>

        <div style="background-image: url(images/home-slider3.jpg);">
          <div>
            <div class="small">TIGHT SAMPLE</div> <span class="bluetext">DELIVERY</span> CONTROL

            <div class="learnmore">LEARN MORE <i class="fa fa-arrow-down" aria-hidden="true"></i></div>
          </div>
        </div>

        <div style="background-image: url(images/home-slider4.jpg);">
          <div>
            <div class="small">INDEPENDENT</div> <span class="bluetext">MARKET</span> RESEARCH

            <div class="learnmore">LEARN MORE <i class="fa fa-arrow-down" aria-hidden="true"></i></div>
          </div>
        </div>
      </div>

      <div class="home-left">
        <h1>WHAT IS NICHE SAMPLING?</h1>
        Niche Sampling is a national marketing services company that provides an avenue for marketers to efficiently and effectively reach and influence the purchase habits of highly-targeted consumer segments through product sampling programs.<br>
        <br>

        <a href="#" class="button">LEARN MORE</a>
      </div>

      <div class="home-right">
        &ldquo; Reach and influence highly-targeted consumer segments through product sampling programs. &rdquo;
      </div>

      <div style="clear: both;"></div>

      <div class="footer-spiff">
        WOMENS FITNESS CLUBS<br>

        <a href="#">Sign up to recieve a sample pack. <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
      </div>

      <div class="footer-spiff last">
        YOGA INSTRUCTOR<br>

        <a href="#">Sign up to recieve a sample pack. <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
      </div>

      <div style="clear: both;"></div>

      <div class="footer-contact">
        <a href="#">CONTACT US</a>
      </div>

      <div class="nsi-footer cf">
        <div class="address">
          4532 North Oakland Avenue &bull; Milwaukee, WI &bull; 53211
        </div>

        <div class="footer-menu">
          <?php include "menu.php"; ?>
        </div>
      </div>
    </div>

  </body>
</html>