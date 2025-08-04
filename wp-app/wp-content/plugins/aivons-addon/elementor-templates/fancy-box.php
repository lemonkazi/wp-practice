<!--Feature Start-->
<section class="feature">
	<?php if (!empty($settings['background_image']['url'])) : ?>
		<div class="feature-bg" style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>)"></div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<?php
			 if( is_array( $settings[ 'fancy_items' ] ) ) :
				foreach( $settings[ 'fancy_items' ] as $item ) :
			 
			?>
				<div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
					<!--Feature Single-->
					<div class="feature__single">
						<div class="feature__content">

							<h3 class="feature__title">
								<?php if( !empty( $item[ 'url' ] ) ) : ?>
									<a href="<?php echo esc_url( $item[ 'url' ] );  ?>">
										<?php echo wp_kses( $item['title'], 'aivons_allowed_tags' ); ?>
									</a>
								<?php else : ?>
									<?php echo wp_kses( $item['title'], 'aivons_allowed_tags' ); ?>
								<?php endif; ?>
							</h3>

							<p class="feature__text">
								<?php echo wp_kses( $item['text'], 'aivons_allowed_tags' ); ?>
							</p>
							<?php if( !empty( $item[ 'url' ] ) ) : ?>
								<a href="<?php echo esc_url( $item[ 'url' ] ); ?>" class="feature__btn"><?php echo esc_html_e( 'Read More', 'aivons-addon' ); ?></a>
							<?php endif; ?>
						</div>
						<?php if (!empty($item['image']['url'])) : ?>
							<div class="feature__img">
								<img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($item['image']['id'])); ?>">
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; endif; ?>
		</div>
		<?php if( !empty( $settings[ 'bottom_title' ] ) || !empty( $settings[ 'bottom_text' ] ) ) : ?>					
			<div class="row">
				<div class="col-xl-12 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
					<div class="feature-bottom">
						<div class="feature-bottom__contact">
							<div class="feature-bottom__call">
								<?php if (!empty($settings['bottom_image']['url'])) : ?>
								   <img src="<?php echo esc_url($settings['bottom_image']['url']); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($item['bottom_image']['id'])); ?>">
								<?php endif; ?>
								<div class="feature-bottom__icon">
									<span class="<?php echo esc_attr( $settings[ 'icon' ][ 'value' ] ); ?>"></span>
								</div>
							</div>
							<div class="feature-bottom__content-box">
								<p class="feature-bottom__tagline"><?php echo wp_kses( $settings['bottom_title'], 'aivons_allowed_tags' ); ?></p>
								<h5 class="feature-bottom-desc"><?php echo wp_kses( $settings['bottom_text'], 'aivons_allowed_tags' ); ?></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<!--Feature End-->