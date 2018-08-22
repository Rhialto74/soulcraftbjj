<?php
/**
 * Content Page
 *
 */
?>

<article <?php post_class(); ?>>
	
    <h2><?php the_title(); ?></h2>
    
    <?php if ( has_post_thumbnail()) : ?>
        <div title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(); ?></div>
    <?php endif; ?>
    
    <?php the_content(); ?>

</article>