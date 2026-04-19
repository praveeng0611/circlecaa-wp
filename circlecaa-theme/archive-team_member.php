<?php get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1>Our Team</h1>
    <p>Meet the passionate individuals driving Circle CAA's mission forward</p>
  </div>
</section>

<div class="container" style="padding-top:60px;padding-bottom:80px;">

  <?php
  $team_query = new WP_Query( array(
    'post_type'      => 'team_member',
    'posts_per_page' => 50,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
  ) );
  ?>

  <?php if ( $team_query->have_posts() ) : ?>
    <div class="team-grid">
      <?php while ( $team_query->have_posts() ) : $team_query->the_post();
        $role   = get_post_meta( get_the_ID(), '_team_role', true );
        $fb     = get_post_meta( get_the_ID(), '_team_facebook', true );
        $ig     = get_post_meta( get_the_ID(), '_team_instagram', true );
        $tw     = get_post_meta( get_the_ID(), '_team_twitter', true );
        $li     = get_post_meta( get_the_ID(), '_team_linkedin', true );
      ?>
        <div class="team-card">
          <div class="team-photo">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'team-thumb' ); ?>
            <?php else : ?>
              <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#1a3a7a22,#16a34a22);font-size:64px;">👤</div>
            <?php endif; ?>
          </div>
          <div class="team-info">
            <h3><?php the_title(); ?></h3>
            <p class="team-role"><?php echo esc_html( $role ?: 'Circle CAA Member' ); ?></p>
            <?php if ( get_the_content() ) : ?>
              <p style="font-size:14px;color:#64748b;line-height:1.6;"><?php echo wp_trim_words( get_the_content(), 20, '…' ); ?></p>
            <?php endif; ?>
            <div class="team-social">
              <?php if ( $fb ) : ?><a href="<?php echo esc_url($fb); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
              <?php if ( $ig ) : ?><a href="<?php echo esc_url($ig); ?>" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
              <?php if ( $tw ) : ?><a href="<?php echo esc_url($tw); ?>" target="_blank"><i class="fab fa-twitter"></i></a><?php endif; ?>
              <?php if ( $li ) : ?><a href="<?php echo esc_url($li); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>

  <?php else : ?>
    <!-- Fallback team -->
    <div class="team-grid">
      <?php
      $sample_team = array(
        array( 'name' => 'Saurabh Mishra', 'role' => 'Founder & Chairman', 'bio' => 'Visionary leader with a passion for community development, literature and social justice. Founded Circle CAA to create a platform where creative minds can grow.', 'initials' => 'SM', 'color' => '#1a3a7a' ),
        array( 'name' => 'Aashish Yadav', 'role' => 'Co-Founder & Director', 'bio' => 'Environmental activist and educator committed to bringing awareness about sustainability and green living to the youth of Rajsamand.', 'initials' => 'AY', 'color' => '#16a34a' ),
        array( 'name' => 'Priya Sharma', 'role' => 'Programme Coordinator', 'bio' => 'Coordinates our events, workshops and awareness campaigns. Brings enthusiasm and organisation to every Circle CAA initiative.', 'initials' => 'PS', 'color' => '#7c3aed' ),
        array( 'name' => 'Rajesh Kumar', 'role' => 'Cultural Secretary', 'bio' => 'Manages our Kavi Samelan, debate competitions and cultural events. A poet and debater himself, he brings authenticity to our programmes.', 'initials' => 'RK', 'color' => '#ea580c' ),
        array( 'name' => 'Anita Meena', 'role' => 'Volunteer Head', 'bio' => 'Leads and nurtures our volunteer community, ensuring every member finds their role and contributes meaningfully to our cause.', 'initials' => 'AM', 'color' => '#0891b2' ),
        array( 'name' => 'Vikram Singh', 'role' => 'Social Media & Outreach', 'bio' => 'Amplifies Circle CAA's message across digital platforms and builds partnerships with schools, colleges and local organisations.', 'initials' => 'VS', 'color' => '#be185d' ),
      );
      foreach ( $sample_team as $member ) :
      ?>
        <div class="team-card">
          <div class="team-photo">
            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,<?php echo $member['color']; ?>33,<?php echo $member['color']; ?>66);">
              <span style="font-size:48px;font-weight:900;color:<?php echo $member['color']; ?>;"><?php echo $member['initials']; ?></span>
            </div>
          </div>
          <div class="team-info">
            <h3><?php echo esc_html( $member['name'] ); ?></h3>
            <p class="team-role"><?php echo esc_html( $member['role'] ); ?></p>
            <p style="font-size:14px;color:#64748b;line-height:1.6;"><?php echo esc_html( $member['bio'] ); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- Join CTA -->
  <div style="margin-top:72px;text-align:center;">
    <div style="background:#f8fafc;border:2px dashed #cbd5e1;border-radius:20px;padding:48px 24px;max-width:600px;margin:0 auto;">
      <div style="font-size:48px;margin-bottom:16px;">🙋</div>
      <h3 style="color:#1a3a7a;margin-bottom:8px;">Want to be part of our team?</h3>
      <p style="color:#64748b;margin-bottom:24px;">We're always looking for passionate individuals to join Circle CAA and make a difference in their community.</p>
      <a href="<?php echo esc_url( home_url('/get-involved') ); ?>" class="btn btn-primary" style="padding:14px 32px;">Get Involved</a>
    </div>
  </div>

</div>

<?php get_footer(); ?>
