<?php

namespace Layerdrops\Aivons;

class Utility
{
    public function __construct()
    {
        $this->register_image_size();
        add_filter('single_template', [$this, 'load_portfolio_template']);
        add_filter('single_template', [$this, 'load_service_template']);
    }
    public function register_image_size()
    {
        add_image_size('aivons_blog_370X336', 370, 336, true); // in use
        add_image_size('aivons_testimonials_77X77', 77, 77, true); //in use
        add_image_size('aivons_testimonials_92x92', 92, 92, true); // in use
        add_image_size('aivons_service_details_770X424', 770, 424, true); // in use
        add_image_size('aivons_service_370X252', 370, 252, true); // in use
        add_image_size('aivons_case_370X452', 370, 452, true); // in use
        add_image_size('aivons_case_two_570X412', 570, 412, true); // in use
        add_image_size('aivons_brand_logo_150X80', 150, 80, true); // in use
        add_image_size('aivons_1170X534', 1170, 534, true); // in use
        add_image_size('aivons_team_370X446', 370, 446, true); // in use
        add_image_size('aivons_team_393X447', 393, 447, true); // in use
        add_image_size('aivons_tab_340X326', 340, 326, true); // in use
    }

    public function load_portfolio_template($template)
    {
        global $post;

        if ('portfolio' === $post->post_type && locate_template(array('single-portfolio.php')) !== $template) {
            /*
            * This is a 'portfolio' post
            * AND a 'single portfolio template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return AIVONS_ADDON_PATH . '/post-templates/single-portfolio.php';
        }

        return $template;
    }

    public function load_service_template($template)
    {
        global $post;

        if ('service' === $post->post_type && locate_template(array('single-service.php')) !== $template) {
            /*
            * This is a 'service' post
            * AND a 'single service template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return AIVONS_ADDON_PATH . '/post-templates/single-service.php';
        }

        return $template;
    }
}
