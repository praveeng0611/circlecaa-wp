<?php
/**
 * Template Name: Activities
 */
get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Our Activities & Programs</h1>
    <p>Eight pillars of impact — from planting trees to celebrating poetry</p>
  </div>
</section>

<div class="container" style="padding-top:64px;padding-bottom:80px;">

  <?php
  $activities = array(
    array(
      'icon'   => '🌱',
      'title'  => 'Green Environment Campaign',
      'slug'   => 'green-environment',
      'color'  => '#16a34a',
      'tag'    => 'Environment',
      'desc'   => 'Our flagship Green Rajsamand initiative works to restore and protect the natural environment of our region. We organize tree plantation drives, clean-up campaigns and awareness sessions on topics like water conservation, plastic pollution and sustainable living.',
      'points' => array( 'Mass tree plantation drives on key dates', 'School and college eco-club partnerships', 'Clean-up campaigns in public parks and water bodies', 'Awareness rallies on environment day', 'Vermi-composting and organic gardening workshops' ),
      'stats'  => array( '1000+ Trees Planted', '20+ Plantation Events', '15 School Partners' ),
    ),
    array(
      'icon'   => '📜',
      'title'  => 'Kavi Samelan & Poetry',
      'slug'   => 'kavi-samelan',
      'color'  => '#7c3aed',
      'tag'    => 'Culture & Arts',
      'desc'   => 'Hindi poetry is a living tradition that carries centuries of wisdom, protest, love and celebration. Circle CAA\'s Kavi Samelan events bring together poets of all ages — from seasoned veterans to first-time performers — to share their voice with the community.',
      'points' => array( 'Annual Kavi Samelan with regional poets', 'Open-mic sessions for emerging voices', 'Youth poetry writing workshops', 'Publication of community poetry anthologies', 'Collaboration with Rajasthani folk artists' ),
      'stats'  => array( '8 Kavi Samelan Events', '100+ Poets Featured', '500+ Audience Members' ),
    ),
    array(
      'icon'   => '🏆',
      'title'  => 'Quiz & Debate Competitions',
      'slug'   => 'quiz-debate',
      'color'  => '#f59e0b',
      'tag'    => 'Education',
      'desc'   => 'Critical thinking and articulate expression are life skills that open doors. Our quiz and debate programmes challenge young minds to research, reason and argue — building confidence and knowledge along the way.',
      'points' => array( 'Inter-school and inter-college quiz competitions', 'Parliamentary and extempore debate formats', 'Social issues debate series', 'Annual championship with prizes', 'Mentorship for competitive exam aspirants' ),
      'stats'  => array( '25+ Competitions Held', '500+ Student Participants', '30 Schools Covered' ),
    ),
    array(
      'icon'   => '📚',
      'title'  => 'Book Promotions',
      'slug'   => 'book-promotions',
      'color'  => '#0891b2',
      'tag'    => 'Education',
      'desc'   => 'In a world dominated by screens, Circle CAA champions the joy of reading. We promote books — especially local and Hindi literature — through book fairs, reading clubs and campaigns that bring literature to communities where access is limited.',
      'points' => array( 'Community book fair and exchange events', 'Free library setup in under-served areas', 'Author meet & reading sessions', 'Promotion of Hindi and Rajasthani literature', 'Book donation drives for rural schools' ),
      'stats'  => array( '5,000+ Books Distributed', '10 Reading Clubs', '3 Community Libraries' ),
    ),
    array(
      'icon'   => '💪',
      'title'  => 'Wellness for All',
      'slug'   => 'wellness',
      'color'  => '#16a34a',
      'tag'    => 'Health',
      'desc'   => 'Good health is the foundation of everything. Circle CAA\'s Wellness for All initiative addresses physical and mental health through yoga camps, health check-up drives, nutrition awareness and sports events for youth.',
      'points' => array( 'Free yoga and meditation workshops', 'Health awareness camps in rural areas', 'Nutrition education for women and children', 'Sports events promoting active lifestyles', 'Collaboration with local doctors and health workers' ),
      'stats'  => array( '15 Wellness Camps', '800+ Beneficiaries', '12 Health Partners' ),
    ),
    array(
      'icon'   => '🍽️',
      'title'  => 'Hunger & Poverty Alleviation',
      'slug'   => 'hunger-poverty',
      'color'  => '#dc2626',
      'tag'    => 'Social Welfare',
      'desc'   => 'No one in our community should go to bed hungry. Circle CAA\'s food distribution drives, livelihood support programmes and skill-development workshops work towards eliminating hunger and reducing poverty in Rajsamand.',
      'points' => array( 'Weekly food distribution for homeless and destitute', 'Livelihood training for unemployed youth', 'Festival season food drives', 'Partnership with local restaurants and businesses', 'Awareness on government welfare schemes' ),
      'stats'  => array( '2,000+ Meals Served', '12 Food Drives', '100+ Families Supported' ),
    ),
    array(
      'icon'   => '🧠',
      'title'  => 'Mental Health Awareness',
      'slug'   => 'mental-health',
      'color'  => '#be185d',
      'tag'    => 'Health',
      'desc'   => 'Mental health is still a taboo topic in many communities. Circle CAA is determined to change that. We organize sensitization workshops, expert talks and peer support programmes that help people understand, talk about, and seek help for mental health challenges.',
      'points' => array( 'Sensitization workshops in schools and colleges', 'Expert-led talks by psychologists and counsellors', 'Peer support group facilitation', 'Anti-stigma awareness campaigns', 'Resource sharing on mental health helplines' ),
      'stats'  => array( '20+ Workshops', '1,500+ Participants', '10 Expert Speakers' ),
    ),
    array(
      'icon'   => '📢',
      'title'  => 'Social Awareness Campaigns',
      'slug'   => 'social-awareness',
      'color'  => '#1a3a7a',
      'tag'    => 'Advocacy',
      'desc'   => 'From gender equality to road safety, from anti-corruption to voter awareness — Circle CAA runs targeted campaigns on the social issues that matter most to our community. We believe informed citizens are empowered citizens.',
      'points' => array( 'Gender sensitization and women empowerment', 'Voter awareness and civic education drives', 'Anti-addiction and drug awareness campaigns', 'Road safety awareness with local police', 'Digital literacy and cyber safety workshops' ),
      'stats'  => array( '30+ Campaigns', '10,000+ Reached', '25+ NGO Collaborations' ),
    ),
  );

  foreach ( $activities as $idx => $act ) :
    $is_even = $idx % 2 === 0;
  ?>
  <section style="padding:64px 0;<?php echo $idx > 0 ? 'border-top:1px solid #f1f5f9;' : ''; ?>" id="<?php echo esc_attr( $act['slug'] ); ?>">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:start;" class="activities-grid">

      <!-- Info side -->
      <div style="order:<?php echo $is_even ? '1' : '2'; ?>">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:20px;">
          <span style="font-size:48px;"><?php echo $act['icon']; ?></span>
          <span style="background:<?php echo $act['color']; ?>22;color:<?php echo $act['color']; ?>;font-size:12px;font-weight:700;padding:4px 12px;border-radius:20px;text-transform:uppercase;"><?php echo esc_html( $act['tag'] ); ?></span>
        </div>
        <h2 style="font-size:clamp(1.4rem,2.5vw,2rem);color:#1a3a7a;margin-bottom:16px;border-left:4px solid <?php echo $act['color']; ?>;padding-left:16px;"><?php echo esc_html( $act['title'] ); ?></h2>
        <p style="color:#64748b;line-height:1.8;margin-bottom:24px;"><?php echo esc_html( $act['desc'] ); ?></p>
        <ul style="list-style:none;padding:0;margin:0 0 28px;">
          <?php foreach ( $act['points'] as $pt ) : ?>
            <li style="display:flex;align-items:flex-start;gap:10px;margin-bottom:10px;color:#374151;font-size:15px;">
              <span style="color:<?php echo $act['color']; ?>;font-size:18px;margin-top:1px;">✓</span>
              <span><?php echo esc_html( $pt ); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url( home_url('/get-involved') ); ?>" class="btn btn-primary" style="background:<?php echo $act['color']; ?>;border-color:<?php echo $act['color']; ?>;">Participate</a>
      </div>

      <!-- Stats / visual side -->
      <div style="order:<?php echo $is_even ? '2' : '1'; ?>;">
        <div style="background:linear-gradient(135deg,<?php echo $act['color']; ?>11,<?php echo $act['color']; ?>22);border:1px solid <?php echo $act['color']; ?>33;border-radius:20px;padding:40px 32px;">
          <div style="display:grid;grid-template-columns:1fr;gap:16px;">
            <?php foreach ( $act['stats'] as $stat ) :
              $parts = explode( ' ', $stat, 2 );
              $number = $parts[0]; $label = $parts[1] ?? '';
            ?>
              <div style="background:#fff;border-radius:12px;padding:20px 24px;display:flex;align-items:center;gap:16px;box-shadow:0 2px 8px rgba(0,0,0,.04);">
                <div style="font-size:2rem;font-weight:900;color:<?php echo $act['color']; ?>;min-width:80px;"><?php echo esc_html( $number ); ?></div>
                <div style="font-size:15px;color:#64748b;font-weight:500;"><?php echo esc_html( $label ); ?></div>
              </div>
            <?php endforeach; ?>
          </div>
          <div style="margin-top:24px;padding-top:24px;border-top:1px solid <?php echo $act['color']; ?>33;text-align:center;">
            <a href="<?php echo esc_url( home_url('/events?activity=' . $act['slug']) ); ?>" style="color:<?php echo $act['color']; ?>;font-weight:600;font-size:14px;text-decoration:none;">
              View related events →
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <?php endforeach; ?>

  <!-- Join CTA -->
  <div style="margin-top:48px;text-align:center;background:linear-gradient(135deg,#1a3a7a,#16a34a);border-radius:20px;padding:56px 24px;color:#fff;">
    <h2 style="color:#fff;font-size:clamp(1.4rem,3vw,2rem);margin-bottom:12px;">Be Part of the Impact</h2>
    <p style="opacity:.9;max-width:500px;margin:0 auto 28px;">Whether you want to volunteer, donate, or just spread the word — every action counts.</p>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url('/get-involved') ); ?>" class="btn" style="background:#fff;color:#1a3a7a;padding:14px 32px;font-weight:700;">Get Involved</a>
      <a href="<?php echo esc_url( home_url('/contact') ); ?>" class="btn" style="background:transparent;color:#fff;border:2px solid rgba(255,255,255,.6);padding:14px 32px;">Contact Us</a>
    </div>
  </div>

</div>

<style>
@media (max-width: 768px) {
  .activities-grid { grid-template-columns: 1fr !important; gap: 28px !important; }
  .activities-grid > div { order: unset !important; }
}
</style>

<?php get_footer(); ?>
