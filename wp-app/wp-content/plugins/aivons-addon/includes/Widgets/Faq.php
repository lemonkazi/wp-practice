<?php

namespace Layerdrops\Aivons\Widgets;


class Faq extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'aivons-faq';
	}

	public function get_title()
	{
		return __('FAQ', 'aivons-addon');
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


		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Content', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sec_title',
			[
				'label' => __('Section Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
				'condition' => [
				 'layout_type' => [ 'layout_one', 'layout_two' ]
				]
			]
		);

		$this->add_control(
			'sec_subtitle',
			[
				'label' => __('Section Sub Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add sub title', 'aivons-addon'),
				'condition' => [
					'layout_type' => [ 'layout_one', 'layout_two' ]
				   ]
			]
		);

		$check_list = new \Elementor\Repeater();

		$check_list->add_control(
			'title',
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
			]
		);

		$check_list->add_control(
			'icon',
			[
				'label' => __('Check Icon', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-tick',
					'library' => 'custom-icon',
				],
			]
		);


		$this->add_control(
			'check_list',
			[
				'label' => __('Check Lists', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $check_list->get_controls(),
				'title_field' => '{{{ title }}}',
				'condition'	=>[
				'layout_type'=> 'layout_one'
				]
			]
		);


		$faq = new \Elementor\Repeater();


		$faq->add_control(
			'question',
			[
				'label' => __('Question', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Add Question', 'aivons-addon' ),
				'label_block' => true,
			]
		);
		$faq->add_control(
			'answere',
			[
				'label' => __('Answere', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Answere', 'aivons-addon'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'faq_lists',
			[
				'label' => __('FAQ', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $faq->get_controls(),
				'title_field' => '{{{ question }}}',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __('Image', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition'=>[
					'layout_type' => 'layout_one'
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$progressbar = new \Elementor\Repeater();

		$progressbar->add_control(
			'title',
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
			]
		);

		$progressbar->add_control(
			'number',
			[
				'label' => __('Number', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add number', 'aivons-addon'),
				'default' => __('89', 'aivons-addon'),
			]
		);


		$this->add_control(
			'progressbar',
			[
				'label' => __('Progress Bar', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $progressbar->get_controls(),
				'title_field' => '{{{ title }}}',
				'condition'	=>[
				'layout_type'=> 'layout_two'
				]
			]
		);

		$this->end_controls_section();

		// experience
		$this->start_controls_section(
			'layout_section_experience',
			[
				'label' => __('Experience', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout_type' => [ 'layout_one' ]
				]
			]
		);

		$this->add_control(
			'ex_year', //experience year
			[
				'label' => __('Experience Year', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '30', 'aivons-addon' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'ex_text', //experience text 
			[
				'label' => __('Experience Text', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Default Text', 'aivons-addon' ),
				'label_block' => true,
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
	
		//setiion title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'section_title_typography',
				'label'          => esc_html__( 'Section Title Typography', 'aivons-addon' ),
				'selector'       => '{{WRAPPER}} .section-title__title, .listen__title',
				'condition'		 =>[
				'layout_type!'		 => [ 'layout_three' ]
				]
			]
		);  
	
		//setiion sub title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'section_sub_title_typography',
				'label'          => esc_html__( 'Section Sub Title Typography', 'aivons-addon' ),
				'selector'       => '{{WRAPPER}} .section-title__tagline, .listen__text',
				'condition'		 =>[
					'layout_type!'		 => [ 'layout_three' ]
					]
			]
		);   
		
		//question typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'question_typography',
				'label'          => esc_html__( 'Question Typography', 'aivons-addon' ),
				'selector'       => '{{WRAPPER}} .faq-one-accrodion .accrodion-title h4',
			]
		);   

		//answere typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'answere_typography',
				'label'          => esc_html__( 'Answere Typography', 'aivons-addon' ),
				'selector'       => '{{WRAPPER}} .faq-one-accrodion .accrodion-content p',
			]
		);   
		
		//content typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'content_typography',
				'label'          => esc_html__( 'Content Typography', 'aivons-addon' ),
				'selector'       => '{{WRAPPER}} .faq-one__list li .text',
				'condition'		 =>[
					'layout_type'	 => [ 'layout_one' ]
					]
			]
		);   
	
		$this->end_controls_section();

	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include aivons_get_template('faq-one.php');
		include aivons_get_template('faq-two.php');
		include aivons_get_template('faq-three.php');
	}

	protected function _content_template()
	{
	}
}
