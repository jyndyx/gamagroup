<?php
/**
 * PerleMedia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PerleMedia
 */


/*******************************
** Underscore Theme Functions **
*******************************/

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// Sets up theme defaults and registers support for various WordPress features.
function perlemedia_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'perlemedia', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Primary', 'perlemedia' ),
		)
	);
	
	// Switch default core markup to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Enable support for Post Thumbnails on posts and pages.
	// @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	add_theme_support( 'post-thumbnails' );

	// Add support for core custom logo.
	// @link https://codex.wordpress.org/Theme_Logo
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'perlemedia_setup' );

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Set the content width in pixels, based on the theme's design and stylesheet.
// @global int $content_width
function perlemedia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'perlemedia_content_width', 640 );
}
add_action( 'after_setup_theme', 'perlemedia_content_width', 0 );

/*******************************
**** Begin Custom Functions ****
*******************************/

/** 
 * Enqueue scripts and styles.
 */
function perlemedia_scripts() {
	// CSS
	wp_enqueue_style( 'perlemedia-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	// JS
	wp_enqueue_script( 'perlemedia-js', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true );

	// GSAP
	wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js', array(), false, true);
    wp_enqueue_script('scrollTrigger-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js', array(), false, true);
    wp_enqueue_script('splitText-js', get_template_directory_uri() . '/js/splittext.js', array(), false, true );
    wp_enqueue_script('gsapCustom-js', get_template_directory_uri() . '/js/gsap-js.js', array('gsap-js', 'scrollTrigger-js', 'jquery'), false, true );
	
	// Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'perlemedia_scripts' );


/**
 * Add scripts to header
 */
function perlemedia_add_header() { ?>
    
<?php }
//add_action('wp_head', 'perlemedia_add_header');

/**
 * Add scripts after opening body tag
 */
function perlemedia_add_body() { ?>

<?php }
//add_action('wp_body_open', 'perlemedia_add_body');

/**
 * Add scripts to footer
 */
function perlemedia_add_footer() { ?>

<?php }
//add_action('wp_footer', 'perlemedia_add_footer');


/**
 * Declare WooCommerce support
 */
function perlemedia_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
//add_action( 'after_setup_theme', 'perlemedia_add_woocommerce_support' );

/** 
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function perlemedia_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'perlemedia' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'perlemedia' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'perlemedia_widgets_init' );


/**
 * Enable SVG Upload
 */
function codeless_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
	}
add_filter('upload_mimes', 'codeless_file_types_to_uploads');

/**
 * Custom login page logo
 */
function customLoginLogo()
{
echo '<style type="text/css"> h1 a {  background-image:url("https://perlemedia.com/wp-content/uploads/2019/01/perlemedia-logo.png") !important; height:73px!important;
		width:300px!important;
		background-size: 300px 73px!important;
		background-repeat: no-repeat!important; } </style>';
}
add_action('login_head',  'customLoginLogo');
function customLoginLogoURL() {
    return 'https://perlemedia.com';
}
add_filter( 'login_headerurl', 'customLoginLogoURL' );
function customLoginLogoTitle() {
    return 'PerleMedia Website Design & Development';
}
add_filter( 'login_headertitle', 'customLoginLogoTitle' );



/**
 * Disable ACF Pro Update Notifications
 */
add_filter('site_transient_update_plugins', 'my_remove_update_nag');
function my_remove_update_nag($value) {
	unset($value->response[ 'advanced-custom-fields-pro/acf.php' ]);
	return $value;
}


/**
 * ACF Options Pages
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Homepage Fields',
		'menu_title'	=> 'Homepage',
		'menu_slug' 	=> 'home-section',
		'icon_url' 		=> 'dashicons-admin-home',
		'position' 		=> 4,
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));	

	acf_add_options_page(array(
		'page_title' 	=> 'Site Branding',
		'menu_title'	=> 'Site Branding',
		'menu_slug' 	=> 'branding-section',
		'icon_url' 		=> 'dashicons-art',
		'position' 		=> 2,
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));	
}


/**
 * Register ACF Gutengerg Blocks (Flex Content)
 */

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types() {
    wp_register_style('acf-block-styles', get_template_directory_uri() . '/inc/custom-gutenberg-styles.css', false);
    acf_register_block_type(
        array(
            'name' => 'premade-layouts',
            'title' => __('Premade Layouts'),
            'description' => __('ACF blocks for Gutenberg'),
            'render_template' => 'template-parts/blocks/index.php',
            'icon' => 'schedule',
            'keywords' => array( 'premade', 'layout' ),  
            'style_handle' => 'acf-block-styles'    
        )
    );
}

// Stylesheet for displaying custom Gutenberg blocks
add_action('init', function() {
	wp_register_style('acf-block-styles', get_template_directory_uri() . '/css/custom-gutenberg-styles.scss', false);
	register_block_style('core/acf-premade-layouts', [
		'name' => 'premade-layouts',
		'style_handle' => 'acf-block-styles'
	]);
});

// Get the template part for flex content
function get_the_right_row($name){
	$template_path = "template-parts/blocks/" . $name;
    get_template_part($template_path);
}

// Enable Gutenberg custom color palette
function pm_custom_color_palette() {
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Primary', '@@textdomain' ),
				'slug' => 'primary',
				'color' => get_field('global_color_one', 'option'),
			),
			array(
				'name'  => esc_html__( 'Secondary', '@@textdomain' ),
				'slug' => 'secondary',
				'color' => get_field('global_color_two', 'option'),
			),
			array(
				'name'  => esc_html__( 'Highlight', '@@textdomain' ),
				'slug' => 'highlight',
				'color' => get_field('global_color_three', 'option'),
			),
			array(
				'name'  => esc_html__( 'Accent', '@@textdomain' ),
				'slug' => 'accent',
				'color' => get_field('global_color_four', 'option'),
			),
			array(
				'name'  => esc_html__( 'White', '@@textdomain' ),
				'slug' => 'white',
				'color' => '#fff',
			),
			array(
				'name'  => esc_html__( 'Black', '@@textdomain' ),
				'slug' => 'black',
				'color' => '#000',
			),
			array(
				'name'  => esc_html__( 'Gray', '@@textdomain' ),
				'slug' => 'gray',
				'color' => '#333',
			)
		)
	);
}
add_action( 'after_setup_theme', 'pm_custom_color_palette' );

// Enable excerpts on pages
add_action( 'init', 'pm_add_excerpts_to_pages' );
function pm_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
/**
 * Register SASS variables from PHP
 */
function generate_options_css() {
    $ss_dir = get_stylesheet_directory();
    ob_start(); 
    require($ss_dir . '/inc/sass_variables.php'); 
    $css = ob_get_clean(); 
    file_put_contents($ss_dir . '/sass/variables/_colors.scss', $css, LOCK_EX); 
}
add_action( 'acf/save_post', 'generate_options_css', 20 ); 

/**
 * Hide SCSS Compiler from plugins list in Dashboard
 */
function hide_SCSSCompiler() {
	global $wp_list_table;
	$hidearr = array('scss-compiler/scss-compiler.php');
	$myplugins = $wp_list_table->items;
	foreach ($myplugins as $key => $val) {
	  if (in_array($key,$hidearr)) {
		unset($wp_list_table->items[$key]);
		echo '<div>SCSS Compiler plugin hidden from list.</div>';
	  }
	}
  }
  
add_action('pre_current_active_plugins', 'hide_SCSSCompiler');

