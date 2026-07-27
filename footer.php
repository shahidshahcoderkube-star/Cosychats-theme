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
                            <img src="http://localhost/cosyplugin/wp-content/uploads/2026/07/logo-1.png" alt="Cosy Chats Logo">
                        </a>
                    </div>
                    <p class="footer-about-text">
                        Conversations begin with shared experiences. Connecting parents with verified parents.
                    </p>
                </div>

                <!-- Column 2: Conversations -->
                <div class="footer-col">
                    <h4 class="footer-title">
                        <span>Conversations</span>
                    </h4>
                    <ul class="footer-links">
                        <li>
                            <a href="<?php echo esc_url(home_url('/gift-a-conversation/')); ?>">
                                Gift a Conversation <span class="cosy-featured-pill">⭐ Featured</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/share-your-experiences/')); ?>">
                                Share Your Experiences
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
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a></li>
                        <li><a href="<?php echo esc_url(home_url('/questions/')); ?>">Questions</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                    </ul>
                </div>

                <!-- Column 4: Legal -->
                <div class="footer-col">
                    <h4 class="footer-title">
                        <span>Legal</span>
                    </h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/conversation-guidelines/')); ?>">Conversation Guidelines</a></li>
                        <li><a href="<?php echo esc_url(home_url('/terms-and-conditions/')); ?>">Terms & Conditions</a></li>
                        <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo esc_url(home_url('/cookie-policy/')); ?>">Cookie Policy</a></li>
                        <li><a href="<?php echo esc_url(home_url('/refund-policy/')); ?>">Refund Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Cosychats. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
