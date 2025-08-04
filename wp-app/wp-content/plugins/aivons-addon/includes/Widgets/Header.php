<?php

namespace Layerdrops\Aivons\Widgets;


class Header extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aivons-header';
    }

    public function get_title()
    {
        return __('Header', 'aivons-addon');
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
                'label' => __('Layout Type', 'aivons-addon'),
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
            'logo_section',
            [
                'label' => __('Site Logo', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'light_logo',
            [
                'label' => __('Light Logo', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout_type' => ['layout_one', 'layout_three']
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'dark_logo',
            [
                'label' => __('Dark Logo', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout_type' => 'layout_two'
                ],
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


        $this->end_controls_section();

        $this->start_controls_section(
            'nav_section',
            [
                'label' => __('Navigation', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'nav_menu',
            [
                'label' => __('Select Nav Menu', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => aivons_get_nav_menu(),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'others_section',
            [
                'label' => __('Others', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(
            'search_status',
            [
                'label' => __('Enable Search?', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'aivons-addon'),
                'label_off' => __('No', 'aivons-addon'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $nav_social_icons = new \Elementor\Repeater();

        $nav_social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => aivons_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );

        $nav_social_icons->add_control(
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
            'nav_social_icons',
            [
                'label' => __('Social Icons', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $nav_social_icons->get_controls(),
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

        $this->add_control(
            'call_number',
            [
                'label' => __('Call Number'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('666 000 888', 'aivons-addon'),
                'label_block' => true,
                'condition'  => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('text'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Need help? Talk to an expert', 'aivons-addon'),
                'label_block' => true,
                'condition'  => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'mobile_menu_section',
            [
                'label' => __('Mobile Drawer', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'mobile_menu_logo',
            [
                'label' => __('Mobile Drawer Logo', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );



        $this->add_control(
            'mobile_menu_email',
            [
                'label' => __('Email Address', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('email@eamil.com', 'aivons-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'mobile_menu_phone',
            [
                'label' => __('Phone Number', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('323232', 'aivons-addon'),
                'label_block' => true,
            ]
        );

        $mobile_menu_social_icons = new \Elementor\Repeater();

        $mobile_menu_social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => aivons_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );

        $mobile_menu_social_icons->add_control(
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
            'mobile_menu_social_icons',
            [
                'label' => __('Social Icons', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $mobile_menu_social_icons->get_controls(),
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
            'font_style',
            [
                'label' => esc_html__('Font Options', 'aivons-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //nav typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'nav_typography',
                'label'          => esc_html__('Nav Menu Typography', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .main-menu .main-menu__list > li > a, .stricky-header .main-menu__list > li > a',
            ]
        );

        //text typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'text_typography',
                'label'          => esc_html__('Text Typography', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .main-menu-wrapper__phone-contact > p',
                'condition'      => [
                    'layout_type'    => 'layout_one'
                ]
            ]
        );

        //phone typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'phone_typography',
                'label'          => esc_html__('Phone Typography', 'aivons-addon'),
                'selector'       => '{{WRAPPER}} .main-menu-wrapper__phone-contact > a',
                'condition'      => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('header.php');
    }

    protected function _content_template()
    {
    }
}
