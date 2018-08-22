<?php
/*
 * Template Name: YouTuBe video list
 */
get_header();
?>

<div class="row">
    <div class="large-12 medium-12 small-12 columns featured_video">
        <h2><?php echo get_field('featured_video_title') ?></h2>
        <?php echo get_field('youtube_code_of_featured_video') ?>
    </div>
</div>

<section class="video_playlist">
<div class="row">

    <?php if (have_rows('playlist')): ?>
        <?php
        while (have_rows('playlist')): the_row();
            // vars
            $ttl = get_sub_field('title');
            $thumb = get_sub_field('thumbnail');
            $ytb = get_sub_field('youtube_link_to_video');
            ?>
            <div class="large-3 medium-3 small-12 columns">
                <a href="<?php echo $ytb; ?>"><h3><?php echo $ttl; ?></h3></a>
                <a href="<?php echo $ytb; ?>"><img src="<?php echo $thumb; ?>"></a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

    <div class="clearfix"></div>
<?php 

$arr = explode(' ', $post->post_title);
if ($arr[0] === 'Muay'){
    // Muay thai curriculum has a different link at the bottom
    echo '<a href="http://soulcraftbjj.com/muay-thai/muay-thai-curriculum/" class="schedule_button sink" style="margin-top: 20px;">Return to All Episodes</a>';
} else {
    echo '<a href="https://www.youtube.com/user/SoulcraftBJJ/videos" class="schedule_button sink" style="margin-top: 20px;" target="_blank">View more videos</a>';
}

?>
</div>
</section>

<?php get_footer(); ?>
