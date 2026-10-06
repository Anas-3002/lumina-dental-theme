<?php
/**
 * Single blog post.
 *
 * @package Lumina_Dental
 */

get_header();

while ( have_posts() ) :
	the_post();
	$lumina_cats = get_the_category();
	?>
	<article class="w-full">
		<section class="w-full pt-14 pb-12 bg-on-secondary-fixed text-on-secondary">
			<div class="max-w-3xl mx-auto px-6 lg:px-12 space-y-5">
				<?php lumina_breadcrumbs( 'font-label-sm text-label-sm text-secondary-fixed-dim' ); ?>
				<?php if ( $lumina_cats ) : ?>
					<a class="inline-block font-label-sm text-label-sm uppercase tracking-widest text-primary-fixed font-bold bg-primary/25 px-3 py-1 rounded-full" href="<?php echo esc_url( get_category_link( $lumina_cats[0]->term_id ) ); ?>">
						<?php echo esc_html( $lumina_cats[0]->name ); ?>
					</a>
				<?php endif; ?>
				<h1 class="font-display-hero text-display-hero-mobile md:text-display-hero font-bold"><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="font-body-lg text-body-lg text-secondary-fixed-dim"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
				<div class="flex flex-wrap items-center gap-x-6 gap-y-2 font-label-md text-label-md text-secondary-fixed-dim pt-2">
					<span class="flex items-center gap-2">
						<span class="w-7 h-7 rounded-full bg-primary-fixed/40 text-on-primary-fixed flex items-center justify-center text-xs font-bold" aria-hidden="true">SJ</span>
						Dr. Sarah Jenkins, DDS
					</span>
					<span class="flex items-center gap-1">
						<span class="material-symbols-outlined text-sm" aria-hidden="true">calendar_month</span>
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					</span>
					<span class="flex items-center gap-1">
						<span class="material-symbols-outlined text-sm" aria-hidden="true">schedule</span>
						<?php echo esc_html( lumina_reading_time() ); ?> min read
					</span>
					<span class="flex items-center gap-1">
						<span class="material-symbols-outlined text-sm" aria-hidden="true">verified</span>
						Medically reviewed
					</span>
				</div>
			</div>
		</section>

		<section class="w-full py-14 bg-surface">
			<div class="max-w-3xl mx-auto px-6 lg:px-12">
				<div class="lumina-prose">
					<?php the_content(); ?>
				</div>

				<?php
				$lumina_tags = get_the_tags();
				if ( $lumina_tags ) :
					?>
					<div class="mt-10 flex flex-wrap gap-2">
						<?php foreach ( $lumina_tags as $lumina_tag ) : ?>
							<a class="bg-surface-container-low hover:bg-surface-container text-on-surface-variant font-label-md text-label-md px-3 py-1.5 rounded-full transition-colors" href="<?php echo esc_url( get_tag_link( $lumina_tag->term_id ) ); ?>">#<?php echo esc_html( $lumina_tag->name ); ?></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<div class="mt-10 rounded-3xl border border-surface-container bg-surface-container-lowest p-6 flex flex-col sm:flex-row sm:items-center gap-4">
					<span class="w-14 h-14 rounded-2xl bg-primary text-on-primary flex items-center justify-center shrink-0" aria-hidden="true">
						<span class="material-symbols-outlined text-2xl">dentistry</span>
					</span>
					<div class="flex-1">
						<p class="font-title-lg text-title-lg text-on-surface font-semibold">Written by Dr. Sarah Jenkins, DDS</p>
						<p class="font-body-sm text-body-sm text-on-surface-variant">Clinical Lead at Lumina Dental Studio, San Francisco. This article is general dental information, not a diagnosis — book an exam for advice about your own teeth.</p>
					</div>
					<a class="bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md px-5 py-3 rounded-full transition-all whitespace-nowrap" href="<?php echo esc_url( lumina_url( 'book' ) ); ?>">Book an exam</a>
				</div>
			</div>
		</section>

		<?php
		$lumina_related = get_posts( array(
			'post__not_in'   => array( get_the_ID() ),
			'posts_per_page' => 3,
			'category__in'   => wp_get_post_categories( get_the_ID() ),
		) );
		if ( ! $lumina_related ) {
			$lumina_related = get_posts( array( 'post__not_in' => array( get_the_ID() ), 'posts_per_page' => 3 ) );
		}
		if ( $lumina_related ) :
			?>
			<section class="w-full py-16 bg-surface-container-low">
				<div class="max-w-7xl mx-auto px-6 lg:px-12">
					<h2 class="font-headline-md text-headline-md text-on-surface font-bold mb-8">Keep reading</h2>
					<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
						<?php foreach ( $lumina_related as $lumina_post ) : ?>
							<?php
							$lumina_post = get_post( $lumina_post );
							setup_postdata( $lumina_post );
							get_template_part( 'template-parts/post-card' );
							?>
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
	</article>
	<?php
endwhile;

lumina_cta_band();
get_footer();
