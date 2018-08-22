<?php
/*
 * Template Name: Interior Page (Slider)
 */
get_header();
?>

<div class="row interior_slider">
    <div id="interior_slider">
        <?php if (have_rows('slides')): ?>
            <?php
            while (have_rows('slides')): the_row();
                // vars
                $img = get_sub_field('image');
                ?>

                <img src="<?php echo $img; ?>">

            <?php endwhile; ?>
        <?php endif; ?>

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