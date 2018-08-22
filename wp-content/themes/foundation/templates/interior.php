<?php
/*
 * Template Name: Interior Page (Video)
 */
get_header();
?>

<div class="row interior_video">
    <div class="large-7 medium-7 small-12 columns">
        <?php echo get_field('youtube_html_code') ?>
    </div>
    <div class="large-5 medium-5 small-12 columns">
        <h3><?php echo get_field('description_of_the_video') ?></h3>
    </div>
</div>

<div class="row">
    <div class="large-8 medium-8 small-12 columns">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', 'page'); ?>
            <?php endwhile; ?>

        <?php endif; ?>

        <?php get_template_part('sections/more_media'); ?>
        
    </div>

    <div class="large-4 medium-4 small-12 columns sidebar">

        <?php get_sidebar('right'); ?>

    </div>

</div>



<?php get_footer(); ?>