<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package gpp
 */
?>
      <footer class="footer" id="footer">
        <div class="content">
          <div class="fifty-five-box right footer-content-box">
            <div class="thirty-box padding10 left footer-contact-box">
              <div class="footer-header">
                Newsletter
              </div>
            </div>
            <div class="seventy-box padding10 right footer-newsletter">
              <a class="footer-newsletter-button" id="footer-newsletter-button"><img src="<?php echo get_template_directory_uri()?>/gfx/envelope.png" /> Signup to our newsletter</a>
            </div>
            <div class="cl"></div>
            <div class="fourty-box padding10 left footer-contact-box">
              <div class="footer-header">
                Contact us
              </div>
              <br/>
              <a href="mailto:getintouch@growthprogrammes.com">getintouch@growthprogrammes.com</a>
              <div class="f29 very-strong margin-top-quarter">
                0845&nbsp;359&nbsp;9888
              </div>
            </div>
            <div class="twenty-five-box padding10 right align-right footer-contact-box">
              <div class="footer-header"> </div>
              <br/>
              <div class="footer-social">
                <a target="_blank" href="https://www.linkedin.com/company/the-supper-club"><img src="<?php echo get_template_directory_uri()?>/gfx/linkedin.png" />
                <a target="_blank" href="https://twitter.com/thesupperclubuk"><img src="<?php echo get_template_directory_uri()?>/gfx/twitter.png" />
              </div>
            </div>
          </div>
          <div class="fourty-box left footer-content-box">
            <div class="footer-partners">
              <a target="_blank" href="http://www.thesupperclub.com/"><img src="<?php echo get_template_directory_uri()?>/gfx/supper_clud.png" /></a>
              <a target="_blank" href="http://www.preludegroup.co.uk/"><img src="<?php echo get_template_directory_uri()?>/gfx/prelude.png" /></a>
              <a target="_blank" href="http://www.preludegroup.co.uk/about-us/speaker-boutique/"><img src="<?php echo get_template_directory_uri()?>/gfx/speaker.png" /></a>
            </div>
            <div class="half-box padding10 left footer-contact-box footer-office">
              <div class="footer-header">
                Our address
              </div>
              <br/>
              Third Floor, 12-15 Bermondsey Square, Southwark, London, SE1 3UN
            </div>
            <div class="half-box padding10 left footer-contact-box footer-office">
              <div class="footer-header">
                registered office
              </div>
              <br/>
              TWP, The Old Rectory, Church Street, Weybridge, Surrey, KT13 8DE
            </div>
          </div>
          <div class="cl"></div>
        </div>
        <div class="content">
          <div class="fourty-box left footer-content-box">
            <div class="footer-copyrights  align-right">
              Registration No. 4161814 | VAT registration 769712094 | 
              © 2014 Growth Programmes. All Rights Reserved 
            </div>
          </div>
          <div class="fifty-five-box right footer-content-box">
            <div class="footer-copyrights">
              <ul class="footer-menu">
                <li><a target="_blank" href="http://www.thesupperclub.com/news/">Blog</a></li>
                <li><a target="_blank" href="http://www.thesupperclub.com/contact-us/the-supper-club-team/">Meet the team</a></li>
                <li><a target="_blank" href="http://www.thesupperclub.com/terms-and-conditions/">Terms & Conditions</a></li>
                <li><a target="_blank" href="http://www.thesupperclub.com/privacy-and-cookies/">Privacy & Cookies</a></li>
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