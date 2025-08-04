<?php if ('layout_one' == $settings['layout_type']) : ?>
	<div class="footer-widget__column footer-widget__newsletter">
		<h3 class="footer-widget__title footer-widget__title-news"><?php echo esc_html($settings['title']); ?></h3>
		<form class="footer-widget__newsletter-form mc-form" data-url="<?php echo esc_attr($settings['mailchimp_url']); ?>">
			<?php if (!empty($settings['subscriber_label'])) : ?>
				<p class="footer-widget__newsletter-text"><?php echo wp_kses($settings['subscriber_label'], 'aivons_allowed_tags'); ?></p>
			<?php endif; ?>
			<div class="footer-widget__newsletter-input-box">
				<input type="email" placeholder="<?php echo esc_attr($settings['mc_input_placeholder']); ?>" name="EMAIL">
				<button type="submit" class="footer-widget__newsletter-btn"><?php echo esc_html($settings['btn_label']); ?></button>
			</div>
		</form>
		<div class="mc-form__response"></div><!-- /.mc-form__response -->
	</div>
<?php endif; ?>