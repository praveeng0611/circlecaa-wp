<?php
/**
 * Template Name: Contact
 */
get_header();
$phone   = circlecaa_get_phone();
$email   = circlecaa_get_email();
$address = circlecaa_get_address();
?>

<section class="page-hero">
  <div class="container">
    <h1>Contact Us</h1>
    <p>Reach out — we'd love to hear from you</p>
  </div>
</section>

<div class="container" style="padding-top:64px;padding-bottom:80px;">
  <div style="display:grid;grid-template-columns:1fr 1.4fr;gap:56px;align-items:start;" class="contact-layout">

    <!-- Contact Info -->
    <div>
      <h2 style="color:#1a3a7a;font-size:1.6rem;margin-bottom:8px;">Get In Touch</h2>
      <p style="color:#64748b;line-height:1.7;margin-bottom:36px;">Whether you want to join our community, partner with us, or simply learn more about our work — we're happy to connect.</p>

      <div style="display:flex;flex-direction:column;gap:20px;margin-bottom:36px;">
        <?php
        $info = array(
          array( 'icon' => 'fa-map-marker-alt', 'color' => '#1a3a7a', 'label' => 'Our Address', 'value' => $address ?: 'Rajsamand, Rajasthan, India – 313324' ),
          array( 'icon' => 'fa-phone-alt',      'color' => '#16a34a', 'label' => 'Phone / WhatsApp', 'value' => $phone ?: '+91 93588 51143', 'href' => 'tel:' . preg_replace('/[^0-9+]/', '', $phone ?: '+919358851143') ),
          array( 'icon' => 'fa-envelope',       'color' => '#7c3aed', 'label' => 'Email Address', 'value' => $email ?: 'circlecaa@gmail.com', 'href' => 'mailto:' . ($email ?: 'circlecaa@gmail.com') ),
          array( 'icon' => 'fa-clock',          'color' => '#f59e0b', 'label' => 'Working Hours', 'value' => 'Monday – Saturday: 10:00 AM – 6:00 PM' ),
        );
        foreach ( $info as $item ) :
        ?>
          <div style="display:flex;gap:16px;align-items:flex-start;">
            <div style="width:48px;height:48px;background:<?php echo $item['color']; ?>18;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <i class="fas <?php echo $item['icon']; ?>" style="color:<?php echo $item['color']; ?>;font-size:18px;"></i>
            </div>
            <div>
              <div style="font-weight:700;color:#1e293b;font-size:14px;margin-bottom:2px;"><?php echo esc_html( $item['label'] ); ?></div>
              <?php if ( ! empty( $item['href'] ) ) : ?>
                <a href="<?php echo esc_url( $item['href'] ); ?>" style="color:#64748b;font-size:15px;text-decoration:none;"><?php echo esc_html( $item['value'] ); ?></a>
              <?php else : ?>
                <span style="color:#64748b;font-size:15px;"><?php echo esc_html( $item['value'] ); ?></span>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Social Links -->
      <div style="padding-top:24px;border-top:1px solid #e2e8f0;">
        <div style="font-weight:700;color:#1e293b;margin-bottom:14px;font-size:14px;">Follow Us</div>
        <div style="display:flex;gap:12px;">
          <?php foreach ( circlecaa_social_links() as $key => $link ) :
            if ( ! $link['url'] ) continue;
          ?>
            <a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( $link['label'] ); ?>"
               style="width:40px;height:40px;background:#1a3a7a;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;transition:background .2s;"
               onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#1a3a7a'">
              <i class="<?php echo esc_attr( $link['icon'] ); ?>"></i>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- WhatsApp direct -->
      <div style="margin-top:28px;">
        <a href="https://wa.me/<?php echo circlecaa_get_option('whatsapp','919358851143'); ?>?text=<?php echo urlencode('Hi Circle CAA! I want to know more about your activities.'); ?>"
           target="_blank"
           style="display:flex;align-items:center;gap:10px;background:#25d366;color:#fff;padding:14px 24px;border-radius:12px;text-decoration:none;font-weight:700;font-size:15px;width:fit-content;">
          <i class="fab fa-whatsapp" style="font-size:20px;"></i>
          Chat on WhatsApp
        </a>
      </div>
    </div>

    <!-- Contact Form -->
    <div style="background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:40px;box-shadow:0 4px 24px rgba(0,0,0,.06);">
      <h3 style="color:#1a3a7a;margin-bottom:24px;font-size:1.3rem;">Send Us a Message</h3>

      <form id="circlecaa-contact-form" style="display:flex;flex-direction:column;gap:18px;">

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
          <div>
            <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Your Name *</label>
            <input type="text" name="cf_name" required placeholder="Ramesh Sharma"
                   style="width:100%;padding:12px 16px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:15px;outline:none;box-sizing:border-box;transition:border-color .2s;"
                   onfocus="this.style.borderColor='#1a3a7a'" onblur="this.style.borderColor='#e2e8f0'">
          </div>
          <div>
            <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Phone Number</label>
            <input type="tel" name="cf_phone" placeholder="+91 98765 43210"
                   style="width:100%;padding:12px 16px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:15px;outline:none;box-sizing:border-box;transition:border-color .2s;"
                   onfocus="this.style.borderColor='#1a3a7a'" onblur="this.style.borderColor='#e2e8f0'">
          </div>
        </div>

        <div>
          <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Email Address *</label>
          <input type="email" name="cf_email" required placeholder="you@example.com"
                 style="width:100%;padding:12px 16px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:15px;outline:none;box-sizing:border-box;transition:border-color .2s;"
                 onfocus="this.style.borderColor='#1a3a7a'" onblur="this.style.borderColor='#e2e8f0'">
        </div>

        <div>
          <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Subject</label>
          <select name="cf_subject"
                  style="width:100%;padding:12px 16px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:15px;outline:none;box-sizing:border-box;background:#fff;color:#374151;transition:border-color .2s;"
                  onfocus="this.style.borderColor='#1a3a7a'" onblur="this.style.borderColor='#e2e8f0'">
            <option value="">Select a subject…</option>
            <option>Volunteer / Join Circle CAA</option>
            <option>Event Collaboration</option>
            <option>Donation / CSR Partnership</option>
            <option>Media & Press Inquiry</option>
            <option>General Question</option>
            <option>Other</option>
          </select>
        </div>

        <div>
          <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Your Message *</label>
          <textarea name="cf_message" required rows="5" placeholder="Tell us how we can help or collaborate…"
                    style="width:100%;padding:12px 16px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:15px;outline:none;box-sizing:border-box;resize:vertical;font-family:inherit;transition:border-color .2s;"
                    onfocus="this.style.borderColor='#1a3a7a'" onblur="this.style.borderColor='#e2e8f0'"></textarea>
        </div>

        <div id="form-status" class="form-status"></div>

        <?php wp_nonce_field( 'circlecaa_contact_nonce', 'nonce' ); ?>
        <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:14px;font-size:16px;">
          <i class="fas fa-paper-plane" style="margin-right:8px;"></i> Send Message
        </button>

      </form>
    </div>

  </div>

  <!-- Map placeholder -->
  <div style="margin-top:56px;border-radius:16px;overflow:hidden;border:1px solid #e2e8f0;height:360px;background:#f1f5f9;display:flex;align-items:center;justify-content:center;">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57870.26386024938!2d73.8395!3d25.0685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3967f20b98a8a14d%3A0xf83c2e65e60f1782!2sRajsamand%2C%20Rajasthan!5e0!3m2!1sen!2sin!4v1700000000000"
      width="100%" height="360" style="border:0;display:block;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade" title="Circle CAA Location – Rajsamand, Rajasthan">
    </iframe>
  </div>

</div>

<style>
@media (max-width: 768px) {
  .contact-layout { grid-template-columns: 1fr !important; gap: 32px !important; }
  .contact-layout > div:first-child { order: 2; }
  .contact-layout > div:last-child { order: 1; }
}
</style>

<?php get_footer(); ?>
