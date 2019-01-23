<?php
/**
 * topfactsabout functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package topfactsabout
 */

if ( ! function_exists( 'topfactsabout_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function topfactsabout_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on topfactsabout, use a find and replace
		 * to change 'topfactsabout' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'topfactsabout', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'topfactsabout' ),
			'footer-menu' => esc_html__( 'footer', 'topfactsabout' ),
			'header-menu' => esc_html__( 'header', 'topfactsabout' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'topfactsabout_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'topfactsabout_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function topfactsabout_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'topfactsabout_content_width', 640 );
}
add_action( 'after_setup_theme', 'topfactsabout_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function topfactsabout_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'topfactsabout' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'topfactsabout' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'topfactsabout_widgets_init' );
//Get unique styles
function get_unique_styles($type){
	$src = '';
	if($type == 'post'){
		$src =  'http://wordpress/wp-content/themes/topfactsabout/css/post.css';
	}
	echo '<link rel="stylesheet" href="'.$src.'">';
} 
add_action('init','random_add_rewrite');
function random_add_rewrite() {
       global $wp;
       $wp->add_query_var('random');
       add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}
 
add_action('template_redirect','random_template');
function random_template() {
       if (get_query_var('random') == 1) {
               $posts = get_posts('post_type=post&orderby=rand&numberposts=1');
               foreach($posts as $post) {
                       $link = get_permalink($post);
               }
               wp_redirect($link,307);
               exit;
       }
}
/**
 * Enqueue scripts and styles.
 */
function topfactsabout_scripts() {
	wp_enqueue_style( 'topfactsabout-style', get_stylesheet_uri() );

	wp_enqueue_script( 'topfactsabout-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'topfactsabout-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'topfactsabout_scripts' );

	function shortcode_categories_list() {
		ob_start();
		$categories=  get_categories();
		echo '<ul class="single-page__categories">';
			foreach ($categories as $cat) {
			$option = '<div class="single-page__category" style="background-image: url('.get_field('cat_img','category_'.$cat->cat_ID).')">
							<a href="#"><p class="single-page__category-about">'.$cat->name.'</p></a>
						</div>';
			echo $option;
			}
		
		$output_string=ob_get_contents();;
		ob_end_clean();
		echo '</ul>';
		return $output_string;
		}
	add_shortcode('categories_list', 'shortcode_categories_list');
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

