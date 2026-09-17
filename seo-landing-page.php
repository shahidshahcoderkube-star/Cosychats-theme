<?php

/**
 * Template Name: SEO Landing Page
 *
 * Clean, editorial SEO article template with subtle CosyChats connect inserts.
 * Designed for organic search engagement and authentic parent connection.
 *
 * @package Cosychats
 */

get_header();

$page_id = get_the_ID();
$page_data = get_fields($page_id);
$choose_experience = $page_data['choose_experience'];
$daily_strategies_heading = $page_data['daily_strategies_heading'];
$strategy_sub_heading = $page_data['strategy_sub_heading'];
$daily_strategies_list = $page_data['daily_strategies_list'];
$expect_heading = $page_data['expect_heading'];
$expect_list = $page_data['expect_list'];
$lived_experience_heading = $page_data['lived_experience_heading'];
$lived_experience_description = $page_data['lived_experience_description'];
$support_title = $page_data['support_title'];
$support_description = $page_data['support_short_description'];
$cta_title = $page_data['cta_title'];
$cta_sub_title = $page_data['cta_sub_title'];
$cta_highlight = $page_data['cta_highlight'];
$cta_button = $page_data['cta_button'];
$experience_user = $page_data['experience_user'];
$page_title = get_the_title();
$published_date = get_the_date('c');
$modified_date  = get_the_modified_date('c');
$page_url       = get_permalink();
?>

