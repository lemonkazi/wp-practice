<div class="footer-widget__column footer-widget__about">
	<div class="footer-widget__about-logo">
		<a href="<?php echo esc_url(home_url('/')); ?>"><img id="fLogo" src="<?php echo esc_attr($settings['logo']['url']); ?>" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a>
	</div>
	<?php if (!empty($settings['text'])) : ?>
		<p class="footer-widget__text"><?php echo wp_kses($settings['text'], 'aivons_allowed_tags'); ?></p>
	<?php endif; ?>
	<?php if (!empty($settings['phone']) || !empty($settings['email']) || !empty($settings['address'])) : ?>
		<ul class="list-unstyled footer-widget__contact-list ml-0">
			<?php if (!empty($settings['phone'])) : ?>
				<li>
					<div class="icon">
						<i class="fas fa-phone-square-alt"></i>
					</div>
					<div class="text">
						<p><a href="tel:<?php echo esc_attr(str_replace(' ', '-', $settings['phone'])); ?>"><?php echo esc_html($settings['phone']); ?></a></p>
					</div>
				</li>
			<?php endif; ?>
			<?php if (!empty($settings['email'])) : ?>
				<li>
					<div class="icon">
						<i class="fas fa-envelope"></i>
					</div>
					<div class="text">
						<p><a href="mailto:<?php echo esc_attr($settings['email']); ?>"><?php echo esc_html($settings['email']); ?></a></p>
					</div>
				</li>
			<?php endif; ?>
			<?php if (!empty($settings['address'])) : ?>
				<li>
					<div class="icon">
						<i class="fas fa-map-marker-alt"></i>
					</div>
					<div class="text">
						<p><?php echo esc_html($settings['address']); ?></p>
					</div>
				</li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>
</div>