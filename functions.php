<?php

require 'src/autoloader.php';

use YAWPT\Core\Core;
use YAWPT\Core\Helper;

// --
// Core Init
// --
Core::init();

// --
// Theme Init
// --
Core::bootstrap()
    ->addActionAfterSetupTheme(function () { // -- Theme Setup

        add_filter('show_admin_bar', '__return_false');

        add_theme_support('title-tag');
        add_theme_support('widgets');
        add_theme_support('post-thumbnails');
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        );

        register_nav_menus([
            'main_menu' => 'Main Menu'
        ]);

        remove_image_size('1536x1536');
        remove_image_size('2048x2048');
        remove_image_size('medium_large');

        add_editor_style('static/css/app-editor.css');

    })
    // Enqueue Scripts
    ->addAssetsOnFrontend('/static/', [
        ['app-styles', 'app.css', []],
        ['app-scripts', 'app.js', ['jquery']],
    ])
    ->addAssetsOnLogin('/static/', [
        ['app-login-styles', 'app-auth.css'],
    ]);

// --
// ACF connect
// --
$acfPath = Helper::normalizePath(get_template_directory() . '/acf/');
$acfPathInit = Helper::normalizePath(get_template_directory() . '/acf/acf.php');
$acfUrl = get_template_directory_uri() . '/acf/';
$acfJson = Helper::normalizePath(get_template_directory() . '/acf-json/');
if (is_file($acfPathInit)) {
    add_filter('acf/settings/path', function ($path) use ($acfPath) {
        return $acfPath;
    });
    add_filter('acf/settings/dir', function ($dir) use ($acfUrl) {
        return $acfUrl;
    });
    add_filter('acf/settings/save_json', function ($path) use ($acfJson) {
        return $acfJson;
    });
    add_filter('acf/settings/load_json', function ($paths) use ($acfJson) {
        unset($paths[0]);
        $paths[] = $acfJson;
        return $paths;
    });
    include($acfPathInit);

    add_action('acf/init', function () {
        // ACF Theme Options Init
        acf_add_options_page([
            'page_title'      => 'Theme Settings',
            'menu_title'      => 'Theme Settings',
            'menu_slug'       => '',
            'capability'      => 'edit_posts',
            'position'        => false,
            'parent_slug'     => 'themes.php',
            'icon_url'        => false,
            'redirect'        => true,
            'post_id'         => 'options',
            'autoload'        => true,
            'update_button'   => __('Update', 'acf'),
            'updated_message' => __('Settings Updated', 'acf'),
        ]);
    });
}

// remove unused image sizes
add_filter('intermediate_image_sizes', 'yawpt_delete_intermediate_image_sizes');
function yawpt_delete_intermediate_image_sizes($sizes)
{
    return array_diff($sizes, ['medium_large', '1536x1536', '2048x2048',]);
}


// --
// -- ------------------------------------------------------------------------------------------------------------------
// --

