<?php if ('layout_three' == $settings['layout_type']) : ?>
        <!--CTA Two Start-->
        <section class="cta-two">
        <?php if (!empty($settings['background_image']['url'])) : ?>
            <div class="cta-two-bg" style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>)"></div>
        <?php endif; ?>
            <div class="cta-two-bg-overly"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-two__inner">
                            <?php if( !empty( $settings[ 'title' ] ) ) : ?>
                                <h2 class="cta-two__title"><?php echo wp_kses( $settings[ 'title' ], $aivons_allowed_tags ); ?></h2>
                            <?php endif; ?>
                            <?php  if( ! empty( $settings[ 'sub_title' ] ) ): ?>
                                <p class="cta-two__text"><?php echo wp_kses( $settings[ 'sub_title' ], $aivons_allowed_tags ); ?></p>
                            <?php endif; ?>
                            <ul class="list-unstyled cta-two__icon-box">
                                <?php
                                    if( is_array( $settings[ 'Cta_items' ] ) ) :
                                    foreach( $settings[ 'Cta_items' ] as $item ):
                                ?>
                                    <li>
                                        <a href="<?php echo esc_url( $item[ 'url' ] ); ?>">
                                            <div class="cta-two__icon">
                                                <span class="<?php  echo esc_attr( $item[ 'icon' ][ 'value' ] ); ?>"></span>
                                            </div> 
                                        </a>
                                    </li>
                                <?php endforeach; endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CTA Two End-->
<?php endif; ?>