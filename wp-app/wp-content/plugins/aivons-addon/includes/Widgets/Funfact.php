<?php

namespace Layerdrops\Aivons\Widgets;


class Funfact extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-funfact';
    }

    public function get_title()
    {
        return __('Funfact', 'aivons-addon');
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
            'default' => 'rgba(15, 13, 29, .85)',
            'selectors' => [
                '{{WRAPPER}} .counters-one' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $funfact_box = new \Elementor\Repeater();
    $funfact_box->add_control(
        'icon',
        [
            'label' => __('Count Icon', 'aivons-addon'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon-video',
                'library' => 'custom-icon',
            ],
        ]
    );
    $funfact_box->add_control(
        'counter',
        [
            'label' => __('Count Number', 'aivons-addon'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 123,
            'label_block' => true,
        ]
    );
    $funfact_box->add_control(
        'text',
        [
            'label' => __('Count Text', 'aivons-addon'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Default Text', 'aivons-addon'),
            'label_block' => true,
        ]
    );

    $this->add_control(
        'funfact_boxes',
        [
            'label' => __('Funfact Boxes', 'aivons-addon'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $funfact_box->get_controls(),
            'default' => [
                [
                    'counter' => 123,
                    'text' => __('Default Text', 'aivons-addon'),
                    'icon' => [
                        'value' => 'icon-video',
                        'library' => 'custom-icon',
                    ],
                ],
            ],
            'title_field' => '{{{ text }}}',
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
			'name'           => 'text_typography',
			'label'          => esc_html__( 'Text Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .counter-one__text',
		]
	);  

	//number typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'number_typography',
			'label'          => esc_html__( 'Number Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .counter-one__single h3',
		]
	);   

	$this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('funfact-one.php');
    }

    protected function _content_template()
    {
    }
}
