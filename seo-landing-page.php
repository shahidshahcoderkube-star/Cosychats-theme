<?php

/**
 * Template Name: SEO Landing Page
 *
 * Reusable Global Page Template for SEO-optimized articles, topic guides, and landing pages ("SEO Nets").
 * Features high-conversion CTAs, trust badges, rich editorial formatting, FAQ accordion, and Schema.org markup.
 *
 * @package Cosychats
 */

get_header();

// Fetch post data
$page_id          = get_the_ID();
$page_title       = get_the_title();
$page_url         = get_permalink();
$published_date   = get_the_date('c');
$modified_date    = get_the_modified_date('c');

// Dynamic or fallback hero badge
$hero_badge = function_exists('get_field') ? get_field('seo_hero_badge', $page_id) : '';
if (empty($hero_badge)) {
    $hero_badge = __('Parent Support & Guidance', 'cosychats');
}

// Subtitle (From ACF field or Post Excerpt or sensible default)
$hero_subtitle = function_exists('get_field') ? get_field('seo_hero_subtitle', $page_id) : '';
if (empty($hero_subtitle) && has_excerpt()) {
    $hero_subtitle = get_the_excerpt();
}
if (empty($hero_subtitle)) {
    $hero_subtitle = __('Navigate challenges and discover practical, reassuring advice through compassionate 1-on-1 conversations with verified parents who have walked the same path.', 'cosychats');
}

// CTA Settings
$cta_primary_text = function_exists('get_field') ? get_field('seo_cta_primary_text', $page_id) : '';
if (empty($cta_primary_text)) {
    $cta_primary_text = __('Book a Conversation', 'cosychats');
}

$cta_primary_url = function_exists('get_field') ? get_field('seo_cta_primary_url', $page_id) : '';
if (empty($cta_primary_url)) {
    $cta_primary_url = home_url('/service-provider/');
}

$cta_secondary_text = function_exists('get_field') ? get_field('seo_cta_secondary_text', $page_id) : '';
if (empty($cta_secondary_text)) {
    $cta_secondary_text = __('How It Works', 'cosychats');
}

$cta_secondary_url = function_exists('get_field') ? get_field('seo_cta_secondary_url', $page_id) : '';
if (empty($cta_secondary_url)) {
    $cta_secondary_url = home_url('/how-it-works/');
}

// Bottom Banner Content
$bottom_cta_title = function_exists('get_field') ? get_field('seo_bottom_cta_title', $page_id) : '';
if (empty($bottom_cta_title)) {
    $bottom_cta_title = __('Ready for compassionate support on your parenting journey?', 'cosychats');
}

$bottom_cta_subtitle = function_exists('get_field') ? get_field('seo_bottom_cta_subtitle', $page_id) : '';
if (empty($bottom_cta_subtitle)) {
    $bottom_cta_subtitle = __('Connect 1-on-1 with a verified parent who truly understands. Flexible 10-minute sessions at your convenience.', 'cosychats');
}

$bottom_cta_btn_text = function_exists('get_field') ? get_field('seo_bottom_cta_btn_text', $page_id) : '';
if (empty($bottom_cta_btn_text)) {
    $bottom_cta_btn_text = __('Book a Conversation', 'cosychats');
}

// Alternating Features (Zig-Zag) Content
$zigzag_img_1 = function_exists('get_field') ? get_field('seo_zigzag_image_1', $page_id) : '';
if (empty($zigzag_img_1)) {
    $zigzag_img_1 = get_template_directory_uri() . '/assets/images/parent-advice-story.jpg';
}
$zigzag_badge_1 = function_exists('get_field') ? get_field('seo_zigzag_badge_1', $page_id) : '';
if (empty($zigzag_badge_1)) {
    $zigzag_badge_1 = __('Real Lived Experience', 'cosychats');
}
$zigzag_title_1 = function_exists('get_field') ? get_field('seo_zigzag_title_1', $page_id) : '';
if (empty($zigzag_title_1)) {
    $zigzag_title_1 = __('Practical Wisdom from Parents Who Have Truly Been There', 'cosychats');
}
$zigzag_text_1 = function_exists('get_field') ? get_field('seo_zigzag_text_1', $page_id) : '';
if (empty($zigzag_text_1)) {
    $zigzag_text_1 = __('Medical descriptions and parenting manuals are helpful, but nothing compares to speaking with someone who has actually lived through the same emotional milestones, school routines, and daily triumphs. Get practical, reassuring strategies you can immediately use.', 'cosychats');
}

