<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!--Locations Start-->
    <section class="locations">
        <div class="container">
            <div class="location__inner">
                <?php if (!empty($settings['layout_two_sec_title']) || !empty($settings['layout_two_sec_subtitle'])) : ?>
                    <div class="section-title text-center">
                        <?php if (!empty($settings['layout_two_sec_title'])) : ?>
                            <h2 class="section-title__title"><?php echo wp_kses($settings['layout_two_sec_title'], 'aivons_allowed_tags'); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_two_sec_subtitle'])) : ?>
                            <span class="section-title__tagline"><?php echo wp_kses($settings['layout_two_sec_subtitle'], 'aivons_allowed_tags'); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <?php if (is_array($settings['layout_two_item'])) : ?>
                        <?php foreach ($settings['layout_two_item'] as $item) : ?>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms">
                                <!--Locations Single-->
                                <div class="locations__single">
                                    <h3 class="locations__title"><?php echo esc_html($item['title']); ?></h3>
                                    <p class="locations__text"><?php echo esc_html($item['text']); ?></p>
                                    <h4 class="locations__mail-phone-box">
                                        <a href="<?php echo esc_attr($item['email']); ?>" class="locations__mail"><?php echo esc_html($item['email']); ?></a>
                                        <a href="tel:<?php echo esc_attr(str_replace(' ', '-', $settings['phone'])); ?>" class="locations__phone"><?php echo esc_html($item['phone']); ?></a>
                                    </h4>
                                </div>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!--Locations End-->
<?php endif; ?>