<?php if ('layout_one' === $settings['layout_type']) : ?>

 	<!--Real World Start-->
	<section class="real-world">
		<?php if (!empty($settings['background_image']['url'])) : ?>
			<div class="real-world-shape wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"
				style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>)"></div>
		<?php endif; ?>
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
					if( !empty( $settings['select_category'] ) ) :
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
					else:
						$service_one_post_query = new \WP_Query(array(
							'post_type' => 'service',
							'posts_per_page' => $settings['post_count']['size'],
							'orderby' => 'menu_order title',
							'order'   => $settings['query_order'],
						));

					endif;

					while ($service_one_post_query->have_posts()) :
						$service_one_post_query->the_post(); ?>
						<div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" >
							<!--Real World Single-->
							<div class="real-world__single">
								<h2 class="real-world__title">
									<a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'aivons_allowed_tags'); ?></a>
								</h2>
								<a href="<?php the_permalink(); ?>" class="real-world__btn"><?php esc_html_e( 'Read More', 'aivons-addon' ); ?></a>
								<div class="real-world__icon-box">
								<?php
									$aivons_service_fontawesome = '';
									if ('yes' == get_post_meta(get_the_ID(), 'aivons_is_fontawesome', true)) {
										$aivons_service_fontawesome = get_post_meta(get_the_ID(), 'aivons_fontawesome_type', true);
									}
									?>
									<span class="<?php echo esc_attr(get_post_meta(get_the_iD(), 'aivons_select_service_icon', true) . ' ' . $aivons_service_fontawesome); ?>"></span>
								</div>
							</div>
						</div>
					<?php endwhile;
					wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<!--Real World Start-->

<?php endif; ?>