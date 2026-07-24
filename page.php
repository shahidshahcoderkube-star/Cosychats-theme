<?php
/**
 * The template for displaying all pages
 *
 * @package Cosychats
 */

get_header();
?>

<main id="primary" class="site-main cosy-main-page-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
