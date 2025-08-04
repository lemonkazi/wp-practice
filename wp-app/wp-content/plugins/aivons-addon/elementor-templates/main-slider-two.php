<?php if ('layout_two' === $settings['layout_type']) : ?>

	<section class="main-slider main-slider-two">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
            "effect": "fade",
            "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
            },
            "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": {
                "delay": 5000
            }}'>
                <div class="swiper-wrapper">

				<?php foreach ($settings['sliders'] as $slider) : ?>
                    <div class="swiper-slide">
                        <div class="image-layer"
                            style="background-image: url(<?php echo esc_url($slider['background_image']['url']); ?>);">
                        </div>
                        <div class="image-layer-overlay"></div>
                        <div class="main-slider-two-shape-1"
                            style="background-image: url(<?php echo esc_url( get_template_directory_uri() ) ?>/assets/images/shapes/main-slider--two-shape-1.png)"></div>
                        <div class="main-slider-two-shape-2"></div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-slider__content text-center">
									<?php if( !empty( $slider[ 'title' ] ) ) : ?>
                                        <h2><?php echo wp_kses($slider['title'], 'aivons_allowed_tags'); ?></h2>
									<?php endif; ?>
									<?php if( !empty( $slider[ 'sub_title' ] ) ) : ?>
                                        <p><?php echo wp_kses($slider['sub_title'], 'aivons_allowed_tags'); ?></p>
									<?php endif; ?>
									<?php if( !empty( $slider[ 'button_label' ] ) ) : ?>
                                        <a href="<?php echo esc_url($slider['button_url']['url']); ?>" class="thm-btn"><?php echo esc_html($slider['button_label']); ?></a>
									<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>

                </div>
                <!-- If we need navigation buttons -->
                <div class="main-slider__nav main-slider-two__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next"><span
                            class="main-slider__next-text"><?php esc_html_e( 'Next', 'aivons-addon' ); ?></span><i class="icon-right-arrow icon-left-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev"><span
                            class="main-slider__prev-text"><?php esc_html_e( 'Prev', 'aivons-addon' ); ?></span><i class="icon-right-arrow"></i>
                    </div>
                </div>
            </div>
        </section>

<?php endif; ?>