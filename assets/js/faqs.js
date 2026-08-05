/**
 * CosyChats - FAQs Page Interactive Script
 */
(function ($) {
    'use strict';

    $(document).ready(function () {
        // FAQ Accordion Toggle
        $('.cosy-faq-question').on('click', function () {
            var $parentItem = $(this).closest('.cosy-faq-item');
            var $answer = $parentItem.find('.cosy-faq-answer');

            // Check if current is already active
            if ($parentItem.hasClass('active')) {
                $answer.slideUp(250, function () {
                    $parentItem.removeClass('active');
                });
            } else {
                // Optionally close other active FAQs
                $('.cosy-faq-item.active').find('.cosy-faq-answer').slideUp(250, function () {
                    $(this).closest('.cosy-faq-item').removeClass('active');
                });

                $answer.slideDown(300, function () {
                    $parentItem.addClass('active');
                });
            }
        });

        // FAQ Live Filter/Search
        $('#faqSearchInput').on('keyup input', function () {
            var searchTerm = $(this).val().toLowerCase().trim();

            if (searchTerm === '') {
                $('.cosy-faq-item').show();
                return;
            }

            $('.cosy-faq-item').each(function () {
                var questionText = $(this).find('.cosy-faq-question').text().toLowerCase();
                var answerText = $(this).find('.cosy-faq-answer').text().toLowerCase();

                if (questionText.indexOf(searchTerm) !== -1 || answerText.indexOf(searchTerm) !== -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });

})(jQuery);
