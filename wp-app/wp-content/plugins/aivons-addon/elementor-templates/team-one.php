<?php if ('layout_one' == $settings['layout_type']) : ?>

   <!--Team One Start-->
   <section class="team-one">
		<div class="team-one__container">
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
					<div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
						<!--Team One Single-->
						<div class="team-one__single">
							<div class="team-one__img">
								<?php if( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail('aivons_team_393X447'); ?>
								<?php endif; ?>
								<div class="team-one__hover-content">
									<h3 class="team-one__name"><?php the_title(); ?></h3>
									<p class="team-one__title"><?php echo esc_html(get_post_meta(get_the_ID(), 'aivons_designation', true)); ?></p>
								</div>
								<div class="team-one__bottom">
									<div class="team-one__btn-box">
										<a target="_blank" href="<?php echo esc_url( get_post_meta(get_the_ID(), 'aivons_contact', true) ); ?>" class="team-one__btn">
											<?php echo esc_html( get_post_meta(get_the_ID(), 'aivons_contact_label', true) ); ?>
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
	<!--Team One End-->
<?php endif; ?>