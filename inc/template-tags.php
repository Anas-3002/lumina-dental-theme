<?php
/**
 * Template tags and the site's single source of truth for navigation and NAP data.
 *
 * @package Lumina_Dental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Business details. Every template, schema block and footer reads from here so the
 * name/address/phone can never drift between pages.
 */
function lumina_site_facts() {
	return array(
		'name'        => 'Lumina Dental Studio',
		'legal_name'  => 'Lumina Dental Studio',
		'tagline'     => 'Advanced Aesthetics & Implant Center',
		'street'      => '450 Sutter St, Suite 1800',
		'city'        => 'San Francisco',
		'region'      => 'CA',
		'region_name' => 'California',
		'postal'      => '94108',
		'country'     => 'US',
		'lat'         => 37.789390,
		'lng'         => -122.407940,
		'phone'       => '+1-800-586-4621',
		'phone_disp'  => '(800) 586-4621',
		'email'       => 'hello@luminadentalstudio.com',
		'price_range' => '$$',
		'rating'      => '4.9',
		'reviews'     => '1280',
		'hours'       => array(
			array( 'days' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ), 'open' => '07:00', 'close' => '19:00' ),
			array( 'days' => array( 'Saturday' ), 'open' => '08:00', 'close' => '15:00' ),
		),
		'areas'       => array( 'Downtown Financial District', 'SoMa Innovation Corridor', 'Metro Center', 'West End Marina' ),
		'plans'       => array( 'Delta Dental Premier', 'MetLife PDP', 'Cigna DPPO', 'Aetna PPO', 'CareCredit 0% APR' ),
	);
}

/**
 * Canonical internal routes. Content writers use these same paths, so a 404 here means
 * a genuine missing page, not a typo in a template.
 */
function lumina_routes() {
	return array(
		'home'          => '/',
		'why'           => '/why-lumina/',
		'services'      => '/services/',
		'implants'      => '/services/dental-implants/',
		'veneers'       => '/services/porcelain-veneers/',
		'invisalign'    => '/services/invisalign/',
		'whitening'     => '/services/teeth-whitening/',
		'emergency'     => '/services/emergency-dentistry/',
		'sedation'      => '/services/sedation-dentistry/',
		'crowns'        => '/services/same-day-crowns/',
		'preventive'    => '/services/preventive-care/',
		'reviews'       => '/reviews/',
		'pricing'       => '/pricing/',
		'financing'     => '/financing/',
		'new_patients'  => '/new-patients/',
		'team'          => '/team/',
		'book'          => '/book/',
		'faq'           => '/faq/',
		'contact'       => '/contact/',
		'blog'          => '/blog/',
		'thank_you'     => '/thank-you/',
		'privacy'       => '/privacy-policy/',
		'hipaa'         => '/hipaa-notice/',
		'accessibility' => '/accessibility/',
		'terms'         => '/terms/',
	);
}

/**
 * Route helper.
 */
function lumina_url( $key ) {
	$routes = lumina_routes();
	if ( 'phone' === $key ) {
		return 'tel:+18005864621';
	}
	if ( 'email' === $key ) {
		return 'mailto:hello@luminadentalstudio.com';
	}
	$path = isset( $routes[ $key ] ) ? $routes[ $key ] : '/';
	return home_url( $path );
}

/**
 * The main navigation. Rendered manually (not via wp_nav_menu) so the dropdown,
 * active states and the design system's exact markup stay under theme control.
 */
