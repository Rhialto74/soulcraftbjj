<?php
/**
 * Functions
 */

/******************************************************************************
                        Global Functions
******************************************************************************/

// Enable shortcodes
    require_once('lib/shortcodes.php');

//  Add widget support shortcodes
    add_filter('widget_text', 'do_shortcode');
    
// Custom Editor Style Support
    add_editor_style();

// Support for Featured Images
    add_theme_support( 'post-thumbnails' ); 

// Support for Post Formats
    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

// Custom Background
    add_theme_support( 'custom-background', array('default-color' => 'fff'));

// Custom Header
    add_theme_support( 'custom-header', array(
        'default-image' => get_template_directory_uri() . '/images/custom-logo.png',
        'height'        => '200',
        'flex-height'    => true,
        'uploads'       => true,
        'header-text'   => false
    ) );

// Register Navigation Menu
    register_nav_menus( array(
        'header-menu' => 'Header Menu',
        'footer-menu' => 'Footer Menu'
    ) );

// Navigation Menu Adjustments

    /* Add class to navigation sub-menu */
    class foundation_navigation extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdrown_menu dropdown\">\n";
    }

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( !empty( $children_elements[ $element->$id_field ] ) ) {
            $element->classes[] = 'has-dropdown';
        }
            Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }
    }

    /* Display Pages In Navigation Menu */
    if ( ! function_exists( 'foundation_page_menu' ) ) :
	function foundation_page_menu() {
		$pages_args = array(
		    'sort_column' => 'menu_order, post_title',
		    'menu_class'  => '',
		    'include'     => '',
		    'exclude'     => '',
		    'echo'        => true,
		    'show_home'   => false,
		    'link_before' => '',
		    'link_after'  => ''
		);

		wp_page_menu($pages_args);
	}
    endif;
    

// Create pagination
    function foundation_pagination() {

	global $wp_query;

	$big = 999999999;

	    $links = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'prev_next' => true,
		'prev_text' => '&laquo;',
		'next_text' => '&raquo;',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type' => 'list'
		)
	    );

	$pagination = str_replace('page-numbers','pagination',$links);

	echo $pagination;
    }

