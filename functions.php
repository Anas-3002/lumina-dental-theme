<?php
/**
 * Lumina Dental Studio - theme functions.
 *
 * @package Lumina_Dental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LUMINA_VERSION', '2.0.2' );
define( 'LUMINA_CONTENT_VERSION', '2.0.2' );

require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/forms.php';
require_once get_template_directory() . '/inc/content-render.php';
require_once get_template_directory() . '/inc/seo.php';
require_once get_template_directory() . '/inc/schema.php';
require_once get_template_directory() . '/inc/content-installer.php';

/**
 * Theme supports.
 */
function lumina_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'lumina-dental' ),
		'footer'  => __( 'Footer Menu', 'lumina-dental' ),
	) );
	add_image_size( 'lumina-card', 720, 480, true );
}
add_action( 'after_setup_theme', 'lumina_setup' );

function lumina_content_width() {
	$GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'lumina_content_width', 0 );

/**
 * Front-end assets.
 */
function lumina_assets() {
	$uri = get_template_directory_uri();

	wp_enqueue_style( 'lumina-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'lumina-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap', array(), null );
	wp_enqueue_style( 'lumina-theme', $uri . '/assets/css/theme.css', array(), LUMINA_VERSION );
	wp_enqueue_script( 'lumina-theme', $uri . '/assets/js/theme.js', array(), LUMINA_VERSION, true );

	wp_localize_script( 'lumina-theme', 'LuminaData', array(
		'registered' => isset( $_GET['registered'] ) ? sanitize_key( wp_unslash( $_GET['registered'] ) ) : '',
		'home'       => esc_url_raw( home_url( '/' ) ),
	) );
}
add_action( 'wp_enqueue_scripts', 'lumina_assets' );

/**
 * Private store for patient registration submissions.
 */
function lumina_register_cpt() {
	register_post_type( 'patient_request', array(
		'labels'          => array(
			'name'          => __( 'Patient Requests', 'lumina-dental' ),
			'singular_name' => __( 'Patient Request', 'lumina-dental' ),
			'menu_name'     => __( 'Patient Requests', 'lumina-dental' ),
		),
		'public'          => false,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'menu_icon'       => 'dashicons-clipboard',
		'supports'        => array( 'title', 'editor', 'custom-fields' ),
		'capability_type' => 'post',
		'map_meta_cap'    => true,
	) );
}
add_action( 'init', 'lumina_register_cpt' );

/**
 * Field labels used by the admin screen, the notification email and the form parser.
 */
function lumina_field_labels() {
	return array(
		'full_name' => __( 'Full name', 'lumina-dental' ),
		'phone'     => __( 'Phone', 'lumina-dental' ),
		'email'     => __( 'Email', 'lumina-dental' ),
		'need'      => __( 'Primary dental need', 'lumina-dental' ),
		'coverage'  => __( 'Coverage option', 'lumina-dental' ),
		'service'   => __( 'Service requested', 'lumina-dental' ),
		'hero_time' => __( 'Preferred time window', 'lumina-dental' ),
		'message'   => __( 'Message', 'lumina-dental' ),
	);
}

/**
 * Handle the patient registration form.
 */
function lumina_handle_registration() {
	$nonce = isset( $_POST['lumina_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['lumina_nonce'] ) ) : '';
	$back  = home_url( '/book/' );

	if ( ! wp_verify_nonce( $nonce, 'lumina_register' ) ) {
		wp_safe_redirect( add_query_arg( 'registered', 'error', $back ) );
		exit;
	}

	$type = isset( $_POST['form_type'] ) ? sanitize_key( wp_unslash( $_POST['form_type'] ) ) : 'hero';

	$values = array();
	foreach ( array_keys( lumina_field_labels() ) as $key ) {
		if ( isset( $_POST[ $key ] ) ) {
			$values[ $key ] = sanitize_text_field( wp_unslash( $_POST[ $key ] ) );
		}
	}

	if ( empty( $values['full_name'] ) || empty( $values['phone'] ) ) {
		wp_safe_redirect( add_query_arg( 'registered', 'error', $back ) );
		exit;
	}

	if ( ! empty( $values['email'] ) && ! is_email( $values['email'] ) ) {
		unset( $values['email'] );
	}

	$labels = lumina_field_labels();
	$lines  = array();
	foreach ( $values as $key => $value ) {
		if ( '' !== $value ) {
			$lines[] = $labels[ $key ] . ': ' . $value;
		}
	}
	$lines[] = 'Source form: ' . $type;
	$lines[] = 'Received: ' . current_time( 'Y-m-d H:i:s' );

	$post_id = wp_insert_post( array(
		'post_type'    => 'patient_request',
		'post_status'  => 'private',
		'post_title'   => $values['full_name'] . ' - ' . $values['phone'],
		'post_content' => implode( "\n", $lines ),
	), true );

	if ( ! is_wp_error( $post_id ) ) {
		foreach ( $values as $key => $value ) {
			update_post_meta( $post_id, '_lumina_' . $key, $value );
		}
		update_post_meta( $post_id, '_lumina_source', $type );

		wp_mail(
			get_option( 'admin_email' ),
			sprintf( '[%s] New patient registration: %s', wp_specialchars_decode( get_bloginfo( 'name' ) ), $values['full_name'] ),
			implode( "\n", $lines )
		);
	}

	wp_safe_redirect( add_query_arg( 'registered', '1', home_url( '/thank-you/' ) ) );
	exit;
}
add_action( 'admin_post_nopriv_lumina_register', 'lumina_handle_registration' );
add_action( 'admin_post_lumina_register', 'lumina_handle_registration' );

/**
 * Contact form on the contact page shares the same pipeline.
 */
add_action( 'admin_post_nopriv_lumina_contact', 'lumina_handle_registration' );
add_action( 'admin_post_lumina_contact', 'lumina_handle_registration' );

/**
 * Admin list columns for patient requests.
 */
function lumina_request_columns( $columns ) {
	$new = array();
	foreach ( $columns as $key => $label ) {
		$new[ $key ] = $label;
		if ( 'title' === $key ) {
			$new['lumina_contact']  = __( 'Contact', 'lumina-dental' );
			$new['lumina_interest'] = __( 'Interest', 'lumina-dental' );
		}
	}
	return $new;
}
add_filter( 'manage_patient_request_posts_columns', 'lumina_request_columns' );

function lumina_request_column_content( $column, $post_id ) {
	if ( 'lumina_contact' === $column ) {
		$phone = get_post_meta( $post_id, '_lumina_phone', true );
		$email = get_post_meta( $post_id, '_lumina_email', true );
		echo esc_html( trim( $phone . ( $email ? ' / ' . $email : '' ) ) );
	}
	if ( 'lumina_interest' === $column ) {
		$need    = get_post_meta( $post_id, '_lumina_need', true );
		$service = get_post_meta( $post_id, '_lumina_service', true );
		echo esc_html( $need ? $need : $service );
	}
}
add_action( 'manage_patient_request_posts_custom_column', 'lumina_request_column_content', 10, 2 );

/**
 * Query tweaks: 9 posts on the blog index, pages included in search.
 */
function lumina_pre_get_posts( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	if ( $query->is_home() ) {
		$query->set( 'posts_per_page', 9 );
	}
	if ( $query->is_search() ) {
		$query->set( 'post_type', array( 'post', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'lumina_pre_get_posts' );

function lumina_excerpt_length() {
	return 28;
}
add_filter( 'excerpt_length', 'lumina_excerpt_length', 999 );

function lumina_excerpt_more() {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'lumina_excerpt_more' );

/**
 * Estimated reading time, used by the blog cards and the post header.
 */
function lumina_reading_time( $post_id = null ) {
	$post    = get_post( $post_id );
	$words   = str_word_count( wp_strip_all_tags( $post->post_content ) );
	$minutes = max( 1, (int) round( $words / 220 ) );
	return $minutes;
}

/**
 * Body classes that let the design system target each template.
 */
function lumina_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'lumina-front';
	}
	if ( is_singular() ) {
		$classes[] = 'lumina-singular';
	}
	if ( is_home() || is_archive() ) {
		$classes[] = 'lumina-archive';
	}
	return $classes;
}
add_filter( 'body_class', 'lumina_body_classes' );
