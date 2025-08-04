<?php if ('layout_two' == $settings['layout_type']) : ?>
  <!--CTA One Start-->
  <section class="cta-one">
  			<?php if (!empty($settings['background_image']['url'])) : ?>
           		 <div class="cta-one-bg" style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>)"></div>
			<?php endif; ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-one__inner">
							<?php if( !empty( $settings[ 'title' ] ) ) : ?>
                                <div class="cta-one__left">
                                    <h2 class="cta-one__title"><?php echo wp_kses($settings['title'], 'aivons_allowed_tags'); ?></h2>
                                </div>
							<?php endif; ?>
							<?php if (!empty($settings['button_label'])) : ?>
                                <div class="cta-one__right">
                                    <a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn cta-one__btn"><?php echo esc_html( $settings[ 'button_label' ] ); ?></a>
                                </div>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--CTA One End-->
<?php endif; ?>