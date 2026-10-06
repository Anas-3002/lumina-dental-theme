/* Lumina Dental Studio - front-end interactions. */
(function () {
  'use strict';

  /* ---------------------------------------------------------- mobile menu */
  function initMenu() {
    var toggle = document.getElementById('lumina-menu-toggle');
    var panel = document.getElementById('lumina-mobile-menu');
    var icon = document.getElementById('lumina-menu-icon');
    if (!toggle || !panel) { return; }

    toggle.addEventListener('click', function () {
      var open = panel.classList.toggle('hidden') === false;
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
      if (icon) { icon.textContent = open ? 'close' : 'menu'; }
    });
  }

  /* --------------------------------------------------------- faq accordion */
  window.toggleFaq = function (button) {
    var content = button.nextElementSibling;
    var icon = button.querySelector('.material-symbols-outlined');
    var isHidden = content.classList.contains('hidden');

    document.querySelectorAll('.faq-content').forEach(function (c) { c.classList.add('hidden'); });
    document.querySelectorAll('.faq-content').forEach(function (c) {
      var sib = c.previousElementSibling;
      if (sib) {
        var i = sib.querySelector('.material-symbols-outlined');
        if (i) { i.classList.remove('rotate-180'); }
      }
    });

    if (isHidden) {
      content.classList.remove('hidden');
      if (icon) { icon.classList.add('rotate-180'); }
    }
  };

  /* --------------------------------------------------------- pricing toggle */
  window.setPricingMode = function (mode) {
    var btnInsurance = document.getElementById('toggle-insurance');
    var btnClub = document.getElementById('toggle-club');
    var tier2Price = document.getElementById('tier-2-price');
    var tier2Frequency = document.getElementById('tier-2-frequency');
    if (!btnInsurance || !btnClub) { return; }

    if (mode === 'club') {
      btnClub.classList.remove('text-on-surface-variant');
      btnClub.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
      btnInsurance.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
      btnInsurance.classList.add('text-on-surface-variant');
      if (tier2Price) { tier2Price.textContent = '$34'; }
      if (tier2Frequency) { tier2Frequency.textContent = '/ month (Zero insurance needed)'; }
    } else {
      btnInsurance.classList.remove('text-on-surface-variant');
      btnInsurance.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
      btnClub.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
      btnClub.classList.add('text-on-surface-variant');
      if (tier2Price) { tier2Price.textContent = '$0'; }
      if (tier2Frequency) { tier2Frequency.textContent = 'copay for 2 cleanings with standard PPO'; }
    }
  };

  /* ------------------------------------------------------------ legacy hook */
  window.handleRegistration = function (e) {
    if (e && e.preventDefault) { e.preventDefault(); }
  };

  /* ----------------------------------------------------------- table of contents */
  function initToc() {
    var prose = document.querySelector('.lumina-prose');
    if (!prose) { return; }
    var headings = prose.querySelectorAll('h2');
    if (headings.length < 3) { return; }

    var nav = document.createElement('nav');
    nav.className = 'not-prose bg-surface-container-low border border-surface-container rounded-3xl p-6 mb-10';
    nav.setAttribute('aria-label', 'On this page');

    var title = document.createElement('p');
    title.className = 'font-label-md text-label-md uppercase tracking-widest text-on-surface-variant font-bold mb-3';
    title.textContent = 'On this page';
    nav.appendChild(title);

    var list = document.createElement('ul');
    list.className = 'space-y-2 font-body-sm text-body-sm';

    headings.forEach(function (h, i) {
      if (!h.id) {
        h.id = 'section-' + (i + 1);
      }
      var li = document.createElement('li');
      var a = document.createElement('a');
      a.href = '#' + h.id;
      a.className = 'text-primary hover:underline';
      a.textContent = h.textContent;
      li.appendChild(a);
      list.appendChild(li);
    });

    nav.appendChild(list);
    prose.insertBefore(nav, prose.firstElementChild);
  }

  /* ---------------------------------------------------------------- init */
  document.addEventListener('DOMContentLoaded', function () {
    initMenu();
    initToc();

    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
      a.addEventListener('click', function (ev) {
        var id = a.getAttribute('href');
        if (!id || id === '#') { return; }
        var target = document.querySelector(id);
        if (!target) { return; }
        ev.preventDefault();
        var top = target.getBoundingClientRect().top + window.pageYOffset - 130;
        window.scrollTo({ top: top < 0 ? 0 : top, behavior: 'smooth' });
        if (window.history.replaceState) { window.history.replaceState({}, '', id); }
      });
    });

    /* Forms post normally; this only stops double submission. */
    document.querySelectorAll('form[action*="admin-post.php"]').forEach(function (form) {
      form.addEventListener('submit', function () {
        var btn = form.querySelector('button[type="submit"]');
        if (!btn) { return; }
        var label = btn.querySelector('span');
        btn.setAttribute('disabled', 'disabled');
        btn.classList.add('opacity-70', 'cursor-wait');
        if (label) { label.textContent = 'Sending your request…'; }
      });
    });
  });
})();
