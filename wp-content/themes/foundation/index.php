<?php
/**
 * Index
 *
 * Standard loop for the front-page
 */

get_header(); ?>

<div class="row">
    
    <div class="large-8 medium-8 small-12 columns">

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>

        <?php endif; ?>

        <?php foundation_pagination(); ?>

    </div><!--end of .columns -->
    
    <div class="large-4 medium-4 small-12 columns sidebar">
	
        <?php get_sidebar('right'); ?>
	
    </div><!--end of .columns -->
    
</div><!--end of .row-->

    
<?php get_footer(); ?>