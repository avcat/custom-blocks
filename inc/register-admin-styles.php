<?php

add_action('enqueue_block_editor_assets', function() {
    // Add theme legacy scripts
    override_admin_icon_style();

    // Additional styles for the blocks in admin to override WordPress admin styles
    wp_register_style('override-admin-styles', CB_CSS_DIR . '/override-admin-styles.css');
    wp_enqueue_style('override-admin-styles');

    // Add global styles to the admin
    cb_output_css_js_front();
});