<main id="primary" class="site-main cosy-seo-landing-root">

    <div class="cosy-seo-page-container">

        <?php
        $category_name = !empty($choose_experience->post_title) ? $choose_experience->post_title : __('Parenting Experiences', 'cosychats');
        $category_slug = !empty($choose_experience->post_name) ? $choose_experience->post_name : '';
        $category_url  = !empty($category_slug) ? home_url('/service-provider/' . $category_slug . '/') : home_url('/service-provider/');
        ?>
        <!-- 1. Breadcrumbs Navigation: Home > Parenting Experiences > Title -->
        <nav class="cosy-seo-breadcrumbs" aria-label="<?php esc_attr_e('Breadcrumbs', 'cosychats'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'cosychats'); ?></a>
            <span class="separator">›</span>
            <a href="<?php echo esc_url($category_url); ?>"><?php echo esc_html($category_name); ?></a>
            <span class="separator">›</span>
            <span class="current" aria-current="page"><?php echo esc_html($page_title); ?></span>
        </nav>

        <!-- 2. Category Pill Badge -->
        <div class="cosy-seo-badge-wrap">
            <a href="<?php echo esc_url($category_url); ?>" class="cosy-seo-hero-badge">
                <?php echo esc_html($category_name); ?>
            </a>
        </div>

        <!-- 3. Article Main Heading -->
        <h1 class="cosy-seo-article-title"><?php echo esc_html($page_title); ?></h1>

        <!-- 4. Editorial Article Area with Text Wrap Around Featured Image & Insert -->
        <article class="cosy-seo-article-body">

            <!-- Featured Image with Parent Name underneath -->
            <div class="cosy-seo-featured-media-box">
                <div class="cosy-seo-img-holder">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', [
                            'alt'           => esc_attr($page_title),
                            'class'         => 'cosy-seo-main-photo',
                            'loading'       => 'eager',
                            'fetchpriority' => 'high',
                            'decoding'      => 'async',
                        ]); ?>
                    <?php endif; ?>
                </div>
                <div class="cosy-seo-parent-caption">
                    <?php
                    $parent_display = !empty($experience_user['user_firstname']) ? ucfirst(trim($experience_user['user_firstname'])) : __('CosyChats', 'cosychats');
                    ?>
                    <span class="cosy-seo-caption-text"><?php echo esc_html($parent_display . ' - CosyChats Parent'); ?></span>
                </div>
            </div>

            <!-- Article Content Flow (Direct Editorial Content without Top Distraction) -->
            <div class="cosy-seo-content-flow">
                <?php the_content(); ?>
                <!-- Daily Strategies That Make a Real Difference -->
                <?php if (!empty($daily_strategies_heading)) : ?>
                    <h2><?php echo esc_html($daily_strategies_heading); ?></h2>
                <?php endif; ?>
                <p><?php echo esc_html($strategy_sub_heading); ?></p>
                <ul class="cosy-seo-strategies-list">
                    <?php if (!empty($daily_strategies_list)) : ?>
                        <?php foreach ($daily_strategies_list as $strategy) : ?>
                            <li><strong><?php echo esc_html($strategy['strategies_title'] ?? ''); ?>:</strong> <?php echo esc_html($strategy['strategies_description'] ?? ''); ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <!-- Key Takeaways & What to Expect Card (Proper H3 Hierarchy) -->
                <?php if (!empty($expect_list)) : ?>
                    <div class="cosy-seo-takeaways-card">
                        <div class="cosy-seo-takeaways-header">
                            <i class="fa-regular fa-lightbulb"></i>
                            <h3><?php echo esc_html($expect_heading); ?></h3>
                        </div>
                        <ul class="cosy-seo-takeaways-list">
                            <?php foreach ($expect_list as $expect) : ?>
                                <?php if (!empty($expect['add_expect_point'])) : ?>
                                    <li><?php echo esc_html($expect['add_expect_point']); ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Why Speaking with a Lived-Experience Parent Matters -->
                <?php if (!empty($lived_experience_heading)) : ?>
                    <h2><?php echo esc_html($lived_experience_heading); ?></h2>
                <?php endif; ?>
                <?php if (!empty($lived_experience_description)) : ?>
                    <?php echo wp_kses_post(wpautop($lived_experience_description)); ?>
                <?php endif; ?>

                <!-- Peer Support & Healthcare Notice (Google Quality Rater E-E-A-T Requirement) -->
                <div class="cosy-seo-trust-disclaimer">
                    <div class="cosy-seo-disclaimer-icon">
                        <i class="fa-solid fa-shield-heart" aria-hidden="true"></i>
                    </div>
                    <div class="cosy-seo-disclaimer-text">
                        <strong><?php esc_html_e($support_title, 'cosychats'); ?></strong>
                        <span><?php esc_html_e($support_description, 'cosychats'); ?></span>
                    </div>
                </div>
            </div>

            <div class="cosy-seo-clear"></div>

            <!-- 5. End-of-Article Bottom CTA Box -->
            <div class="cosy-seo-bottom-article-cta">
                <h3 class="cosy-seo-bottom-title"><?php echo $cta_title; ?></h3>
                <p class="cosy-seo-bottom-desc"><?php echo $cta_sub_title; ?></p>
                <p class="cosy-seo-bottom-highlight"><?php echo $cta_highlight; ?></p>
                <div class="cosy-seo-bottom-links">
                    <?php
                    $btn_primary   = !empty($cta_button[0]['button_name']) ? $cta_button[0]['button_name'] : null;
                    $btn_secondary = !empty($cta_button[1]['button_name']) ? $cta_button[1]['button_name'] : null;
                    ?>
                    <?php if (!empty($btn_primary['url']) && !empty($btn_primary['title'])) : ?>
                        <a href="<?php echo esc_url($btn_primary['url']); ?>" class="cosy-seo-btn-bottom" <?php echo !empty($btn_primary['target']) ? ' target="' . esc_attr($btn_primary['target']) . '"' : ''; ?>>
                            <span><?php echo esc_html($btn_primary['title']); ?></span>
                            <span class="cosy-arrow">&rarr;</span>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($btn_secondary['url']) && !empty($btn_secondary['title'])) : ?>
                        <a href="<?php echo esc_url($btn_secondary['url']); ?>" class="cosy-seo-btn-bottom cosy-seo-btn-outline" <?php echo !empty($btn_secondary['target']) ? ' target="' . esc_attr($btn_secondary['target']) . '"' : ''; ?>>
                            <span><?php echo esc_html($btn_secondary['title']); ?></span>
                            <span class="cosy-arrow">&rarr;</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            $other_services = get_posts([
                'post_type'      => 'cosy_service',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order title',
                'order'          => 'ASC',
            ]);
            if (!empty($other_services)) : ?>
                <section class="cosy-seo-related-section" aria-label="<?php esc_attr_e('Explore Parenting Support Areas', 'cosychats'); ?>">
                    <h3 class="cosy-seo-related-title"><?php esc_html_e('Explore More Parenting Support Areas', 'cosychats'); ?></h3>
                    <div class="cosy-seo-category-chips">
                        <?php foreach ($other_services as $srv) : ?>
                            <a href="<?php echo esc_url(home_url('/service-provider/' . $srv->post_name . '/')); ?>" class="cosy-seo-chip">
                                <i class="fa-solid fa-users" aria-hidden="true"></i>
                                <span><?php echo esc_html($srv->post_title); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
        </article>

    </div>

</main>

<?php
get_footer();
