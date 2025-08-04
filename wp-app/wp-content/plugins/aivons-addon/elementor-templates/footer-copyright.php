<footer class="site-footer">
	<div class="container p-0">
		<div class="site-footer-bottom">
			<div class="row">
				<div class="col-xl-12">
					<div class="site-footer-bottom__inner">
						<div class="site-footer-bottom__left">
							<p><?php echo wp_kses($settings['title'], 'aivons_allowed_tags') ?></p>
						</div>
						<?php if (is_array($settings['social_icons'])) : ?>
							<div class="site-footer__social">
								<?php foreach ($settings['social_icons'] as $icon) : ?>
									<a href="<?php echo esc_url($icon['social_url']['url']); ?>"><i class="fab <?php echo esc_attr($icon['social_icon']); ?>"></i></a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>