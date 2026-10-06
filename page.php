<?php
/**
 * Default page template. Managed pages ship their own hero + sections, so their
 * content is printed as-is; anything else gets a standard header and prose body.
 *
 * @package Lumina_Dental
 */

get_header();

while ( have_posts() ) :
	the_post();
	$lumina_managed = get_post_meta( get_the_ID(), '_lumina_managed', true );

	if ( $lumina_managed ) {
		the_content();
	} else {
		?>
		<article class="w-full">
			<section class="w-full pt-14 pb-12 bg-on-secondary-fixed text-on-secondary">
				<div class="max-w-3xl mx-auto px-6 lg:px-12 space-y-5">
					<?php lumina_breadcrumbs( 'font-label-sm text-label-sm text-secondary-fixed-dim' ); ?>
					<h1 class="font-display-hero text-display-hero-mobile md:text-display-hero font-bold"><?php the_title(); ?></h1>
				</div>
			</section>
			<section class="w-full py-16 bg-surface">
				<div class="max-w-3xl mx-auto px-6 lg:px-12 lumina-prose">
					<?php the_content(); ?>
				</div>
			</section>
		</article>
		<?php
	}
endwhile;

lumina_cta_band();
get_footer();
