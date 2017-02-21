<?php
session_start();

$PageTitle = "Women's Health &amp; Fitness Program FAQ";
$FooterSpiffs = "no";
include "header.php";
?>

<div class="banner" style="background-image: url(images/banner-programs-sub.jpg);"></div>

<div class="programs-sidebar">
  <div class="menu">
    <?php include "menu.php"; ?>
  </div>

  <?php include "spiffs.php"; ?>
</div>

<div class="programs-sub">
  <?php
  if (!empty($_POST['wfclub'])) $_SESSION['wffaq'] = $_POST['wfclub'];
  if (empty($_SESSION['wffaq'])) {
  ?>
  
  <form action="womens-fitness-clubs-faq.php" method="POST">
    <div>
      <input type="checkbox" name="wfclub" value="yes" id="r-agree">
      <label for="r-agree">I AM A REPRESENTATIVE OF A WOMAN'S FITNESS CLUB OR CENTER</label>

      <input type="submit" name="submit" value="SUBMIT" id="submit">
    </div>
  </form>

  <?php } else { ?>
  
  <h3>WOMEN'S HEALTH &amp; FITNESS PROGRAM FAQ</h3>

  <h4>WELCOME WOMEN'S FITNESS CLUBS</h4>
  Thank you for your interest in the Women's Health &amp; Fitness Program for your members. Here is a collection of Frequently Asked Questions about this program:<br>
  <br>

  <strong>How much will the Women's Health &amp; Fitness Sampling Program cost me?</strong><br>
  There is no cost to you. The samples are shipped to you completely free.<br>
  <br>

  <strong>How can these Women's Health &amp; Fitness Samples be completely free?</strong><br>
  The manufacturers who provide the samples fund them because they want to reach people who live a healthy lifestyle and are interested in fitness and nutrition.<br>
  <br>

  <strong>Why do you want all my information now?</strong><br>
  It will guide in setting up the program and calculating how many samples to produce.<br>
  <br>

  <strong>What if any of my information changes? (address, number of members.)</strong><br>
  Simply return to this website and resubmit your information. Or email us at <?php email("jennifer@nichesampling.com"); ?> to update.<br>
  <br>

  <strong>What if I forget to update my information before the program begins?</strong><br>
  We will email you with a reminder prior to the program start date to update your contact information.<br>
  <br>

  <strong>When should I expect to see my Women's Health &amp; Fitness Samples?</strong><br>
  The samples will be sent to your 'ship to' address as often as manufactures want to sample to your members.<br>
  <br>

  <strong>What will you use my contact information for?</strong><br>
  We will only use your information to update you on the program, send you sample packs and reminder emails to sign up for the next time the program runs.<br>
  <br>

  <strong>Will you sell my contact information?</strong><br>
  No!<br>
  <br>

  <strong>Who are the samples available to?</strong><br>
  They are available to Women's Fitness Centers and Clubs that are able to give samples only to their female members.<br>
  <br>

  <strong>Why do you need to know how many members I instruct?</strong><br>
  So we know how many samples to send to you.<br>
  <br>

  <strong>If I have multiple clubs do I sign up separately for each one?</strong><br>
  No, please sign up for only one, but include the total number of members at all of your clubs. We will ship all your samples to one club!<br>
  <br>

  <strong>Who can I contact to answer questions or to get more information about the Women's Health &amp; Fitness Sampling Program?</strong><br>
  Call Niche Sampling Inc. at 414-276-5666 or email us at <?php email("jennifer@nichesampling.com"); ?>.

  <?php } ?>
</div>

<?php include "footer.php"; ?>