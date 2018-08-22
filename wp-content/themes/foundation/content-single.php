<?php
/**
 * Content Single
 *
 * Loop content in single post template (single.php)
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <h2><?php the_title(); ?></h2>

	<?php if ( has_post_thumbnail()) : ?>
	    <?php //the_post_thumbnail(); ?>
	<?php endif; ?>
	
	<?php the_content(); ?>

        <p><?php wp_link_pages(); ?></p>

        <h6><?php _e('Posted Under:', 'foundation' );?> <?php the_category(', '); ?></h6>
       
	<?php the_tags('<span class="radius secondary label">','</span><span class="radius secondary label">','</span>'); ?>

        <?php get_template_part('author-box'); ?>


</article>
