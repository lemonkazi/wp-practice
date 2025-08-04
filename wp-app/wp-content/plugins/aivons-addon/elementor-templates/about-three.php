<?php if ('layout_three' == $settings['layout_type']) : ?>
        <!--Financial Start-->
        <section class="financial">
            <div class="container">
		    	<?php if (!empty($settings['layout_three_sec_title']) || !empty($settings['layout_three_sec_subtitle'])) : ?>
					<div class="section-title text-left">
					<?php if (!empty($settings['layout_three_sec_title']) ) : ?>
						<h2 class="section-title__title"><?php echo wp_kses($settings['layout_three_sec_title'], 'aivons_allowed_tags'); ?></h2>
					<?php endif; ?>
					<?php if ( !empty($settings['layout_three_sec_subtitle'])) : ?>
						<span class="section-title__tagline"><?php echo wp_kses($settings['layout_three_sec_subtitle'], 'aivons_allowed_tags'); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="financial__left">
                            <div class="row">
								<?php if( !empty($settings['layout_three_image_one']['url'] )) : ?>
									<div class="col-xl-6 col-lg-6">
										<div class="financial__left-img-box">
											<div class="financial__left-img">
												<img src="<?php echo esc_attr($settings['layout_three_image_one']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($settings['layout_three_image_one']['url'])); ?>">
											</div>
										</div>
									</div>
								<?php endif; ?>
								<?php if( !empty($settings['layout_three_image_two']['url'] )) : ?>
									<div class="col-xl-6 col-lg-6">
										<div class="financial__left-img-box">
											<div class="financial__left-img mar-b-0">
											<img src="<?php echo esc_attr($settings['layout_three_image_two']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($settings['layout_three_image_two']['url'])); ?>">
											</div>
										</div>
									</div>
								<?php endif; ?>
                            </div>
							<?php if( !empty( $settings[ 'layout_three_highlight' ] ) ) : ?>
								<div class="financial__left-note-box">
									<h2 class="financial__left-note-title">
										<?php echo wp_kses($settings['layout_three_highlight'], 'aivons_allowed_tags'); ?>
									</h2>
								</div>
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="financial__right">
                            <div class="financial__right-content">
								<?php if( !empty( $settings[ 'layout_three_content' ] ) ) : ?>
                                <p class="financial__right-text"><?php echo wp_kses($settings['layout_three_content'], 'aivons_allowed_tags'); ?></p>
								<?php endif; ?>
								<?php if( is_array( $settings[ 'layout_three_lists' ] ) ): ?>
									<ul class="list-unstyled financial__right__list ml-0">
										<?php foreach( $settings[ 'layout_three_lists' ] as $item ) : ?>
											<li><?php echo esc_html( $item[ 'title' ] ); ?></li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Financial End-->
<?php endif; ?>