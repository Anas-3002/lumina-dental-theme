<?php
/**
 * Structured data. Every page emits one @graph so the entities are linked
 * (LocalBusiness <- WebSite <- WebPage <- Article/Service/FAQ) instead of
 * shipping disconnected blobs that answer engines have to guess about.
 *
 * @package Lumina_Dental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Absolute URL for a route key.
 */
function lumina_abs( $key ) {
	return lumina_url( $key );
}

/**
 * The Dentist organisation node.
 */
function lumina_schema_organization() {
	$f = lumina_site_facts();

	$node = array(
		'@type'             => array( 'Dentist', 'MedicalBusiness', 'LocalBusiness' ),
		'@id'               => home_url( '/#organization' ),
		'name'              => $f['name'],
		'alternateName'     => $f['tagline'],
		'url'               => home_url( '/' ),
		'description'       => 'Cosmetic, implant and preventive dental practice in San Francisco offering 3D CBCT-guided treatment planning, same-day crowns, sedation dentistry and transparent pricing.',
		'telephone'         => $f['phone'],
		'email'             => $f['email'],
		'priceRange'        => $f['price_range'],
		'currenciesAccepted' => 'USD',
		'paymentAccepted'   => 'Cash, Credit Card, Dental Insurance, CareCredit, HSA, FSA',
		'medicalSpecialty'  => 'Dentistry',
		'address'           => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => $f['street'],
			'addressLocality' => $f['city'],
			'addressRegion'   => $f['region'],
			'postalCode'      => $f['postal'],
			'addressCountry'  => $f['country'],
		),
		'geo'               => array(
			'@type'     => 'GeoCoordinates',
			'latitude'  => $f['lat'],
			'longitude' => $f['lng'],
		),
		'areaServed'        => array_map(
			function ( $area ) {
				return array( '@type' => 'Place', 'name' => $area . ', San Francisco' );
			},
			$f['areas']
		),
		'openingHoursSpecification' => array_map(
			function ( $block ) {
				return array(
					'@type'     => 'OpeningHoursSpecification',
					'dayOfWeek' => $block['days'],
					'opens'     => $block['open'],
					'closes'    => $block['close'],
				);
			},
			$f['hours']
		),
		'aggregateRating'   => array(
			'@type'       => 'AggregateRating',
			'ratingValue' => $f['rating'],
			'reviewCount' => $f['reviews'],
			'bestRating'  => '5',
			'worstRating' => '1',
		),
		'makesOffer'        => array(
			array(
				'@type'       => 'Offer',
				'name'        => 'New Patient Gateway exam',
				'price'       => '99',
				'priceCurrency' => 'USD',
				'url'         => lumina_url( 'pricing' ),
			),
			array(
				'@type'       => 'Offer',
				'name'        => 'Lumina Wellness Club membership',
				'price'       => '34',
				'priceCurrency' => 'USD',
				'url'         => lumina_url( 'financing' ),
			),
		),
		'hasOfferCatalog'   => array(
			'@type' => 'OfferCatalog',
			'name'  => 'Dental treatments',
			'itemListElement' => array(
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Dental implants', 'url' => lumina_url( 'implants' ) ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Porcelain veneers', 'url' => lumina_url( 'veneers' ) ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Invisalign clear aligners', 'url' => lumina_url( 'invisalign' ) ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Laser teeth whitening', 'url' => lumina_url( 'whitening' ) ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Emergency dentistry', 'url' => lumina_url( 'emergency' ) ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Sedation dentistry', 'url' => lumina_url( 'sedation' ) ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Same-day crowns', 'url' => lumina_url( 'crowns' ) ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Preventive and hygiene care', 'url' => lumina_url( 'preventive' ) ) ),
			),
		),
		'founder'           => array(
			'@type'       => 'Person',
			'@id'         => home_url( '/#dr-sarah-jenkins' ),
			'name'        => 'Dr. Sarah Jenkins, DDS',
			'jobTitle'    => 'Clinical Lead',
			'honorificSuffix' => 'DDS',
			'description' => 'Board-certified dentist leading cosmetic, implant and anxiety-free care at Lumina Dental Studio.',
			'url'         => lumina_url( 'team' ),
		),
	);

	return $node;
}

/**
 * The site node, with the sitelinks search action.
 */
