<?php if ('layout_five' === $settings['layout_type']) : ?>

	<!--Services One Start-->
	<section class="services-one services-page">
		<div class="container">
			<div class="row">
				<?php
				if (!empty($settings['select_category'])) :
					$service_one_post_query = new \WP_Query(array(
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
					$service_one_post_query = new \WP_Query(array(
						'post_type' => 'service',
						'posts_per_page' => $settings['post_count']['size'],
						'orderby' => 'menu_order title',
						'order'   => $settings['query_order'],
					));

				endif;
				while ($service_one_post_query->have_posts()) :
					$service_one_post_query->the_post(); ?>
					<div class="col-xl-4 col-lg-6 col-md-6 ">
						<!--Services One Single-->
						<div class="services-one__single">
							<?php if (has_post_thumbnail()) : ?>
								<div class="services-one__img">
									<?php the_post_thumbnail('aivons_service_370X252'); ?>
								</div>
							<?php endif; ?>
							<div class="services-one__content">
								<h3 class="services-one__title"><a href="<?php the_permalink(); ?>"><?php echo strip_tags(get_the_title()); ?></a>
								</h3>
								<p class="services-one__text"><?php echo wp_kses(aivons_excerpt($settings['post_word_count']['size']), 'aivons_allowed_tags'); ?></p>
								<a href="<?php the_permalink(); ?>" class="services-one__btn"><?php echo esc_html_e('Read More', 'aivons-addon'); ?></a>
							</div>
						</div>
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<!--Services One End-->

<?php endif; ?>