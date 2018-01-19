<?php
/**
 * intership functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package intership
 */

if ( ! function_exists( 'intership_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function intership_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on intership, use a find and replace
		 * to change 'intership' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'intership', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'intership' ),
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
		add_theme_support( 'custom-background', apply_filters( 'intership_custom_background_args', array(
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
add_action( 'after_setup_theme', 'intership_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function intership_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'intership_content_width', 640 );
}
add_action( 'after_setup_theme', 'intership_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function intership_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'intership' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'intership' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'intership_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function intership_scripts() {
	wp_enqueue_style( 'intership-style', get_stylesheet_uri() );

    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

    wp_enqueue_style( 'custom-intership-style', get_template_directory_uri() . '/css/main.css' );

	wp_enqueue_script( 'intership-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'intership-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '20151215', true);

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'intership_scripts' );

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
 * Insta widget
 */

function custom_sidebars()
{

    $args = array(
        'name' => esc_html__('insta-plugin', 'inership'),
        'class' => 'insta-wrap',
        'id' => 'sidebar-2',
        'description' => esc_html__('Add widgets here.', 'intership'),
        'before_widget' => '<div class="insta-img %2$s">',
        'after_widget' => '</div>'
    );
    register_sidebar($args);

}

add_action('widgets_init', 'custom_sidebars');

/**
 * Customizer
 */
function sitepoint_customizer_live_preview()
{
    wp_enqueue_script("sitepoint-themecustomizer", get_template_directory_uri() . "/js/main.js", array("jquery", "customize-preview"), '', true);
}

add_action("customize_preview_init", "sitepoint_customizer_live_preview");
function sitepoint_customize_register($wp_customize)
{
    $wp_customize->add_section("ads", array(
        "title" => __("Playlist", "customizer_ads_sections"),
        "priority" => 30,
    ));

    //song1
    $wp_customize->add_setting("song", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song",
        array(
            "label" => __("01.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song",
            "type" => "text",
        )
    ));

    //song2
    $wp_customize->add_setting("song2", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song2",
        array(
            "label" => __("02.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song2",
            "type" => "text",
        )
    ));

    //song3
    $wp_customize->add_setting("song3", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song3",
        array(
            "label" => __("03.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song3",
            "type" => "text",
        )
    ));

    //song4
    $wp_customize->add_setting("song4", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song4",
        array(
            "label" => __("04.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song4",
            "type" => "text",
        )
    ));

    //song5
    $wp_customize->add_setting("song5", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song5",
        array(
            "label" => __("05.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song5",
            "type" => "text",
        )
    ));

    //song6
    $wp_customize->add_setting("song6", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song6",
        array(
            "label" => __("06.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song6",
            "type" => "text",
        )
    ));

    //song7
    $wp_customize->add_setting("song7", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song7",
        array(
            "label" => __("07.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song7",
            "type" => "text",
        )
    ));

    //song8
    $wp_customize->add_setting("song8", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song8",
        array(
            "label" => __("08.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song8",
            "type" => "text",
        )
    ));

    //song9
    $wp_customize->add_setting("song9", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song9",
        array(
            "label" => __("09.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song9",
            "type" => "text",
        )
    ));

    //song10
    $wp_customize->add_setting("song10", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song10",
        array(
            "label" => __("10.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song10",
            "type" => "text",
        )
    ));

    //song9
    $wp_customize->add_setting("song11", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song11",
        array(
            "label" => __("11.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song11",
            "type" => "text",
        )
    ));

    //song9
    $wp_customize->add_setting("song12", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "song12",
        array(
            "label" => __("12.", "customizer_ads_code_label"),
            "section" => "ads",
            "settings" => "song12",
            "type" => "text",
        )
    ));
}

add_action("customize_register", "sitepoint_customize_register");

/**
 * Header links
 */
function sitepoint_customize_register_links($wp_customize)
{
    $wp_customize->add_section("slh", array(
        "title" => __("Social networks on header", "customizer_slh_sections"),
        "priority" => 30,
    ));

    //fb link
    $wp_customize->add_setting("slh_code", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "slh_code",
        array(
            "label" => __("Facebook Link", "customizer_slh_code_label"),
            "section" => "slh",
            "settings" => "slh_code",
            "type" => "text",
        )
    ));

    //fb text
    $wp_customize->add_setting("slh_code_text", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "slh_code_text",
        array(
            "label" => __("Facebook Text", "customizer_slh_code_label"),
            "section" => "slh",
            "settings" => "slh_code_text",
            "type" => "text",
        )
    ));

    //tw link
    $wp_customize->add_setting("slh_code2", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "slh_code2",
        array(
            "label" => __("Twitter Link", "customizer_slh_code_label"),
            "section" => "slh",
            "settings" => "slh_code2",
            "type" => "text",
        )
    ));

    //tw text
    $wp_customize->add_setting("slh_code2_text", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "slh_code2_text",
        array(
            "label" => __("Twitter Text", "customizer_slh_code_label"),
            "section" => "slh",
            "settings" => "slh_code2_text",
            "type" => "text",
        )
    ));

    //g+ link
    $wp_customize->add_setting("slh_code3", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "slh_code3",
        array(
            "label" => __("Google+ Link", "customizer_slh_code_label"),
            "section" => "slh",
            "settings" => "slh_code3",
            "type" => "text",
        )
    ));

    //g+ text
    $wp_customize->add_setting("slh_code3_text", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "slh_code3_text",
        array(
            "label" => __("Google+ Text", "customizer_slh_code_label"),
            "section" => "slh",
            "settings" => "slh_code3_text",
            "type" => "text",
        )
    ));
}

