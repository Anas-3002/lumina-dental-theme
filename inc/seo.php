<?php
/**
 * SEO, GEO and AIO layer: titles, meta, canonicals, social cards, robots,
 * sitemap hygiene and an /llms.txt endpoint for answer engines.
 *
 * @package Lumina_Dental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Titles. Pages and posts can override with the _lumina_meta_title meta key,
 * which the content installer fills from content/site.json.
 */
function lumina_filter_document_title( $title ) {
	if ( is_front_page() ) {
		return 'Lumina Dental Studio | Zero-Pain Cosmetic & Implant Dentistry in San Francisco';
	}

	if ( is_singular() ) {
		$custom = get_post_meta( get_queried_object_id(), '_lumina_meta_title', true );
		if ( $custom ) {
			return $custom;
		}
		return get_the_title() . ' | Lumina Dental Studio';
	}

	if ( is_home() ) {
		return 'Dental Health Blog | Lumina Dental Studio, San Francisco';
	}

	if ( is_search() ) {
		return sprintf( 'Search results for "%s" | Lumina Dental Studio', get_search_query() );
	}

	if ( is_404() ) {
		return 'Page not found | Lumina Dental Studio';
	}

	if ( is_archive() ) {
		return get_the_archive_title() . ' | Lumina Dental Studio';
	}

	return $title;
}
add_filter( 'pre_get_document_title', 'lumina_filter_document_title' );

/**
 * Description for the current view.
 */
function lumina_meta_description() {
	$fallback = 'Lumina Dental Studio in San Francisco delivers zero-pain cosmetic, implant and preventive dentistry with 3D-guided treatment planning, same-day crowns and transparent pricing.';

	if ( is_front_page() ) {
		return $fallback;
	}

	if ( is_singular() ) {
		$id     = get_queried_object_id();
		$custom = get_post_meta( $id, '_lumina_meta_description', true );
		if ( $custom ) {
			return $custom;
		}
		$post = get_post( $id );
		$text = $post->post_excerpt ? $post->post_excerpt : $post->post_content;
		$text = wp_strip_all_tags( strip_shortcodes( $text ) );
		$text = preg_replace( '/\s+/', ' ', $text );
		return trim( wp_html_excerpt( $text, 158, '…' ) );
	}

	if ( is_home() ) {
		return 'Evidence-based dental health articles from the clinical team at Lumina Dental Studio in San Francisco: costs, treatments, prevention and what the research actually shows.';
	}

	if ( is_search() ) {
		return sprintf( 'Pages and articles on lumina.com matching "%s".', get_search_query() );
	}

	if ( is_404() ) {
		return 'The page you asked for does not exist. Browse treatments, pricing, patient stories or book an appointment at Lumina Dental Studio.';
	}

	return $fallback;
}

/**
 * Pages that should never be indexed: the post-submission thank-you screen.
 */
function lumina_is_noindex() {
	if ( is_search() || is_404() ) {
		return true;
	}
	if ( is_page( 'thank-you' ) ) {
		return true;
	}
	return false;
}

/**
 * Everything in <head>.
 */
