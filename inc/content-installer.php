<?php
/**
 * Content installer.
 *
 * The theme ships its pages and articles as HTML fragments in /content so the
 * markup is version controlled and Tailwind can scan it at build time. This
 * installer turns those fragments into real WordPress pages and posts,
 * idempotently, and runs itself once per content version.
 *
 * @package Lumina_Dental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Read and decode the content manifest.
 */
function lumina_content_manifest() {
	static $manifest = null;
	if ( null !== $manifest ) {
		return $manifest;
	}
	$file = get_template_directory() . '/content/site.json';
	if ( ! file_exists( $file ) ) {
		$manifest = array( 'pages' => array(), 'posts' => array() );
		return $manifest;
	}
	$decoded  = json_decode( file_get_contents( $file ), true );
	$manifest = is_array( $decoded ) ? $decoded : array( 'pages' => array(), 'posts' => array() );
	return $manifest;
}

/**
 * Read a content fragment. Returns '' when the file is missing.
 */
function lumina_content_fragment( $folder, $slug ) {
	$slug = sanitize_file_name( $slug );
	$file = get_template_directory() . '/content/' . $folder . '/' . $slug . '.html';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	return (string) file_get_contents( $file );
}

/**
 * Pull question/answer pairs out of the accordion markup so the FAQPage schema
 * always matches what a visitor can actually read on the page.
 */
function lumina_extract_faq( $html ) {
	$pairs = array();
	if ( ! $html ) {
		return $pairs;
	}
	$pattern = '/<button[^>]*onclick="toggleFaq\(this\)"[^>]*>\s*<span>(.*?)<\/span>.*?<div class="faq-content[^"]*">(.*?)<\/div>/is';
	if ( preg_match_all( $pattern, $html, $m, PREG_SET_ORDER ) ) {
		foreach ( $m as $match ) {
			$q = trim( wp_strip_all_tags( $match[1] ) );
			$a = trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( $match[2] ) ) );
			if ( $q && $a ) {
				$pairs[] = array( 'q' => $q, 'a' => $a );
			}
		}
	}
	return $pairs;
}

/**
 * Wrap a raw fragment in a single HTML block so the block editor leaves it alone.
 */
function lumina_wrap_block( $html ) {
	return "<!-- wp:html -->\n" . $html . "\n<!-- /wp:html -->";
}

/**
 * Find an existing item by slug, whatever its status.
 */
function lumina_find_by_slug( $slug, $type ) {
	$found = get_posts( array(
		'name'           => $slug,
		'post_type'      => $type,
		'post_status'    => array( 'publish', 'draft', 'pending', 'private', 'trash' ),
		'posts_per_page' => 1,
		'fields'         => 'ids',
	) );
	return $found ? (int) $found[0] : 0;
}

/**
 * Create or update one page.
 */
function lumina_install_page( $spec, $log ) {
	$slug    = sanitize_title( $spec['slug'] );
	$content = lumina_content_fragment( 'pages', $slug );
	if ( '' === $content ) {
		$log[] = 'missing fragment: pages/' . $slug . '.html';
		return $log;
	}

	$parent_id = 0;
	if ( ! empty( $spec['parent'] ) ) {
		$parent = lumina_find_by_slug( sanitize_title( $spec['parent'] ), 'page' );
		$parent_id = $parent;
	}

	$existing = lumina_find_by_slug( $slug, 'page' );
	$args     = array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'post_title'   => $spec['title'],
		'post_name'    => $slug,
		'post_content' => lumina_wrap_block( $content ),
		'post_parent'  => $parent_id,
	);
	if ( $existing ) {
		$args['ID'] = $existing;
	}
	$id = wp_insert_post( $args, true );
	if ( is_wp_error( $id ) ) {
		$log[] = 'page failed: ' . $slug . ' - ' . $id->get_error_message();
		return $log;
	}

	update_post_meta( $id, '_lumina_meta_title', isset( $spec['meta_title'] ) ? $spec['meta_title'] : '' );
	update_post_meta( $id, '_lumina_meta_description', isset( $spec['meta_description'] ) ? $spec['meta_description'] : '' );
	update_post_meta( $id, '_lumina_managed', '1' );

	$faq = lumina_extract_faq( $content );
	if ( $faq ) {
		update_post_meta( $id, '_lumina_faq', wp_json_encode( $faq ) );
	} else {
		delete_post_meta( $id, '_lumina_faq' );
	}

	if ( ! empty( $spec['noindex'] ) ) {
		update_post_meta( $id, '_lumina_noindex', '1' );
	}

	$log[] = sprintf( 'page %-14s id=%-5d words=%-5d faq=%d', $slug, $id, str_word_count( wp_strip_all_tags( $content ) ), count( $faq ) );
	return $log;
}

/**
 * Create or update one article.
 */
