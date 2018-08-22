<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if IE]>
        <script src="<?php bloginfo('template_url'); ?>/js/plugins/html5shiv.js"></script>
<![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <!--[if gte IE 9]>
      <style type="text/css">
        .gradient {filter: none;}
      </style>
    <![endif]-->

    <head>
        <!-- Set up Meta -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="<?php bloginfo('charset'); ?>" />

        <!-- Add Favicon -->
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
        <link type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png" rel="icon">
        <link type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png" rel="shortcut icon">
        <link type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png" rel="apple-touch-icon">

        <!-- Load Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>

        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

        <?php wp_head(); ?>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36242647-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
    </head>


    <body <?php body_class(); ?>>

        <header>    
            <div class="before_header">
                <div class="row sub_text">
                    <div class="large-6 medium-6 small-12 columns">
                        <div class="sub_logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sub_logo.png"></div>
                    </div>
                    <div class="large-3 medium-3 small-12 columns">
                        <a href="tel:8887655510"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tel.png" align="right" style="margin-top: -2px;"></a>
                    </div>
                    <div class="large-3 medium-3 small-12 columns">
                        <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/site.png" align="right"></a>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="large-3 medium-3 small-12 columns">

                    <div class="logo">
                        <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_header_image(); ?>" /></a>
                    </div>

                </div><!--end of .columns -->

                <div class="large-9 medium-9 small-12 columns">

                    <div class="header_search">
                        <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
				
                                <div class="fr">
					
				 <a href="/index.php?page_id=78" style="float:left; padding-right:10px; padding-top:5px; font-weight:bold; font-family:Open Sans Condensed;">SOULCRAFT BLOG</a>

					
                                        <input type="text" name="s" id="s" placeholder="<?php esc_attr_e('Search'); ?>" />
                                        <input type="submit" class="prefix" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search'); ?>" />
                                    </div>
                            <div class="clearfix"></div>

                        </form>
                    </div>

                    <nav class="top-bar" data-topbar>
                        <ul class="title-area">
                            <li class="name"></li>
                            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                        </ul>
                        <section class="top-bar-section">
                            <?php wp_nav_menu(array('theme_location' => 'header-menu', 'fallback_cb' => 'foundation_page_menu', 'walker' => new foundation_navigation())); ?>
                        </section>
                    </nav>  

                </div><!--end of .columns -->

            </div> <!-- END of ROW -->

        </header><!--END of header -->
