<?php
/*
 * The template for displaying Search Results pages.
 */
get_header(); ?>

<div class="row">
    
    <div class="large-12 medium-12 small-12 columns">
	
        <?php if ( have_posts() ) : ?>
	
            <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                <?php while ( have_posts() ) : the_post(); ?>
	    
                    <?php get_template_part( 'content' ); ?>
	    
                <?php endwhile; ?>
               <?php else : ?>
	    
           <h1>Sorry, no results found</h1>
	   
        <?php endif; ?>
	   
    </div><!--end of .columns -->
    
</div><!--end of .row-->

<?php get_footer(); ?>