function lumina_schema_website() {
	return array(
		'@type'           => 'WebSite',
		'@id'             => home_url( '/#website' ),
		'url'             => home_url( '/' ),
		'name'            => lumina_site_facts()['name'],
		'description'     => 'Dental practice website: treatments, transparent pricing, patient stories and the dental health blog.',
		'publisher'       => array( '@id' => home_url( '/#organization' ) ),
		'inLanguage'      => 'en-US',
		'potentialAction' => array(
			array(
				'@type'       => 'SearchAction',
				'target'      => array(
					'@type'       => 'EntryPoint',
					'urlTemplate' => home_url( '/?s={search_term_string}' ),
				),
				'query-input' => 'required name=search_term_string',
			),
			array(
				'@type'  => 'ReserveAction',
				'target' => array(
					'@type'          => 'EntryPoint',
					'urlTemplate'    => lumina_url( 'book' ),
					'actionPlatform' => array( 'http://schema.org/DesktopWebPlatform', 'http://schema.org/MobileWebPlatform' ),
				),
				'result' => array( '@type' => 'Reservation', 'name' => 'Dental appointment' ),
			),
		),
	);
}

/**
 * Breadcrumb list from the same trail the template renders.
 */
function lumina_schema_breadcrumb() {
	$trail = lumina_breadcrumb_trail();
	if ( count( $trail ) < 2 ) {
		return null;
	}

	$items = array();
	foreach ( $trail as $i => $crumb ) {
		$item = array(
			'@type'    => 'ListItem',
			'position' => $i + 1,
			'name'     => $crumb['label'],
		);
		if ( ! empty( $crumb['url'] ) ) {
			$item['item'] = $crumb['url'];
		}
		$items[] = $item;
	}

	return array(
		'@type'           => 'BreadcrumbList',
		'@id'             => ( is_singular() ? get_permalink() : home_url( add_query_arg( array(), $GLOBALS['wp']->request ) ) ) . '#breadcrumb',
		'itemListElement' => $items,
	);
}

/**
 * FAQPage from the accordion content the installer extracted into post meta.
 */
function lumina_schema_faq( $post_id ) {
	if ( ! $post_id ) {
		return null;
	}
	$raw = get_post_meta( $post_id, '_lumina_faq', true );
	if ( ! $raw ) {
		return null;
	}
	$pairs = json_decode( $raw, true );
	if ( ! is_array( $pairs ) || ! $pairs ) {
		return null;
	}

	$entities = array();
	foreach ( $pairs as $pair ) {
		$entities[] = array(
			'@type'          => 'Question',
			'name'           => $pair['q'],
			'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $pair['a'] ),
		);
	}

	return array(
		'@type'      => 'FAQPage',
		'@id'        => get_permalink( $post_id ) . '#faq',
		'mainEntity' => $entities,
	);
}

/**
 * Service node for treatment pages.
 */
function lumina_schema_service( $post_id ) {
	if ( ! $post_id ) {
		return null;
	}
	$services = array(
		'dental-implants'        => array( 'Dental implants', 'Surgical placement of titanium implants and prosthetic teeth to replace one or more missing teeth.', 'Implant dentistry' ),
		'porcelain-veneers'      => array( 'Porcelain veneers', 'Custom ceramic veneers bonded to the front teeth to change shape, shade and alignment.', 'Cosmetic dentistry' ),
		'invisalign'             => array( 'Invisalign clear aligners', 'Removable clear aligner therapy planned from a digital intraoral scan.', 'Orthodontics' ),
		'teeth-whitening'        => array( 'Laser teeth whitening', 'In-office and take-home peroxide whitening for extrinsic and intrinsic staining.', 'Cosmetic dentistry' ),
		'emergency-dentistry'    => array( 'Emergency dentistry', 'Same-day assessment and pain relief for dental emergencies, available on a 24/7 hotline.', 'Emergency dental care' ),
		'sedation-dentistry'     => array( 'Sedation dentistry', 'Nitrous oxide, oral conscious and IV sedation for anxious patients and longer procedures.', 'Dental anesthesia' ),
		'same-day-crowns'        => array( 'Same-day crowns', 'Chairside CAD/CAM scanning, design and milling of a ceramic crown in a single visit.', 'Restorative dentistry' ),
		'preventive-care'        => array( 'Preventive and hygiene care', 'Examinations, digital radiography, professional cleanings, fluoride and oral cancer screening.', 'Preventive dentistry' ),
	);
	$slug = get_post_field( 'post_name', $post_id );
	if ( ! isset( $services[ $slug ] ) ) {
		return null;
	}
	$s = $services[ $slug ];

	return array(
		'@type'       => array( 'Service', 'MedicalProcedure' ),
		'@id'         => get_permalink( $post_id ) . '#service',
		'name'        => $s[0],
		'description' => $s[1],
		'serviceType' => $s[2],
		'provider'    => array( '@id' => home_url( '/#organization' ) ),
		'areaServed'  => array( '@type' => 'City', 'name' => 'San Francisco' ),
		'url'         => get_permalink( $post_id ),
		'mainEntityOfPage' => get_permalink( $post_id ),
	);
}

/**
 * BlogPosting for articles, with the sources cited in the body attached as citations.
 */
