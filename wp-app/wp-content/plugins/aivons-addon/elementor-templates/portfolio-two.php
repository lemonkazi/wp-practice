<?php if ('layout_two' == $settings['layout_type']) : ?>
	<!--Cases Two Start-->
	<section class="cases-two">
		<div class="container">
			<?php if (!empty($settings['title']) || !empty($settings['sub_title'])) : ?>
				<div class="section-title text-center">
					<?php if (!empty($settings['title'])) : ?>
						<h2 class="section-title__title"><?php echo wp_kses($settings['title'], 'aivons_allowed_tags'); ?></h2>
					<?php endif; ?>
					<?php if (!empty($settings['sub_title'])) : ?>
						<span class="section-title__tagline"><?php echo wp_kses($settings['sub_title'], 'aivons_allowed_tags'); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="row">
				<?php
				if (!empty($settings['select_category'])) :
					$post_query_two = new \WP_Query(array(
						'post_type' => 'portfolio',
						'posts_per_page' => $settings['post_count']['size'],
						'orderby' => 'menu_order title',
						'order'   => $settings['query_order'],
						'tax_query' => array(
							array(
								'taxonomy' => 'portfolio_cat',
								'field' => 'term_id',
								'terms' => $settings['select_category']
							)
						)
					));
				else :

					$post_query_two = new \WP_Query(array(
						'post_type' => 'portfolio',
						'posts_per_page' => $settings['post_count']['size'],
						'orderby' => 'menu_order title',
						'order'   => $settings['query_order'],
					));

				endif;
				?>
				<?php while ($post_query_two->have_posts()) : ?>
					<?php $post_query_two->the_post(); ?>
					<div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<!--Cases Two Sinlge-->
						<div class="cases-two__single">
							<div class="casees-two__img-box">
								<div class="cases-two__img">
									<?php the_post_thumbnail('aivons_case_two_570X412'); ?>
								</div>
								<div class="cases-two__content">
									<div class="cases-two__icon-box-details">
										<div class="cases-two__icon">
											<?php
											$aivons_portfolio_fontawesome = '';
											if ('yes' == get_post_meta(get_the_ID(), 'aivons_portfolio_is_fontawesome', true)) {
												$aivons_portfolio_fontawesome = get_post_meta(get_the_ID(), 'portfolio_fontawesome_type', true);
											}
											?>
											<span class="<?php echo esc_attr(get_post_meta(get_the_iD(), 'aivons_select_portfolio_icon', true) . ' ' . $aivons_portfolio_fontawesome); ?>"></span>
										</div>
										<p class="cases-two__tagline"><?php echo esc_html(get_post_meta(get_the_ID(), 'aivons_portfolio_sub_title', true)); ?></p>
										<h2 class="cases-two__tilte"><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'aivons_allowed_tags'); ?></a></h2>
									</div>
									<div class="cases-two__text-box">
										<p class="cases-two__text-bottom">
											<?php
											// giving hook for flexiblity
											$aivons_portfolio_content_count = apply_filters('aivons_portfolio_content_count', $settings['post_word_count']['size']);
											aivons_excerpt($aivons_portfolio_content_count); ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			</div>
		</div>
	</section>
	<!--Cases Two End-->
<?php endif; ?>