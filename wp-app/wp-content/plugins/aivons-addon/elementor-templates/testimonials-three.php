<?php if ('layout_three' == $settings['layout_type']) : ?>
   	<!--Testimonials One Start-->
		<section class="testimonials-one testimonials-one--page">
			<div class="container">
				<div class="row">
					<?php $testimonials_thumb_post_query = new \WP_Query(array(
							'post_type' => 'testimonial',
							'posts_per_page' => $settings['post_count']['size']
						));
					?>
					<?php while ($testimonials_thumb_post_query->have_posts()) : ?>
						<?php $testimonials_thumb_post_query->the_post(); ?>
						<div class="col-md-6 col-lg-4">
							<!--Testimonials One Single-->
							<div class="testimonials-one__single">
								<p class="testimonials-one__text">
								<?php
								// giving hook for flexiblity
								$aivons_testimonials_word_count = apply_filters('aivons_testimonials_word_count', $settings['post_word_count']['size']);

								echo wp_kses(wp_trim_words(get_post_meta(get_the_ID(), 'aivons_content', true), $aivons_testimonials_word_count, ''), 'aivons_allowed_tags'); ?>
								</p>
								<div class="testimonials-one__client-info">
									<h5 class="testimonials-one__client-name"><?php the_title(); ?></h5>
									<p class="testimonials-one__client-title"><?php echo esc_html(get_post_meta(get_the_ID(), 'aivons_designation', true)); ?></p>
								</div>
								<?php if( has_post_thumbnail() ) : ?>
								<div class="testimonials-one__client-img">
									<?php the_post_thumbnail( 'aivons_testimonials_77X77' ); ?>
								</div>
								<?php endif; ?>
								<div class="testimonials-one__quote"></div>
							</div>
						</div><!-- /.col-md-6 -->
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
		<!--Testimonials One End-->
<?php endif; ?>