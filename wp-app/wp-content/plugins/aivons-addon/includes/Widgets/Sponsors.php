<?php

namespace Layerdrops\Aivons\Widgets;


class Sponsors extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-sponsors';
    }

    public function get_title()
    {
        return __('Sponsors', 'aivons-addon');
    }

    public function get_icon()
    {
        return 'eicon-cogs';
    }

    public function get_categories()
    {
        return ['aivons-category'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'layout_section',
            [
                'label' => __('Layout', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout_type',
            [
                'label' => __('Select Layout', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' => __('Layout One', 'aivons-addon'),
                    'layout_two' => __('Layout Two', 'aivons-addon'),
                    'layout_three' => __('Layout Three', 'aivons-addon'),
                ]
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'aivons-addon'),
                'condition'   => [
                'layout_type'      => [ 'layout_one', 'layout_three' ]
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $sponsor_images = new \Elementor\Repeater();

        $sponsor_images->add_control(
            'image',
            [
                'label' => __('Add Image', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $sponsor_images->add_control(
            'link',
            [
                'label' => __('Add Link', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'sponsor_images',
            [
                'label' => __('Sponsor Items', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $sponsor_images->get_controls(),
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => __('Add Background Image', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition'=>[
                'layout_type'=> 'layout_three'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'background_image_overlay_opacity',
            [
                'label' => __('Background Overlay Opacity', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition'=>[
                    'layout_type'=> 'layout_three'
                    ],
                'default' => '0f0d1d',
                'selectors' => [
                    '{{WRAPPER}} .real-world' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('sponsors-one.php');
        include aivons_get_template('sponsors-two.php');
        include aivons_get_template('sponsors-three.php');
    }

    protected function _content_template()
    {
    }
}
