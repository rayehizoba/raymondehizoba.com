<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
            'name' => __('Primary', 'sage'),
            'id' => 'sidebar-primary',
        ] + $config);

    register_sidebar([
            'name' => __('Footer', 'sage'),
            'id' => 'sidebar-footer',
        ] + $config);
});

/**
 * Create a custom post type for Projects
 */
add_action('init', 'create_project_cpt', 0);
add_action('init', 'register_project_tag');

/**
 * Add custom classes to <a> tags in the WordPress menu
 */
add_filter('nav_menu_link_attributes', function ($attrs, $item, $args) {
    if ($args->theme_location === 'primary_navigation') {
        $attrs['class'] = 'nav-link';
        $attrs['target'] = '_blank';
    }
    return $attrs;
}, 10, 3);

/**
 * Add custom scripts and styles
 */
add_action(
    'wp_enqueue_scripts',
    function () {
        wp_enqueue_style(
            'google-font:barlow',
            'https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap',
            array(),
            null,
            'all'
        );
        wp_enqueue_style(
            'google-font:unbounded',
            'https://fonts.googleapis.com/css2?family=Unbounded:wght@900&display=swap',
            array(),
            null,
            'all'
        );
        wp_enqueue_style(
            'google-font:roboto',
            'https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap',
            array(),
            null,
            'all'
        );
        wp_enqueue_script(
            'lottie-player',
            'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js',
            array(),
            null,
            true
        );
        wp_enqueue_style(
            'splide-css',
            'https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/themes/splide-default.min.css',
            array(),
            null,
            'all'
        );
        wp_enqueue_script(
            'splide-js',
            'https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js',
            array(),
            null,
            true
        );
        wp_enqueue_script(
            'alpinejs',
            'https://unpkg.com/alpinejs@3.13.2/dist/cdn.min.js',
            array(),
            null,
            true
        );
    }
);

/**
 * Add custom admin styles
 */
add_action('admin_enqueue_scripts', function () {
//    wp_enqueue_style(
//        'google-font:barlow',
//        'https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap',
//        array(),
//        null,
//        'all'
//    );
    wp_enqueue_style(
        'google-font:unbounded',
        'https://fonts.googleapis.com/css2?family=Unbounded:wght@900&display=swap',
        array(),
        null,
        'all'
    );
    wp_enqueue_style(
        'google-font:roboto',
        'https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap',
        array(),
        null,
        'all'
    );
});
