<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageProjects extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'projects' => $this->projects(),
        ];
    }

    /**
     * @return array
     */
    public function projects(): array
    {
        $args = [
            'posts_per_page' => -1,
            'offset' => 0,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'project',
        ];
        $the_query = new \WP_Query($args);
        $projects = [];

        if ($the_query->post_count > 0) {
            $projects = array_map(static function ($project) use ($the_query) {
                $the_query->the_post();
                $slides = array_map(static function ($slide) {
                    return wp_get_attachment_url($slide);
                }, carbon_get_the_post_meta('project_slides'));
                $description = carbon_get_the_post_meta('project_description');
                $start_year = carbon_get_the_post_meta('project_start_year');
                $end_year = carbon_get_the_post_meta('project_end_year');
                $links = carbon_get_the_post_meta('project_links');
                $post_id = get_the_ID();
                $tags = wp_get_post_tags($post_id);
                return (object)[
                    'id' => $post_id,
                    'title' => $project->post_title,
                    'slides' => $slides,
                    'description' => $description,
                    'start_year' => $start_year,
                    'end_year' => $end_year,
                    'links' => $links,
                    'tags' => $tags,
                ];
            }, $the_query->posts);
            wp_reset_postdata();
        }

        return $projects;
    }
}
