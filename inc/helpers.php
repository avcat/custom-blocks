<?php

function block_name_remove_namespace($block) {
    $block_name = $block['name'];
    $slash_index = strpos($block_name, '/');
    $cb_block_name = substr($block_name, $slash_index + 1);
    return $cb_block_name;
}

function get_block_asset_url($block, $asset_name) {
    $block_asset_url = false;
    $cb_block_name = block_name_remove_namespace($block);
    $block_dir = $block['path'];

    $block_asset_path = $block_dir . '/' . $asset_name;
    if (file_exists($block_asset_path)) {
        $block_asset_url = plugin_dir_url(__DIR__) . 'blocks/' . $cb_block_name . '/' . $asset_name;
    }

    return $block_asset_url;
}

function editor_add_preview_image($cb_block_name) {
    $preview_url = plugin_dir_url(__DIR__) . 'blocks/' . $cb_block_name . '/preview.png';
    echo '<img class="block-preview-image" width="100%" src="' . $preview_url . '">';
    echo "<style>
            /* In Gutenberg editor preview - hide the image preview */
            .wp-block .block-preview-image {
                display: none;
            }
            body.block-editor-iframe__body {
                background-color: #000;
                padding: 0 !important;
            }
            /* In the block on-hover preview - hide everything except the image preview */
            body.block-editor-iframe__body .block-preview-image {
                display: block;
            }
            .block-editor-block-list__block {
                margin: 0 !important;
                max-width: unset;
            }
            body.block-editor-iframe__body .block-preview-image ~ * {
                display: none;
            }
        </style>";
    $block['example']['attributes']['cover'] = $preview_url;
}

function block_render_template($block, $context, $is_preview, $block_render_function) {
    $block_dir = $block['path'];

    $block_render_function(block_include_params($block), $context, $is_preview);

    if ($is_preview) {
        $block_script_url = get_block_asset_url($block, 'script.js');
        if ($block_script_url) {
            $script_contents = file_get_contents($block_dir . '/script.js');
            echo '<script>' . $script_contents . '</script>';
        }
    }
}

function block_render_template_default($block, $is_preview) {
    $block_dir = $block['path'];
    $block_template_path = $block_dir . '/template.php';

    if (file_exists($block_template_path)) {
        include($block_template_path);
        return;
    }

    if (is_admin()) {
        echo 'template file for block ' . $block['name'] . ' not found';
    }
}

function cb_render_block_wrapper($block) {
    $block_wrapper_template_path = plugin_dir_path(__DIR__) . 'templates/block-wrapper.php';
    if (!file_exists($block_wrapper_template_path)) {
        return;
    }
    include($block_wrapper_template_path);
}

function block_render_template_front($block, $fields) {
    $block_dir = $block['path'];
    $block_template_path = $block_dir . '/template.php';
    include($block_template_path);
}

function cb_get_template($name, $args = []) {
    $template_path = CB_TEMPL_PATH . '/' . $name . '.php';
    if (!file_exists($template_path)) {
        return;
    }
    include($template_path);
}

function cb_unslugify($block_name) {
    $words = explode('-', $block_name);
    $words = array_map('ucfirst', $words);
    $unslugified = implode(' ', $words);
    return $unslugified;
}

function cb_block_create_options($block) {
    global $blocks_css_combined;
    global $blocks_js_combined;

    $block_name = basename($block);
    $block_title = cb_unslugify($block_name);
    $block_dir = $block;

    $block_specific_options['name'] = $block_name;
    $block_specific_options['title'] = $block_title;
    $block_specific_options['path'] = $block_dir;

    $block_style_path = $block_dir . '/style.css';
    if (file_exists($block_style_path)) {
        $blocks_css_combined .= file_get_contents($block_style_path);
    }

    $block_compiled_style_path = $block_dir . '/compilable.css';
    if (file_exists($block_compiled_style_path)) {
        $blocks_css_combined .= file_get_contents($block_compiled_style_path);
    }

    $block_script_path = $block_dir . '/script.js';
    if (file_exists($block_script_path)) {
        $blocks_js_combined .= file_get_contents($block_script_path);
    }

    $block_settings = array_merge(BLOCK_GENERAL_SETTINGS, $block_specific_options);
    return $block_settings;
}

function cb_output_css_js_front() {
    wp_register_style('global-blocks-css', CB_CSS_DIR . '/global-blocks.css');
    wp_enqueue_style('global-blocks-css');
    global $blocks_css_combined;
    do_action('cb_enqueue_styles', $blocks_css_combined);

    wp_register_script('global-blocks-js', CB_JS_DIR . '/global-blocks.js', [], '1.0.0', true);
    wp_enqueue_script('global-blocks-js');
    global $blocks_js_combined;
    do_action('cb_enqueue_scripts', $blocks_js_combined);
}

function rbtr($string) {
    $language_domain = 'EN';

    if (defined('RW_LNG')) {
        $language_domain = RW_LNG;
    } else if (defined('QW_LNG')) {
        $language_domain = QW_LNG;
    }

    if ($language_domain === 'EN') {
        return $string;
    }

    return RBTR[$string][$language_domain];
}

function cb_add_footer_styles($footer_content) {
    $footer_content .= '<style>';

    $general_styles_file = CB_CSS_PATH . '/global-blocks.css';
    if (file_exists($general_styles_file)) {
      $general_styles = file_get_contents($general_styles_file);
      $footer_content .= $general_styles;
    }
  
    $footer_styles_file = CB_BLOCKS_PATH . '/footer/style.css';
    if (file_exists($footer_styles_file)) {
      $footer_styles = file_get_contents($footer_styles_file);
      $footer_content .= $footer_styles;
    }
  
    $footer_compiled_styles_file = CB_BLOCKS_PATH . '/footer/compilable.css';
    if (file_exists($footer_compiled_styles_file)) {
      $footer_styles = file_get_contents($footer_compiled_styles_file);
      $footer_content .= $footer_styles;
    }

    $footer_content .= '</style>';

    return $footer_content;
}