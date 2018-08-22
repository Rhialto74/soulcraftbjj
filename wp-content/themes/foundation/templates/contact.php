<?php
/*
 * Template Name: Contact Page
 */
get_header(); ?>

<div class="row">
    
    <div class="large-6 medium-6 small-12 columns">

	<?php if ( have_posts() ) : ?>

	    <?php while ( have_posts() ) : the_post(); ?>
		    <?php get_template_part( 'content', 'page' ); ?>
	    <?php endwhile; ?>

	<?php endif; ?>

        <div class="google_map"><?php echo get_field('google_map_code');?></div>
        
    </div>
    
    <div class="large-6 medium-6 small-12 columns contact_form">
       
        <div class=""><?php //echo do_shortcode('[contact-form-7 id="81" title="Contact form"]');?></div>
	<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<p><strong>Fill out the form below and we will get back to you as soon as possible.</strong></p>
<div id="main-contact-form-fage">
<form action="//soulcraftbjj.us4.list-manage.com/subscribe/post?u=83c03a2d4460911269395dbb9&amp;id=6c777c1cfe" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
<div class="mc-field-group">
	<label for="mce-NAME">Your Name: (required)  <span class="asterisk">*</span>
</label>
	<input type="text" value="" name="NAME" class="required" id="mce-NAME">
</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Your Email: (required)  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
<div class="mc-field-group size1of2">
	<label for="mce-MMERGE4">Your Phone: (required)  <span class="asterisk">*</span>
</label>
	<input type="text" name="MMERGE4" class="required" value="" id="mce-MMERGE4">
</div>
<div class="mc-field-group">
	<label for="mce-MMERGE3">Subject </label>
	<input type="text" value="" name="MMERGE3" class="" id="mce-MMERGE3">
</div>
<div class="mc-field-group">
	<label for="mce-MMERGE2">Your Message </label>
	<textarea type="text" value="" name="MMERGE2" class="" id="mce-MMERGE2"></textarea>
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_83c03a2d4460911269395dbb9_6c777c1cfe" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="SEND" name="subscribe" id="mc-embedded-subscribe" class="wpcf7-submit"></div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='NAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[4]='MMERGE4';ftypes[4]='phone';fnames[3]='MMERGE3';ftypes[3]='text';fnames[2]='MMERGE2';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
        
    </div>
    
</div>

<?php get_footer(); ?>