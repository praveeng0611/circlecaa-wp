<?php get_header(); ?>

<!-- ── HERO ────────────────────────────────────────────────────── -->
<section class="hero">
  <div class="hero-bg-circles">
    <span></span><span></span><span></span>
  </div>
  <div class="container">
    <div class="hero-content">
      <div class="hero-badge">Circle Club &amp; Association · Est. 2019</div>
      <h1>We Learn, We Live,<br><span>We Make a Difference</span></h1>
      <p>Empowering communities through education, environmental stewardship, arts, social awareness, quiz, debate, poetry, and much more.</p>
      <div class="hero-actions">
        <a href="https://forms.gle/tkfV8Ab3CF9Hhk5W9" target="_blank" class="btn btn-primary">
          🌿 Join Circle Now
        </a>
        <a href="<?php echo esc_url( home_url('/activities') ); ?>" class="btn btn-outline">
          Our Activities →
        </a>
      </div>
      <div class="hero-stats">
        <div>
          <div class="hero-stat-num">55+</div>
          <div class="hero-stat-label">Events Completed</div>
        </div>
        <div>
          <div class="hero-stat-num">219</div>
          <div class="hero-stat-label">Volunteers</div>
        </div>
        <div>
          <div class="hero-stat-num">70</div>
          <div class="hero-stat-label">Promoters</div>
        </div>
        <div>
          <div class="hero-stat-num">55</div>
          <div class="hero-stat-label">Founder Members</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── ABOUT SNIPPET ───────────────────────────────────────────── -->
<section class="section">
  <div class="container">
    <div class="about-grid">
      <div class="about-image-wrap">
        <?php
        $about_img = get_theme_mod('home_about_image');
        if ( $about_img ) : ?>
          <img src="<?php echo esc_url($about_img); ?>" alt="Circle CAA Community" style="width:100%;border-radius:20px;height:480px;object-fit:cover;">
        <?php else : ?>
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/events/event-05.jpg' ); ?>"
               alt="Circle CAA Community Gathering"
               style="width:100%;border-radius:20px;height:480px;object-fit:cover;">
        <?php endif; ?>
        <div class="about-badge">
          <div class="about-badge-icon">🏆</div>
          <div>
            <strong>Since 2019</strong>
            <span>Serving Rajsamand Community</span>
          </div>
        </div>
      </div>
      <div>
        <p class="section-label">Who We Are</p>
        <h2 class="section-title">A Platform Where Creative Minds Come Together</h2>
        <p class="section-desc">Circle Club &amp; Association is a community NGO based in Dhoinda, Rajsamand, Rajasthan. We believe every person has a unique talent — and our mission is to nurture these passions for positive societal impact.</p>
        <div class="about-values">
          <div class="value-item">
            <div class="value-icon">🌱</div>
            <div>
              <h4>Environmental Stewardship</h4>
              <p>Tree planting drives, green campaigns, and environmental awareness programs across Rajsamand.</p>
            </div>
          </div>
          <div class="value-item">
            <div class="value-icon">📚</div>
            <div>
              <h4>Education &amp; Arts</h4>
              <p>Quiz competitions, debates, poetry gatherings, Kavi Samelan, and book promotion events.</p>
            </div>
          </div>
          <div class="value-item">
            <div class="value-icon">🤝</div>
            <div>
              <h4>Social Welfare</h4>
              <p>Wellness programs, hunger alleviation drives, and mental health awareness campaigns.</p>
            </div>
          </div>
        </div>
        <a href="<?php echo esc_url( home_url('/about') ); ?>" class="btn btn-blue" style="margin-top:28px;">Learn More About Us →</a>
      </div>
    </div>
  </div>
</section>

<!-- ── STATS ─────────────────────────────────────────────────────── -->
<section class="section-sm bg-light">
  <div class="container">
    <div class="stats-grid">
      <?php
      $stats = array(
        array( '🎪', '55+', 'Events Completed' ),
        array( '👥', '219', 'Total Volunteers' ),
        array( '🌟', '70',  'Promoters' ),
        array( '🏅', '55',  'Founder Members' ),
        array( '🌳', '500+','Trees Planted' ),
        array( '🎓', '12+', 'Awareness Programs' ),
      );
      foreach ( $stats as $s ) : ?>
        <div class="stat-card">
          <div class="stat-icon"><?php echo $s[0]; ?></div>
          <div class="stat-num"><?php echo $s[1]; ?></div>
          <div class="stat-label"><?php echo $s[2]; ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── ACTIVITIES / PROGRAMS ──────────────────────────────────── -->
