<?php
/**
 * 404 page. A dead end should still be a route back into the site.
 *
 * @package Lumina_Dental
 */

get_header();
?>
<section class="w-full pt-16 pb-16 bg-on-secondary-fixed text-on-secondary">
	<div class="max-w-3xl mx-auto px-6 lg:px-12 space-y-5">
		<span class="inline-block font-label-sm text-label-sm uppercase tracking-widest text-primary-fixed font-bold bg-primary/25 px-3 py-1 rounded-full">Error 404</span>
		<h1 class="font-display-hero text-display-hero-mobile md:text-display-hero font-bold">We could not find that page</h1>
		<p class="font-body-lg text-body-lg text-secondary-fixed-dim">
			The link may be out of date. Everything on this site is reachable from the list below, or search for what you need.
		</p>
		<div class="pt-2 max-w-md"><?php lumina_search_form( '404' ); ?></div>
		<div class="flex flex-wrap gap-3 pt-2">
			<a class="bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md px-6 py-3 rounded-full transition-all shadow-[0_8px_20px_rgba(0,104,95,0.25)]" href="<?php echo esc_url( lumina_url( 'book' ) ); ?>">Book an appointment</a>
			<a class="bg-on-secondary-fixed-variant text-on-secondary font-title-md text-title-md px-6 py-3 rounded-full transition-all" href="<?php echo esc_url( lumina_url( 'phone' ) ); ?>">Call <?php echo esc_html( lumina_site_facts()['phone_disp'] ); ?></a>
		</div>
	</div>
</section>

<section class="w-full py-14 bg-surface">
	<div class="max-w-7xl mx-auto px-6 lg:px-12">
		<h2 class="font-headline-md text-headline-md text-on-surface font-bold mb-8">Popular pages</h2>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
			<?php foreach ( lumina_all_links() as $lumina_label => $lumina_link ) : ?>
				<a class="bg-surface-container-lowest rounded-2xl border border-surface-container p-5 hover:border-primary transition-colors flex items-center justify-between gap-3" href="<?php echo esc_url( $lumina_link ); ?>">
					<span class="font-title-md text-title-md text-on-surface"><?php echo esc_html( $lumina_label ); ?></span>
					<span class="material-symbols-outlined text-outline" aria-hidden="true">arrow_forward</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
lumina_cta_band( 'Need help right now?', 'Dental emergency? Call our 24/7 hotline and we will triage you over the phone and get you seen the same day.' );
get_footer();
