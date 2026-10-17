<?php
/**
 * Aurora Theme functions and definitions.
 *
 * @package Aurora
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AURORA_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function aurora_setup() {
	load_theme_textdomain( 'aurora', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'aurora' ),
			'footer'  => __( 'Footer Menu', 'aurora' ),
		)
	);

	add_image_size( 'aurora-card', 800, 500, true );
}
add_action( 'after_setup_theme', 'aurora_setup' );

/**
 * Enqueue styles and scripts.
 */
function aurora_assets() {
	wp_enqueue_style( 'aurora-fonts', 'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Inter:wght@400;500;600&display=swap', array(), null );
	wp_enqueue_style( 'aurora-style', get_stylesheet_uri(), array( 'aurora-fonts' ), AURORA_VERSION );
	wp_enqueue_style( 'aurora-main', get_template_directory_uri() . '/assets/css/main.css', array( 'aurora-style' ), AURORA_VERSION );

	wp_enqueue_script( 'aurora-main', get_template_directory_uri() . '/assets/js/main.js', array(), AURORA_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aurora_assets' );

/**
 * Register widget areas.
 */
function aurora_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'aurora' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Widgets shown beside blog posts.', 'aurora' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget__title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'aurora_widgets_init' );

/**
 * Keep URLs and structure intact: disable the default page slug prefix changes.
 * Content, menus and permalinks are untouched by this theme.
 */
function aurora_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'aurora_excerpt_length' );

function aurora_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'aurora_excerpt_more' );

/**
 * Contact form handler for the "Contact Page" template.
 */
function aurora_handle_contact() {
	if ( ! isset( $_POST['aurora_contact_nonce'] )
		|| ! wp_verify_nonce( sanitize_key( $_POST['aurora_contact_nonce'] ), 'aurora_contact' )
	) {
		wp_safe_redirect( home_url( '/' ) );
		exit;
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

	if ( $name && is_email( $email ) && $message ) {
		$to   = get_theme_mod( 'aurora_email', get_option( 'admin_email' ) );
		$body = sprintf( "Name: %s\nEmail: %s\n\n%s", $name, $email, $message );
		wp_mail( $to, sprintf( '[%s] New contact message', get_bloginfo( 'name' ) ), $body );
	}

	wp_safe_redirect( add_query_arg( 'sent', '1', wp_get_referer() ?: home_url( '/' ) ) );
	exit;
}
add_action( 'admin_post_aurora_contact', 'aurora_handle_contact' );
add_action( 'admin_post_nopriv_aurora_contact', 'aurora_handle_contact' );

/**
 * Customizer: brand accent and contact details, used across the redesign.
 */
function aurora_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'aurora_brand',
		array(
			'title'    => __( 'Aurora Brand', 'aurora' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'aurora_accent',
		array(
			'default'           => '#2f5df6',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'aurora_accent',
			array(
				'label'   => __( 'Accent color', 'aurora' ),
				'section' => 'aurora_brand',
			)
		)
	);

	$wp_customize->add_setting(
		'aurora_email',
		array(
			'default'           => 'hello@example.com',
			'sanitize_callback' => 'sanitize_email',
		)
	);

	$wp_customize->add_control(
		'aurora_email',
		array(
			'label'   => __( 'Contact email', 'aurora' ),
			'section' => 'aurora_brand',
			'type'    => 'email',
		)
	);
}
add_action( 'customize_register', 'aurora_customize_register' );

/**
 * Print the accent color as a CSS custom property.
 */
function aurora_accent_css() {
	$accent = get_theme_mod( 'aurora_accent', '#2f5df6' );
	if ( '#2f5df6' === $accent ) {
		return;
	}
	printf(
		'<style id="aurora-accent">:root{--color-accent:%1$s;--color-accent-strong:%1$s;}</style>',
		esc_attr( $accent )
	);
}
add_action( 'wp_head', 'aurora_accent_css' );
