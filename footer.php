<?php
/**
 * The template for displaying the footer
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
                    <p class="footer-about-text">
                        Private, one-to-one conversations between parents, built around shared lived experiences.
                    </p>
                </div>

                <!-- Column 2: Conversations -->
                <div class="footer-col">
                    <h4 class="footer-title">
                        <span>Conversations</span>
                    </h4>
                    <ul class="footer-links">
                        <li>
                            <a href="<?php echo esc_url(home_url('/ai-search/')); ?>">
                                Search
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/categories/')); ?>">
                                Browse by Category
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/gift-a-conversation/')); ?>">
                                Gift a Conversation <span class="cosy-featured-pill">⭐ Featured</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/share-your-experiences/')); ?>">
                                Become a CosyChats Parent
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Learn More -->
                <div class="footer-col">
                    <h4 class="footer-title">
                        <span>Learn More</span>
                    </h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/our-story/')); ?>">Our Story</a></li>
                        <li><a href="<?php echo esc_url(home_url('/how-it-works/')); ?>">How It Works</a></li>
                        <li><a href="<?php echo esc_url(home_url('/faqs/')); ?>">FAQs</a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact / Help</a></li>
                    </ul>
                </div>

                <!-- Column 4: Legal -->
                <div class="footer-col">
                    <h4 class="footer-title">
                        <span>Legal</span>
                    </h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/terms-and-conditions/')); ?>">Terms & Conditions</a></li>
                        <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo esc_url(home_url('/cookie-policy/')); ?>">Cookie Policy</a></li>
                        <li><a href="<?php echo esc_url(home_url('/refund-policy/')); ?>">Refund Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Cosychats.</p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
