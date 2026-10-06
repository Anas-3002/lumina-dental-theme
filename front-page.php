<?php
/**
 * Front page: the Lumina Dental Studio landing page.
 *
 * @package Lumina_Dental
 */

get_header();
?>
<div class="flex flex-col w-full">
<!-- ================= 1. HERO SECTION (ABOVE THE FOLD) ================= -->
<section class="relative w-full overflow-hidden bg-gradient-to-b from-surface via-surface-container-lowest to-surface pt-8 pb-16 lg:py-20" id="hero">
<!-- Ambient Teallight Glow Backdrops -->
<div class="pointer-events-none absolute -top-40 -left-40 h-[500px] w-[500px] rounded-full bg-primary-fixed/20 blur-3xl"></div>
<div class="pointer-events-none absolute top-1/3 -right-32 h-[450px] w-[450px] rounded-full bg-secondary-container/30 blur-3xl"></div>
<div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
<!-- Top Authority Micro Bar -->
<div class="flex flex-wrap items-center gap-3 mb-6">
<div class="inline-flex items-center gap-2 bg-surface-container-lowest px-3.5 py-1.5 rounded-full shadow-sm">
<div class="flex text-tertiary">
<span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<span class="font-label-md text-label-md text-on-surface font-semibold">4.9/5 from 1,280+ Verified Patients</span>
</div>
<span class="hidden sm:inline-flex items-center gap-1.5 bg-surface-container-low px-3 py-1.5 rounded-full font-label-md text-label-md text-on-surface-variant font-medium">
<span class="material-symbols-outlined text-sm text-primary">verified</span> Over 12,000 Smiles Perfected
        </span>
<span class="inline-flex items-center gap-1.5 bg-tertiary-fixed/30 px-3 py-1.5 rounded-full font-label-sm text-label-sm text-tertiary font-bold tracking-wide uppercase">
          Board-Certified ADA Specialists
        </span>
</div>
<!-- Main Hero 2-Column Split -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
<!-- Left Column: Compelling Hooks & Action -->
<div class="lg:col-span-7 space-y-6">
<div class="space-y-4">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold bg-primary-fixed/30 px-3 py-1 rounded-full">
              Painless Laser Dental Sanctuary
            </span>
<h1 class="font-display-hero text-display-hero-mobile md:text-display-hero text-on-surface tracking-tight leading-[1.08]">
              Dentistry Reimagined: <br/>
<span class="text-primary underline decoration-primary-fixed decoration-wavy decoration-2">Zero Pain</span>, Zero Shame, <br/>
              Just Picture-Perfect Smiles.
            </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl">
              Experience precision laser dentistry, soothing noise-cancelling suites, and same-day porcelain restorations in an anxiety-free sanctuary. Welcoming new patients with immediate transparent pricing.
            </p>
</div>
<!-- CTAs -->
<div class="flex flex-wrap items-center gap-4 pt-2">
<a class="bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md px-8 py-4 rounded-full shadow-[0_12px_28px_rgba(0,104,95,0.28)] hover:shadow-[0_16px_36px_rgba(0,104,95,0.38)] hover:-translate-y-0.5 active:translate-y-0 transition-all flex items-center gap-2 font-semibold" href="#quick-reserve">
<span>Book Your First Visit ($99 Special)</span>
<span class="material-symbols-outlined text-lg">calendar_month</span>
</a>
<a class="bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-title-md text-title-md px-6 py-4 rounded-full shadow-sm hover:shadow-md transition-all flex items-center gap-1.5" href="#transformations">
<span>Explore Patient Results</span>
<span class="material-symbols-outlined text-lg">arrow_outward</span>
</a>
</div>
<!-- Doctor Credential Card -->
<div class="bg-surface-container-lowest/90 backdrop-blur-md rounded-2xl p-4 shadow-sm flex items-center gap-4 max-w-lg mt-6">
<img class="w-16 h-16 rounded-full object-cover shadow-sm shrink-0" data-alt="Portrait of Dr. Sarah Jenkins, an empathetic female cosmetic dentist in pristine modern teal surgical scrubs smiling warmly inside a bright contemporary architectural clinic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAD_LzRhsdqyHFWJCUzrdU-GT8pdMb_he5aOBb1ytQe4UQ3bTqDcGAF0qf-g-kINVWbODOgqJvFPWNatYw3PcwAgrKpJ776M3j7bFeaLu5C8jp7ykfZ7W2JfTrowpGK6JwfdRituidmGsnI-4lMcjTMRq7K4OYhZ9RujBaI5w9Uv7dDIbUbhPybDb-p8ZDX2N5PK2vasP36GjlFsmL3K1zlEgBjusrw7zdOIADuEkuz"/>
<div class="min-w-0">
<div class="flex items-center gap-2">
<h4 class="font-title-md text-title-md text-on-surface font-bold truncate">Dr. Sarah Jenkins, DDS, FAGD</h4>
<span class="material-symbols-outlined text-primary text-base" title="Verified Specialist">verified</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Clinical Director • Voted "Best Cosmetic Dentist 2024"</p>
<div class="flex items-center gap-2 mt-1">
<span class="inline-block w-2 h-2 rounded-full bg-primary animate-pulse"></span>
<span class="font-label-sm text-label-sm text-primary font-semibold">Accepting 14 New Patients for March</span>
</div>
</div>
</div>
</div>
<!-- Right Column: High-Converting Priority Slot Registration Form -->
<div class="lg:col-span-5" id="quick-reserve">
<div class="bg-surface-container-lowest/95 backdrop-blur-xl rounded-3xl p-6 sm:p-8 shadow-[0_16px_40px_rgba(0,32,29,0.08)] relative overflow-hidden">
<div class="absolute top-0 right-0 bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-4 py-1.5 rounded-bl-2xl font-bold tracking-wider uppercase">
              $150 Voucher Applied
            </div>
