<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="/" class="nav-logo">Chron<span style="color:var(--gold)">e</span>xis</a>
        <p>A private strategic practice. Absolute discretion. Singular attention. No profile. No referral. Simply the result.</p>
      </div>

      <div class="footer-links">
        <div class="footer-nav-col">
          <h5>The Practice</h5>
          <a href="/the-practice#mandate">Mandate</a>
          <a href="/the-practice#foundation">Foundation</a>
          <a href="/the-practice#engagement">Engagement</a>
        </div>
        <div class="footer-nav-col">
          <h5>Expertise</h5>
          <a href="/vitality">Vitality</a>
          <a href="/relational">Relational</a>
          <a href="/leadership">Leadership</a>
          <a href="/residence">Residence</a>
          <a href="/mentorship">Mentorship</a>
        </div>
      </div>

      <div class="footer-nav-col">
        <h5>Access</h5>
        <a href="/custodian">The Custodian</a>
        <a href="/consideration">Private Inquiry</a>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© <?php echo date('Y'); ?> <span class="gold">Chronexis</span>. All rights reserved. Private practice.</p>
      <p>Confidentiality is not a feature. It is the foundation.</p>
    </div>
  </div>
</footer>

<script>
(function () {
  'use strict';

  /* ─────────────────────────────────────────────
     1. NAV — Hide on scroll down / show on scroll up
  ───────────────────────────────────────────── */
  const nav      = document.getElementById('site-nav');
  const toggle   = document.getElementById('nav-toggle');
  const navLinks = document.getElementById('nav-links');
  const overlay  = document.getElementById('nav-overlay');

  let lastScrollY   = window.scrollY;
  let ticking       = false;
  let mobileOpen    = false;

  function updateNav() {
    const currentY = window.scrollY;
    const scrollingDown = currentY > lastScrollY;

    // Scrolled class (shadow + compact padding)
    if (currentY > 60) {
      nav.classList.add('scrolled');
    } else {
      nav.classList.remove('scrolled');
    }

    // Hide on scroll down / show on scroll up (only if mobile menu is closed)
    if (!mobileOpen) {
      if (scrollingDown && currentY > 120) {
        nav.classList.add('nav-hidden');
      } else {
        nav.classList.remove('nav-hidden');
      }
    }

    lastScrollY = currentY <= 0 ? 0 : currentY;
    ticking = false;
  }

  window.addEventListener('scroll', () => {
    if (!ticking) {
      requestAnimationFrame(updateNav);
      ticking = true;
    }
  }, { passive: true });

  /* ─────────────────────────────────────────────
     2. MOBILE MENU — Full-screen overlay
  ───────────────────────────────────────────── */
  function openMobileMenu() {
    mobileOpen = true;
    navLinks.classList.add('open');
    overlay.classList.add('open');
    toggle.setAttribute('aria-expanded', 'true');
    toggle.setAttribute('aria-label', 'Close navigation menu');
    toggle.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    nav.classList.remove('nav-hidden');
  }

  function closeMobileMenu() {
    mobileOpen = false;
    navLinks.classList.remove('open');
    overlay.classList.remove('open');
    toggle.setAttribute('aria-expanded', 'false');
    toggle.setAttribute('aria-label', 'Open navigation menu');
    toggle.classList.remove('is-open');
    document.body.style.overflow = '';
    // Close all dropdowns
    document.querySelectorAll('.nav-dropdown.dropdown-open').forEach(d => closeDropdown(d));
  }

  if (toggle) {
    toggle.addEventListener('click', () => {
      mobileOpen ? closeMobileMenu() : openMobileMenu();
    });
  }

  // Close on overlay click
  if (overlay) {
    overlay.addEventListener('click', closeMobileMenu);
  }

  // Close on ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      if (mobileOpen) closeMobileMenu();
      document.querySelectorAll('.nav-dropdown.dropdown-open').forEach(d => closeDropdown(d));
    }
  });

  /* ─────────────────────────────────────────────
     3. DROPDOWNS — Hover (desktop) + Click (all)
  ───────────────────────────────────────────── */
  const dropdowns = document.querySelectorAll('.nav-dropdown');

  function openDropdown(dd) {
    const btn  = dd.querySelector('.nav-dropdown-toggle');
    const menu = dd.querySelector('.nav-dropdown-menu');
    dd.classList.add('dropdown-open');
    btn.setAttribute('aria-expanded', 'true');
    if (menu) menu.removeAttribute('inert');
  }

  function closeDropdown(dd) {
    const btn  = dd.querySelector('.nav-dropdown-toggle');
    const menu = dd.querySelector('.nav-dropdown-menu');
    dd.classList.remove('dropdown-open');
    btn.setAttribute('aria-expanded', 'false');
    if (menu) menu.setAttribute('inert', '');
  }

  dropdowns.forEach(dd => {
    const btn  = dd.querySelector('.nav-dropdown-toggle');
    const menu = dd.querySelector('.nav-dropdown-menu');

    // Initial inert state (desktop)
    if (menu) menu.setAttribute('inert', '');

    // Click toggle
    if (btn) {
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = dd.classList.contains('dropdown-open');
        // Close all others
        dropdowns.forEach(other => { if (other !== dd) closeDropdown(other); });
        isOpen ? closeDropdown(dd) : openDropdown(dd);
      });
    }

    // Hover (desktop only — pointer:fine)
    const mq = window.matchMedia('(hover: hover) and (pointer: fine)');
    if (mq.matches) {
      dd.addEventListener('mouseenter', () => openDropdown(dd));
      dd.addEventListener('mouseleave', () => closeDropdown(dd));
    }

    // Keyboard: navigate menu items with arrow keys
    if (menu) {
      const items = menu.querySelectorAll('a[role="menuitem"]');
      items.forEach((item, i) => {
        item.addEventListener('keydown', (e) => {
          if (e.key === 'ArrowDown') {
            e.preventDefault();
            items[i + 1]?.focus();
          }
          if (e.key === 'ArrowUp') {
            e.preventDefault();
            items[i - 1]?.focus();
          }
          if (e.key === 'Escape') {
            closeDropdown(dd);
            btn.focus();
          }
          if (e.key === 'Tab' && i === items.length - 1) {
            closeDropdown(dd);
          }
        });
      });
    }
  });

  // Close dropdowns on outside click
  document.addEventListener('click', () => {
    dropdowns.forEach(dd => closeDropdown(dd));
  });

  /* ─────────────────────────────────────────────
     4. SMOOTH ANCHOR SCROLL
  ───────────────────────────────────────────── */
  document.querySelectorAll('a[href*="#"]').forEach(link => {
    link.addEventListener('click', function (e) {
      const href    = this.getAttribute('href');
      const hashIdx = href.indexOf('#');
      if (hashIdx === -1) return;

      const hash    = href.slice(hashIdx + 1);
      const path    = href.slice(0, hashIdx);
      const target  = document.getElementById(hash);

      // Only intercept same-page anchors
      const currentPath = window.location.pathname.replace(/\/$/, '') || '/';
      const linkPath    = path.replace(/\/$/, '') || '/';
      const isSamePage  = !path || currentPath === linkPath;

      if (isSamePage && target) {
        e.preventDefault();
        const navH   = nav ? nav.offsetHeight : 80;
        const top    = target.getBoundingClientRect().top + window.scrollY - navH - 24;
        window.scrollTo({ top, behavior: 'smooth' });

        // Update URL without reload
        history.pushState(null, '', '#' + hash);

        // Close mobile menu if open
        if (mobileOpen) closeMobileMenu();
      }
    });
  });

  /* ─────────────────────────────────────────────
     5. REVEAL ON SCROLL (IntersectionObserver)
  ───────────────────────────────────────────── */
  const revealEls = document.querySelectorAll('.reveal-on-scroll');
  if (revealEls.length) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.07, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach(el => io.observe(el));
  }

  /* ─────────────────────────────────────────────
     6. CLOSE MOBILE MENU on nav link click
  ───────────────────────────────────────────── */
  if (navLinks) {
    navLinks.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        if (mobileOpen) closeMobileMenu();
      });
    });
  }

})();
</script>
</body>
</html>