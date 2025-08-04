<?php

namespace Layerdrops\Aivons\Widgets;


class FooterAbout extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-about';
    }

    public function get_title()
    {
        return __('Footer About', 'aivons-addon');
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
            'logo',
            [
                'label' => __('Add Logo', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'logo_dimension',
            [
                'label' => __('Logo Dimension', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
                'description' => __('Set Custom Logo Size.', 'aivons-addon'),
                'default' => [
                    'width' => '134',
                    'height' => '34',
                ],
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Paragraph', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'aivons-addon'),
            ]
        );

        $this->add_control(
            'phone',
            [
                'label' => __('Phone', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Add Number', 'aivons-addon'),
                'default'     => __( '+92 666 888 0000', 'aivons-addon' )
            ]
        );

        $this->add_control(
            'email',
            [
                'label' => __('Email', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Add Email', 'aivons-addon'),
                'default'     => 'needhelp@company.com'
            ]
        );

        $this->add_control(
            'address',
            [
                'label' => __('Address', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Add Address', 'aivons-addon'),
                'default'     => __( '66 Broklyn Street New York, USA', 'aivons-addon' )
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

	//content typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'content_typography',
			'label'          => esc_html__( 'Content Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .footer-widget__text, 
            .footer-widget__contact-list li .text p, .footer-widget__contact-list li .text p, .footer-widget__contact-list li .text p a',
		]
	);  
   

	$this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('footer-about.php');
    }

    protected function _content_template()
    {
    }
}