<div class="mb-5 pr-16">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Priority Intake</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Claim Voucher &amp; Reserve Slot</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">3D Scan, Exam &amp; Consultation in 60 seconds.</p>
</div>
<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="space-y-3.5" id="hero-reservation-form">
<?php wp_nonce_field( 'lumina_register', 'lumina_nonce' ); ?>
<input type="hidden" name="action" value="lumina_register"/>
<input type="hidden" name="form_type" value="hero"/>
<div>
<label class="block font-label-md text-label-md text-on-surface font-medium mb-1">Full Legal Name</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-outline text-lg">person</span>
<input class="w-full bg-surface-container-low pl-10 pr-4 py-2.5 rounded-xl font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#00685f] transition-all" placeholder="Elena Vance" required="" type="text" name="full_name"/>
</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface font-medium mb-1">Mobile Phone (For Instant SMS Confirmation)</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-outline text-lg">smartphone</span>
<input class="w-full bg-surface-container-low pl-10 pr-4 py-2.5 rounded-xl font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#00685f] transition-all" placeholder="(512) 890-4421" required="" type="tel" name="phone"/>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
<div>
<label class="block font-label-md text-label-md text-on-surface font-medium mb-1">Primary Dental Need</label>
<select class="w-full bg-surface-container-low px-3 py-2.5 rounded-xl font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#00685f] transition-all" name="need">
<option value="exam">Comprehensive Exam &amp; 3D Scan</option>
<option value="whitening">Laser Teeth Whitening</option>
<option value="invisalign">Invisalign® Clear Aligners</option>
<option value="emergency">Emergency Dental Relief (Urgent)</option>
<option value="veneers">Handcrafted Porcelain Veneers</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface font-medium mb-1">Coverage Option</label>
<select class="w-full bg-surface-container-low px-3 py-2.5 rounded-xl font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#00685f] transition-all" name="coverage">
<option value="insurance">PPO Dental Insurance</option>
<option value="cash">Self-Pay / Lumina Club ($34/mo)</option>
<option value="financing">0% APR Financing (CareCredit)</option>
</select>
</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface font-medium mb-1.5">Preferred Time Window</label>
<div class="grid grid-cols-3 gap-2">
<label class="flex items-center justify-center p-2 rounded-xl bg-surface-container-low hover:bg-surface-container has-[:checked]:bg-primary has-[:checked]:text-on-primary cursor-pointer transition-all">
<input checked="" class="hidden" name="hero_time" type="radio" value="morning"/>
<span class="font-label-md text-label-md font-semibold">Morning</span>
</label>
<label class="flex items-center justify-center p-2 rounded-xl bg-surface-container-low hover:bg-surface-container has-[:checked]:bg-primary has-[:checked]:text-on-primary cursor-pointer transition-all">
<input class="hidden" name="hero_time" type="radio" value="afternoon"/>
<span class="font-label-md text-label-md font-semibold">Afternoon</span>
</label>
<label class="flex items-center justify-center p-2 rounded-xl bg-surface-container-low hover:bg-surface-container has-[:checked]:bg-primary has-[:checked]:text-on-primary cursor-pointer transition-all">
<input class="hidden" name="hero_time" type="radio" value="evening"/>
<span class="font-label-md text-label-md font-semibold">Evening</span>
</label>
</div>
</div>
<button class="w-full mt-2 bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md py-3.5 rounded-full shadow-[0_8px_20px_rgba(0,104,95,0.25)] hover:shadow-[0_12px_28px_rgba(0,104,95,0.35)] transition-all font-semibold flex items-center justify-center gap-2" type="submit">
<span>Claim $150 Voucher &amp; Reserve Spot</span>
<span class="material-symbols-outlined text-lg">check_circle</span>
</button>
<div class="text-center pt-1">
<p class="font-label-sm text-label-sm text-outline flex items-center justify-center gap-1.5">
<span class="material-symbols-outlined text-xs text-primary">lock</span>
<span>HIPAA Compliant &amp; 100% Confidential • Instant SMS confirmation</span>
</p>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<!-- ================= 2. TRUST & LOGO STRIP + STAT COUNTERS ================= -->
<section class="w-full bg-surface-container-lowest py-10 shadow-sm" id="trust">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="text-center mb-8">
<p class="font-label-sm text-label-sm uppercase tracking-widest text-outline font-bold">
          Trusted by 14,000+ Patients &amp; Recognized by Leading Medical Institutions
        </p>
</div>
<!-- Trust Badges Grid -->
<div class="flex flex-wrap items-center justify-center gap-6 sm:gap-10 opacity-85">
<div class="flex items-center gap-2 text-on-surface-variant font-title-md text-title-md font-semibold">
<span class="material-symbols-outlined text-primary text-2xl">verified_user</span>
<span>ADA Member</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-title-md text-title-md font-semibold">
<span class="material-symbols-outlined text-primary text-2xl">award_star</span>
<span>AACD Accredited</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-title-md text-title-md font-semibold">
<span class="material-symbols-outlined text-tertiary text-2xl">diamond</span>
<span>Invisalign Diamond Plus</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-title-md text-title-md font-semibold">
<span class="material-symbols-outlined text-primary text-2xl">payments</span>
<span>CareCredit Certified</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-title-md text-title-md font-semibold">
<span class="material-symbols-outlined text-secondary text-2xl">health_and_safety</span>
<span>Delta • Cigna • MetLife</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-title-md text-title-md font-semibold">
<span class="material-symbols-outlined text-primary text-2xl">workspace_premium</span>
<span>Forbes Health Top 10</span>
</div>
</div>
<!-- Stat Counters Callout Strip -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-10 mt-10 border-t border-surface-container-high text-center">
<div class="space-y-1">
<div class="font-headline-lg text-headline-lg font-bold text-primary">99.4%</div>
<div class="font-body-sm text-body-sm text-on-surface-variant font-medium">Pain-Free Patient Rating</div>
</div>
<div class="space-y-1">
<div class="font-headline-lg text-headline-lg font-bold text-on-surface">15+</div>
<div class="font-body-sm text-body-sm text-on-surface-variant font-medium">Years Clinical Excellence</div>
</div>
<div class="space-y-1">
<div class="font-headline-lg text-headline-lg font-bold text-primary">1-Hour</div>
<div class="font-body-sm text-body-sm text-on-surface-variant font-medium">CEREC Same-Day Crowns</div>
</div>
<div class="space-y-1">
<div class="font-headline-lg text-headline-lg font-bold text-tertiary">0% APR</div>
<div class="font-body-sm text-body-sm text-on-surface-variant font-medium">In-House Flexible Financing</div>
</div>
</div>
</div>
</section>
<!-- ================= 3. PROBLEM & AGITATION: OLD VS. NEW DENTISTRY ================= -->
<section class="w-full py-20 bg-surface" id="old-vs-new">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold bg-primary-fixed/30 px-3 py-1 rounded-full">
          The Sanctuary Transformation
        </span>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-bold">
          Why 68% of People Dread the Dentist — <br class="hidden sm:inline"/>And How Lumina Fixed It Forever.
        </h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">
          Old dental clinics were engineered for clinical efficiency at the expense of human comfort. Lumina redesigns the entire encounter around your senses, dignity, and peace of mind.
        </p>
