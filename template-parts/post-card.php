<?php
/**
 * Blog card used by the blog index, archives, search results and related posts.
 *
 * @package Lumina_Dental
 */

$lumina_cats = get_the_category();
$lumina_cat  = $lumina_cats ? $lumina_cats[0] : null;
?>
<article class="bg-surface-container-lowest rounded-3xl border border-surface-container shadow-[0_16px_40px_rgba(0,32,29,0.08)] flex flex-col overflow-hidden h-full">
	<div class="p-7 flex flex-col gap-3 flex-1">
		<?php if ( $lumina_cat ) : ?>
			<a class="self-start font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold bg-primary-fixed/30 px-3 py-1 rounded-full" href="<?php echo esc_url( get_category_link( $lumina_cat->term_id ) ); ?>">
				<?php echo esc_html( $lumina_cat->name ); ?>
			</a>
		<?php endif; ?>
		<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-snug">
			<a class="hover:text-primary transition-colors" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html( wp_html_excerpt( wp_strip_all_tags( get_the_excerpt() ), 150, '…' ) ); ?></p>
		<div class="mt-auto pt-4 flex items-center justify-between font-label-md text-label-md text-outline">
			<span><?php echo esc_html( get_the_date() ); ?></span>
			<span class="flex items-center gap-1">
				<span class="material-symbols-outlined text-sm" aria-hidden="true">schedule</span>
				<?php echo esc_html( lumina_reading_time() ); ?> min
			</span>
		</div>
	</div>
	<a class="bg-surface-container-low hover:bg-primary hover:text-on-primary text-on-surface font-title-md text-title-md px-7 py-4 transition-colors flex items-center justify-between" href="<?php the_permalink(); ?>">
		<span>Read the article</span>
		<span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span>
	</a>
</article>
