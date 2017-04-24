<?php
/**
 * EightMedi Pro functions and definitions
 *
 * @package EightMedi Pro
 */

if ( ! function_exists( 'eightmedi_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eightmedi_pro_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on EightMedi Pro, use a find and replace
	 * to change 'eightmedi-pro' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'eightmedi-pro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size('eightmedi-main-slider', 1170, 590, true);
	add_image_size('eightmedi-news', 543, 341, true);
	add_image_size('eightmedi-pro-team-image', 450, 450, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'eightmedi-pro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'eightmedi_pro_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	 add_theme_support( 'custom-logo' , array(
	 	'header-text' => array( 'site-title', 'site-description' ),
	 	));

	 add_theme_support( 'woocommerce' );
}
endif; // eightmedi_pro_setup
add_action( 'after_setup_theme', 'eightmedi_pro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eightmedi_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eightmedi_pro_content_width', 640 );
}
add_action( 'after_setup_theme', 'eightmedi_pro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function eightmedi_pro_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'eightmedi-pro' ),
		'id'            => 'eightmedi-pro-sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'eightmedi-pro' ),
		'id'            => 'eightmedi-pro-sidebar-left',
		'description'   => 'Add widgets to show in left sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'eightmedi-pro' ),
		'id'            => 'eightmedi-pro-sidebar-right',
		'description'   => 'Add widgets to show in right sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Full Widget Area', 'eightmedi-pro' ),
		'id'            => 'eightmedi-pro-home-full',
		'description'   => __('Add widgets you like to display in homepage after Faqs Section','eightmedi-pro'),
		'before_widget' => '<span id="%1$s" class="widget widget-home %2$s">',
		'after_widget'  => '</span>',
		'before_title'  => '<h2 class="widget-home-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Google Map Section', 'eightmedi-pro' ),
		'id'            => 'eightmedi-pro-google-map',
		'description'   => __('Add a text widget with iframe for google map','eightmedi-pro'),
		'before_widget' => '<span id="%1$s" class="widget-map %2$s">',
		'after_widget'  => '</span>',
		'before_title'  => '<h2 class="widget-map-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Blocks', 'eightmedi-pro' ),
		'id'            => 'eightmedi-pro-widget-footer-1',
		'description'   => __('Add widgets for footer','eightmedi-pro'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'eightmedi_pro_widgets_init' );

/**
 * Enqueue
 */
function eightmedi_pro_scripts() {
	$font_args = array(
		'family' => 'Open+Sans:400,600,700,300',
		);
	wp_enqueue_style('eightmedi-pro-google-fonts', add_query_arg($font_args, "//fonts.googleapis.com/css"));
	wp_enqueue_style('eightmedi-pro-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style('eightmedi-pro-bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css','','4.1.2' );
	wp_enqueue_style( 'eightmedi-pro-fancybox', get_template_directory_uri() . '/css/fancybox.css');
	wp_enqueue_style('eightmedi-pro-animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style('eightmedi-pro-widgets', get_template_directory_uri() . '/css/widgets.css' );
	wp_enqueue_style( 'eightmedi-pro-style', get_stylesheet_uri() );
	wp_enqueue_style( 'eightmedi-pro-responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_script( 'eightmedi-pro-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel-3.0.4.pack.js', array('jquery'), '3.0.4', true );
	wp_enqueue_script( 'eightmedi-pro-fancybox', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.js', array('jquery'), '1.3.4', true );
	wp_enqueue_script( 'eightmedi-pro-wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.1.2', true );
	wp_enqueue_script( 'eightmedi-pro-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.1.2', true );
	wp_enqueue_script( 'eightmedi-pro-counterup', get_template_directory_uri() . '/js/jquery.counterup.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'eightmedi-pro-waypoint', get_template_directory_uri() . '/js/waypoint.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'eightmedi-pro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'eightmedi-pro-custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array(), '', true );
	wp_enqueue_script( 'eightmedi-pro-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script('eightmedi-pro-custom-scripts', get_template_directory_uri() .'/js/custom-scripts.js');

	wp_enqueue_script('eightmedi-pro-custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array(), '20150716', true );

	// // Send data to client
	// wp_localize_script('eightmedi-pro-custom-scripts', 'SliderData', array(
	//   'url' => home_url(),
	// ));
	do_action('eightmedi_pro_homepage_slider_config');
}
add_action( 'wp_enqueue_scripts', 'eightmedi_pro_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Load Custom Post type file.
 */
require get_template_directory() . '/inc/eightmedi-posttype.php';
/**
 * Load Custom Metabox file.
 */
require get_template_directory() . '/inc/eightmedi-metabox.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load Custom functions file.
 */
require get_template_directory() . '/inc/eightmedi-functions.php';
/**
 * Load Custom Customizer file.
 */
require get_template_directory() . '/inc/eightmedi-customizer.php';
/**
 * Load Custom Sanitizer file.
 */
require get_template_directory() . '/inc/eightmedi-sanitizer.php';
/**
 * Load Custom Sanitizer file.
 */
require get_template_directory() . '/inc/eightmedi-custom-classes.php';
/**
 * Load plugin suggestion file.
 */
require get_template_directory() . '/inc/eightmedi-tgm.php';

/**
 * Load Options eightmedi Widgets
 */
require get_template_directory() . '/inc/eightmedi-widgets.php';
/**
 * Load shortcodes.php
 */
require get_template_directory() . '/inc/eightmedi-shortcodes.php';
/**
 * Load eightmedi Pro custom css
 */
require get_template_directory() . '/css/styles.php';
require get_template_directory() . '/inc/typography/typography.php';
require get_template_directory() . '/inc/import/ed-importer.php';


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function eightmedi_pro_wrapper_start() {
    echo '<div class="ed-container"><div id="primary" class="right-sidebar">';
}
add_action('woocommerce_before_main_content', 'eightmedi_pro_wrapper_start', 10);

function eightmedi_pro_wrapper_end() {
    echo '</div>';
    do_action( 'woocommerce_sidebar' );
    echo '</div>';
}
add_action('woocommerce_after_main_content','eightmedi_pro_wrapper_end',9);

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 8;' ), 20 );