add_action("customize_register", "sitepoint_customize_register_links");

/**
 * Our Members
 */
function custom_init()
{
    $args = array(
        'public' => true,
        'label' => 'Our Members',
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('members', $args);
}

add_action('init', 'custom_init');
add_action('add_meta_boxes', 'custom_fields_add_meta_box');
function custom_fields_add_meta_box()
{
    add_meta_box('additional-info', __('Additional info'), 'custom_members_field', 'members', 'normal', 'high');
}

function custom_members_field($post)
{
    $values = get_post_custom($post->ID);
    $instrument = isset($values['instrument']) ? esc_attr($values['instrument'][0]) : '';
    $facebook = isset($values['facebook']) ? esc_attr($values['facebook'][0]) : '';
    $twitter = isset($values['twitter']) ? esc_attr($values['twitter'][0]) : '';
    $googleplus = isset($values['googleplus']) ? esc_attr($values['googleplus'][0]) : '';
    $facebookLink = isset($values['facebook-link']) ? esc_attr($values['facebook-link'][0]) : '';
    $twitterLink = isset($values['twitter-link']) ? esc_attr($values['twitter-link'][0]) : '';
    $googleplusLink = isset($values['googleplus-link']) ? esc_attr($values['googleplus-link'][0]) : '';
    echo '<p><input id="instrument" name="instrument" type="text" value="' . $instrument . '"><label for="instrument"> - Instrument</label></p>';
    echo '<p><input id="facebook-link" name="facebook-link" type="text" value="' . $facebookLink . '"><label for="facebook-link"> - Facebook Link</label></p>';
    echo '<p><input id="facebook" name="facebook" type="text" value="' . $facebook . '"><label for="facebook"> - Facebook Followers</label></p>';
    echo '<p><input id="twitter-link" name="twitter-link" type="text" value="' . $twitterLink . '"><label for="twitter-link"> - Twitter Link</label></p>';
    echo '<p><input id="twitter" name="twitter" type="text" value="' . $twitter . '"><label for="twitter"> - Twitter Followers</label></p>';
    echo '<p><input id="googleplus-link" name="googleplus-link" type="text" value="' . $googleplusLink . '"><label for="googleplus-link"> - Google+ Link</label></p>';
    echo '<p><input id="googleplus" name="googleplus" type="text" value="' . $googleplus . '"><label for="googleplus"> - Google+ Followers</label></p>';

}

add_action('save_post', 'custom_members_field_save');
function custom_members_field_save($post_id)
{
    $allowed = 'None';
    if (isset($_POST['instrument']))
        update_post_meta($post_id, 'instrument', wp_kses($_POST['instrument'], $allowed));
    if (isset($_POST['facebook-link']))
        update_post_meta($post_id, 'facebook-link', wp_kses($_POST['facebook-link'], $allowed));
    if (isset($_POST['twitter-link']))
        update_post_meta($post_id, 'twitter-link', wp_kses($_POST['twitter-link'], $allowed));
    if (isset($_POST['googleplus-link']))
        update_post_meta($post_id, 'googleplus-link', wp_kses($_POST['googleplus-link'], $allowed));
    if (isset($_POST['facebook']))
        update_post_meta($post_id, 'facebook', wp_kses($_POST['facebook'], $allowed));
    if (isset($_POST['twitter']))
        update_post_meta($post_id, 'twitter', wp_kses($_POST['twitter'], $allowed));
    if (isset($_POST['googleplus']))
        update_post_meta($post_id, 'googleplus', wp_kses($_POST['googleplus'], $allowed));
}

add_action('init', 'create_members_tax');
function create_members_tax()
{
    register_taxonomy(
        'members_category',
        'members',
        array(
            'label' => __('Category'),
            'rewrite' => array('slug' => 'category'),
            'hierarchical' => true,
        )
    );
}

function get_link_slug($slug, $type = 'custom_init')
{
    $post = get_page_by_path($slug, OBJECT, $type);
    return get_permalink($post->ID);
}

/*
 * Concert
 */
function custom_init_consert()
{
    $args = array(
        'public' => true,
        'label' => 'Consert',
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('consert', $args);
}

add_action('init', 'custom_init_consert');
add_action('add_meta_boxes', 'custom_fields_add_meta_box_consert');
function custom_fields_add_meta_box_consert()
{
    add_meta_box('additional-info', __('Consert info'), 'custom_members_field_consert', 'consert', 'normal', 'high');
}

function custom_members_field_consert($post)
{
    $values = get_post_custom($post->ID);
    $location = isset($values['location']) ? esc_attr($values['location'][0]) : '';
    $date = isset($values['date']) ? esc_attr($values['date'][0]) : '';
    $eventDay = isset($values['event-day']) ? esc_attr($values['event-day'][0]) : '';
    $time = isset($values['time']) ? esc_attr($values['time'][0]) : '';
    $price = isset($values['price']) ? esc_attr($values['price'][0]) : '';
    $btnLink = isset($values['btn-link']) ? esc_attr($values['btn-link'][0]) : '';
    echo '<p><input id="location" name="location" type="text" value="' . $location . '"><label for="location"> - Location</label></p>';
    echo '<p><input id="event-day" name="event-day" type="text" value="' . $eventDay . '"><label for="event-day"> - Event day (text on image)</label></p>';
    echo '<p><input id="date" name="date" type="text" value="' . $date . '"><label for="date"> - Date</label></p>';
    echo '<p><input id="time" name="time" type="text" value="' . $time . '"><label for="time"> - Time</label></p>';
    echo '<p><input id="price" name="price" type="text" value="' . $price . '"><label for="price"> - Price</label></p>';
    echo '<p><input id="btn-link" name="btn-link" type="btn-link" value="' . $btnLink . '"><label for="btn-link"> - Button link</label></p>';

}

add_action('save_post', 'custom_members_field_save_consert');
function custom_members_field_save_consert($post_id)
{
    $allowed = 'None';
    if (isset($_POST['location']))
        update_post_meta($post_id, 'location', wp_kses($_POST['location'], $allowed));
    if (isset($_POST['date']))
        update_post_meta($post_id, 'date', wp_kses($_POST['date'], $allowed));
    if (isset($_POST['event-day']))
        update_post_meta($post_id, 'event-day', wp_kses($_POST['event-day'], $allowed));
    if (isset($_POST['time']))
        update_post_meta($post_id, 'time', wp_kses($_POST['time'], $allowed));
    if (isset($_POST['price']))
        update_post_meta($post_id, 'price', wp_kses($_POST['price'], $allowed));
    if (isset($_POST['btn-link']))
        update_post_meta($post_id, 'btn-link', wp_kses($_POST['btn-link'], $allowed));
}

add_action('init', 'create_members_tax_consert');
function create_members_tax_consert()
{
    register_taxonomy(
        'consert_category',
        'consert',
        array(
            'label' => __('Category'),
            'rewrite' => array('slug' => 'category'),
            'hierarchical' => true,
        )
    );
}

function get_link_slug_consert($slug, $type = 'custom_init')
{
    $post = get_page_by_path($slug, OBJECT, $type);
    return get_permalink($post->ID);
}

/*
 * Video
 */
function custom_init_video()
{
    $args = array(
        'public' => true,
        'label' => 'Video',
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('video', $args);
}

add_action('init', 'custom_init_video');
add_action('add_meta_boxes', 'custom_fields_add_meta_box_video');
function custom_fields_add_meta_box_video()
{
    add_meta_box('additional-info', __('Video info'), 'custom_members_field_video', 'video', 'normal', 'high');
}

function custom_members_field_video($post)
{
    $values = get_post_custom($post->ID);
    $video = isset($values['video']) ? esc_attr($values['video'][0]) : '';
    echo '<p><input id="video" name="video" type="text" value="' . $video . '"><label for="video"> - Video Source</label></p>';
}

add_action('save_post', 'custom_members_field_save_video');
function custom_members_field_save_video($post_id)
{
    $allowed = 'None';
    if (isset($_POST['video']))
        update_post_meta($post_id, 'video', wp_kses($_POST['video'], $allowed));
}

add_action('init', 'create_members_tax_video');
function create_members_tax_video()
{
    register_taxonomy(
        'video_category',
        'video',
        array(
            'label' => __('Category'),
            'rewrite' => array('slug' => 'category'),
            'hierarchical' => true,
        )
    );
}

function get_link_slug_video($slug, $type = 'custom_init')
{
    $post = get_page_by_path($slug, OBJECT, $type);
    return get_permalink($post->ID);
}