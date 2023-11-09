<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'siteDescription' => $this->siteDescription(),
            'siteHeader' => $this->siteHeader(),
            'siteHeaderLottieSrc' => $this->siteHeaderLottieSrc(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * Returns the site description.
     *
     * @return string
     */
    public function siteDescription()
    {
        return get_bloginfo('description');
    }

    /**
     * @return mixed|null
     */
    public function siteHeader(): mixed
    {
        return carbon_get_theme_option('site_header');
    }

    /**
     * @return mixed|string
     */
    public function siteHeaderLottieSrc(): mixed
    {
        return carbon_get_theme_option('site_header_lottie_url') ?: 'https://assets7.lottiefiles.com/packages/lf20_xsrma5om.json';
    }
}
