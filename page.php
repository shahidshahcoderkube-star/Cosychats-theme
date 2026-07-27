<?php
/**
 * The template for displaying all pages
 *
 * @package Cosychats
 */

get_header();

$is_plugin_page = false;

if (is_page()) {
    $post_content = get_post() ? get_post()->post_content : '';
    $plugin_shortcodes = [
        'cosy_service_provider_list',
        'cosy_provider_dashboard',
        'cosy_checkout',
        'cosy_appointments',
        'customer_profile',
        'cosy_customer_registration',
        'cosy_provider_registration',
        'cosy_verify_provider',
        'cosy_login_form',
        'cosy_customer_order'
    ];

    foreach ($plugin_shortcodes as $sc) {
        if (has_shortcode($post_content, $sc)) {
            $is_plugin_page = true;
            break;
        }
    }

    if (!$is_plugin_page && (
        is_page(['service-provider', 'provider-profile', 'cosy-checkout', 'dashboard']) ||
        get_query_var('cosy_provider_profile')
    )) {
        $is_plugin_page = true;
    }
}

$container_class = $is_plugin_page ? 'cosychats-plugin-container' : 'cosychats-container cosychats-theme-page';
?>

<main id="primary" class="site-main cosy-main-page-content">
    <div class="<?php echo esc_attr($container_class); ?>">
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
