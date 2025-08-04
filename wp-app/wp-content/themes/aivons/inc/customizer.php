<?php

/**
 * Aivons Theme Customizer
 *
 * @package aivons
 */


$aivons_config_id = 'aivons_customize';

Kirki::add_config($aivons_config_id, array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
));


/**
 * theme option panel master
 */

Kirki::add_panel('aivons_theme_opt', array(
	'priority'    => 240,
	'title'       => esc_html__('Aivons Options', 'aivons'),
	'description' => esc_html__('Aivons Theme options panel', 'aivons'),
));

/**
 * General options
 */
Kirki::add_section('aivons_theme_general', array(
	'title'          => esc_html__('General Settings', 'aivons'),
	'description'    => esc_html__('Aivons General Settings.', 'aivons'),
	'panel'          => 'aivons_theme_opt',
	'priority'       => 160,
));

Kirki::add_field($aivons_config_id, [
	'type'        => 'radio-image',
	'settings'    => 'aivons_theme_color_scheme_buttons',
	'label'       => esc_html__('Predefined Base Color', 'aivons'),
	'section'     => 'aivons_theme_general',
	'default'     => 'color-1',
	'priority'    => 10,
	'choices'     => [
		'color-1'   => get_template_directory_uri() .'/assets/images/colors/color-1.png',
		'color-2' =>  get_template_directory_uri() . '/assets/images/colors/color-2.png',
		'color-3'  => get_template_directory_uri() . '/assets/images/colors/color-3.png',
		'color-4'  => get_template_directory_uri() . '/assets/images/colors/color-4.png',
		'color-5'  => get_template_directory_uri() . '/assets/images/colors/color-5.png',
		'color-6'  => get_template_directory_uri() . '/assets/images/colors/color-6.png',
	],
	'active_callback'  => function () {
		if (false === get_theme_mod('custom_color', false)) {
			return true;
		}
		return false;
	},
]);

Kirki::add_field($aivons_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'custom_color',
	'label'       => esc_html__('Custom Base Color', 'aivons'),
	'section'     => 'aivons_theme_general',
	'default'     => false,
	'priority'    => 10,
]);


// theme base color
Kirki::add_field($aivons_config_id, [
	'type'        => 'color',
	'settings'    => 'theme_base_color',
	'label'       => esc_html__('Select Theme Base color', 'aivons'),
	'section'     => 'aivons_theme_general',
	'default'     => sanitize_hex_color('#3c72fc'),
	'active_callback'  => function () {
		if (true === get_theme_mod('custom_color', false)) {
			return true;
		}
		return false;
	},
]);


// theme black color
Kirki::add_field($aivons_config_id, [
	'type'        => 'color',
	'settings'    => 'theme_black_color',
	'label'       => esc_html__('Select Theme Black color', 'aivons'),
	'section'     => 'aivons_theme_general',
	'default'     => sanitize_hex_color('#0f0d1d'),
]);

// general options fields

Kirki::add_field($aivons_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'preloader',
	'label'       => esc_html__('Preloader Visibility', 'aivons'),
	'section'     => 'aivons_theme_general',
	'default'     => false,
	'priority'    => 10
]);

Kirki::add_field($aivons_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'aivons_rtl_mode',
	'label'       => esc_html__('Enable RTL Mode', 'aivons'),
	'section'     => 'aivons_theme_general',
	'default'     => false,
	'priority'    => 10
]);

Kirki::add_field($aivons_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'aivons_boxed_layout',
	'label'       => esc_html__('Enable Boxed Layout', 'aivons'),
	'section'     => 'aivons_theme_general',
	'default'     => false,
	'priority'    => 10
]);

Kirki::add_field($aivons_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'aivons_dark_mode',
	'label'       => esc_html__('Enable Dark Mode', 'aivons'),
	'section'     => 'aivons_theme_general',
	'default'     => false,
	'priority'    => 10
]);



Kirki::add_field($aivons_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'scroll_to_top',
	'label'       => esc_html__('Back to top Visibility', 'aivons'),
	'section'     => 'aivons_theme_general',
	'default'     => false,
	'priority'    => 10
]);

Kirki::add_field($aivons_config_id, [
	'type'        => 'select',
	'settings'    => 'scroll_to_top_icon',
	'label'       => esc_html__('Select Back to top icon', 'aivons'),
	'section'     => 'aivons_theme_general',
	'default'     => 'fa-angle-up',
	'priority'    => 10,
	'multiple'    => 0,
	'choices'     => aivons_get_fa_icons(),
	'active_callback'  => function () {
		$switch_value = get_theme_mod('scroll_to_top', true);

		if (true === $switch_value) {
			return true;
		}
		return false;
	},
]);


// background image
Kirki::add_field($aivons_config_id, [
	'type'        => 'image',
	'settings'    => 'preloader_image',
	'label'       => esc_html__('Custom Preloader Image', 'aivons'),
	'section'     => 'aivons_theme_general',
]);


