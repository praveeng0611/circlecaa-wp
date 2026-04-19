<?php $phone = circlecaa_get_phone(); $email = circlecaa_get_email(); $address = circlecaa_get_address(); ?>

<!-- ── Footer ─────────────────────────────────────────────────── -->
<footer id="site-footer" role="contentinfo">
  <div class="container">
    <div class="footer-main">

      <!-- Brand Column -->
      <div class="footer-brand">
        <div class="logo-wrap">
          <?php if ( has_custom_logo() ) : ?>
            <?php the_custom_logo(); ?>
          <?php else : ?>
            <div style="width:48px;height:48px;background:linear-gradient(135deg,#2563eb,#16a34a);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:900;font-size:18px;">C</div>
          <?php endif; ?>
          <div>
            <div class="brand-name"><?php bloginfo( 'name' ); ?></div>
            <div class="brand-tag"><?php bloginfo( 'description' ); ?></div>
          </div>
        </div>
        <p>A platform where creative minds come together to explore their uniqueness and grow as individuals and as a community. We empower through education, environment, arts and social awareness.</p>
        <div class="footer-social">
          <?php foreach ( circlecaa_social_links() as $key => $link ) : ?>
            <?php if ( $link['url'] ) : ?>
              <a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( $link['label'] ); ?>">
                <i class="<?php echo esc_attr( $link['icon'] ); ?>"></i>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="footer-col">
        <h4>Quick Links</h4>
        <div class="footer-links">
          <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
          <a href="<?php echo esc_url( home_url('/about') ); ?>">About Us</a>
          <a href="<?php echo esc_url( home_url('/activities') ); ?>">Activities</a>
          <a href="<?php echo esc_url( home_url('/events') ); ?>">Events</a>
          <a href="<?php echo esc_url( home_url('/gallery') ); ?>">Gallery</a>
          <a href="<?php echo esc_url( home_url('/team') ); ?>">Our Team</a>
          <a href="<?php echo esc_url( home_url('/blog') ); ?>">Blog</a>
          <a href="<?php echo esc_url( home_url('/contact') ); ?>">Contact</a>
        </div>
      </div>

      <!-- Programs -->
      <div class="footer-col">
        <h4>Our Programs</h4>
        <div class="footer-links">
          <a href="#">Green Environment Campaign</a>
          <a href="#">Wellness for All</a>
          <a href="#">Hunger &amp; Poverty Alleviation</a>
          <a href="#">Mental Health Awareness</a>
          <a href="#">Quiz &amp; Debate</a>
          <a href="#">Kavi Samelan &amp; Poetry</a>
          <a href="#">Book Promotions</a>
          <a href="<?php echo esc_url( home_url('/get-involved') ); ?>">Get Involved</a>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="footer-col">
        <h4>Contact Us</h4>
        <div class="footer-contact-item">
          <span class="icon">📍</span>
          <span><?php echo esc_html( $address ); ?></span>
        </div>
        <div class="footer-contact-item">
          <span class="icon">📞</span>
          <a href="tel:<?php echo esc_attr( preg_replace('/[^0-9+]/', '', $phone) ); ?>"><?php echo esc_html( $phone ); ?></a>
        </div>
        <div class="footer-contact-item">
          <span class="icon">✉️</span>
          <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
        </div>
        <div class="footer-contact-item">
          <span class="icon">🕐</span>
          <span>Mon–Sat: 10:00 AM – 6:00 PM</span>
        </div>
        <div class="footer-contact-item" style="margin-top:16px;">
          <a href="https://wa.me/<?php echo circlecaa_get_option('whatsapp','919358851143'); ?>" target="_blank" class="btn btn-primary" style="font-size:13px;padding:10px 18px;width:100%;justify-content:center;">
            <i class="fab fa-whatsapp"></i> WhatsApp Us
          </a>
        </div>
      </div>

    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <p>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. Registered NGO, Rajsamand, Rajasthan.</p>
      <p>Designed with ❤️ by <a href="https://gnosisolabs.com" target="_blank">Gnosiso Labs</a></p>
    </div>
  </div>
</footer>

<!-- WhatsApp Float Button -->
<a href="https://wa.me/<?php echo circlecaa_get_option('whatsapp','919358851143'); ?>?text=<?php echo urlencode('Hi Circle CAA! I want to know more about your activities.'); ?>"
   target="_blank" rel="noopener"
   aria-label="Chat on WhatsApp"
   style="position:fixed;bottom:24px;right:24px;z-index:999;width:56px;height:56px;background:#25d366;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 16px rgba(0,0,0,0.2);transition:all 0.3s ease;"
   onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
  <svg width="28" height="28" fill="white" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
</a>

<?php wp_footer(); ?>
</body>
</html>