$zigzag_img_2 = function_exists('get_field') ? get_field('seo_zigzag_image_2', $page_id) : '';
if (empty($zigzag_img_2)) {
    $zigzag_img_2 = get_template_directory_uri() . '/assets/images/parent-flexible-chat.jpg';
}
$zigzag_badge_2 = function_exists('get_field') ? get_field('seo_zigzag_badge_2', $page_id) : '';
if (empty($zigzag_badge_2)) {
    $zigzag_badge_2 = __('Flexible & Confidential', 'cosychats');
}
$zigzag_title_2 = function_exists('get_field') ? get_field('seo_zigzag_title_2', $page_id) : '';
if (empty($zigzag_title_2)) {
    $zigzag_title_2 = __('Support on Your Schedule in 10-Minute Focused Blocks', 'cosychats');
}
$zigzag_text_2 = function_exists('get_field') ? get_field('seo_zigzag_text_2', $page_id) : '';
if (empty($zigzag_text_2)) {
    $zigzag_text_2 = __('Parenting days are unpredictable and busy. CosyChats is designed around your real life with simple 10-minute slot blocks. Jump into a confidential audio or video chat during naptime or evening downtime without any long-term subscriptions.', 'cosychats');
}

// FAQs Collection (For Display and Schema.org JSON-LD generation)
$faqs_list = [];

// 1. Check custom ACF 'seo_faqs' repeater on this page
if (function_exists('have_rows') && have_rows('seo_faqs', $page_id)) {
    while (have_rows('seo_faqs', $page_id)) {
        the_row();
        $q = get_sub_field('question');
        $a = get_sub_field('answer');
        if (!empty($q) && !empty($a)) {
            $faqs_list[] = ['question' => $q, 'answer' => $a];
        }
    }
}

// 2. Check general ACF 'cosy_faqs' repeater on this page
if (empty($faqs_list) && function_exists('have_rows') && have_rows('cosy_faqs', $page_id)) {
    while (have_rows('cosy_faqs', $page_id)) {
        the_row();
        $q = get_sub_field('cosy_ques');
        $a = get_sub_field('cosy_ans');
        if (!empty($q) && !empty($a)) {
            $faqs_list[] = ['question' => $q, 'answer' => $a];
        }
    }
}

// 3. Sensible defaults tailored to parenting consultation if page author hasn't added custom ones
if (empty($faqs_list)) {
    $faqs_list = [
        [
            'question' => __('How do 1-on-1 parenting conversations work on CosyChats?', 'cosychats'),
            'answer'   => __('You can browse verified parents by experience or topic, choose a convenient date and 10-minute time slot block, and book a secure conversation instantly.', 'cosychats')
        ],
        [
            'question' => __('Are the parent guides verified?', 'cosychats'),
            'answer'   => __('Yes. All parent guides on CosyChats undergo a verification process to ensure authentic, empathetic, and respectful peer support.', 'cosychats')
        ],
        [
            'question' => __('Is my session private and confidential?', 'cosychats'),
            'answer'   => __('Absolutely. All consultations and profile interactions are kept strictly confidential and secure, giving you a safe space to discuss parenting questions freely.', 'cosychats')
        ],
        [
            'question' => __('Can I book recurring sessions or gift a chat to someone else?', 'cosychats'),
            'answer'   => __('Yes! You can choose multi-week recurring plans during checkout, or check the "Gift a Conversation" option to book support for a partner, family member, or friend.', 'cosychats')
        ]
    ];
}
?>

