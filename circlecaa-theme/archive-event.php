<?php get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Events & Programs</h1>
    <p>Join us at our upcoming events, workshops, campaigns and cultural programmes</p>
  </div>
</section>

<div class="container" style="padding-top:60px;padding-bottom:80px;">

  <!-- Filter tabs (upcoming / past) -->
  <div style="display:flex;gap:12px;margin-bottom:40px;flex-wrap:wrap;">
    <?php
    $filter = isset( $_GET['filter'] ) ? sanitize_text_field( $_GET['filter'] ) : 'all';
    $tabs = array( 'all' => 'All Events', 'past' => 'Past Events', 'upcoming' => 'Upcoming' );
    foreach ( $tabs as $key => $label ) :
      $active = $filter === $key;
      ?>
      <a href="?filter=<?php echo esc_attr($key); ?>"
         style="padding:10px 24px;border-radius:30px;font-size:14px;font-weight:600;text-decoration:none;
                <?php echo $active ? 'background:#1a3a7a;color:#fff;' : 'background:#f1f5f9;color:#475569;border:2px solid #e2e8f0;'; ?>">
        <?php echo esc_html( $label ); ?>
      </a>
    <?php endforeach; ?>
  </div>

  <?php
  $today = date('Y-m-d');
  $meta_compare = ( $filter === 'past' ) ? '<' : ( $filter === 'all' ? 'EXISTS' : '>=' );

  $args = array(
    'post_type'      => 'event',
    'posts_per_page' => 50,
    'orderby'        => 'meta_value',
    'meta_key'       => '_event_date',
    'order'          => $filter === 'past' ? 'DESC' : 'ASC',
  );
  if ( $filter !== 'all' ) {
    $args['meta_query'] = array(
      array(
        'key'     => '_event_date',
        'value'   => $today,
        'compare' => $meta_compare,
        'type'    => 'DATE',
      ),
    );
  }

  $events_query = new WP_Query( $args );
  ?>

  <?php if ( $events_query->have_posts() ) : ?>
    <div class="events-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:28px;">
      <?php while ( $events_query->have_posts() ) : $events_query->the_post();
        $date     = get_post_meta( get_the_ID(), '_event_date', true );
        $time     = get_post_meta( get_the_ID(), '_event_location', true );
        $location = get_post_meta( get_the_ID(), '_event_location', true );
        $reg_url  = get_post_meta( get_the_ID(), '_event_register_url', true );
        $is_past  = $date && $date < $today;
      ?>
        <div class="event-card" style="<?php echo $is_past ? 'opacity:.75;' : ''; ?>">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'blog-thumb', array( 'style' => 'width:100%;height:180px;object-fit:cover;border-radius:12px 12px 0 0;display:block;' ) ); ?>
          <?php endif; ?>

          <div style="padding:20px;">
            <?php if ( $date ) :
              $ts = strtotime( $date );
              ?>
              <div style="display:flex;gap:12px;align-items:center;margin-bottom:16px;">
                <div style="width:52px;height:52px;background:<?php echo $is_past ? '#94a3b8' : '#1a3a7a'; ?>;border-radius:10px;display:flex;flex-direction:column;align-items:center;justify-content:center;color:#fff;flex-shrink:0;">
                  <span style="font-size:18px;font-weight:900;line-height:1;"><?php echo date('d', $ts); ?></span>
                  <span style="font-size:10px;text-transform:uppercase;opacity:.85;"><?php echo date('M', $ts); ?></span>
                </div>
                <div>
                  <div style="font-weight:700;font-size:16px;color:#1e293b;line-height:1.3;"><?php the_title(); ?></div>
                  <?php if ( $location ) : ?>
                    <div style="font-size:13px;color:#64748b;margin-top:2px;"><i class="fas fa-map-marker-alt" style="color:#16a34a;margin-right:4px;"></i><?php echo esc_html( $location ); ?></div>
                  <?php endif; ?>
                </div>
              </div>
            <?php else : ?>
              <h3 style="font-size:17px;color:#1e293b;margin-bottom:12px;"><?php the_title(); ?></h3>
            <?php endif; ?>

            <p style="font-size:14px;color:#64748b;line-height:1.6;margin-bottom:16px;"><?php echo wp_trim_words( get_the_excerpt(), 20, '…' ); ?></p>

            <div style="display:flex;gap:10px;align-items:center;">
              <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="font-size:13px;padding:8px 16px;">Details</a>
              <?php if ( $reg_url && ! $is_past ) : ?>
                <a href="<?php echo esc_url( $reg_url ); ?>" target="_blank" class="btn btn-primary" style="font-size:13px;padding:8px 16px;">Register</a>
              <?php elseif ( $is_past ) : ?>
                <span style="font-size:12px;color:#94a3b8;background:#f1f5f9;padding:6px 12px;border-radius:20px;">Completed</span>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>

  <?php else : ?>
    <!-- Sample events if none exist -->
    <div class="events-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:28px;">
      <?php
      $sample_events = array(
        array( 'title' => 'Green Rajsamand – Tree Plantation Drive', 'date' => date('Y') . '-06-05', 'location' => 'City Park, Rajsamand', 'desc' => 'Join us on World Environment Day to plant 500+ trees across Rajsamand district.', 'icon' => '🌳' ),
        array( 'title' => 'Kavi Samelan & Poetry Night', 'date' => date('Y') . '-07-12', 'location' => 'Town Hall, Rajsamand', 'desc' => 'An evening celebrating the rich tradition of Hindi poetry with renowned local poets.', 'icon' => '📜' ),
        array( 'title' => 'Inter-School Quiz Competition', 'date' => date('Y') . '-08-15', 'location' => 'Govt. Senior Secondary School', 'desc' => 'Annual quiz competition on Independence Day for students of Class 8–12.', 'icon' => '🎯' ),
        array( 'title' => 'Mental Health Awareness Workshop', 'date' => date('Y') . '-09-22', 'location' => 'Community Centre, Rajsamand', 'desc' => 'An interactive workshop on mental wellness, stress management and emotional resilience.', 'icon' => '🧠' ),
      );
      foreach ( $sample_events as $ev ) :
        $ts = strtotime( $ev['date'] );
      ?>
        <div class="event-card">
          <div style="padding:24px;">
            <div style="display:flex;gap:16px;align-items:flex-start;margin-bottom:16px;">
              <div style="width:52px;height:52px;background:#1a3a7a;border-radius:10px;display:flex;flex-direction:column;align-items:center;justify-content:center;color:#fff;flex-shrink:0;">
                <span style="font-size:18px;font-weight:900;line-height:1;"><?php echo date('d', $ts); ?></span>
                <span style="font-size:10px;text-transform:uppercase;opacity:.85;"><?php echo date('M', $ts); ?></span>
              </div>
              <div>
                <div style="font-size:22px;margin-bottom:4px;"><?php echo $ev['icon']; ?></div>
                <div style="font-weight:700;font-size:16px;color:#1e293b;"><?php echo esc_html( $ev['title'] ); ?></div>
                <div style="font-size:13px;color:#64748b;"><i class="fas fa-map-marker-alt" style="color:#16a34a;margin-right:4px;"></i><?php echo esc_html( $ev['location'] ); ?></div>
              </div>
            </div>
            <p style="font-size:14px;color:#64748b;line-height:1.6;margin-bottom:16px;"><?php echo esc_html( $ev['desc'] ); ?></p>
            <a href="https://forms.gle/tkfV8Ab3CF9Hhk5W9" target="_blank" class="btn btn-primary" style="font-size:13px;padding:8px 18px;">Register Interest</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- CTA -->
  <div style="margin-top:64px;text-align:center;background:linear-gradient(135deg,#1a3a7a,#16a34a);border-radius:20px;padding:48px 24px;color:#fff;">
    <h2 style="color:#fff;margin-bottom:12px;">Want to Host an Event with Us?</h2>
    <p style="opacity:.9;max-width:500px;margin:0 auto 24px;">Partner with Circle CAA to organize impactful programmes in your school, college or community.</p>
    <a href="<?php echo esc_url( home_url('/contact') ); ?>" class="btn" style="background:#fff;color:#1a3a7a;padding:14px 32px;">Get in Touch</a>
  </div>

</div>

<?php get_footer(); ?>
