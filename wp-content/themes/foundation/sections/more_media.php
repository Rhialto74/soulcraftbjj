<div class="more">
    <div class="section">
        <h3>More videos</h3>
        <div class="row">
            <div class="more_videos">
                <?php if (have_rows('playlist', 298)): ?>
                    <?php
                    while (have_rows('playlist', 298)): the_row();
                        // vars
                        $ttl = get_sub_field('title');
                        $thumb = get_sub_field('thumbnail');
                        $ytb = get_sub_field('youtube_link_to_video');
                        ?>
                        <div class="large-3 medium-3 small-12 columns more_videos_thumb">
                            <a href="<?php echo $ytb; ?>" target="_blank"><img src="<?php echo $thumb; ?>"></a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <a href="/videos/" class="schedule_button sink" style="margin-top: 20px;">More videos</a>
    </div>
    <div class="section">
        <h3>More Photos</h3>
        <div class="more_photos"><?php show_post('media'); ?></div>
        <a href="/media/photos/" class="schedule_button sink">More photos</a>
    </div>
</div>