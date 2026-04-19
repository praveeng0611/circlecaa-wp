<?php
/**
 * Template Name: About Us
 */
get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>About Circle CAA</h1>
    <p>Our story, our mission, and the values that guide everything we do</p>
  </div>
</section>

<!-- Story Section -->
<section style="padding:80px 0;">
  <div class="container">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;" class="about-grid">

      <div>
        <div style="display:inline-block;background:#eff6ff;color:#1a3a7a;font-weight:700;font-size:13px;padding:6px 16px;border-radius:20px;margin-bottom:20px;">Our Story</div>
        <h2 style="font-size:clamp(1.8rem,3vw,2.4rem);color:#1a3a7a;line-height:1.3;margin-bottom:20px;">Born from a Belief that Communities Can Change the World</h2>
        <p style="color:#64748b;line-height:1.8;margin-bottom:16px;">Circle CAA (Creative Arts and Awareness) was founded in Rajsamand, Rajasthan, by <strong>Saurabh Mishra</strong> and <strong>Aashish Yadav</strong> with a simple but powerful belief — that when creative minds come together, they can ignite meaningful social change.</p>
        <p style="color:#64748b;line-height:1.8;margin-bottom:16px;">What began as small poetry gatherings and debate sessions quickly grew into a full-fledged platform for environmental activism, mental health awareness, hunger alleviation, and cultural celebration.</p>
        <p style="color:#64748b;line-height:1.8;">Today, Circle CAA is a registered NGO with 55+ founding members, 219 active volunteers, and over 55 events successfully organised across Rajsamand district.</p>
      </div>

      <div style="position:relative;">
        <div style="background:linear-gradient(135deg,#1a3a7a,#16a34a);border-radius:20px;padding:48px 40px;color:#fff;text-align:center;">
          <div style="font-size:64px;margin-bottom:12px;">🌿</div>
          <h3 style="color:#fff;font-size:1.5rem;margin-bottom:16px;">Registered NGO</h3>
          <p style="opacity:.9;line-height:1.7;">Officially registered under the Societies Registration Act, operating from Rajsamand, Rajasthan.</p>
          <div style="margin-top:24px;padding-top:24px;border-top:1px solid rgba(255,255,255,.2);display:grid;grid-template-columns:1fr 1fr;gap:16px;text-align:center;">
            <div><div style="font-size:2rem;font-weight:900;">55+</div><div style="font-size:13px;opacity:.8;">Events</div></div>
            <div><div style="font-size:2rem;font-weight:900;">219</div><div style="font-size:13px;opacity:.8;">Volunteers</div></div>
            <div><div style="font-size:2rem;font-weight:900;">70+</div><div style="font-size:13px;opacity:.8;">Promoters</div></div>
            <div><div style="font-size:2rem;font-weight:900;">2019</div><div style="font-size:13px;opacity:.8;">Founded</div></div>
          </div>
        </div>
        <div style="position:absolute;top:-16px;right:-16px;width:80px;height:80px;background:#fbbf24;border-radius:50%;z-index:-1;opacity:.5;"></div>
        <div style="position:absolute;bottom:-20px;left:-20px;width:60px;height:60px;background:#16a34a;border-radius:50%;z-index:-1;opacity:.3;"></div>
      </div>

    </div>
  </div>
</section>

