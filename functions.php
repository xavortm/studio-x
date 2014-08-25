<?php

/**
 * Functions file
 *
 * For some the main file in a theme. Here we display meta informaion and the
 * header information like menus and logo.
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * @package WordPress
 * @subpackage studiox
 */

// Include the studiox Framework
require get_template_directory() . '/inc/Diamond_Main.php';

// Register all the widgets
require get_template_directory() . '/inc/widgets/main.php';

// Include bootstrap menu support
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
require get_template_directory() . '/admin/redux/admin/admin-init.php';
require get_template_directory() . '/admin/redux/options.php';

if( ! class_exists( 'studiox' ) ) :
class studiox {

	/**
	 * Call all loading functions for the theme. They will be started right after theme setup.
	 * 
	 * @since v1.0.0
	 */
	public function __construct() {

		// Run after instalation setup.
		$this->theme_setup();

		// Register actions using add_actions() custom function.
		$this->add_actions();

	}

	/**
	 * Initial theme setup
	 * 
	 * Loading scripts and stylesheets. Register custom elements
	 * and functionality in the theme.
	 * 
	 * @uses get_template_directory_uri()
	 * @uses add_theme_support()
	 * @since v1.0.0
	 */
	public function theme_setup() {

		// Add after_setup_theme() for specific functions.
		// The action call is here, because it fits more just for the theme
		// setup, instead for all other actions during using of Subtle.
		add_action( 'after_setup_theme', array( $this, 'theme_setup_core' ) );

		// Set content width for custom media information
		if ( ! isset( $content_width ) ) $content_width = 900;

	}

	/**
	 * The core functionality that has to be registred after the theme is setted up
	 * 
	 * @since v1.0.1
	 */
	public function theme_setup_core() {

		// Add support for custom header images
		add_theme_support( 'custom-header' ) ;

		// Register the menus.
		register_nav_menus( array( 'primary' 	=> __( 'Main Menu', 'studiox' ) ) );

		// One of the required wordpress supports.
		add_theme_support( 'automatic-feed-links' );

		// Custom background color
		add_theme_support( "custom-background", array(
			'default-color'          => 'fff',
			'default-position-x'     => 'center',
			'default-repeat'         => 'no-repeat',
		)); 

		// Custom header support. Delete or fix it the way you want it!
		add_theme_support( 'custom-header', array(
			'default-text-color' 	=> 'fff',
			'width' 				=> 1920,
			'height'	 			=> 200,
			'default-image'         => get_template_directory_uri() . '/img/header-bg.png',
		) );

		//  Support post-thubnails as well!
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 'large', 1920, 400, true ); 	// The slider max (and all other big images.)
		set_post_thumbnail_size( 'medium', 760, 350, true ); 	// Default medium size
		set_post_thumbnail_size( 'small', 100, 100, true );		// Small size

		// Theme localization.
		load_theme_textdomain( 'studiox' );
		load_theme_textdomain( 'studiox' , get_template_directory() . '/languages' );

