<?php
/*
 * Template Name: Full Width
 */
get_header(); ?>

<div class="row">
    
    <div class="large-12 medium-12 small-12 columns">

	<?php if ( have_posts() ) : ?>

	    <?php while ( have_posts() ) : the_post(); ?>
		    <?php get_template_part( 'content', 'page' ); ?>
	    <?php endwhile; ?>

	<?php endif; ?>
    </div><!--end of .columns -->
</div><!--end of .row-->

<?php get_footer(); ?>