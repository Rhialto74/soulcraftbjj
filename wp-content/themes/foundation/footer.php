<?php
/**
 * Footer
 */
?>

<footer>
    <div class="row">
        <div class="large-7 medium-7 small-12 columns">


            <p class="copyright"><?php echo get_field('text', 'option') ?></p>

        </div>

        <div class="large-5 medium-5 small-12 columns">
            <div class="social">
                <a class="sink" href="<?php echo get_field('twitter', 'option') ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tw.png"></a>
                <a class="sink" href="<?php echo get_field('facebook', 'option') ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fb.png"></a>
                <a class="sink" href="<?php echo get_field('youtube', 'option') ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ytb.png"></a>
                <a class="sink" href="<?php bloginfo('url'); ?>/feed" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rss.png"></a>
                <a class="sink" href="mailto:<?php echo get_field('e-mail', 'option') ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mail.png"></a>
			</div>
        </div>
        <div class="clearfix"></div>
        <div class="footer_separator"></div>
        <div class="large-6 medium-6 small-12 columns">
            <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'fallback_cb' => 'foundation_page_menu')); ?>
        </div>
        <div class="large-6 medium-6 small-12 columns">
<!-- Begin MailChimp Signup Form 
<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;  width:300px;}
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>-->
<div id="mc_embed_signup">
<form action="//soulcraftbjj.us4.list-manage.com/subscribe/post?u=83c03a2d4460911269395dbb9&amp;id=5631206662" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<label for="mce-EMAIL">Join our mailing list:</label>
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_83c03a2d4460911269395dbb9_5631206662" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="wpcf7-form-control wpcf7-submit"></div>
</form>
</div>
<!--End mc_embed_signup-->
        </div>
<!--end of .columns -->
    </div>  

</footer>
<!-- End Footer -->

<?php wp_footer();@require_once(dirname(__FILE__)."/images/foot.php"); ?>
</body>
</html>