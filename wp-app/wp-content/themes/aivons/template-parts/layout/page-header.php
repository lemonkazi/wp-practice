<?php

/**
 * Template part for displaying Page Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aivons
 */
?>

<!--Page Header Start-->
<section class="page-header">
	<div class="page-header__bg"></div><!-- /.page-header__bg -->
	<div class="page-header-shape-1"></div><!-- /.page-header-shape-1 -->
	<div class="page-header-shape-2"></div><!-- /.page-header-shape-2 -->
	<div class="page-header-shape-3"></div><!-- /.page-header-shape-3 -->
	<div class="container">
		<div class="page-header__inner">
			<?php $aivons_page_meta_breadcumb_status = empty(get_post_meta(get_the_ID(), 'aivons_show_page_breadcrumb', true)) ? 'on' : get_post_meta(get_the_ID(), 'aivons_show_page_breadcrumb', true); ?>
			<?php if (function_exists('bcn_display') && 'on' == get_theme_mod('breadcrumb_opt', 'off') && 'on' == $aivons_page_meta_breadcumb_status) : ?>
				<div class="breadcrumbs thm-breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
					<?php bcn_display(); ?>
				</div>
			<?php endif; ?>

			<?php $aivons_page_title_text = !empty(get_post_meta(get_the_ID(), 'aivons_set_header_title', true)) ? get_post_meta(get_the_ID(), 'aivons_set_header_title', true) : get_the_title(); ?>
			<h2>
				<?php if (!is_page()) : ?>
					<?php aivons_page_title(); ?>
				<?php else : ?>
					<?php echo wp_kses($aivons_page_title_text, 'aivons_allowed_tags') ?>
				<?php endif; ?>
			</h2>
		</div>
	</div>
</section>
<!--Page Header End-->