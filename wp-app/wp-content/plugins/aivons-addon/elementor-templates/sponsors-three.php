<?php if ('layout_three' == $settings['layout_type']) : ?>

	<!--Brand One Start-->
    <section class="brand-one">
        <?php if (!empty($settings['background_image']['url'])) : ?>
            <div class="brand-two-bg" style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>)"></div>
        <?php endif; ?>
        <div class="container">
            <?php if( !empty( $settings[ 'title' ] ) ): ?>
                <h4 class="brand-one__title"><?php echo wp_kses($settings['title'], 'aivons_allowed_tags'); ?></h4>
            <?php endif; ?>
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                    "0": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 30,
                        "slidesPerView": 3
                    },
                    "767": {
                        "spaceBetween": 50,
                        "slidesPerView": 4
                    },
                    "991": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    },
                    "1199": {
                        "spaceBetween": 100,
                        "slidesPerView": 5
                    }
                }}'>
                    <div class="swiper-wrapper">
                        <?php foreach( $settings[ 'sponsor_images' ] as $item ):  ?>
                            <div class="swiper-slide">
                                <a href="<?php echo esc_url( $item[ 'link' ] ); ?>">
                                    <?php echo wp_get_attachment_image($item['image']['id'], 'aivons_brand_logo_150X80'); ?> 
                                </a>
                            </div><!-- /.swiper-slide -->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--Brand One End-->

<?php endif; ?>