// Register Sidebars

    /* Sidebar Right */
        register_sidebar( array(
            'id' => 'foundation_sidebar_right',
            'name' => __( 'Sidebar Right' ),
            'description' => __( 'This sidebar is located on the right-hand side of each page.'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));

    /* Sidebar Left */
        register_sidebar( array(
            'id' => 'foundation_sidebar_left',
            'name' => __( 'Sidebar Left' ),
            'description' => __( 'This sidebar is located on the left-hand side of each page.'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));

// Remove #more anchor from posts
    function remove_more_jump_link($link) { 
        $offset = strpos($link, '#more-');
        if ($offset) { $end = strpos($link, '"',$offset); }
        if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
        return $link;
    }
    add_filter('the_content_more_link', 'remove_more_jump_link');

    
// Custom Post Excerpt
    if ( ! function_exists( 'foundation_excerpt' ) ) :

	function content($limit) {
	    $content = explode(' ', get_the_content(), $limit);
	    if (count($content)>=$limit) {
	      array_pop($content);
	      $content = implode(" ",$content).'...<a href="'. get_permalink($post->ID) . '" class="read_more">Read More</a>';
	    } else {
	      $content = implode(" ",$content);
	    }

	    $content = preg_replace('/\[.+\]/','', $content);
	    $content = apply_filters('the_content', $content);
	    $content = str_replace(']]>', ']]&gt;', $content);
	    return $content;
      }

    endif;

// Disable wordpress updates

    /*Disable Theme Updates # 3.0+*/
    remove_action( 'load-update-core.php', 'wp_update_themes' );
    add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
    wp_clear_scheduled_hook( 'wp_update_themes' );
    
 
// Disable wordpress jQuery
    function modify_jquery() {
        if (!is_admin()) {
            // comment out the next two lines to load the local copy of jQuery
            wp_deregister_script('jquery');
            wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, '1.8.3');
            wp_enqueue_script('jquery');
        }
    }
    add_action('init', 'modify_jquery');

/******************************************************************************************************************************
			    Enqueue Scripts and Styles for Front-End
*******************************************************************************************************************************/


if (!is_admin()) {

// Load JavaScripts
    wp_enqueue_script( 'jquery-ui-core');
    wp_enqueue_script( 'foundation.min', get_template_directory_uri() . '/js/foundation.min.js', null, '1.0', true );
    wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', null, '1.0', true );
    wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/plugins/respond.js', null, '1.0', true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/plugins/modernizr.js', null, '1.0', true );
    wp_enqueue_script( 'topbar', get_template_directory_uri() . '/js/plugins/topbar.js', null, '1.0', true );
    wp_enqueue_script( 'owl.carousel.min', get_template_directory_uri() . '/js/plugins/owl.carousel.min.js', null, '1.0', true );
    wp_enqueue_script( 'image-preloader', get_template_directory_uri() . '/js/plugins/image-preloader.js', null, '1.0', true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/plugins/wow.min.js', null, '1.0', true );

//Jquery UI    
    

		
// Load Stylesheets
    //core
    wp_enqueue_style( 'foundation', get_template_directory_uri().'/css/foundation.css' );
    wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/core/normalize.css' );
    wp_enqueue_style( 'customizer', get_template_directory_uri().'/css/core/customizer.css' );
    //plugins
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri().'/css/plugins/owl.carousel.css' );
    wp_enqueue_style( 'font-awesome.min', get_template_directory_uri().'/css/plugins/font-awesome.min.css' );
    wp_enqueue_style( 'hover', get_template_directory_uri().'/css/plugins/hover.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri().'/css/plugins/animate.css' );
    //system
    wp_enqueue_style( 'style', get_template_directory_uri().'/style.css' );/*2nd priority*/
    wp_enqueue_style( 'media-screens', get_template_directory_uri().'/css/media-screens.css' );/*1st priority*/

    wp_enqueue_style( 'jquery-ui-css-core', '/wp-includes/css/jquery-ui.min.css' );
    wp_enqueue_style( 'jquery-ui-css-struct', '/wp-includes/css/jquery-ui.structure.min.css' );


}
// Initialise Foundation JS
    function foundation_js_init () {
        echo '<script>!function ($) { $(document).foundation(); }(window.jQuery); </script>';
    }
    add_action('wp_footer', 'foundation_js_init', 50); 
    

    
/******************************************************************************
			    Additional Functions
*******************************************************************************/
// Register Post Type Slider
    function post_type_slider() {
	$post_type_slider_labels = array(
		'name'               => _x( 'Slider', 'post type general name' ),
		'singular_name'      => _x( 'Slide', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'slide' ),
		'add_new_item'       => __( 'Add New' ),
		'edit_item'          => __( 'Edit' ),
		'new_item'           => __( 'New ' ),
		'all_items'          => __( 'All' ),
		'view_item'          => __( 'View' ),
		'search_items'       => __( 'Search for a slide' ),
		'not_found'          => __( 'No slides found' ),
		'not_found_in_trash' => __( 'No slides found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Slider'
	);
	$post_type_slider_args = array(
		'labels'        => $post_type_slider_labels,
		'description'   => 'Display Slider',
		'public'        => true,
		'menu_icon'	=> false,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
		'has_archive'   => true,
		'hierarchical'  => true
	);
	register_post_type( 'slider', $post_type_slider_args );	
    }
    add_action( 'init', 'post_type_slider' );    

// Install Recommended plugins
    require_once dirname( __FILE__ ) . '/lib/plugin-activation.php';

    add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

    function my_theme_register_required_plugins() {

	$plugins = array(
	    /** This is an example of how to include a plugin pre-packaged with a theme */
	    array(
		    'name'     => 'Advanced Custom Fields', // The plugin name
		    'slug'     => 'advanced-custom-fields', // The plugin slug (typically the folder name)
		    'source'   => 'http://downloads.wordpress.org/plugin/advanced-custom-fields.zip', // The plugin source
		    'required' => true,
	    ),
	    array(
		    'name'     => 'Advanced Custom Fields Options Addon', // The plugin name
		    'slug'     => 'acf-options-page', // The plugin slug (typically the folder name)
		    'source'   => get_stylesheet_directory() . '/lib/acf-options-page.zip', // The plugin source
		    'required' => true,
	    ),
	    array(
		    'name'     => 'Advanced Custom Fields Repeater Addon', // The plugin name
		    'slug'     => 'acf-repeater', // The plugin slug (typically the folder name)
		    'source'   => get_stylesheet_directory() . '/lib/acf-repeater.zip', // The plugin source
		    'required' => false,
	    ),
	    array(
		    'name'     => 'Advanced Custom Fields Gallery', // The plugin name
		    'slug'     => 'acf-gallery', // The plugin slug (typically the folder name)
		    'source'   => get_stylesheet_directory() . '/lib/acf-gallery.zip', // The plugin source
		    'required' => false,
	    ),
	    array(
		    'name'     => 'Contact Form 7', // The plugin name
		    'slug'     => 'contact-form-7', // The plugin slug (typically the folder name)
		    'source'   => 'http://downloads.wordpress.org/plugin/contact-form-7.3.7.2.zip', // The plugin source
		    'required' => false,
	    ),
	    array(
		    'name'     => 'WordPress Duplicator', // The plugin name
		    'slug'     => 'wordPress-duplicator', // The plugin slug (typically the folder name)
		    'source'   => 'http://downloads.wordpress.org/plugin/duplicator.0.5.2.zip', // The plugin source
		    'required' => false,
	    ),
	    array(
		    'name'     => 'Duplicate Post', // The plugin name
		    'slug'     => 'duplicate-post', // The plugin slug (typically the folder name)
		    'source'   => 'http://downloads.wordpress.org/plugin/duplicate-post.2.6.zip', // The plugin source
		    'required' => false,
	    ),
	    array(
		    'name'     => 'WooSidebars', // The plugin name
		    'slug'     => 'woowidebars', // The plugin slug (typically the folder name)
		    'source'   => 'http://downloads.wordpress.org/plugin/woosidebars.1.3.1.zip', // The plugin source
		    'required' => false,
	    ),
	    array(
		    'name'     => 'Custom Post Type UI', // The plugin name
		    'slug'     => 'custom-post-type-ui', // The plugin slug (typically the folder name)
		    'source'   => 'http://downloads.wordpress.org/plugin/custom-post-type-ui.0.8.2.zip', // The plugin source
		    'required' => false,
	    ),
	    array(
		    'name'     => 'Woocommmerce', // The plugin name
		    'slug'     => 'woocommerce', // The plugin slug (typically the folder name)
		    'source'   => 'http://downloads.wordpress.org/plugin/woocommerce.2.1.6.zip', // The plugin source
		    'required' => false,
	    )
	);

	tgmpa( $plugins );

    }

// For ACF: Options add-on
    add_filter('acf/options_page/settings', 'my_options_page_settings');
    function my_options_page_settings($options) {
	$options['title'] = __('Theme Settings');
	$options['pages'] = array(
	    __('General Options'),
	    __('Home Slider')
//	    __('Jiu-Jitsu Gallery')
	);

	return $options;
    }



// Stick Admin Bar To The Top
    if (!is_admin()) {
        add_action('get_header', 'my_filter_head');

        function my_filter_head() {
            remove_action('wp_head', '_admin_bar_bump_cb');
        }

        function stick_admin_bar() {
            echo "
            <style type='text/css'>
                body.admin-bar {margin-top:32px !important}	
                @media screen and (max-width: 782px) {
                    body.admin-bar { margin-top:46px !important }
                }
                @media screen and (max-width: 600px) {
                    body.admin-bar { margin-top:46px !important }
                    html #wpadminbar{ margin-top: -46px; }
                }
            </style>
            ";
        }

        add_action('admin_head', 'stick_admin_bar');
        add_action('wp_head', 'stick_admin_bar');
    }



/*********************** PUT YOU FUNCTIONS BELOW ********************************/
    
function show_post($path) {
  $post = get_page_by_path($path);
  $content = apply_filters('the_content', $post->post_content);
  echo $content;
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
/*******************************************************************************/
    
    
?>