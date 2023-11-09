<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class ProjectItem extends Component
{
    public $title;

    public $project;

    public $isFirst;

    /**
     * @param $title
     * @param $project
     * @param $isFirst
     */
    public function __construct($title, $project, $isFirst)
    {
        $this->title = $title;
        $this->project = $project;
        $this->isFirst = $isFirst;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.project-item');
    }
}
