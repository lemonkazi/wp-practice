<?php if ('layout_one' == $settings['layout_type']) : ?>

    <!--Largest Business Start-->
	<section class="largest-business">
            <div class="largest-business__layer-outer">
                <div class="largest-business__layer-outer-left"
                    style="background-image: url(<?php echo esc_url( AIVONS_ADDON_ASSETS ); ?>/images/backgrounds/largest-business-left-bg.jpg)"></div>
				<?php if (!empty($settings['image_one']['url'])) : ?>
					<div class="largest-business__layer-outer-right"
						style="background-image: url(<?php echo esc_attr($settings['image_one']['url']); ?>)"></div>
				<?php endif; ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="largest-business__left">
							<?php if( !empty( $settings[ 'sec_title' ] ) ) : ?>
                          	  <h2 class="largest-business__title"><?php echo wp_kses( $settings['sec_title'], 'aivons_allowed_tags' ); ?></h2>
							<?php endif; ?>
                            <ul class="list-unstyled largest-business__list-box ml-0">
								<?php if (!empty($settings['check_list'])) : ?>
									<?php foreach ($settings['check_list'] as $check_list) : ?>
										<li>
											<div class="largest-business__icon">
												<span class="<?php echo esc_attr( $check_list[ 'icon' ]['value' ] ); ?>"></span>
											</div>
											<div class="largest-business__list-box-content">
												<h3 class="largest-business__list-box-title"><?php echo wp_kses( $check_list['title'], 'aivons_allowed_tags' ); ?></h3>
												<p class="largest-business__list-box-text"><?php echo wp_kses( $check_list[ 'sub_title' ], 'aivons_allowed_tags' ) ?></p>
											</div>
										</li>
									<?php endforeach; ?>
								<?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>
        <!--Largest Business End-->

<?php endif; ?>