function lumina_main_nav() {
	$items = array(
		array( 'label' => 'Why Lumina', 'key' => 'why' ),
		array(
			'label'    => 'Treatments',
			'key'      => 'services',
			'children' => array(
				array( 'label' => 'All treatments', 'key' => 'services', 'desc' => 'Every service we offer' ),
				array( 'label' => 'Dental implants', 'key' => 'implants', 'desc' => 'Single tooth to All-on-4' ),
				array( 'label' => 'Porcelain veneers', 'key' => 'veneers', 'desc' => 'Smile design in two visits' ),
				array( 'label' => 'Invisalign', 'key' => 'invisalign', 'desc' => 'Clear aligner therapy' ),
				array( 'label' => 'Laser whitening', 'key' => 'whitening', 'desc' => 'In-office and take-home' ),
				array( 'label' => 'Emergency dentistry', 'key' => 'emergency', 'desc' => 'Same-day relief' ),
				array( 'label' => 'Sedation dentistry', 'key' => 'sedation', 'desc' => 'Anxiety-free options' ),
				array( 'label' => 'Same-day crowns', 'key' => 'crowns', 'desc' => 'Milled in one visit' ),
				array( 'label' => 'Preventive care', 'key' => 'preventive', 'desc' => 'Exams and hygiene' ),
			),
		),
		array( 'label' => 'Pricing', 'key' => 'pricing' ),
		array( 'label' => 'Patient stories', 'key' => 'reviews' ),
		array( 'label' => 'New patients', 'key' => 'new_patients' ),
		array( 'label' => 'Blog', 'key' => 'blog' ),
		array( 'label' => 'FAQs', 'key' => 'faq' ),
	);

	$current = trailingslashit( strtok( $_SERVER['REQUEST_URI'], '?' ) );

	echo '<nav class="hidden xl:flex items-center gap-6" aria-label="' . esc_attr__( 'Primary', 'lumina-dental' ) . '">';

	foreach ( $items as $item ) {
		$href = lumina_url( $item['key'] );
		$path = trailingslashit( wp_parse_url( $href, PHP_URL_PATH ) );
		$is_current = ( $current === $path );

		if ( empty( $item['children'] ) ) {
			printf(
				'<a class="%1$s font-title-md text-title-md transition-colors py-1 %2$s" href="%3$s">%4$s</a>',
				$is_current ? 'text-primary border-b-2 border-primary' : 'text-on-surface-variant hover:text-on-surface',
				'',
				esc_url( $href ),
				esc_html( $item['label'] )
			);
			continue;
		}

		$child_current = false;
		foreach ( $item['children'] as $child ) {
			if ( trailingslashit( wp_parse_url( lumina_url( $child['key'] ), PHP_URL_PATH ) ) === $current ) {
				$child_current = true;
			}
		}

		echo '<div class="relative group">';
		printf(
			'<a class="%1$s font-title-md text-title-md transition-colors py-1 flex items-center gap-1" href="%2$s" aria-haspopup="true" aria-expanded="false">%3$s<span class="material-symbols-outlined text-base" aria-hidden="true">expand_more</span></a>',
			( $child_current || $is_current ) ? 'text-primary border-b-2 border-primary' : 'text-on-surface-variant hover:text-on-surface',
			esc_url( $href ),
			esc_html( $item['label'] )
		);
		echo '<div class="absolute left-0 top-full pt-3 hidden group-hover:block group-focus-within:block z-50">';
		echo '<div class="w-[26rem] bg-surface-container-lowest rounded-2xl shadow-[0_20px_48px_rgba(0,32,29,0.2)] border border-surface-container p-3 grid grid-cols-1 gap-1">';
		foreach ( $item['children'] as $child ) {
			printf(
				'<a class="rounded-xl px-4 py-3 hover:bg-surface-container-low transition-colors block" href="%1$s"><span class="block font-title-md text-title-md text-on-surface">%2$s</span><span class="block font-body-sm text-body-sm text-on-surface-variant">%3$s</span></a>',
				esc_url( lumina_url( $child['key'] ) ),
				esc_html( $child['label'] ),
				esc_html( $child['desc'] )
			);
		}
		echo '</div></div></div>';
	}

	echo '</nav>';
}

/**
 * Everything a visitor might want, for the mobile drawer and the 404 page.
 */
function lumina_all_links() {
	return array(
		'Why Lumina'         => lumina_url( 'why' ),
		'All treatments'     => lumina_url( 'services' ),
		'Dental implants'    => lumina_url( 'implants' ),
		'Porcelain veneers'  => lumina_url( 'veneers' ),
		'Invisalign'         => lumina_url( 'invisalign' ),
		'Laser whitening'    => lumina_url( 'whitening' ),
		'Emergency dentistry' => lumina_url( 'emergency' ),
		'Sedation dentistry' => lumina_url( 'sedation' ),
		'Same-day crowns'    => lumina_url( 'crowns' ),
		'Preventive care'    => lumina_url( 'preventive' ),
		'Transparent pricing' => lumina_url( 'pricing' ),
		'Insurance & financing' => lumina_url( 'financing' ),
		'Patient stories'    => lumina_url( 'reviews' ),
		'New patients'       => lumina_url( 'new_patients' ),
		'Meet the team'      => lumina_url( 'team' ),
		'Book an appointment' => lumina_url( 'book' ),
		'FAQs'               => lumina_url( 'faq' ),
		'Blog'               => lumina_url( 'blog' ),
		'Contact'            => lumina_url( 'contact' ),
	);
}

/**
 * Breadcrumb trail as data, so the template and the JSON-LD graph agree.
 */
