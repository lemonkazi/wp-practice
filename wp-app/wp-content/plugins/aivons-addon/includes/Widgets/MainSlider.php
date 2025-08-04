<?php

namespace Layerdrops\Aivons\Widgets;


class MainSlider extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-main-slider';
    }

    public function get_title()
    {
        return __('Main Slider', 'aivons-addon');
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
                    'layout_four' => __('Layout Four', 'aivons-addon'),
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Slider Content', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $slider = new \Elementor\Repeater();


        $slider->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $slider->add_control(
            'title',
            [
                'label' => __('Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'aivons-addon'),
            ]
        );

        $slider->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'aivons-addon'),
            ]
        );

        $slider->add_control(
            'text',
            [
                'label' => __('Text', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add summery text', 'aivons-addon'),
            ]
        );

        $slider->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'aivons-addon'),
                'label_block' => true,
            ]
        );

        $slider->add_control(
            'button_url',
            [
                'label' => __('Button Url', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'aivons-addon'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_label' => false,
            ]
        );

        $this->add_control(
            'sliders',
            [
                'label' => __('Slider Content', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $slider->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome Title', 'aivons-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        //Generel style
        $this->start_controls_section(
            'generel_style',
            [
                'label' => esc_html__('Font Options', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'title_typography',
                'label'          => esc_html__('Title Typography', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .main-slider h2',
            ]
        );

        //sub title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__('Sub Title Typography', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .main-slider p',
            ]
        );

        //button typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'button_typography',
                'label'          => esc_html__('Button Typography', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .main-slider .thm-btn',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('main-slider-one.php');
        include aivons_get_template('main-slider-two.php');
        include aivons_get_template('main-slider-three.php');
        include aivons_get_template('main-slider-four.php');
    }

    protected function _content_template()
    {
    }
}
