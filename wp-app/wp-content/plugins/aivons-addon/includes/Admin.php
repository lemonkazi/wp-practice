<?php

namespace Layerdrops\Aivons;

/**
 * The admin class
 */
class Admin
{

    /**
     * Initialize the class
     */
    function __construct()
    {
        new Metaboxes\Page();
        new Metaboxes\Service();
        new Metaboxes\Team();
        new Metaboxes\Tab();
        new Metaboxes\Portfolio();
        new Metaboxes\Testimonial();
        new Metaboxes\Pricing();
    }
}