// page header background image
Kirki::add_field($aivons_config_id, [
	'type'        => 'image',
	'settings'    => 'page_header_bg_image',
	'label'       => esc_html__('Page Header Background Image', 'aivons'),
	'section'     => 'aivons_theme_general',
]);





/**
 * Header options
 */

Kirki::add_section('aivons_theme_header', array(
	'title'          => esc_html__('Header Settings', 'aivons'),
	'description'    => esc_html__('Aivons Header Settings.', 'aivons'),
	'panel'          => 'aivons_theme_opt',
	'priority'       => 160,
));



// set logo width
Kirki::add_field($aivons_config_id, [
	'type'        => 'text',
	'settings'    => 'header_logo_width',
	'label'       => esc_html__('Add Logo size in px', 'aivons'),
	'section'     => 'aivons_theme_header',
	'default'     => esc_html(198),
]);



// stricky switch
Kirki::add_field($aivons_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'header_stricked_menu',
	'label'       => esc_html__('Stricky Header', 'aivons'),
	'section'     => 'aivons_theme_header',
	'description'    => esc_html__('If you are logged in and your top WordPress Admin bar is active this setting will not effect. But while logged out you will see your sticky menu is toggling by this', 'aivons'),
	'default'     => true,
	'priority'    => 10,
]);


// header banner breadcrumb
Kirki::add_field($aivons_config_id, [
	'type'        => 'switch',
	'settings'    => 'breadcrumb_opt',
	'label'       => esc_html__('Breadcrumb Visibility', 'aivons'),
	'section'     => 'aivons_theme_header',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__('Enable', 'aivons'),
		'off' => esc_html__('Disable', 'aivons'),
	],
]);



// Footer options fields
Kirki::add_field($aivons_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'header_custom',
	'label'       => esc_html__('Enable Custom Header', 'aivons'),
	'section'     => 'aivons_theme_header',
	'default'     => false,
	'priority'    => 10,
]);

// Get Footer Custom Post
Kirki::add_field($aivons_config_id, [
	'type'        => 'select',
	'settings'    => 'header_custom_post',
	'label'       => esc_html__('Select Header Type', 'aivons'),
	'choices'     => aivons_post_query('header'),
	'section'     => 'aivons_theme_header',
	'priority'    => 10,
	'active_callback' => function () {
		if (true == post_type_exists('header') && true == get_theme_mod('header_custom')) {
			return true;
		} else {
			return false;
		}
	},
]);


/**
 * Mobile Menu
 */

Kirki::add_section('aivons_theme_mobile_menu', array(
	'title'          => esc_html__('Mobile Menu Settings', 'aivons'),
	'description'    => esc_html__('Aivons Mobile Menu Settings.', 'aivons'),
	'panel'          => 'aivons_theme_opt',
	'priority'       => 160,
));



Kirki::add_field($aivons_config_id, [
	'type'     => 'text',
	'settings' => 'aivons_mobile_menu_email',
	'label'    => esc_html__('Mobile Menu Email', 'aivons'),
	'section'  => 'aivons_theme_mobile_menu',
	'default'  => 'needhelp@aivons.com',
	'priority' => 10,
]);

Kirki::add_field($aivons_config_id, [
	'type'     => 'text',
	'settings' => 'aivons_mobile_menu_phone',
	'label'    => esc_html__('Mobile Menu Phone', 'aivons'),
	'section'  => 'aivons_theme_mobile_menu',
	'default'  => '666 888 0000',
	'priority' => 10,
]);

Kirki::add_field($aivons_config_id, [
	'type'        => 'repeater',
	'label'       => esc_html__('Select Social Icons', 'aivons'),
	'section'     => 'aivons_theme_mobile_menu',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__('Social Icons', 'aivons'),
	],
	'button_label' => esc_html__('Add new Icon', 'aivons'),
	'settings'     => 'mobile_menu_social_icons',
	'default'      => [
		[
			'link_icon' => 'fa-facebook',
			'link_url' => esc_url('http://facebook.com'),
		],
	],
	'fields' => [
		'link_icon'  => [
			'type'        => 'select',
			'label'       => esc_html__('Social Icon', 'aivons'),
			'description' => esc_html__('Select Social Icons', 'aivons'),
			'default'     => 'fa-facebook',
			'choices'     => aivons_get_fa_icons(),
		],
		'link_url' => [
			'type'        => 'text',
			'label'       => esc_html__('Link Url', 'aivons'),
			'description' => esc_html__('Add social profile links', 'aivons'),
			'default'     => esc_url('https://facebook.com/'),
		],
	]
]);




/**
 * Footer options
 */

Kirki::add_section('aivons_theme_footer', array(
	'title'          => esc_html__('Footer Settings', 'aivons'),
	'description'    => esc_html__('Aivons Footer Settings.', 'aivons'),
	'panel'          => 'aivons_theme_opt',
	'priority'       => 160,
));



