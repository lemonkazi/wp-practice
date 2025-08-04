<?php if ('layout_two' == $settings['layout_type']) : ?>
	<section class="team-one team-page">
		<div class="container">
			<div class="row">
				<?php $team_post_query_args = array(
					'post_type' => 'team',
					'orderby' => 'menu_order title',
					'order'   => $settings['query_order'],
					'posts_per_page' => $settings['post_count']['size']
				);
				$team_post_query = new \WP_Query($team_post_query_args);
				?>
				<?php if ($team_post_query->have_posts()) : ?>
					<?php while ($team_post_query->have_posts()) : ?>
						<?php $team_post_query->the_post(); ?>
						<div class="col-xl-4 col-lg-6 col-md-6 ">
							<!--Team One Single-->
							<div class="team-one__single">
								<div class="team-one__img">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('aivons_team_370X446'); ?>
									<?php endif; ?>
									<div class="team-one__hover-content">
										<h3 class="team-one__name"><?php the_title(); ?></h3>
										<p class="team-one__title"><?php echo esc_html(get_post_meta(get_the_ID(), 'aivons_designation', true)); ?></p>
									</div>
									<div class="team-one__bottom">
										<div class="team-one__btn-box">
											<a target="_blank" href="<?php echo esc_url(get_post_meta(get_the_ID(), 'aivons_contact', true)); ?>" class="team-one__btn">
												<?php echo esc_html(get_post_meta(get_the_ID(), 'aivons_contact_label', true)); ?>
											</a>
										</div>
										<div class="team-one__social">
											<?php $team_socials = get_post_meta(get_the_ID(), 'aivons_team_social', true); ?>
											<?php if (!empty($team_socials)) : ?>
												<?php foreach ($team_socials as $social) : ?>
													<a href="<?php echo esc_url($social['aivons_link']); ?>"><i class="fab <?php echo esc_attr($social['aivons_icon']); ?>"></i></a>
												<?php endforeach; ?>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

			</div>
		</div>
	</section>
<?php endif; ?>