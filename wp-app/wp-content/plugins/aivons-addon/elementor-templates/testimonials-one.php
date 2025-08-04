<?php if ('layout_one' == $settings['layout_type']) : ?>

	 <!--Testimonials One Start-->
	 <section class="testimonials-one">
            <div class="container">
                <div class="row">
					<?php if (!empty($settings['title']) || !empty($settings['sub_title']) ) : ?>
						<div class="col-xl-4">
							<div class="testimonials-one__left">
								<div class="section-title text-left">
									<?php if( !empty( $settings[ 'title' ] ) ) : ?>
										<h2 class="section-title__title"><?php echo wp_kses($settings['title'], 'aivons_allowed_tags'); ?></h2>
									<?php endif; ?>
									<?php if( !empty( $settings[ 'sub_title' ] ) ) : ?>
										<span class="section-title__tagline"><?php echo wp_kses($settings['sub_title'], 'aivons_allowed_tags'); ?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php endif; ?>
                    <div class="col-xl-8">
                        <div class="testimonials-one__right">
                            <div class="testimonials-one__carousel owl-theme owl-carousel">
							<?php $testimonials_thumb_post_query = new \WP_Query(array(
									'post_type' => 'testimonial',
									'posts_per_page' => $settings['post_count']['size']
								)); ?>
								<?php while ($testimonials_thumb_post_query->have_posts()) : ?>
								<?php $testimonials_thumb_post_query->the_post(); ?>
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
										<div class="testimonials-one__client-img">
											<?php the_post_thumbnail('aivons_testimonials_77X77'); ?>
										</div>
										<div class="testimonials-one__quote"></div>
									</div>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonials One End-->

<?php endif; ?>