function lumina_install_post( $spec, $log ) {
	$slug    = sanitize_title( $spec['slug'] );
	$content = lumina_content_fragment( 'posts', $slug );
	if ( '' === $content ) {
		$log[] = 'missing fragment: posts/' . $slug . '.html';
		return $log;
	}

	$existing = lumina_find_by_slug( $slug, 'post' );
	$args     = array(
		'post_type'     => 'post',
		'post_status'   => 'publish',
		'post_title'    => $spec['title'],
		'post_name'     => $slug,
		'post_content'  => lumina_wrap_block( $content ),
		'post_excerpt'  => isset( $spec['excerpt'] ) ? $spec['excerpt'] : '',
		'post_date'     => isset( $spec['date'] ) ? $spec['date'] : current_time( 'mysql' ),
		'post_date_gmt' => isset( $spec['date'] ) ? get_gmt_from_date( $spec['date'] ) : current_time( 'mysql', 1 ),
	);
	if ( $existing ) {
		$args['ID'] = $existing;
	}
	$id = wp_insert_post( $args, true );
	if ( is_wp_error( $id ) ) {
		$log[] = 'post failed: ' . $slug . ' - ' . $id->get_error_message();
		return $log;
	}

	if ( ! empty( $spec['category'] ) ) {
		wp_set_post_categories( $id, array( (int) lumina_term_id( $spec['category'], 'category' ) ) );
	}
	if ( ! empty( $spec['tags'] ) ) {
		$tag_ids = array();
		foreach ( $spec['tags'] as $tag ) {
			$tag_ids[] = lumina_term_id( $tag, 'post_tag' );
		}
		wp_set_post_terms( $id, $tag_ids, 'post_tag' );
	}

	update_post_meta( $id, '_lumina_meta_title', isset( $spec['meta_title'] ) ? $spec['meta_title'] : '' );
	update_post_meta( $id, '_lumina_meta_description', isset( $spec['meta_description'] ) ? $spec['meta_description'] : '' );
	update_post_meta( $id, '_lumina_managed', '1' );

	$faq = lumina_extract_faq( $content );
	if ( $faq ) {
		update_post_meta( $id, '_lumina_faq', wp_json_encode( $faq ) );
	}

	$log[] = sprintf( 'post %-38s id=%-5d words=%-5d faq=%d', $slug, $id, str_word_count( wp_strip_all_tags( $content ) ), count( $faq ) );
	return $log;
}

/**
 * Term id by name, created on demand.
 */
function lumina_term_id( $name, $taxonomy ) {
	$term = term_exists( $name, $taxonomy );
	if ( ! $term ) {
		$term = wp_insert_term( $name, $taxonomy );
	}
	if ( is_wp_error( $term ) ) {
		return 0;
	}
	return (int) ( is_array( $term ) ? $term['term_id'] : $term );
}

/**
 * The whole install, safe to re-run.
 */
function lumina_run_installer() {
	$manifest = lumina_content_manifest();
	$log      = array();

	/* Site settings that a fresh WordPress install gets wrong for this site. */
	update_option( 'blog_public', 1 );                       // never leave "discourage search engines" on.
	update_option( 'blogdescription', 'Advanced Aesthetics & Implant Center — San Francisco' );
	update_option( 'posts_per_page', 9 );
	update_option( 'timezone_string', 'America/Los_Angeles' );
	update_option( 'date_format', 'F j, Y' );
	update_option( 'start_of_week', 1 );
	if ( ! get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}

	/* Remove the stock "Hello world!" post and sample page so the blog starts clean. */
	foreach ( get_posts( array( 'post_type' => array( 'post', 'page' ), 'post_status' => 'any', 'numberposts' => -1 ) ) as $stale ) {
		$is_stock_post = ( 'post' === $stale->post_type && 'hello-world' === $stale->post_name );
		$is_stock_page = ( 'page' === $stale->post_type && 'sample-page' === $stale->post_name );
		if ( $is_stock_post || $is_stock_page ) {
			wp_delete_post( $stale->ID, true );
			$log[] = 'removed stock content: ' . $stale->post_name;
		}
	}
	$stock_comment = get_comment( 1 );
	if ( $stock_comment && false !== strpos( $stock_comment->comment_author_email, 'example.com' ) ) {
		wp_delete_comment( $stock_comment->comment_ID, true );
		$log[] = 'removed stock comment';
	}

	/* Hostinger's edge serves a robots.txt that disallows Googlebot on these temporary
	   domains, and a physical file did not exist here to take precedence. Write one so
	   the correct crawl policy always wins, and repair it if it goes stale. */
	$robots_path  = ABSPATH . 'robots.txt';
	$robots_want  = lumina_robots_text();
	$robots_have  = file_exists( $robots_path ) ? (string) @file_get_contents( $robots_path ) : '';
	if ( false === strpos( $robots_have, 'Sitemap:' ) ) {
		$written = @file_put_contents( $robots_path, $robots_want );
		$log[]   = ( false !== $written )
			? 'wrote robots.txt (' . strlen( $robots_want ) . ' bytes)'
			: 'WARNING: could not write robots.txt - the host default may still disallow crawlers';
	} else {
		$log[] = 'robots.txt already correct, left alone';
	}

	/* Home + blog containers. front-page.php renders the design for the front page. */
	$home_id = lumina_find_by_slug( 'home', 'page' );
	if ( ! $home_id ) {
		$home_id = wp_insert_post( array(
			'post_type'   => 'page',
			'post_status' => 'publish',
			'post_title'  => 'Home',
			'post_name'   => 'home',
			'post_content' => '',
		) );
	}
	$blog_id = lumina_find_by_slug( 'blog', 'page' );
	if ( ! $blog_id ) {
		$blog_id = wp_insert_post( array(
			'post_type'   => 'page',
			'post_status' => 'publish',
			'post_title'  => 'Dental Health Blog',
			'post_name'   => 'blog',
			'post_content' => '',
		) );
	}
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $home_id );
	update_option( 'page_for_posts', $blog_id );
	$log[] = 'front page id=' . $home_id . ', posts page id=' . $blog_id;

	/* Pages first (parents before children). */
	$pages = isset( $manifest['pages'] ) ? $manifest['pages'] : array();
	usort( $pages, function ( $a, $b ) {
		$a_parent = empty( $a['parent'] ) ? 0 : 1;
		$b_parent = empty( $b['parent'] ) ? 0 : 1;
		return $a_parent - $b_parent;
	} );
	foreach ( $pages as $spec ) {
		$log = lumina_install_page( $spec, $log );
	}

	/* Articles. */
	foreach ( ( isset( $manifest['posts'] ) ? $manifest['posts'] : array() ) as $spec ) {
		$log = lumina_install_post( $spec, $log );
	}

	/* Clean up any stale generated image/text placeholders left by an earlier run. */
	delete_option( 'lumina_install_errors' );
	update_option( 'lumina_content_version', LUMINA_CONTENT_VERSION );
	update_option( 'lumina_install_log', implode( "\n", $log ) );

	flush_rewrite_rules();

	return $log;
}

