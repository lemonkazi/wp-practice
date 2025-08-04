<?php

namespace Layerdrops\Aivons\Widgets;


class FooterSubscribe extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-subscribe';
    }

    public function get_title()
    {
        return __('Footer Subscribe', 'aivons-addon');
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


        $this->add_control(
            'layout_type',
            [
                'label' => __('Select Layout', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' => __('Layout One', 'aivons-addon'),
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Widget Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'aivons-addon')
            ]
        );

        $this->add_control(
            'mailchimp_url',
            [
                'label' => __('Add Mailchimp URL', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'mc_input_placeholder',
            [
                'label' => __('Input Placeholder Text', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Email Address', 'aivons-addon')
            ]
        );

        $this->add_control(
            'btn_label',
            [
                'label' => __('Button Label Text', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Register', 'aivons-addon')
            ]
        );

        $this->add_control(
            'subscriber_label',
            [
                'label' => __('Subscribe label', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Subsrcibe for latest articles and resources', 'aivons-addon')
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
			'selector'       => '{{WRAPPER}} .footer-widget__title',
		]
	);  
	
    
    //text typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'text_typography',
			'label'          => esc_html__( 'Text Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .footer-widget__newsletter-text',
		]
	);  
	

	$this->end_controls_section();

    }

    protected function render()
    {


        $settings = $this->get_settings_for_display();
        include aivons_get_template('footer-subscribe-one.php');
    }

    protected function _content_template()
    {
    }
}
