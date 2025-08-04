<?php if ('layout_one' == $settings['layout_type']) : ?>
	<!--Welcome One Start-->
	<section class="welcome-one">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6">
					<div class="welcome-one__left">
						<div class="welcome-one__img-box">
							<?php if (!empty($settings['layout_one_image_one']['url'])) : ?>
								<div class="welcome-one__img-1">
									<img src="<?php echo esc_url($settings['layout_one_image_one']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($settings['layout_one_image_one']['id'])); ?>">
								</div>
							<?php endif; ?>
							<?php if (!empty($settings['layout_one_image_two']['url'])) : ?>
								<div class="welcome-one__img-2">
									<img src="<?php echo esc_url($settings['layout_one_image_two']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($settings['layout_one_image_two']['id'])); ?>">
								</div>
							<?php endif; ?>
							<?php if (!empty($settings['video_url'])) : ?>
								<a href="<?php echo esc_url($settings['video_url']); ?>" class="welcome-one__video-btn video-popup">
									<div class="welcome-one__video-btn-icon">
										<i class="fa fa-play"></i>
										<span class="ripple"></span>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="welcome-one__right">
						<?php if ($settings['title']) : ?>
							<h2 class="welcome-one__title"><?php echo wp_kses($settings['title'], 'aivons_allowed_tags'); ?></h2>
						<?php endif; ?>
						<?php if ($settings['summery']) : ?>
							<p class="welcome-one__text"><?php echo wp_kses($settings['summery'], 'aivons_allowed_tags'); ?></p>
						<?php endif; ?>
						<?php if ($settings['highlighted_text']) : ?>
							<p class="welcome-one__text-two"><?php echo wp_kses($settings['highlighted_text'], 'aivons_allowed_tags'); ?></p>
						<?php endif; ?>
						<?php if (is_array($settings['layout_progress_bar_box'])) : ?>
							<div class="welcome-one__progress">
								<?php foreach ($settings['layout_progress_bar_box'] as $bar) : ?>
									<div class="welcome-one__progress-single">
										<div class="bar">
											<div class="bar-inner count-bar" data-percent="<?php echo esc_attr($bar['progressbar_one_number']['size']); ?>%">
												<div class="count-text"><?php echo esc_attr($bar['progressbar_one_number']['size']); ?>%</div>
											</div>
										</div>
										<h4 class="welcome-one__progress-title"><?php echo wp_kses($bar['progressbar_one_title'], 'aivons_allowed_tags'); ?></h4>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<?php if (!empty($settings['contact_title']) || !empty($settings['phone'])) : ?>
							<div class="welcome-one__call">
								<div class="welcome-one__call-icon">
									<span class="<?php echo esc_attr($settings['contact_icon']['value']); ?>"></span>
								</div>
								<div class="welcome-one__call-text">
									<p><?php echo wp_kses($settings['contact_title'], 'aivons_allowed_tags'); ?></p>
									<a href="tel:<?php echo esc_attr(str_replace(' ', '-', $settings['phone'])); ?>"><?php echo wp_kses($settings['phone'], 'aivons_allowed_tags'); ?></a>
								</div>
							</div>
						<?php endif; ?>
						<?php if (!empty($settings['sidebar-text'])) : ?>
							<div class="welcome-one__big-text"><?php echo esc_html($settings['sidebar-text'], 'aivons_allowed_tags'); ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Welcome One End-->
<?php endif; ?>