<section class="section">
  <div class="container">
    <div class="text-center" style="max-width:600px;margin:0 auto 0;">
      <p class="section-label">What We Do</p>
      <h2 class="section-title">Our Activities &amp; Programs</h2>
      <p class="section-desc">From planting trees to organizing literary events — Circle CAA is active across multiple domains of social good.</p>
    </div>
    <div class="programs-grid">
      <?php
      $programs = array(
        array( '🌳', 'Tree Planting Drives', 'We organize regular tree planting campaigns across Rajsamand, contributing to a greener environment and inspiring community participation in ecological conservation.', 'Environment' ),
        array( '🎤', 'Kavi Samelan & Poetry', 'Celebrating the rich tradition of Hindi poetry through Kavi Samelan events that bring together poets, lovers of literature, and the community at large.', 'Arts & Culture' ),
        array( '🧠', 'Quiz & Debate', 'Sharpening young minds through competitive quiz competitions and structured debate events that promote critical thinking and research.', 'Education' ),
        array( '📖', 'Book Promotions', 'Supporting local authors and promoting reading culture through book launch events, reading clubs, and literary discussions.', 'Literature' ),
        array( '💚', 'Wellness for All', 'Health and wellness camps, yoga sessions, and awareness programs promoting mental and physical health in the community.', 'Health' ),
        array( '🍱', 'Hunger Alleviation', 'Food distribution drives and hunger alleviation programs ensuring no one in our community goes to bed on an empty stomach.', 'Social Welfare' ),
        array( '🧠', 'Mental Health Awareness', 'Breaking stigmas through open conversations, workshops, and awareness campaigns focused on mental health and emotional well-being.', 'Health' ),
        array( '🌍', 'Social Awareness Campaigns', 'Street plays, poster campaigns, and community events spreading awareness on critical social issues like gender equality, child education, and civic rights.', 'Social' ),
      );
      foreach ( $programs as $p ) : ?>
        <div class="program-card">
          <div class="program-icon"><?php echo $p[0]; ?></div>
          <h3><?php echo $p[1]; ?></h3>
          <p><?php echo $p[2]; ?></p>
          <span class="program-tag"><?php echo $p[3]; ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── UPCOMING EVENTS ─────────────────────────────────────────── -->
<section class="section bg-light">
  <div class="container">
    <div class="text-center" style="margin-bottom:8px;">
      <p class="section-label">What's Happening</p>
      <h2 class="section-title">Upcoming Events</h2>
    </div>
    <div class="events-list">
      <?php
      $events = new WP_Query( array(
        'post_type'      => 'event',
        'posts_per_page' => 4,
        'orderby'        => 'meta_value',
        'meta_key'       => '_event_date',
        'order'          => 'DESC',
      ) );

      if ( $events->have_posts() ) :
        while ( $events->have_posts() ) : $events->the_post();
          $date     = get_post_meta( get_the_ID(), '_event_date', true ) ?: get_the_date('Y-m-d');
          $time     = get_post_meta( get_the_ID(), '_event_time', true ) ?: '';
          $location = get_post_meta( get_the_ID(), '_event_location', true ) ?: 'Dhoinda, Rajsamand';
          $type     = get_post_meta( get_the_ID(), '_event_type', true ) ?: 'Event';
          $d        = new DateTime( $date );
      ?>
        <div class="event-card">
          <div class="event-date">
            <div class="day"><?php echo $d->format('d'); ?></div>
            <div class="month"><?php echo $d->format('M'); ?></div>
          </div>
          <div>
            <h3><?php the_title(); ?></h3>
            <div class="event-meta">
              <?php if ($time) : ?><span>⏰ <?php echo esc_html($time); ?></span><?php endif; ?>
              <span>📍 <?php echo esc_html($location); ?></span>
            </div>
          </div>
          <span class="event-tag"><?php echo esc_html($type); ?></span>
        </div>
      <?php
        endwhile; wp_reset_postdata();
      else :
        // Sample events
        $sample = array(
          array( '2025-06-15', 'Vriksha Ropan Mahotsav (Tree Planting Festival)', '9:00 AM', 'Gaurav Path, Dhoinda', 'Environment' ),
          array( '2025-06-22', 'Inter-School Quiz Competition', '10:00 AM', 'Community Hall, Rajsamand', 'Education' ),
          array( '2025-07-05', 'Kavi Samelan – Monsoon Special', '5:00 PM', 'Open Air Stage, Dhoinda', 'Arts' ),
          array( '2025-07-14', 'Book Release & Literary Discussion', '4:00 PM', 'Circle Office, Gaurav Path', 'Literature' ),
        );
        foreach ( $sample as $s ) :
          $d = new DateTime( $s[0] );
      ?>
        <div class="event-card">
          <div class="event-date">
            <div class="day"><?php echo $d->format('d'); ?></div>
            <div class="month"><?php echo $d->format('M'); ?></div>
          </div>
          <div>
            <h3><?php echo $s[1]; ?></h3>
            <div class="event-meta">
              <span>⏰ <?php echo $s[2]; ?></span>
              <span>📍 <?php echo $s[3]; ?></span>
            </div>
          </div>
          <span class="event-tag"><?php echo $s[4]; ?></span>
        </div>
      <?php endforeach; endif; ?>
    </div>
    <div style="text-align:center;margin-top:32px;">
      <a href="<?php echo esc_url( home_url('/events') ); ?>" class="btn btn-blue">View All Events →</a>
    </div>
  </div>
