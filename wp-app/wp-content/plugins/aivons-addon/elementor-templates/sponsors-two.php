<?php if ('layout_two' == $settings['layout_type']) : ?>

    <!--Brand Three-->
    <section class="brand-three">
            <div class="container">
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
                        <?php foreach( $settings[ 'sponsor_images' ] as $item  ): ?>
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
        <!--Brand Three End-->

<?php endif; ?>