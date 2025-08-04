<?php

namespace Layerdrops\Aivons\Widgets;


class FooterCopyright extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-copyright';
    }

    public function get_title()
    {
        return __('Footer CopyRight', 'aivons-addon');
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
            'title',
            [
                'label' => __('Add Text', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('&copy; Layerdrops', 'aivons-addon')
            ]
        );

        $social_icons = new \Elementor\Repeater();

        $social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => aivons_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );

        $social_icons->add_control(
            'social_url',
            [
                'label' => __('Add Url', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'aivons-addon'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_label' => false,
            ]
        );

        $this->add_control(
            'social_icons',
            [
                'label' => __('Social Icons', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $social_icons->get_controls(),
                'default' => [
                    [
                        'social_icon' => 'fa-facebook-f',
                        'social_url' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ],
                ],
                'title_field' => '{{{ social_icon }}}',
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

	//copyright typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'copyright_typography',
			'label'          => esc_html__( 'Copyright Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .site-footer-bottom__left p',
		]
	);  
	

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('footer-copyright.php');
    }

    protected function _content_template()
    {
    }
}
