<?php

namespace Layerdrops\Aivons\Widgets;


class Tabs extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'aivons-tabs';
	}

	public function get_title()
	{
		return __('Tabs', 'aivons-addon');
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
			'content_section',
			[
				'label' => __('Tab Items', 'aivons-addon'),
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
                    'size' => 3,
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

	//title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'title_typography',
			'label'          => esc_html__( 'Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .financial-advice__box .tab-btns .tab-btn span',
		]
	);  

	//meta title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'meta_title_typography',
			'label'          => esc_html__( 'Meta Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .finalcial-advice__list-box-title',
		]
	);  

	//content typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'content_typography',
			'label'          => esc_html__( 'Content Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .finalcial-advice__list-box-text,.financial-advice_-desc,.financial-advice__list-box-2 li',
		]
	);   

	$this->end_controls_section();

	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include aivons_get_template('tabs-one.php');
	}

	protected function _content_template()
	{
	}
}
