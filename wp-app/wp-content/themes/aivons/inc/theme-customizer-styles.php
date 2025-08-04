<?php

/**
 * aivons functions for getting inline styles from theme customizer
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aivons
 */

if (!function_exists('aivons_theme_customizer_styles')) :
	function aivons_theme_customizer_styles()
	{

		// aivons color option

		$aivons_inline_style = '';
		$aivons_inline_style .= ':root {--aivons-primary: ' . get_theme_mod('theme_base_color', sanitize_hex_color('#3c72fc')) . ';  --aivons-black: ' . get_theme_mod('theme_black_color', sanitize_hex_color('#0f0d1d')) . '; }';

		$aivons_inner_banner_bg = get_theme_mod('page_header_bg_image');
		$aivons_inline_style .= '.page-header__bg { background-image: url(' . $aivons_inner_banner_bg . '); } ';

		$aivons_preloader_icon = get_theme_mod('preloader_image');
		if ($aivons_preloader_icon) {
			$aivons_inline_style .= '.preloader .preloader__image { background-image: url(' . $aivons_preloader_icon . '); } ';
		}

		if (is_page()) {


			$aivons_page_base_color = empty(get_post_meta(get_the_ID(), 'aivons_base_color', true)) ? get_theme_mod('theme_base_color', sanitize_hex_color('#3c72fc')) : get_post_meta(get_the_ID(), 'aivons_base_color', true);

			$aivons_page_black_color = empty(get_post_meta(get_the_ID(), 'aivons_black_color', true)) ? get_theme_mod('theme_black_color', sanitize_hex_color('#0f0d1d')) : get_post_meta(get_the_ID(), 'aivons_black_color', true);

			$aivons_inline_style .= ':root {--aivons-primary: ' . $aivons_page_base_color . '; --aivons-black: ' . $aivons_page_black_color . '; }';

			$aivons_page_header_bg = empty(get_post_meta(get_the_ID(), 'aivons_set_header_image', true)) ? get_theme_mod('page_header_bg_image') : get_post_meta(get_the_ID(), 'aivons_set_header_image', true);

			$aivons_inline_style .= '.page-header__bg { background-image: url(' . $aivons_page_header_bg . '); }';
		}


		wp_add_inline_style('aivons-style', $aivons_inline_style);
	}
endif;

add_action('wp_enqueue_scripts', 'aivons_theme_customizer_styles');
