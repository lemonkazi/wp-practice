<?php if ('layout_two' == $settings['layout_type']) : ?>

	  <!--Video Two Start-->
	  <section class="video-two">
            <div class="container">
                <div class="section-title text-center">
					<?php if( !empty( $settings[ 'title' ] ) ) : ?>
                    	<h2 class="section-title__title"><?php echo wp_kses( $settings['title'], 'aivons_allowed_tags' ); ?></h2>
					<?php endif; ?>
					<?php if( !empty( $settings[ 'sub_title' ] )): ?>
                    	<span class="section-title__tagline"><?php echo wp_kses( $settings['sub_title'], 'aivons_allowed_tags' ); ?></span>
					<?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="video-two__img-box">

                            <img src="<?php echo esc_url($settings['image_two']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($settings['image']['id'])); ?>">
							<?php if( !empty( $settings[ 'video_url' ] ) ) : ?>
								<a href="<?php echo esc_url($settings['video_url']); ?>"
									class="video-two__video-btn video-popup">
									<div class="video-two__video-btn-icon">
										<i class="fa fa-play"></i>
										<span class="ripple"></span>
									</div>
								</a>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <!--Video Two End-->

<?php endif; ?>