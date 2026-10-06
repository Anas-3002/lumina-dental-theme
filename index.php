<?php
/**
 * Ultimate fallback template. WordPress requires index.php in every theme.
 *
 * @package Lumina_Dental
 */

get_header();
?>
<section class="w-full pt-14 pb-16 bg-on-secondary-fixed text-on-secondary">
	<div class="max-w-7xl mx-auto px-6 lg:px-12">
		<?php lumina_breadcrumbs( 'font-label-sm text-label-sm text-secondary-fixed-dim mb-6' ); ?>
		<div class="max-w-3xl space-y-5">
			<h1 class="font-display-hero text-display-hero-mobile md:text-display-hero font-bold">
				<?php
				if ( is_home() && ! is_front_page() ) {
					echo esc_html( get_the_title( (int) get_option( 'page_for_posts' ) ) );
				} elseif ( is_search() ) {
					echo 'Search results';
				} elseif ( is_archive() ) {
					echo esc_html( wp_strip_all_tags( get_the_archive_title() ) );
				} else {
					echo esc_html( get_bloginfo( 'name' ) );
				}
				?>
			</h1>
			<?php if ( is_search() ) : ?>
				<p class="font-body-lg text-body-lg text-secondary-fixed-dim">
					<?php echo esc_html( sprintf( '%d results for "%s"', (int) $GLOBALS['wp_query']->found_posts, get_search_query() ) ); ?>
				</p>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="w-full py-14 bg-surface">
	<div class="max-w-7xl mx-auto px-6 lg:px-12">
		<?php if ( have_posts() ) : ?>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/post-card' );
				endwhile;
				?>
			</div>
			<div class="mt-12 flex justify-center font-title-md text-title-md"><?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?></div>
		<?php else : ?>
			<div class="max-w-2xl lumina-prose">
				<p>We could not find anything matching that. Try one of these instead:</p>
			</div>
			<div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
				<?php foreach ( lumina_all_links() as $lumina_label => $lumina_link ) : ?>
					<a class="bg-surface-container-lowest rounded-2xl border border-surface-container p-5 hover:border-primary transition-colors" href="<?php echo esc_url( $lumina_link ); ?>">
						<span class="font-title-md text-title-md text-on-surface"><?php echo esc_html( $lumina_label ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php
lumina_cta_band();
get_footer();
