<?php
/**
 * Template Name: Gallery
 */
get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Gallery</h1>
    <p>Moments from our events, drives and community gatherings across Rajsamand</p>
  </div>
</section>

<div class="container" style="padding-top:60px;padding-bottom:80px;">

  <!-- Category filter tabs -->
  <div style="display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-bottom:48px;">
    <?php
    $filters = array( 'All', 'Environment', 'Culture & Arts', 'Education', 'Wellness', 'Community', 'Awareness' );
    foreach ( $filters as $f ) : ?>
      <button
        class="gallery-filter-btn<?php echo $f === 'All' ? ' active' : ''; ?>"
        data-filter="<?php echo esc_attr( strtolower( str_replace( ' ', '-', $f ) ) ); ?>"
        style="background:<?php echo $f === 'All' ? '#1a3a7a' : '#fff'; ?>;color:<?php echo $f === 'All' ? '#fff' : '#1a3a7a'; ?>;border:2px solid #1a3a7a;border-radius:24px;padding:8px 20px;font-size:14px;font-weight:600;cursor:pointer;transition:all .2s;">
        <?php echo esc_html( $f ); ?>
      </button>
    <?php endforeach; ?>
  </div>

  <?php
  // Try to get gallery albums from CPT
  $gal_query = new WP_Query( array(
    'post_type'      => 'gallery_album',
    'posts_per_page' => 50,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ) );

  if ( $gal_query->have_posts() ) : ?>

    <div class="gallery-grid" id="gallery-grid">
      <?php while ( $gal_query->have_posts() ) : $gal_query->the_post(); ?>
        <div class="gallery-item">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
          <?php else : ?>
            <div style="width:100%;height:100%;background:linear-gradient(135deg,#eff6ff,#dcfce7);display:flex;align-items:center;justify-content:center;font-size:48px;">📸</div>
          <?php endif; ?>
          <div class="gallery-overlay">
            <span><?php the_title(); ?></span>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>

  <?php else : ?>

    <!-- Fallback: built-in event images in a masonry-style grid -->
    <div id="gallery-grid" style="columns:3 300px;column-gap:16px;">
      <?php
      $gallery_items = array(
        array( 'event-01.jpg', 'Kavi Samelan & Poetry Evening', 'culture-arts', 'An evening of Hindi poetry, music and artistic expression celebrating Rajsamand\'s rich literary heritage.' ),
        array( 'event-02.jpg', 'Open Mic Performance Night', 'culture-arts', 'Young voices take the stage — spoken word, music and public speaking at Circle CAA\'s open-mic series.' ),
        array( 'event-03.jpg', 'Tree Plantation Drive — Green Rajsamand', 'environment', 'Volunteers planting saplings as part of our flagship Green Rajsamand initiative, working towards a greener future.' ),
        array( 'event-04.jpg', 'Quiz & Debate Championship', 'education', 'Inter-school quiz and debate competition sharpening young minds and celebrating academic excellence.' ),
        array( 'event-05.jpg', 'Community Gathering & Fellowship', 'community', 'Circle CAA members and volunteers coming together to celebrate milestones and strengthen community bonds.' ),
        array( 'event-06.jpg', 'Wellness Camp & Yoga Drive', 'wellness', 'Free yoga sessions, health screenings and wellness workshops open to all community members.' ),
        array( 'event-07.jpg', 'Social Awareness Campaign', 'awareness', 'Community-wide campaigns on issues including gender equality, mental health, voter awareness and road safety.' ),
      );
      foreach ( $gallery_items as $idx => $gi ) :
        $heights = array( '280px', '340px', '300px', '320px', '260px', '350px', '290px' );
        $h = $heights[ $idx % count($heights) ];
      ?>
        <div class="gallery-masonry-item" data-cat="<?php echo esc_attr( $gi[2] ); ?>"
             style="break-inside:avoid;margin-bottom:16px;border-radius:16px;overflow:hidden;position:relative;cursor:pointer;"
             onclick="document.getElementById('lightbox-<?php echo $idx; ?>').style.display='flex'">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/events/' . $gi[0] ); ?>"
               alt="<?php echo esc_attr( $gi[1] ); ?>"
               style="width:100%;height:<?php echo $h; ?>;object-fit:cover;display:block;transition:transform .4s ease;"
               loading="lazy"
               onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='none'">
          <div style="position:absolute;bottom:0;left:0;right:0;background:linear-gradient(to top,rgba(13,33,73,0.85) 0%,transparent 70%);padding:20px 16px 14px;opacity:0;transition:opacity .3s;"
               onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
            <p style="color:#fff;font-size:14px;font-weight:700;margin:0;"><?php echo esc_html( $gi[1] ); ?></p>
          </div>
        </div>

        <!-- Lightbox -->
        <div id="lightbox-<?php echo $idx; ?>"
             style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,0.92);align-items:center;justify-content:center;padding:24px;"
             onclick="this.style.display='none'">
          <div style="max-width:900px;width:100%;" onclick="event.stopPropagation()">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/events/' . $gi[0] ); ?>"
                 alt="<?php echo esc_attr( $gi[1] ); ?>"
                 style="width:100%;border-radius:12px;max-height:80vh;object-fit:contain;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:16px;">
              <div>
                <h3 style="color:#fff;margin:0 0 4px;"><?php echo esc_html( $gi[1] ); ?></h3>
                <p style="color:#94a3b8;margin:0;font-size:14px;"><?php echo esc_html( $gi[3] ); ?></p>
              </div>
              <button onclick="document.getElementById('lightbox-<?php echo $idx; ?>').style.display='none'"
                      style="background:rgba(255,255,255,.15);border:none;color:#fff;font-size:24px;width:48px;height:48px;border-radius:50%;cursor:pointer;flex-shrink:0;">✕</button>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>

  <?php endif; ?>

  <!-- Upload prompt for admins -->
  <?php if ( current_user_can('edit_posts') ) : ?>
    <div style="margin-top:48px;padding:32px;background:#fffbeb;border:2px dashed #fbbf24;border-radius:16px;text-align:center;">
      <p style="color:#92400e;margin:0 0 12px;font-weight:600;">📷 Admin Tip</p>
      <p style="color:#78350f;margin:0 0 16px;">Add real Circle CAA photos by creating <strong>Gallery Album</strong> posts in the WordPress admin (Posts → Gallery Albums). Each album can have a featured image and title.</p>
      <a href="<?php echo admin_url('post-new.php?post_type=gallery_album'); ?>" class="btn btn-primary" style="font-size:14px;padding:10px 24px;">Add Gallery Photos</a>
    </div>
  <?php endif; ?>

</div>

<style>
.gallery-filter-btn:hover {
  background: #1a3a7a !important;
  color: #fff !important;
}
@media (max-width: 768px) {
  #gallery-grid { columns: 1 !important; }
}
</style>

<?php get_footer(); ?>
