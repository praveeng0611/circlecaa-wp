/**
 * Circle CAA – Main JavaScript
 * Handles: mobile nav, sticky header, counters, contact form AJAX, smooth scroll
 */

(function () {
  'use strict';

  /* ── Mobile Nav ─────────────────────────────────────────────── */
  const menuToggle    = document.getElementById('menu-toggle');
  const mobileNav     = document.getElementById('mobile-nav');
  const mobileClose   = document.getElementById('mobile-nav-close');

  function openMobileNav() {
    mobileNav.classList.add('open');
    document.body.style.overflow = 'hidden';
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
  }

  function closeMobileNav() {
    mobileNav.classList.remove('open');
    document.body.style.overflow = '';
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
  }

  if (menuToggle) menuToggle.addEventListener('click', openMobileNav);
  if (mobileClose) mobileClose.addEventListener('click', closeMobileNav);

  // Close on overlay click (outside the drawer)
  if (mobileNav) {
    mobileNav.addEventListener('click', function (e) {
      if (e.target === mobileNav) closeMobileNav();
    });
  }

  // Close on ESC key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && mobileNav && mobileNav.classList.contains('open')) {
      closeMobileNav();
    }
  });

  /* ── Sticky Header Shadow ───────────────────────────────────── */
  const siteHeader = document.getElementById('site-header');
  if (siteHeader) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 50) {
        siteHeader.classList.add('scrolled');
      } else {
        siteHeader.classList.remove('scrolled');
      }
    }, { passive: true });
  }

  /* ── Smooth Scroll for anchor links ────────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = siteHeader ? siteHeader.offsetHeight + 16 : 80;
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
        closeMobileNav();
      }
    });
  });

  /* ── Animated Counters ──────────────────────────────────────── */
  function animateCounter(el) {
    const target = parseInt(el.getAttribute('data-target') || el.innerText, 10);
    if (isNaN(target)) return;
    const duration = 1800;
    const start = performance.now();

    function update(now) {
      const elapsed = now - start;
      const progress = Math.min(elapsed / duration, 1);
      // Ease-out cubic
      const eased = 1 - Math.pow(1 - progress, 3);
      el.innerText = Math.floor(eased * target) + (el.getAttribute('data-suffix') || '');
      if (progress < 1) requestAnimationFrame(update);
    }
    requestAnimationFrame(update);
  }

  const counters = document.querySelectorAll('[data-counter]');
  if (counters.length && 'IntersectionObserver' in window) {
    const obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });
    counters.forEach(function (el) { obs.observe(el); });
  }

  /* ── Scroll-in Animations ───────────────────────────────────── */
  if ('IntersectionObserver' in window) {
    const revealEls = document.querySelectorAll(
      '.program-card, .team-card, .cause-card, .event-card, .blog-card, .stat-card, .testimonial-card'
    );
    const revealObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          revealObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    revealEls.forEach(function (el) {
      el.classList.add('reveal-on-scroll');
      revealObs.observe(el);
    });
  }

  /* ── Contact Form AJAX ──────────────────────────────────────── */
  const contactForm = document.getElementById('circlecaa-contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();

      const btn     = contactForm.querySelector('[type="submit"]');
      const status  = document.getElementById('form-status');
      const data    = new FormData(contactForm);
      data.append('action', 'circlecaa_contact');
      data.append('nonce', circlecaaAjax.nonce);

      btn.disabled    = true;
      btn.textContent = 'Sending…';
      if (status) { status.textContent = ''; status.className = 'form-status'; }

      fetch(circlecaaAjax.url, { method: 'POST', body: data })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          if (res.success) {
            contactForm.reset();
            if (status) {
              status.textContent = '✓ Thank you! We\'ll get back to you soon.';
              status.className   = 'form-status success';
            }
          } else {
            if (status) {
              status.textContent = res.data || 'Something went wrong. Please try again.';
              status.className   = 'form-status error';
            }
          }
        })
        .catch(function () {
          if (status) {
            status.textContent = 'Network error. Please try again.';
            status.className   = 'form-status error';
          }
        })
        .finally(function () {
          btn.disabled    = false;
          btn.textContent = 'Send Message';
        });
    });
  }

  /* ── Gallery Lightbox (simple) ──────────────────────────────── */
  const galleryItems = document.querySelectorAll('.gallery-item[data-src]');
  if (galleryItems.length) {
    // Create lightbox elements
    const overlay = document.createElement('div');
    overlay.id    = 'lightbox-overlay';
    overlay.style.cssText = [
      'display:none;position:fixed;inset:0;z-index:9999',
      'background:rgba(0,0,0,.92);align-items:center;justify-content:center',
      'cursor:zoom-out'
    ].join(';');

    const img = document.createElement('img');
    img.style.cssText = 'max-width:90vw;max-height:88vh;border-radius:8px;box-shadow:0 8px 40px rgba(0,0,0,.6)';

    const closeBtn = document.createElement('button');
    closeBtn.textContent = '✕';
    closeBtn.setAttribute('aria-label', 'Close');
    closeBtn.style.cssText = [
      'position:absolute;top:20px;right:28px;background:none;border:none',
      'color:#fff;font-size:28px;cursor:pointer;line-height:1'
    ].join(';');

    overlay.appendChild(img);
    overlay.appendChild(closeBtn);
    document.body.appendChild(overlay);

    function openLightbox(src, alt) {
      img.src = src;
      img.alt = alt || '';
      overlay.style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
      overlay.style.display = 'none';
      document.body.style.overflow = '';
      img.src = '';
    }

    galleryItems.forEach(function (item) {
      item.style.cursor = 'zoom-in';
      item.addEventListener('click', function () {
        openLightbox(item.dataset.src, item.dataset.alt || '');
      });
    });

    overlay.addEventListener('click', function (e) {
      if (e.target === overlay || e.target === closeBtn) closeLightbox();
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && overlay.style.display !== 'none') closeLightbox();
    });
  }

  /* ── Progress Bars ──────────────────────────────────────────── */
  const progressBars = document.querySelectorAll('.progress-fill[data-width]');
  if (progressBars.length && 'IntersectionObserver' in window) {
    const pbObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.style.width = entry.target.getAttribute('data-width');
          pbObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4 });
    progressBars.forEach(function (bar) {
      bar.style.width = '0';
      bar.style.transition = 'width 1.4s ease';
      pbObs.observe(bar);
    });
  }

})();
