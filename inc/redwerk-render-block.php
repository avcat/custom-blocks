<?php

function block_include_params($block) {
    $cb_block_name = block_name_remove_namespace($block);
    $block['cb_block_classname'] = 'cb-block cb-' . $cb_block_name;
    return $block;
}

function custom_render_block($block, $context = '', $is_preview) {
    $cb_block_name = block_name_remove_namespace($block);
    $block_dir = $block['path'];
    $block_render_path = $block_dir . '/render.php';
    $preview_path = $block_dir . '/preview.png';

    if ($is_preview && file_exists($preview_path)) {
        editor_add_preview_image($cb_block_name);
    }

    if (file_exists($block_render_path)) {
        $block_render_function = include($block_render_path);

        if (is_callable($block_render_function)) {
            block_render_template($block, $context, $is_preview, $block_render_function);
            return;
        }
    }

    // If render not found, then just use template
    block_render_template_default($block, $is_preview);
}