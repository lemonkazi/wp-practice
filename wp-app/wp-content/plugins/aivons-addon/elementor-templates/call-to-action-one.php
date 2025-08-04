<?php if ('layout_one' == $settings['layout_type']) : ?>

	<!--Our Mission Start-->
	<section class="our-mission">
			<?php if (!empty($settings['background_image']['url'])) : ?>
				<div class="our-mission-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
					style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>)"></div>
			<?php endif; ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="our-mission__inner">
						<?php if (!empty($settings['title'])) : ?>
                            <h2 class="our-mission__title"><?php echo wp_kses($settings['title'], 'aivons_allowed_tags'); ?></h2>
						<?php endif; ?>
						<?php if (!empty($settings['button_label'])) : ?>
                            <a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="thm-btn our-mission__btn"><?php echo esc_html($settings['button_label']); ?></a>
						<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Our Mission End-->

<?php endif; ?>