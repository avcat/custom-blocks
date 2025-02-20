<?php

/*
 * Plugin Name: Custom Blocks
 * Depends: Advanced Custom Fields PRO
 * Description: Adds ACF Blocks to use as new Template Builder system.
 * Author:      Arkadii Vodolazskyi
 * Author URI:  https://gitlab.com/avcat
 * Version:     2.1.0
 */

define('CB_URL', plugin_dir_url(__FILE__));
define('CB_IMG_DIR', CB_URL . 'img');
define('CB_CSS_DIR', CB_URL . 'css');
define('CB_JS_DIR', CB_URL . 'js');
define('CB_BLOCKS_URL', CB_URL . 'blocks');

define('CB_ROOT', plugin_dir_path(__FILE__));
define('CB_CSS_PATH', CB_ROOT . 'css');
define('CB_BLOCKS_PATH', CB_ROOT . 'blocks');
define('CB_TEMPL_PATH', CB_ROOT . 'templates');
define('ACF_LOAD_PATHS_FILE', CB_ROOT . 'sync-json/_acf_load_paths.json');

define('THEME_ICONS_DIR', get_stylesheet_directory_uri() . '/svg');

const BLOCK_GENERAL_SETTINGS = [
    'namespace' => 'acf',
    'category' => 'custom_blocks',
    'mode' => 'edit',
    'render_callback' => 'custom_render_block',
    'example' => [
        'attributes' => [
            'mode' => 'preview'
        ]
    ]
];

include_once 'inc/helpers.php';
include_once 'inc/custom-render-block.php';
include_once 'inc/register-acf-blocks.php';
include_once 'inc/register-page-template.php';
include_once 'inc/register-admin-styles.php';
include_once 'inc/template-helpers.php';
include_once 'inc/acf-general.php';
include_once 'inc/translations.php';