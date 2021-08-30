<?php

function getInitials($name)
{
//split name using spaces
    $words = explode(" ", $name);
    $inits = '';
//loop through array extracting initial letters
    foreach ($words as $word) {
        $inits .= strtoupper(substr($word, 0, 1));
    }
    return $inits;
}

if ( ! function_exists( 'mission_ready_setup' ) ) {
	
	function mission_ready_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'missionready' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'missionready', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		add_theme_support( 'post-thumbnails' );


		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'missionready' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		
		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'FFFFFF',
                'default-image' => '',
			)
		);

        add_theme_support('customize-selective-refresh-widgets');

		// custom logo
        add_theme_support(
            'custom_logo',
            array(
                'height' => 250,
                'width' => 250,
                'flexible_width' => true,
                'flexible-height' => true
            )
        );
        
	}
}
add_action( 'after_setup_theme', 'mission_ready_setup' );

function load_stylesheets()
{
    /**
     * load stylesheets on the header
     */
    wp_register_style('styles', get_template_directory_uri() . '/css/style.css', array(), 1);
    wp_enqueue_style('styles');

}
add_action('wp_enqueue_scripts', 'load_stylesheets');

/**
 * additional custom functions functions
 */
require_once "inc/custom.php";