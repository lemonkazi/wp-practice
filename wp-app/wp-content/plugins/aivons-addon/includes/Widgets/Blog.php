<?php

namespace Layerdrops\Aivons\Widgets;


class Blog extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-blog';
    }

    public function get_title()
    {
        return __('Blog', 'aivons-addon');
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
            'pagination_status',
            [
                'label' => __('Enable Pagination?', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'aivons-addon'),
                'label_off' => __('No', 'aivons-addon'),
                'return_value' => 'yes',
                'default' => 'no',
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
                'placeholder' => __('Add Sub Title', 'aivons-addon'),
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

	//section title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'section_title_typography',
			'label'          => esc_html__( 'Section Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .section-title__title',
		]
	);  

	//section sub title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'section_sub_title_typography',
			'label'          => esc_html__( 'Section Sub Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .section-title__tagline',
		]
	);   
	
    //post title typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'post_title_typography',
			'label'          => esc_html__( 'Post Title Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .news-one__title > a',
		]
	);   
    
    //post meta typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'post_meta_typography',
			'label'          => esc_html__( 'Post Meta Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .news-one__meta li',
		]
	);   
    
    //post content typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'post_content_typography',
			'label'          => esc_html__( 'Post Content Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .news-one__text',
		]
	);   
   
    //post read more typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'read_more_typography',
			'label'          => esc_html__( 'Read More Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .news-one__btn',
		]
	);   

	$this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('blog-one.php');
        include aivons_get_template('blog-two.php');
    }

    protected function _content_template()
    {
    }
}
