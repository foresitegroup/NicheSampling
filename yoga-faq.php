<?php
session_start();

$PageTitle = "Yoga Program FAQ";
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
  if (!empty($_POST['club'])) $_SESSION['faq'] = $_POST['club'];
  if (empty($_SESSION['faq'])) {
  ?>
  
  <form action="yoga-faq.php" method="POST">
    <div>
      <input type="text" name="club" placeholder="Please enter the name of your club and click submit to view the FAQ">

      <input type="submit" name="submit" value="SUBMIT" id="submit">
    </div>
  </form>

  <?php } else { ?>
  
  <h3>YOGA PROGRAM FAQ</h3>

  <h4>WELCOME YOGA INSTRUCTORS</h4>
  Thank you for your interest in the Yoga Gift Pack. Here is a collection of Frequently Asked Questions about this program:<br>
  <br>

  <strong>How much will the Yoga Sampling Program cost me?</strong><br>
  There is no cost to you. The samples are shipped to you completely free.<br>
  <br>

  <strong>How can these samples be completely free?</strong><br>
  The marketers who provide the samples fund them because they want to reach people who live a healthy lifestyle and are involved in yoga and pilates.<br>
  <br>

  <strong>Why do you want all my information now?</strong><br>
  It will guide in setting up the program and calculating how many samples to produce.<br>
  <br>

  <strong>What if any of my information changes? (address, teaching facility.)</strong><br>
  Simply email <?php email("yoga@nichesampling.com"); ?> to update your information.<br>
  <br>

  <strong>What if I forget to update my information before the program begins?</strong><br>
  We will email you with a reminder prior to the program start date to update your contact information.<br>
  <br>

  <strong>When should I expect to see my samples?</strong><br>
  The samples will be sent to your 'ship to' address as often as manufactures want to sample to your members.<br>
  <br>

  <strong>What will you use my contact information for?</strong><br>
  We will only use your information to update you on the program, send you samples and reminder emails to sign up for the next time the program runs.<br>
  <br>

  <strong>Will you sell my contact information?</strong><br>
  No!<br>
  <br>

  <strong>Who are the samples available to?</strong><br>
  They are available to Yoga and Pilates students.<br>
  <br>

  <strong>I don't instruct Yoga, can I still receive the samples?</strong><br>
  Absolutely, as long as you are an active Yoga or Pilates instructor.<br>
  <br>

  <strong>Why do you need to know how many students I instruct?</strong><br>
  So we know how many samples to send to you.<br>
  <br>

  <strong>How do I calculate my total student enrollment?</strong><br>
  Scenario 1: I instruct three individual Yoga classes twice a week, each class has 20 students enrolled.  The total number of Yoga students enrolled is 60 students a week.<br>
  Scenario 2: I instruct one Yoga class that meets twice a week with 20 students enrolled in the class, AND instruct one Pilates class that meets twice a week with 18 students enrolled in the class. The total number of Yoga students enrolled is 20 students a week and the total number of Pilates students enrolled is 18 students a week.<br>
  <br>

  <strong>What if between 7-13 students show up for a class that has an enrollment of 20 students enrolled, how many students do I enter?</strong><br>
  Enter 20, for the number enrolled in the class.<br>
  <br>

  <strong>If I teach multiple classes at multiple gyms, how do I calculate the number of students?</strong><br>
  Please follow instructions above; simply add the number of students enrolled in each specified class together for an overall total.<br>
  <br>

  <strong>I teach more than just Yoga and Pilates classes, are those students eligible to receive these samples?</strong><br>
  No, the samples are for Yoga and Pilates students only.<br>
  <br>

  <strong>Who can I contact to answer questions or to get more information about the Yoga Sampling Program?</strong><br>
  Call Niche Sampling Inc. at 414-276-5666 or email us at <?php email("yoga@nichesampling.com"); ?>.

  <?php } ?>
</div>

<?php include "footer.php"; ?>