Kirki::add_field($aivons_config_id, [
	'type'     => 'text',
	'settings' => 'footer_copytext',
	'label'    => esc_html__('Text Control', 'aivons'),
	'section'  => 'aivons_theme_footer',
	'default'  => esc_html__('&copy; All right reserved', 'aivons'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'aivons_allowed_tags');;
	},
	'active_callback' => function () {
		if (false == get_theme_mod('footer_custom')) {
			return true;
		}
	},
]);


// Footer options fields
Kirki::add_field($aivons_config_id, [
	'type'        => 'checkbox',
	'settings'    => 'footer_custom',
	'label'       => esc_html__('Enable Custom Footer', 'aivons'),
	'section'     => 'aivons_theme_footer',
	'default'     => false,
	'priority'    => 10,
]);

// Get Footer Custom Post
Kirki::add_field($aivons_config_id, [
	'type'        => 'select',
	'settings'    => 'footer_custom_post',
	'label'       => esc_html__('Select Footer Type', 'aivons'),
	'choices'     => aivons_post_query('footer'),
	'section'     => 'aivons_theme_footer',
	'priority'    => 10,
	'active_callback' => function () {
		if (true == post_type_exists('footer') && true == get_theme_mod('footer_custom')) {
			return true;
		} else {
			return false;
		}
	},
]);




/**
 * Service Sidebar Menu
 */


Kirki::add_section('aivons_theme_service_sidebar', array(
	'title'          => esc_html__('Service Sidebar Menu', 'aivons'),
	'description'    => esc_html__('Aivons Service Sidebar Options.', 'aivons'),
	'panel'          => 'aivons_theme_opt',
	'priority'       => 160,
	'active_callback' => function () {
		if (true == post_type_exists('service')) {
			return true;
		}
	},
));

Kirki::add_field($aivons_config_id, [
	'type'     => 'text',
	'settings' => 'aivons_sidebar_menu_title',
	'label'    => esc_html__('Menu Title', 'aivons'),
	'section'  => 'aivons_theme_service_sidebar',
	'default'  => esc_html__('All Services', 'aivons'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'aivons_allowed_tags');;
	},
]);


Kirki::add_field($aivons_config_id, [
	'type'     => 'select',
	'settings' => 'aivons_sidebar_menu_item',
	'label'    => esc_html__('Add Nav Menu', 'aivons'),
	'section'  => 'aivons_theme_service_sidebar',
	'priority' => 10,
	'choices'     => aivons_get_nav_menu(),
]);

/**
 * Service Sidebar Contact
 */


Kirki::add_section('aivons_theme_contact_sidebar', array(
	'title'          => esc_html__('Service Sidebar Contact', 'aivons'),
	'description'    => esc_html__('Aivons Service Sidebar Options.', 'aivons'),
	'panel'          => 'aivons_theme_opt',
	'priority'       => 160,
	'active_callback' => function () {
		if (true == post_type_exists('service')) {
			return true;
		}
	},
));

Kirki::add_field($aivons_config_id, [
	'type'     => 'text',
	'settings' => 'aivons_sidebar_contact_title',
	'label'    => esc_html__('Contact Title', 'aivons'),
	'section'  => 'aivons_theme_contact_sidebar',
	'default'  => esc_html__('Need Aivons Help?', 'aivons'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'aivons_allowed_tags');;
	},
]);

Kirki::add_field($aivons_config_id, [
	'type'     => 'textarea',
	'settings' => 'aivons_sidebar_contact_text',
	'label'    => esc_html__('Contact Text', 'aivons'),
	'section'  => 'aivons_theme_contact_sidebar',
	'default'  => esc_html__('Default Text', 'aivons'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'aivons_allowed_tags');;
	},
]);

Kirki::add_field($aivons_config_id, [
	'type'     => 'text',
	'settings' => 'aivons_sidebar_contact_number',
	'label'    => esc_html__('Contact Number', 'aivons'),
	'section'  => 'aivons_theme_contact_sidebar',
	'default'  => esc_html__('666 888 000', 'aivons'),
	'priority' => 10,
	'sanitize_callback' => function ($input) {
		return wp_kses($input, 'aivons_allowed_tags');;
	},
]);

Kirki::add_field($aivons_config_id, [
	'type'     => 'text',
	'settings' => 'aivons_sidebar_contact_number_link',
	'label'    => esc_html__('Contact Number Link', 'aivons'),
	'section'  => 'aivons_theme_contact_sidebar',
	'default'  => esc_html__('#', 'aivons'),
	'priority' => 10,
]);

// background image
Kirki::add_field($aivons_config_id, [
	'type'        => 'image',
	'settings'    => 'aivons_contact_sidebar_image',
	'label'       => esc_html__('Background Image', 'aivons'),
	'section'     => 'aivons_theme_contact_sidebar',
]);
