      <div style="clear: both;"></div>
      
      <div class="cf<?php if (isset($FooterSpiffs)) echo " footer-spiffs"; ?>">
        <?php include "spiffs.php"; ?>
      </div>
      
      <?php if (!isset($FooterContact)) { ?>
      <div class="footer-contact">
        <a href="<?php echo $TopDir; ?>contact-us.php">CONTACT US</a>
      </div>
      <?php } ?>

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