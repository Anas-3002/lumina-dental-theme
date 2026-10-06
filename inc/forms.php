<?php
/**
 * Server-rendered forms.
 *
 * Page content lives in the database as plain HTML, so anything that needs a
 * nonce or an admin-post.php action is injected at render time through a marker:
 *   <!--LUMINA_BOOK_FORM-->     the patient registration / booking form
 *   <!--LUMINA_CONTACT_FORM-->  the shorter contact form
 *
 * @package Lumina_Dental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shared field styling.
 */
function lumina_input_class() {
	return 'w-full bg-surface-container-low px-4 py-3 rounded-xl font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#00685f] transition-all';
}

/**
 * The booking / patient registration form.
 */
function lumina_booking_form( $type = 'book' ) {
	$services = array(
		'exam'        => 'Comprehensive Exam & 3D Scan',
		'whitening'   => 'Laser Teeth Whitening',
		'invisalign'  => 'Invisalign® Clear Aligners',
		'implants'    => 'Dental Implants / All-on-4',
		'veneers'     => 'Handcrafted Porcelain Veneers',
		'crowns'      => 'Same-Day Crown',
		'emergency'   => 'Emergency Dental Relief (Urgent)',
		'hygiene'     => 'Hygiene Visit / Cleaning',
	);
	$coverage = array(
		'insurance' => 'PPO Dental Insurance',
		'cash'      => 'Self-Pay / Lumina Club ($34/mo)',
		'financing' => '0% APR Financing (CareCredit)',
		'unsure'    => 'Not sure yet — please advise',
	);

	ob_start();
	?>
	<div class="bg-surface-container-lowest/95 backdrop-blur-md rounded-3xl shadow-[0_20px_48px_rgba(0,32,29,0.2)] border border-surface-container p-6 md:p-8">
		<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Reserve your appointment</h2>
		<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 mb-6">
			Send this and a clinical coordinator will text you within 10 minutes during opening hours with priority time slots. No card details, no obligation.
		</p>
		<form class="space-y-4" id="lumina-booking-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<?php wp_nonce_field( 'lumina_register', 'lumina_nonce' ); ?>
			<input type="hidden" name="action" value="lumina_register"/>
			<input type="hidden" name="form_type" value="<?php echo esc_attr( $type ); ?>"/>

			<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
				<div>
					<label class="block font-label-md text-label-md text-on-surface font-medium mb-1" for="lumina-full-name">Full legal name</label>
					<input class="<?php echo esc_attr( lumina_input_class() ); ?>" id="lumina-full-name" name="full_name" type="text" placeholder="Elena Vance" required/>
				</div>
				<div>
					<label class="block font-label-md text-label-md text-on-surface font-medium mb-1" for="lumina-phone">Mobile phone (for SMS confirmation)</label>
					<input class="<?php echo esc_attr( lumina_input_class() ); ?>" id="lumina-phone" name="phone" type="tel" placeholder="(512) 890-4421" required/>
				</div>
			</div>

			<div>
				<label class="block font-label-md text-label-md text-on-surface font-medium mb-1" for="lumina-email">Email address</label>
				<input class="<?php echo esc_attr( lumina_input_class() ); ?>" id="lumina-email" name="email" type="email" placeholder="elena@example.com"/>
			</div>

			<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
				<div>
					<label class="block font-label-md text-label-md text-on-surface font-medium mb-1" for="lumina-need">Primary dental need</label>
					<select class="<?php echo esc_attr( lumina_input_class() ); ?>" id="lumina-need" name="need">
						<?php foreach ( $services as $value => $label ) : ?>
							<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div>
					<label class="block font-label-md text-label-md text-on-surface font-medium mb-1" for="lumina-coverage">Coverage option</label>
					<select class="<?php echo esc_attr( lumina_input_class() ); ?>" id="lumina-coverage" name="coverage">
						<?php foreach ( $coverage as $value => $label ) : ?>
							<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<fieldset>
				<legend class="block font-label-md text-label-md text-on-surface font-medium mb-2">Preferred time window</legend>
				<div class="grid grid-cols-3 gap-2">
					<?php
					$slots = array( 'morning' => 'Morning', 'afternoon' => 'Afternoon', 'evening' => 'Evening' );
					foreach ( $slots as $value => $label ) :
						?>
						<label class="flex items-center justify-center p-3 rounded-xl bg-surface-container-low hover:bg-surface-container has-[:checked]:bg-primary has-[:checked]:text-on-primary cursor-pointer transition-all">
							<input class="hidden" name="hero_time" type="radio" value="<?php echo esc_attr( $value ); ?>"<?php checked( 'morning', $value ); ?>/>
							<span class="font-label-md text-label-md font-semibold"><?php echo esc_html( $label ); ?></span>
						</label>
					<?php endforeach; ?>
				</div>
			</fieldset>

			<div>
				<label class="block font-label-md text-label-md text-on-surface font-medium mb-1" for="lumina-message">Anything we should know? (optional)</label>
				<textarea class="<?php echo esc_attr( lumina_input_class() ); ?>" id="lumina-message" name="message" rows="3" placeholder="Nervous patient, past trauma, specific tooth, insurance details&hellip;"></textarea>
			</div>

			<button class="w-full bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md py-4 rounded-full shadow-[0_8px_20px_rgba(0,104,95,0.4)] transition-all font-semibold flex items-center justify-center gap-2" type="submit">
				<span>Request my appointment</span>
				<span class="material-symbols-outlined text-lg" aria-hidden="true">check_circle</span>
			</button>
			<p class="font-label-sm text-label-sm text-outline flex items-start gap-2">
				<span class="material-symbols-outlined text-sm text-primary" aria-hidden="true">lock</span>
				<span>Sent over a secure connection and stored in our practice system. HIPAA compliant and 100% confidential. This is a request, not a confirmed booking — we will contact you to agree a time.</span>
			</p>
		</form>
	</div>
	<?php
	return ob_get_clean();
}

