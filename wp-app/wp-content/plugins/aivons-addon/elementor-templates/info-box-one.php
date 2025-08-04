<?php if ('layout_one' == $settings['layout_type']) : ?>
	   <!--Two Boxes Start-->
	   <section class="two-boxes">
            <div class="container">
                <div class="row">
                    <?php if( is_array( $settings[ 'infobox_itemes' ] ) ) : ?>
                        <?php foreach( $settings[ 'infobox_itemes' ] as $item ): ?>
                            <div class="col-xl-6 col-lg-6">
                                <div class="two-boxes__single">
                                    <div class="two-boxes__single-content">
                                        <div class="two-boxes__count">
                                            <span></span>
                                        </div>
                                        <div class="two-boxes__content">
                                            <h3 class="two-boxes__title"><?php echo wp_kses($item['title'], 'aivons_allowed_tags'); ?></h3>
                                            <p class="two-boxes__text"><?php echo wp_kses($item['sub_title'], 'aivons_allowed_tags'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>
        <!--Two Boxes End-->
<?php endif; ?>