<?php

namespace Layerdrops\Aivons\Widgets;


class InfoBox extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'aivons-info-box';
	}

	public function get_title()
	{
		return __('Info Box', 'aivons-addon');
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


		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Content', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		
		$this->add_control(
			'layout_two_sec_title',
			[
				'label' => __('Section Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
				'condition' => [
				 'layout_type' => 'layout_two'
				]
			]
		);

		$this->add_control(
			'layout_two_sec_subtitle',
			[
				'label' => __('Section Sub Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add sub title', 'aivons-addon'),
				'condition' => [
					'layout_type' =>  'layout_two'
				   ]
			]
		);

		$layout_one_item = new \Elementor\Repeater();

		
		$layout_one_item->add_control(
			'title',
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Awesome title', 'aivons-addon'),
				'label_block' => true,
			]
		);

		$layout_one_item->add_control(
			'sub_title',
			[
				'label' => __('Sub Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Awesome Sub Title ', 'aivons-addon'),
				'label_block' => true,
			]
		);


		$this->add_control(
			'infobox_itemes',
			[
				'label' => __('Info Boxes', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_one_item->get_controls(),
				'condition'=>[
				'layout_type'=> 'layout_one'
				],
				'default' => [
					[
						'title' => __('Awesome Sub Title', 'aivons-addon'),
					],
				],
			]
		);

		$layout_two_item = new \Elementor\Repeater();

		
		$layout_two_item->add_control(
			'title',
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Awesome title', 'aivons-addon'),
				'label_block' => true,
			]
		);

		$layout_two_item->add_control(
			'text',
			[
				'label' => __('info text', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('22 Texas West Hills', 'aivons-addon'),
				'label_block' => true,
			]
		);

		$layout_two_item->add_control(
			'email',
			[
				'label' => __('Email', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add email', 'aivons-addon'),
				'label_block' => true,
			]
		);


		$layout_two_item->add_control(
			'phone',
			[
				'label' => __('Add Phone', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add Phone', 'aivons-addon'),
				'label_block' => true,
			]
		);


		$this->add_control(
			'layout_two_item',
			[
				'label' => __('Info Boxes', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_two_item->get_controls(),
				'condition'=>[
				'layout_type'=> 'layout_two'
				],
				'default' => [
					[
						'title' => __('AUSTIN', 'aivons-addon'),
					],
				],
			]
		);

	$this->end_controls_section();
	
	//style layout one
    $this->start_controls_section(
		'generel_style_layout_one', [
			'label' => esc_html__( 'Font Options', 'aivons-addon' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			'condition' => [
			'layout_type'=> 'layout_one'
			]
		]
	);

	//title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'layout_one_title_typography',
			'label'          => esc_html__( 'Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .two-boxes__title',
		]
	);  

	//sub title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'layout_one_sub_title_typography',
			'label'          => esc_html__( 'Sub Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .two-boxes__text',
		]
	);   

	$this->end_controls_section();

	//style layout two
	$this->start_controls_section(
		'generel_style_layout_two', [
			'label' => esc_html__( 'Font Options', 'aivons-addon' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			'condition' => [
			'layout_type'=> 'layout_two'
			]
		]
	);
	
	//title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'layout_two_title_typography',
			'label'          => esc_html__( 'Section Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .section-title__title',
		]
	);  
	
	//sub title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'layout_two_sub_title_typography',
			'label'          => esc_html__( 'Section Sub Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .section-title__tagline',
		]
	);   

	//inbo box title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'layout_two_infobox_title_typography',
			'label'          => esc_html__( 'Info Box Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .locations__title',
		]
	);  


	//inbo box content typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'layout_two_infobox_content_typography',
			'label'          => esc_html__( 'Info Box Content Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .locations__text,.locations__mail-phone-box',
		]
	);  

	$this->end_controls_section();

	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include aivons_get_template('info-box-one.php');
		include aivons_get_template('info-box-two.php');
	}

	protected function _content_template()
	{
	}
}
