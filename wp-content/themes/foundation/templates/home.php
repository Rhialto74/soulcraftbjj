<?php
/*
 * Template Name: Home Page
 */
get_header();
?>

<script>
    $(document).ready(function() {

        //Home Slider
        $("#home-slider").owlCarousel({
            //For Users
            navigation: <?php echo the_field('slider_with_captions_navigation', 'option'); ?>,
            pagination: <?php echo the_field('slider_with_captions_pagination', 'option'); ?>,
            autoPlay: <?php echo the_field('slider_with_captions_speed', 'option'); ?>,
            transitionStyle: "<?php echo the_field('slider_with_captions_effect', 'option'); ?>",
            //For Developers    
            singleItem: true, // Display only one item. If you want to display more than one - use items
            slideSpeed: 500, // Slide speed
            navigationText: ["", ""], // Change text of previous or next buttons.
            responsive: true, // Make Responsive
            responsiveRefreshRate: 10, // Check window width changes every 50ms for responsive actions
            autoHeight: false, // Add height to owl-wrapper-outer so you can use diffrent heights on slides. Use it only for one item per page setting.
            mouseDrag: true, // Turn off/on mouse events.
            touchDrag: true, // Turn off/on touch events.
            addClassActive: false	    // Add "active" classes on visible items. Works with any numbers of items on screen.

        });

    });
</script>

<div class="row">

    <?php
    $arg = array(
        'post_type' => 'slider',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => -1
    );

    $slider = new WP_Query($arg);

    if ($slider->have_posts()) :
        ?>

        <div id="home-slider" class="owl-carousel owl-theme">

            <?php
            while ($slider->have_posts()) : $slider->the_post();

                $do_not_duplicate = $post->ID;
                ?>

                <div class="item">

                    <?php the_post_thumbnail(); ?>

                    <div class="slider_caption">
                        <?php the_content(); ?>
                    </div>
                </div>

            <?php endwhile; ?>

        </div>

        <?php
    endif;
    wp_reset_query();
    ?>

</div><!--end of .row-->  
<section class="after_slider">
    <div class="row">
        <div class="large-4 medium-4 small-12 columns">
            <h2><?php echo get_field('title') ?></h2>
            <?php echo get_field('youtube_html_code') ?>
            <a href="http://soulcraftbjj.com/videos/" class="more_videos">more videos</a>
        </div>
        <div class="large-4 medium-4 small-12 columns sign_up">
            <!--<h2>Free Intro Lesson</h2>
            <p>Sign up here for your free intro lesson!</p>-->
            <?php //echo do_shortcode('[contact-form-7 id="292" title="Sign up for free lesson"]');?>
<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup">
<form action="//soulcraftbjj.us4.list-manage.com/subscribe/post?u=83c03a2d4460911269395dbb9&amp;id=67b707c918" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<h2>Free Intro Lesson</h2>
<p>Sign up here for your free intro lesson!</p>
<div class="mc-field-group">
	<label for="mce-FNAME">Your Name  <span class="asterisk">*</span>
</label>
	<input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
<div class="mc-field-group size1of2">
	<label for="mce-LNAME">Your Phone  <span class="asterisk">*</span>
</label>
	<input type="text" name="LNAME" class="required" value="" id="mce-LNAME">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_83c03a2d4460911269395dbb9_67b707c918" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="SUBMIT" name="subscribe" id="mc-embedded-subscribe" class="wpcf7-submit"></div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[2]='LNAME';ftypes[2]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
        </div>
        <div class="large-4 medium-4 small-12 columns facebook_feed">
            <h2>RECENT POST</h2>
            <?php echo do_shortcode('[custom-facebook-feed]');?>
        </div>
    </div>
</section>
<div class="row home_text">  

    <div class="large-12 medium-12 small-12 columns">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; ?>
        <?php endif; ?>

    </div><!--end of .columns -->

</div><!--end of .row-->  


<?php get_footer(); ?>