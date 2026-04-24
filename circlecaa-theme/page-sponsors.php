<?php
/**
 * Template Name: Sponsors
 */
get_header(); ?>

<section class="page-hero">
  <div class="container">
    <div class="page-hero-inner">
      <div class="breadcrumb">
        <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
        <span class="sep">›</span>
        <span class="current">Our Sponsors</span>
      </div>
      <h1>Our Sponsors &amp; Partners</h1>
      <p>Businesses and organisations that support Circle CAA's mission — and offer exclusive benefits to our community members</p>
    </div>
  </div>
</section>

<div class="container" style="padding-top:60px;padding-bottom:80px;">

  <?php
  $sponsors_query = new WP_Query( array(
    'post_type'      => 'sponsor',
    'posts_per_page' => 50,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
  ) );
  ?>

  <?php if ( $sponsors_query->have_posts() ) : ?>

    <!-- Intro blurb -->
    <div style="text-align:center;max-width:640px;margin:0 auto 56px;">
      <p class="section-label">Trusted Partners</p>
      <h2 class="section-title">Brands That Believe in Community</h2>
      <p class="section-desc">Our sponsors share Circle CAA's values of community, culture and social impact. Show your Circle CAA membership to unlock exclusive discounts at these businesses.</p>
    </div>

    <div class="sponsors-grid">
      <?php while ( $sponsors_query->have_posts() ) : $sponsors_query->the_post();
        $link     = get_post_meta( get_the_ID(), '_sponsor_link', true );
        $place    = get_post_meta( get_the_ID(), '_sponsor_place', true );
        $discount = get_post_meta( get_the_ID(), '_sponsor_discount', true );
        $content  = get_the_content();
        $wrap_start = $link ? '<a href="' . esc_url($link) . '" target="_blank" rel="noopener">' : '<div>';
        $wrap_end   = $link ? '</a>' : '</div>';
      ?>
        <div class="sponsor-card reveal-on-scroll">
          <div class="sponsor-logo-wrap">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'medium', array( 'style' => 'max-height:100px;max-width:180px;object-fit:contain;width:auto;height:auto;' ) ); ?>
            <?php else : ?>
              <div class="sponsor-logo-placeholder">🏢</div>
            <?php endif; ?>
          </div>

          <div class="sponsor-body">
            <h3><?php the_title(); ?></h3>

            <?php if ( $place ) : ?>
              <p class="sponsor-place">
                <i class="fas fa-map-marker-alt" style="color:var(--green);font-size:12px;"></i>
                <?php echo esc_html( $place ); ?>
              </p>
            <?php endif; ?>

            <?php if ( $discount ) : ?>
              <span class="sponsor-discount">🎁 <?php echo esc_html( $discount ); ?></span>
            <?php endif; ?>

            <?php if ( $content ) : ?>
              <p style="font-size:13px;color:var(--gray-600);line-height:1.6;margin-bottom:14px;"><?php echo wp_trim_words( $content, 20, '…' ); ?></p>
            <?php endif; ?>

            <?php if ( $link ) : ?>
              <a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener" class="sponsor-link">
                <i class="fas fa-external-link-alt" style="font-size:11px;"></i>
                Visit Website
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>

  <?php else : ?>

    <!-- Placeholder sponsors when none added yet -->
    <div style="text-align:center;max-width:640px;margin:0 auto 56px;">
      <p class="section-label">Trusted Partners</p>
      <h2 class="section-title">Brands That Believe in Community</h2>
      <p class="section-desc">Our sponsors share Circle CAA's values. Show your membership to unlock exclusive discounts at these local businesses.</p>
    </div>

    <div class="sponsors-grid">
      <?php
      $placeholders = array(
        array(
          'name'     => 'Saatvik – The Meet zOne',
          'place'    => 'Rajsamand, Rajasthan',
          'discount' => '10% off on event bookings',
          'link'     => '#',
          'icon'     => '🌿',
          'desc'     => 'A unique open-air community venue for events, workshops, and cultural evenings in Rajsamand.',
        ),
        array(
          'name'     => 'Rajsamand Book House',
          'place'    => 'Main Market, Rajsamand',
          'discount' => '15% off on all book purchases',
          'link'     => '#',
          'icon'     => '📚',
          'desc'     => 'Rajsamand\'s premier bookstore with a wide selection of Hindi, English and regional titles.',
        ),
        array(
          'name'     => 'Green Leaf Café',
          'place'    => 'Near Lake Road, Rajsamand',
          'discount' => 'Free coffee with any meal order',
          'link'     => '#',
          'icon'     => '☕',
          'desc'     => 'A cosy café serving organic teas, coffees and healthy snacks in a community-friendly environment.',
        ),
        array(
          'name'     => 'TechHub Rajsamand',
          'place'    => 'Industrial Area, Rajsamand',
          'discount' => '20% off on digital skills workshops',
          'link'     => '#',
          'icon'     => '💻',
          'desc'     => 'Digital literacy centre offering computer training, graphic design and web development courses.',
        ),
        array(
          'name'     => 'Nature Wellness Studio',
          'place'    => 'Nathwara Road, Rajsamand',
          'discount' => 'First yoga session free',
          'link'     => '#',
          'icon'     => '🧘',
          'desc'     => 'Holistic wellness studio offering yoga, meditation and Ayurvedic wellness programmes.',
        ),
        array(
          'name'     => 'Rajsamand Printers',
          'place'    => 'Station Road, Rajsamand',
          'discount' => '25% off on all printing orders',
          'link'     => '#',
          'icon'     => '🖨️',
          'desc'     => 'Full-service print shop for banners, pamphlets, certificates and event materials.',
        ),
      );
      foreach ( $placeholders as $pl ) : ?>
        <div class="sponsor-card reveal-on-scroll">
          <div class="sponsor-logo-wrap">
            <div class="sponsor-logo-placeholder"><?php echo $pl['icon']; ?></div>
          </div>
          <div class="sponsor-body">
            <h3><?php echo esc_html( $pl['name'] ); ?></h3>
            <p class="sponsor-place">
              <i class="fas fa-map-marker-alt" style="color:var(--green);font-size:12px;"></i>
              <?php echo esc_html( $pl['place'] ); ?>
            </p>
            <span class="sponsor-discount">🎁 <?php echo esc_html( $pl['discount'] ); ?></span>
            <p style="font-size:13px;color:var(--gray-600);line-height:1.6;margin:12px 0 14px;"><?php echo esc_html( $pl['desc'] ); ?></p>
            <a href="<?php echo esc_url( $pl['link'] ); ?>" class="sponsor-link">
              <i class="fas fa-external-link-alt" style="font-size:11px;"></i> Visit Website
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  <?php endif; ?>

  <!-- Become a Sponsor CTA -->
  <div style="margin-top:80px;background:linear-gradient(135deg,var(--blue-dark),#1a3a7a);border-radius:20px;padding:56px 32px;text-align:center;position:relative;overflow:hidden;">
    <div style="position:relative;z-index:2;">
      <p class="section-label" style="color:#86efac;">For Businesses</p>
      <h2 style="font-size:clamp(24px,4vw,36px);font-weight:900;color:var(--white);margin-bottom:14px;">Become a Circle CAA Sponsor</h2>
      <p style="font-size:17px;color:rgba(255,255,255,0.75);max-width:520px;margin:0 auto 32px;line-height:1.7;">
        Partner with us to reach Rajsamand's most engaged community of learners, volunteers and change-makers. Gain visibility, goodwill and loyal customers.
      </p>
      <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
        <a href="<?php echo esc_url( home_url('/contact') ); ?>" class="btn btn-primary">Get in Touch</a>
        <a href="mailto:enquirycirclecaa@gmail.com" class="btn btn-outline">enquirycirclecaa@gmail.com</a>
      </div>
    </div>
  </div>

  <!-- Admin note -->
  <?php if ( current_user_can('edit_posts') ) : ?>
    <div style="margin-top:40px;padding:28px;background:#eff6ff;border:2px dashed #2563eb;border-radius:16px;text-align:center;">
      <p style="color:#1e40af;margin:0 0 10px;font-weight:700;">🔧 Admin — Manage Sponsors</p>
      <p style="color:#1d4ed8;margin:0 0 16px;font-size:14px;">Add real sponsors from the WordPress admin. Each sponsor has a Name (title), Logo (featured image), Website URL, Location, and Discount offer.</p>
      <a href="<?php echo admin_url('edit.php?post_type=sponsor'); ?>" class="btn btn-blue" style="font-size:14px;padding:10px 24px;">Manage Sponsors</a>
      &nbsp;
      <a href="<?php echo admin_url('post-new.php?post_type=sponsor'); ?>" class="btn btn-primary" style="font-size:14px;padding:10px 24px;">Add New Sponsor</a>
    </div>
  <?php endif; ?>

</div>

<?php get_footer(); ?>
