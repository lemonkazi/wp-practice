<?php

namespace Layerdrops\Aivons\Widgets;


class Service extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-service';
    }

    public function get_title()
    {
        return __('Service', 'aivons-addon');
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
                'condition'   =>[
                'layout_type!' => 'layout_five'
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add sub title', 'aivons-addon'),
                'condition'   =>[
                    'layout_type!' => 'layout_five'
                    ]
            ]
        );

        $this->add_control(
            'summery',
            [
                'label' => __('Summery', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add summery text', 'aivons-addon'),
                'condition' => [
                    'layout_type' => [ 'layout_two', 'layout_four' ]
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
                        'max' => 11,
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
                'size_units' => ['count'],
                'condition'  =>[
                'layout_type!' => 'layout_one'
                ],
                'range' => [
                    'count' => [
                        'min' => 1,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 11,
                ],
            ]
        );

        $this->add_control(
            'select_category',
            [
                'label' => __('Post Category', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => aivons_get_taxonoy('service_cat')
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
            'background_image',
            [
                'label' => __('Add Background Image', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition'=>[
                'layout_type'=> 'layout_one'
                ],
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
                'condition'=>[
                    'layout_type'=> 'layout_one'
                    ],
                'default' => '0f0d1d',
                'selectors' => [
                    '{{WRAPPER}} .real-world' => 'background-color: {{VALUE}}',
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

	//section title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'sec_title_typography',
			'label'          => esc_html__( 'Section Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .section-title__title',
            'condition'   =>[
                'layout_type!' => 'layout_five'
                ]
		]
	);  

	//section sub typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'sec_sub_title_typography',
			'label'          => esc_html__( 'Section Sub Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .section-title__tagline',
            'condition'   =>[
                'layout_type!' => 'layout_five'
                ]
		]
	);   

    //service title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'service_title_typography',
			'label'          => esc_html__( 'Service Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .real-world__title, .industries__title a, .services-one__title,.services-two__title a',
		]
	);

    //service content typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'service_content_typography',
			'label'          => esc_html__( 'Service Content Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .industries__text, .services-one__text,.services-two__text',
            'condition'      =>[
            'layout_type'   => [ 'layout_two', 'layout_three', 'layout_four', 'layout_five' ]
            ]
		]
	);  

    //service read more typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'service_read_more_typography',
			'label'          => esc_html__( 'Service Read More Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .real-world__btn, .services-one__btn',
            'condition'      => [
            'layout_type'    => [ 'layout_one', 'layout_three', 'layout_five' ]
            ]
		]
	);   
   

	$this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('service-one.php');
        include aivons_get_template('service-two.php');
        include aivons_get_template('service-three.php');
        include aivons_get_template('service-four.php');
        include aivons_get_template('service-five.php');
    }

    protected function _content_template()
    {
    }
}
