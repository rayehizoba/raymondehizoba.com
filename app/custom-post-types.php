<?php

// Register Custom Post Type Project
function create_project_cpt(): void
{

    $labels = array(
        'name' => _x('Projects', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('Project', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => _x('Projects', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Project', 'Add New on Toolbar', 'textdomain'),
        'archives' => __('Project Archives', 'textdomain'),
        'attributes' => __('Project Attributes', 'textdomain'),
        'parent_item_colon' => __('Parent Project:', 'textdomain'),
        'all_items' => __('All Projects', 'textdomain'),
        'add_new_item' => __('Add New Project', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'new_item' => __('New Project', 'textdomain'),
        'edit_item' => __('Edit Project', 'textdomain'),
        'update_item' => __('Update Project', 'textdomain'),
        'view_item' => __('View Project', 'textdomain'),
        'view_items' => __('View Projects', 'textdomain'),
        'search_items' => __('Search Project', 'textdomain'),
        'not_found' => __('Not found', 'textdomain'),
        'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
        'featured_image' => __('Featured Image', 'textdomain'),
        'set_featured_image' => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image' => __('Use as featured image', 'textdomain'),
        'insert_into_item' => __('Insert into Project', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this Project', 'textdomain'),
        'items_list' => __('Projects list', 'textdomain'),
        'items_list_navigation' => __('Projects list navigation', 'textdomain'),
        'filter_items_list' => __('Filter Projects list', 'textdomain'),
    );
    $args = array(
        'label' => __('Project', 'textdomain'),
        'description' => __('My Projects', 'textdomain'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('project', $args);
}

function register_project_tag(): void
{
    register_taxonomy_for_object_type('post_tag', 'project');
}
