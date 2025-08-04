<?php if ('layout_one' == $settings['layout_type']) : ?>

	<!--Faq One Start-->
	<section class="faq-one">
		<div class="container">
			<?php if (!empty($settings['sec_title']) || !empty($settings['sec_subtitle'])) : ?>
				<div class="section-title text-center">
					<?php if (!empty($settings['sec_title'])) : ?>
						<h2 class="section-title__title"><?php echo wp_kses($settings['sec_title'], 'aivons_allowed_tags'); ?></h2>
					<?php endif; ?>
					<?php if (!empty($settings['sec_subtitle'])) : ?>
						<span class="section-title__tagline"><?php echo wp_kses($settings['sec_subtitle'], 'aivons_allowed_tags'); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="row">
				<div class="col-xl-6">
					<?php if (!empty($settings['faq_lists'])) : ?>
						<div class="faq-one__left">
							<div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-<?php echo esc_attr(uniqid()); ?>">
								<?php
								$active_question = 1;
								foreach ($settings['faq_lists'] as $list) :
								?>
									<div class="accrodion <?php echo esc_attr(($active_question == 1 ? 'active' : '')); ?>">
										<div class="accrodion-title">
											<h4><span>.</span> <?php echo wp_kses($list['question'], 'aivons_allowed_tags'); ?></h4>
										</div>
										<div class="accrodion-content">
											<div class="inner">
												<p><?php echo wp_kses($list['answere'], 'aivons_allowed_tags'); ?></p>
											</div><!-- /.inner -->
										</div>
									</div>
								<?php $active_question++;
								endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-xl-6">
					<div class="faq-one__right">
						<?php if (!empty($settings['image']['url'])) : ?>
							<div class="faq-one__img">
								<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($settings['image']['id'])); ?>">
							</div>
						<?php endif; ?>
						<?php if (!empty($settings['check_list'])) : ?>
							<div class="faq-one__bottom">
								<div class="faq-one__list-box">
									<ul class="list-unstyled faq-one__list ml-0">
										<?php
										foreach ($settings['check_list'] as $check_list) :
										?>
											<li>
												<div class="icon">
													<span class="<?php echo esc_attr($check_list['icon']['value']); ?>"></span>
												</div>
												<div class="text">
													<p><?php echo wp_kses($check_list['title'], 'aivons_allowed_tags'); ?></p>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
								<?php if (!empty($settings['ex_year'] || !empty($settings['ex_text']))) : ?>
									<div class="faq-one__experience-box">
										<h2><?php echo esc_html($settings['ex_year']); ?></h2>
										<p><?php echo wp_kses($settings['ex_text'], 'aivons_allowed_tags'); ?></p>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Faq One End-->

<?php endif; ?>