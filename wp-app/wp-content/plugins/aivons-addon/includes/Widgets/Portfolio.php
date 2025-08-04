<?php

namespace Layerdrops\Aivons\Widgets;


class Portfolio extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-portfolio';
    }

    public function get_title()
    {
        return __('Portfolio', 'aivons-addon');
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
                'label' => __('Content', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Title', 'aivons-addon'),
                'condition' => [
                    'layout_type!' => 'layout_three'
                ],
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add sub title', 'aivons-addon'),
                'condition' => [
                    'layout_type!' => 'layout_three'
                ],
            ]
        );


        $this->add_control(
            'post_count',
            [
                'label' => __('Number Of Posts', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 12,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 6,
                ],
            ]
        );

        $this->add_control(
            'post_word_count',
            [
                'label' => __('Word Count In Excerpt', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'condition' => [
                    'layout_type' => 'layout_two'
                ],
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 1,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 9,
                ],
            ]
        );

        $this->add_control(
            'select_category',
            [
                'label' => __('Post Category', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => aivons_get_taxonoy('portfolio_cat'),
            ]
        );



        $this->add_control(
            'query_order',
            [
                'label' => __('Select Order', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'DESC',
                'options' => [
                    'DESC' => __('DESC', 'aivons-addon'),
                    'ASC' => __('ASC', 'aivons-addon'),
                ]
            ]
        );

        $this->end_controls_section();

        //style
        $this->start_controls_section(
            'font_style',
            [
                'label' => esc_html__('Font Options', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //section title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sec_title_typography',
                'label'          => esc_html__('Section Title Typography', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .section-title__title',
                'condition' => [
                    'layout_type!' => 'layout_three'
                ],
            ]
        );

        //section sub title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'section_sub_title_typography',
                'label'          => esc_html__('Section Sub Title Typography', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .section-title__tagline',
                'condition' => [
                    'layout_type!' => 'layout_three'
                ],
            ]
        );

        //title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'title_typography',
                'label'          => esc_html__('Title Typography', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .cases-two__tilte a, .cases-one__tilte a',
            ]
        );

        //sub title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__('Sub Title Typography', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .cases-two__tagline, .cases-one__tagline',
            ]
        );

        //content typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'content_typography',
                'label'          => esc_html__('Content', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .cases-two__text-bottom',
                'condition'      => [
                    'layout_type'    => 'layout_two'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('portfolio-one.php');
        include aivons_get_template('portfolio-two.php');
        include aivons_get_template('portfolio-three.php');
        include aivons_get_template('portfolio-four.php');
    }

    protected function _content_template()
    {
    }
}
