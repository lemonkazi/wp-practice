<?php if ('layout_five' == $settings['layout_type']) : ?>
	<!--About Start-->
	<section class="about">
		<div class="container">
			<div class="row">
				<?php if (!empty($settings['layout_four_image']['url'])) : ?>
					<div class="col-xl-6 col-lg-6">
						<div class="about__img-box">
							<div class="about-img">
								<img src="<?php echo esc_url($settings['layout_four_image']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($settings['layout_four_image']['id'])); ?>">
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="col-xl-6 col-lg-6">
					<div class="about__right">
						<?php if (!empty($settings['layout_five_sec_title'])) : ?>
							<h2 class="about__title"><?php echo wp_kses($settings['layout_five_sec_title'], 'aivons_allowed_tags'); ?></h2>
						<?php endif; ?>
						<?php if (!empty($settings['layout_five_summery']) || !empty($settings['layout_five_icon']['value'])) : ?>
							<div class="about__icon-box">
								<div class="about__icon">
									<span class="<?php echo esc_attr($settings['layout_five_icon']['value']); ?>"></span>
								</div>
								<div class="about__icon-text">
									<p><?php echo wp_kses($settings['layout_five_summery'], 'aivons_allowed_tags'); ?></p>
								</div>
							</div>
						<?php endif; ?>
						<?php if (!empty($settings['layout_five_conent'])) : ?>
							<p class="about__right-text"><?php echo wp_kses($settings['layout_five_conent'], 'aivons_allowed_tags'); ?></p>
						<?php endif; ?>
						<?php if (is_array($settings['layout_five_progressbar'])) : ?>
							<div class="listen__progress-wrap">
								<?php foreach ($settings['layout_five_progressbar'] as $item) : ?>
									<div class="listen__progress">
										<div class="listen__progress-box">
											<div class="circle-progress" data-options='{ "value": 0.9,"thickness": 3,"emptyFill": "#f2f4f8","lineCap": "square", "size": 112, "fill": { "color": "#3c72fc" } }'>
											</div><!-- /.circle-progress -->
											<span><?php echo esc_attr($item['number']); ?>%</span>
										</div>
										<div class="listen__progress-content">
											<h3><?php echo esc_html($item['title']); ?></h3>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<?php if (!empty($settings['contact_title']) ||  !empty($settings['phone'])) : ?>
							<div class="about__phone-contact">
								<div class="about__phone-contact-icon">
									<span class="icon-phone-ringing"></span>
								</div>
								<div class="about__phone-contact-text">
									<p><?php echo esc_html($settings['contact_title']); ?></p>
									<a href="tel:<?php echo esc_attr(str_replace(' ', '-', $settings['phone'])); ?>"><?php echo esc_html($settings['phone']); ?></a>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--About End-->

<?php endif; ?>