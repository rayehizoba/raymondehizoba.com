<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 *
 */
add_filter('register_block_type_args', function ($args, $name) {
    if ($name === 'core/heading') {
        $args['render_callback'] = static function ($attributes, $content) {
            return view('blocks/core/heading', compact('attributes', 'content'));
        };
    }

    return $args;
}, 10, 2);
