<?php
/*
 * Template Name: Instructors
 */
get_header();
?>
<script>
    $(document).ready(function() {
        $(".slidingDiv").hide();
        $(".show_hide").show();

        $('.show_hide').toggle(function() {
            $(this).text("HIDE");
            $(this).next().slideDown();
        }, function() {
            $(this).text("SHOW");
            $(this).next().slideUp();
        });
    });
</script>
<style>
    .show_hide {
        display:none;
    }
</style>
<div class="row">
    <div class="large-12">
        <h1 class="inst"><?php the_title(); ?></h1>
    </div>
</div>
<div class="row">

    <div class="large-12 columns">

        <?php if (have_rows('instructor')): ?>
            <?php
            while (have_rows('instructor')): the_row();
                // vars
                $img = get_sub_field('photo');
                $name = get_sub_field('name');
                $text = get_sub_field('text');
                $htext = get_sub_field('hidden_text');
                ?>
                <div class="instructor">
                    <div class="row">
                        <div class="large-3 medium-3 small-12 columns">
                            <img src="<?php echo $img; ?>" class="instructor">
                        </div>
                        <div class="large-9 medium-9 small-12 columns">
                            <h2><?php echo $name; ?></h2>

                            <?php if (have_rows('instructor_lineage')): ?>
                                <div class="lineage">
                                    <h4>Instructor Lineage</h4>
                                    <p>
                                        <?php
                                        while (have_rows('instructor_lineage')): the_row();
                                            // vars
                                            $text2 = get_sub_field('text2');
                                            ?>
                                            <span><?php echo $text2; ?></span>

                                        <?php endwhile; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <p class="shown"><?php echo $text; ?></p>
                            <a href="#" class="show_hide">SHOW</a>
                            <div class="slidingDiv" style="display: block;">
                                <p><?php echo $htext; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>


    </div>

</div><!--end of .row-->

<?php get_footer(); ?>