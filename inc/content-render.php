<?php
/**
 * Render pipeline for stored content.
 *
 * Pages and articles are authored as complete HTML fragments and stored inside a
 * single wp:html block. WordPress's automatic paragraph filter (wpautop) reformats
 * loose HTML and would insert stray <p> and <br> tags into that markup, so it is
 * switched off for anything the content installer manages. Anything a human writes
 * in the editor keeps the normal behaviour.
 *
 * @package Lumina_Dental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Is the item being rendered managed by the theme's content installer?
 */
function lumina_is_managed_post( $post_id = null ) {
	if ( ! $post_id ) {
		return false;
	}
	return (bool) get_post_meta( $post_id, '_lumina_managed', true );
}

/**
 * Runs before wpautop (priority 10) and removes it for managed content.
 */
function lumina_disable_autop_for_managed_content( $content ) {
	if ( ! is_singular() ) {
		return $content;
	}
	if ( ! lumina_is_managed_post( get_queried_object_id() ) ) {
		return $content;
	}

	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_content', 'shortcode_unautop' );

	return $content;
}
add_filter( 'the_content', 'lumina_disable_autop_for_managed_content', 9 );

/**
 * Keep the RSS feed readable: managed fragments are HTML, so strip them down.
 */
function lumina_feed_content( $content ) {
	if ( is_feed() ) {
		return wp_strip_all_tags( $content );
	}
	return $content;
}
add_filter( 'the_excerpt_rss', 'lumina_feed_content' );
add_filter( 'the_content_feed', 'lumina_feed_content' );

/**
 * Meta titles/descriptions for pages the installer creates are read from post meta;
 * expose them through the standard WordPress APIs as well so other plugins agree.
 */
function lumina_document_title_parts( $parts ) {
	if ( is_front_page() ) {
		$parts['title'] = 'Zero-Pain Cosmetic & Implant Dentistry in San Francisco';
		$parts['site']  = 'Lumina Dental Studio';
		$parts['tagline'] = '';
		return $parts;
	}
	if ( is_singular() ) {
		$custom = get_post_meta( get_queried_object_id(), '_lumina_meta_title', true );
		if ( $custom ) {
			$parts['title'] = $custom;
			$parts['site']  = '';
			$parts['tagline'] = '';
		}
	}
	return $parts;
}
add_filter( 'document_title_parts', 'lumina_document_title_parts' );

/**
 * When a managed page is edited in the block editor, keep the single wp:html wrapper
 * so the fragment is not re-parsed into blocks on save.
 */
function lumina_kses_allow_fragment_markup( $allowed, $context ) {
	if ( 'post' === $context ) {
		$allowed['button'] = array(
			'class'       => true,
			'type'        => true,
			'onclick'     => true,
			'aria-hidden' => true,
			'aria-expanded' => true,
			'aria-controls' => true,
			'aria-label'  => true,
			'id'          => true,
		);
		$allowed['span'] = array(
			'class'       => true,
			'aria-hidden' => true,
			'id'          => true,
		);
		$allowed['section'] = array(
			'class' => true,
			'id'    => true,
		);
		$allowed['nav'] = array(
			'class'      => true,
			'aria-label' => true,
		);
		$allowed['input'] = array(
			'class' => true,
			'type'  => true,
			'name'  => true,
			'id'    => true,
			'value' => true,
			'placeholder' => true,
			'required' => true,
			'checked'  => true,
			'rows'     => true,
		);
		$allowed['select'] = array( 'class' => true, 'name' => true, 'id' => true );
		$allowed['option'] = array( 'value' => true );
		$allowed['textarea'] = array( 'class' => true, 'name' => true, 'id' => true, 'rows' => true, 'placeholder' => true );
		$allowed['time'] = array( 'datetime' => true );
		$allowed['table'] = array( 'class' => true );
		$allowed['thead'] = array( 'class' => true );
		$allowed['tbody'] = array( 'class' => true );
		$allowed['tr'] = array( 'class' => true );
		$allowed['th'] = array( 'class' => true, 'scope' => true, 'colspan' => true );
		$allowed['td'] = array( 'class' => true, 'colspan' => true );
		$allowed['blockquote'] = array( 'class' => true, 'cite' => true );
		$allowed['cite'] = array( 'class' => true );
		$allowed['figure'] = array( 'class' => true );
		$allowed['figcaption'] = array( 'class' => true );
		$allowed['svg'] = array( 'class' => true, 'viewbox' => true, 'xmlns' => true, 'aria-hidden' => true, 'fill' => true, 'width' => true, 'height' => true );
		$allowed['path'] = array( 'd' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true );
	}
	return $allowed;
}
add_filter( 'wp_kses_allowed_html', 'lumina_kses_allow_fragment_markup', 10, 2 );

/**
 * Allow <sup> and citation links through in post content.
 */
function lumina_allow_sup_in_content() {
	global $allowedposttags;
	if ( is_array( $allowedposttags ) ) {
		$allowedposttags['sup'] = array( 'class' => true );
		$allowedposttags['sub'] = array( 'class' => true );
	}
}
add_action( 'init', 'lumina_allow_sup_in_content' );
