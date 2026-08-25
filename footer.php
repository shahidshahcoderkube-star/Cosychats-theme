<?php
/**
 * The template for displaying the footer
 *
 * Renders brand description, column titles, and repeater links exclusively
 * from ACF Options page fields.
 *
 * @package Cosychats
 */
?>
    </div><!-- #content -->

    <footer class="site-footer">
        <div class="cosychats-footer-container">
            <div class="footer-columns">
                <!-- Column 1: Brand Logo & Description -->
                <div class="footer-col footer-brand-col">
                    <div class="footer-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo cosychats_get_footer_logo_url(); ?>" alt="<?php bloginfo('name'); ?> Footer Logo">
                        </a>
                    </div>
                    <?php if (function_exists('get_field') && ($logo_desc = get_field('logo_description', 'option'))) : ?>
                        <p class="footer-about-text">
                            <?php echo esc_html($logo_desc); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Column 2: Conversations -->
                <?php if (function_exists('have_rows') && (have_rows('conversations_page', 'option') || get_field('conversations_title', 'option'))) : ?>
                    <div class="footer-col">
                        <?php if ($conv_title = get_field('conversations_title', 'option')) : ?>
                            <h4 class="footer-title">
                                <span><?php echo esc_html($conv_title); ?></span>
                            </h4>
                        <?php endif; ?>

                        <?php if (have_rows('conversations_page', 'option')) : ?>
                            <ul class="footer-links">
                                <?php while (have_rows('conversations_page', 'option')) : the_row();
                                    $link = get_sub_field('conversations_links');
                                    if (!empty($link)) :
                                        $raw_url     = is_array($link) ? ($link['url'] ?? '') : $link;
                                        $raw_url     = trim((string)$raw_url);
                                        $link_url    = !empty($raw_url) ? esc_url($raw_url) : 'javascript:void(0);';
                                        $link_title  = is_array($link) ? esc_html($link['title'] ?? '') : esc_html($link);
                                        $link_target = (is_array($link) && !empty($link['target'])) ? esc_attr($link['target']) : '_self';
                                ?>
                                    <li>
                                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                            <?php echo $link_title; ?>
                                            <?php if (strpos(strtolower($link_title), 'gift') !== false) : ?>
                                                <span class="cosy-featured-pill">⭐ Featured</span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endif; endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Column 3: Learn More -->
                <?php if (function_exists('have_rows') && (have_rows('learn_more_page', 'option') || get_field('learn_more_title', 'option'))) : ?>
                    <div class="footer-col">
                        <?php if ($lm_title = get_field('learn_more_title', 'option')) : ?>
                            <h4 class="footer-title">
                                <span><?php echo esc_html($lm_title); ?></span>
                            </h4>
                        <?php endif; ?>

                        <?php if (have_rows('learn_more_page', 'option')) : ?>
                            <ul class="footer-links">
                                <?php while (have_rows('learn_more_page', 'option')) : the_row();
                                    $link = get_sub_field('learn_more_links');
                                    if (!empty($link)) :
                                        $raw_url     = is_array($link) ? ($link['url'] ?? '') : $link;
                                        $raw_url     = trim((string)$raw_url);
                                        $link_url    = !empty($raw_url) ? esc_url($raw_url) : 'javascript:void(0);';
                                        $link_title  = is_array($link) ? esc_html($link['title'] ?? '') : esc_html($link);
                                        $link_target = (is_array($link) && !empty($link['target'])) ? esc_attr($link['target']) : '_self';
                                ?>
                                    <li>
                                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                            <?php echo $link_title; ?>
                                        </a>
                                    </li>
                                <?php endif; endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Column 4: Legal -->
                <?php if (function_exists('have_rows') && (have_rows('legal_page', 'option') || get_field('legal_title', 'option'))) : ?>
                    <div class="footer-col">
                        <?php if ($leg_title = get_field('legal_title', 'option')) : ?>
                            <h4 class="footer-title">
                                <span><?php echo esc_html($leg_title); ?></span>
                            </h4>
                        <?php endif; ?>

                        <?php if (have_rows('legal_page', 'option')) : ?>
                            <ul class="footer-links">
                                <?php while (have_rows('legal_page', 'option')) : the_row();
                                    $link = get_sub_field('legal_links');
                                    if (!empty($link)) :
                                        $raw_url     = is_array($link) ? ($link['url'] ?? '') : $link;
                                        $raw_url     = trim((string)$raw_url);
                                        $link_url    = !empty($raw_url) ? esc_url($raw_url) : 'javascript:void(0);';
                                        $link_title  = is_array($link) ? esc_html($link['title'] ?? '') : esc_html($link);
                                        $link_target = (is_array($link) && !empty($link['target'])) ? esc_attr($link['target']) : '_self';
                                ?>
                                    <li>
                                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                            <?php echo $link_title; ?>
                                        </a>
                                    </li>
                                <?php endif; endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Cosychats.</p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