</div>
<!-- Side-by-Side Matrix -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
<!-- Outdated Dentistry Card -->
<div class="bg-surface-container-high/60 rounded-3xl p-8 sm:p-10 shadow-sm relative overflow-hidden flex flex-col justify-between">
<div class="space-y-6">
<div class="flex items-center gap-3">
<span class="w-10 h-10 rounded-full bg-error-container text-on-error-container flex items-center justify-center font-bold">✕</span>
<div>
<h3 class="font-title-lg text-title-lg text-on-surface font-bold">The Outdated Dental Factory</h3>
<p class="font-body-sm text-body-sm text-outline">What you’ve suffered through for decades</p>
</div>
</div>
<ul class="space-y-4 font-body-md text-body-md text-on-surface-variant">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-error text-xl shrink-0 mt-0.5">cancel</span>
<span><strong>Blinding fluorescent ceiling lights</strong> shining directly into your uncovered eyes during lengthy procedures.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-error text-xl shrink-0 mt-0.5">cancel</span>
<span><strong>High-pitched screeching drills</strong> and needle injections causing involuntary anxiety and phantom pain.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-error text-xl shrink-0 mt-0.5">cancel</span>
<span><strong>Cold, antiseptic clinical smells</strong> that instantly trigger medical apprehension the moment you step in.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-error text-xl shrink-0 mt-0.5">cancel</span>
<span><strong>Surprise $1,200 mail bills</strong> weeks later due to hidden codes, unexplained fees, and zero cost clarity.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-error text-xl shrink-0 mt-0.5">cancel</span>
<span><strong>Rushed 7-minute exams</strong> with condescending dentists lecturing and shaming you for skipping appointments.</span>
</li>
</ul>
</div>
<div class="mt-8 pt-4 bg-surface-container-highest/60 rounded-xl p-4 text-center">
<span class="font-label-md text-label-md text-on-surface-variant font-medium">Result: Delayed care, worsening pain, and chronic dental anxiety.</span>
</div>
</div>
<!-- The Lumina Sanctuary Experience Card -->
<div class="bg-surface-container-lowest rounded-3xl p-8 sm:p-10 shadow-[0_16px_40px_rgba(0,104,95,0.08)] relative overflow-hidden flex flex-col justify-between">
<div class="space-y-6">
<div class="flex items-center gap-3">
<span class="w-10 h-10 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center font-bold">
<span class="material-symbols-outlined text-xl">check</span>
</span>
<div>
<h3 class="font-title-lg text-title-lg text-primary font-bold">The Lumina Sanctuary Experience</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Designed from the ground up for deep calm</p>
</div>
</div>
<ul class="space-y-4 font-body-md text-body-md text-on-surface">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-xl shrink-0 mt-0.5">check_circle</span>
<span><strong>Heated ergonomic massage chairs</strong> with soft ceiling screens streaming Netflix or serene nature panoramas.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-xl shrink-0 mt-0.5">check_circle</span>
<span><strong>Virtually soundless Swiss air-lasers:</strong> Zero needles and zero mechanical vibration for most routine cavities.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-xl shrink-0 mt-0.5">check_circle</span>
<span><strong>Organic lavender aromatherapy</strong> and Bose noise-canceling headphones playing customized relaxing soundscapes.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-xl shrink-0 mt-0.5">check_circle</span>
<span><strong>100% upfront guaranteed price quote:</strong> You approve every cent before any instrument touches your mouth.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-xl shrink-0 mt-0.5">check_circle</span>
<span><strong>Warm, 100% judgment-free dialogue:</strong> We meet you where you are, celebrate your return, and prioritize your goals.</span>
</li>
</ul>
</div>
<div class="mt-8 pt-4 bg-primary-fixed/25 rounded-xl p-4 text-center">
<span class="font-label-md text-label-md text-primary font-bold">Result: 99.4% of patients look forward to their routine visits.</span>
</div>
</div>
</div>
</div>
</section>
<!-- ================= 4. CORE VALUE PROPOSITION & 4 CLINICAL PILLARS ================= -->
<section class="w-full py-20 bg-surface-container-low" id="why-lumina">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold bg-surface-container-lowest px-3 py-1 rounded-full shadow-sm">
          Precision Technology
        </span>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-bold">
          The 4 Pillars of Gentle Clinical Mastery
        </h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">
          We combine Swiss optical lasers, AI restorative diagnostics, and hospital-grade air purification to ensure painless, flawless treatments.
        </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Pillar 1 -->
<div class="bg-surface-container-lowest p-7 rounded-3xl shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between space-y-6">
<div class="space-y-4">
<div class="w-14 h-14 rounded-2xl bg-primary-fixed/30 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-3xl">mobile_ticket</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-snug">Precision Air-Laser Comfort</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
              Targeted water-laser photons vaporize decay silently. 90% of cavities are treated without local anesthetic needles or numbness.
            </p>
</div>
<div class="pt-4 border-t border-surface-container flex items-center gap-2 text-primary font-title-md text-title-md font-semibold">
<span>Learn Laser Care</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</div>
</div>
<!-- Pillar 2 -->
<div class="bg-surface-container-lowest p-7 rounded-3xl shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between space-y-6">
<div class="space-y-4">
<div class="w-14 h-14 rounded-2xl bg-secondary-container text-on-secondary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-3xl">view_in_ar</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-snug">AI-Powered 3D Scanning</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
              Say goodbye to gag-inducing impression goop. Our iTero 5D scanners map 6,000 frames/sec for instantaneous 4K smile simulation.
            </p>
</div>
<div class="pt-4 border-t border-surface-container flex items-center gap-2 text-primary font-title-md text-title-md font-semibold">
<span>View 3D Tech</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</div>
</div>
<!-- Pillar 3 -->
<div class="bg-surface-container-lowest p-7 rounded-3xl shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between space-y-6">
<div class="space-y-4">
<div class="w-14 h-14 rounded-2xl bg-tertiary-fixed/40 text-tertiary flex items-center justify-center">
<span class="material-symbols-outlined text-3xl">precision_manufacturing</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-snug">Same-Day CEREC Crowns</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
              No temporary crowns or 3-week waits. Our in-house German robotic milling unit crafts durable monolithic porcelain in 60 minutes.
            </p>
</div>
<div class="pt-4 border-t border-surface-container flex items-center gap-2 text-primary font-title-md text-title-md font-semibold">
<span>Explore CEREC</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</div>
</div>
<!-- Pillar 4 -->
<div class="bg-surface-container-lowest p-7 rounded-3xl shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between space-y-6">
<div class="space-y-4">
<div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-3xl">air</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-snug">Hospital Biolytic Sterility</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
              Continuous negative pressure surgical suites with surgical HEPA filtration, exchanging room volume every 3.5 minutes for ultra-purity.
            </p>
