<?php
/**
 * Modus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Modus
 */

if ( ! function_exists( 'modus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function modus_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Modus, use a find and replace
	 * to change 'modus' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'modus', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'modus' ),
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
	add_theme_support( 'custom-background', apply_filters( 'modus_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'modus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function modus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'modus_content_width', 640 );
}
add_action( 'after_setup_theme', 'modus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function modus_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'modus' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'modus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'modus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function modus_scripts() {
		
	wp_enqueue_style( 'fontawesome' );

	wp_register_style( 'fontawesome', get_template_directory_uri() .
	 '/libs/font-awesome/css/font-awesome.min.css');

	wp_enqueue_style( 'modus-style', get_stylesheet_uri() );

	wp_enqueue_script( 'modus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'modus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modus_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-post-type.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');


add_action('init', 'register_post_types');
function register_post_types(){
	register_post_type('services', array(
		'labels' => array(
			'name' => __( 'Services' ),
        'singular_name' => __( 'Service' ),
			'add_new'            => 'Add new services', // для добавления новой записи
			'add_new_item'       => 'Add new service', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit service', // для редактирования типа записи
			'new_item'           => 'New service', // текст новой записи
			'view_item'          => '', // для просмотра записи этого типа.
			
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null,
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-groups', 
		'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array('services'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}


add_action('init', 'create_taxonomy');
function create_taxonomy(){
	// заголовки
	// весь список: http://wp-kama.ru/function/get_taxonomy_labels
	$labels = array(
		'name'              => 'Services',
		'singular_name'     => 'Service',
		'search_items'      => 'Search Services',
		'all_items'         => 'All Services',
		'parent_item'       => 'Parent Service',
		'parent_item_colon' => 'Parent Service:',
		'edit_item'         => 'Edit Service',
		'update_item'       => 'Update Service',
		'add_new_item'      => 'Add New Service',
		'new_item_name'     => 'New Service Name',
		'menu_name'         => 'Service',
	); 
	// параметры
	$args = array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => $labels,
		'description'           => '', // описание таксономии
		'public'                => true,
		'show_tagcloud'         => falce, // равен аргументу show_ui
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	);
	register_taxonomy('taxonomy', array('post'), $args );
}