<main id="primary" class="site-main cosy-seo-landing-root">

    <!-- 1. HERO SECTION -->
    <section class="cosy-seo-hero">
        <div class="cosy-seo-hero-container">

            <!-- Breadcrumbs Navigation -->
            <nav class="cosy-seo-breadcrumbs" aria-label="<?php esc_attr_e('Breadcrumbs', 'cosychats'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'cosychats'); ?></a>
                <span class="separator">›</span>
                <a href="<?php echo esc_url(home_url('/service-provider/')); ?>"><?php esc_html_e('Parenting Guides', 'cosychats'); ?></a>
                <span class="separator">›</span>
                <span class="current" aria-current="page"><?php echo esc_html($page_title); ?></span>
            </nav>

            <!-- Hero Layout Grid -->
            <div class="cosy-seo-hero-grid">
                <div class="cosy-seo-hero-content">
                    <span class="cosy-seo-hero-badge">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                        <span><?php echo esc_html($hero_badge); ?></span>
                    </span>

                    <h1 class="cosy-seo-hero-title"><?php echo esc_html($page_title); ?></h1>

                    <p class="cosy-seo-hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>

                    <div class="cosy-seo-hero-actions">
                        <a href="<?php echo esc_url($cta_primary_url); ?>" class="cosy-seo-btn-primary">
                            <span><?php echo esc_html($cta_primary_text); ?></span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>

                        <?php if (!empty($cta_secondary_text)) : ?>
                            <a href="<?php echo esc_url($cta_secondary_url); ?>" class="cosy-seo-btn-secondary">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                                <span><?php echo esc_html($cta_secondary_text); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="cosy-seo-hero-media">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', ['alt' => esc_attr($page_title)]); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/parent-support-hero.jpg'); ?>" alt="<?php echo esc_attr($page_title); ?>">
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>

    <!-- 2. TRUST HIGHLIGHTS STRIP -->
    <section class="cosy-seo-trust-strip-wrapper" aria-label="<?php esc_attr_e('Why Choose CosyChats', 'cosychats'); ?>">
        <div class="cosy-seo-trust-strip">
            <div class="cosy-seo-trust-item">
                <div class="cosy-seo-trust-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <div class="cosy-seo-trust-info">
                    <strong><?php esc_html_e('Verified Parents', 'cosychats'); ?></strong>
                    <span><?php esc_html_e('100+ Vetted guides with real experience', 'cosychats'); ?></span>
                </div>
            </div>

            <div class="cosy-seo-trust-item">
                <div class="cosy-seo-trust-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
                <div class="cosy-seo-trust-info">
                    <strong><?php esc_html_e('100% Confidential', 'cosychats'); ?></strong>
                    <span><?php esc_html_e('Private, secure, and respectful space', 'cosychats'); ?></span>
                </div>
            </div>

            <div class="cosy-seo-trust-item">
                <div class="cosy-seo-trust-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <div class="cosy-seo-trust-info">
                    <strong><?php esc_html_e('10-Min Slot Blocks', 'cosychats'); ?></strong>
                    <span><?php esc_html_e('Affordable & flexible time commitments', 'cosychats'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. MAIN EDITORIAL CONTENT -->
    <section class="cosy-seo-main-container">
        <article class="cosy-seo-content-article">
            <?php
            while (have_posts()) :
                the_post();

                // If content is empty or short, show helpful guide starter
                $raw_content = get_the_content();
                if (!empty(trim($raw_content))) {
                    the_content();
                } else {
            ?>
                    <h2><?php printf(esc_html__('Understanding %s', 'cosychats'), esc_html($page_title)); ?></h2>
                    <p>
                        <?php esc_html_e('Every parenting journey is unique, bringing both memorable joys and distinct daily challenges. Having access to genuine, lived experience can make all the difference when navigating new stages or family milestones.', 'cosychats'); ?>
                    </p>
                    <p>
                        <?php esc_html_e('At CosyChats, we connect you directly with experienced, verified parents who have navigated similar situations. Whether you need reassurance, practical day-to-day tips, or simply an understanding ear, a dedicated 1-on-1 conversation gives you personalized support.', 'cosychats'); ?>
                    </p>

                    <!-- Key Takeaways Highlight Box -->
                    <div class="cosy-seo-takeaways-card">
                        <div class="cosy-seo-takeaways-header">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="9" y1="18" x2="15" y2="18"></line>
                                <line x1="10" y1="22" x2="14" y2="22"></line>
                                <path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5.76.76 1.23 1.52 1.41 2.5"></path>
                            </svg>
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
        </article>
    </section>

    <!-- 4. HIGHLIGHT FEATURES / STORY (ZIG-ZAG: Image | Content & Content | Image) -->
    <section class="cosy-seo-zigzag-section" aria-label="<?php esc_attr_e('Why Connect with a Parent', 'cosychats'); ?>">
        <div class="cosy-seo-zigzag-container">

            <!-- Row 1: Image Left | Content Right -->
            <div class="cosy-seo-zigzag-row">
                <div class="cosy-seo-zigzag-media">
                    <img src="<?php echo esc_url($zigzag_img_1); ?>" alt="<?php echo esc_attr($zigzag_title_1); ?>" loading="lazy">
                </div>
                <div class="cosy-seo-zigzag-content">
                    <span class="cosy-seo-zigzag-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span><?php echo esc_html($zigzag_badge_1); ?></span>
                    </span>
                    <h3><?php echo esc_html($zigzag_title_1); ?></h3>
                    <p><?php echo esc_html($zigzag_text_1); ?></p>
                    <ul class="cosy-seo-zigzag-checklist">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span><?php esc_html_e('Real-world strategies tailored to your family’s unique situation', 'cosychats'); ?></span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span><?php esc_html_e('Judgment-free environment where you can ask anything openly', 'cosychats'); ?></span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span><?php esc_html_e('Instant emotional reassurance and renewed daily confidence', 'cosychats'); ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Row 2: Content Left | Image Right -->
            <div class="cosy-seo-zigzag-row cosy-seo-row-reverse">
                <div class="cosy-seo-zigzag-content">
                    <span class="cosy-seo-zigzag-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span><?php echo esc_html($zigzag_badge_2); ?></span>
                    </span>
                    <h3><?php echo esc_html($zigzag_title_2); ?></h3>
                    <p><?php echo esc_html($zigzag_text_2); ?></p>
                    <ul class="cosy-seo-zigzag-checklist">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span><?php esc_html_e('Affordable 10-minute micro-sessions you can book anytime', 'cosychats'); ?></span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span><?php esc_html_e('100% private, safe, and confidential peer-to-peer connection', 'cosychats'); ?></span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span><?php esc_html_e('Choose verified parents by specific topic or lived experience', 'cosychats'); ?></span>
                        </li>
                    </ul>
                </div>
                <div class="cosy-seo-zigzag-media">
                    <img src="<?php echo esc_url($zigzag_img_2); ?>" alt="<?php echo esc_attr($zigzag_title_2); ?>" loading="lazy">
                </div>
            </div>

        </div>
    </section>

    <!-- 5. INTERACTIVE FAQ ACCORDION & BOTTOM CTA -->
    <section class="cosy-seo-main-container cosy-seo-bottom-wrapper">
        <!-- FAQ Accordion -->
        <?php if (!empty($faqs_list)) : ?>
            <section class="cosy-seo-faq-section" id="faqSection">
                <div class="cosy-seo-faq-header">
                    <h2><?php esc_html_e('Frequently Asked Questions', 'cosychats'); ?></h2>
                    <p><?php esc_html_e('Common questions and helpful answers about our parenting conversations.', 'cosychats'); ?></p>
                </div>

                <div class="cosy-seo-faq-container">
                    <?php foreach ($faqs_list as $index => $faq) : ?>
                        <div class="cosy-seo-faq-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="cosy-seo-faq-question" role="button" tabindex="0" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                <span><?php echo esc_html($faq['question']); ?></span>
                                <span class="cosy-seo-faq-toggle-icon">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="cosy-seo-faq-answer">
                                <p><?php echo wp_kses_post($faq['answer']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <!-- 5. BOTTOM CONVERSION BANNER -->
        <section class="cosy-seo-bottom-banner" aria-label="<?php esc_attr_e('Call to Action', 'cosychats'); ?>">
            <div class="cosy-seo-bottom-text">
                <h3><?php echo esc_html($bottom_cta_title); ?></h3>
                <p><?php echo esc_html($bottom_cta_subtitle); ?></p>
            </div>
            <div class="cosy-seo-bottom-actions">
                <a href="<?php echo esc_url($cta_primary_url); ?>" class="cosy-seo-btn-primary">
                    <span><?php echo esc_html($bottom_cta_btn_text); ?></span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </section>

    </section>

</main>

<!-- 6. SCHEMA.ORG JSON-LD STRUCTURED DATA FOR GOOGLE SEO -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [{
                "@type": "Article",
                "@id": "<?php echo esc_url($page_url); ?>#article",
                "isPartOf": {
                    "@type": "WebPage",
                    "@id": "<?php echo esc_url($page_url); ?>"
                },
                "headline": "<?php echo esc_js($page_title); ?>",
                "description": "<?php echo esc_js($hero_subtitle); ?>",
                "url": "<?php echo esc_url($page_url); ?>",
                "datePublished": "<?php echo esc_js($published_date); ?>",
                "dateModified": "<?php echo esc_js($modified_date); ?>",
                "publisher": {
                    "@type": "Organization",
                    "name": "CosyChats",
                    "url": "<?php echo esc_url(home_url('/')); ?>"
                }
            }
            <?php if (!empty($faqs_list)) : ?>,
                {
                    "@type": "FAQPage",
                    "@id": "<?php echo esc_url($page_url); ?>#faq",
                    "mainEntity": [
                        <?php
                        $faq_entities = [];
                        foreach ($faqs_list as $faq_item) {
                            $faq_entities[] = json_encode([
                                '@type'          => 'Question',
                                'name'           => $faq_item['question'],
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text'  => wp_strip_all_tags($faq_item['answer']),
                                ],
                            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                        }
                        echo implode(',', $faq_entities);
                        ?>
                    ]
                }
            <?php endif; ?>
        ]
    }
</script>

<?php
get_footer();