</div>
<div class="pt-4 border-t border-surface-container flex items-center gap-2 text-primary font-title-md text-title-md font-semibold">
<span>Review Protocols</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</div>
</div>
</div>
</div>
</section>
<!-- ================= 5. FEATURE BREAKDOWN (BENTO GRID) ================= -->
<section class="w-full py-20 bg-surface" id="treatments">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold bg-primary-fixed/30 px-3 py-1 rounded-full">
            Signature Amenities
          </span>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-bold mt-2">
            The Bento of Mindful Dental Luxury
          </h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-md">
          Every touchpoint has been curated to transform routine appointments into a spa-like physical reset.
        </p>
</div>
<!-- Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
<!-- Bento 1: Large 2-Col Card -->
<div class="md:col-span-2 lg:col-span-2 bg-gradient-to-br from-surface-container-lowest to-surface-container-low p-8 rounded-3xl shadow-sm flex flex-col justify-between space-y-6">
<div class="space-y-4">
<span class="inline-flex items-center gap-1.5 bg-primary-fixed/40 text-on-primary-fixed font-label-sm text-label-sm px-3 py-1 rounded-full font-bold">
<span class="material-symbols-outlined text-sm">spa</span> COMPLIMENTARY COMFORT MENU
            </span>
<h3 class="font-headline-md text-headline-md text-on-surface font-bold">
              Unwind With Your Personal Sensory Care Menu
            </h3>
<p class="font-body-md text-body-md text-on-surface-variant max-w-lg">
              Upon arrival, select your customized preferences from our digital concierge: warm organic lavender facial towels, weighted gravity blankets, Bose QuietComfort noise-cancelling headphones, temple acupressure, or gentle nitrous sedation.
            </p>
</div>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-4">
<div class="bg-surface-container-lowest p-3 rounded-2xl text-center shadow-sm">
<span class="material-symbols-outlined text-primary text-2xl">headphones</span>
<p class="font-label-md text-label-md text-on-surface font-semibold mt-1">Noise Cancelling</p>
</div>
<div class="bg-surface-container-lowest p-3 rounded-2xl text-center shadow-sm">
<span class="material-symbols-outlined text-primary text-2xl">bed</span>
<p class="font-label-md text-label-md text-on-surface font-semibold mt-1">Weighted Blankets</p>
</div>
<div class="bg-surface-container-lowest p-3 rounded-2xl text-center shadow-sm">
<span class="material-symbols-outlined text-primary text-2xl">hot_tub</span>
<p class="font-label-md text-label-md text-on-surface font-semibold mt-1">Lavender Towels</p>
</div>
<div class="bg-surface-container-lowest p-3 rounded-2xl text-center shadow-sm">
<span class="material-symbols-outlined text-primary text-2xl">self_improvement</span>
<p class="font-label-md text-label-md text-on-surface font-semibold mt-1">Temple Massage</p>
</div>
</div>
</div>
<!-- Bento 2: 3D Smile Simulation Preview -->
<div class="md:col-span-1 lg:col-span-2 bg-surface-container-lowest p-8 rounded-3xl shadow-sm flex flex-col justify-between space-y-4">
<div class="space-y-3">
<div class="w-12 h-12 rounded-xl bg-tertiary-fixed/30 text-tertiary flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">model_training</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">
              3D Smile Simulation Preview
            </h3>
<p class="font-body-md text-body-md text-on-surface-variant">
              See your completed smile on screen before making a single decision. Our digital photogrammetry simulator forecasts your exact aesthetic outcome in photorealistic 4K.
            </p>
</div>
<div class="bg-surface-container-low rounded-2xl p-4 flex items-center gap-3">
<span class="material-symbols-outlined text-primary">visibility</span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Included complimentary with all new patient consultations.</span>
</div>
</div>
<!-- Bento 3: Emergency Same-Day Relief -->
<div class="md:col-span-1 lg:col-span-1 bg-surface-container-lowest p-6 rounded-3xl shadow-sm flex flex-col justify-between space-y-4">
<div class="space-y-3">
<div class="w-12 h-12 rounded-xl bg-error-container text-error flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">e911_emergency</span>
</div>
<h4 class="font-title-lg text-title-lg text-on-surface font-bold">2-Hour Emergency Relief</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Severe toothache, chipped veneer, or trauma? We reserve daily rapid response slots for immediate pain relief within 120 minutes.
            </p>
</div>
<a class="text-error font-title-md text-title-md font-semibold flex items-center gap-1 hover:underline" href="tel:8005864621">
<span>Call Emergency Desk</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
<!-- Bento 4: Holistic & Biocompatible Materials -->
<div class="md:col-span-1 lg:col-span-2 bg-surface-container-lowest p-6 sm:p-8 rounded-3xl shadow-sm flex flex-col justify-between space-y-4">
<div class="space-y-3">
<div class="w-12 h-12 rounded-xl bg-primary-fixed/40 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">eco</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">100% Biocompatible &amp; BPA-Free</h4>
<p class="font-body-md text-body-md text-on-surface-variant">
              We exclusively utilize biocompatible composite polymers, metal-free Swiss zirconia implants, and clean fluoride alternatives tested for biological integration with zero toxic leaching.
            </p>
</div>
<div class="flex flex-wrap gap-2">
<span class="bg-surface-container px-3 py-1 rounded-full font-label-sm text-label-sm text-on-surface font-medium">BPA-Free Composites</span>
<span class="bg-surface-container px-3 py-1 rounded-full font-label-sm text-label-sm text-on-surface font-medium">Metal-Free Zirconia</span>
<span class="bg-surface-container px-3 py-1 rounded-full font-label-sm text-label-sm text-on-surface font-medium">Fluoride-Free Polish Options</span>
</div>
</div>
<!-- Bento 5: Family & Pediatric Gentle Suite -->
<div class="md:col-span-1 lg:col-span-1 bg-surface-container-lowest p-6 rounded-3xl shadow-sm flex flex-col justify-between space-y-4">
<div class="space-y-3">
<div class="w-12 h-12 rounded-xl bg-secondary-container text-on-secondary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">family_restroom</span>
</div>
<h4 class="font-title-lg text-title-lg text-on-surface font-bold">Gentle Family &amp; Pediatric</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Positive first-time experiences for kids, needle-free laser cavity treatments, and synchronized family back-to-back appointments.
            </p>
