<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section class="page-hero" style="padding:60px 0;">
  <div class="container" style="max-width:800px;">
    <div class="blog-meta" style="margin-bottom:16px;">
      <span style="color:#94a3b8;font-size:14px;">
        <i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?>
        &nbsp;·&nbsp;
        <i class="fas fa-user"></i> <?php the_author(); ?>
        <?php $cats = get_the_category(); if ( $cats ) : ?>
          &nbsp;·&nbsp; <i class="fas fa-folder"></i>
          <?php foreach ( $cats as $c ) : ?>
            <a href="<?php echo esc_url( get_category_link( $c->term_id ) ); ?>" style="color:#93c5fd;"><?php echo esc_html( $c->name ); ?></a>
          <?php endforeach; ?>
        <?php endif; ?>
      </span>
    </div>
    <h1 style="font-size:clamp(1.6rem,4vw,2.5rem);line-height:1.25;color:#fff;"><?php the_title(); ?></h1>
  </div>
</section>

<div class="container" style="max-width:800px;padding-top:48px;padding-bottom:80px;">

  <!-- Featured Image -->
  <?php if ( has_post_thumbnail() ) : ?>
    <div style="border-radius:16px;overflow:hidden;margin-bottom:40px;box-shadow:0 8px 32px rgba(0,0,0,.12);">
      <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:auto;display:block;' ) ); ?>
    </div>
  <?php endif; ?>

  <!-- Content -->
  <div class="post-content" style="line-height:1.85;font-size:1.05rem;color:#374151;">
    <?php the_content(); ?>
  </div>

  <!-- Tags -->
  <?php $tags = get_the_tags(); if ( $tags ) : ?>
    <div style="margin-top:40px;padding-top:24px;border-top:1px solid #e2e8f0;">
      <span style="font-weight:600;color:#1a3a7a;">Tags: </span>
      <?php foreach ( $tags as $tag ) : ?>
        <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
           style="display:inline-block;background:#eff6ff;color:#1a3a7a;border-radius:20px;padding:4px 12px;font-size:13px;margin:4px;text-decoration:none;">
          #<?php echo esc_html( $tag->name ); ?>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- Author Box -->
  <div style="margin-top:48px;padding:28px;background:#f8fafc;border-radius:16px;display:flex;gap:20px;align-items:flex-start;">
    <div style="flex-shrink:0;">
      <?php echo get_avatar( get_the_author_meta('ID'), 64, '', '', array('style' => 'border-radius:50%;') ); ?>
    </div>
    <div>
      <div style="font-weight:700;color:#1a3a7a;margin-bottom:4px;"><?php the_author(); ?></div>
      <div style="font-size:14px;color:#64748b;line-height:1.6;"><?php echo esc_html( get_the_author_meta('description') ?: 'Member of Circle CAA – empowering communities through education, arts, and social awareness.' ); ?></div>
    </div>
  </div>

  <!-- Post Navigation -->
  <div style="margin-top:48px;display:grid;grid-template-columns:1fr 1fr;gap:20px;">
    <?php
    $prev = get_previous_post();
    $next = get_next_post();
    if ( $prev ) : ?>
      <a href="<?php echo esc_url( get_permalink( $prev ) ); ?>"
         style="padding:20px;background:#fff;border:1px solid #e2e8f0;border-radius:12px;text-decoration:none;transition:box-shadow .2s;"
         onmouseover="this.style.boxShadow='0 4px 20px rgba(0,0,0,.08)'" onmouseout="this.style.boxShadow='none'">
        <div style="font-size:12px;color:#94a3b8;margin-bottom:6px;">← Previous</div>
        <div style="font-weight:600;color:#1a3a7a;font-size:15px;"><?php echo esc_html( $prev->post_title ); ?></div>
      </a>
    <?php else : echo '<div></div>'; endif; ?>

    <?php if ( $next ) : ?>
      <a href="<?php echo esc_url( get_permalink( $next ) ); ?>"
         style="padding:20px;background:#fff;border:1px solid #e2e8f0;border-radius:12px;text-decoration:none;text-align:right;transition:box-shadow .2s;"
         onmouseover="this.style.boxShadow='0 4px 20px rgba(0,0,0,.08)'" onmouseout="this.style.boxShadow='none'">
        <div style="font-size:12px;color:#94a3b8;margin-bottom:6px;">Next →</div>
        <div style="font-weight:600;color:#1a3a7a;font-size:15px;"><?php echo esc_html( $next->post_title ); ?></div>
      </a>
    <?php endif; ?>
  </div>

  <!-- Comments -->
  <?php if ( comments_open() || get_comments_number() ) : ?>
    <div style="margin-top:60px;">
      <?php comments_template(); ?>
    </div>
  <?php endif; ?>

</div>

<?php endwhile; ?>

<?php get_footer(); ?>
