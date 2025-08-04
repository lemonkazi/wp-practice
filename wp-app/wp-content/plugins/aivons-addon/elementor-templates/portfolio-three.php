<?php if ('layout_three' === $settings['layout_type']) : ?>
	<!--Cases One Start-->
	<section class="cases-one cases-page">
		<div class="container">
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
						'orderby' => 'menu_order title',
						'order'   => $settings['query_order'],
						'posts_per_page' => $settings['post_count']['size'],
					));

				endif;
				?>
				<?php while ($post_query_two->have_posts()) : ?>
					<?php $post_query_two->the_post(); ?>
					<div class="col-xl-4 col-lg-6 col-md-6 ">
						<!--Cases One Single-->
						<div class="cases-one__single">
							<div class="cases-one__img-box">
								<?php if (has_post_thumbnail()) : ?>
									<div class="cases-one__img">
										<?php the_post_thumbnail('aivons_case_370X452'); ?>
									</div>
								<?php endif; ?>
								<div class="cases-one__content">
									<div class="cases-one__icon">
										<?php
										$aivons_portfolio_fontawesome = '';
										if ('yes' == get_post_meta(get_the_ID(), 'aivons_portfolio_is_fontawesome', true)) {
											$aivons_portfolio_fontawesome = get_post_meta(get_the_ID(), 'portfolio_fontawesome_type', true);
										}
										?>
										<span class="<?php echo esc_attr(get_post_meta(get_the_iD(), 'aivons_select_portfolio_icon', true) . ' ' . $aivons_portfolio_fontawesome); ?>"></span>
									</div>
									<p class="cases-one__tagline"><?php echo esc_html(get_post_meta(get_the_ID(), 'aivons_portfolio_sub_title', true)); ?></p>
									<h2 class="cases-one__tilte"><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'aivons_allowed_tags'); ?></a></h2>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<!--Cases One End-->

<?php endif; ?>