<?php get_header(); ?>

<section class="page-hero">
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<div class="container" style="max-width:860px;padding-top:60px;padding-bottom:80px;">
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="page-content" style="line-height:1.8;color:#374151;font-size:1.05rem;">
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
