<?php if ('layout_two' == $settings['layout_type']) : ?>

  <!--News One Start-->
  <section class="news-one news-two">
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
			$blog_post_one_query_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$blog_post_one_query_args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'ignore_sticky_posts' => true,
				'paged'          => $blog_post_one_query_paged,
				'posts_per_page' => $settings['post_count']['size']
			);
			$blog_post_one_query = new \WP_Query($blog_post_one_query_args);
			?>
			<?php while ($blog_post_one_query->have_posts()) :
				$blog_post_one_query->the_post(); ?>
				<div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms">
					<!--News One Single-->
					<div class="news-one__single">
					    <?php if (has_post_thumbnail()) : ?>
							<div class="news-one__img">
								<?php the_post_thumbnail('aivons_blog_370X336'); ?>
								<a href="<?php the_permalink(); ?>">
									<span class="news-one__plus"></span>
								</a>
							</div>
						<?php endif; ?>
						<div class="news-one__content <?php echo esc_attr( ( ! has_post_thumbnail( ) ? 'no-image' : '') ); ?>">
							<ul class="list-unstyled news-one__meta">
								<li><?php aivons_posted_by(); ?></li>
								<?php if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
								<li><span>/</span></li>
								<li><?php aivons_comment_count(); ?></li>
								<?php endif; ?>
							</ul>
							<h3 class="news-one__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<p class="news-one__text"><?php
								// giving hook for flexiblity
								$aivons_blog_one_content_count = apply_filters('aivons_blog_one_content_count', $settings['post_word_count']['size']);
								aivons_excerpt($aivons_blog_one_content_count); ?>
							</p>
							<a href="<?php the_permalink(); ?>" class="news-one__btn"><?php echo esc_html__('Read more', 'aivons-addon'); ?></a>
							<?php if( has_post_thumbnail() ): ?>
								<div class="news-one__date-box">
								  <p><?php the_time( 'd m' ); ?></p>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php if ('yes' == $settings['pagination_status']) : ?>
					<div class="col-lg-12">
						<div class="blog-pagination portfolio-page__btn-box text-center">
							<?php aivons_custom_query_pagination($blog_post_one_query_paged, $blog_post_one_query->max_num_pages); ?>
						</div><!-- /.blog-post-pagination -->
					</div><!-- /.col-lg-12 -->
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<!--News One End-->

<?php endif; ?>