<?php if ('layout_two' == $settings['layout_type']) : ?>

<!--Video Two End-->
<section class="listen">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="listen__left">
                  <?php if( !empty( $settings[ 'sec_title' ] ) || !empty( $settings[ 'sec_subtitle' ] ) ) : ?>
                    <?php if( !empty( $settings[ 'sec_title' ] ) ) : ?>
                        <h2 class="listen__title"><?php echo wp_kses($settings['sec_title'], 'aivons_allowed_tags'); ?></h2>
                    <?php endif; ?>
                    <?php if( !empty( $settings[ 'sec_subtitle' ] ) ) : ?>
                        <p class="listen__text"><?php echo wp_kses($settings['sec_subtitle'], 'aivons_allowed_tags'); ?></p>
                    <?php endif; endif; ?>
                    <?php if ( is_array($settings['faq_lists'])) : ?>
                        <div class="listen__progress-wrap">
                          <?php 
							foreach ($settings['progressbar'] as $list) :
							?>
                                <div class="listen__progress">
                                    <div class="listen__progress-box">
                                        <div class="circle-progress"
                                            data-options='{ "value": 0.9,"thickness": 3,"emptyFill": "#ffffff","lineCap": "square", "size": 112, "fill": { "color": "#3c72fc" } }'>
                                        </div><!-- /.circle-progress -->
                                        <span><?php echo esc_html( $list[ 'number' ] ); ?>%</span>
                                    </div>
                                    <div class="listen__progress-content">
                                        <h3><?php echo wp_kses($list['title'], 'aivons_allowed_tags'); ?></h3>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="listen__right">
                    <div class="listen__right-faq">
                        <?php if ( is_array($settings['faq_lists'])) : ?>
                            <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-<?php echo esc_attr(uniqid()); ?>">
                            <?php 
                                $active_question = 1;
                                foreach ($settings['faq_lists'] as $list) :
                                ?>
                                <div class="accrodion <?php echo esc_attr( ( $active_question == 2 ? 'active' : '' ) ); ?>">
                                    <div class="accrodion-title">
                                        <h4><span>.</span><?php echo wp_kses($list['question'], 'aivons_allowed_tags'); ?></h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p><?php echo wp_kses($list['answere'], 'aivons_allowed_tags'); ?></p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                            <?php $active_question++; endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Video Two End-->

<?php endif; ?>