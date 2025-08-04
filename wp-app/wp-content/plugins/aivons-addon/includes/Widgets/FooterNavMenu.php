<?php

namespace Layerdrops\Aivons\Widgets;


class FooterNavMenu extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-nav-menu';
    }

    public function get_title()
    {
        return __('Footer Nav Menus', 'aivons-addon');
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
                'label' => __('Add Title', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'aivons-addon')
            ]
        );

        $nav_menus = new \Elementor\Repeater();

        $nav_menus->add_control(
            'nav_menu',
            [
                'label' => __('Select Nav Menu', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => aivons_get_nav_menu(),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'nav_menus',
            [
                'label' => __('Nav Menus', 'aivons-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $nav_menus->get_controls(),
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
	
    //Nav menu typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name'           => 'nav_menu_typography',
			'label'          => esc_html__( 'Nav Menu Typography', 'aivons-addon' ),
			'selector'       => '{{WRAPPER}} .footer-widget__explore-list li a',
		]
	);  

	$this->end_controls_section();
    
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include aivons_get_template('footer-nav-menu.php');
    }

    protected function _content_template()
    {
    }
}
