<?php
/**
 * Template Name: FAQs
 *
 * The template for displaying Frequently Asked Questions.
 *
 * @package Cosychats
 */

get_header();
?>

<main class="site-main cosy-faq-page">
    <!-- Main FAQs Section -->
    <section class="cosy-faq-main">
        <?php
        $faq_title = function_exists('get_field') ? get_field('cosy_faq_title') : '';
        if (empty($faq_title)) {
            $faq_title = get_the_title();
        }
        if (empty($faq_title)) {
            $faq_title = __('Frequently Asked Questions', 'cosychats');
        }
        ?>
        <h1 class="cosy-faq-title text-center"><?php echo esc_html($faq_title); ?></h1>

        <div class="cosy-faq-container">
            <?php if (function_exists('have_rows') && have_rows('cosy_faqs')) : ?>
                <?php while (have_rows('cosy_faqs')) : the_row();
                    $question = get_sub_field('cosy_ques');
                    $answer   = get_sub_field('cosy_ans');
                ?>
                    <?php if (!empty($question)) : ?>
                        <div class="cosy-faq-item">
                            <div class="cosy-faq-question">
                                <span><?php echo esc_html($question); ?></span>
                                <span class="cosy-faq-toggle-icon">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="cosy-faq-answer">
                                <?php echo wp_kses_post($answer); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>

        <!-- Contact Box -->
        <div class="cosy-faq-contact-card">
            <h3><?php esc_html_e('Have More Questions?', 'cosychats'); ?></h3>
            <p><?php esc_html_e('Our team is always here to help you. Reach out to us anytime for personal guidance.', 'cosychats'); ?></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-contact">
                <i class="fas fa-paper-plane me-2"></i><?php esc_html_e('Contact Us', 'cosychats'); ?>
            </a>
        </div>
    </section>
</main>

<?php
get_footer();