<!-- Mission / Vision / Values -->
<section style="padding:80px 0;background:#f8fafc;">
  <div class="container">
    <div style="text-align:center;margin-bottom:48px;">
      <h2 style="color:#1a3a7a;font-size:clamp(1.6rem,3vw,2.2rem);">What Drives Us</h2>
      <p style="color:#64748b;max-width:540px;margin:12px auto;">Three pillars that form the foundation of everything Circle CAA does</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:28px;">
      <?php
      $pillars = array(
        array( 'icon' => '🎯', 'title' => 'Our Mission', 'color' => '#1a3a7a',
               'text' => 'To create a platform where creative minds come together to explore their uniqueness and grow — both as individuals and as a community. We empower through education, environment, arts and social awareness.' ),
        array( 'icon' => '🔭', 'title' => 'Our Vision', 'color' => '#16a34a',
               'text' => 'A Rajasthan — and an India — where every young person has access to cultural expression, quality education, a clean environment, and the awareness to build a just society.' ),
        array( 'icon' => '💎', 'title' => 'Our Values', 'color' => '#7c3aed',
               'text' => 'Creativity, Compassion, Community. We believe in the power of collective action, the dignity of every individual, and the transformative potential of art and education.' ),
      );
      foreach ( $pillars as $p ) :
      ?>
        <div style="background:#fff;border-radius:16px;padding:36px 28px;box-shadow:0 2px 16px rgba(0,0,0,.06);border-top:4px solid <?php echo $p['color']; ?>;">
          <div style="font-size:40px;margin-bottom:16px;"><?php echo $p['icon']; ?></div>
          <h3 style="color:<?php echo $p['color']; ?>;margin-bottom:12px;"><?php echo esc_html( $p['title'] ); ?></h3>
          <p style="color:#64748b;line-height:1.75;font-size:15px;"><?php echo esc_html( $p['text'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- What We Do -->
<section style="padding:80px 0;">
  <div class="container">
    <div style="text-align:center;margin-bottom:48px;">
      <h2 style="color:#1a3a7a;font-size:clamp(1.6rem,3vw,2.2rem);">Our Areas of Work</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;">
      <?php
      $areas = array(
        array( 'icon' => '🌱', 'label' => 'Environment & Green Initiatives' ),
        array( 'icon' => '📚', 'label' => 'Education & Book Promotions' ),
        array( 'icon' => '🎤', 'label' => 'Kavi Samelan & Poetry' ),
        array( 'icon' => '🧠', 'label' => 'Mental Health Awareness' ),
        array( 'icon' => '🍽️', 'label' => 'Hunger & Poverty Alleviation' ),
        array( 'icon' => '🏆', 'label' => 'Quiz & Debate Competitions' ),
        array( 'icon' => '💪', 'label' => 'Wellness for All' ),
        array( 'icon' => '📢', 'label' => 'Social Awareness Campaigns' ),
      );
      foreach ( $areas as $area ) :
      ?>
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:24px 16px;text-align:center;transition:box-shadow .2s;"
             onmouseover="this.style.boxShadow='0 4px 20px rgba(0,0,0,.1)'" onmouseout="this.style.boxShadow='none'">
          <div style="font-size:36px;margin-bottom:10px;"><?php echo $area['icon']; ?></div>
          <div style="font-size:14px;font-weight:600;color:#1e293b;line-height:1.4;"><?php echo esc_html( $area['label'] ); ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Founders Section -->
<section style="padding:80px 0;background:linear-gradient(135deg,#0d2149,#1a3a7a);">
  <div class="container">
    <div style="text-align:center;margin-bottom:48px;">
      <h2 style="color:#fff;font-size:clamp(1.6rem,3vw,2.2rem);">Our Founders</h2>
      <p style="color:rgba(255,255,255,.75);max-width:500px;margin:12px auto;">The people who dared to dream and turned that dream into a movement</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:32px;max-width:800px;margin:0 auto;">
      <?php
      $founders = array(
        array( 'name' => 'Saurabh Mishra', 'role' => 'Founder & Chairman', 'initials' => 'SM',
               'bio' => 'A visionary leader, poet and social entrepreneur from Rajsamand. Saurabh founded Circle CAA with the conviction that creative expression is the most powerful tool for social change. He guides Circle CAA\'s long-term vision and strategy.' ),
        array( 'name' => 'Aashish Yadav', 'role' => 'Co-Founder & Director', 'initials' => 'AY',
               'bio' => 'An environmental activist and passionate educator. Aashish drives Circle CAA\'s green initiatives, from tree plantation campaigns to sustainability awareness programmes across schools and colleges in Rajsamand.' ),
      );
      foreach ( $founders as $f ) :
      ?>
        <div style="background:rgba(255,255,255,.1);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.2);border-radius:20px;padding:36px;text-align:center;">
          <div style="width:88px;height:88px;border-radius:50%;background:rgba(255,255,255,.2);margin:0 auto 20px;display:flex;align-items:center;justify-content:center;font-size:32px;font-weight:900;color:#fff;"><?php echo $f['initials']; ?></div>
          <h3 style="color:#fff;margin-bottom:4px;"><?php echo esc_html( $f['name'] ); ?></h3>
          <p style="color:#93c5fd;font-size:14px;margin-bottom:16px;"><?php echo esc_html( $f['role'] ); ?></p>
          <p style="color:rgba(255,255,255,.8);font-size:14px;line-height:1.75;"><?php echo esc_html( $f['bio'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Timeline -->
<section style="padding:80px 0;">
  <div class="container">
    <div style="text-align:center;margin-bottom:48px;">
      <h2 style="color:#1a3a7a;font-size:clamp(1.6rem,3vw,2.2rem);">Our Journey</h2>
    </div>
    <div style="max-width:700px;margin:0 auto;position:relative;">
      <div style="position:absolute;left:50%;top:0;bottom:0;width:2px;background:linear-gradient(#1a3a7a,#16a34a);transform:translateX(-50%);"></div>
      <?php
      $milestones = array(
        array( 'year' => '2019', 'title' => 'Circle CAA Founded', 'desc' => 'Saurabh Mishra and Aashish Yadav establish Circle CAA in Rajsamand with a small group of like-minded individuals.' ),
        array( 'year' => '2020', 'title' => 'First Major Event', 'desc' => 'Successfully organized the first Kavi Samelan, bringing together poets from across Rajasthan.' ),
        array( 'year' => '2021', 'title' => 'Green Initiative Launch', 'desc' => 'Launched the Green Rajsamand campaign, planting over 500 trees across the district.' ),
        array( 'year' => '2022', 'title' => 'NGO Registration', 'desc' => 'Officially registered as an NGO under the Societies Registration Act, gaining legal standing.' ),
        array( 'year' => '2023', 'title' => '200+ Volunteers', 'desc' => 'Crossed a milestone of 200 active volunteers and 50+ successfully completed events.' ),
        array( 'year' => '2024+', 'title' => 'Growing Stronger', 'desc' => 'Expanding reach to new schools, colleges and communities. Digital presence launched.' ),
      );
      foreach ( $milestones as $i => $m ) :
        $left = $i % 2 === 0;
      ?>
        <div style="display:flex;justify-content:<?php echo $left ? 'flex-start' : 'flex-end'; ?>;margin-bottom:40px;position:relative;">
          <div style="width:calc(50% - 30px);background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:20px 24px;box-shadow:0 2px 12px rgba(0,0,0,.06);<?php echo $left ? '' : 'text-align:right;'; ?>">
            <div style="font-size:13px;font-weight:700;color:#16a34a;margin-bottom:4px;"><?php echo esc_html( $m['year'] ); ?></div>
            <div style="font-weight:700;color:#1a3a7a;margin-bottom:6px;"><?php echo esc_html( $m['title'] ); ?></div>
            <div style="font-size:13px;color:#64748b;line-height:1.6;"><?php echo esc_html( $m['desc'] ); ?></div>
          </div>
          <!-- dot -->
          <div style="position:absolute;left:50%;top:20px;width:14px;height:14px;border-radius:50%;background:#1a3a7a;border:3px solid #fff;box-shadow:0 0 0 2px #1a3a7a;transform:translateX(-50%);"></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section style="padding:64px 0;background:#f0fdf4;text-align:center;">
  <div class="container">
    <h2 style="color:#1a3a7a;margin-bottom:12px;">Ready to Join Our Circle?</h2>
    <p style="color:#64748b;max-width:480px;margin:0 auto 28px;">Be part of a growing community that's making a real difference in Rajsamand.</p>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url('/get-involved') ); ?>" class="btn btn-primary" style="padding:14px 32px;">Get Involved</a>
      <a href="<?php echo esc_url( home_url('/contact') ); ?>" class="btn btn-outline" style="padding:14px 32px;">Contact Us</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
