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
$takeaways_heading = $page_data['takeaways_heading'];
$key_takeaways_list = $page_data['key_takeaways_list'];
$lived_experience_heading = $page_data['lived_experience_heading'];
$lived_experience_description = $page_data['lived_experience_description'];
$cta_title = $page_data['cta_title'];
$cta_sub_title = $page_data['cta_sub_title'];
$cta_highlight = $page_data['cta_highlight'];
$cta_button = $page_data['cta_button'];
$page_title = get_the_title();
$published_date = get_the_date('c');
$modified_date  = get_the_modified_date('c');
?>

<main id="primary" class="site-main cosy-seo-landing-root">

    <div class="cosy-seo-page-container">

        <!-- 1. Breadcrumbs Navigation: Home > Parenting Experiences > Title -->
        <nav class="cosy-seo-breadcrumbs" aria-label="<?php esc_attr_e('Breadcrumbs', 'cosychats'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo ('Home'); ?></a>
            <span class="separator">›</span>
            <a href="<?php echo esc_url(home_url('/service-provider/')); ?>"><?php echo $choose_experience->post_title; ?></a>
            <span class="separator">›</span>
            <span class="current" aria-current="page"><?php echo $page_title; ?></span>
        </nav>

        <!-- 2. Category Pill Badge -->
        <div class="cosy-seo-badge-wrap">
            <span class="cosy-seo-hero-badge"><?php echo $choose_experience->post_title; ?></span>
        </div>

        <!-- 3. Article Main Heading -->
        <h1 class="cosy-seo-article-title"><?php echo $page_title; ?></h1>

        <!-- 4. Editorial Article Area with Text Wrap Around Featured Image & Insert -->
        <article class="cosy-seo-article-body">

            <!-- Featured Image with Parent Name underneath -->
            <div class="cosy-seo-featured-media-box">
                <div class="cosy-seo-img-holder">
                    <?php if (!empty(has_post_thumbnail())) : ?>
                        <?php the_post_thumbnail('large', ['alt' => esc_attr($page_title), 'class' => 'cosy-seo-main-photo']); ?>
                    <?php endif; ?>
                </div>
                <div class="cosy-seo-parent-caption">
                    <span class="cosy-seo-caption-text">Sarah - CosyChats Parent</span>
                </div>
            </div>

            <!-- Article Content Flow (Direct Editorial Content without Top Distraction) -->
            <div class="cosy-seo-content-flow">
                <?php the_content(); ?>
                <!-- Daily Strategies That Make a Real Difference -->
                <?php if (!empty($daily_strategies_heading)) : ?>
                    <h2><?php echo $daily_strategies_heading ?></h2>
                <?php endif; ?>
                <p><?php echo $strategy_sub_heading ?></p>
                <ul class="cosy-seo-strategies-list">
                    <?php if (!empty($daily_strategies_list)) : ?>
                        <?php foreach ($daily_strategies_list as $strategy) : ?>
                            <li><strong><?php echo $strategy['strategies_title'] ?>:</strong> <?php echo $strategy['strategies_description'] ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <!-- Key Takeaways & What to Expect Card -->
                <?php if (!empty($key_takeaways_list)) : ?>
                    <div class="cosy-seo-takeaways-card">
                        <div class="cosy-seo-takeaways-header">
                            <i class="fa-regular fa-lightbulb"></i>
                            <h4><?php echo $takeaways_heading ?></h4>
                        </div>
                        <ul class="cosy-seo-takeaways-list">
                            <?php if (!empty($key_takeaways_list)) : ?>
                                <?php foreach ($key_takeaways_list as $takeaway) : ?>
                                    <li><?php echo $takeaway['add_takeaway_point'] ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>


                <div class="cosy-seo-content-flow">
                    <!-- Why Speaking with a Lived-Experience Parent Matters -->
                    <?php if (!empty($lived_experience_heading)) : ?>
                        <h2><?php echo $lived_experience_heading ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($lived_experience_description)) : ?>
                        <?php echo $lived_experience_description ?>
                    <?php endif; ?>

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

        </article>

    </div>

</main>

<!-- Schema.org JSON-LD Structured Data for Google SEO Article -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": <?php echo wp_json_encode($page_title); ?>,
        "description": <?php echo wp_json_encode(!empty($strategy_sub_heading) ? $strategy_sub_heading : $page_title); ?>,
        "url": <?php echo wp_json_encode($page_url); ?>,
        "datePublished": <?php echo wp_json_encode($published_date); ?>,
        "dateModified": <?php echo wp_json_encode($modified_date); ?>,
        "publisher": {
            "@type": "Organization",
            "name": "CosyChats",
            "url": <?php echo wp_json_encode(home_url('/')); ?>
        }
    }
</script>

<?php
get_footer();