</section>

<!-- ── CAUSES / CAMPAIGNS ──────────────────────────────────────── -->
<section class="section">
  <div class="container">
    <div class="text-center" style="margin-bottom:8px;">
      <p class="section-label">Our Causes</p>
      <h2 class="section-title">Active Campaigns</h2>
    </div>
    <div class="causes-grid">
      <?php
      $causes = array(
        array(
          'cat' => 'Environment',
          'title' => 'Green Rajsamand Campaign',
          'desc' => 'Our flagship tree plantation drive aims to plant 10,000 trees across Rajsamand district — making every neighborhood greener.',
          'emoji' => '🌳',
          'bg' => '#dcfce7',
          'pct' => 65,
          'raised' => '6,500 trees',
          'goal' => '10,000 trees',
        ),
        array(
          'cat' => 'Social Welfare',
          'title' => 'Hunger Alleviation Drive',
          'desc' => 'Distributing meals and grocery kits to underprivileged families in Dhoinda and surrounding villages every week.',
          'emoji' => '🍱',
          'bg' => '#fef9c3',
          'pct' => 45,
          'raised' => '450 families',
          'goal' => '1,000 families',
        ),
        array(
          'cat' => 'Health',
          'title' => 'Mental Health Awareness',
          'desc' => 'Monthly workshops, counselling support, and awareness programs to normalize mental health conversations in Rajsamand.',
          'emoji' => '💚',
          'bg' => '#eff6ff',
          'pct' => 80,
          'raised' => '400+ people',
          'goal' => '500 reached',
        ),
      );
      foreach ( $causes as $c ) : ?>
        <div class="cause-card">
          <div class="cause-card-img-placeholder" style="background:<?php echo $c['bg']; ?>;">
            <span style="font-size:64px;"><?php echo $c['emoji']; ?></span>
          </div>
          <div class="cause-card-body">
            <div class="cause-category"><?php echo $c['cat']; ?></div>
            <h3><?php echo $c['title']; ?></h3>
            <p><?php echo $c['desc']; ?></p>
            <div class="progress-bar">
              <div class="progress-fill" style="width:<?php echo $c['pct']; ?>%"></div>
            </div>
            <div class="progress-meta">
              <span>Achieved: <strong><?php echo $c['raised']; ?></strong></span>
              <span>Goal: <strong><?php echo $c['goal']; ?></strong></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── TEAM PREVIEW ────────────────────────────────────────────── -->