function lumina_schema_article( $post_id ) {
	$content = get_post_field( 'post_content', $post_id );

	$citations = array();
	if ( preg_match_all( '/<a[^>]+href="(https?:\/\/[^"]+)"[^>]*>(.*?)<\/a>/is', $content, $m, PREG_SET_ORDER ) ) {
		foreach ( $m as $match ) {
			$host = wp_parse_url( $match[1], PHP_URL_HOST );
			if ( ! $host || false !== strpos( $host, 'luminadentalstudio' ) ) {
				continue;
			}
			$citations[ $match[1] ] = array( '@type' => 'CreativeWork', 'name' => wp_strip_all_tags( $match[2] ), 'url' => $match[1] );
		}
	}

	$node = array(
		'@type'            => 'BlogPosting',
		'@id'              => get_permalink( $post_id ) . '#article',
		'headline'         => wp_html_excerpt( get_the_title( $post_id ), 110, '' ),
		'description'      => wp_html_excerpt( wp_strip_all_tags( get_post_field( 'post_excerpt', $post_id ) ), 200, '…' ),
		'datePublished'    => get_the_date( 'c', $post_id ),
		'dateModified'     => get_the_modified_date( 'c', $post_id ),
		'wordCount'        => str_word_count( wp_strip_all_tags( $content ) ),
		'inLanguage'       => 'en-US',
		'mainEntityOfPage' => get_permalink( $post_id ),
		'author'           => array( '@id' => home_url( '/#dr-sarah-jenkins' ) ),
		'publisher'        => array( '@id' => home_url( '/#organization' ) ),
		'isPartOf'         => array( '@id' => get_permalink( $post_id ) . '#webpage' ),
		'articleSection'   => wp_get_post_categories( $post_id, array( 'fields' => 'names' ) ),
		'keywords'         => array_map(
			function ( $tag ) {
				return $tag->name;
			},
			wp_get_post_tags( $post_id )
		),
	);
	if ( $citations ) {
		$node['citation'] = array_values( $citations );
	}

	return $node;
}

/**
 * WebPage node tying the graph together.
 */
function lumina_schema_webpage() {
	$id   = is_singular() ? get_queried_object_id() : 0;
	$url  = is_singular() ? get_permalink( $id ) : home_url( add_query_arg( array(), $GLOBALS['wp']->request ) );
	$type = 'WebPage';

	if ( is_front_page() ) {
		$type = 'WebPage';
	} elseif ( is_home() ) {
		$type = 'CollectionPage';
	} elseif ( is_page( 'contact' ) ) {
		$type = 'ContactPage';
	} elseif ( is_page( 'faq' ) ) {
		$type = 'FAQPage';
	} elseif ( is_singular( 'post' ) ) {
		$type = 'ItemPage';
	} elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	}

	$node = array(
		'@type'      => $type,
		'@id'        => $url . '#webpage',
		'url'        => $url,
		'name'       => wp_get_document_title(),
		'description' => lumina_meta_description(),
		'isPartOf'   => array( '@id' => home_url( '/#website' ) ),
		'inLanguage' => 'en-US',
		'about'      => array( '@id' => home_url( '/#organization' ) ),
	);

	$trail_nodes = lumina_schema_breadcrumb();
	if ( $trail_nodes ) {
		$node['breadcrumb'] = array( '@id' => $trail_nodes['@id'] );
	}

	if ( is_singular( 'post' ) ) {
		$node['primaryImageOfPage'] = null;
	}
	if ( is_page( 'team' ) ) {
		$node['about'] = array( '@id' => home_url( '/#dr-sarah-jenkins' ) );
	}

	return $node;
}

/**
 * Print the graph.
 */
function lumina_print_schema() {
	$id    = is_singular() ? get_queried_object_id() : 0;
	$graph = array(
		lumina_schema_organization(),
		lumina_schema_website(),
		lumina_schema_webpage(),
	);

	$breadcrumb = lumina_schema_breadcrumb();
	if ( $breadcrumb ) {
		$graph[] = $breadcrumb;
	}

	if ( is_singular( 'post' ) && $id ) {
		$graph[] = lumina_schema_article( $id );
	}

	if ( is_page() && $id ) {
		$service = lumina_schema_service( $id );
		if ( $service ) {
			$graph[] = $service;
		}
		$faq = lumina_schema_faq( $id );
		if ( $faq ) {
			$graph[] = $faq;
		}
	}

	if ( is_singular( 'post' ) && $id ) {
		$faq = lumina_schema_faq( $id );
		if ( $faq ) {
			$graph[] = $faq;
		}
	}

	$payload = array(
		'@context' => 'https://schema.org',
		'@graph'   => array_values( array_filter( $graph ) ),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'lumina_print_schema', 20 );
