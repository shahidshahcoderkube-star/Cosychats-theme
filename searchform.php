<?php
/**
 * The template for displaying search forms in Cosychats Theme
 *
 * @package Cosychats
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$unique_id = wp_unique_id('search-form-');
?>

<form role="search" method="get" class="cosy-search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="<?php echo esc_attr($unique_id); ?>" class="screen-reader-text">
        <?php echo esc_html_x('Search for:', 'label', 'cosychats'); ?>
    </label>
    <div class="cosy-search-input-group">
        <span class="cosy-search-input-icon">
            <i class="fas fa-search" aria-hidden="true"></i>
        </span>
        <input type="search"
               id="<?php echo esc_attr($unique_id); ?>"
               class="cosy-search-field"
               placeholder="<?php echo esc_attr_x('Search conversations, topics, or services...', 'placeholder', 'cosychats'); ?>"
               value="<?php echo get_search_query(); ?>"
               name="s"
               required />
        <button type="submit" class="cosy-search-submit" aria-label="<?php echo esc_attr_x('Search', 'submit button', 'cosychats'); ?>">
            <span><?php echo esc_html_x('Search', 'submit button', 'cosychats'); ?></span>
            <i class="fas fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>
</form>