/**
 * Short contact form.
 */
function lumina_contact_form( $type = 'contact' ) {
	ob_start();
	?>
	<form class="space-y-4 bg-surface-container-lowest rounded-3xl border border-surface-container p-6 md:p-8" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<?php wp_nonce_field( 'lumina_register', 'lumina_nonce' ); ?>
		<input type="hidden" name="action" value="lumina_register"/>
		<input type="hidden" name="form_type" value="<?php echo esc_attr( $type ); ?>"/>
		<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
			<div>
				<label class="block font-label-md text-label-md text-on-surface font-medium mb-1" for="lumina-c-name">Your name</label>
				<input class="<?php echo esc_attr( lumina_input_class() ); ?>" id="lumina-c-name" name="full_name" type="text" required/>
			</div>
			<div>
				<label class="block font-label-md text-label-md text-on-surface font-medium mb-1" for="lumina-c-phone">Phone</label>
				<input class="<?php echo esc_attr( lumina_input_class() ); ?>" id="lumina-c-phone" name="phone" type="tel" required/>
			</div>
		</div>
		<div>
			<label class="block font-label-md text-label-md text-on-surface font-medium mb-1" for="lumina-c-email">Email</label>
			<input class="<?php echo esc_attr( lumina_input_class() ); ?>" id="lumina-c-email" name="email" type="email"/>
		</div>
		<div>
			<label class="block font-label-md text-label-md text-on-surface font-medium mb-1" for="lumina-c-msg">How can we help?</label>
			<textarea class="<?php echo esc_attr( lumina_input_class() ); ?>" id="lumina-c-msg" name="message" rows="4" required></textarea>
		</div>
		<button class="w-full bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md py-3.5 rounded-full transition-all font-semibold" type="submit">
			<span>Send message</span>
		</button>
	</form>
	<?php
	return ob_get_clean();
}

/**
 * Swap the markers in stored content for the rendered forms.
 */
function lumina_render_form_markers( $content ) {
	if ( false !== strpos( $content, '<!--LUMINA_BOOK_FORM-->' ) ) {
		$content = str_replace( '<!--LUMINA_BOOK_FORM-->', lumina_booking_form( 'book' ), $content );
	}
	if ( false !== strpos( $content, '<!--LUMINA_CONTACT_FORM-->' ) ) {
		$content = str_replace( '<!--LUMINA_CONTACT_FORM-->', lumina_contact_form( 'contact' ), $content );
	}
	return $content;
}
add_filter( 'the_content', 'lumina_render_form_markers', 20 );
