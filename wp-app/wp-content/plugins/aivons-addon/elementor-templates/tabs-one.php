 <?php
	  $tab_post_query_args = array(
		'post_type' => 'tab',
		'orderby' => 'menu_order title',
		'order'   => $settings['query_order'],
		'posts_per_page' => $settings['post_count']['size']
	);
	$tab_post_query = new \WP_Query($tab_post_query_args); 
 ?>
 <!--Financial Advice Start-->
   <section class="financial-advice">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="financial-advice__box tabs-box">
						<ul class="tab-btns tab-buttons clearfix list-unstyled ml-0">
							<?php $tab_title_count = 1; ?>
							<?php if ($tab_post_query->have_posts()) : ?>
							<?php while ($tab_post_query->have_posts()) : ?>
							<?php $tab_post_query->the_post(); ?>
								<li data-tab="#feature-tab-<?php echo esc_attr ($tab_title_count ); ?>" class="tab-btn <?php echo esc_attr(( 2 == $tab_title_count) ? 'active-btn' : ''); ?>"><span><?php the_title(); ?></span></li>
							<?php $tab_title_count++; ?>
							<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_postdata(); ?>
						</ul>
						<div class="tabs-content">

							<?php $tab_content_count = 1; ?>
							<?php if ($tab_post_query->have_posts()) : ?>
							<?php while ($tab_post_query->have_posts()) : ?>
							<?php $tab_post_query->the_post(); ?>
								<div class="tab <?php echo esc_attr(('2' == $tab_content_count) ? 'active-tab' : ''); ?> " id="feature-tab-<?php echo esc_attr($tab_content_count); ?>">
									<div class="financial-advice__content">
										<div class="row">
											<div class="col-xl-4 col-lg-4">
												<div class="financial-advice__single-1">
													<ul class="list-unstyled financial-advice__list-box ul-0 ml-0">
													<?php $tab_content = get_post_meta(get_the_ID(), 'aivons_tab_content', true); ?>
													<?php  foreach( $tab_content as $content ) : ?>
														<li>
															<div class="financial-advice__icon">
																<span class="<?php echo esc_attr( $content[ 'aivons_icon' ]); ?>"></span>
															</div>
															<div class="financial-advice__list-box-content">
																<h3 class="finalcial-advice__list-box-title"><?php echo esc_html( $content[ 'aivons_title' ]); ?></h3>
																<p class="finalcial-advice__list-box-text">
																	<?php echo wp_kses($content['aivons_text'], 'aivons_allowed_tags'); ?>
																</p>
															</div>
														</li>
													<?php endforeach; ?>

													</ul>
												</div>
											</div>
											<div class="col-xl-4 col-lg-4">
												<div class="financial-advice__single-1 financial-advice__single-2">
													<?php the_content(); ?>
												</div>
											</div>
											<?php if( has_post_thumbnail()): ?>
											<div class="col-xl-4 col-lg-4">
												<div class="financial-advice__single-1 financial-advice__single-3">
													<div class="financial-advice__img">
														<?php the_post_thumbnail('aivons_tab_340X326'); ?>
													</div>
												</div>
											</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php $tab_content_count++; ?>
							<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--Financial Advice End-->
