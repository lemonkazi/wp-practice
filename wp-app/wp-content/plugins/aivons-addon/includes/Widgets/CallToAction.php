<?php

namespace Layerdrops\Aivons\Widgets;


class CallToAction extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-call-to-action';
    }

    public function get_title()
    {
        return __('Call To Action', 'aivons-addon');
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
            'background_image',
            [
                'label' => __('Add Background Image', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
                'default' => 'rgba(30, 30, 34, .85)',
                'selectors' => [
                    '{{WRAPPER}} .our-mission' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Title', 'aivons-addon'),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Title', 'aivons-addon'),
                'condition'   => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'aivons-addon'),
                'label_block' => true,
                'condition'   => [
                'layout_type' =>  [ 'layout_one', 'layout_two' ]
                ]
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __('Button Url', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'aivons-addon'),
                'condition'=>[
                'layout_type'=> [ 'layout_one', 'layout_two' ]
                ],
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_label' => false,
            ]
        );

        $Cta_items = new \Elementor\Repeater();


		$Cta_items->add_control(
			'icon',
			[
				'label' => __('Icon', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-tick',
					'library' => 'custom-icon',
				],
			]
		);

        $Cta_items->add_control(
			'url',
			[
				'label' => __('Url', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add Url', 'aivons-addon'),
				'default' => '#',
			]
		);


		$this->add_control(
			'Cta_items',
			[
				'label' => __('Cta items', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $Cta_items->get_controls(),
				'condition'	=>[
				'layout_type'=> 'layout_three'
				]
			]
		);

    $this->end_controls_section();

    //style layout one
    $this->start_controls_section(
		'generel_style_layout_one', [
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
			'selector'       => '{{WRAPPER}} .our-mission__title, .cta-one__title,.cta-two__title',
		]
	);  
	
    
    //sub title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'sub_title_typography',
			'label'          => esc_html__( 'Sub Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .cta-two__text',
            'condition'      => [
             'layout_type'   => 'layout_three'
            ]
		]
	);  

	//button typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'button_typography',
			'label'          => esc_html__( 'Button Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .thm-btn',
            'condition'       =>[

            'layout_type'    => [ 'layout_one', 'layout_two' ]

            ]
		]
	);   

	$this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('call-to-action-one.php');
        include aivons_get_template('call-to-action-two.php');
        include aivons_get_template('call-to-action-three.php');
    }

    protected function _content_template()
    {
    }
}
