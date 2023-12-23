<?php

function custom_blocks_category($categories, $post) {
    array_unshift($categories, [
        'slug' => 'custom_blocks',
        'title' => 'Custom Blocks',
    ]);
    return $categories;
}
add_filter('block_categories_all', 'custom_blocks_category', 10, 2);

class My_Blocks {
    public function init_acf_blocks(): void {
        add_action('acf/init', [$this, 'register_blocks']);
        add_filter('acf/settings/load_json', [$this, 'load_acf_block']);
        add_filter('acf/settings/load_json', [$this, 'load_acf_general']);
        $this->include_logic();
    }

    public function include_logic() {
        $indexes = glob(plugin_dir_path(__DIR__) . '/blocks/*/index.php');
        if (!$indexes) {
            return;
        }

        foreach ($indexes as $index) {
            include_once $index;
        }
    }

    public function register_blocks(): void {
        if (!function_exists('acf_register_block_type')) {
            return;
        }

        $blocks = glob(plugin_dir_path(__DIR__) . 'blocks/*');

        if (!$blocks) {
            return;
        }

        foreach ($blocks as $block) {
            $block_settings = cb_block_create_options($block);
            $registered_block = acf_register_block_type($block_settings);

            if (!$registered_block) {
                error_log('Block folder not found for ' . $block);
            }
        }
    }

    public function load_acf_block($paths) {
        $acfs = glob(plugin_dir_path(__DIR__) . '/blocks/*/acf');
        if (!$acfs) {
            return $paths;
        }

        foreach ($acfs as $acf) {
            $paths[] = $acf;
        }
        return $paths;
    }

    public function load_acf_general($paths) {
        $general_acf_dir = plugin_dir_path(__DIR__) . '/acf';
        if (!is_dir($general_acf_dir)) {
            return $paths;
        }

        $paths[] = $general_acf_dir;
        return $paths;
    }
}
(new My_Blocks())->init_acf_blocks();
