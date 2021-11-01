<?php
/**
 * elevkaren functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package elevkaren
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'elevkaren_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function elevkaren_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on elevkaren, use a find and replace
		 * to change 'elevkaren' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'elevkaren', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'elevkaren' ),
				'footer' => esc_html__( 'Sidfotens meny', 'elevkaren' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 400,
				'width'       => 400,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'elevkaren_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elevkaren_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'elevkaren_content_width', 640 );
}
add_action( 'after_setup_theme', 'elevkaren_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elevkaren_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Innehåll innan sidfot', 'elevkaren' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Lägg till innehåll här', 'elevkaren' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'elevkaren_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function elevkaren_scripts() {
	wp_enqueue_style( 'elevkaren-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'adobe-fonts', 'https://use.typekit.net/cbo4wgk.css', array(), 1.0);
	wp_style_add_data( 'elevkaren-style', 'rtl', 'replace' );

	wp_enqueue_script( 'elevkaren-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'elevkaren_scripts' );

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





/**
 * Remove default post type
 */
add_action('admin_menu','remove_default_post_type');

function remove_default_post_type() {
	remove_menu_page('edit.php');
	remove_menu_page( 'edit-comments.php' );
}




/**
 * Remove comment support for wordpress
 */
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function elevkaren_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'elevkaren_admin_bar_render' );






/**
 * Events post type setup
 */
add_action('init', 'events_init');
function events_init() {
	$args = array(
		'labels' => array(
			'name' => __('Evenemang'),
			'add_new' => __('Skapa nytt evenemang'),
			'add_new_item' => __('Skapa nytt evenemang'),
			'edit_item' => __('Redigera evenemang'),
			'new_item' => __('Nytt evenemang'),
			'view_item' => __('Se evenemang'),
			'view_items' => __('Se evenemang'),
			'search_items' => __('Sök efter evenemang'),
			'not_found' => __('Hoppsan! Hittade inga evenemang.'),
			'not_found_in_trash' => __('Inte ens här! Hittade inga evenemang som matchade din sökning.'),
			'all_items' => __('Alla evenemang'),
			'attributes' => __('Evenemangsdetaljer'),
			'insert_into_item' => __('Infoga i evenemang'),
			'uploaded_to_this_item' => __('Uppladdat till detta evenemang'),
			'featured_image' => __('Bild på evenemanget'),
			'set_featured_image' => __('Lägg till en bild på evenemanget'),
			'singular_name' => __('Evenemang'),
			'item_published' => __('Evenemang publicerat.'),
			'item_published_privately' => __('Evenemang publicerat privat.'),
			'item_reverted_to_draft' => __('Evenemang återgick till utkast.'),
			'item_scheduled' => __('Publicering av evenemang är schemalagt.'),
			'item_updated' => __('Hurra! Evenemanget är uppladdat.'),
		),
		'description' => "De senaste evenemangen anordnade av Elevkåren.",
		'menu_position' => 5,
		'public' => true,
		'menu_icon' => 'dashicons-calendar-alt',
		'has_archive' => true,
		'rewrite' => array("slug" => "evenemang"), 
		'supports' => array('thumbnail','title','custom-fields')
	);

	register_post_type( 'evenemang' , $args );
}






/**
 * Committées post type setup
 */
add_action('init', 'committees_init');
function committees_init() {
	$args = array(
		'labels' => array(
			'name' => __('Kommittéer'),
			'add_new' => __('Lägg till kommitté'),
			'add_new_item' => __('Lägg till kommitté'),
			'edit_item' => __('Redigera kommitté'),
			'new_item' => __('Ny kommitté'),
			'view_item' => __('Se kommitté'),
			'view_items' => __('Se kommittéer'),
			'search_items' => __('Sök efter en kommitté'),
			'not_found' => __('Hoppsan! Hittade ingen kommitté.'),
			'not_found_in_trash' => __('Inte ens här! Hittade inga kommittéer som matchade din sökning.'),
			'all_items' => __('Alla kommittéer'),
			'attributes' => __('Kommittédetaljer'),
			'insert_into_item' => __('Infoga i kommitté'),
			'uploaded_to_this_item' => __('Uppladdat till denna kommitté'),
			'featured_image' => __('Bild på kommitté'),
			'set_featured_image' => __('Lägg till en bild på kommittén'),
			'singular_name' => __('Kommitté'),
			'item_published' => __('Kommitté publicerad.'),
			'item_published_privately' => __('Kommitté publicerad privat.'),
			'item_reverted_to_draft' => __('Kommitté återgick till utkast.'),
			'item_scheduled' => __('Publicering av kommitté är schemalagt.'),
			'item_updated' => __('Hurra! Kommittén är uppladdad.'),
		),
		'description' => "Här finner du alla kommittéer som Elevkåren finansierar.",
		'menu_position' => 5,
		'public' => true,
		'menu_icon' => 'dashicons-groups',
		'has_archive' => true,
		'rewrite' => array("slug" => "kommitteer"), 
		'supports' => array('title','custom-fields')
	);

	register_post_type( 'kommitteer' , $args );
}






/**
 * Discounts post type setup
 */
add_action('init', 'discounts_init');
function discounts_init() {
	$args = array(
		'labels' => array(
			'name' => __('Rabatter'),
			'add_new' => __('Lägg till rabatt'),
			'add_new_item' => __('Lägg till rabatt'),
			'edit_item' => __('Redigera rabatt'),
			'new_item' => __('Ny rabatt'),
			'view_item' => __('Se rabatt'),
			'view_items' => __('Se rabatter'),
			'search_items' => __('Sök efter en rabatt'),
			'not_found' => __('Hoppsan! Hittade ingen rabatt.'),
			'not_found_in_trash' => __('Inte ens här! Hittade inga rabatter som matchade din sökning.'),
			'all_items' => __('Alla rabatter'),
			'attributes' => __('Rabattdetaljer'),
			'insert_into_item' => __('Infoga i rabatt'),
			'uploaded_to_this_item' => __('Uppladdat till denna rabatt'),
			'featured_image' => __('Bild till rabatt'),
			'set_featured_image' => __('Lägg till en bild till rabatt'),
			'singular_name' => __('Rabatt'),
			'item_published' => __('Rabatt publicerad.'),
			'item_published_privately' => __('Rabatt publicerad privat.'),
			'item_reverted_to_draft' => __('Rabatt återgick till utkast.'),
			'item_scheduled' => __('Publicering av rabatt är schemalagt.'),
			'item_updated' => __('Hurra! Rabatten är uppladdad.'),
		),
		'description' => "Alla rabatter som medlemmar i Elevkåren får ta del av.",
		'menu_position' => 5,
		'public' => true,
		'menu_icon' => 'dashicons-tickets-alt',
		'has_archive' => true,
		'rewrite' => array("slug" => "rabatter"), 
		'supports' => array('thumbnail','title','custom-fields')
	);

	register_post_type( 'rabatter' , $args );
}




/**
 * Remove unnecessary buttons on admin bar
 */
function remove_from_admin_bar($wp_admin_bar) {
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('my-account');
}
add_action('admin_bar_menu', 'remove_from_admin_bar', 999);