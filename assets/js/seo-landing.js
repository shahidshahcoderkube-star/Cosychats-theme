/**
 * Cosychats - SEO Landing Page Interactive Script
 * 
 * Manages FAQ accordion toggles, smooth scroll for in-page anchors, and micro-interactions.
 *
 * @package Cosychats
 */
document.addEventListener('DOMContentLoaded', function () {
    // 1. FAQ Accordion Toggle Interaction
    const faqQuestions = document.querySelectorAll('.cosy-seo-faq-question');

    faqQuestions.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const item = this.closest('.cosy-seo-faq-item');
            if (!item) return;

            const isOpen = item.classList.contains('active');

            // Close other items if you want a single-open accordion (optional, here we allow toggle)
            // Uncomment the following two lines if only one FAQ should stay open at a time:
            // document.querySelectorAll('.cosy-seo-faq-item.active').forEach(el => el.classList.remove('active'));

            if (isOpen) {
                item.classList.remove('active');
                this.setAttribute('aria-expanded', 'false');
            } else {
                item.classList.add('active');
                this.setAttribute('aria-expanded', 'true');
            }
        });
    });

    // 2. Smooth scrolling for internal anchor links (e.g. "#faq", "#cta")
    const anchorLinks = document.querySelectorAll('.cosy-seo-landing-root a[href^="#"]');
    anchorLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetEl = document.querySelector(targetId);
                if (targetEl) {
                    e.preventDefault();
                    targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });
});
