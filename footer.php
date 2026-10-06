<?php
/**
 * Site footer.
 *
 * @package Lumina_Dental
 */
$lumina_f = lumina_site_facts();
?>
</main>

<footer class="w-full bg-on-secondary-fixed text-on-secondary py-16">
	<div class="max-w-7xl mx-auto px-6 lg:px-12">
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-on-secondary-fixed-variant">
			<div class="lg:col-span-2 space-y-4">
				<div class="flex items-center gap-3">
					<span class="w-10 h-10 rounded-2xl bg-primary text-on-primary flex items-center justify-center" aria-hidden="true">
						<span class="material-symbols-outlined">dentistry</span>
					</span>
					<span class="font-headline-sm text-headline-sm text-on-secondary font-semibold"><?php echo esc_html( $lumina_f['name'] ); ?></span>
				</div>
				<p class="font-body-md text-body-md text-secondary-fixed-dim max-w-sm">
					Pioneering high-precision cosmetic and restorative dentistry with hospital-grade sterilization, 3D CBCT guided implants, and zero-anxiety patient experiences.
				</p>
				<div class="flex flex-wrap gap-2 pt-2">
					<span class="bg-on-secondary-fixed-variant text-on-secondary font-label-sm text-label-sm px-3 py-1 rounded-full">ADA Member</span>
					<span class="bg-on-secondary-fixed-variant text-on-secondary font-label-sm text-label-sm px-3 py-1 rounded-full">AACD Accredited</span>
					<span class="bg-primary-container text-on-primary-container font-label-sm text-label-sm px-3 py-1 rounded-full font-semibold">Invisalign Diamond Provider</span>
				</div>
				<div class="flex flex-wrap gap-3 pt-2">
					<a class="inline-flex items-center gap-2 bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md px-5 py-2.5 rounded-full transition-all" href="<?php echo esc_url( lumina_url( 'book' ) ); ?>">
						<span class="material-symbols-outlined text-lg" aria-hidden="true">calendar_month</span> Book an appointment
					</a>
					<a class="inline-flex items-center gap-2 bg-on-secondary-fixed-variant text-on-secondary font-title-md text-title-md px-5 py-2.5 rounded-full transition-all" href="<?php echo esc_url( lumina_url( 'phone' ) ); ?>">
						<span class="material-symbols-outlined text-lg" aria-hidden="true">call</span> <?php echo esc_html( $lumina_f['phone_disp'] ); ?>
					</a>
				</div>
			</div>

			<div>
				<h2 class="font-title-md text-title-md text-on-secondary mb-4 uppercase tracking-wider font-semibold">Clinical Care</h2>
				<ul class="space-y-2.5 font-body-sm text-body-sm text-secondary-fixed-dim">
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'why' ) ); ?>">Why Choose Lumina</a></li>
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'implants' ) ); ?>">All-on-4 Implants</a></li>
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'veneers' ) ); ?>">Microscopic Veneers</a></li>
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'preventive' ) ); ?>">Air-Flow Biotherapy</a></li>
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'sedation' ) ); ?>">Sedation Dentistry</a></li>
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'services' ) ); ?>">All treatments</a></li>
				</ul>
			</div>

			<div>
				<h2 class="font-title-md text-title-md text-on-secondary mb-4 uppercase tracking-wider font-semibold">Patient Portal</h2>
				<ul class="space-y-2.5 font-body-sm text-body-sm text-secondary-fixed-dim">
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'book' ) ); ?>">Schedule Consultation</a></li>
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'pricing' ) ); ?>">Fee Schedule &amp; Financing</a></li>
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'reviews' ) ); ?>">Smile Gallery Archive</a></li>
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'financing' ) ); ?>">Insurance &amp; Coverage FAQ</a></li>
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'emergency' ) ); ?>">Emergency Triage Intake</a></li>
					<li><a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'new_patients' ) ); ?>">New Patient Information</a></li>
				</ul>
			</div>

			<div>
				<h2 class="font-title-md text-title-md text-on-secondary mb-4 uppercase tracking-wider font-semibold">Clinic &amp; Hours</h2>
				<div class="space-y-3 font-body-sm text-body-sm text-secondary-fixed-dim">
					<p class="flex items-start gap-2">
						<span class="material-symbols-outlined text-sm text-primary-fixed shrink-0" aria-hidden="true">location_on</span>
						<span><?php echo esc_html( $lumina_f['street'] ); ?><br /><?php echo esc_html( $lumina_f['city'] . ', ' . $lumina_f['region'] . ' ' . $lumina_f['postal'] ); ?></span>
					</p>
					<p class="flex items-center gap-2">
						<span class="material-symbols-outlined text-sm text-primary-fixed shrink-0" aria-hidden="true">schedule</span>
						<span>Mon – Fri: 7:00 AM – 7:00 PM<br />Sat: 8:00 AM – 3:00 PM</span>
					</p>
					<p class="flex items-center gap-2 text-primary-fixed font-semibold">
						<span class="material-symbols-outlined text-sm shrink-0" aria-hidden="true">call</span>
						<span>24/7 Hotline: <?php echo esc_html( $lumina_f['phone_disp'] ); ?></span>
					</p>
					<p class="flex items-center gap-2">
						<span class="material-symbols-outlined text-sm text-primary-fixed shrink-0" aria-hidden="true">mail</span>
						<a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'email' ) ); ?>"><?php echo esc_html( $lumina_f['email'] ); ?></a>
					</p>
					<div class="pt-2">
						<?php lumina_search_form( 'footer' ); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="py-8 border-b border-on-secondary-fixed-variant flex flex-wrap items-center justify-between gap-4">
			<div class="flex flex-wrap items-center gap-3 text-secondary-fixed-dim font-body-sm text-body-sm">
				<span class="text-on-secondary font-semibold">Regional Care Areas:</span>
				<?php foreach ( $lumina_f['areas'] as $i => $area ) : ?>
					<?php if ( $i ) : ?><span aria-hidden="true">•</span><?php endif; ?>
					<span><?php echo esc_html( $area ); ?></span>
				<?php endforeach; ?>
			</div>
			<div class="flex flex-wrap items-center gap-4 text-secondary-fixed-dim font-label-md text-label-md">
				<span class="text-on-secondary font-medium">Accepted Plans:</span>
				<?php foreach ( $lumina_f['plans'] as $i => $plan ) : ?>
					<?php if ( $i ) : ?><span aria-hidden="true">•</span><?php endif; ?>
					<span><?php echo esc_html( $plan ); ?></span>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 font-body-sm text-body-sm text-secondary-fixed-dim">
			<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $lumina_f['name'] ); ?>. All rights reserved. Advanced Aesthetics &amp; Surgical Implant Center.</p>
			<div class="flex flex-wrap items-center gap-6">
				<a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'privacy' ) ); ?>">Privacy Policy</a>
				<a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'hipaa' ) ); ?>">HIPAA Notice of Privacy</a>
				<a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'accessibility' ) ); ?>">Accessibility Statement</a>
				<a class="hover:text-primary-fixed transition-colors" href="<?php echo esc_url( lumina_url( 'terms' ) ); ?>">Terms of Clinical Treatment</a>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
