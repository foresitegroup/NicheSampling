<?php
session_start();

$PageTitle = "Yoga Instructors Sign Up";
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
  <h3>YOGA INSTRUCTORS SIGN UP</h3>

  <h4>PROGRAM DESCRIPTION</h4>

  <ul>
    <li>The Yoga Sampling Program are only for active Yoga and/or Pilates instructors</li>
    <li>Unfortunately, we can no longer ship to residential addresses; we can only accommodate shipping to valid business locations</li>
    <li>The Yoga Sampling Program is only available in the United States. We cannot ship to HI, AK or PR</li>
    <li>If you have any questions about the Yoga Sampling Program, please <a href="yoga-faq.php">visit our FAQ page</a></li>
  </ul>
  <br>

  <?php
  $feedback = "Please verify your information is correct before you submit.";
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      var form = $('#yoga-form');
      var formMessages = $('#form-messages');
      $(form).submit(function(event) {
        event.preventDefault();

        function formValidation() {
          if ($('#firstname').val() === '') { alert('First Name required.'); $('#firstname').focus(); return false; }
          if ($('#lastname').val() === '') { alert('Last Name required.'); $('#lastname').focus(); return false; }
          if ($('#businessname').val() === '') { alert('Business Name required.'); $('#businessname').focus(); return false; }
          if ($('[name="addresstype"]:checked').length === 0) { alert('Please indicate if this is a commercial or residential address.'); return false; }
          if ($('#address').val() === '') { alert('Address required.'); $('#address').focus(); return false; }
          if ($('#city').val() === '') { alert('City required.'); $('#city').focus(); return false; }
          if ($('[name="state"]').val() == 0) { alert('State required.'); return false; }
          if ($('#zip').val() === '') { alert('Zip Code required.'); $('#zip').focus(); return false; }
          if ($('#phone').val() === '') { alert('Phone Number required.'); $('#phone').focus(); return false; }
          if ($('#email').val() === '') { alert('Email required.'); $('#email').focus(); return false; }
          if ($('#numberstudents').val() === '') { alert('Number of students required.'); $('#numberstudents').focus(); return false; }
          if ($('[name="instructor"]:checked').length === 0) { alert('Please indicate if you are an active instructor.'); return false; }
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
  $salt = "NicheSamplingYogaForm";

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

  <form action="form-yoga.php" method="POST" id="yoga-form">
    <div>
      <input type="text" name="<?php echo md5("firstname" . $ip . $salt . $timestamp); ?>" id="firstname" placeholder="FIRST NAME">

      <input type="text" name="<?php echo md5("lastname" . $ip . $salt . $timestamp); ?>" id="lastname" placeholder="LAST NAME">

      <input type="text" name="<?php echo md5("businessname" . $ip . $salt . $timestamp); ?>" id="businessname" placeholder="BUSINESS NAME">

      <input type="radio" name="addresstype" value="Commercial Address" id="r-comm-addr">
      <label for="r-comm-addr">COMMERCIAL ADDRESS</label>
      <input type="radio" name="addresstype" value="Residential Address" id="r-res-addr">
      <label for="r-res-addr">RESIDENTIAL ADDRESS</label>

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

      <input type="text" name="<?php echo md5("numberstudents" . $ip . $salt . $timestamp); ?>" id="numberstudents" placeholder="NUMBER OF STUDENTS">

      <div class="my-form-label">ARE YOU AN ACTIVE YOGA AND/OR PILATES INSTRUCTOR?</div>
      <input type="radio" name="instructor" value="Yes" id="r-yes">
      <label for="r-yes">YES</label>
      <input type="radio" name="instructor" value="No" id="r-no">
      <label for="r-no">NO</label>

      <div class="my-form-label">HOW DID YOU HEAR ABOUT THE YOGA GIFT PACKS?</div>
      <div class="select">
        <select name="hear">
          <option value="">Select...</option>
          <option value="Angels Magazine">Angels Magazine</option>
          <option value="Email">Email</option>
          <option value="Website">Website</option>
          <option value="Training Session">Training Session</option>
          <option value="Another Instructor">Another Instructor</option>
          <option value="Fitness Trade Show">Fitness Trade Show</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <div style="clear: both;"></div>

      <input type="checkbox" name="agree" value="" id="r-agree">
      <label for="r-agree">I HAVE <a href="yoga-terms-and-conditions.php">READ AND AGREE TO THE TERMS</a> TO RECEIVE AND DISTRIBUTE THE FREE YOGA GIFT PACKS</label>

      <input type="hidden" name="referrer" value="yoga-sign-up.php">

      <input type="text" name="confirmationCAP" style="display: none;">

      <input type="hidden" name="ip" value="<?php echo $ip; ?>">
      <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

      <div id="form-messages"><?php echo $feedback; ?></div>

      <input type="submit" name="submit" value="SUBMIT" id="submit" disabled>
    </div>
  </form>
</div>

<?php include "footer.php"; ?>