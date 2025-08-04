<?php

namespace Layerdrops\Aivons\Widgets;


class Video extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-video';
    }

    public function get_title()
    {
        return __('Video', 'aivons-addon');
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
            'title',
            [
                'label' => __('Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'aivons-addon'),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Sub Title', 'aivons-addon'),
				'condition'  =>[
				'layout_type' => 'layout_two'
				]
            ]
        );


		$this->add_control(
			'image_two',
			[
				'label' => __('Image', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'summery',
			[
				'label' => __('Summery', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Text', 'aivons-addon'),
				'condition'=>[
					'layout_type'   => 'layout_one'
					]
			]
		);

        $this->add_control(
			'highlighted_text',
			[
				'label' => __('Highlighted Text', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Text', 'aivons-addon'),
				'condition'=>[
					'layout_type'   => 'layout_one'
				]
			]
		);


        $this->add_control(
            'video_url',
            [
                'label' => __('Video Url', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('#', 'aivons-addon'),
                'default' => '#',
            ]
        );

        $this->add_control(
            'sidebar-text',
            [
                'label' => __('Sidebar Text', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Sidebar Text', 'aivons-addon'),
                'default' => __('aivons', 'aivons-addon'),
				'condition'=>[
				'layout_type'   => 'layout_one'
				]
            ]
        );

        $layout_progress_bar_box = new \Elementor\Repeater();

		$layout_progress_bar_box->add_control(
			'progressbar_one_title',
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Title', 'aivons-addon'),
			]
		);

		$layout_progress_bar_box->add_control(
			'progressbar_one_number',
			[
				'label' => __( 'Count Number', 'aivons-addon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [  '%' ],
				'range' => [

					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 85,
				],
			]
		);


		$this->add_control(
			'layout_progress_bar_box',
			[
				'label' => __('Progress Bar', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_progress_bar_box->get_controls(),
				'title_field' => '{{{ progressbar_one_title }}}',
                'condition'   => [
                'layout_type' => 'layout_one'
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_image_one',
			[
				'label' => __('Images', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_one'
						]
					]
				]
			]
		);

        $this->add_control(
			'layout_one_image_one',
			[
				'label' => __('Image One', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'layout_one_image_two',
			[
				'label' => __('Image Two', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'contact_info_one',
			[
				'label' => __('Contact Info', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_one'
						]
					]
				]
			]
		);

        $this->add_control(
            'contact_title',
            [
                'label' => __('Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Title', 'aivons-addon'),
            ]
        );


        $this->add_control(
            'phone',
            [
                'label' => __('Phone', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Phone Number', 'aivons-addon'),
            ]
        );

        $this->add_control(
			'contact_icon',
			[
				'label' => __('Contact Icon', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-phone-ringing',
					'library' => 'custom-icon',
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
			'selector'       => '{{WRAPPER}} .welcome-one__title',
		]
	);  

	//sub title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'sub_title_typography',
			'label'          => esc_html__( 'Sub Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .section-title__tagline',
			'condition'		 =>[
			'layout_type'	=> 'layout_two'
			]
		]
	);
	
	//Summery typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'Summery_typography',
			'label'          => esc_html__( 'Summery Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .welcome-one__text',
			'condition'		 =>[
				'layout_type'	=> 'layout_one'
			]
		]
	);  


	//Highlighted Text
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'highlighted_typography',
			'label'          => esc_html__( 'Highlighted Text Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .welcome-one__text-two',
			'condition'		 =>[
				'layout_type'	=> 'layout_one'
			]
		]
	);  

	$this->end_controls_section();

	//contact info style
	$this->start_controls_section(
			'contact_info_style', [
				'label' => esc_html__( 'Contact Info Font Options', 'aivons-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition'		 =>[
					'layout_type'	=> 'layout_one'
					]
			]
		);
	
		//title typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'contact_title_typography',
				'label'          => esc_html__( 'Title Typography', 'aivons-addon' ),
				'selector'       => '{{WRAPPER}} .welcome-one__call-text p',
			]
		);  
	
		//phone typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'           => 'phone_typography',
				'label'          => esc_html__( 'Phone Text Typography', 'aivons-addon' ),
				'selector'       => '{{WRAPPER}} .welcome-one__call-text a',

			]
		);
		

	$this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('video-one.php');
        include aivons_get_template('video-two.php');
    }

    protected function _content_template()
    {
    }
}