</div>
<span class="font-label-sm text-label-sm text-primary font-bold">Painless Kids Guarantee →</span>
</div>
</div>
</div>
</section>
<!-- ================= 6. DEEP SOCIAL PROOF & BEFORE/AFTER CASE STUDIES ================= -->
<section class="w-full py-20 bg-surface-container-low" id="transformations">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold bg-surface-container-lowest px-3 py-1 rounded-full shadow-sm">
          Verified Clinical Transformations
        </span>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-bold">
          Life-Changing Smiles, Documented
        </h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">
          Real cases. Unedited clinical photography. Genuine emotional testimonials from patients who regained their confidence.
        </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Case 1 -->
<div class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col">
<div class="relative h-64 w-full">
<img class="w-full h-full object-cover" data-alt="Close up medical aesthetic photography of a female patient smiling radiantly showcasing handcrafted porcelain veneers, bright natural translucent tooth shade, perfect gum contours, high key clean dental studio lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBjwMuluACfxGk-CAS283ZHTqyAVHPfElE16UV8PH08xS5xVNG0GgYEahRjFNj7-gOmYmlJNQSwuH8kzp5NELrjPpbRXStfELIs7MNd8XMBv13vx35KD9alR1hbqWs7BnOV1dIMqaGjilLQA-LQwhbjWNb4S_bQEJD8xENecNqPJ2ZxblQ_xHon1j6wBmy_4kY-NDkzirNx2mDpefWpIcKPkDNd9W8W-5xiQ2FZLKG"/>
<div class="absolute bottom-3 left-3 bg-on-secondary-fixed/90 backdrop-blur-md text-on-secondary px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold">
              Porcelain Veneers • 48 Hours
            </div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between space-y-4">
<div class="space-y-2">
<div class="flex items-center justify-between">
<h4 class="font-title-lg text-title-lg text-on-surface font-bold">Elena R., 34</h4>
<span class="text-tertiary flex text-sm">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
</span>
</div>
<p class="font-body-md text-body-md text-on-surface italic">
                “I hid my smile for 12 years behind my hand. After Dr. Jenkins completed my veneer design in two visits, I smile with zero hesitation in every single board meeting.”
              </p>
</div>
<div class="pt-3 border-t border-surface-container flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>Verified Google Patient</span>
<span class="text-primary font-bold">View Full Gallery →</span>
</div>
</div>
</div>
<!-- Case 2 -->
<div class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col">
<div class="relative h-64 w-full">
<img class="w-full h-full object-cover" data-alt="Portrait of an attractive 42-year-old male entrepreneur with a healthy wide natural aligned smile after clear aligner orthodontic treatment, illuminated in soft diffused clinic daylight" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdeSPDQRSwOotBV8aw_7FKvP5NqKdSw7Vazrmi3jBPNx2UmzxMZb3eN5-KVkize3XVr0gT3zQ8VFZddg8fPx9EB-PXM1Q5TPfCbd8DMuk5V7MdrBADassYOztb2eKoWpCmTAn1sMJHRTkV476EdFsHJnyYKkIT_BLH2Tceguf3Qr5Thvkd5rcCT5k0mKozLVjXK_pyezz_XZc1PIl1GR1wqzwmSdsTS3ZTffnMbn1E"/>
<div class="absolute bottom-3 left-3 bg-on-secondary-fixed/90 backdrop-blur-md text-on-secondary px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold">
              Invisalign &amp; Whitening • 6 Months
            </div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between space-y-4">
<div class="space-y-2">
<div class="flex items-center justify-between">
<h4 class="font-title-lg text-title-lg text-on-surface font-bold">Marcus T., 42</h4>
<span class="text-tertiary flex text-sm">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
</span>
</div>
<p class="font-body-md text-body-md text-on-surface italic">
                “No metal brackets, completely painless, and my bite is finally aligned without headaches. The 3D scan on day one predicted the exact outcome six months later.”
              </p>
</div>
<div class="pt-3 border-t border-surface-container flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>Verified ZocDoc Patient</span>
<span class="text-primary font-bold">View Full Gallery →</span>
</div>
</div>
</div>
<!-- Case 3 -->
<div class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col">
<div class="relative h-64 w-full">
<img class="w-full h-full object-cover" data-alt="Candid authentic photo of a happy modern family, young mother, father, and a smiling 7-year-old daughter leaving a bright luxury dental boutique in high spirits" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7b429CkSvVnFZz_0XBkPQEob8h-7u1e97RJ87JaYy2oo-4Rf-9la6HhV4wgLm_sxKY9nvgOhL_LxicldSOaKYZVMWtZ2yoJiY5wqKhec5Ic7Qu2t5eSCUYvQrfhUFS2MrYkTHdWvYNyPOqRQuHj5K8enVe4sRgR8aoDr_nKnHEkQSy5z9Qd_gRnHHjIKjSU1WGJ9tHXQS7vkVX48Qx6AMkAzdSsh84Zk3Au8RcM5g"/>
<div class="absolute bottom-3 left-3 bg-on-secondary-fixed/90 backdrop-blur-md text-on-secondary px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold">
              Complete Family Dental Care
            </div>
</div>
<div class="p-6 flex-1 flex flex-col justify-between space-y-4">
<div class="space-y-2">
<div class="flex items-center justify-between">
<h4 class="font-title-lg text-title-lg text-on-surface font-bold">David &amp; Clara K.</h4>
<span class="text-tertiary flex text-sm">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
</span>
</div>
<p class="font-body-md text-body-md text-on-surface italic">
                “Our 7-year-old daughter actually asks when we get to go back to Lumina! The Disney ceiling projection and gentle laser cleaning eliminated every trace of fear.”
              </p>
</div>
<div class="pt-3 border-t border-surface-container flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
<span>Verified Google Patient</span>
<span class="text-primary font-bold">View Full Gallery →</span>
</div>
</div>
</div>
</div>
<!-- Testimonial Video Cue Banner -->
<div class="mt-12 bg-surface-container-lowest rounded-2xl p-6 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-6">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-on-primary shrink-0 shadow-md">
<span class="material-symbols-outlined text-2xl">play_arrow</span>
</div>
<div>
<h4 class="font-title-md text-title-md text-on-surface font-bold">Watch Video Case Diaries (180+ Stories)</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Real patients discussing anxiety management, cosmetic veneers, and restorative implants.</p>
</div>
</div>
<a class="bg-surface-container hover:bg-surface-container-high text-on-surface font-title-md text-title-md px-5 py-2.5 rounded-full transition-all" href="#quick-reserve">
          Explore Video Vault
        </a>