		// Editor style : Throught this, you should make the 
		// wordpress editor look like posts. (in css manner)
		add_editor_style( '/css/editor-style.css');
	}

	/**
	 * Add actions and filters in wordpress theme. All the actions will be here.
	 * 
	 * @uses add_action()
	 * @uses add_filter()
	 * @since v1.0.0
	 */
	public function add_actions() {

		// Register all scripts and styles
		add_action( 'wp_enqueue_scripts', array($this, 'load_scripts_and_styles') );

		// Insert custom header css for styling the header dynamicly.
		add_action( 'wp_head', array( $this, 'custom_header_css' ) );

		// Register custom fonts used in the theme.
		add_action('wp_print_styles', array( $this, 'load_fonts' ));

		// Apply Font Awesome as icons font for the options pannel ("/options/") == $opt_name
		add_action( 'redux/page/options/enqueue', array( $this, 'redux_fontawesome' ) );

		// Custom options css
		add_action( 'redux/page/options/enqueue', array( $this, 'options_css' ) );

		// Post title filter.
		add_filter( "wp_title", array( $this, "page_title" ) );

		// Change excerpt lenght
		add_filter( 'excerpt_length', array( $this, 'excerpt_length' ), 10 );

		// Add read more link instead of [...]
		add_filter( 'excerpt_more', array( $this, 'excerpt_more' ) );
	}

	/**
	 * Loading scripts and stylesheets for Innocence
	 * The order of initialising bootstrap css files is important
	 * for the theme responsivness work proerly.
	 * 
	 * @uses wp_enqueue_style()
	 * @since v1.0.0
	 */
	public function load_scripts_and_styles() {

		// Enqueue Normalize.css
		wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );

		// Enqueue Normalize.css
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
		
		// Register Font-Awesome font
		wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );

		// Enqueue Normalize.css
		// wp_enqueue_style( 'plugins', get_template_directory_uri() . '/css/plugins-support.css' );

		// Get the main stylesheet for the theme.
		wp_enqueue_style( 'stylesheet', get_stylesheet_uri() );

		// The settings Dynamic CSS from the Options Panel
		wp_enqueue_style( 'options', get_template_directory_uri() . '/admin/redux/options.min.css', 99 );

		// Include jQuery from WP Core
		wp_enqueue_script( "jquery" );

		// Bootstrap JS library
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );

		// Custom theme JS file
		wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '', true );

		// Reading time plugin
		wp_enqueue_script( 'readingtime', get_template_directory_uri() . '/js/readingtime.min.js', array(), '', true );

		// Adds JavaScript to pages with the comment form to support
		// sites with threaded comments (when in use).
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		
	}


	/**
	 * Register fonts used in the theme. It is better to include them
	 * from this file instead from hardcoding in header.php
	 * 
	 * @since  v1.0.0
	 */
	public function load_fonts() {

		wp_register_style( 'Ralleway', 'http://fonts.googleapis.com/css?family=Raleway:400,100,800,700' );
		wp_enqueue_style( 'Ralleway');

		wp_register_style( 'DroidSerif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic' );
		wp_enqueue_style( 'DroidSerif');
	}

	/**
	 * Write the theme title. It doesnt return anything.
	 * The simple name comes, because its very natural when call it:
	 * Header::title();
	 * 
	 * @uses get_bloginfo()
	 * @uses wp_title()
	 * @uses is_home()
	 * @uses is_front_page();
	 * 
	 * @since  v1.0.0
	 */
	public function page_title( $title, $sep = ' | ' ) {
		global $page, $paged;

		if ( is_feed() )
			return $title;

		$site_description = get_bloginfo( 'description' );

		$filtered_title = $title . get_bloginfo( 'name' );
		$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? $sep . $site_description: '';
		$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? $sep . sprintf( __( 'Page %s', 'studiox' ), max( $paged, $page ) ) : '';

		return $filtered_title;
	}

	/**
	 * Change the default valued for length of the post excerpt.
	 * @param  int $length The length of desired excerpt. (for all pages and all calls)
	 * @return int         Hardcoded value of the excerpt length
	 */
	public function excerpt_length( $length ) {
		return $length;
	}

	/**
	 * Change the default valued for after the post excerpt.
	 * @param  string $more Not used vcariable, wanted from WP
	 * @return string       Link for the post.
	 */
	public function excerpt_more( $more ) {
		return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
	}

	/**
	 * Add custom style for the header. 
	 * It look quite hard to read, but the main logic is to setup
	 * custom styling when there is custom header image set.
	 * 
	 * @return void
	 * @since v1.0.0
	 */
	function custom_header_css() {
		$header_image = get_header_image();

		$output = '<style type="text/css">';

		$output .= "#site-branding .site-title a,";
		$output .= "#site-branding .site-description {";

		// Check if the site title text should be displayed.
		if( get_header_textcolor() == 'blank' ) {
			$output .= 'visibility: hidden;'; 
		}
		else {
			$output .= 'color: #' . get_header_textcolor() . ' !important';
		}

		// Close the title and desc styles.
		$output .= "}";

		// Close the style tag
		$output .= '</style>';

		// Print the final styles.
		echo $output;
	}

	/**
	 * Include Font Awesome insite Redux framework options pannel
	 * 
	 * @since v1.1.0
	 */
	function redux_fontawesome() {

		// Remove elusive icon from the panel completely. (uncomment to remove them)
		// wp_deregister_style( 'redux-elusive-icon' );
		// wp_deregister_style( 'redux-elusive-icon-ie7' );

		// Insert the font-awesome
		wp_register_style( 'redux-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', array(), time(), 'all' );  
		wp_enqueue_style( 'redux-font-awesome' );

	}

	/**
	 * Custom css for the options panel
	 * 
	 * @since v1.1.0
	 */
	function options_css() {
		wp_register_style( 'redux-custom-css', get_template_directory_uri() . '/admin/redux/settings-panel.css', array( 'redux-css' ), time(), 'all' );  
		wp_enqueue_style('redux-custom-css');
	}
}

// Removing this line is like not having a functions.php file
$studiox = new studiox;

endif;