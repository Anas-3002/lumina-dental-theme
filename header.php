<?php
/**
 * Site header: announcement bar, sticky navigation, mobile drawer.
 *
 * @package Lumina_Dental
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<meta name="theme-color" content="#00685f">
<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-surface font-body-md text-on-surface antialiased' ); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'lumina-dental' ); ?></a>
<span id="top"></span>

<header class="fixed top-0 left-0 right-0 z-50">
	<aside class="w-full bg-on-primary-fixed text-on-primary py-2 px-4 shadow-sm">
		<div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-2 text-center md:text-left">
			<div class="flex items-center gap-2 mx-auto md:mx-0 text-center">
				<span class="flex h-2 w-2 relative">
					<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-fixed opacity-75"></span>
					<span class="relative inline-flex rounded-full h-2 w-2 bg-primary-fixed"></span>
				</span>
				<p class="font-label-md text-label-md">
					<span class="text-primary-fixed font-semibold">✨ Spring Smile Renewal:</span>
					Claim $150 Off Comprehensive First-Visit Exam, 3D HD Scan &amp; Cleaning
					<span class="hidden lg:inline text-outline-variant">•</span>
					<span class="hidden lg:inline text-tertiary-fixed font-medium">Limited to Next 14 New Patients</span>
				</p>
			</div>
			<div class="flex items-center gap-4 mx-auto md:mx-0 font-label-md text-label-md">
				<a class="text-primary-fixed hover:text-on-primary transition-colors flex items-center gap-1 font-semibold" href="<?php echo esc_url( lumina_url( 'phone' ) ); ?>">
					<span class="material-symbols-outlined text-sm" aria-hidden="true">phone_in_talk</span><?php echo esc_html( lumina_site_facts()['phone_disp'] ); ?>
				</a>
				<span class="text-outline-variant hidden sm:inline">|</span>
				<a class="bg-primary hover:bg-primary-container text-on-primary px-3 py-1 rounded-full text-xs font-semibold tracking-wide transition-all shadow-sm" href="<?php echo esc_url( lumina_url( 'book' ) ); ?>">Claim Offer →</a>
			</div>
		</div>
	</aside>

	<div class="bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
		<div class="h-20 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between gap-4">
			<a class="flex items-center gap-3 shrink-0 group" href="<?php echo esc_url( lumina_url( 'home' ) ); ?>">
				<span class="w-11 h-11 rounded-2xl bg-primary text-on-primary flex items-center justify-center shadow-[0_8px_20px_rgba(0,104,95,0.25)]" aria-hidden="true">
					<span class="material-symbols-outlined text-2xl">dentistry</span>
				</span>
				<span class="flex flex-col">
					<span class="font-headline-sm text-headline-sm text-on-surface tracking-tight group-hover:text-primary transition-colors leading-tight"><?php echo esc_html( lumina_site_facts()['name'] ); ?></span>
					<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline"><?php echo esc_html( lumina_site_facts()['tagline'] ); ?></span>
				</span>
				<span class="screen-reader-text"><?php esc_html_e( 'Lumina Dental Studio home', 'lumina-dental' ); ?></span>
			</a>

			<?php lumina_main_nav(); ?>

			<div class="flex items-center gap-3 shrink-0">
				<a class="hidden lg:flex flex-col items-end text-right" href="<?php echo esc_url( lumina_url( 'phone' ) ); ?>">
					<span class="font-label-sm text-label-sm text-primary font-bold flex items-center gap-1">
						<span class="material-symbols-outlined text-xs" aria-hidden="true">emergency</span> Emergency 24/7
					</span>
					<span class="font-title-md text-title-md text-on-surface font-semibold hover:text-primary transition-colors"><?php echo esc_html( lumina_site_facts()['phone_disp'] ); ?></span>
				</a>
				<div class="hidden md:flex items-center gap-2 pl-2 border-l border-surface-container-highest">
					<span class="w-9 h-9 rounded-full bg-primary-fixed/40 text-on-primary-fixed flex items-center justify-center font-label-md text-label-md font-bold" aria-hidden="true">SJ</span>
					<span class="flex flex-col">
						<span class="font-label-md text-label-md font-semibold text-on-surface leading-tight">Dr. Sarah Jenkins</span>
						<span class="font-label-sm text-label-sm text-outline">DDS, Clinical Lead</span>
					</span>
				</div>
				<a class="hidden sm:inline-flex bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md px-5 py-2.5 rounded-full transition-all duration-300 shadow-[0_4px_16px_rgba(0,104,95,0.25)] hover:shadow-[0_6px_24px_rgba(0,104,95,0.35)] hover:-translate-y-0.5 active:translate-y-0" href="<?php echo esc_url( lumina_url( 'book' ) ); ?>">Register &amp; Book Exam</a>
				<button id="lumina-menu-toggle" class="xl:hidden w-11 h-11 rounded-2xl bg-surface-container-low text-on-surface flex items-center justify-center" type="button" aria-controls="lumina-mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open menu', 'lumina-dental' ); ?>">
					<span class="material-symbols-outlined" id="lumina-menu-icon" aria-hidden="true">menu</span>
				</button>
			</div>
		</div>
	</div>

	<div id="lumina-mobile-menu" class="hidden xl:hidden bg-surface-container-lowest border-t border-surface-container max-h-[calc(100vh-5rem)] overflow-y-auto">
		<div class="max-w-7xl mx-auto px-6 py-6 space-y-6">
			<?php lumina_search_form( 'mobile' ); ?>
			<nav aria-label="<?php esc_attr_e( 'Mobile', 'lumina-dental' ); ?>">
				<ul class="flex flex-col divide-y divide-surface-container">
					<?php foreach ( lumina_all_links() as $label => $url ) : ?>
						<li>
							<a class="flex items-center justify-between py-3 font-title-md text-title-md text-on-surface hover:text-primary transition-colors" href="<?php echo esc_url( $url ); ?>">
								<?php echo esc_html( $label ); ?>
								<span class="material-symbols-outlined text-base text-outline" aria-hidden="true">chevron_right</span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
			<div class="flex flex-wrap gap-3">
				<a class="flex-1 text-center bg-primary text-on-primary font-title-md text-title-md px-5 py-3 rounded-full" href="<?php echo esc_url( lumina_url( 'book' ) ); ?>">Book an appointment</a>
				<a class="flex-1 text-center bg-surface-container-low text-on-surface font-title-md text-title-md px-5 py-3 rounded-full" href="<?php echo esc_url( lumina_url( 'phone' ) ); ?>">Call us</a>
			</div>
		</div>
	</div>
</header>

<main id="main" class="w-full pt-20 bg-surface min-h-screen">
