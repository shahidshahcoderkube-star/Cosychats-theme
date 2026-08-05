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
        <h1 class="cosy-faq-title text-center"><?php esc_html_e('Frequently Asked Questions', 'cosychats'); ?></h1>

        <div class="cosy-faq-container">

            <!-- FAQ Item 1 -->
            <div class="cosy-faq-item">
                <div class="cosy-faq-question">
                    <span><?php esc_html_e('What is CosyChats?', 'cosychats'); ?></span>
                    <span class="cosy-faq-toggle-icon">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <div class="cosy-faq-answer">
                    <p><?php esc_html_e('CosyChats is an online platform where you can browse the profiles of parents who have chosen to share their own parenting and family-life experiences through private one-to-one video, phone or text conversations.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Each parent creates a profile describing their own parenting journey and family experiences, making it easier to find someone whose experiences feel relevant to your own.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('You choose who you\'d like to talk to and book a private one-to-one conversation based on sharing personal experiences and perspectives.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('CosyChats is for adults aged 18 and over. Conversations are based on lived experiences and are not counselling, therapy, coaching or professional advice.', 'cosychats'); ?></p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="cosy-faq-item">
                <div class="cosy-faq-question">
                    <span><?php esc_html_e('How do I use CosyChats?', 'cosychats'); ?></span>
                    <span class="cosy-faq-toggle-icon">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <div class="cosy-faq-answer">
                    <p><?php esc_html_e('Using CosyChats is simple.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Browse the profiles of parents and find someone whose parenting journey or family experiences feel relevant to your own.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Choose who you\'d like to talk to.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Book a one-to-one conversation.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Share your own experiences of parenting and family life by video, phone or text.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Every conversation is based on personal experiences and perspectives, not advice, guidance or professional services.', 'cosychats'); ?></p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="cosy-faq-item">
                <div class="cosy-faq-question">
                    <span>💝 <?php esc_html_e('Know someone who\'d appreciate a conversation?', 'cosychats'); ?></span>
                    <span class="cosy-faq-toggle-icon">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <div class="cosy-faq-answer">
                    <p><?php esc_html_e('Sometimes we want to do something thoughtful for someone we care about, but we also recognise that our own experiences may be different from theirs.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Booking a CosyChats conversation gives someone the opportunity to talk to a parent whose parenting journey or family experiences feel relevant to their own.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('It isn\'t about speaking on their behalf or suggesting what they should do. It\'s simply an opportunity for them to have a conversation with another parent and decide for themselves what they\'d like to talk about and what they\'d like to share.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Whether it\'s for a new parent, an adult son or daughter, another family member or a friend, booking a conversation can be a thoughtful way of introducing someone to a conversation they may value.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('The person receiving the booking remains in control of the conversation and what they choose to discuss.', 'cosychats'); ?></p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="cosy-faq-item">
                <div class="cosy-faq-question">
                    <span><?php esc_html_e('Who are the parents on CosyChats?', 'cosychats'); ?></span>
                    <span class="cosy-faq-toggle-icon">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <div class="cosy-faq-answer">
                    <p><?php esc_html_e('The parents you\'ll find on CosyChats come from many different backgrounds, parenting journeys and family experiences. They\'ve chosen to share those experiences through private one-to-one conversations with other parents.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('They join the platform as parents sharing their own lived experiences—not as professionals, experts or people providing a service. Some may have professional backgrounds, but every conversation is based on their own personal experiences of parenting and family life rather than advice, guidance or professional services.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Everyone applies to join and completes an onboarding process so they understand the platform\'s approach, the importance of sharing lived experiences, and the guidelines that help conversations remain respectful and centred on personal experience.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Where appropriate, we carry out identity checks as part of the onboarding process. Parents share their own personal experiences, which are not independently verified by the platform.', 'cosychats'); ?></p>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="cosy-faq-item">
                <div class="cosy-faq-question">
                    <span><?php esc_html_e('What happens in a CosyChat?', 'cosychats'); ?></span>
                    <span class="cosy-faq-toggle-icon">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <div class="cosy-faq-answer">
                    <p><?php esc_html_e('A CosyChat is a private one-to-one conversation where you and a parent on the platform share your own experiences of parenting and family life.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('You decide what you\'d like to talk about, whether that\'s a particular stage of parenting, a family experience, or the everyday realities of family life. Conversations take place by video, phone or text, depending on what you\'ve arranged together.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('To help keep conversations clear and respectful:', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Conversations are based on personal experiences and perspectives.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Parents do not provide advice, coaching, counselling, therapy or professional services.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Avoid sharing unnecessary personal, sensitive or financial information.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Treat one another with respect at all times.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Either person can end the conversation at any time.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Every family\'s journey is different. CosyChats is about sharing personal experiences and perspectives, not determining the "right" way to parent.', 'cosychats'); ?></p>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="cosy-faq-item">
                <div class="cosy-faq-question">
                    <span><?php esc_html_e('Are conversations private?', 'cosychats'); ?></span>
                    <span class="cosy-faq-toggle-icon">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <div class="cosy-faq-answer">
                    <p><?php esc_html_e('Yes. Conversations take place privately between you and the parent you\'ve chosen.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('To arrange your conversation, you\'ll need to exchange the contact details needed for your chosen conversation method, such as video, phone or text.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('To help protect your privacy:', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Only share the contact information needed to arrange your conversation.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Avoid sharing unnecessary personal, sensitive or financial information.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Conversations are not monitored or recorded by CosyChats.', 'cosychats'); ?></p>
                    <p>🌿 <?php esc_html_e('Payments are processed securely through Worldpay, a global payment provider. Payment details are entered on Worldpay\'s secure payment page and are not retained by CosyChats.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('If something concerns you, or your situation requires urgent or specialist support, please contact an appropriate service.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Conversations are intended to remain private between the people taking part. However, if a serious safeguarding concern is reported to us, we may share relevant information with the appropriate authorities where necessary.', 'cosychats'); ?></p>
                </div>
            </div>

            <!-- FAQ Item 7 -->
            <div class="cosy-faq-item">
                <div class="cosy-faq-question">
                    <span><?php esc_html_e('How do I book a conversation?', 'cosychats'); ?></span>
                    <span class="cosy-faq-toggle-icon">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <div class="cosy-faq-answer">
                    <p><?php esc_html_e('Once you\'ve chosen the parent you\'d like to talk to, booking your conversation is straightforward.', 'cosychats'); ?></p>
                    <p><strong><?php esc_html_e('Step 1 – Choose when you\'d like your conversations to start', 'cosychats'); ?></strong><br>
                    <?php esc_html_e('Select the date of your first conversation from the parent\'s available booking times.', 'cosychats'); ?></p>
                    <p><strong><?php esc_html_e('Step 2 – Choose the length of each conversation', 'cosychats'); ?></strong><br>
                    <?php esc_html_e('Select the duration of each conversation in 10-minute blocks. Each parent sets an hourly conversation fee, so the total cost is calculated according to the length of the conversations you book.', 'cosychats'); ?></p>
                    <p><strong><?php esc_html_e('Step 3 – Choose your conversation schedule', 'cosychats'); ?></strong><br>
                    <?php esc_html_e('Select the days you\'d like your conversations to take place from the parent\'s available schedule and choose how many weeks you\'d like your booking to continue. For example, you could book 30-minute conversations every Monday and Thursday for four weeks.', 'cosychats'); ?></p>
                    <p><strong><?php esc_html_e('Step 4 – Review and pay', 'cosychats'); ?></strong><br>
                    <?php esc_html_e('You\'ll see a summary of your booking schedule and the total cost before confirming your booking. Payments are processed securely by Worldpay, and your payment details are entered directly on Worldpay\'s secure payment page.', 'cosychats'); ?></p>
                    <p><strong><?php esc_html_e('Step 5 – Have your conversations', 'cosychats'); ?></strong><br>
                    <?php esc_html_e('Your booking is confirmed once payment has been completed. Conversations take place by video, phone or text, depending on the conversation method you\'ve chosen.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('If your plans change, booked conversations can be rearranged where both parents agree.', 'cosychats'); ?></p>
                </div>
            </div>

            <!-- FAQ Item 8 -->
            <div class="cosy-faq-item">
                <div class="cosy-faq-question">
                    <span><?php esc_html_e('Who handles my card details?', 'cosychats'); ?></span>
                    <span class="cosy-faq-toggle-icon">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <div class="cosy-faq-answer">
                    <p><?php esc_html_e('Payments are processed securely by Worldpay, a global payment provider.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('When you make a booking, your payment details are entered directly on Worldpay\'s secure payment page. CosyChats does not receive or retain your payment card details.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Once your payment has been processed, your booking is confirmed and you\'ll receive the information you need for your conversation.', 'cosychats'); ?></p>
                </div>
            </div>

            <!-- FAQ Item 9 -->
            <div class="cosy-faq-item">
                <div class="cosy-faq-question">
                    <span><?php esc_html_e('Could I join CosyChats as a parent?', 'cosychats'); ?></span>
                    <span class="cosy-faq-toggle-icon">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <div class="cosy-faq-answer">
                    <p><?php esc_html_e('We\'re always interested in hearing from parents who would like to share their own experiences of parenting and family life through one-to-one conversations with other parents.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Parents on CosyChats aren\'t experts or professionals providing a service. They\'re parents who believe in the value of sharing lived experiences openly, honestly and respectfully.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('If that sounds like you, we\'d love to hear from you.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('Every application is reviewed individually. As part of the joining process, you\'ll complete an application, create a profile and short introduction video, and have an informal conversation with us. This gives us an opportunity to explain how the platform works, discuss the guidelines, answer any questions, and make sure we\'re all comfortable that it\'s the right fit.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('If your application is successful, we\'ll guide you through the remaining onboarding process before your profile is published.', 'cosychats'); ?></p>
                    <p><?php esc_html_e('If you\'d like to find out more about joining CosyChats as a parent, please contact us at', 'cosychats'); ?> <a href="mailto:contact@cosychats.com"><strong>contact@cosychats.com</strong></a>.</p>
                </div>
            </div>

            <!-- FAQ Item 10 -->
            <div class="cosy-faq-item">
                <div class="cosy-faq-question">
                    <span><?php esc_html_e('Still have a question?', 'cosychats'); ?></span>
                    <span class="cosy-faq-toggle-icon">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <div class="cosy-faq-answer">
                    <p><?php esc_html_e('If you can\'t find the answer you\'re looking for, we\'d be happy to help. Please get in touch and we\'ll do our best to answer your question.', 'cosychats'); ?></p>
                </div>
            </div>

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