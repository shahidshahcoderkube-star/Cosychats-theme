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
        $category_name = !empty($choose_experience->post_title) ? $choose_experience->post_title : '';
        $category_slug = !empty($choose_experience->post_name) ? $choose_experience->post_name : '';
        $category_url  = !empty($category_slug) ? home_url('/service-provider/' . $category_slug . '/') : '';
        ?>
        <!-- 1. Breadcrumbs Navigation: Home > Category > Title -->
        <nav class="cosy-seo-breadcrumbs" aria-label="<?php esc_attr_e('Breadcrumbs', 'cosychats'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'cosychats'); ?></a>
            <?php if (!empty($category_name) && !empty($category_url)) : ?>
                <span class="separator">›</span>
                <a href="<?php echo esc_url($category_url); ?>"><?php echo esc_html($category_name); ?></a>
            <?php endif; ?>
            <span class="separator">›</span>
            <span class="current" aria-current="page"><?php echo esc_html($page_title); ?></span>
        </nav>

        <!-- 2. Category Pill Badge -->
        <?php if (!empty($category_name) && !empty($category_url)) : ?>
            <div class="cosy-seo-badge-wrap">
                <a href="<?php echo esc_url($category_url); ?>" class="cosy-seo-hero-badge">
                    <?php echo esc_html($category_name); ?>
                </a>
            </div>
        <?php endif; ?>

        <!-- 3. Article Main Heading -->
        <h1 class="cosy-seo-article-title"><?php echo esc_html($page_title); ?></h1>

        <!-- 4. Editorial Article Area with Text Wrap Around Featured Image & Insert -->
        <article class="cosy-seo-article-body">

            <!-- Featured Image with Parent / Custom Caption underneath -->
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
                <?php
                // Check for custom caption from ACF or native WP post thumbnail caption
                $custom_caption = !empty($page_data['featured_image_caption'])
                    ? $page_data['featured_image_caption']
                    : (!empty($page_data['image_caption'])
                        ? $page_data['image_caption']
                        : get_the_post_thumbnail_caption());

                // If no custom caption entered, fallback to user firstname if available
                if (empty($custom_caption) && !empty($experience_user['user_firstname'])) {
                    $custom_caption = ucfirst(trim($experience_user['user_firstname']));
                }
                ?>
                <?php if (!empty($custom_caption)) : ?>
                    <div class="cosy-seo-parent-caption">
                        <span class="cosy-seo-caption-text"><?php echo esc_html($custom_caption); ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Article Content Flow (Direct Editorial Content without Top Distraction) -->
            <div class="cosy-seo-content-flow">
                <?php the_content(); ?>

                <!-- Daily Strategies That Make a Real Difference -->
                <?php if (!empty($daily_strategies_heading)) : ?>
                    <h2><?php echo esc_html($daily_strategies_heading); ?></h2>
                <?php endif; ?>
                <?php if (!empty($strategy_sub_heading)) : ?>
                    <p><?php echo esc_html($strategy_sub_heading); ?></p>
                <?php endif; ?>
                <?php if (!empty($daily_strategies_list)) : ?>
                    <ul class="cosy-seo-strategies-list">
                        <?php foreach ($daily_strategies_list as $strategy) : ?>
                            <?php
                            $strat_title = $strategy['strategies_title'] ?? '';
                            $strat_desc  = $strategy['strategies_description'] ?? '';
                            if (!empty($strat_title) || !empty($strat_desc)) :
                            ?>
                                <li>
                                    <?php if (!empty($strat_title)) : ?>
                                        <strong><?php echo esc_html($strat_title); ?>:</strong>
                                    <?php endif; ?>
                                    <?php echo esc_html($strat_desc); ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <!-- Key Takeaways & What to Expect Card (Proper H3 Hierarchy) -->
                <?php if (!empty($expect_list) || !empty($expect_heading)) : ?>
                    <div class="cosy-seo-takeaways-card">
                        <?php if (!empty($expect_heading)) : ?>
                            <div class="cosy-seo-takeaways-header">
                                <h3><?php echo esc_html($expect_heading); ?></h3>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($expect_list)) : ?>
                            <ul class="cosy-seo-takeaways-list">
                                <?php foreach ($expect_list as $expect) : ?>
                                    <?php if (!empty($expect['add_expect_point'])) : ?>
                                        <li><?php echo esc_html($expect['add_expect_point']); ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
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
                <?php if (!empty($support_title) || !empty($support_description)) : ?>
                    <div class="cosy-seo-trust-disclaimer">
                        <div class="cosy-seo-disclaimer-icon">
                            <i class="fa-solid fa-shield-heart" aria-hidden="true"></i>
                        </div>
                        <div class="cosy-seo-disclaimer-text">
                            <?php if (!empty($support_title)) : ?>
                                <strong><?php echo esc_html($support_title); ?></strong>
                            <?php endif; ?>
                            <?php if (!empty($support_description)) : ?>
                                <span><?php echo esc_html($support_description); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="cosy-seo-clear"></div>

            <!-- 5. End-of-Article Bottom CTA Box -->
            <?php
            $btn_primary   = !empty($cta_button[0]['button_name']) ? $cta_button[0]['button_name'] : null;
            $btn_secondary = !empty($cta_button[1]['button_name']) ? $cta_button[1]['button_name'] : null;
            $has_cta_content = !empty($cta_title) || !empty($cta_sub_title) || !empty($cta_highlight) || (!empty($btn_primary['url']) && !empty($btn_primary['title'])) || (!empty($btn_secondary['url']) && !empty($btn_secondary['title']));
            ?>
            <?php if ($has_cta_content) : ?>
                <div class="cosy-seo-bottom-article-cta">
                    <?php if (!empty($cta_title)) : ?>
                        <h3 class="cosy-seo-bottom-title"><?php echo esc_html($cta_title); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($cta_sub_title)) : ?>
                        <p class="cosy-seo-bottom-desc"><?php echo esc_html($cta_sub_title); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($cta_highlight)) : ?>
                        <p class="cosy-seo-bottom-highlight"><?php echo esc_html($cta_highlight); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($btn_primary) || !empty($btn_secondary)) : ?>
                        <div class="cosy-seo-bottom-links">
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
                    <?php endif; ?>
                </div>
            <?php endif; ?>

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
