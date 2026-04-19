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
    wp_localize_script( 'circlecaa-main', 'circlecaaAjax', array(
        'url'   => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'circlecaa_nonce' ),
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
add_action( 'wp_ajax_circlecaa_contact',       'circlecaa_handle_contact' );
add_action( 'wp_ajax_circlecaa_contact',        'circlecaa_handle_contact' );

// ─── Remove Emoji Scripts ──────────────────────────────────────────
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles',     'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

// ─── Seed Demo Content (Blog Posts) ──────────────────────────────
function circlecaa_seed_content() {
    // Only run once
    if ( get_option( 'circlecaa_seeded' ) ) return;

    // Helper: copy a theme image into the WP media library
    function circlecaa_import_image( $filename, $title ) {
        $uploads = wp_upload_dir();
        $dest    = $uploads['path'] . '/' . $filename;
        $src     = get_template_directory() . '/assets/images/events/' . $filename;

        if ( ! file_exists( $src ) ) return 0;
        if ( ! copy( $src, $dest ) ) return 0;

        $filetype = wp_check_filetype( $filename );
        $att_args = array(
            'post_mime_type' => $filetype['type'],
            'post_title'     => sanitize_text_field( $title ),
            'post_content'   => '',
            'post_status'    => 'inherit',
        );
        $att_id = wp_insert_attachment( $att_args, $dest );
        require_once ABSPATH . 'wp-admin/includes/image.php';
        $metadata = wp_generate_attachment_metadata( $att_id, $dest );
        wp_update_attachment_metadata( $att_id, $metadata );
        return $att_id;
    }

    // Pre-import event images
    $imgs = array(
        1 => circlecaa_import_image( 'event-01.jpg', 'Circle CAA Kavi Samelan Event' ),
        2 => circlecaa_import_image( 'event-02.jpg', 'Circle CAA Open Mic Event' ),
        3 => circlecaa_import_image( 'event-03.jpg', 'Circle CAA Tree Plantation Drive' ),
        4 => circlecaa_import_image( 'event-04.jpg', 'Circle CAA Quiz Competition' ),
        5 => circlecaa_import_image( 'event-05.jpg', 'Circle CAA Community Gathering' ),
        6 => circlecaa_import_image( 'event-06.jpg', 'Circle CAA Wellness Camp' ),
        7 => circlecaa_import_image( 'event-07.jpg', 'Circle CAA Awareness Campaign' ),
    );

    $posts = array(

        // 1 — Plantation
        array(
            'title'    => 'Why Tree Plantation is the Most Powerful Act of Citizenship Today',
            'img'      => $imgs[3],
            'category' => 'Environment',
            'content'  => '<p>Every tree planted is a vote for the future. In Rajsamand — a region blessed with hills, rivers and open skies — trees are not just greenery; they are the lungs of our community. Yet rapid urbanisation, rising temperatures and changing rainfall patterns remind us that we cannot take nature for granted.</p>

<p>At Circle CAA, our Green Rajsamand initiative has planted more than 1,000 trees across schools, roadsides, water catchment zones and public parks. But beyond the numbers, what makes plantation drives meaningful is the human story behind every sapling.</p>

<h2>The Science of Planting</h2>
<p>A single mature tree absorbs up to 22 kg of CO₂ per year and releases enough oxygen for two people to breathe. In urban settings, tree cover can lower local temperatures by 2–8°C, reducing the heat island effect that makes city summers unbearable. Root systems prevent soil erosion, replenish groundwater tables and create microhabitats for birds, insects and soil microorganisms.</p>

<p>When communities plant trees together, they are not just improving air quality — they are building resilience against climate change, floods and droughts that increasingly threaten agricultural livelihoods in rural Rajasthan.</p>

<h2>Circle CAA\'s Approach</h2>
<p>Our plantation drives are never one-day events. We believe in post-plantation responsibility. Every volunteer who plants a sapling is encouraged to adopt it — to water it, protect it and watch it grow. We keep records, revisit plantation sites and celebrate survival milestones.</p>

<p>We partner with schools to set up eco-clubs, giving students a sense of ownership over their green patches. Teachers report that students who participate in plantation drives show greater environmental awareness, better understanding of ecosystems, and a sense of pride in their community.</p>

<h2>You Can Make a Difference</h2>
<p>You do not need a forest or farmland to make a difference. Plant a tree in your courtyard. Encourage your apartment society to green their common areas. Support a local NGO — like us — that works to restore degraded land. Volunteer on the next plantation drive.</p>

<p>The best time to plant a tree was twenty years ago. The second best time is today. Join Circle CAA and be part of Rajsamand\'s green future.</p>',
        ),

        // 2 — Public Speaking
        array(
            'title'    => 'The Transformative Power of Public Speaking: Why Every Young Person Should Learn to Speak Up',
            'img'      => $imgs[2],
            'category' => 'Education',
            'content'  => '<p>Standing before an audience — heart pounding, voice uncertain, hands trembling — is one of the most universally feared experiences in human life. Surveys consistently rank public speaking above death in lists of common fears. And yet, the ability to speak clearly and confidently in public is one of the most valuable skills a person can develop.</p>

<p>At Circle CAA, our open-mic and debate programmes have given hundreds of young people their first taste of the microphone. What we have witnessed, again and again, is nothing short of transformation.</p>

<h2>Confidence That Carries Over</h2>
<p>When a shy teenager delivers their first two-minute speech at a Circle CAA open-mic — even imperfectly — something shifts inside them. They realise they survived. They realise people listened. They realise their words have weight. That confidence does not stay on stage; it carries into classrooms, job interviews and personal relationships.</p>

<p>Research by the National Communication Association shows that students who participate in competitive speaking and debate perform measurably better academically, show stronger critical thinking skills and are more likely to be active citizens later in life.</p>

<h2>Thinking on Your Feet</h2>
<p>Public speaking — especially extempore formats — teaches the brain to organise thoughts quickly, anticipate objections, and communicate complex ideas simply. These are the same skills that make great leaders, doctors, teachers, entrepreneurs and advocates.</p>

<p>Our debate series at Circle CAA tackles real social issues: water conservation, gender equality, digital rights, rural education. Students do not just argue abstract positions — they research, reason and confront the messy complexity of real-world problems. Many participants report that these debates changed their own views and gave them empathy for perspectives different from their own.</p>

<h2>A Stage for Every Voice</h2>
<p>One of the most important things Circle CAA has done is create spaces where every voice is welcome — not just the confident ones, not just the students from affluent schools, not just the extroverts. Our events welcome homemakers, farmers\' children, first-generation learners, and differently-abled participants.</p>

<p>Because the world needs every voice. And every voice deserves a stage.</p>',
        ),

        // 3 — Mental health and social involvement
        array(
            'title'    => 'The Hidden Mental Health Benefits of Joining a Community Organisation',
            'img'      => $imgs[5],
            'category' => 'Mental Health',
            'content'  => '<p>In an era of smartphone screens, remote work and shrinking social circles, loneliness has quietly become one of the most significant public health crises of our time. The World Health Organisation now classifies loneliness as a serious health threat, linking it to depression, anxiety, cognitive decline and even shorter lifespan.</p>

<p>The antidote? Community. And more specifically, being part of a purpose-driven community organisation.</p>

<h2>Belonging as Medicine</h2>
<p>When you join an NGO or community group like Circle CAA, you immediately plug into something larger than yourself. You are no longer just an individual navigating life alone — you are part of a movement, a family, a shared story. Psychologists call this sense of social integration one of the strongest predictors of long-term wellbeing.</p>

<p>Members of Circle CAA frequently tell us that what began as an interest in volunteering became something much more personal. "I was going through a difficult time," one volunteer shared. "Coming to Circle CAA events gave me a reason to get up on Sundays. The friendships I made here are among the most genuine I\'ve ever had."</p>

<h2>Purpose Reduces Anxiety</h2>
<p>Anxiety often thrives in emptiness and uncertainty. When we are consumed by a cause — planting trees, organising a poetry evening, preparing for a debate — our minds have less room for rumination. Purpose is not just motivating; it is calming. It shifts our attention from what might go wrong to what we are actively building.</p>

<p>Research published in the Journal of Positive Psychology found that people who regularly volunteer report higher life satisfaction, fewer depressive symptoms, and greater sense of control over their lives. These benefits are especially pronounced in young adults and older individuals — two groups particularly vulnerable to social isolation.</p>

<h2>Skills, Recognition and Growth</h2>
<p>Community organisations also provide something quietly powerful: a context for growth and recognition outside of academic or professional settings. Someone who struggles in school may discover they are an exceptional event organiser, a powerful poet, or a natural counsellor. Circle CAA has seen many such moments — students finding confidence through Kavi Samelan, housewives discovering leadership through plantation drives, retired professionals finding renewed purpose through mentorship.</p>

<p>The mental health benefits of community involvement are not a side effect. They are a core outcome. Come join us, and experience it for yourself.</p>',
        ),

        // 4 — Kavi Samelan
        array(
            'title'    => 'Kavi Samelan: Why Hindi Poetry is Not a Relic of the Past, But a Living Force',
            'img'      => $imgs[1],
            'category' => 'Culture & Arts',
            'content'  => '<p>There is a particular kind of electricity in the air when a poet takes the stage at a Kavi Samelan. The audience — spanning generations, backgrounds and temperaments — goes quiet. And then the words begin to flow.</p>

<p>Hindi poetry has survived centuries of invasion, colonialism, industrialisation and now the digital revolution. It has not survived by accident. It has survived because it speaks to the deepest human experiences — love and loss, justice and injustice, joy and grief — in a language that is both ancient and urgently contemporary.</p>

<h2>Why We Do Kavi Samelan</h2>
<p>Circle CAA organises Kavi Samelan events not as nostalgic exercises, but as vital community rituals. Poetry is one of humanity\'s oldest tools for processing shared experience. When a poet describes the scorched fields of a drought-hit village, every farmer in the audience recognises their own story. When a young woman reads a poem about breaking free from expectation, every girl in the room feels a little bolder.</p>

<p>Our Kavi Samelan events bring together established poets and first-time performers in the same space — no hierarchy, no gatekeeping. A grandparent and a teenager may both take the stage in the same evening. That intergenerational meeting is something precious, increasingly rare, and worth protecting.</p>

<h2>The Craft of Poetry</h2>
<p>Beyond its emotional power, poetry is a rigorous intellectual exercise. Composing a sher or a doha requires precision with language, economy of expression, control of rhythm and metre, and the ability to compress entire philosophies into a few syllables. These skills — precision, economy, elegance — are transferable to every form of communication.</p>

<p>Our youth poetry workshops teach young participants not just to write, but to listen closely, to choose words carefully, and to be accountable for the meaning their words create in others\' minds.</p>

<h2>A Stage That Belongs to Everyone</h2>
<p>Hindi poetry is sometimes perceived as elite or inaccessible. Circle CAA pushes back against this. Our stage welcomes poetry in all dialects — including Rajasthani, Mewari and local folk traditions. Language is a living thing, and every regional expression enriches the larger whole.</p>

<p>If you have never attended a Kavi Samelan, you are missing one of the most moving communal experiences available. We welcome you to our next event.</p>',
        ),

        // 5 — Volunteering impact
        array(
            'title'    => 'What Volunteering Actually Does to Your Brain (The Science May Surprise You)',
            'img'      => $imgs[5],
            'category' => 'Volunteering',
            'content'  => '<p>We often think of volunteering as something we do for others. The food drive for the hungry. The plantation for the planet. The awareness campaign for the marginalised. And yes, volunteering does all of that. But an emerging body of neuroscience and psychology research reveals something remarkable: volunteering may be as good for the volunteer as for those they serve.</p>

<h2>The Helper\'s High is Real</h2>
<p>Neuroscientists at the National Institutes of Health (NIH) found that charitable giving and prosocial behaviour activate the same reward circuits in the brain as food and sex — the mesolimbic dopamine system. This effect, sometimes called the "helper\'s high," is a measurable neurological response to acts of generosity and service.</p>

<p>But the benefits do not stop at a temporary mood lift. Regular volunteers show sustained lower levels of cortisol (the stress hormone), better immune function, and significantly lower rates of depression and anxiety in longitudinal studies.</p>

<h2>Social Connection Builds Brain Health</h2>
<p>Volunteering is inherently social. It puts you in contact with a diverse community of people — different ages, backgrounds, skills and perspectives. This social engagement is among the most powerful protectors against cognitive decline as we age. Studies of older volunteers consistently show better memory, stronger executive function and lower risk of dementia compared to non-volunteering peers.</p>

<p>For young people, the social skills built through volunteering — conflict resolution, collaborative decision-making, empathy in action — are exactly the skills that employers, partners and communities most value.</p>

<h2>The Identity Effect</h2>
<p>Something profound happens when you begin to see yourself as a volunteer, an activist, or a community builder. Your identity shifts from passive recipient of the world\'s events to active co-creator of your community\'s future. This sense of agency — the feeling that your actions matter — is one of the most robust predictors of psychological resilience.</p>

<p>Circle CAA volunteers regularly tell us that their work with us changed how they see themselves. Not just as people who do good, but as people who are capable of change. That belief is, in itself, transformative.</p>

<p>If you are looking for a reason to start volunteering, the science suggests the benefits begin immediately. Join us at Circle CAA and find your cause.</p>',
        ),

        // 6 — Community building
        array(
            'title'    => 'Building Community in the Age of Individualism: Lessons from Rajsamand',
            'img'      => $imgs[5],
            'category' => 'Community',
            'content'  => '<p>There is a Hindi phrase: "अकेला चना भाड़ नहीं फोड़ सकता" — a single chickpea cannot burst the kiln. No matter how committed an individual, the deepest social change requires collective action, shared purpose and sustained community.</p>

<p>This is the founding insight of Circle CAA. In a world that increasingly celebrates individual achievement and personal branding, we exist as a counterpoint — an assertion that the most meaningful things humans do, we do together.</p>

<h2>What Community Really Means</h2>
<p>True community is not a WhatsApp group or a Facebook page. It is the experience of showing up for each other across time. It is the volunteer who drove forty kilometres to attend a plantation drive. It is the poet who stayed after the Kavi Samelan to mentor a nervous first-timer. It is the senior member who brought homemade snacks to a late-night event preparation session.</p>

<p>Community is built in small moments, consistently over time. Circle CAA has been building those moments in Rajsamand since our founding.</p>

<h2>The Role of Diversity</h2>
<p>Strong communities are not echo chambers. They contain disagreement, diversity and healthy tension. At Circle CAA, our events bring together people from different castes, economic backgrounds, educational levels and generations. A retired school principal and a first-year college student may find themselves on the same plantation team, debating which spot gets the next sapling.</p>

<p>That kind of unlikely encounter — across social divisions that otherwise keep us in separate bubbles — is one of the most powerful things a community organisation can facilitate. It builds empathy. It builds trust. It builds the social capital that communities need to solve their hardest problems.</p>

<h2>Start Where You Are</h2>
<p>You do not need to move to a new city or change careers to build community. Start where you are. Introduce yourself to a neighbour. Volunteer at a local event. Attend a public meeting. Join Circle CAA.</p>

<p>Communities are not discovered — they are created, by ordinary people who decide that connection matters. Be one of those people.</p>',
        ),

        // 7 — Environment awareness
        array(
            'title'    => 'Plastic Pollution in Rajsamand: What We See, What We Ignore, and What We Can Do',
            'img'      => $imgs[3],
            'category' => 'Environment',
            'content'  => '<p>Walk along any public space in Rajsamand — a roadside, a riverbank, the base of a hill — and you will encounter it. The crackling, fluttering, accumulating presence of single-use plastic. Bags, bottles, wrappers, sachets. The material that never truly goes away.</p>

<p>India generates approximately 3.5 million tonnes of plastic waste per year. Much of it escapes the waste management system entirely, ending up in soil, waterways and eventually the ocean. Microplastics have now been found in Himalayan glaciers, in the blood of unborn children, and in the digestive systems of fish from the deepest ocean trenches.</p>

<h2>The Local Picture</h2>
<p>In Rajsamand, plastic pollution has specific local consequences. Roadside plastic clogs drainage channels, increasing waterlogging during monsoons. Plastic debris in water bodies like the Rajsamand Lake harms aquatic ecosystems and degrades the beauty of one of Rajasthan\'s most historic landmarks. Animals — particularly cattle — ingest plastic bags with devastating consequences to their health.</p>

<p>Circle CAA\'s clean-up drives have collected hundreds of kilograms of plastic from public spaces. But we know that clean-up alone is not the answer. The waste stream must be interrupted at the source.</p>

<h2>What Actually Works</h2>
<p>Evidence from successful anti-plastic campaigns around the world shows three things that make a lasting difference: extended producer responsibility (making manufacturers accountable for their packaging), behaviour change through social norms (making littering socially unacceptable), and accessible alternatives (ensuring that cloth bags, steel bottles, and reusable options are affordable and available).</p>

<p>At Circle CAA, we focus on the social norms piece — through awareness campaigns, school programmes, and community dialogue that shift attitudes and expectations around plastic use. We also advocate for better local waste management infrastructure.</p>

<h2>Your Role</h2>
<p>Carry a cloth bag. Refuse single-use plastic straws. Bring your own bottle. Participate in or organise a local clean-up. Talk to your local shopkeepers about alternatives. These are not small actions — they are signals that shape the social norms that ultimately drive systemic change.</p>',
        ),

        // 8 — Book reading culture
        array(
            'title'    => 'Why Reading Books is a Radical Act in the Age of Social Media',
            'img'      => $imgs[4],
            'category' => 'Education',
            'content'  => '<p>The average Indian spends more than three hours per day on a smartphone. The average time spent reading books: less than fifteen minutes. This is not a moral failing — it is the predictable consequence of technologies engineered to capture attention and reward instant gratification.</p>

<p>And yet, books remain among the most powerful tools for human development ever created. To read a book is to undertake a different kind of engagement with the world — slower, deeper, more demanding, and ultimately more rewarding.</p>

<h2>What Books Do That Screens Cannot</h2>
<p>Research in cognitive neuroscience shows that deep reading — the kind sustained by books — activates brain networks associated with language, sensation, movement and emotion in ways that shallow digital reading does not. When we read a novel, we literally simulate the experiences of the characters: their emotions, physical sensations and social interactions. This simulation builds empathy in ways that bullet-point news feeds cannot replicate.</p>

<p>Long-form reading also builds the capacity for sustained attention — precisely the cognitive skill most eroded by constant digital stimulation. Students who read for pleasure consistently outperform peers on standardised tests, not just in reading but in mathematics and science. The ability to concentrate is foundational to all learning.</p>

<h2>Circle CAA\'s Book Mission</h2>
<p>Our book promotion work spans book fairs, reading clubs, free libraries in underserved areas, and campaigns that celebrate Hindi and Rajasthani literature. We have distributed more than 5,000 books and set up three community reading spaces where anyone — regardless of income or education level — can access literature.</p>

<p>We particularly celebrate local authors and regional literature. There are extraordinary writers working in Rajasthani, Mewari and Hindi whose work is rarely taught in schools and seldom appears in national bestseller lists. Circle CAA creates space to discover and honour these voices.</p>

<h2>A Challenge for You</h2>
<p>Read one book this month that you would not normally pick up. A poetry collection. A local history. A biography. Notice what it does to your thinking. Then come to one of our book exchange events and tell us about it.</p>',
        ),

        // 9 — Wellness and yoga
        array(
            'title'    => 'Wellness Beyond the Gym: A Holistic Approach to Health for Everyday Indians',
            'img'      => $imgs[6],
            'category' => 'Wellness',
            'content'  => '<p>When we think about health, most of us picture physical fitness — gym memberships, step counts, calorie tracking. And while physical activity is undeniably important, health in its deepest sense encompasses something far more complex: physical, mental, social and spiritual wellbeing in balance.</p>

<p>India\'s ancient wellness traditions — yoga, Ayurveda, pranayama, community rituals — understood this holistic vision long before modern medicine fragmented health into specialty departments. Circle CAA\'s Wellness for All initiative draws on both traditional wisdom and contemporary evidence to offer a more complete picture of what it means to be well.</p>

<h2>The Social Dimension of Health</h2>
<p>Decades of research confirm that social isolation is one of the strongest predictors of poor health outcomes — comparable in impact to smoking fifteen cigarettes a day. Conversely, people with strong social connections live longer, recover faster from illness, have stronger immune systems and report higher life satisfaction.</p>

<p>This means that attending a Circle CAA event, joining a plantation drive, or showing up to a community yoga session is not just a nice social activity — it is a health intervention. The social bonds built through collective action are as important to your wellbeing as any medicine.</p>

<h2>Our Wellness Programmes</h2>
<p>Our free yoga and meditation workshops are open to all — beginners, seniors, people with physical limitations. We work with local practitioners and health professionals to provide camps that include basic health screenings, nutrition guidance and mental health awareness.</p>

<p>In rural areas around Rajsamand, access to health information is limited. Our wellness camps bring simple, evidence-based guidance on hygiene, nutrition, prenatal care and chronic disease prevention to communities that rarely see a doctor. The impact on maternal and child health alone is significant.</p>

<h2>Start Small</h2>
<p>You do not need an expensive gym or a certificate in yoga to begin a wellness journey. Start with ten minutes of quiet breathing each morning. Walk instead of riding for short distances. Cook one more home meal per week. And connect — join a community, attend an event, talk to your neighbours. Health is built in daily small choices and in the relationships that sustain us.</p>',
        ),

        // 10 — Women empowerment
        array(
            'title'    => 'Women at the Centre: How Circle CAA is Rethinking Community Leadership',
            'img'      => $imgs[2],
            'category' => 'Social Awareness',
            'content'  => '<p>In most community organisations, leadership roles tend to cluster around those who are already empowered — the educated, the articulate, those with free time and social capital. In practice, this often means men, and particularly men of higher social standing.</p>

<p>Circle CAA has made a deliberate, active choice to do things differently.</p>

<h2>Women as Organisers, Not Just Participants</h2>
<p>From the beginning, Circle CAA has worked to ensure that women are not just beneficiaries of our programmes but core architects of them. Our event planning committees are majority female. Our awareness campaigns on gender equality are designed and led by women. The voices that take the stage at our Kavi Samelan include women who have never before spoken publicly.</p>

<p>The results are visible. Women who begin as quiet participants in Circle CAA activities often, within months, emerge as confident organisers, public speakers and community advocates. This is not accidental — it is the result of deliberate mentorship, positive reinforcement and the creation of spaces where women\'s contributions are genuinely valued.</p>

<h2>The Economics of Women\'s Empowerment</h2>
<p>Every global development agency agrees: investing in women and girls is among the highest-return investments a society can make. When women are educated and economically active, they invest a higher proportion of their income in their children\'s health and education than men do. Communities with higher levels of female participation in leadership make better collective decisions and show stronger social cohesion.</p>

<p>Circle CAA\'s work with women is, therefore, not just about justice (though it is that) — it is about building the most resilient, prosperous version of Rajsamand possible.</p>

<h2>Breaking Invisible Barriers</h2>
<p>Many of the barriers that limit women\'s participation are invisible: the assumption that public speaking is for men, the social pressure not to travel to events, the lack of female role models in leadership. Circle CAA works to make these barriers visible and to dismantle them — through awareness campaigns, by featuring women leaders in all our communications, and by creating events where women\'s safety and comfort are considered from the start.</p>',
        ),

        // 11 — Youth leadership
        array(
            'title'    => 'Grooming the Next Generation: Youth Leadership in Rural India',
            'img'      => $imgs[4],
            'category' => 'Education',
            'content'  => '<p>India is the youngest country in the world by median age. More than 600 million Indians are under the age of 25. This demographic fact is simultaneously our greatest opportunity and our most urgent responsibility.</p>

<p>Young people who grow up without meaningful opportunities for leadership development, civic engagement, and skill-building do not simply remain neutral — they become vulnerable to disillusionment, extremism, addiction, and migration from their communities. The cost of neglecting youth leadership is paid by entire communities, for generations.</p>

<h2>What Real Leadership Development Looks Like</h2>
<p>Leadership is not taught in lectures. It is learned through experience, reflection, mentorship and the opportunity to make real decisions with real consequences. At Circle CAA, our youth programmes give young people exactly these opportunities.</p>

<p>A student who leads the logistics for our annual Kavi Samelan — managing bookings, coordinating volunteers, communicating with performers — has, by the end of that experience, developed skills that no classroom can replicate. A teenager who takes the stage at an open-mic event, faces the audience, speaks their truth and survives the experience has overcome a fear that will serve them for the rest of their life.</p>

<h2>Mentorship Across Generations</h2>
<p>One of Circle CAA\'s most valuable, least visible functions is the mentorship relationship it creates between older and younger members. An experienced social activist mentoring a first-year college student. A retired professional guiding a school-leaver through their first job search. A poet nurturing the raw talent of a teenager who has never read their work aloud.</p>

<p>These relationships are what turn a community organisation into something that genuinely shapes lives. Circle CAA is, in this sense, a school without walls.</p>

<h2>The Rural Dimension</h2>
<p>In rural and semi-urban settings like Rajsamand, the need for youth leadership development is especially acute. Quality extracurricular programmes, mentorship networks, and civic engagement opportunities are far rarer here than in metropolitan centres. Circle CAA fills a genuine gap — and the young people who grow through our programmes carry that growth back into their families, schools and communities.</p>',
        ),

        // 12 — Mental health stigma
        array(
            'title'    => 'Breaking the Silence: Mental Health in Small-Town India',
            'img'      => $imgs[6],
            'category' => 'Mental Health',
            'content'  => '<p>"Manorog nahi hai, bas dimag kamzor hai." — "It\'s not a mental illness, the mind is just weak." Variations of this dismissal echo through households, doctors\' offices and religious spaces across rural India. And this dismissal — born from stigma, ignorance and cultural taboo — costs lives.</p>

<p>India accounts for nearly 15% of the global burden of mental health conditions, yet mental health receives less than 1% of the national health budget. In rural and semi-urban areas, the situation is even more acute: trained mental health professionals are scarce, awareness is low, and the social stigma around seeking help remains profound.</p>

<h2>What Stigma Does</h2>
<p>Stigma delays help-seeking, sometimes by years or decades. It causes people to suffer in isolation, hiding symptoms that are treatable and conditions that are manageable. It drives families to conceal a member\'s mental illness rather than seek support, causing both the individual and the family to suffer unnecessarily.</p>

<p>In young people, untreated mental health conditions are among the strongest predictors of academic failure, substance abuse, relationship breakdown and, in the worst cases, suicide. India\'s student suicide rate is among the highest in the world — a crisis that cannot be separated from the stigma that prevents young people from asking for help.</p>

<h2>Circle CAA\'s Approach</h2>
<p>Our mental health awareness programmes do not attempt to replace professional care — they work to create the conditions in which people feel safe enough to seek it. Our workshops in schools and colleges use storytelling, open dialogue and expert facilitation to normalise the language of mental health.</p>

<p>We train peer supporters — young people who can recognise signs of distress in their friends and respond with compassion rather than avoidance. We run campaigns that feature real stories from community members who have sought help and found relief. We partner with counsellors who can provide follow-up support to those who reach out.</p>

<h2>A Message to Anyone Struggling</h2>
<p>If you are going through a difficult time — if life feels too heavy, too dark, too loud — please know that what you are experiencing is real, it is not weakness, and help is available. Talk to someone you trust. Contact a mental health helpline. Come to a Circle CAA event and let community be your first step back.</p>',
        ),

        // 13 — Food drives and poverty
        array(
            'title'    => 'No One Should Go Hungry: Circle CAA\'s Fight Against Food Insecurity in Rajsamand',
            'img'      => $imgs[7 > count($imgs) ? 1 : 6],
            'category' => 'Social Welfare',
            'content'  => '<p>In the shadow of Rajsamand\'s marble quarries and historic lake, a quieter story unfolds: families who skip meals, children who cannot concentrate in school because their stomachs are empty, elderly individuals who have no one to bring them food. Food insecurity is not a distant problem — it exists in every town in India, including ours.</p>

<p>Approximately 190 million Indians face chronic hunger, according to the Global Hunger Index. India ranks 111th out of 125 countries on the index — below several nations with lower GDP. The paradox is that India produces sufficient food. The problem is distribution, access, and above all, political will and community action at the local level.</p>

<h2>Circle CAA\'s Food Drives</h2>
<p>Our weekly and festival-season food distribution initiatives have served more than 2,000 meals to homeless individuals, migrant workers, destitute elderly, and families in crisis. We work with local restaurants, vegetable vendors, and community donors to source fresh, nutritious food — not just calories, but meals that respect the dignity of those who receive them.</p>

<p>Every food drive is also an act of community-building. Volunteers prepare meals together, serve them together, and sit with recipients to share conversation. We believe that hunger is not just a physical condition — it is also an experience of invisibility and exclusion. Our food drives address both.</p>

<h2>Beyond the Immediate</h2>
<p>Circle CAA recognises that food drives, however important, treat symptoms rather than causes. Our longer-term work includes livelihood skills training, information about government welfare schemes, and advocacy for better local food distribution infrastructure. We connect families in need with entitlements they may not know they have: ration cards, pension schemes, employment guarantee programmes.</p>

<p>If you can spare a meal\'s worth — of food, of time, of money — please join our next food drive. The difference it makes to those who receive it is not measurable in rupees.</p>',
        ),

        // 14 — Digital literacy
        array(
            'title'    => 'Digital Literacy: The New Frontier of Civic Education in Rural Rajasthan',
            'img'      => $imgs[4],
            'category' => 'Education',
            'content'  => '<p>A smartphone is in nearly every pocket in India. But owning a device is not the same as being digitally literate. The gap between having access to technology and being able to use it safely, critically and productively is one of the defining inequalities of our era.</p>

<p>In Rajsamand, as in much of rural India, many first-time internet users encounter the digital world through a single platform — WhatsApp — and navigate it without any formal guidance on identifying misinformation, protecting their privacy, avoiding online fraud, or accessing the vast range of government and educational resources available online.</p>

<h2>The Costs of Digital Illiteracy</h2>
<p>The consequences are serious and well-documented. Misinformation spread via WhatsApp has incited violence, destroyed reputations and driven medical misinformation that costs lives. Online fraud targeting people unfamiliar with digital security costs Indian citizens thousands of crores annually. Young people without digital skills are increasingly unable to compete for jobs, access higher education, or participate in civic life.</p>

<p>And on the flip side: digital literacy opens extraordinary doors. Government schemes — subsidies, scholarships, health programmes, employment registrations — are increasingly accessible only through digital channels. A person who can navigate these systems is empowered; a person who cannot is dependent on intermediaries who may or may not act in their interest.</p>

<h2>Circle CAA\'s Digital Literacy Workshops</h2>
<p>Our workshops — held in schools, community centres and women\'s self-help groups — cover the practical basics: identifying fake news, protecting personal data, safely using digital payments, accessing government portals and using educational apps. We adapt our materials to different age groups and comfort levels, starting where participants actually are rather than where we wish they were.</p>

<p>The response has been remarkable. Women who have never typed on a keyboard are accessing bank accounts independently. Farmers are using weather apps and market price platforms to make better decisions. Students are discovering online libraries, scholarship portals and learning resources that simply were not available to their older siblings.</p>',
        ),

        // 15 — Circle CAA vision
        array(
            'title'    => 'From Rajsamand to the World: The Vision Behind Circle CAA',
            'img'      => $imgs[2],
            'category' => 'About Circle CAA',
            'content'  => '<p>Every organisation begins with a moment of frustration — the realisation that something important is missing, that the world could be better than it is, that someone needs to do something and that someone might as well be us.</p>

<p>Circle CAA was born from exactly such a moment. In Rajsamand, a city rich in culture, history and human potential, the founders of Circle CAA saw talented young people without a platform, environmental challenges without a community response, and social conversations that needed to happen but were not happening.</p>

<h2>The Name</h2>
<p>Circle CAA stands for Creative Arts and Awareness. The circle symbolises community, inclusion and continuity — there is no hierarchy in a circle, no inside and outside, no beginning or end. CAA reflects our founding conviction that creative expression and social awareness are not luxuries but essentials — the twin engines of a conscious, thriving community.</p>

<h2>What We Believe</h2>
<p>We believe that every person, regardless of their background, education or economic status, has something to contribute and something to gain from community participation. We believe that social change happens in relationships, not just in policies. We believe that culture — poetry, music, debate, storytelling — is not separate from social development but inseparable from it.</p>

<p>We believe that the environment is not an abstract cause but the foundation of every human future. We believe that mental health, physical health and community health are one. We believe that the youngest and the oldest among us both have wisdom worth hearing.</p>

<h2>Our Journey and Where We Are Going</h2>
<p>From our first tree plantation drive to our annual Kavi Samelan, from our first food distribution to our hundredth workshop — Circle CAA has grown because our community has grown with us. Every volunteer who gave a weekend, every donor who gave a rupee, every participant who gave their presence has been a co-creator of this organisation.</p>

<p>Our vision is a Rajsamand — and eventually a Rajasthan, and eventually an India — where communities are conscious, creative, compassionate and connected. That is a large vision. But all large visions begin with small, consistent acts. We\'ve started. Come join us.</p>',
        ),

    );

    // Create category terms
    $cats = array( 'Environment', 'Education', 'Mental Health', 'Culture & Arts', 'Volunteering',
                   'Community', 'Social Awareness', 'Wellness', 'Social Welfare', 'About Circle CAA' );
    foreach ( $cats as $cat_name ) {
        if ( ! term_exists( $cat_name, 'category' ) ) {
            wp_insert_term( $cat_name, 'category' );
        }
    }

    // Insert posts
    foreach ( $posts as $post_data ) {
        $term      = get_term_by( 'name', $post_data['category'], 'category' );
        $cat_id    = $term ? $term->term_id : 1;

        $post_id = wp_insert_post( array(
            'post_title'   => wp_strip_all_tags( $post_data['title'] ),
            'post_content' => $post_data['content'],
            'post_status'  => 'publish',
            'post_author'  => 1,
            'post_type'    => 'post',
            'post_category'=> array( $cat_id ),
            'meta_input'   => array(
                '_yoast_wpseo_metadesc' => wp_strip_all_tags( $post_data['title'] ) . ' — Read more on Circle CAA.',
            ),
        ) );

        // Set featured image
        if ( $post_id && ! is_wp_error( $post_id ) && ! empty( $post_data['img'] ) ) {
            set_post_thumbnail( $post_id, $post_data['img'] );
        }
    }

    update_option( 'circlecaa_seeded', '1' );
}
add_action( 'after_switch_theme', 'circlecaa_seed_content' );
remove_action( 'admin_print_styles',  'print_emoji_styles' );
