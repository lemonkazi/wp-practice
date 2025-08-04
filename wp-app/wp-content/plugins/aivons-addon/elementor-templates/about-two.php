<?php if ('layout_two' == $settings['layout_type']) : ?>

	<!--Two Section Start-->
	<section class="two-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-7">
					<div class="two-section__left">
						<ul class="list-unstyled two-section__img-box ml-0">
							<?php if ( !empty($settings['layout_two_image_one']['url'] )): ?>
								<li class="two-section__img-box-single">
									<div class="two-section-img">
										<img src="<?php echo esc_attr($settings['layout_two_image_one']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($settings['layout_two_image_one']['id'])); ?>">
										<?php if( !empty($settings[ 'layout_two_image_one_caption' ]  ) ) : ?>
											<div class="two-section__points">
												<div class="icon">
													<span class="icon-tick"></span>
												</div>
													<div class="text">
														<p><?php echo esc_html( $settings[ 'layout_two_image_one_caption' ] ); ?></p>
													</div>
											</div>
										<?php endif; ?>
									</div>
								</li>
							<?php endif; ?>
							<?php if ( !empty($settings['layout_two_image_two']['url'] )): ?>
								<li class="two-section__img-box-single">
									<div class="two-section-img">
										<img src="<?php echo esc_attr($settings['layout_two_image_two']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($settings['layout_two_image_two']['id'])); ?>">
										<?php if( !empty($settings[ 'layout_two_image_two_caption' ]  ) ) : ?>
											<div class="two-section__points">
												<div class="icon">
													<span class="icon-tick"></span>
												</div>
											<div class="text">
													<p><?php echo esc_html( $settings[ 'layout_two_image_two_caption' ] ); ?></p>
													</div>
											</div>
										<?php endif; ?>
									</div>
								</li>
							<?php endif; ?>
						</ul>
						<?php if( !empty( $settings[ 'layout_two_sec_title' ] ) ) : ?>
							<h2 class="two-section__left-title"><?php echo wp_kses($settings['layout_two_sec_title'], 'aivons_allowed_tags'); ?></h2>
						<?php endif; ?>
						<?php if( !empty( $settings[ 'layout_two_icon' ] ) || !empty( $settings[ 'layout_two_icon_caption' ] ) || !empty( $settings[ 'layout_two_summery' ] ) ): ?>
							<div class="two-section__middle-content">
								<?php if( !empty( $settings[ 'layout_two_icon' ] ) || !empty( $settings[ 'layout_two_icon_caption' ] ) ): ?>
									<div class="two-section__middle-content-icon">
										<span class="<?php echo esc_attr( $settings[ 'layout_two_icon' ][ 'value' ] ); ?>"></span>
										<h3><?php echo esc_html( $settings[ 'layout_two_icon_caption' ] ); ?></h3>
									</div>
								<?php endif; ?>
								<?php if( !empty( $settings[ 'layout_two_summery' ] ) ): ?>
									<div class="two-section__middle-content-text-box">
										<p class="two-section__middle-content-text"><?php echo wp_kses($settings['layout_two_summery'], 'aivons_allowed_tags'); ?></p>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php if( !empty( $settings[ 'layout_two_conent' ] ) ): ?>
							<p class="two-section__bottom-text-box"><?php echo wp_kses($settings['layout_two_conent'], 'aivons_allowed_tags'); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-xl-5">
					<div class="two-section__right">
						<div class="contact-expert">
							<?php if( !empty( $settings[ 'contact_form_title' ] ) || !empty( $settings[ 'contact_form_sub_title' ] )  ): ?>
								<div class="contact-expert__top-title">

									<h3 class="contact-expert__title"><?php echo wp_kses($settings['contact_form_title'], 'aivons_allowed_tags'); ?></h3>

									<span class="contact-expert__tagline"><?php echo wp_kses($settings['contact_form_sub_title'], 'aivons_allowed_tags'); ?></span>

								</div>
							<?php endif; ?>
							<?php if (!empty($settings['select_wpcf7_form'])) : ?>
								<?php echo do_shortcode('[contact-form-7 id="' . $settings['select_wpcf7_form'] . '" ]'); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Two Section End-->

<?php endif; ?>