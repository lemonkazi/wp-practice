<?php

namespace Layerdrops\Aivons\Widgets;


class FancyBox extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'aivons-fancybox';
	}

	public function get_title()
	{
		return __('Fancy Box', 'aivons-addon');
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
				'label' => __('Content', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$fancy_items = new \Elementor\Repeater();

		$fancy_items->add_control(
			'title',
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
			]
		);

		$fancy_items->add_control(
			'text',
			[
				'label' => __('Text', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Text', 'aivons-addon'),
			]
		);
		
		
		$fancy_items->add_control(
			'url',
			[
				'label' => __('Read More Url', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => '#',
			]
		);

		$fancy_items->add_control(
			'image',
			[
				'label' => __('Image', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'fancy_items',
			[
				'label' => __('Fancy Items', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $fancy_items->get_controls(),
				'title_field' => '{{{ title }}}',
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
                'default' => '0f0d1d',
                'selectors' => [
                    '{{WRAPPER}} .feature' => 'background-color: {{VALUE}}',
                ],
            ]
        );


		$this->end_controls_section();

		// contact info
		$this->start_controls_section(
			'layout_section_contact_info',
			[
				'label' => __('Bottom Content', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'bottom_title', 
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Add Title', 'aivons-addon' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'bottom_text',  
			[
				'label' => __('Text', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Default Text', 'aivons-addon' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __(' Icon', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-phone-ringing',
					'library' => 'custom-icon',
				],
			]
		);

		$this->add_control(
			'bottom_image',
			[
				'label' => __('Image', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->end_controls_section();

		//Generel style
		$this->start_controls_section(
			'generel_style', [
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
				'selector'       => '{{WRAPPER}} .feature__title',
			]
		);

		//content typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'content_typography',
				'label'          => esc_html__( 'Content Typography', 'aivons-addon' ),
				'selector'       => '{{WRAPPER}} .feature__text',
			]
		);
		
		//read more typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'read_more_typography',
				'label'          => esc_html__( 'Read More Typography', 'aivons-addon' ),
				'selector'       => '{{WRAPPER}} .feature__btn',
			]
		);
		
	$this->end_controls_section();
	
	//bottom content style
	$this->start_controls_section(
		'bottom_content_style', [
			'label' => esc_html__( 'Bottom Content Font Options', 'aivons-addon' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);

	//title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'bottom_content_title_typography',
			'label'          => esc_html__( 'Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .feature-bottom__tagline',
		]
	);

	//text typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'bottom_content_text_typography',
			'label'          => esc_html__( 'Text Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .feature-bottom-desc',
		]
	);

	$this->end_controls_section();

	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include aivons_get_template('fancy-box.php');
	}

	protected function _content_template()
	{
	}
}
