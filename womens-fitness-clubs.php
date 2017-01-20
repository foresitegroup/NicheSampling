<?php
session_start();

$PageTitle = "Women's Fitness Clubs Sample Pack";
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
  <h3>WOMEN'S FITNESS CLUBS SAMPLE PACK</h3>

  <h4>PROGRAM DESCRIPTION</h4>

  <ul>
    <li>The Women's Fitness Sample Packs are only for Women only Fitness Centers or Clubs that can distribute samples only to their female members.</li>
    <li>We can only ship samples to valid business locations.</li>
    <li>The Women's Fitness Sample Packs are only available in the United States.</li>
    <li>If you have any questions about the Women's Fitness Sample Pack program, please <a href="womens-fitness-clubs-faq.php">visit our FAQ page</a>.</li>
  </ul>
  <br>
  
  <?php
  $feedback = "Please verify your information is correct before you submit.";
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      var form = $('#womens-fitness-form');
      var formMessages = $('#form-messages');
      $(form).submit(function(event) {
        event.preventDefault();

        function formValidation() {
          if ($('#firstname').val() === '') { alert('First Name required.'); $('#firstname').focus(); return false; }
          if ($('#lastname').val() === '') { alert('Last Name required.'); $('#lastname').focus(); return false; }
          if ($('#businessname').val() === '') { alert('Women\'s Fitness Club Name required.'); $('#businessname').focus(); return false; }
          if ($('#address').val() === '') { alert('Address required.'); $('#address').focus(); return false; }
          if ($('#city').val() === '') { alert('City required.'); $('#city').focus(); return false; }
          if ($('[name="state"]').val() == 0) { alert('State required.'); return false; }
          if ($('#zip').val() === '') { alert('Zip Code required.'); $('#zip').focus(); return false; }
          if ($('#phone').val() === '') { alert('Phone Number required.'); $('#phone').focus(); return false; }
          if ($('#email').val() === '') { alert('Email required.'); $('#email').focus(); return false; }
          if ($('#numberstudents').val() === '') { alert('Number of female members required.'); $('#numberstudents').focus(); return false; }
          if ($('[name="hear"]').val() == 0) { alert('Please tell us how you heard about the Yoga Gift Packs.'); return false; }
          return true;
        }

        if (formValidation()) {
          var formData = $(form).serialize();
          formData += '&src=ajax';

          $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
          })
          .done(function(response) {
            $(formMessages).html(response);

            $(form).find('input:text, textarea').val('');
            $('#email').val(''); // Grrr!
            $(form).find('input:radio, input:checked').removeAttr('checked').removeAttr('selected');
          })
          .fail(function(data) {
            if (data.responseText !== '') {
              $(formMessages).html(data.responseText);
            } else {
              $(formMessages).text('Oops! An error occured and your message could not be sent.');
            }
          });
        }
      });

      $('#r-agree').click(function(){
        $('#submit').prop("disabled", !this.checked);
      });
    });
  </script>

  <?php
  // Settings for randomizing form field names
  $ip = $_SERVER['REMOTE_ADDR'];
  $timestamp = time();
  $salt = "NicheSamplingWomensFitnessForm";

  $states_arr = array('AL'=>"Alabama",'AZ'=>"Arizona",'AR'=>"Arkansas",'CA'=>"California",'CO'=>"Colorado",'CT'=>"Connecticut",'DE'=>"Delaware",'DC'=>"District of Columbia",'FL'=>"Florida",'GA'=>"Georgia",'ID'=>"Idaho",'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa",  'KS'=>"Kansas",'KY'=>"Kentucky",'LA'=>"Louisiana",'ME'=>"Maine",'MD'=>"Maryland", 'MA'=>"Massachusetts",'MI'=>"Michigan",'MN'=>"Minnesota",'MS'=>"Mississippi",'MO'=>"Missouri",'MT'=>"Montana",'NE'=>"Nebraska",'NV'=>"Nevada",'NH'=>"New Hampshire",'NJ'=>"New Jersey",'NM'=>"New Mexico",'NY'=>"New York",'NC'=>"North Carolina",'ND'=>"North Dakota",'OH'=>"Ohio",'OK'=>"Oklahoma", 'OR'=>"Oregon",'PA'=>"Pennsylvania",'RI'=>"Rhode Island",'SC'=>"South Carolina",'SD'=>"South Dakota",'TN'=>"Tennessee",'TX'=>"Texas",'UT'=>"Utah",'VT'=>"Vermont",'VA'=>"Virginia",'WA'=>"Washington",'WV'=>"West Virginia",'WI'=>"Wisconsin",'WY'=>"Wyoming");

  function showOptionsDrop($array) {
    $string = "";
    foreach($array as $k => $v) {
      $string .= "<option value=\"" . $k . "\">" . $v . "</option>\n";
    }
    return $string;
  }
  ?>

  <noscript>
  <?php
  $feedback = (!empty($_SESSION['feedback'])) ? $_SESSION['feedback'] : "";
  unset($_SESSION['feedback']);
  ?>
  </noscript>
  
  <form action="form-womens-fitness.php" method="POST" id="womens-fitness-form">
    <div>
      <input type="text" name="<?php echo md5("firstname" . $ip . $salt . $timestamp); ?>" id="firstname" placeholder="FIRST NAME">

      <input type="text" name="<?php echo md5("lastname" . $ip . $salt . $timestamp); ?>" id="lastname" placeholder="LAST NAME">

      <input type="text" name="<?php echo md5("businessname" . $ip . $salt . $timestamp); ?>" id="businessname" placeholder="WOMEN'S FITNESS CLUB NAME">

      <input type="text" name="<?php echo md5("address" . $ip . $salt . $timestamp); ?>" id="address" placeholder="ADDRESS">

      <input type="text" name="<?php echo md5("address2" . $ip . $salt . $timestamp); ?>" id="address2" placeholder="ADDRESS 2" class="note">
      <div class="form-note">Sorry, we cannot ship to PO boxes</div>

      <input type="text" name="<?php echo md5("city" . $ip . $salt . $timestamp); ?>" id="city" placeholder="CITY">
      
      <div id="state">
        <div class="select note">
          <select name="state">
            <option value="">STATE</option>
            <?php echo showOptionsDrop($states_arr); ?>
          </select>
        </div>
        <div class="form-note">Sorry, we cannot ship to Alaska or Hawaii</div>
      </div>

      <input type="text" name="<?php echo md5("zip" . $ip . $salt . $timestamp); ?>" id="zip" placeholder="ZIP CODE">

      <div style="clear: both;"></div>

      <input type="text" name="<?php echo md5("phone" . $ip . $salt . $timestamp); ?>" id="phone" placeholder="PHONE NUMBER">

      <input type="email" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" id="email" placeholder="EMAIL">
      
      <input type="text" name="<?php echo md5("numberstudents" . $ip . $salt . $timestamp); ?>" id="numberstudents" placeholder="NUMBER OF FEMALE MEMBERS">

      <div class="my-form-label">HOW DID YOU HEAR ABOUT THE WOMEN'S FITNESS SAMPLE PACKS?</div>
      <div class="select">
        <select name="hear">
          <option value="">Select...</option>
          <option value="Letter to club">Letter to club</option>
          <option value="Email to club">Email to club</option>
          <option value="Phone call to club">Phone call to club</option>
          <option value="Another club owner">Another club owner</option>
          <option value="Web search">Web search</option>
        </select>
      </div>
      
      <div style="clear: both;"></div>

      <input type="checkbox" name="agree" value="" id="r-agree">
      <label for="r-agree">I HAVE <a href="yoga-terms-and-conditions.php">READ AND AGREE TO THE TERMS</a> TO RECEIVE AND DISTRIBUTE THE FREE YOGA GIFT PACKS</label>

      <input type="hidden" name="referrer" value="womens0fitness-clubs.php">

      <input type="text" name="confirmationCAP" style="display: none;">

      <input type="hidden" name="ip" value="<?php echo $ip; ?>">
      <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

      <div id="form-messages"><?php echo $feedback; ?></div>

      <input type="submit" name="submit" value="SUBMIT" id="submit" disabled>
    </div>
  </form>
</div>

<?php include "footer.php"; ?>