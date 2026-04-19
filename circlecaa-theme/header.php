<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ── Header ───────────────────────────────────────────────── -->
<header id="site-header" role="banner">
  <div class="container">
    <div class="header-inner">

      <!-- Logo -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
        <?php if ( has_custom_logo() ) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>"
               alt="<?php bloginfo('name'); ?>"
               style="height:52px;width:auto;display:block;">
        <?php endif; ?>
      </a>

      <!-- Desktop Navigation -->
      <nav class="main-nav" id="site-nav" aria-label="Primary Navigation">
        <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu_class'     => '',
          'container'      => false,
          'depth'          => 1,
          'fallback_cb'    => 'circlecaa_fallback_menu',
        ) );
        ?>
      </nav>

      <!-- Header CTA -->
      <div class="header-cta">
        <a href="https://forms.gle/tkfV8Ab3CF9Hhk5W9" target="_blank" rel="noopener" class="btn btn-primary" style="padding:10px 20px;font-size:14px;">
          Join Now
        </a>
        <!-- Hamburger -->
        <button class="menu-toggle" id="menu-toggle" aria-label="Open Menu" aria-expanded="false">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
      </div>

    </div>
  </div>
</header>

<!-- ── Mobile Navigation ─────────────────────────────────────── -->
<div class="mobile-nav" id="mobile-nav" role="dialog" aria-label="Mobile Menu">
  <div class="mobile-nav-inner">
    <button class="mobile-nav-close" id="mobile-nav-close" aria-label="Close Menu">✕</button>
    <nav class="mobile-nav-links" aria-label="Mobile Navigation">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => false,
        'depth'          => 1,
        'fallback_cb'    => 'circlecaa_fallback_menu',
      ) );
      ?>
    </nav>
    <div class="mobile-cta">
      <a href="https://forms.gle/tkfV8Ab3CF9Hhk5W9" target="_blank" class="btn btn-primary" style="width:100%;justify-content:center;">Join Circle Now</a>
    </div>
  </div>
</div>

<?php
function circlecaa_fallback_menu() {
  $pages = array(
    home_url('/')          => 'Home',
    home_url('/about')     => 'About Us',
    home_url('/activities')=> 'Activities',
    home_url('/events')    => 'Events',
    home_url('/gallery')   => 'Gallery',
    home_url('/team')      => 'Our Team',
    home_url('/blog')      => 'Blog',
    home_url('/contact')   => 'Contact',
  );
  foreach ( $pages as $url => $label ) {
    echo '<a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a>';
  }
}
?>