</div>
</div>
</section>
<!-- ================= 7. HIGH-CONVERTING PRICING CARDS & MEMBERSHIP PLANS ================= -->
<section class="w-full py-20 bg-surface" id="pricing">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold bg-primary-fixed/30 px-3 py-1 rounded-full">
          Guaranteed Transparent Pricing
        </span>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-bold">
          No Hidden Fees. No Insurance Headaches.
        </h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">
          Choose between seamless PPO insurance claim filing or our direct Lumina Wellness Club for patients without insurance.
        </p>
<!-- Interactive Pricing Toggle -->
<div class="inline-flex items-center p-1.5 bg-surface-container rounded-full mt-4">
<button class="px-5 py-2 rounded-full font-label-md text-label-md font-bold transition-all bg-primary text-on-primary shadow-sm" id="toggle-insurance" onclick="setPricingMode('insurance')">
            Pay-As-You-Go with Insurance
          </button>
<button class="px-5 py-2 rounded-full font-label-md text-label-md font-bold text-on-surface-variant hover:text-on-surface transition-all" id="toggle-club" onclick="setPricingMode('club')">
            Lumina Wellness Club (No Insurance)
          </button>
</div>
</div>
<!-- 3 Tiered Cards -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
<!-- Tier 1 -->
<div class="bg-surface-container-lowest rounded-3xl p-8 shadow-sm flex flex-col justify-between space-y-6">
<div class="space-y-4">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-bold">Introductory Access</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">New Patient Gateway</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Complete clinical baseline assessment, 3D laser scan, and comprehensive treatment roadmap.</p>
<div class="pt-2">
<span class="font-display-hero text-headline-lg text-primary font-bold">$99</span>
<span class="font-body-sm text-body-sm text-outline line-through ml-2 font-medium">$380 Regular Value</span>
</div>
<ul class="space-y-3 font-body-sm text-body-sm text-on-surface pt-4">
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary text-lg">check</span>
<span>Full mouth 4K digital diagnostic x-rays</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary text-lg">check</span>
<span>3D photogrammetry dental scan</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary text-lg">check</span>
<span>Oral cancer screening &amp; perio analysis</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary text-lg">check</span>
<span>1-on-1 consultation with Dr. Jenkins</span>
</li>
</ul>
</div>
<a class="w-full text-center bg-surface-container hover:bg-surface-container-high text-on-surface font-title-md text-title-md py-3.5 rounded-full transition-all font-semibold" href="#quick-reserve">
            Book Gateway Exam ($99)
          </a>
</div>
<!-- Tier 2 (Highlighted) -->
<div class="bg-on-primary-fixed text-on-primary rounded-3xl p-8 shadow-[0_20px_48px_rgba(0,32,29,0.2)] flex flex-col justify-between space-y-6 relative transform lg:-translate-y-2">
<div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-primary text-on-primary font-label-sm text-label-sm px-4 py-1 rounded-full font-bold uppercase tracking-wider shadow-md">
            Most Popular Sanctuary Choice
          </div>
<div class="space-y-4 pt-2">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary-fixed font-bold">All-Inclusive Preventive Care</span>
<h3 class="font-headline-sm text-headline-sm text-on-primary font-bold">Complete Wellness Club</h3>
<p class="font-body-sm text-body-sm text-secondary-fixed-dim">Zero deductibles, zero waiting periods, zero insurance denials. Guaranteed lifelong care.</p>
<div class="pt-2">
<span class="font-display-hero text-headline-lg text-primary-fixed font-bold" id="tier-2-price">$34</span>
<span class="font-body-sm text-body-sm text-secondary-fixed-dim font-medium" id="tier-2-frequency">/ month (or $365/yr)</span>
</div>
<ul class="space-y-3 font-body-sm text-body-sm text-on-primary pt-4">
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary-fixed text-lg">check_circle</span>
<span>2 Thorough hygiene cleanings &amp; polishings</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary-fixed text-lg">check_circle</span>
<span>2 Comprehensive exams &amp; routine x-rays</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary-fixed text-lg">check_circle</span>
<span>Unlimited emergency visits &amp; pain triage</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary-fixed text-lg">check_circle</span>
<span>20% OFF all cosmetic, restorative &amp; implants</span>
</li>
</ul>
</div>
<a class="w-full text-center bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md py-4 rounded-full shadow-[0_8px_20px_rgba(0,104,95,0.4)] transition-all font-semibold" href="#quick-reserve">
            Join Wellness Club Today
          </a>
</div>
<!-- Tier 3 -->
<div class="bg-surface-container-lowest rounded-3xl p-8 shadow-sm flex flex-col justify-between space-y-6">
<div class="space-y-4">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-tertiary font-bold">Cosmetic Masterpiece</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Signature Veneer Atelier</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Custom, hand-layered ceramic porcelain engineered by our master ceramists.</p>
<div class="pt-2">
<span class="font-display-hero text-headline-lg text-on-surface font-bold">$1,200</span>
<span class="font-body-sm text-body-sm text-outline font-medium">/ tooth (or $99/mo with 0% APR)</span>
</div>
<ul class="space-y-3 font-body-sm text-body-sm text-on-surface pt-4">
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-tertiary text-lg">check</span>
<span>Micro-prep or no-prep porcelain designs</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-tertiary text-lg">check</span>
<span>Digital aesthetic try-in &amp; shade match</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-tertiary text-lg">check</span>
<span>Lifetime warranty against chipping/fracture</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-tertiary text-lg">check</span>
<span>Free annual high-gloss maintenance polish</span>
</li>
</ul>
</div>
<a class="w-full text-center bg-surface-container hover:bg-surface-container-high text-on-surface font-title-md text-title-md py-3.5 rounded-full transition-all font-semibold" href="#quick-reserve">
            Reserve Veneer Consult
          </a>
</div>
</div>
<!-- Insurance Reassurance Callout -->
<div class="mt-12 text-center bg-primary-fixed/20 rounded-2xl p-4 max-w-2xl mx-auto">
<p class="font-body-md text-body-md text-on-surface">
<span class="text-primary font-bold">🛡️ Have Insurance?</span> We accept over 95% of PPO dental insurance plans, verify your benefits instantly, and file all claims on your behalf.
        </p>
</div>
</div>
</section>
<!-- ================= 8. RISK REVERSAL & IRONCLAD CLINICAL GUARANTEES ================= -->
<section class="w-full py-16 bg-surface-container-low" id="guarantees">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="text-center max-w-3xl mx-auto mb-12 space-y-2">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">
          Zero-Anxiety Guarantee
        </span>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-bold">
          3 Promises Etched in Stone
        </h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-surface-container-lowest p-8 rounded-3xl shadow-sm space-y-4">
