<?php
/**
 * The template for displaying all pages
 *
 * @package Cosychats
 */

get_header();
?>

<main id="primary" class="site-main cosy-main-page-content">
    <div class="cosychats-container" style="max-width: 1250px; margin: 0 auto; padding: 40px 20px; box-sizing: border-box; font-family: var(--cosy-font-body, 'Plus Jakarta Sans', sans-serif);">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
