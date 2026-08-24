<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Cosychats
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
?>



<main id="primary" class="site-main cosy-404-wrapper">
    <div class="cosy-404-card">
        <!-- Floating Badge -->
        <div class="cosy-404-badge">
            404 PAGE NOT FOUND
        </div>

        <!-- 404 Big Gradient Number -->
        <div class="cosy-404-number">404</div>

        <!-- Title & Description -->
        <h1 class="cosy-404-title"><?php esc_html_e("Oops! Lost in Conversation?", "cosychats"); ?></h1>
        <p class="cosy-404-desc">
            <?php esc_html_e("The page you are looking for might have been moved, renamed, or is currently unavailable. Let's get you back on track!", "cosychats"); ?>
        </p>

        <!-- Primary Action Button -->
        <div class="cosy-404-actions">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="cosy-btn-home">
                <?php esc_html_e('Back to Home', 'cosychats'); ?>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
