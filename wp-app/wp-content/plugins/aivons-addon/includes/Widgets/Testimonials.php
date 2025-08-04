<?php

namespace Layerdrops\Aivons\Widgets;


class Testimonials extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-testimonials';
    }

    public function get_title()
    {
        return __('Testimonials', 'aivons-addon');
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
            'title',
            [
                'label' => __('Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'aivons-addon'),
                'condition'   => [
                'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Default Text', 'aivons-addon'),
                'condition'   => [
                    'layout_type' => 'layout_one'
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

        $this->add_control(
            'post_word_count',
            [
                'label' => __('Word Count In Excerpt', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
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
                    'size' => 27,
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
			'name'           => 'sec_title_typography',
			'label'          => esc_html__( 'Section Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .section-title__title',
            'condition'      =>[
            'layout_type'    => 'layout_one' 
            ]
		]
	);  

	//sub title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'sec_sub_title_typography',
			'label'          => esc_html__( 'Section Sub Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .section-title__tagline',
            'condition'      =>[
            'layout_type'    => 'layout_one'
            ]
		]
	);   
	
    $this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'name_typography',
			'label'          => esc_html__( 'Name Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .testimonials-one__client-name, .testimonial-two__client-name',
		]
	);   

    $this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'designation_typography',
			'label'          => esc_html__( 'Designation Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .testimonials-one__client-title, .testimonial-two__clinet-title',
		]
	);   

    $this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'testimonial_typography',
			'label'          => esc_html__( 'Testimonial Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .testimonials-one__text, .testimonial-two__text',
		]
	);   

	$this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('testimonials-one.php');
        include aivons_get_template('testimonials-two.php');
        include aivons_get_template('testimonials-three.php');
    }

    protected function _content_template()
    {
    }
}
