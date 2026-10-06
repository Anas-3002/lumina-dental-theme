<?php
/**
 * Archive template (categories, tags, dates, author).
 *
 * @package Lumina_Dental
 */

get_header();
?>
<section class="w-full pt-14 pb-16 bg-on-secondary-fixed text-on-secondary">
	<div class="max-w-7xl mx-auto px-6 lg:px-12">
		<?php lumina_breadcrumbs( 'font-label-sm text-label-sm text-secondary-fixed-dim mb-6' ); ?>
		<div class="max-w-3xl space-y-5">
			<span class="inline-block font-label-sm text-label-sm uppercase tracking-widest text-primary-fixed font-bold bg-primary/25 px-3 py-1 rounded-full">Archive</span>
			<h1 class="font-display-hero text-display-hero-mobile md:text-display-hero font-bold"><?php echo esc_html( wp_strip_all_tags( get_the_archive_title() ) ); ?></h1>
			<?php
			$lumina_desc = get_the_archive_description();
			if ( $lumina_desc ) :
				?>
				<p class="font-body-lg text-body-lg text-secondary-fixed-dim"><?php echo esc_html( wp_strip_all_tags( $lumina_desc ) ); ?></p>
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
			<div class="lumina-prose">
				<p class="font-body-lg text-body-lg text-on-surface-variant">Nothing published here yet. Browse the <a href="<?php echo esc_url( lumina_url( 'blog' ) ); ?>">dental health blog</a> or our <a href="<?php echo esc_url( lumina_url( 'services' ) ); ?>">treatments</a>.</p>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php
lumina_cta_band();
get_footer();
