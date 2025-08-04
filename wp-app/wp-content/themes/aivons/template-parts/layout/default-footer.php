<?php

/**
 * Template part for displaying footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aivons
 */
?>


<?php
$aivons_page_id     = get_queried_object_id();
$aivons_custom_footer_status = !empty(get_post_meta($aivons_page_id, 'aivons_custom_footer_status', true)) ? get_post_meta($aivons_page_id, 'aivons_custom_footer_status', true) : 'off';

$aivons_custom_footer_id = '';
if ((is_page() && 'on' === $aivons_custom_footer_status) || (is_singular('portfolio') && 'on' === $aivons_custom_footer_status) || (is_singular('service') && 'on' === $aivons_custom_footer_status)) {
	$aivons_custom_footer_id = get_post_meta($aivons_page_id, 'aivons_select_custom_footer', true);
} elseif (true == get_theme_mod('footer_custom')) {
	$aivons_custom_footer_id = get_theme_mod('footer_custom_post');
} else {
	$aivons_custom_footer_id = 'default_footer';
}

$aivons_dynamic_footer = isset($_GET['custom_footer_id']) ? $_GET['custom_footer_id'] : $aivons_custom_footer_id;
?>


<?php if ('default_footer' == $aivons_dynamic_footer) : ?>
	<!--Site Footer One Start-->
	<footer class="site-footer">
		<div class="site-footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="site-footer-bottom__inner default">
							<p class="site-footer__bottom-text">
								<?php echo wp_kses(get_theme_mod('footer_copytext', esc_html__('&copy; Copyright 2021 by Aivons WordPress Theme', 'aivons')), 'aivons_allowed_tags'); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--Site Footer One End-->

<?php else : ?>
	<?php echo do_shortcode('[aivons-footer id="' . $aivons_dynamic_footer . '"]');
	?>
<?php endif; ?>