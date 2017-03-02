<?php
session_start();

$PageTitle = "Contact Us";
$FooterSpiffs = "no";
$FooterContact = "no";
include "header.php";
?>

<div class="banner" style="background-image: url(images/banner-contact.jpg);"></div>

<script type="text/javascript">
  $(document).ready(function() {
    var form = $('#contact-form');
    var formMessages = $('#form-messages');
    $(form).submit(function(event) {
      event.preventDefault();

      function formValidation() {
        if ($('#name').val() === '') { alert('Name required.'); $('#name').focus(); return false; }
        if ($('#comapany').val() === '') { alert('Company required.'); $('#comapany').focus(); return false; }
        if ($('#phone').val() === '') { alert('Phone Number required.'); $('#phone').focus(); return false; }
        if ($('#email').val() === '') { alert('Email required.'); $('#email').focus(); return false; }
        if ($('#comment').val() === '') { alert('Request/Comment required.'); $('#comment').focus(); return false; }
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
  });
</script>

<?php
// Settings for randomizing form field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "NicheSamplingContactForm";
?>

<noscript>
<?php
$feedback = (!empty($_SESSION['feedback'])) ? $_SESSION['feedback'] : "";
unset($_SESSION['feedback']);
?>
</noscript>

<form action="form-contact.php" method="POST" id="contact-form">
  <div>
    <h1>CONTACT NICHE SAMPLING INC.</h1>
    Call us at 414-276-5666<br>
    Email us at <?php email("phil@nichesampling.com"); ?><br>
    or fill in and send your request.<br>
    <br>
    <br>

    <input type="text" name="<?php echo md5("name" . $ip . $salt . $timestamp); ?>" id="name" placeholder="NAME">

    <input type="text" name="<?php echo md5("company" . $ip . $salt . $timestamp); ?>" id="company" placeholder="COMPANY">

    <input type="text" name="<?php echo md5("phone" . $ip . $salt . $timestamp); ?>" id="phone" placeholder="PHONE NUMBER">

    <input type="email" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" id="email" placeholder="EMAIL">

    <div class="my-form-label">REQUEST/COMMENT</div>
    <textarea name="<?php echo md5("comment" . $ip . $salt . $timestamp); ?>" id="comment"></textarea>

    <input type="hidden" name="referrer" value="contact-us.php">

    <input type="text" name="confirmationCAP" style="display: none;">

    <input type="hidden" name="ip" value="<?php echo $ip; ?>">
    <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

    <div id="form-messages"><?php echo $feedback; ?></div>

    <input type="submit" name="submit" value="SUBMIT" id="submit">
  </div>
</form>

<div class="contact-sidebar">
  <div class="contacts">
    <div>
      <strong>Phil Gruber</strong><br>
      President<br>
      <?php email("Phil@nichesampling.com"); ?>
    </div>

    <div>
      <strong>Jennifer Schmitz</strong><br>
      Marketing Operations Manager<br>
      <?php email("Jennifer@nichesampling.com"); ?>
    </div>
  </div>

  <?php include "spiffs.php"; ?>
</div>

<div style="clear: both;"></div>

<div class="contact-address">
  <h2>NICHE SAMPLING INC MAILING ADDRESS</h2>
  4532 North Oakland Avenue <span></span> Milwaukee, WI 53211 <span></span> Phone: (414) 276-5666 <span></span> Fax: (414) 276-6665
</div>

<div class="contact-map">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCWZl7IEJ6pRIlFhU8jjpGbN_74NGv2xU"></script>
  <script>
    function ViewLargerMap(VLMa, map) {
      var VLMui = document.createElement('a');
      VLMui.style.cursor = 'pointer';
      VLMui.href = "https://www.google.com/maps/place/Niche+Sampling+Inc/@43.0992393,-87.8893721,17z/data=!3m1!4b1!4m5!3m4!1s0x88051f18f1acea0b:0xaf58081a1e7ac5c8!8m2!3d43.0992393!4d-87.8871834";
      VLMui.target = 'new';
      VLMui.innerHTML = 'View larger map';
      VLMui.style.marginLeft = '7px';
      VLMa.appendChild(VLMui);
    }

    function initialize() {
      var MyLatLng = new google.maps.LatLng(43.0992393,-87.8871721);
      var mapCanvas = document.getElementById('map-canvas');
      var mapOptions = {
        center: MyLatLng,
        zoom: 15,
        disableDefaultUI: true,
        scrollwheel: false,
        zoomControl: true,
        zoomControlOptions: {
          style: google.maps.ZoomControlStyle.SMALL,
          position: google.maps.ControlPosition.RIGHT_BOTTOM
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      var map = new google.maps.Map(mapCanvas, mapOptions)
      
      var marker = new google.maps.Marker({
        position: MyLatLng,
        map: map,
        icon: "images/map-pin.png"
      });

      var infowindow = new google.maps.InfoWindow({
        content: "<div id=\"content\"><div id=\"bodyContent\"><strong>Niche Sampling</strong><br>4532 North Oakland Avenue<br>Milwaukee, WI 53211<br><a href=\"https://www.google.com/maps/place/Niche+Sampling+Inc/@43.0992393,-87.8893721,17z/data=!3m1!4b1!4m5!3m4!1s0x88051f18f1acea0b:0xaf58081a1e7ac5c8!8m2!3d43.0992393!4d-87.8871834\" target=\"new\">View larger map</a></div></div>"
      });

      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
      });

      var vlmDiv = document.createElement('div');
      var vlm = new ViewLargerMap(vlmDiv, map);
      vlmDiv.index = 1;
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(vlmDiv);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  <div id="map-canvas"></div>
</div>

<?php include "footer.php"; ?>