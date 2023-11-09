<?php

namespace App;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

/**
 * Define custom fields
 * Docs: https://carbonfields.net/docs/
 */
add_action('carbon_fields_register_fields', function () {
    Container::make('post_meta', __('Project Options'))
        ->where('post_type', '=', 'project')
        ->add_fields(array(
            Field::make('media_gallery', 'project_slides', __('Slides'))
                ->set_type(array('image', 'video'))
                ->set_duplicates_allowed(false)
                ->set_required(true),
            Field::make('textarea', 'project_description', __('Description'))
                ->set_required(true),
            Field::make('text', 'project_start_year', __('Start Year'))
                ->set_required(true)
                ->set_attribute('type', 'number'),
            Field::make('text', 'project_end_year', __('End Year'))
                ->set_attribute('type', 'number'),
            Field::make('complex', 'project_links', __('Links'))
                ->add_fields(array(
                    Field::make('text', 'title', __('Title')),
                    Field::make('text', 'url', __('URL'))
                        ->set_attribute('type', 'url'),
                ))
                ->set_header_template('
                    <% if (title) { %>
                        <%- title %> <%- url ? "(" + url + ")" : "" %>
                    <% } %>
                '),
        ));


    Container::make('theme_options', __('Theme Options'))
        ->add_fields(array(
            Field::make('text', 'site_header', 'Header Text'),
            Field::make('text', 'site_header_lottie_url', 'Header Lottie URL')
                ->set_attribute('type', 'url'),
        ));

    Block::make(__('My Shiny Gutenberg Block'))
        ->set_mode('both')
        ->add_fields(array(
            Field::make('text', 'heading', __('Block Heading')),
            Field::make('image', 'image', __('Block Image')),
            Field::make('rich_text', 'content', __('Block Content')),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            ?>

            <div class="block">
                <div class="block__heading text-6xl text-red-300">
                    <h1><?php echo esc_html($fields['heading']); ?></h1>
                </div><!-- /.block__heading -->

                <div class="block__image">
                    <?php echo wp_get_attachment_image($fields['image'], 'full'); ?>
                </div><!-- /.block__image -->

                <div class="block__content">
                    <?php echo apply_filters('the_content', $fields['content']); ?>
                </div><!-- /.block__content -->
            </div><!-- /.block -->

            <?php
        });
});

/**
 * Boot Carbon Fields
 */
add_action('after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
});
