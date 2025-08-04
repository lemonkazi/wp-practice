<?php

/**
 * Template part for displaying Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aivons
 */

$aivons_page_id     = get_queried_object_id();
$aivons_custom_header_status = !empty(get_post_meta($aivons_page_id, 'aivons_custom_header_status', true)) ? get_post_meta($aivons_page_id, 'aivons_custom_header_status', true) : 'off';

$aivons_custom_header_id = '';
if (is_page() && 'on' === $aivons_custom_header_status) {
	$aivons_custom_header_id = get_post_meta($aivons_page_id, 'aivons_select_custom_header', true);
} elseif (true == get_theme_mod('header_custom')) {
	$aivons_custom_header_id = get_theme_mod('header_custom_post');
} else {
	$aivons_custom_header_id = 'default_header';
}

$aivons_dynamic_header = isset($_GET['custom_header_id']) ? $_GET['custom_header_id'] : $aivons_custom_header_id;
?>

<?php if ('default_header' == $aivons_dynamic_header) : ?>

	<header class="main-header clearfix ">
		<nav class="main-menu clearfix main-menu--default">
			<div class="main-menu-wrapper clearfix">
				<div class="container clearfix">
					<div class="main-menu-wrapper-inner clearfix">
						<div class="main-menu-wrapper__left">
							<div class="main-menu-wrapper__logo">
								<a href="<?php echo esc_url(home_url('/')); ?>">
									<?php
									$aivons_logo_size = get_theme_mod('header_logo_width', 133);
									$aivons_custom_logo_id = get_theme_mod('custom_logo');
									$aivons_logo = wp_get_attachment_image_src($aivons_custom_logo_id, 'full');
									if (has_custom_logo()) {
										echo '<img width="' . esc_attr($aivons_logo_size) . '" src="' . esc_url($aivons_logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
									} else {
										echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
									}
									?>
								</a>
							</div>
							<div class="main-menu-wrapper__main-menu">
								<a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'fallback_cb' => 'aivons_menu_fallback_callback',
										'menu_class' => 'main-menu__list',
									)
								);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<?php if (get_theme_mod('header_stricked_menu', true) && !is_admin_bar_showing()) : ?>
		<div class="stricky-header stricked-menu main-menu main-menu--default">
			<div class="sticky-header__content"></div><!-- /.sticky-header__content -->
		</div><!-- /.stricky-header -->
	<?php endif; ?>


	<div class="mobile-nav__wrapper">
		<div class="mobile-nav__overlay mobile-nav__toggler"></div>
		<!-- /.mobile-nav__overlay -->
		<div class="mobile-nav__content">
			<span class="mobile-nav__close mobile-nav__toggler"></span>

			<div class="logo-box">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<?php
					$aivons_logo_size = get_theme_mod('header_logo_width', 133);
					$aivons_custom_logo_id = get_theme_mod('custom_logo');
					$aivons_logo = wp_get_attachment_image_src($aivons_custom_logo_id, 'full');
					if (has_custom_logo()) {
						echo '<img width="' . esc_attr($aivons_logo_size) . '" src="' . esc_url($aivons_logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
					} else {
						echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
					} ?>
				</a>
			</div>
			<!-- /.logo-box -->
			<div class="mobile-nav__container"></div>
			<!-- /.mobile-nav__container -->

			<ul class="mobile-nav__contact list-unstyled ml-0">
				<?php $aivons_mobile_menu_email = get_theme_mod('aivons_mobile_menu_email'); ?>
				<?php if (!empty($aivons_mobile_menu_email)) : ?>
					<li>
						<i class="fa fa-envelope"></i>
						<a href="mailto:needhelp@packageName__.com"><?php echo esc_html($aivons_mobile_menu_email); ?></a>
					</li>
				<?php endif; ?>
				<?php $aivons_mobile_menu_phone = get_theme_mod('aivons_mobile_menu_phone'); ?>
				<?php if (!empty($aivons_mobile_menu_phone)) : ?>
					<li>
						<i class="fa fa-phone-alt"></i>
						<a href="tel:<?php echo esc_attr(str_replace(' ', '-', $aivons_mobile_menu_phone)); ?>"><?php echo esc_html($aivons_mobile_menu_phone); ?></a>
					</li>
				<?php endif; ?>
			</ul><!-- /.mobile-nav__contact -->

			<div class="mobile-nav__text">
				<?php $aivons_mobile_menu_content = get_theme_mod('aivons_mobile_menu_text'); ?>
				<?php if (!empty($aivons_mobile_menu_content)) : ?>
					<?php echo wp_kses($aivons_mobile_menu_content, 'aivons_allowed_tags'); ?>
				<?php endif; ?>
			</div><!-- /.mobile-nav__text -->

			<div class="mobile-nav__top">
				<div class="mobile-nav__social">
					<?php $aivons_mobile_menu_social = get_theme_mod('mobile_menu_social_icons'); ?>
					<?php if (!empty($aivons_mobile_menu_social)) : ?>
						<?php foreach ($aivons_mobile_menu_social as $social_icon) : ?>
							<a href="<?php echo esc_url($social_icon['link_url']); ?>"><i class="fab <?php echo esc_attr($social_icon['link_icon']); ?>"></i></a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div><!-- /.mobile-nav__social -->
			</div><!-- /.mobile-nav__top -->

		</div>
		<!-- /.mobile-nav__content -->
	</div>
	<!-- /.mobile-nav__wrapper -->




	<?php $aivons_back_to_top_status = get_theme_mod('scroll_to_top', false); ?>
	<?php if (true === $aivons_back_to_top_status) : ?>
		<span data-target="html" class="scroll-to-target scroll-to-top"><i class="fa <?php echo esc_attr(get_theme_mod('scroll_to_top_icon', 'fa-angle-up')); ?>"></i></span>
	<?php endif; ?>

<?php else : ?>
	<?php echo do_shortcode('[aivons-header id="' . $aivons_dynamic_header . '"]');
	?>
<?php endif; ?>