<?php if ('layout_four' === $settings['layout_type']) : ?>
	<!--Services Two Start-->
	<section class="services-two">
		<div class="container">
			<?php if (!empty($settings['title']) || !empty($settings['sub_title']) || !empty($settings['summery'])) : ?>
				<div class="row">
					<?php if (!empty($settings['title']) || !empty($settings['sub_title'])) : ?>
						<div class="<?php echo esc_attr((!empty($settings['summery'])) ? 'col-xl-6 col-lg-6' : 'col-xl-12 col-lg-12'); ?>">
							<div class="services-two__top-left">
								<div class="section-title text-left">
									<?php if (!empty($settings['title'])) : ?>
										<h2 class="section-title__title"><?php echo wp_kses($settings['title'], 'aivons_allowed_tags'); ?></h2>
									<?php endif; ?>
									<?php if (!empty($settings['sub_title'])) : ?>
										<span class="section-title__tagline"><?php echo wp_kses($settings['sub_title'], 'aivons_allowed_tags'); ?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if (!empty($settings['summery'])) : ?>
						<div class="<?php echo esc_attr((!empty($settings['title']) || !empty($settings['sub_title'])) ? 'col-xl-6 col-lg-6' : 'col-xl-12 col-lg-12'); ?>">
							<div class="services-two__top-right">
								<p class="services-two__top-right-text"><?php echo wp_kses($settings['summery'], 'aivons_allowed_tags'); ?></p>
							</div>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="row">
				<?php
				if (!empty($settings['select_category'])) :
					$service_four_post_query = new \WP_Query(array(
						'post_type' => 'service',
						'posts_per_page' => $settings['post_count']['size'],
						'orderby' => 'menu_order title',
						'order'   => $settings['query_order'],
						'tax_query' => array(
							array(
								'taxonomy' => 'service_cat',
								'field' => 'term_id',
								'terms' => $settings['select_category']
							)
						)
					));
				else :

					$service_four_post_query = new \WP_Query(array(
						'post_type' => 'service',
						'posts_per_page' => $settings['post_count']['size'],
						'orderby' => 'menu_order title',
						'order'   => $settings['query_order'],
					));

				endif;

				while ($service_four_post_query->have_posts()) :
					$service_four_post_query->the_post(); ?>
					<div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<!--Services Two Single-->
						<div class="services-two__single">
							<div class="services-two__icon">
								<?php
								$aivons_service_main_fontawesome = '';
								if ('yes' == get_post_meta(get_the_ID(), 'aivons_is_fontawesome', true)) {
									$aivons_service_main_fontawesome = get_post_meta(get_the_ID(), 'aivons_fontawesome_type', true);
								}
								?>
								<span class="<?php echo esc_attr(get_post_meta(get_the_iD(), 'aivons_select_service_icon', true) . ' ' . $aivons_service_main_fontawesome); ?>"></span>
							</div>
							<h3 class="services-two__title"><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'aivons_allowed_tags'); ?></a>
							</h3>
							<p class="services-two__text"><?php echo wp_kses(aivons_excerpt($settings['post_word_count']['size']), 'aivons_allowed_tags'); ?></p>
							<a href="<?php the_permalink(); ?>" class="services-two__arrow">
								<span class="icon-right-arrow1"></span>
							</a>
						</div>
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<!--Services Two End-->

<?php endif; ?>