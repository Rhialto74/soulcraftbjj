<?php
/**
 * Content
 *
 * Displays content shown in the 'index.php' loop, default for 'standard' post format
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <a href="<?php echo get_field('yotube_video_pagelink');?>" target="_blank"><h3><?php the_title(); ?></h3></a>

    <a href="<?php echo get_field('yotube_video_pagelink');?>" target="_blank"><?php the_post_thumbnail(); ?></a>

    <?php echo content(50); ?> <!-- 41 is number of symbol -->

</article>