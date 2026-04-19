<?php
/**
 * Template Name: Get Involved
 */
get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Get Involved</h1>
    <p>There are many ways to support Circle CAA\'s mission — find yours</p>
  </div>
</section>

<div class="container" style="padding-top:64px;padding-bottom:80px;">

  <!-- Ways to get involved -->
  <div style="text-align:center;margin-bottom:56px;">
    <h2 style="color:#1a3a7a;font-size:clamp(1.5rem,3vw,2.2rem);margin-bottom:12px;">How You Can Make a Difference</h2>
    <p style="color:#64748b;max-width:540px;margin:0 auto;">Whether you have an hour, a day, or a lifetime of dedication — Circle CAA has a place for you.</p>
  </div>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:28px;margin-bottom:72px;">
    <?php
    $ways = array(
      array(
        'icon'  => '🙋',
        'color' => '#1a3a7a',
        'title' => 'Volunteer',
        'desc'  => 'Roll up your sleeves and join us on the ground. Whether it\'s planting trees, organizing events or supporting awareness campaigns — volunteers are the heart of Circle CAA.',
        'cta'   => 'Become a Volunteer',
        'href'  => 'https://forms.gle/tkfV8Ab3CF9Hhk5W9',
        'external' => true,
      ),
      array(
        'icon'  => '🤝',
        'color' => '#16a34a',
        'title' => 'Partner With Us',
        'desc'  => 'Schools, colleges, businesses and NGOs can partner with Circle CAA to co-host events, fund programmes or reach new communities together.',
        'cta'   => 'Explore Partnership',
        'href'  => home_url('/contact'),
        'external' => false,
      ),
      array(
        'icon'  => '💰',
        'color' => '#f59e0b',
        'title' => 'Donate',
        'desc'  => 'Your financial contribution directly funds our programmes — from tree plantations to book distributions. Every rupee makes a difference.',
        'cta'   => 'Support Our Work',
        'href'  => home_url('/contact'),
        'external' => false,
      ),
      array(
        'icon'  => '📢',
        'color' => '#7c3aed',
        'title' => 'Spread the Word',
        'desc'  => 'Follow us on social media, share our events, tell your friends and family. Awareness is the first step to action — and it costs nothing.',
        'cta'   => 'Follow Us',
        'href'  => home_url('/contact'),
        'external' => false,
      ),
    );
    foreach ( $ways as $way ) :
    ?>
      <div style="background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:36px 28px;text-align:center;box-shadow:0 2px 16px rgba(0,0,0,.05);transition:transform .2s,box-shadow .2s;"
           onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 32px rgba(0,0,0,.1)'"
           onmouseout="this.style.transform='none';this.style.boxShadow='0 2px 16px rgba(0,0,0,.05)'">
        <div style="font-size:48px;margin-bottom:16px;"><?php echo $way['icon']; ?></div>
        <div style="width:56px;height:4px;background:<?php echo $way['color']; ?>;border-radius:2px;margin:0 auto 20px;"></div>
        <h3 style="color:#1a3a7a;margin-bottom:12px;"><?php echo esc_html( $way['title'] ); ?></h3>
        <p style="color:#64748b;line-height:1.7;font-size:15px;margin-bottom:24px;"><?php echo esc_html( $way['desc'] ); ?></p>
        <a href="<?php echo esc_url( $way['href'] ); ?>" <?php echo $way['external'] ? 'target="_blank" rel="noopener"' : ''; ?>
           class="btn btn-primary" style="background:<?php echo $way['color']; ?>;border-color:<?php echo $way['color']; ?>;font-size:14px;padding:10px 24px;">
          <?php echo esc_html( $way['cta'] ); ?>
        </a>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Volunteer Registration -->
  <div style="display:grid;grid-template-columns:1fr 1.2fr;gap:56px;align-items:center;padding:64px 0;border-top:1px solid #f1f5f9;" class="volunteer-grid">

    <div>
      <div style="display:inline-block;background:#eff6ff;color:#1a3a7a;font-weight:700;font-size:13px;padding:6px 16px;border-radius:20px;margin-bottom:20px;">Join Our Team</div>
      <h2 style="color:#1a3a7a;font-size:clamp(1.5rem,2.5vw,2rem);margin-bottom:16px;">Become a Volunteer Today</h2>
      <p style="color:#64748b;line-height:1.8;margin-bottom:28px;">We welcome volunteers from all walks of life. No special skills required — just enthusiasm, compassion and a desire to make a positive impact in your community.</p>

      <div style="display:flex;flex-direction:column;gap:16px;">
        <?php
        $perks = array(
          array( 'icon' => '🎓', 'text' => 'Certificate of Volunteering for all participants' ),
          array( 'icon' => '🌐', 'text' => 'Build your social network and meet inspiring people' ),
          array( 'icon' => '💼', 'text' => 'Gain real-world experience in event management and advocacy' ),
          array( 'icon' => '🏅', 'text' => 'Recognition for outstanding volunteers at annual events' ),
          array( 'icon' => '❤️', 'text' => 'Be part of a community that genuinely cares' ),
        );
        foreach ( $perks as $perk ) :
        ?>
          <div style="display:flex;align-items:center;gap:12px;">
            <span style="font-size:24px;"><?php echo $perk['icon']; ?></span>
            <span style="color:#374151;font-size:15px;"><?php echo esc_html( $perk['text'] ); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Google Form embed or direct link -->
    <div style="background:linear-gradient(135deg,#1a3a7a,#16a34a);border-radius:24px;padding:48px 36px;text-align:center;color:#fff;">
      <div style="font-size:64px;margin-bottom:20px;">✨</div>
      <h3 style="color:#fff;font-size:1.5rem;margin-bottom:12px;">Ready to Join?</h3>
      <p style="opacity:.9;line-height:1.7;margin-bottom:28px;">Fill in our quick volunteer registration form and we\'ll be in touch within 48 hours.</p>

      <a href="https://forms.gle/tkfV8Ab3CF9Hhk5W9" target="_blank" rel="noopener"
         style="display:inline-block;background:#fff;color:#1a3a7a;font-weight:800;font-size:16px;padding:16px 40px;border-radius:12px;text-decoration:none;transition:transform .2s;"
         onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='none'">
        Register as Volunteer 🙋
      </a>

      <div style="margin-top:24px;opacity:.8;font-size:13px;">Takes less than 2 minutes</div>

      <div style="margin-top:32px;padding-top:24px;border-top:1px solid rgba(255,255,255,.2);">
        <div style="font-size:14px;margin-bottom:12px;">Or reach us directly:</div>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
          <a href="https://wa.me/<?php echo circlecaa_get_option('whatsapp','919358851143'); ?>" target="_blank"
             style="display:flex;align-items:center;gap:6px;background:rgba(255,255,255,.15);color:#fff;padding:10px 18px;border-radius:8px;text-decoration:none;font-size:13px;">
            <i class="fab fa-whatsapp"></i> WhatsApp
          </a>
          <a href="mailto:<?php echo esc_attr( circlecaa_get_email() ?: 'circlecaa@gmail.com' ); ?>"
             style="display:flex;align-items:center;gap:6px;background:rgba(255,255,255,.15);color:#fff;padding:10px 18px;border-radius:8px;text-decoration:none;font-size:13px;">
            <i class="fas fa-envelope"></i> Email Us
          </a>
        </div>
      </div>
    </div>

  </div>

  <!-- FAQ -->
  <div style="padding-top:72px;border-top:1px solid #f1f5f9;">
    <div style="text-align:center;margin-bottom:40px;">
      <h2 style="color:#1a3a7a;font-size:clamp(1.4rem,3vw,2rem);">Common Questions</h2>
    </div>
    <div style="max-width:720px;margin:0 auto;display:flex;flex-direction:column;gap:16px;">
      <?php
      $faqs = array(
        array( 'q' => 'Do I need prior experience to volunteer?', 'a' => 'Not at all! We welcome everyone — students, professionals, homemakers, retirees. If you have enthusiasm and a willingness to help, you\'re already qualified.' ),
        array( 'q' => 'How much time do I need to commit?', 'a' => 'It's entirely flexible. You can volunteer for a single event or become a regular member. We have opportunities ranging from a few hours to ongoing weekly engagement.' ),
        array( 'q' => 'Can schools and colleges partner with Circle CAA?', 'a' => 'Absolutely. We actively partner with educational institutions for quiz competitions, environmental programmes and awareness drives. Contact us to discuss possibilities.' ),
        array( 'q' => 'Is Circle CAA open to people outside Rajsamand?', 'a' => 'Yes! While our primary activities are in Rajsamand, we welcome supporters from anywhere in India. Digital volunteering — content, design, outreach — is also available.' ),
        array( 'q' => 'How are donations used?', 'a' => 'Donations directly fund our programmes — tree plantation materials, event costs, books for distribution, and awareness campaign materials. We maintain full transparency.' ),
      );
      foreach ( $faqs as $i => $faq ) :
      ?>
        <details style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:20px 24px;cursor:pointer;">
          <summary style="font-weight:700;color:#1a3a7a;font-size:15px;list-style:none;display:flex;justify-content:space-between;align-items:center;">
            <?php echo esc_html( $faq['q'] ); ?>
            <span style="color:#94a3b8;flex-shrink:0;margin-left:12px;">▼</span>
          </summary>
          <p style="margin-top:12px;color:#64748b;line-height:1.75;font-size:15px;padding-top:12px;border-top:1px solid #f1f5f9;"><?php echo esc_html( $faq['a'] ); ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>

</div>

<style>
@media (max-width: 768px) {
  .volunteer-grid { grid-template-columns: 1fr !important; gap: 32px !important; }
}
</style>

<?php get_footer(); ?>
