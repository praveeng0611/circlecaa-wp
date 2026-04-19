<?php get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1><?php
      if ( is_home() && ! is_front_page() ) {
        single_post_title();
      } elseif ( is_search() ) {
        echo 'Search Results for: ' . get_search_query();
      } elseif ( is_archive() ) {
        the_archive_title();
      } else {
        echo 'Blog';
      }
    ?></h1>
    <p><?php
      if ( is_archive() ) { the_archive_description(); }
      elseif ( is_search() ) { echo get_found_posts() . ' results found'; }
      else { echo 'Insights, stories and updates from Circle CAA'; }
    ?></p>
  </div>
</section>

<div class="container" style="padding-top:60px;padding-bottom:80px;">
  <div class="blog-layout">

    <!-- Posts -->
    <main class="blog-main">
      <?php if ( have_posts() ) : ?>
        <div class="blog-grid">
          <?php while ( have_posts() ) : the_post(); ?>
            <article class="blog-card" id="post-<?php the_ID(); ?>">
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="blog-card-img">
                  <?php the_post_thumbnail( 'blog-thumb', array( 'alt' => get_the_title() ) ); ?>
                </a>
              <?php else : ?>
                <a href="<?php the_permalink(); ?>" class="blog-card-img blog-card-img--placeholder"
                   style="background:linear-gradient(135deg,#1a3a7a22,#16a34a22);display:flex;align-items:center;justify-content:center;height:200px;">
                  <i class="fas fa-newspaper" style="font-size:40px;color:#1a3a7a44;"></i>
                </a>
              <?php endif; ?>
              <div class="blog-card-body">
                <div class="blog-meta">
                  <span><i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
                  <span><i class="fas fa-folder"></i> <?php the_category(', '); ?></span>
                </div>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo wp_trim_words( get_the_excerpt(), 22, '…' ); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="font-size:13px;padding:8px 18px;">Read More</a>
              </div>
            </article>
          <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div style="margin-top:48px;text-align:center;">
          <?php
          the_posts_pagination( array(
            'mid_size'  => 2,
            'prev_text' => '← Prev',
            'next_text' => 'Next →',
          ) );
          ?>
        </div>

      <?php else : ?>
        <div style="text-align:center;padding:80px 20px;">
          <i class="fas fa-search" style="font-size:48px;color:#cbd5e1;margin-bottom:16px;display:block;"></i>
          <h3 style="color:#64748b;">No posts found</h3>
          <p style="color:#94a3b8;">Try a different search or browse our activities.</p>
          <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-primary" style="margin-top:16px;">Go Home</a>
        </div>
      <?php endif; ?>
    </main>

    <!-- Sidebar -->
    <aside class="blog-sidebar">
      <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
      <?php else : ?>
        <!-- Default sidebar content -->
        <div class="widget">
          <h3 class="widget-title">About Circle CAA</h3>
          <p style="color:#64748b;font-size:14px;line-height:1.7;">
            A platform where creative minds come together. We empower through education, environment, arts and social awareness.
          </p>
          <a href="<?php echo esc_url( home_url('/about') ); ?>" class="btn btn-outline" style="font-size:13px;padding:8px 16px;margin-top:12px;">Learn More</a>
        </div>
        <div class="widget" style="margin-top:24px;">
          <h3 class="widget-title">Quick Links</h3>
          <ul style="list-style:none;padding:0;margin:0;">
            <?php
            $links = array(
              '/activities' => 'Our Activities',
              '/events'     => 'Upcoming Events',
              '/team'       => 'Meet the Team',
              '/gallery'    => 'Gallery',
              '/contact'    => 'Contact Us',
            );
            foreach ( $links as $path => $label ) {
              echo '<li style="border-bottom:1px solid #f1f5f9;padding:8px 0;"><a href="' . esc_url( home_url( $path ) ) . '" style="color:#1a3a7a;text-decoration:none;font-size:14px;">→ ' . esc_html( $label ) . '</a></li>';
            }
            ?>
          </ul>
        </div>
        <div class="widget" style="margin-top:24px;background:linear-gradient(135deg,#1a3a7a,#16a34a);border-radius:12px;padding:24px;color:#fff;text-align:center;">
          <h3 style="color:#fff;margin-bottom:8px;">Join Circle CAA</h3>
          <p style="font-size:14px;opacity:.9;margin-bottom:16px;">Be part of something meaningful. Make a difference today.</p>
          <a href="https://forms.gle/tkfV8Ab3CF9Hhk5W9" target="_blank" class="btn" style="background:#fff;color:#1a3a7a;font-size:13px;padding:10px 20px;">Join Now</a>
        </div>
      <?php endif; ?>
    </aside>

  </div>
</div>

<?php get_footer(); ?>