function lumina_head_meta() {
	$facts = lumina_site_facts();
	$desc  = lumina_meta_description();
	$img   = get_template_directory_uri() . '/assets/img/og-default.png';

	if ( is_singular() ) {
		$canonical = get_permalink();
	} elseif ( is_home() ) {
		$blog_id   = (int) get_option( 'page_for_posts' );
		$canonical = $blog_id ? get_permalink( $blog_id ) : home_url( '/blog/' );
	} else {
		$canonical = home_url( add_query_arg( array(), $GLOBALS['wp']->request ) );
	}

	printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
	printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $canonical ) );

	$robots = lumina_is_noindex()
		? 'noindex, follow, max-image-preview:large'
		: 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
	printf( '<meta name="robots" content="%s">' . "\n", esc_attr( $robots ) );

	/* Local / geographic signals. */
	printf( '<meta name="geo.region" content="US-CA">' . "\n" );
	printf( '<meta name="geo.placename" content="%s">' . "\n", esc_attr( $facts['city'] . ', ' . $facts['region_name'] ) );
	printf( '<meta name="geo.position" content="%s;%s">' . "\n", esc_attr( $facts['lat'] ), esc_attr( $facts['lng'] ) );
	printf( '<meta name="ICBM" content="%s, %s">' . "\n", esc_attr( $facts['lat'] ), esc_attr( $facts['lng'] ) );

	/* Open Graph. */
	$og_type = is_singular( 'post' ) ? 'article' : 'website';
	printf( '<meta property="og:type" content="%s">' . "\n", esc_attr( $og_type ) );
	printf( '<meta property="og:locale" content="en_US">' . "\n" );
	printf( '<meta property="og:site_name" content="%s">' . "\n", esc_attr( $facts['name'] ) );
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( wp_get_document_title() ) );
	printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $desc ) );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $canonical ) );
	printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $img ) );
	printf( '<meta property="og:image:width" content="1200">' . "\n" );
	printf( '<meta property="og:image:height" content="630">' . "\n" );
	if ( is_singular() ) {
		printf( '<meta property="article:published_time" content="%s">' . "\n", esc_attr( get_the_date( 'c' ) ) );
		printf( '<meta property="article:modified_time" content="%s">' . "\n", esc_attr( get_the_modified_date( 'c' ) ) );
	}

	/* Twitter / X. */
	printf( '<meta name="twitter:card" content="summary_large_image">' . "\n" );
	printf( '<meta name="twitter:title" content="%s">' . "\n", esc_attr( wp_get_document_title() ) );
	printf( '<meta name="twitter:description" content="%s">' . "\n", esc_attr( $desc ) );
	printf( '<meta name="twitter:image" content="%s">' . "\n", esc_url( $img ) );

	/* RSS + sitemap discovery. */
	printf( '<link rel="sitemap" type="application/xml" href="%s">' . "\n", esc_url( home_url( '/wp-sitemap.xml' ) ) );
	printf( '<link rel="alternate" type="application/rss+xml" title="%s" href="%s">' . "\n", esc_attr( $facts['name'] . ' blog feed' ), esc_url( get_feed_link() ) );
}
add_action( 'wp_head', 'lumina_head_meta', 1 );

/**
 * Drop the redundant core canonical output, we print our own.
 */
remove_action( 'wp_head', 'rel_canonical' );

/**
 * robots.txt: keep the sitemap discoverable and explicitly welcome the answer engines.
 * Blocking them is the single most common way a site becomes invisible to AI search.
 *
 * The text is built by lumina_robots_text() so the installer can also repair a stale
 * physical robots.txt file that would otherwise shadow this dynamic version.
 */
function lumina_robots_text() {
	$lines = array(
		'# Lumina Dental Studio',
		'User-agent: *',
		'Allow: /',
		'Disallow: /wp-admin/',
		'Allow: /wp-admin/admin-ajax.php',
		'Disallow: /thank-you/',
		'Disallow: /?s=',
		'',
		'# Answer engines / AI crawlers are explicitly welcome.',
		'User-agent: GPTBot',
		'Allow: /',
		'User-agent: OAI-SearchBot',
		'Allow: /',
		'User-agent: ChatGPT-User',
		'Allow: /',
		'User-agent: PerplexityBot',
		'Allow: /',
		'User-agent: ClaudeBot',
		'Allow: /',
		'User-agent: Google-Extended',
		'Allow: /',
		'User-agent: Applebot-Extended',
		'Allow: /',
		'User-agent: CCBot',
		'Allow: /',
		'',
		'Sitemap: ' . home_url( '/wp-sitemap.xml' ),
		'Sitemap: ' . home_url( '/llms.txt' ),
	);

	return implode( "\n", $lines ) . "\n";
}

function lumina_robots_txt( $output, $public ) {
	return lumina_robots_text();
}
add_filter( 'robots_txt', 'lumina_robots_txt', 10, 2 );

/**
 * Hardening: this site does not use XML-RPC, and leaving it open is a common
 * brute-force and pingback amplification vector.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Keep the conversion-only thank-you page out of the XML sitemap.
 */
