<?php if ('layout_two' === $settings['layout_type']) : ?>

	<!--Industries Start-->
	<section class="industries">
	<div class="container">
		<?php if (!empty($settings['title']) || !empty($settings['sub_title']) || !empty($settings['summery']) ) : ?>
			<div class="row">
				<?php if (!empty($settings['title']) || !empty($settings['sub_title']) || !empty($settings['summery']) ) : ?>
					<div class="col-xl-7 col-lg-6">
						<div class="section-title text-left">
							<?php if( !empty( $settings[ 'title' ] ) ) : ?>
								<h2 class="section-title__title"><?php echo wp_kses($settings['title'], 'aivons_allowed_tags'); ?></h2>
							<?php endif; ?>
							<?php if( !empty( $settings[ 'sub_title' ] ) ) : ?>
								<span class="section-title__tagline"><?php echo wp_kses($settings['sub_title'], 'aivons_allowed_tags'); ?></span>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
				
				<?php if( !empty($settings['summery']) ) : ?>
					<div class="col-xl-5 col-lg-6">
						<div class="industries__top-text-box">
							<p class="industries__top-text"><?php echo wp_kses($settings['summery'], 'aivons_allowed_tags'); ?></p>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<ul class="list-unstyled industries__content-box ml-0 <?php echo esc_attr( ( (!empty($settings['title']) || !empty($settings['sub_title']) || !empty($settings['summery']) ) ? 'industries__content-box--service-page' : " ")); ?>">
		<?php
		if( !empty( $settings['select_category']  ) ) :
			$service_two_post_query = new \WP_Query(array(
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
		else:

			$service_two_post_query = new \WP_Query(array(
				'post_type' => 'service',
				'posts_per_page' => $settings['post_count']['size'],
				'orderby' => 'menu_order title',
				'order'   => $settings['query_order'],
			));

		endif;

		while ($service_two_post_query->have_posts()) :
			$service_two_post_query->the_post(); ?>
			<li class="industries__single wow fadeInUp" data-wow-delay="0ms">
				<div class="industries__icon">
				<?php
				$aivons_service_fontawesome = '';
				if ('yes' == get_post_meta(get_the_ID(), 'aivons_is_fontawesome', true)) {
					$aivons_service_fontawesome = get_post_meta(get_the_ID(), 'aivons_fontawesome_type', true);
				}
				?>
				<span class="<?php echo esc_attr(get_post_meta(get_the_iD(), 'aivons_select_service_icon', true) . ' ' . $aivons_service_fontawesome); ?>"></span>
				</div>
				<h3 class="industries__title"><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'aivons_allowed_tags'); ?></a></h3>
				<p class="industries__text"><?php echo wp_kses(aivons_excerpt($settings['post_word_count']['size']), 'aivons_allowed_tags'); ?></p>
			</li>
		<?php endwhile;
		wp_reset_postdata(); ?>
		</ul>
	</div>
	</section>
	<!--Industries End-->

<?php endif; ?>