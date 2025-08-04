<?php if ('layout_three' == $settings['layout_type']) : ?>

    <!--FAQS Page Start-->
    <section class="faqs-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <?php if (is_array($settings['faq_lists'])) : ?>
                        <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-<?php echo esc_attr(uniqid()); ?>">
                            <?php
                            $active_question = 1;
                            foreach ($settings['faq_lists'] as $list) :
                            ?>
                                <div class="accrodion <?php echo esc_attr(($active_question == 2 ? 'active' : '')); ?>">
                                    <div class="accrodion-title">
                                        <h4><span>.</span> <?php echo wp_kses($list['question'], 'aivons_allowed_tags'); ?></h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p><?php echo wp_kses($list['answere'], 'aivons_allowed_tags'); ?></p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                            <?php $active_question++;
                            endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!--FAQS Page End-->

<?php endif; ?>