function lumina_sitemap_exclude( $args, $post_type ) {
	if ( 'page' === $post_type ) {
		$excluded = get_posts( array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'meta_key'       => '_lumina_noindex',
			'meta_value'     => '1',
		) );
		if ( $excluded ) {
			$args['post__not_in'] = array_merge( isset( $args['post__not_in'] ) ? $args['post__not_in'] : array(), $excluded );
		}
	}
	return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'lumina_sitemap_exclude', 10, 2 );

/**
 * /llms.txt - a curated, machine-readable map of the site for LLM crawlers that
 * honour the emerging llms.txt convention.
 */
function lumina_llms_rewrite() {
	add_rewrite_rule( '^llms\.txt$', 'index.php?lumina_llms=1', 'top' );
}
add_action( 'init', 'lumina_llms_rewrite' );

function lumina_llms_query_vars( $vars ) {
	$vars[] = 'lumina_llms';
	return $vars;
}
add_filter( 'query_vars', 'lumina_llms_query_vars' );

function lumina_render_llms_txt() {
	if ( ! get_query_var( 'lumina_llms' ) ) {
		return;
	}

	$facts = lumina_site_facts();
	header( 'Content-Type: text/plain; charset=utf-8' );

	$out   = array();
	$out[] = '# ' . $facts['name'];
	$out[] = '';
	$out[] = '> ' . $facts['tagline'] . ' in ' . $facts['city'] . ', ' . $facts['region'] . '. Zero-pain cosmetic, implant and preventive dentistry with 3D-guided treatment planning, same-day crowns, sedation options and transparent pricing.';
	$out[] = '';
	$out[] = 'Contact: ' . $facts['phone_disp'] . ' | ' . $facts['email'];
	$out[] = 'Address: ' . $facts['street'] . ', ' . $facts['city'] . ', ' . $facts['region'] . ' ' . $facts['postal'];
	$out[] = 'Hours: Mon-Fri 07:00-19:00, Sat 08:00-15:00';
	$out[] = 'Booking: ' . lumina_url( 'book' );
	$out[] = '';
	$out[] = '## Key pages';

	$pages = array(
		'why'          => 'Why choose Lumina: technology, sterilization, guarantees',
		'services'     => 'All treatments overview',
		'implants'     => 'Dental implants and All-on-4',
		'veneers'      => 'Porcelain veneers',
		'invisalign'   => 'Invisalign clear aligners',
		'whitening'    => 'Laser teeth whitening',
		'emergency'    => 'Emergency dentistry and same-day relief',
		'sedation'     => 'Sedation and anxiety-free dentistry',
		'crowns'       => 'Same-day CAD/CAM crowns',
		'preventive'   => 'Preventive care, exams and hygiene',
		'pricing'      => 'Transparent fee schedule',
		'financing'    => 'Insurance and financing options',
		'reviews'      => 'Patient transformations and reviews',
		'new_patients' => 'New patient information',
		'team'         => 'Meet the clinical team',
		'faq'          => 'Frequently asked questions',
		'contact'      => 'Contact, hours and directions',
		'blog'         => 'Dental health blog',
	);
	foreach ( $pages as $key => $desc ) {
		$out[] = '- [' . $desc . '](' . lumina_url( $key ) . ')';
	}

	$posts = get_posts( array( 'numberposts' => 20, 'post_status' => 'publish' ) );
	if ( $posts ) {
		$out[] = '';
		$out[] = '## Articles';
		foreach ( $posts as $post ) {
			$out[] = '- [' . get_the_title( $post ) . '](' . get_permalink( $post ) . '): ' . wp_html_excerpt( wp_strip_all_tags( $post->post_excerpt ? $post->post_excerpt : $post->post_content ), 140, '…' );
		}
	}

	$out[] = '';
	$out[] = '## Usage';
	$out[] = 'Content may be quoted with attribution to ' . $facts['name'] . ' (' . home_url( '/' ) . '). Clinical figures on this site are cited to their original sources; please carry those citations through.';
	$out[] = '';

	echo implode( "\n", $out ); // phpcs:ignore WordPress.Security.EscapeOutput
	exit;
}
add_action( 'template_redirect', 'lumina_render_llms_txt' );