<div class="w-12 h-12 rounded-full bg-primary-fixed/40 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">sentiment_satisfied</span>
</div>
<h3 class="font-title-lg text-title-lg text-on-surface font-bold">100% Pain-Free Promise</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
            If you ever experience discomfort during any routine hygiene or restorative procedure, we immediately stop, apply gentler protocols, and credit your comfort visit at our expense.
          </p>
</div>
<div class="bg-surface-container-lowest p-8 rounded-3xl shadow-sm space-y-4">
<div class="w-12 h-12 rounded-full bg-tertiary-fixed/40 text-tertiary flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">verified</span>
</div>
<h3 class="font-title-lg text-title-lg text-on-surface font-bold">5-Year Restoration Warranty</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
            Any crown, ceramic bridge, or porcelain veneer fabricated in our clinic is fully covered against breakage for 5 years when maintained with regular preventive cleanings.
          </p>
</div>
<div class="bg-surface-container-lowest p-8 rounded-3xl shadow-sm space-y-4">
<div class="w-12 h-12 rounded-full bg-secondary-container text-on-secondary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-2xl">receipt_long</span>
</div>
<h3 class="font-title-lg text-title-lg text-on-surface font-bold">No-Surprise-Bill Assurance</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
            Your printed and signed diagnostic estimate is the absolute maximum you will pay. If insurance covers less than projected, we honor our initial agreed patient copay.
          </p>
</div>
</div>
</div>
</section>
<!-- ================= 9. INTERACTIVE FAQ ACCORDION ================= -->
<section class="w-full py-20 bg-surface" id="faqs">
<div class="max-w-4xl mx-auto px-6 lg:px-12">
<div class="text-center mb-14 space-y-3">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold bg-primary-fixed/30 px-3 py-1 rounded-full">
          Frequently Asked Questions
        </span>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-bold">
          Clear Answers for Peace of Mind
        </h2>
<p class="font-body-md text-body-md text-on-surface-variant">
          Everything you need to know about our technology, financing, and gentle sedation procedures.
        </p>
</div>
<div class="space-y-4" id="faq-container">
<!-- FAQ Item 1 -->
<div class="bg-surface-container-lowest rounded-2xl shadow-sm overflow-hidden transition-all">
<button class="w-full text-left p-6 flex items-center justify-between gap-4 font-title-lg text-title-lg text-on-surface font-bold" onclick="toggleFaq(this)">
<span>I have severe dental anxiety. How can you help me relax?</span>
<span class="material-symbols-outlined text-primary transition-transform duration-300 transform">keyboard_arrow_down</span>
</button>
<div class="faq-content hidden px-6 pb-6 font-body-md text-body-md text-on-surface-variant border-t border-surface-container pt-4">
            Dental anxiety is completely normal and treated with profound respect at Lumina. We offer gentle nitrous oxide (laughing gas), oral conscious relaxation sedation, temple massage therapy, noise-canceling headphones, and ceiling screens. Most importantly, you hold the “Stop Paddle”: if you lift your hand at any moment, our team stops immediately.
          </div>
</div>
<!-- FAQ Item 2 -->
<div class="bg-surface-container-lowest rounded-2xl shadow-sm overflow-hidden transition-all">
<button class="w-full text-left p-6 flex items-center justify-between gap-4 font-title-lg text-title-lg text-on-surface font-bold" onclick="toggleFaq(this)">
<span>What if I don't have dental insurance?</span>
<span class="material-symbols-outlined text-primary transition-transform duration-300 transform">keyboard_arrow_down</span>
</button>
<div class="faq-content hidden px-6 pb-6 font-body-md text-body-md text-on-surface-variant border-t border-surface-container pt-4">
            Over 40% of our happiest patients do not use traditional insurance! Our Lumina Dental Wellness Club ($34/month) covers 100% of your annual cleanings, routine 3D exams, diagnostic x-rays, and emergency consultations, while giving you an immediate 20% discount on all cosmetic and restorative procedures with no deductible or maximum caps.
          </div>
</div>
<!-- FAQ Item 3 -->
<div class="bg-surface-container-lowest rounded-2xl shadow-sm overflow-hidden transition-all">
<button class="w-full text-left p-6 flex items-center justify-between gap-4 font-title-lg text-title-lg text-on-surface font-bold" onclick="toggleFaq(this)">
<span>How does the same-day crown process actually work?</span>
<span class="material-symbols-outlined text-primary transition-transform duration-300 transform">keyboard_arrow_down</span>
</button>
<div class="faq-content hidden px-6 pb-6 font-body-md text-body-md text-on-surface-variant border-t border-surface-container pt-4">
            Using our advanced CEREC CAD/CAM robotic milling suite, we scan your tooth with high-speed digital optics, eliminating gaggy silicone molds. While you relax in our lounge enjoying coffee or Netflix, our robotic milling unit sculpts a medical-grade monolithic porcelain crown in under 20 minutes. We polish, bond, and cure it during the same appointment. No temporary crown, no return visit.
          </div>
</div>
<!-- FAQ Item 4 -->
<div class="bg-surface-container-lowest rounded-2xl shadow-sm overflow-hidden transition-all">
<button class="w-full text-left p-6 flex items-center justify-between gap-4 font-title-lg text-title-lg text-on-surface font-bold" onclick="toggleFaq(this)">
<span>Are payment plans and 0% financing available?</span>
<span class="material-symbols-outlined text-primary transition-transform duration-300 transform">keyboard_arrow_down</span>
</button>
<div class="faq-content hidden px-6 pb-6 font-body-md text-body-md text-on-surface-variant border-t border-surface-container pt-4">
            Yes. We partner with CareCredit, Proceed Finance, and Sunbit to provide interest-free 0% APR payment options over 6, 12, or 24 months. You can complete a soft pre-qualification check in 90 seconds without impacting your credit score.
          </div>
</div>
<!-- FAQ Item 5 -->
<div class="bg-surface-container-lowest rounded-2xl shadow-sm overflow-hidden transition-all">
<button class="w-full text-left p-6 flex items-center justify-between gap-4 font-title-lg text-title-lg text-on-surface font-bold" onclick="toggleFaq(this)">
<span>How quickly can I be seen for an urgent dental emergency?</span>
<span class="material-symbols-outlined text-primary transition-transform duration-300 transform">keyboard_arrow_down</span>
</button>
<div class="faq-content hidden px-6 pb-6 font-body-md text-body-md text-on-surface-variant border-t border-surface-container pt-4">
            We hold dedicated emergency slots every single day. If you are experiencing acute pain, a broken tooth, or facial trauma, call our hotline at (800) 586-4621 and we will arrange care within 2 hours during normal clinic operating times.
          </div>
