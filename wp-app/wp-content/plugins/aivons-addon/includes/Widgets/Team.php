<?php

namespace Layerdrops\Aivons\Widgets;


class Team extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-team';
    }

    public function get_title()
    {
        return __('Team', 'aivons-addon');
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
                ]
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Title', 'aivons-addon'),
                'condition'   =>[
                'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Sub Title', 'aivons-addon'),
                'condition'   =>[
                    'layout_type' => 'layout_one'
                    ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Post Options', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        $this->add_control(
            'post_count',
            [
                'label' => __('Number Of Posts', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 6,
                ],
            ]
        );

    $this->end_controls_section();

    //style 
    $this->start_controls_section(
		'font_style', [
			'label' => esc_html__( 'Font Options', 'aivons-addon' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);

	//name typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'name_typography',
			'label'          => esc_html__( 'Name Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .team-one__name',
		]
	);  

	//Designation typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'designation_typography',
			'label'          => esc_html__( 'Designation Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .team-one__title',
		]
	);   

	//Contact Text typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'contact_text_typography',
			'label'          => esc_html__( 'Contact Text Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .team-one__btn',
		]
	);   

	$this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('team-one.php');
        include aivons_get_template('team-two.php');
    }

    protected function _content_template()
    {
    }
}
