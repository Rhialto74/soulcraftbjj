<?php
/**
 * Category
 *
 * Standard loop for the front-page
 */
get_header(); ?>

<div class="row">
    
    <div class="large-12 medium-12 small-12 columns">
        <h2 class="category-title"><?php //single_cat_title(); ?> </h2>
    </div><!--end of .columns -->

    <!-- Main Content -->
    <div class="large-12 medium-12 small-12 columns video-playlist">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>

        <?php endif; ?>

        <?php foundation_pagination(); ?>

    </div>
    
</div>

<?php get_footer(); ?>