/**
 * Run once per content version, on the first request after a deploy.
 */
function lumina_maybe_install_content() {
	if ( get_option( 'lumina_content_version' ) === LUMINA_CONTENT_VERSION ) {
		return;
	}
	if ( get_transient( 'lumina_install_lock' ) ) {
		return;
	}
	set_transient( 'lumina_install_lock', 1, 300 );
	lumina_run_installer();
	delete_transient( 'lumina_install_lock' );
}
add_action( 'init', 'lumina_maybe_install_content', 20 );

/**
 * Also install immediately on theme activation.
 */
function lumina_after_switch() {
	lumina_run_installer();
}
add_action( 'after_switch_theme', 'lumina_after_switch' );

/**
 * Tools -> Lumina site setup: shows the install log and allows a manual re-run,
 * which is how you re-sync the site after editing content/*.html and re-deploying.
 */
function lumina_setup_menu() {
	add_management_page(
		__( 'Lumina site setup', 'lumina-dental' ),
		__( 'Lumina site setup', 'lumina-dental' ),
		'manage_options',
		'lumina-setup',
		'lumina_setup_page'
	);
}
add_action( 'admin_menu', 'lumina_setup_menu' );

function lumina_setup_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$rerun = isset( $_POST['lumina_rerun'] ) && check_admin_referer( 'lumina_rerun' );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Lumina site setup', 'lumina-dental' ); ?></h1>
		<p><?php esc_html_e( 'Pages and articles are generated from the theme\'s /content folder. Re-sync after changing those files.', 'lumina-dental' ); ?></p>
		<p>
			<strong><?php esc_html_e( 'Content version:', 'lumina-dental' ); ?></strong>
			<?php echo esc_html( get_option( 'lumina_content_version', 'not installed' ) ); ?>
			&nbsp;|&nbsp;
			<strong><?php esc_html_e( 'Theme version:', 'lumina-dental' ); ?></strong>
			<?php echo esc_html( LUMINA_CONTENT_VERSION ); ?>
		</p>
		<?php if ( $rerun ) : ?>
			<?php
				delete_option( 'lumina_content_version' );
				$log = lumina_run_installer();
			?>
			<div class="notice notice-success"><p><?php esc_html_e( 'Content re-synced.', 'lumina-dental' ); ?></p></div>
			<pre style="background:#fff;border:1px solid #ccd0d4;padding:12px;max-height:420px;overflow:auto;"><?php echo esc_html( implode( "\n", $log ) ); ?></pre>
		<?php endif; ?>
		<form method="post">
			<?php wp_nonce_field( 'lumina_rerun' ); ?>
			<p><button class="button button-primary" type="submit" name="lumina_rerun" value="1"><?php esc_html_e( 'Re-sync pages and articles', 'lumina-dental' ); ?></button></p>
		</form>
		<h2><?php esc_html_e( 'Last install log', 'lumina-dental' ); ?></h2>
		<pre style="background:#fff;border:1px solid #ccd0d4;padding:12px;max-height:420px;overflow:auto;"><?php echo esc_html( get_option( 'lumina_install_log', '' ) ); ?></pre>
	</div>
	<?php
}