<section class="section bg-light">
  <div class="container">
    <div class="text-center" style="margin-bottom:8px;">
      <p class="section-label">The People Behind Circle</p>
      <h2 class="section-title">Meet Our Team</h2>
      <p class="section-desc" style="margin:0 auto;">A dedicated group of volunteers and leaders committed to making Rajsamand a better place.</p>
    </div>
    <div class="team-grid">
      <?php
      $team_query = new WP_Query( array( 'post_type' => 'team_member', 'posts_per_page' => 4 ) );
      if ( $team_query->have_posts() ) :
        while ( $team_query->have_posts() ) : $team_query->the_post();
          $nick = get_post_meta( get_the_ID(), '_team_nick', true );
          $role = get_post_meta( get_the_ID(), '_team_role', true ) ?: 'Volunteer';
          $fb   = get_post_meta( get_the_ID(), '_team_facebook', true );
          $ig   = get_post_meta( get_the_ID(), '_team_instagram', true );
          $tw   = get_post_meta( get_the_ID(), '_team_twitter', true );
          $li   = get_post_meta( get_the_ID(), '_team_linkedin', true );
      ?>
        <div class="team-card">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'team-thumb', array( 'class' => 'team-card-img' ) ); ?>
          <?php else : ?>
            <div class="team-card-img-placeholder">
              <span><?php echo mb_strtoupper( mb_substr( get_the_title(), 0, 1 ) ); ?></span>
            </div>
          <?php endif; ?>
          <div class="team-card-body">
            <h3><?php the_title(); ?></h3>
            <?php if ($nick) : ?><div class="team-nick">"<?php echo esc_html($nick); ?>"</div><?php endif; ?>
            <span class="team-role"><?php echo esc_html($role); ?></span>
            <div class="team-social">
              <?php if ($fb) : ?><a href="<?php echo esc_url($fb); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
              <?php if ($ig) : ?><a href="<?php echo esc_url($ig); ?>" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
              <?php if ($tw) : ?><a href="<?php echo esc_url($tw); ?>" target="_blank"><i class="fab fa-twitter"></i></a><?php endif; ?>
              <?php if ($li) : ?><a href="<?php echo esc_url($li); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata();
      else :
        $members = array(
          array( 'Mr. Saurabh Mishra', '"Krantik"', 'Founder Member', '#instagram.com/krantik123' ),
          array( 'Mr. Aashish Yadav', '"Aashu02"', 'Content Creator & Volunteer', '#instagram.com/aashu02_' ),
        );
        foreach ( $members as $m ) : ?>
          <div class="team-card">
            <div class="team-card-img-placeholder" style="font-size:48px;">
              <?php echo mb_strtoupper( mb_substr( $m[0], 3, 1 ) ); ?>
            </div>
            <div class="team-card-body">
              <h3><?php echo $m[0]; ?></h3>
              <div class="team-nick"><?php echo $m[1]; ?></div>
              <span class="team-role"><?php echo $m[2]; ?></span>
            </div>
          </div>
        <?php endforeach; endif; ?>
    </div>
    <div style="text-align:center;margin-top:32px;">
      <a href="<?php echo esc_url( home_url('/team') ); ?>" class="btn btn-blue">Meet the Full Team →</a>
    </div>
  </div>
</section>

<!-- ── TESTIMONIALS ────────────────────────────────────────────── -->
<section class="section">
  <div class="container">
    <div class="text-center" style="margin-bottom:8px;">
      <p class="section-label">What People Say</p>
      <h2 class="section-title">Voices from Our Community</h2>
    </div>
    <div class="testimonials-grid">
      <?php
      $testimonials = array(
        array( 'Rajesh Kumar', 'Founder Member, Rajsamand', 5, 'Circle CAA has transformed our locality. The tree planting drive made our neighbourhood so much greener. Proud to be a founder member.' ),
        array( 'Sunita Sharma', 'Volunteer', 5, 'The Kavi Samelan organized by Circle was an unforgettable experience. It brought our community together through the power of poetry and literature.' ),
        array( 'Vikram Singh', 'Youth Volunteer', 5, 'I participated in the quiz competition and it was brilliantly organized. Circle CAA is doing fantastic work in promoting education and critical thinking.' ),
      );
      foreach ( $testimonials as $t ) : ?>
        <div class="testimonial-card">
          <div class="testimonial-stars"><?php echo str_repeat('⭐', $t[2]); ?></div>
          <p><?php echo $t[3]; ?></p>
          <div class="testimonial-author">
            <div class="testimonial-avatar"><?php echo mb_strtoupper( mb_substr($t[0], 0, 1) ); ?></div>
            <div>
              <strong><?php echo $t[0]; ?></strong>
              <span><?php echo $t[1]; ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── GALLERY PREVIEW ─────────────────────────────────────────── -->
