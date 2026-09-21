<?php

/**
 * The template for displaying search results pages
 *
 * @package Cosychats
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

global $wp_query;
$search_query   = get_search_query();
$total_results  = $wp_query->found_posts;
?>

<main id="primary" class="site-main cosy-search-page">
    <div class="cosychats-container">

        <!-- Breadcrumb Navigation -->
        <nav class="cosy-search-breadcrumbs" aria-label="<?php esc_attr_e('Breadcrumbs', 'cosychats'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <i class="fas fa-home"></i> <?php esc_html_e('Home', 'cosychats'); ?>
            </a>
            <span class="cosy-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <span class="cosy-breadcrumb-current"><?php esc_html_e('Search Results', 'cosychats'); ?></span>
        </nav>

        <!-- Search Header Hero -->
        <section class="cosy-search-hero">
            <div class="cosy-search-badge">
                <i class="fas fa-search"></i> <?php esc_html_e('Site Search', 'cosychats'); ?>
            </div>

            <?php if (!empty($search_query)) : ?>
                <h1 class="cosy-search-title">
                    <?php
                    printf(
                        /* translators: %s: Search query string */
                        esc_html__('Search Results for: %s', 'cosychats'),
                        '<span class="cosy-query-highlight">&ldquo;' . esc_html($search_query) . '&rdquo;</span>'
                    );
                    ?>
                </h1>
                <p class="cosy-search-subtitle">
                    <?php
                    if ($total_results > 0) {
                        printf(
                            /* translators: %s: Number of results found */
                            _n('Found %s matching result', 'Found %s matching results', $total_results, 'cosychats'),
                            '<strong>' . esc_html(number_format_i18n($total_results)) . '</strong>'
                        );
                    } else {
                        esc_html_e('No matches found for your search query. Try refining your keywords below.', 'cosychats');
                    }
                    ?>
                </p>
            <?php else : ?>
                <h1 class="cosy-search-title"><?php esc_html_e('Search Cosychats', 'cosychats'); ?></h1>
                <p class="cosy-search-subtitle"><?php esc_html_e('Discover conversations, peer support services, and helpful articles.', 'cosychats'); ?></p>
            <?php endif; ?>

            <!-- Refined Search Form -->
            <div class="cosy-search-bar-wrapper">
                <?php get_search_form(); ?>
            </div>
        </section>

        <!-- Search Results Content Area -->
        <section class="cosy-search-content-section">
            <?php if (have_posts()) : ?>

                <!-- Normal WordPress Search Results List -->
                <div class="cosy-search-normal-list">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('cosy-search-normal-item'); ?>>
                            <header class="cosy-search-item-header">
                                <div class="cosy-search-item-meta">
                                    <span class="cosy-meta-type"><?php echo esc_html(ucfirst(get_post_type())); ?></span>
                                    <span class="cosy-meta-sep">&bull;</span>
                                    <span class="cosy-meta-date"><i class="far fa-calendar-alt"></i> <?php echo esc_html(get_the_date()); ?></span>
                                    <?php if (get_post_type() === 'post' && has_category()) : ?>
                                        <span class="cosy-meta-sep">&bull;</span>
                                        <span class="cosy-meta-cat"><i class="far fa-folder-open"></i> <?php the_category(', '); ?></span>
                                    <?php endif; ?>
                                </div>
                                <h2 class="entry-title cosy-search-item-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                            </header>

                            <div class="cosy-search-item-summary entry-summary">
                                <?php the_excerpt(); ?>
                            </div>

                            <footer class="cosy-search-item-footer">
                                <a href="<?php the_permalink(); ?>" class="cosy-search-readmore">
                                    <?php esc_html_e('Read More', 'cosychats'); ?> &rarr;
                                </a>
                            </footer>
                        </article>
                    <?php endwhile; ?>
                </div>

                <?php /*
                <!-- ==========================================================
                     CARD GRID LAYOUT (COMMENTED OUT AS REQUESTED)
                     ========================================================== -->
                <div class="cosy-search-results-grid">
                    <?php
                    while (have_posts()) : the_post();
                        $post_type_obj  = get_post_type_object(get_post_type());
                        $post_type_name = $post_type_obj ? $post_type_obj->labels->singular_name : ucfirst(get_post_type());
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('cosy-search-card'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="cosy-search-card-thumb">
                                    <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                                        <?php the_post_thumbnail('medium_large', array('class' => 'cosy-search-thumb-img', 'alt' => get_the_title())); ?>
                                    </a>
                                    <span class="cosy-search-type-tag"><?php echo esc_html($post_type_name); ?></span>
                                </div>
                            <?php else : ?>
                                <div class="cosy-search-card-thumb cosy-search-thumb-fallback">
                                    <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true" class="cosy-thumb-fallback-link">
                                        <i class="fas fa-file-alt"></i>
                                    </a>
                                    <span class="cosy-search-type-tag"><?php echo esc_html($post_type_name); ?></span>
                                </div>
                            <?php endif; ?>

                            <div class="cosy-search-card-body">
                                <div class="cosy-search-card-meta">
                                    <span class="cosy-meta-date">
                                        <i class="far fa-calendar-alt"></i> <?php echo esc_html(get_the_date()); ?>
                                    </span>
                                    <?php if (get_post_type() === 'post' && has_category()) : ?>
                                        <span class="cosy-meta-sep">&bull;</span>
                                        <span class="cosy-meta-category">
                                            <i class="far fa-folder-open"></i> <?php the_category(', '); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <h2 class="cosy-search-card-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <div class="cosy-search-card-excerpt">
                                    <?php
                                    $excerpt = get_the_excerpt();
                                    if (empty($excerpt)) {
                                        $excerpt = wp_strip_all_tags(get_the_content());
                                    }
                                    echo esc_html(wp_trim_words($excerpt, 24, '...'));
                                    ?>
                                </div>

                                <div class="cosy-search-card-footer">
                                    <a href="<?php the_permalink(); ?>" class="cosy-read-more-link">
                                        <span><?php esc_html_e('Read More', 'cosychats'); ?></span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <!-- END CARD GRID LAYOUT -->
                */ ?>

                <!-- Pagination -->
                <div class="cosy-search-pagination">
                    <?php
                    the_posts_pagination(array(
                        'mid_size'           => 2,
                        'prev_text'          => '<i class="fas fa-chevron-left"></i> <span>' . esc_html__('Previous', 'cosychats') . '</span>',
                        'next_text'          => '<span>' . esc_html__('Next', 'cosychats') . '</span> <i class="fas fa-chevron-right"></i>',
                        'screen_reader_text' => esc_html__('Search results navigation', 'cosychats'),
                    ));
                    ?>
                </div>

            <?php else : ?>

                <!-- Empty State / No Results Found -->
                <div class="cosy-search-no-results">
                    <div class="cosy-no-results-icon-wrap">
                        <i class="fas fa-search-minus"></i>
                    </div>

                    <h2 class="cosy-no-results-title">
                        <?php esc_html_e('No Matches Found', 'cosychats'); ?>
                    </h2>

                    <p class="cosy-no-results-desc">
                        <?php
                        if (!empty($search_query)) {
                            printf(
                                /* translators: %s: Search query string */
                                esc_html__('We could not find any results matching "%s". Please review the suggestions below to find what you are looking for.', 'cosychats'),
                                '<strong>' . esc_html($search_query) . '</strong>'
                            );
                        } else {
                            esc_html_e('Please enter a query in the search bar above to find conversations, articles, and services.', 'cosychats');
                        }
                        ?>
                    </p>

                    <div class="cosy-search-suggestions">
                        <h4 class="cosy-suggestions-heading">
                            <i class="fas fa-lightbulb"></i> <?php esc_html_e('Helpful Search Tips:', 'cosychats'); ?>
                        </h4>
                        <ul class="cosy-suggestions-list">
                            <li><i class="fas fa-check-circle"></i> <?php esc_html_e('Check that all words are spelled correctly.', 'cosychats'); ?></li>
                            <li><i class="fas fa-check-circle"></i> <?php esc_html_e('Try using fewer, simpler, or more general keywords.', 'cosychats'); ?></li>
                            <li><i class="fas fa-check-circle"></i> <?php esc_html_e('Try searching for related synonyms or broader topics.', 'cosychats'); ?></li>
                        </ul>
                    </div>

                    <div class="cosy-no-results-actions">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="cosy-btn-home">
                            <i class="fas fa-home"></i> <?php esc_html_e('Back to Home', 'cosychats'); ?>
                        </a>
                        <?php
                        $service_page = get_page_by_path('service-provider');
                        if ($service_page) :
                        ?>
                            <a href="<?php echo esc_url(get_permalink($service_page)); ?>" class="cosy-btn-secondary">
                                <i class="fas fa-compass"></i> <?php esc_html_e('Browse Services', 'cosychats'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endif; ?>
        </section>

    </div>
</main>

<?php
get_footer();
