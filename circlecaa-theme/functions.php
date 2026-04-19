<?php
/**
 * Circle CAA Theme Functions
 */

// ─── Theme Setup ──────────────────────────────────────────────────
function circlecaa_setup() {
    load_theme_textdomain( 'circlecaa', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'circlecaa' ),
        'footer'  => esc_html__( 'Footer Menu', 'circlecaa' ),
    ) );

    add_image_size( 'team-thumb', 400, 400, true );
    add_image_size( 'blog-thumb', 800, 500, true );
    add_image_size( 'gallery-thumb', 600, 450, true );
    add_image_size( 'event-thumb', 400, 300, true );
}
add_action( 'after_setup_theme', 'circlecaa_setup' );

// ─── Enqueue Scripts & Styles ──────────────────────────────────────
function circlecaa_scripts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap', array(), null );
    wp_enqueue_style( 'circlecaa-style', get_stylesheet_uri(), array(), '1.0.0' );
    wp_enqueue_script( 'circlecaa-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
    wp_localize_script( 'circlecaa-main', 'circlecaa', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'circlecaa_nonce' ),
    ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'circlecaa_scripts' );

// ─── Widgets / Sidebars ────────────────────────────────────────────
function circlecaa_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'circlecaa' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Widgets in this area will be shown on all blog pages.', 'circlecaa' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area', 'circlecaa' ),
        'id'            => 'footer-widgets',
        'description'   => esc_html__( 'Footer widget area.', 'circlecaa' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'circlecaa_widgets_init' );

// ─── Custom Post Types ─────────────────────────────────────────────

