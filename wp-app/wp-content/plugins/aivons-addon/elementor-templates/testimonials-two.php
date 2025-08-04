<?php if ('layout_two' == $settings['layout_type']) : ?>
	<!--Testimonial Two-->
	<section class="testimonial-two">
		<div class="container">

			<div class="row">
				<div class="col-xl-12">
					<div class="testimonial-two__slider">
						<div class="row">
							<div class="col-xl-2 col-lg-2 col-md-2">
								<div class="slider-pager">
									<div class="swiper-container testimonial-two__thumb-box "
										id="testimonials-one__thumb">
										<div class="swiper-wrapper">
										<?php $testimonials_thumb_post_query = new \WP_Query(array(
												'post_type' => 'testimonial',
												'posts_per_page' => $settings['post_count']['size']
											));
										?>
										<?php while ($testimonials_thumb_post_query->have_posts()) : ?>
											<?php $testimonials_thumb_post_query->the_post(); ?>
											<div class="swiper-slide">
												<div class="testimonial-two__img-holder">
													<?php the_post_thumbnail('aivons_testimonials_92x92'); ?>
												</div>
											</div>
											<?php endwhile; ?>
											<?php wp_reset_postdata(); ?>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-10 col-lg-10 col-md-10">
								<div class="testimonials-two__main-content">
									<div class="slider-content swiper-container" id="testimonials-one__carousel">
										<div class="swiper-wrapper">
										<?php $testimonials_post_query = new \WP_Query(array(
											'post_type' => 'testimonial',
											'posts_per_page' => $settings['post_count']['size']
										)); ?>
										<?php while ($testimonials_post_query->have_posts()) : ?>
										 <?php $testimonials_post_query->the_post(); ?>
											<div class="swiper-slide">
												<div class="testimonial-two__conent-box">
													<p class="testimonial-two__text">
													<?php
													// giving hook for flexiblity
													$aivons_testimonials_word_count = apply_filters('aivons_testimonials_word_count', $settings['post_word_count']['size']);

													echo wp_kses(wp_trim_words(get_post_meta(get_the_ID(), 'aivons_content', true), $aivons_testimonials_word_count, ''), 'aivons_allowed_tags'); ?>
													</p>
													<div class="testimonial-two__client-details">
														<h4 class="testimonial-two__client-name"><?php the_title(); ?></h4>
														<span class="testimonial-two__clinet-title"><?php echo esc_html(get_post_meta(get_the_ID(), 'aivons_designation', true)); ?></span>
													</div>
												</div>
											</div>
										<?php endwhile; ?>
										<?php wp_reset_postdata(); ?>
										</div>
									</div>
									<div class="testimonial-two__nav">
										<div class="testimonials-one__carousel__nav testimonial-two__nav-list">
											<div class="swiper-button-prev slider-prev"
												id="testimonials-one__carousel__swiper-button-next"><i
													class="icon-right-arrow1 icon-prev"></i></div>
											<div class="swiper-button-next slider-next"
												id="testimonials-one__carousel__swiper-button-prev"><i
													class="icon-right-arrow1"></i></div>
										</div>
									</div><!-- /.testimonial-two__nav -->
								</div>

							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>