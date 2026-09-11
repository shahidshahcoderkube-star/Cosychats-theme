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

$page_id        = get_the_ID();
$page_title     = get_the_title();
$page_url       = get_permalink();
$published_date = get_the_date('c');
$modified_date  = get_the_modified_date('c');

// Dynamic or fallback hero badge (No heart icon, default 'REAL-LIFE PARENTING')
$hero_badge = function_exists('get_field') ? get_field('seo_hero_badge', $page_id) : '';
if (empty($hero_badge)) {
    $hero_badge = __('REAL-LIFE PARENTING', 'cosychats');
}

// Parent Name on CosyChats (caption underneath top featured image)
$parent_name = function_exists('get_field') ? get_field('seo_parent_name', $page_id) : '';
if (empty($parent_name)) {
    $parent_name = function_exists('get_field') ? get_field('parent_name', $page_id) : '';
}
if (empty($parent_name)) {
    $thumbnail_id = get_post_thumbnail_id($page_id);
    if ($thumbnail_id) {
        $parent_name = wp_get_attachment_caption($thumbnail_id);
    }
}
if (empty($parent_name)) {
    $parent_name = __('Sarah - CosyChats Parent', 'cosychats');
}

// Links for Mid and Bottom CTAs
$cta_primary_url = function_exists('get_field') ? get_field('seo_cta_primary_url', $page_id) : '';
if (empty($cta_primary_url)) {
    $cta_primary_url = home_url('/service-provider/');
}

$cta_secondary_url = function_exists('get_field') ? get_field('seo_cta_secondary_url', $page_id) : '';
if (empty($cta_secondary_url)) {
    $cta_secondary_url = home_url('/how-it-works/');
}
?>

