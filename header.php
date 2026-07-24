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
            <div class="cosychats-container">
                <div class="navbar">
                    <div class="logo">
                        <a href="<?php echo site_url(); ?>">
                            <img src="https://cosychats.com/wp-content/uploads/2024/10/logo.png" alt="Cosy Chats Logo">
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

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleBtn = document.querySelector('.mobile-menu-toggle');
            var navLinks = document.querySelector('.nav-links');
            
            if (toggleBtn && navLinks) {
                toggleBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleBtn.classList.toggle('active');
                    navLinks.classList.toggle('active');
                });
            }

            // Toggle submenus on mobile when clicking dropdown toggle
            var dropdownToggles = document.querySelectorAll('.cosy-dropdown-toggle');
            dropdownToggles.forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    var hamburger = document.querySelector('.mobile-menu-toggle');
                    var isMobile = hamburger && (hamburger.offsetWidth > 0 || hamburger.offsetHeight > 0);
                    
                    if (isMobile) {
                        e.preventDefault();
                        e.stopPropagation();
                        var parentLi = toggle.closest('.cosy-header-dropdown-wrapper');
                        if (parentLi) {
                            parentLi.classList.toggle('open');
                            var submenu = parentLi.querySelector('.cosy-custom-submenu');
                            if (submenu) {
                                if (parentLi.classList.contains('open')) {
                                    submenu.style.setProperty('display', 'block', 'important');
                                } else {
                                    submenu.style.setProperty('display', 'none', 'important');
                                }
                                // Force repaint/reflow
                                submenu.offsetHeight;
                            }
                        }
                    }
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (navLinks && navLinks.classList.contains('active')) {
                    if (!navLinks.contains(e.target) && !toggleBtn.contains(e.target)) {
                        toggleBtn.classList.remove('active');
                        navLinks.classList.remove('active');
                    }
                }
            });
        });
        </script>

        <div id="content" class="site-content">