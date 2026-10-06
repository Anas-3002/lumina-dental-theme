<?php
/**
 * Search results.
 *
 * @package Lumina_Dental
 */

get_header();
?>
<section class="w-full pt-14 pb-14 bg-on-secondary-fixed text-on-secondary">
	<div class="max-w-3xl mx-auto px-6 lg:px-12 space-y-5">
		<?php lumina_breadcrumbs( 'font-label-sm text-label-sm text-secondary-fixed-dim' ); ?>
		<h1 class="font-display-hero text-display-hero-mobile md:text-display-hero font-bold">Search results</h1>
		<p class="font-body-lg text-body-lg text-secondary-fixed-dim">
			<?php
			printf(
				/* translators: 1: result count, 2: search phrase. */
				esc_html__( '%1$d results for "%2$s"', 'lumina-dental' ),
				(int) $GLOBALS['wp_query']->found_posts,
				esc_html( get_search_query() )
			);
			?>
		</p>
		<div class="pt-2 max-w-lg"><?php lumina_search_form( 'results' ); ?></div>
	</div>
</section>

<section class="w-full py-14 bg-surface">
	<div class="max-w-3xl mx-auto px-6 lg:px-12">
		<?php if ( have_posts() ) : ?>
			<ul class="space-y-5">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<li class="bg-surface-container-lowest rounded-3xl border border-surface-container shadow-[0_16px_40px_rgba(0,32,29,0.08)] p-7">
						<p class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold mb-2">
							<?php echo esc_html( 'post' === get_post_type() ? 'Article' : 'Page' ); ?>
						</p>
						<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold mb-2">
							<a class="hover:text-primary transition-colors" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html( wp_html_excerpt( wp_strip_all_tags( get_the_excerpt() ), 180, '…' ) ); ?></p>
					</li>
				<?php endwhile; ?>
			</ul>
			<div class="mt-12 flex justify-center font-title-md text-title-md"><?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?></div>
		<?php else : ?>
			<div class="lumina-prose">
				<p>Nothing matched that search. These pages answer most questions:</p>
			</div>
			<div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
				<a class="bg-surface-container-lowest rounded-2xl border border-surface-container p-5 hover:border-primary transition-colors" href="<?php echo esc_url( lumina_url( 'book' ) ); ?>">
					<span class="font-title-md text-title-md text-on-surface">Book an appointment</span>
				</a>
				<a class="bg-surface-container-lowest rounded-2xl border border-surface-container p-5 hover:border-primary transition-colors" href="<?php echo esc_url( lumina_url( 'services' ) ); ?>">
					<span class="font-title-md text-title-md text-on-surface">All treatments</span>
				</a>
				<a class="bg-surface-container-lowest rounded-2xl border border-surface-container p-5 hover:border-primary transition-colors" href="<?php echo esc_url( lumina_url( 'faq' ) ); ?>">
					<span class="font-title-md text-title-md text-on-surface">Frequently asked questions</span>
				</a>
				<a class="bg-surface-container-lowest rounded-2xl border border-surface-container p-5 hover:border-primary transition-colors" href="<?php echo esc_url( lumina_url( 'pricing' ) ); ?>">
					<span class="font-title-md text-title-md text-on-surface">Transparent pricing</span>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php
lumina_cta_band();
get_footer();