<main id="primary" class="site-main cosy-seo-landing-root">

    <div class="cosy-seo-page-container">

        <!-- 1. Breadcrumbs Navigation: Home > Parenting Experiences > Title -->
        <nav class="cosy-seo-breadcrumbs" aria-label="<?php esc_attr_e('Breadcrumbs', 'cosychats'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'cosychats'); ?></a>
            <span class="separator">›</span>
            <a href="<?php echo esc_url(home_url('/service-provider/')); ?>"><?php esc_html_e('Parenting Experiences', 'cosychats'); ?></a>
            <span class="separator">›</span>
            <span class="current" aria-current="page"><?php echo esc_html($page_title); ?></span>
        </nav>

        <!-- 2. Category Pill Badge (Clean, No Heart) -->
        <div class="cosy-seo-badge-wrap">
            <span class="cosy-seo-hero-badge">
                <?php echo esc_html($hero_badge); ?>
            </span>
        </div>

        <!-- 3. Article Main Heading -->
        <h1 class="cosy-seo-article-title"><?php echo esc_html($page_title); ?></h1>

        <!-- 4. Editorial Article Area with Text Wrap Around Featured Image & Insert -->
        <article class="cosy-seo-article-body">

            <!-- Featured Image with Parent Name underneath -->
            <div class="cosy-seo-featured-media-box">
                <div class="cosy-seo-img-holder">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', ['alt' => esc_attr($page_title), 'class' => 'cosy-seo-main-photo']); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/parent-support-hero.jpg'); ?>" alt="<?php echo esc_attr($page_title); ?>" class="cosy-seo-main-photo">
                    <?php endif; ?>
                </div>
                <?php if (!empty($parent_name)) : ?>
                    <div class="cosy-seo-parent-caption">
                        <span class="cosy-seo-caption-text"><?php echo esc_html($parent_name); ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Article Content Flow (Direct Editorial Content without Top Distraction) -->
            <div class="cosy-seo-content-flow">
                <?php
                while (have_posts()) :
                    the_post();
                    $raw_content = get_the_content();

                    if (!empty(trim($raw_content))) {
                        the_content();
                    } else {
                ?>
                        <p class="cosy-seo-lead-paragraph">
                            <?php esc_html_e('Every parenting journey is unique, bringing both memorable joys and distinct daily challenges. Having access to genuine, lived experience can make all the difference when navigating new stages or family milestones.', 'cosychats'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('When a child faces unexpected challenges or emotional hurdles, parents often find themselves navigating a steep learning curve. From understanding early behaviours and school feedback to managing daily routines at home, it can sometimes feel overwhelming and isolating.', 'cosychats'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Medical manuals and generic parenting advice can give clinical facts, but nothing replaces hearing directly from someone who has been there. Real conversations with other parents provide practical strategies, emotional clarity, and the reassurance that you are not alone.', 'cosychats'); ?>
                        </p>

                        <!-- Mid-Article Wrap-Around Insert (About CosyChats) -->
                        <div class="cosy-seo-mid-insert">
                            <h4 class="cosy-seo-insert-heading"><?php esc_html_e('About CosyChats', 'cosychats'); ?></h4>
                            <p class="cosy-seo-insert-desc"><?php esc_html_e('Real parenting experiences, shared.', 'cosychats'); ?></p>
                            <div class="cosy-seo-insert-links">
                                <a href="<?php echo esc_url($cta_primary_url); ?>" class="cosy-seo-insert-link">
                                    <span><?php esc_html_e('Find a parent', 'cosychats'); ?></span>
                                    <span class="cosy-arrow">&rarr;</span>
                                </a>
                                <a href="<?php echo esc_url($cta_secondary_url); ?>" class="cosy-seo-insert-link">
                                    <span><?php esc_html_e('How it works', 'cosychats'); ?></span>
                                    <span class="cosy-arrow">&rarr;</span>
                                </a>
                            </div>
                        </div>

                        <p>
                            <?php esc_html_e('Finding positive ways forward starts with small, actionable adjustments. Many parents find success by observing triggers, creating predictable daily environments, and breaking down communication into simple, supportive interactions.', 'cosychats'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Collaborating closely with teachers and SENCO staff also ensures that strategies used at home are reinforced in the classroom. When both school and family work together with consistent expectations, children feel more secure, confident, and understood.', 'cosychats'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Most importantly, taking care of your own emotional wellbeing as a parent is vital. Giving yourself grace, speaking openly with peers who understand, and celebrating small everyday wins helps build long-term family resilience.', 'cosychats'); ?>
                        </p>

                        <!-- Key Takeaways & What to Expect Card -->
                        <div class="cosy-seo-takeaways-card">
                            <div class="cosy-seo-takeaways-header">
                                <i class="fa-regular fa-lightbulb"></i>
                                <h4><?php esc_html_e('Key Takeaways & What to Expect', 'cosychats'); ?></h4>
                            </div>
                            <ul class="cosy-seo-takeaways-list">
                                <li><?php esc_html_e('Direct, compassionate advice tailored to your family situation.', 'cosychats'); ?></li>
                                <li><?php esc_html_e('Judgment-free environment focused on practical, positive strategies.', 'cosychats'); ?></li>
                                <li><?php esc_html_e('Flexible booking with no long-term contracts required.', 'cosychats'); ?></li>
                            </ul>
                        </div>
                    <?php
                    }
                endwhile;
                ?>
            </div>

            <div class="cosy-seo-clear"></div>

            <!-- 5. End-of-Article Bottom CTA Box -->
            <div class="cosy-seo-bottom-article-cta">
                <h3 class="cosy-seo-bottom-title"><?php esc_html_e('Real parenting experiences don\'t end with this article', 'cosychats'); ?></h3>
                <p class="cosy-seo-bottom-desc"><?php esc_html_e('Parents on CosyChats have chosen to share their lives and experiences. Find someone you\'d like to talk to.', 'cosychats'); ?></p>
                <p class="cosy-seo-bottom-highlight"><?php esc_html_e('One-to-one conversations based on shared lived experience.', 'cosychats'); ?></p>
                <div class="cosy-seo-bottom-links">
                    <a href="<?php echo esc_url($cta_primary_url); ?>" class="cosy-seo-btn-bottom">
                        <span><?php esc_html_e('Find a parent', 'cosychats'); ?></span>
                        <span class="cosy-arrow">&rarr;</span>
                    </a>
                    <a href="<?php echo esc_url($cta_secondary_url); ?>" class="cosy-seo-btn-bottom cosy-seo-btn-outline">
                        <span><?php esc_html_e('How CosyChats works', 'cosychats'); ?></span>
                        <span class="cosy-arrow">&rarr;</span>
                    </a>
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
    "headline": "<?php echo esc_js($page_title); ?>",
    "description": "<?php echo esc_js(wp_strip_all_tags(get_the_excerpt() ?: $page_title)); ?>",
    "url": "<?php echo esc_url($page_url); ?>",
    "datePublished": "<?php echo esc_js($published_date); ?>",
    "dateModified": "<?php echo esc_js($modified_date); ?>",
    "publisher": {
        "@type": "Organization",
        "name": "CosyChats",
        "url": "<?php echo esc_url(home_url('/')); ?>"
    }
}
</script>

<?php
get_footer();
