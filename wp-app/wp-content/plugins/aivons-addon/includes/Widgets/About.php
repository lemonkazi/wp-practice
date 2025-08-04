<?php

namespace Layerdrops\Aivons\Widgets;


class About extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'aivons-about';
	}

	public function get_title()
	{
		return __('About', 'aivons-addon');
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
					'layout_five' => __('Layout Five', 'aivons-addon'),
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_one',
			[
				'label' => __('Image', 'aivons-addon'),
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
			'image_one',
			[
				'label' => __('Image', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_one',
			[
				'label' => __('Content', 'aivons-addon'),
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
			'sec_title',
			[
				'label' => __('Section Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
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
			'sub_title',
			[
				'label' => __('Sub Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Sub title', 'aivons-addon'),
			]
		);

		$check_list->add_control(
			'icon',
			[
				'label' => __('Check Icon', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-checkmark',
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
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_two',
			[
				'label' => __('Images', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_two'
						]
					]
				]
			]
		);


		$this->add_control(
			'layout_two_image_one',
			[
				'label' => __('Image One', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'layout_two_image_one_caption',
			[
				'label' => __('Image One Caption', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder'=> __( 'Add Caption', 'aivons-addon' )
			]
		);

		$this->add_control(
			'layout_two_image_two',
			[
				'label' => __('Image Two', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'layout_two_image_two_caption',
			[
				'label' => __('Image Two Caption', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder'=> __( 'Add Caption', 'aivons-addon' )
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_two',
			[
				'label' => __('Content', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_two'
						]
					]
				]
			]
		);

		$this->add_control(
			'layout_two_sec_title',
			[
				'label' => __('Section Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
			]
		);

		$this->add_control(
			'layout_two_icon',
			[
				'label' => __('Icon', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-consulting',
					'library' => 'custom-icon',
				],
			]
		);

		$this->add_control(
			'layout_two_icon_caption',
			[
				'label' => __('Icon Caption', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder'=> __( 'Add Caption', 'aivons-addon' )
			]
		);

		$this->add_control(
			'layout_two_summery',
			[
				'label' => __('Summery', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Text', 'aivons-addon'),
			]
		);


		$this->add_control(
			'layout_two_conent',
			[
				'label' => __('Content', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Text', 'aivons-addon'),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_two_contact_form',
			[
				'label' => __('Contact Form', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_two'
						]
					]
				]
			]
		);

		$this->add_control(
			'contact_form_title',
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
			]
		);
		
		
		$this->add_control(
			'contact_form_sub_title',
			[
				'label' => __('Sub Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Sub title', 'aivons-addon'),
			]
		);

		$this->add_control(
            'select_wpcf7_form',
            [
                'label'       => esc_html__('Select your contact form 7', 'aivons-addon'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => aivons_post_query('wpcf7_contact_form'),
            ]
        );

		$this->end_controls_section();



		$this->start_controls_section(
			'section_image_three',
			[
				'label' => __('Images', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_three'
						]
					]
				]
			]
		);


		$this->add_control(
			'layout_three_image_one',
			[
				'label' => __('Image One', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		

		$this->add_control(
			'layout_three_image_two',
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
			'content_three',
			[
				'label' => __('Content', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_three'
						]
					]
				]
			]
		);

		$this->add_control(
			'layout_three_sec_title',
			[
				'label' => __('Section Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
			]
		);

		$this->add_control(
			'layout_three_sec_subtitle',
			[
				'label' => __('Section Sub Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add sub title', 'aivons-addon'),
			]
		);


		$this->add_control(
			'layout_three_highlight',
			[
				'label' => __('Highlight Text', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add highlight text', 'aivons-addon'),
			]
		);


		$this->add_control(
			'layout_three_content',
			[
				'label' => __('Content', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Content', 'aivons-addon'),
			]
		);

		$layout_three_lists = new \Elementor\Repeater();

		$layout_three_lists->add_control(
			'title',
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Title', 'aivons-addon'),
			]
		);

		$this->add_control(
			'layout_three_lists',
			[
				'label' => __(' Lists', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_three_lists->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);


		$this->end_controls_section();



		$this->start_controls_section(
			'section_image_four',
			[
				'label' => __('Images', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_four'
						],
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_five'
						]
					]
				]
			]
		);


		$this->add_control(
			'layout_four_image',
			[
				'label' => __('Image', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		//layout four
		$this->start_controls_section(
			'content_four',
			[
				'label' => __('Content', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_four'
						]
					]
				]
			]
		);

		$this->add_control(
			'layout_four_sec_title',
			[
				'label' => __('Section Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
			]
		);

		$layout_four_icon_box = new \Elementor\Repeater();


		$layout_four_icon_box->add_control(
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

		$layout_four_icon_box->add_control(
			'title',
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Title', 'aivons-addon'),
			]
		);

		$layout_four_icon_box->add_control(
			'sub_title',
			[
				'label' => __('Sub Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Sub Title', 'aivons-addon'),
			]
		);

		$this->add_control(
			'layout_four_icon_box',
			[
				'label' => __('Check Lists', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_four_icon_box->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		//layout five

		$this->start_controls_section(
			'content_five',
			[
				'label' => __('Content', 'aivons-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => [
					'terms' => [
						[
							'name' => 'layout_type',
							'operator' => '==',
							'value' => 'layout_five'
						]
					]
				]
			]
		);

		$this->add_control(
			'layout_five_sec_title',
			[
				'label' => __('Section Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add title', 'aivons-addon'),
			]
		);

		$this->add_control(
			'layout_five_icon',
			[
				'label' => __('Icon', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon-data-analytics',
					'library' => 'custom-icon',
				],
			]
		);


		$this->add_control(
			'layout_five_summery',
			[
				'label' => __('Summery', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Text', 'aivons-addon'),
			]
		);


		$this->add_control(
			'layout_five_conent',
			[
				'label' => __('Content', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Text', 'aivons-addon'),
			]
		);

		$layout_five_progressbar = new \Elementor\Repeater();


		$layout_five_progressbar->add_control(
			'title',
			[
				'label' => __('Title', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Add Title', 'aivons-addon'),
			]
		);

		$layout_five_progressbar->add_control(
			'number',
			[
				'label' => __('Number', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Add Number', 'aivons-addon'),
			]
		);

		$this->add_control(
			'layout_five_progressbar',
			[
				'label' => __('Progress Bar	', 'aivons-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_five_progressbar->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		//contact info
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
							'value' => 'layout_five'
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
			'selector'       => '{{WRAPPER}} .two-section__left-title,.section-title__title,.reasons__title,.about__title, .largest-business__title',
		]
	);  


	//sub title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'sub_title_typography',
			'label'          => esc_html__( 'Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .two-section__left-title, .section-title__tagline',
			'condition'		 =>[
			'layout_type'	=> 'layout_three'
			]
		]
	);  
	
	//hightlighted text typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'hightlighted_typography',
			'label'          => esc_html__( 'Highlight Text Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .financial__left-note-title',
			'condition'		 =>[
			'layout_type'	=> 'layout_three'
			]
		]
	);  

	//Summery text typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'summery_typography',
			'label'          => esc_html__( 'Highlight Text Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .about__right-text',
			'condition'		 =>[
			'layout_type'	=> 'layout_five'
			]
		]
	); 

	//content typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'content_typography',
			'label'          => esc_html__( 'Content Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .two-section__middle-content-text,.two-section__bottom-text-box, .financial__right-text,.about__right-text',
			'condition'		 =>[
			'layout_type!'	=> [ 'layout_one', 'layout_four' ]
			]
		]
	);  

	//style two
	//image caption typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'img_caption_typography',
			'label'          => esc_html__( 'Image Caption Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .two-section__points .text p',
			'condition'	     =>[
			 'layout_type'	 => 'layout_two'
			]
		]
	);  
	
	//icon caption typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'icon_caption_typography',
			'label'          => esc_html__( 'Icon Caption Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .two-section__middle-content-icon h3',
			'condition'	     =>[
			 'layout_type'	 => 'layout_two'
			]
		]
	);  

	//style four

	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'check_list_title_typography',
			'label'          => esc_html__( 'Check List Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .reasons__content-title, .largest-business__list-box-title',
			'condition'	     =>[
			 'layout_type'	 => [ 'layout_one','layout_four' ]
			]
		]
	); 
	
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'check_list_sub_title_typography',
			'label'          => esc_html__( 'Check List Sub Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .reasons__content-text, .largest-business__list-box-text',
			'condition'	     =>[
			 'layout_type'	 => [ 'layout_one','layout_four' ]
			]
		]
	); 

	$this->end_controls_section();

	//contact style 
	$this->start_controls_section(
		'contact_form_font_style', [
			'label' => esc_html__( 'Contact Form Font Options', 'aivons-addon' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			'condition'=>[
			'layout_type'=>'layout_two'
			]
		]
	);

	//contact form title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'contact_form_title',
			'label'          => esc_html__( 'Title', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .contact-expert__title',
		]
	); 


	//contact form sub title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'contact_form_sub_title',
			'label'          => esc_html__( 'Sub Title', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .contact-expert__tagline',
		]
	); 

	$this->end_controls_section();

	//style five
	$this->start_controls_section(
		'contact_info_font_style', [
			'label' => esc_html__( 'Contact Info Font Options', 'aivons-addon' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			'condition'=>[
			'layout_type'=>'layout_five'
			]
		]
	);

	//contact form title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'contact_info_text',
			'label'          => esc_html__( 'Text', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .about__phone-contact-text p',
		]
	); 


	//contact form sub title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'contact_info_phone',
			'label'          => esc_html__( 'Phone', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .about__phone-contact-text a',
		]
	); 

	$this->end_controls_section();


	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include aivons_get_template('about-one.php');
		include aivons_get_template('about-two.php');
		include aivons_get_template('about-three.php');
		include aivons_get_template('about-four.php');
		include aivons_get_template('about-five.php');
	}

	protected function _content_template()
	{
	}
}
