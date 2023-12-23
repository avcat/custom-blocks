<?php

// https://wp-kama.ru/note/kak-sozdat-shablon-stranitsy-iz-plagina-chtoby-poyavilsya-vybor-v-atributah-stranitsy

add_filter('theme_page_templates', function ($templates) {
    $templates['template-custom-blocks.php'] = 'Custom Blocks';
    return $templates;
});

add_filter('template_include', function ($template) {
    $page_template = get_page_template_slug();
    if ('template-custom-blocks.php' == basename($page_template)) {
        return wp_normalize_path(plugin_dir_path(__DIR__) . '/templates/template-custom-blocks.php');
    }
    return $template;
});

// Add global styles to the front-end

add_action('cb_enqueue_styles', function ($blocks_css_combined) {
    wp_add_inline_style('global-blocks-css', $blocks_css_combined);
});

add_action('cb_enqueue_scripts', function ($blocks_js_combined) {
    wp_add_inline_script('global-blocks-js', $blocks_js_combined);
});

add_action('wp_enqueue_scripts', function () {
    if (!is_page_template('template-custom-blocks.php')) {
        return;
    }

    cb_output_css_js_front();
});