<section class="section">
  <div class="container">
    <div class="text-center" style="margin-bottom:40px;">
      <p class="section-label">In Pictures</p>
      <h2 class="section-title">Circle CAA in Action</h2>
      <p class="section-desc" style="margin:0 auto;">A glimpse of our events, drives and community gatherings across Rajsamand.</p>
    </div>

    <?php
    // Try to load gallery from gallery_album CPT first
    $gal_query = new WP_Query( array( 'post_type' => 'gallery_album', 'posts_per_page' => 6 ) );
    if ( $gal_query->have_posts() ) :
    ?>
    <div class="gallery-grid">
      <?php while ( $gal_query->have_posts() ) : $gal_query->the_post(); ?>
        <div class="gallery-item">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width:100%;height:260px;object-fit:cover;border-radius:12px;display:block;' ) ); ?>
          <?php else : ?>
            <div style="width:100%;height:260px;background:linear-gradient(135deg,#eff6ff,#dcfce7);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:48px;">📸</div>
          <?php endif; ?>
          <div class="gallery-overlay">
            <span><?php the_title(); ?></span>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>

    <?php else : // Fallback: theme event images ?>
    <div class="gallery-grid">
      <?php
      $gallery_items = array(
        array( 'event-01.jpg', 'Kavi Samelan & Poetry Evening' ),
        array( 'event-02.jpg', 'Open Mic Performance Night' ),
        array( 'event-03.jpg', 'Tree Plantation Drive' ),
        array( 'event-04.jpg', 'Quiz & Debate Competition' ),
        array( 'event-05.jpg', 'Community Gathering' ),
        array( 'event-06.jpg', 'Wellness Camp & Yoga' ),
      );
      foreach ( $gallery_items as $gi ) : ?>
        <div class="gallery-item">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/events/' . $gi[0] ); ?>"
               alt="<?php echo esc_attr( $gi[1] ); ?>"
               style="width:100%;height:260px;object-fit:cover;border-radius:12px;display:block;"
               loading="lazy">
          <div class="gallery-overlay">
            <span><?php echo esc_html( $gi[1] ); ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div style="text-align:center;margin-top:32px;">
      <a href="<?php echo esc_url( home_url('/gallery') ); ?>" class="btn btn-blue">View Full Gallery →</a>
    </div>
  </div>
</section>

<!-- ── BLOG PREVIEW ────────────────────────────────────────────── -->
<section class="section bg-light">
  <div class="container">
    <div class="text-center" style="margin-bottom:8px;">
      <p class="section-label">Latest Updates</p>
      <h2 class="section-title">News &amp; Stories</h2>
    </div>
    <div class="blog-grid">
      <?php
      $blog = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) );
      if ( $blog->have_posts() ) :
        while ( $blog->have_posts() ) : $blog->the_post(); ?>
          <div class="blog-card">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'blog-thumb', array( 'class' => 'blog-card-img' ) ); ?>
            <?php else : ?>
              <div class="blog-card-img-placeholder">📰</div>
            <?php endif; ?>
            <div class="blog-card-body">
              <div class="blog-cat"><?php echo get_the_category_list( ' · ' ); ?></div>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
              <div class="blog-meta">
                <span><?php echo get_the_date(); ?></span>
                <span><a href="<?php the_permalink(); ?>">Read more →</a></span>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata();
      else :
        $posts = array(
          array('🌳', 'Vriksha Ropan Drive: 500 Trees Planted This Month', 'Our latest tree planting drive was a huge success with 200 volunteers joining hands to plant 500 saplings across 3 villages in Rajsamand.', 'Environment', 'June 10, 2025'),
          array('🎤', 'Kavi Samelan 2025 — A Night to Remember', 'The annual Kavi Samelan brought together 15 poets from across Rajasthan, celebrating the beauty of Hindi literature.', 'Arts & Culture', 'May 28, 2025'),
          array('🧠', 'Quiz Competition Results — Young Minds Shine', 'Over 120 students from 8 schools participated in our Inter-School Quiz Competition. Here are the winners and highlights.', 'Education', 'May 15, 2025'),
        );
        foreach ( $posts as $p ) : ?>
          <div class="blog-card">
            <div class="blog-card-img-placeholder"><?php echo $p[0]; ?></div>
            <div class="blog-card-body">
              <div class="blog-cat"><?php echo $p[3]; ?></div>
              <h3><a href="#"><?php echo $p[1]; ?></a></h3>
              <p><?php echo $p[2]; ?></p>
              <div class="blog-meta">
                <span><?php echo $p[4]; ?></span>
                <span><a href="#">Read more →</a></span>
              </div>
            </div>
          </div>
        <?php endforeach; endif; ?>
    </div>
    <div style="text-align:center;margin-top:32px;">
      <a href="<?php echo esc_url( home_url('/blog') ); ?>" class="btn btn-blue">View All Posts →</a>
    </div>
  </div>
</section>

<!-- ── CTA ─────────────────────────────────────────────────────── -->
<section class="cta-section">
  <div class="container">
    <div class="cta-inner">
      <p class="section-label">Be Part of the Change</p>
      <h2>Join Your Circle Today</h2>
      <p>Whether you want to volunteer, become a founder member, donate, or simply attend our events — there\'s a place for everyone in Circle CAA.</p>
      <div class="cta-actions">
        <a href="https://forms.gle/tkfV8Ab3CF9Hhk5W9" target="_blank" class="btn btn-primary">🌿 Join Now (Free)</a>
        <a href="<?php echo esc_url( home_url('/get-involved') ); ?>" class="btn btn-outline">How to Get Involved</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
