<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package gpp
 */
?>
      <footer class="footer">
        <div class="content">
          <div class="fifty-five-box right footer-content-box">
            <div class="thirty-box padding10 left footer-contact-box">
              <div class="footer-header">
                Newsletter
              </div>
            </div>
            <div class="seventy-box padding10 right footer-newsletter">
              <input class="footer-newsletter-input" type="text" placeholder="Your e-mail"/>
              <button class="footer-newsletter-button" type="submit">Send</button>
            </div>
            <div class="cl"></div>
            <div class="thirty-three-box padding10 left footer-contact-box">
              <div class="footer-header">
                Our address
              </div>
              <br/>
              Some Custom 65<br/>
              Address, 45U AM
            </div>
            <div class="fourty-box padding10 left footer-contact-box">
              <div class="footer-header">
                Call us
              </div>
              <br/>
              Emma Jane<br/>
              <div class="f29 very-strong">
                0045-659-98-98
              </div>
            </div>
            <div class="twenty-five-box padding10 left align-right footer-contact-box">
              <div class="footer-header">
                Find Us
              </div>
              <br/>
              <div class="footer-social">
                <img src="<?php echo get_template_directory_uri()?>/gfx/linkedin.png" />
                <img src="<?php echo get_template_directory_uri()?>/gfx/twitter.png" />
              </div>
            </div>
          </div>
          <div class="fourty-box left footer-content-box">
            <div class="footer-partners">
              <img src="<?php echo get_template_directory_uri()?>/gfx/prelude.png" />
              <img src="<?php echo get_template_directory_uri()?>/gfx/speaker.png" />
              <img src="<?php echo get_template_directory_uri()?>/gfx/supper_clud.png" />
            </div>
          </div>
          <div class="cl"></div>
        </div>
        <div class="content">
          <div class="fourty-box left footer-content-box">
            <div class="footer-copyrights  align-right">
              Copyright 2013-2014 by Growth Partners Porty. All rights reseverd.<br/>
              Registration No. 4161814 | VAT registration 769712094
            </div>
          </div>
          <div class="fifty-five-box right footer-content-box">
            <div class="footer-copyrights">
              <ul class="footer-menu">
                <li>Blog</li>
                <li>Meet the team</li>
                <li>Terms & Conditions</li>
                <li>Privacy Policy</li>
                <li>Cookies</li>
                <li>Sitemap</li>
              </ul>
            </div>
          </div>
          <div class="cl"></div>
        </div>
      </footer>

    </div>
    <?php wp_footer() ?>
  </body>
</html>