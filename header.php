<?php

/**
 * The header for Cosychats Theme.
 *
 * @package Cosychats
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="hfeed site">
        <header>
            <div class="cosychats-header-container">
                <div class="navbar">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo cosychats_get_header_logo_url(); ?>" alt="<?php bloginfo('name'); ?> Logo">
                        </a>
                    </div>

                    <!-- Mobile Hamburger Button -->
                    <button class="mobile-menu-toggle" aria-label="Toggle navigation">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>

                    <nav class="nav-links">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'menu_class'     => 'main-menu'
                        ]);
                        ?>
                    </nav>
                </div>
            </div>
        </header>

        <div id="content" class="site-content">