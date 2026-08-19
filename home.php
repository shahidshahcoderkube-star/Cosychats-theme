<?php
/**
 * Template Name:home
 *
 * @package Cosychats
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header();
?>

<div class="cosy-home-container cosy-google-style-home">
    <div class="cosy-google-search-wrapper">

        <!-- Logo/Title -->
        <div class="cosy-google-logo-area">
            <!-- <span class="cosy-google-logo-sparkle">✨</span> -->
            <h1 class="cosy-google-logo-text">Start with an experience</h1>
        </div>

        <!-- Search Form -->
        <form id="cosy-ai-form" class="cosy-google-search-form" onsubmit="event.preventDefault(); simulateCosyAI();">
            <div class="cosy-google-search-bar-wrapper">
                <!-- Search Icon on Left -->
                <div class="cosy-google-search-icon-left">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>

                <!-- Input Field -->
                <input type="text" id="ai-query-input" placeholder="" required autocomplete="off">

                <!-- Search Button Inside Bar -->
                <button type="submit" class="cosy-google-inside-search-btn">Search</button>
            </div>
        </form>
    </div>
    <!-- Response Area (Hidden by default) -->
    <div id="ai-response-area" class="ai-response-hidden" style="display: none;">
        <div id="ai-typing" class="ai-typing-indicator" style="display: none;">
            <div class="ai-dot"></div>
            <div class="ai-dot"></div>
            <div class="ai-dot"></div>
            <span class="ai-typing-text">Searching...</span>
        </div>
        <div id="ai-answer" class="ai-answer-content"></div>
    </div>
</div>

<?php
get_footer();