</div>
</div>
</div>
</section>
<!-- ================= 10. FINAL HIGH-CONTRAST CONVERSION SECTION & REGISTRATION FORM ================= -->
<section class="w-full py-20 bg-on-secondary-fixed text-on-secondary relative overflow-hidden" id="book">
<!-- Ambient Teal Glows -->
<div class="pointer-events-none absolute -bottom-24 -left-24 h-96 w-96 rounded-full bg-primary/25 blur-3xl"></div>
<div class="pointer-events-none absolute -top-24 -right-24 h-96 w-96 rounded-full bg-primary-fixed/20 blur-3xl"></div>
<div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Left: Emotional Reaffirmation -->
<div class="lg:col-span-6 space-y-6">
<span class="inline-flex items-center gap-2 bg-primary-container text-on-primary-container px-3.5 py-1 rounded-full font-label-sm text-label-sm font-bold uppercase tracking-wider">
            Ready For Your Transformation?
          </span>
<h2 class="font-display-hero text-display-hero-mobile md:text-headline-lg font-bold text-on-secondary leading-tight">
            Fall in Love With <br/>
            Your Smile Again.
          </h2>
<p class="font-body-lg text-body-lg text-secondary-fixed-dim">
            Take the first gentle step. Reserve your visit online in 60 seconds, unlock your $150 Spring Voucher, and experience medical luxury tailored entirely around your comfort.
          </p>
<!-- Clinic Highlights -->
<div class="space-y-4 pt-4 border-t border-on-secondary-fixed-variant">
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary-fixed text-xl shrink-0 mt-0.5">location_on</span>
<div>
<p class="font-title-md text-title-md text-on-secondary font-semibold">1420 Luminous Parkway, Suite 400</p>
<p class="font-body-sm text-body-sm text-secondary-fixed-dim">Austin, TX 78701 • Free Covered Valet Parking Provided</p>
</div>
</div>
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary-fixed text-xl shrink-0 mt-0.5">call</span>
<div>
<p class="font-title-md text-title-md text-on-secondary font-semibold">Instant Inquiries &amp; 24/7 Triage: (800) 586-4621</p>
<p class="font-body-sm text-body-sm text-secondary-fixed-dim">Speak directly with our concierge team</p>
</div>
</div>
</div>
</div>
<!-- Right: Instant Registration Form Card -->
<div class="lg:col-span-6">
<div class="bg-surface-container-lowest text-on-surface rounded-3xl p-8 sm:p-10 shadow-2xl">
<div class="mb-6">
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Book Your $99 Exam &amp; 3D Scan</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Includes $150 Welcome Credit towards cosmetic or laser procedures.</p>
</div>
<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="space-y-4" id="footer-registration-form">
<?php wp_nonce_field( 'lumina_register', 'lumina_nonce' ); ?>
<input type="hidden" name="action" value="lumina_register"/>
<input type="hidden" name="form_type" value="footer"/>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Your Full Name</label>
<input class="w-full bg-surface-container-low px-4 py-2.5 rounded-xl font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#00685f] transition-all" placeholder="Elena Vance" required="" type="text" name="full_name"/>
</div>
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Cell Phone (SMS Reminders)</label>
<input class="w-full bg-surface-container-low px-4 py-2.5 rounded-xl font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#00685f] transition-all" placeholder="(512) 890-4421" required="" type="tel" name="phone"/>
</div>
</div>
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Email Address</label>
<input class="w-full bg-surface-container-low px-4 py-2.5 rounded-xl font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#00685f] transition-all" placeholder="elena@example.com" required="" type="email" name="email"/>
</div>
<div>
<label class="block font-label-md text-label-md font-medium text-on-surface mb-1">Service Requested</label>
<select class="w-full bg-surface-container-low px-4 py-2.5 rounded-xl font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_#00685f] transition-all" name="service">
<option value="first-visit">New Patient Comprehensive Exam ($99 Special)</option>
<option value="veneers">Porcelain Veneers / Smile Makeover Consultation</option>
<option value="invisalign">Invisalign® Orthodontic Assessment</option>
<option value="whitening">Laser In-Office Power Whitening</option>
<option value="emergency">Urgent Emergency Dental Care</option>
</select>
</div>
<button class="w-full mt-2 bg-primary hover:bg-primary-container text-on-primary font-title-md text-title-md py-4 rounded-full shadow-[0_12px_28px_rgba(0,104,95,0.3)] hover:shadow-[0_16px_36px_rgba(0,104,95,0.4)] transition-all font-semibold flex items-center justify-center gap-2" type="submit">
<span>Claim Your $150 Welcome Credit Now</span>
<span class="material-symbols-outlined text-lg">arrow_forward</span>
</button>
<div class="flex items-center justify-between pt-2 font-label-sm text-label-sm text-outline">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs text-primary">verified</span> 100% HIPAA Secured</span>
<span>No Credit Card Required Now</span>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<!-- ================= 10. LATEST FROM THE CLINICAL BLOG ================= -->
<section class="w-full py-16 md:py-20 bg-surface-container-low" id="blog">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div class="max-w-2xl space-y-3">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold bg-primary-fixed/30 px-3 py-1 rounded-full">
          Clinical library
        </span>
<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface font-bold">
          Dental health, explained properly
        </h2>
<p class="font-body-md text-body-md text-on-surface-variant">
          Long-form answers to the questions our patients actually ask, each one cited to primary sources so you can check the evidence yourself.
        </p>
</div>
<a class="inline-flex items-center gap-2 shrink-0 bg-surface-container-lowest border border-surface-container text-on-surface font-title-md text-title-md px-5 py-3 rounded-full hover:border-primary transition-colors" href="<?php echo esc_url( lumina_url( 'blog' ) ); ?>">
        Browse all articles
        <span class="material-symbols-outlined text-lg">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<?php
			$lumina_recent = get_posts( array( 'numberposts' => 3, 'post_status' => 'publish' ) );
			foreach ( $lumina_recent as $lumina_post ) :
				setup_postdata( $lumina_post );
				get_template_part( 'template-parts/post-card' );
			endforeach;
			wp_reset_postdata();
			?>
</div>
</div>
</section>


</div>
<?php
get_footer();
