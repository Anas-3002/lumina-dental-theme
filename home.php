<?php
/**
 * Blog index (the page assigned as the posts page).
 *
 * @package Lumina_Dental
 */

get_header();

$lumina_page_for_posts = (int) get_option( 'page_for_posts' );
$lumina_title          = $lumina_page_for_posts ? get_the_title( $lumina_page_for_posts ) : 'Dental Health Blog';
$lumina_categories     = get_categories( array( 'hide_empty' => true ) );
?>
<section class="w-full pt-14 pb-16 bg-on-secondary-fixed text-on-secondary">
	<div class="max-w-7xl mx-auto px-6 lg:px-12">
		<?php lumina_breadcrumbs( 'font-label-sm text-label-sm text-secondary-fixed-dim mb-6' ); ?>
		<div class="max-w-3xl space-y-5">
			<span class="inline-block font-label-sm text-label-sm uppercase tracking-widest text-primary-fixed font-bold bg-primary/25 px-3 py-1 rounded-full">Evidence-based dental health</span>
			<h1 class="font-display-hero text-display-hero-mobile md:text-display-hero font-bold"><?php echo esc_html( $lumina_title ); ?></h1>
			<p class="font-body-lg text-body-lg text-secondary-fixed-dim">
				Plain-English answers to the questions patients actually ask us, written by the clinical team at Lumina Dental Studio and cited to primary sources.
			</p>
			<div class="pt-2 max-w-md"><?php lumina_search_form( 'blog' ); ?></div>
		</div>
	</div>
</section>

<section class="w-full py-14 bg-surface">
	<div class="max-w-7xl mx-auto px-6 lg:px-12">
		<?php if ( $lumina_categories ) : ?>
			<div class="flex flex-wrap gap-2 mb-10">
				<a class="bg-primary text-on-primary font-label-md text-label-md px-4 py-2 rounded-full" href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ? get_post_type_archive_link( 'post' ) : home_url( '/blog/' ) ); ?>">All articles</a>
				<?php foreach ( $lumina_categories as $lumina_category ) : ?>
					<a class="bg-surface-container-low hover:bg-surface-container text-on-surface-variant font-label-md text-label-md px-4 py-2 rounded-full transition-colors" href="<?php echo esc_url( get_category_link( $lumina_category->term_id ) ); ?>">
						<?php echo esc_html( $lumina_category->name ); ?> (<?php echo esc_html( $lumina_category->count ); ?>)
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/post-card' );
				endwhile;
				?>
			</div>
			<div class="mt-12 flex justify-center font-title-md text-title-md">
				<?php
				the_posts_pagination( array(
					'mid_size'  => 1,
					'prev_text' => 'Previous',
					'next_text' => 'Next',
				) );
				?>
			</div>
		<?php else : ?>
			<p class="font-body-lg text-body-lg text-on-surface-variant">No articles published yet.</p>
		<?php endif; ?>
	</div>
</section>

<?php
lumina_cta_band( 'Have a question this blog does not answer?', 'Our clinical team replies to patient questions within one working day, or you can book a $99 new-patient exam with a 3D scan.' );
get_footer();
