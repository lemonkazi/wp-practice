<!--Message Box Start-->
<section class="message-box">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="message-box__left">
                    <?php if (!empty($settings['layout_one_title']) || !empty($settings['layout_one_sub_title'])) : ?>
                        <div class="section-title text-left">
                        <?php if ( !empty($settings['layout_one_title'] ) ) : ?>
                            <h2 class="section-title__title"><?php echo wp_kses($settings['layout_one_title'], 'aivons_allowed_tags'); ?></h2>
                        <?php endif; ?>
                        <?php if ( !empty($settings['layout_one_sub_title'] ) ) : ?>
                            <span class="section-title__tagline"><?php echo wp_kses($settings['layout_one_sub_title'], 'aivons_allowed_tags'); ?></span>
                        <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( is_array( $settings[ 'social_icons' ] ) ): ?>
                        <div class="message-box__social">
                            <?php foreach( $settings[ 'social_icons' ] as $item ): ?>
                                <a href="<?php echo esc_url( $item[ 'social_url' ][ 'url' ] ); ?>"><i class="fab <?php echo esc_attr( $item[ 'social_icon' ] ); ?>"></i></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="message-box__right">
                    <?php if (!empty($settings['select_wpcf7_form'])) : ?>
                            <?php echo do_shortcode('[contact-form-7 id="' . $settings['select_wpcf7_form'] . '" ]'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Message Box End-->