function lumina_breadcrumb_trail() {
	$trail = array( array( 'label' => 'Home', 'url' => home_url( '/' ) ) );

	if ( is_front_page() ) {
		return array();
	}

	if ( is_singular( 'post' ) ) {
		$blog_id = (int) get_option( 'page_for_posts' );
		$trail[] = array( 'label' => 'Blog', 'url' => $blog_id ? get_permalink( $blog_id ) : home_url( '/blog/' ) );
		$trail[] = array( 'label' => get_the_title(), 'url' => get_permalink() );
		return $trail;
	}

	if ( is_page() ) {
		$ancestors = array_reverse( get_post_ancestors( get_the_ID() ) );
		foreach ( $ancestors as $ancestor ) {
			$trail[] = array( 'label' => get_the_title( $ancestor ), 'url' => get_permalink( $ancestor ) );
		}
		$trail[] = array( 'label' => get_the_title(), 'url' => get_permalink() );
		return $trail;
	}

	if ( is_home() ) {
		$trail[] = array( 'label' => 'Blog', 'url' => home_url( '/blog/' ) );
		return $trail;
	}

	if ( is_search() ) {
		$trail[] = array( 'label' => 'Search results', 'url' => get_search_link() );
		return $trail;
	}

	if ( is_404() ) {
		$trail[] = array( 'label' => 'Page not found', 'url' => home_url( '/404/' ) );
		return $trail;
	}

	if ( is_archive() ) {
		$trail[] = array( 'label' => get_the_archive_title(), 'url' => '' );
	}

	return $trail;
}

/**
 * Rendered breadcrumb nav (matches the trail used by schema.php).
 */
function lumina_breadcrumbs( $class = '' ) {
	$trail = lumina_breadcrumb_trail();
	if ( count( $trail ) < 2 ) {
		return;
	}

	echo '<nav class="' . esc_attr( $class ) . '" aria-label="' . esc_attr__( 'Breadcrumb', 'lumina-dental' ) . '">';
	$last = count( $trail ) - 1;
	foreach ( $trail as $i => $crumb ) {
		if ( $i === $last ) {
			printf( '<span aria-current="page">%s</span>', esc_html( $crumb['label'] ) );
		} else {
			printf( '<a class="hover:text-primary-fixed transition-colors" href="%s">%s</a><span class="mx-2">/</span>', esc_url( $crumb['url'] ), esc_html( $crumb['label'] ) );
		}
	}
	echo '</nav>';
}

/**
 * Reusable closing call-to-action band.
 */
function lumina_cta_band( $heading = 'Ready for a calmer dental visit?', $copy = 'Book online in under a minute, or call our 24/7 hotline. New patients receive a $150 credit toward their first visit.' ) {
	?>
<section class="w-full py-16 bg-on-secondary-fixed text-on-secondary">
	<div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col md:flex-row items-center justify-between gap-8">
		<div class="max-w-2xl space-y-3">
			<h2 class="font-headline-md text-headline-md font-bold"><?php echo esc_html( $heading ); ?></h2>
			<p class="font-body-md text-body-md text-secondary-fixed-dim"><?php echo esc_html( $copy ); ?></p>
		</div>
		<div class="flex flex-wrap gap-3">
			<a class="bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md px-6 py-3 rounded-full transition-all shadow-[0_12px_28px_rgba(0,104,95,0.28)]" href="<?php echo esc_url( lumina_url( 'book' ) ); ?>">Book an appointment</a>
			<a class="bg-on-secondary-fixed-variant text-on-secondary font-title-md text-title-md px-6 py-3 rounded-full transition-all" href="<?php echo esc_url( lumina_url( 'pricing' ) ); ?>">See transparent pricing</a>
		</div>
	</div>
</section>
	<?php
}

/**
 * Search form used by the header drawer, the blog and the 404 page.
 */
function lumina_search_form( $variant = 'default' ) {
	$classes = 'lumina-search-form';
	?>
<form role="search" method="get" class="<?php echo esc_attr( $classes ); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="lumina-s-<?php echo esc_attr( $variant ); ?>"><?php esc_html_e( 'Search this site', 'lumina-dental' ); ?></label>
	<div class="relative">
		<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-lg" aria-hidden="true">search</span>
		<input id="lumina-s-<?php echo esc_attr( $variant ); ?>" class="w-full bg-surface-container-low pl-12 pr-4 py-3 rounded-full font-body-md text-body-md text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#00685f] transition-all" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search treatments, costs, articles&hellip;', 'lumina-dental' ); ?>">
	</div>
</form>
	<?php
}