// Events CPT
function circlecaa_register_cpts() {
    // Events
    register_post_type( 'event', array(
        'labels'      => array(
            'name'               => __( 'Events', 'circlecaa' ),
            'singular_name'      => __( 'Event', 'circlecaa' ),
            'add_new_item'       => __( 'Add New Event', 'circlecaa' ),
            'edit_item'          => __( 'Edit Event', 'circlecaa' ),
        ),
        'public'      => true,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'menu_icon'   => 'dashicons-calendar-alt',
        'has_archive' => true,
        'rewrite'     => array( 'slug' => 'events' ),
        'show_in_rest' => true,
    ) );

    // Team Members
    register_post_type( 'team_member', array(
        'labels'      => array(
            'name'               => __( 'Team Members', 'circlecaa' ),
            'singular_name'      => __( 'Team Member', 'circlecaa' ),
            'add_new_item'       => __( 'Add New Team Member', 'circlecaa' ),
            'edit_item'          => __( 'Edit Team Member', 'circlecaa' ),
        ),
        'public'      => true,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'menu_icon'   => 'dashicons-groups',
        'has_archive' => false,
        'rewrite'     => array( 'slug' => 'team' ),
        'show_in_rest' => true,
    ) );

    // Gallery Albums
    register_post_type( 'gallery_album', array(
        'labels'      => array(
            'name'               => __( 'Gallery Albums', 'circlecaa' ),
            'singular_name'      => __( 'Gallery Album', 'circlecaa' ),
            'add_new_item'       => __( 'Add New Album', 'circlecaa' ),
        ),
        'public'      => true,
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'   => 'dashicons-images-alt2',
        'has_archive' => true,
        'rewrite'     => array( 'slug' => 'gallery' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'circlecaa_register_cpts' );

// ─── Custom Taxonomies ─────────────────────────────────────────────
function circlecaa_register_taxonomies() {
    // Activity Types
    register_taxonomy( 'activity_type', array( 'post', 'event' ), array(
        'labels'       => array(
            'name'          => __( 'Activity Types', 'circlecaa' ),
            'singular_name' => __( 'Activity Type', 'circlecaa' ),
        ),
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => array( 'slug' => 'activity' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'circlecaa_register_taxonomies' );

// ─── Theme Options (Customizer) ────────────────────────────────────
function circlecaa_customize_register( $wp_customize ) {
    // Circle CAA Settings Panel
    $wp_customize->add_panel( 'circlecaa_panel', array(
        'title'    => __( 'Circle CAA Settings', 'circlecaa' ),
        'priority' => 30,
    ) );

    // Contact Info Section
    $wp_customize->add_section( 'circlecaa_contact', array(
        'title' => __( 'Contact Information', 'circlecaa' ),
        'panel' => 'circlecaa_panel',
    ) );

    $fields = array(
        'phone'   => array( 'Phone Number', '+91-9358851143' ),
        'email'   => array( 'Email Address', 'enquirycirclecaa@gmail.com' ),
        'address' => array( 'Address', 'Admin Office, Gaurav Path, Dhoinda, Rajsamand, Rajasthan 313342' ),
        'hours'   => array( 'Office Hours', 'Mon–Sat: 10:00 AM – 6:00 PM' ),
    );
    foreach ( $fields as $key => $info ) {
        $wp_customize->add_setting( 'circlecaa_' . $key, array( 'default' => $info[1], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( 'circlecaa_' . $key, array(
            'label'   => $info[0],
            'section' => 'circlecaa_contact',
            'type'    => 'text',
        ) );
    }

    // Social Links Section
    $wp_customize->add_section( 'circlecaa_social', array(
        'title' => __( 'Social Media Links', 'circlecaa' ),
        'panel' => 'circlecaa_panel',
    ) );

    $social = array(
        'facebook'  => array( 'Facebook URL', 'https://facebook.com/circlecaa' ),
        'instagram' => array( 'Instagram URL', 'https://instagram.com/circlecaa' ),
        'twitter'   => array( 'Twitter / X URL', 'https://twitter.com/circlecaa' ),
        'youtube'   => array( 'YouTube URL', 'https://youtube.com/@circlecaa' ),
        'whatsapp'  => array( 'WhatsApp Number', '919358851143' ),
    );
    foreach ( $social as $key => $info ) {
        $wp_customize->add_setting( 'circlecaa_' . $key, array( 'default' => $info[1], 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( 'circlecaa_' . $key, array(
            'label'   => $info[0],
            'section' => 'circlecaa_social',
            'type'    => 'url',
        ) );
    }

    // Hero Section
    $wp_customize->add_section( 'circlecaa_hero', array(
        'title' => __( 'Hero Section', 'circlecaa' ),
        'panel' => 'circlecaa_panel',
    ) );

    $hero_fields = array(
        'hero_heading'    => array( 'Hero Heading', "We Learn, We Live,\nWe Make a Difference", 'textarea' ),
        'hero_subheading' => array( 'Hero Subheading', 'Circle Club & Association — empowering communities through education, environmental stewardship, arts, and social awareness since 2019.', 'textarea' ),
        'hero_btn1_text'  => array( 'Button 1 Text', 'Join Circle Now', 'text' ),
        'hero_btn1_url'   => array( 'Button 1 URL', 'https://forms.gle/tkfV8Ab3CF9Hhk5W9', 'url' ),
        'hero_btn2_text'  => array( 'Button 2 Text', 'Our Activities', 'text' ),
        'hero_btn2_url'   => array( 'Button 2 URL', '/activities/', 'url' ),
    );
    foreach ( $hero_fields as $key => $info ) {
        $wp_customize->add_setting( $key, array( 'default' => $info[1], 'sanitize_callback' => 'sanitize_textarea_field' ) );
        $wp_customize->add_control( $key, array(
            'label'   => $info[0],
            'section' => 'circlecaa_hero',
            'type'    => $info[2],
        ) );
    }
}
add_action( 'customize_register', 'circlecaa_customize_register' );

// ─── Helper Functions ──────────────────────────────────────────────
function circlecaa_get_option( $key, $default = '' ) {
    return get_theme_mod( 'circlecaa_' . $key, $default );
}

function circlecaa_get_phone() {
    return circlecaa_get_option( 'phone', '+91-9358851143' );
}

function circlecaa_get_email() {
    return circlecaa_get_option( 'email', 'enquirycirclecaa@gmail.com' );
}

function circlecaa_get_address() {
    return circlecaa_get_option( 'address', 'Admin Office, Gaurav Path, Dhoinda, Rajsamand, Rajasthan 313342' );
}

function circlecaa_social_links() {
    return array(
        'facebook'  => array( 'icon' => 'fab fa-facebook-f', 'label' => 'Facebook',  'url' => circlecaa_get_option( 'facebook', 'https://facebook.com/circlecaa' ) ),
        'instagram' => array( 'icon' => 'fab fa-instagram',  'label' => 'Instagram', 'url' => circlecaa_get_option( 'instagram', 'https://instagram.com/circlecaa' ) ),
        'twitter'   => array( 'icon' => 'fab fa-twitter',    'label' => 'Twitter',   'url' => circlecaa_get_option( 'twitter', 'https://twitter.com/circlecaa' ) ),
        'youtube'   => array( 'icon' => 'fab fa-youtube',    'label' => 'YouTube',   'url' => circlecaa_get_option( 'youtube', 'https://youtube.com/@circlecaa' ) ),
    );
}

function circlecaa_the_date( $post_id = null ) {
    $date = get_post_meta( $post_id ?: get_the_ID(), '_event_date', true );
    if ( ! $date ) $date = get_the_date( 'Y-m-d' );
    return $date;
}

// ─── Excerpt ──────────────────────────────────────────────────────
function circlecaa_excerpt_length( $length ) { return 25; }
add_filter( 'excerpt_length', 'circlecaa_excerpt_length' );

function circlecaa_excerpt_more( $more ) { return '…'; }
add_filter( 'excerpt_more', 'circlecaa_excerpt_more' );

// ─── Font Awesome via CDN ──────────────────────────────────────────
function circlecaa_add_fa() {
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">' . "\n";
}
add_action( 'wp_head', 'circlecaa_add_fa' );

// ─── Custom Meta Boxes for Events ─────────────────────────────────
function circlecaa_event_meta_boxes() {
    add_meta_box( 'event_details', __( 'Event Details', 'circlecaa' ), 'circlecaa_event_meta_box_cb', 'event', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'circlecaa_event_meta_boxes' );

function circlecaa_event_meta_box_cb( $post ) {
    wp_nonce_field( 'circlecaa_event_meta', 'circlecaa_event_nonce' );
    $fields = array(
        '_event_date'     => 'Event Date (YYYY-MM-DD)',
        '_event_time'     => 'Event Time (e.g. 10:00 AM – 4:00 PM)',
        '_event_location' => 'Venue / Location',
        '_event_type'     => 'Event Type (Quiz / Debate / Kavi Samelan / Tree Planting / etc.)',
        '_event_register_url' => 'Registration URL (optional)',
    );
    echo '<table class="form-table">';
    foreach ( $fields as $key => $label ) {
        $val = get_post_meta( $post->ID, $key, true );
        echo "<tr><th><label for='{$key}'>{$label}</label></th>";
        echo "<td><input type='text' id='{$key}' name='{$key}' value='" . esc_attr( $val ) . "' style='width:100%'></td></tr>";
    }
    echo '</table>';
}

function circlecaa_save_event_meta( $post_id ) {
    if ( ! isset( $_POST['circlecaa_event_nonce'] ) || ! wp_verify_nonce( $_POST['circlecaa_event_nonce'], 'circlecaa_event_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    $keys = array( '_event_date', '_event_time', '_event_location', '_event_type', '_event_register_url' );
    foreach ( $keys as $key ) {
        if ( isset( $_POST[$key] ) ) update_post_meta( $post_id, $key, sanitize_text_field( $_POST[$key] ) );
    }
}
add_action( 'save_post_event', 'circlecaa_save_event_meta' );

// ─── Team Member Meta Box ──────────────────────────────────────────
function circlecaa_team_meta_boxes() {
    add_meta_box( 'team_details', __( 'Member Details', 'circlecaa' ), 'circlecaa_team_meta_box_cb', 'team_member', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'circlecaa_team_meta_boxes' );

function circlecaa_team_meta_box_cb( $post ) {
    wp_nonce_field( 'circlecaa_team_meta', 'circlecaa_team_nonce' );
    $fields = array(
        '_team_nick'       => 'Nickname / Handle',
        '_team_role'       => 'Role / Designation',
        '_team_facebook'   => 'Facebook URL',
        '_team_instagram'  => 'Instagram URL',
        '_team_twitter'    => 'Twitter URL',
        '_team_linkedin'   => 'LinkedIn URL',
    );
    echo '<table class="form-table">';
    foreach ( $fields as $key => $label ) {
        $val = get_post_meta( $post->ID, $key, true );
        echo "<tr><th><label for='{$key}'>{$label}</label></th>";
        echo "<td><input type='text' id='{$key}' name='{$key}' value='" . esc_attr( $val ) . "' style='width:100%'></td></tr>";
    }
    echo '</table>';
}

function circlecaa_save_team_meta( $post_id ) {
    if ( ! isset( $_POST['circlecaa_team_nonce'] ) || ! wp_verify_nonce( $_POST['circlecaa_team_nonce'], 'circlecaa_team_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    $keys = array( '_team_nick', '_team_role', '_team_facebook', '_team_instagram', '_team_twitter', '_team_linkedin' );
    foreach ( $keys as $key ) {
        if ( isset( $_POST[$key] ) ) update_post_meta( $post_id, $key, sanitize_text_field( $_POST[$key] ) );
    }
}
add_action( 'save_post_team_member', 'circlecaa_save_team_meta' );

// ─── Contact Form AJAX ─────────────────────────────────────────────
function circlecaa_handle_contact() {
    check_ajax_referer( 'circlecaa_nonce', 'nonce' );
    $name    = sanitize_text_field( $_POST['name'] ?? '' );
    $email   = sanitize_email( $_POST['email'] ?? '' );
    $subject = sanitize_text_field( $_POST['subject'] ?? '' );
    $message = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( ! $name || ! $email || ! $message ) {
        wp_send_json_error( 'Please fill all required fields.' );
    }

    $to      = get_option( 'admin_email' );
    $headers = array( 'Content-Type: text/html; charset=UTF-8', "Reply-To: {$name} <{$email}>" );
    $body    = "<p><strong>Name:</strong> {$name}<br><strong>Email:</strong> {$email}<br><strong>Subject:</strong> {$subject}</p><p><strong>Message:</strong><br>" . nl2br( $message ) . "</p>";

    wp_mail( $to, "Circle CAA Contact: {$subject}", $body, $headers );
    wp_send_json_success( 'Message sent successfully!' );
}
add_action( 'wp_ajax_nopriv_circlecaa_contact', 'circlecaa_handle_contact' );
add_action( 'wp_ajax_circlecaa_contact',        'circlecaa_handle_contact' );

// ─── Remove Emoji Scripts ──────────────────────────────────────────
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles',     'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles',  'print_emoji_styles' );
