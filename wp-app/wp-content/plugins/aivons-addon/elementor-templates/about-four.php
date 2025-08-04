<?php if ('layout_four' == $settings['layout_type']) : ?>
	 <!--Reasons Start-->
	 <section class="reasons">
		<div class="container">
			<div class="reasons-bg"></div>
			<div class="row">
				<div class="col-xl-5 col-lg-6">
					<div class="reasons__left">
						<?php if (!empty($settings['layout_four_sec_title']) ) : ?>
							<h2 class="reasons__title"><?php echo wp_kses($settings['layout_four_sec_title'], 'aivons_allowed_tags'); ?></h2>
						<?php endif; ?>
						<?php if( is_array( $settings[ 'layout_four_icon_box' ] ) ) : ?>
							<ul class="list-unstyled reasons__list-box ml-0">
							  <?php foreach( $settings[ 'layout_four_icon_box' ] as $item ) : ?>
								<li>
									<div class="reasons__icon">
										<span class="<?php echo esc_attr( $item[ 'icon' ][ 'value' ] ); ?>"></span>
									</div>
									<div class="reasons__content">
										<h4 class="reasons__content-title"><?php echo esc_html( $item[ 'title' ] ); ?></h4>
										<p class="reasons__content-text"><?php echo esc_html( $item[ 'sub_title' ]); ?></p>
									</div>
								</li>
							  <?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
				<?php if( !empty( $settings['layout_four_image']['url'] ) ) : ?>
					<div class="col-xl-7 col-lg-6">
						<div class="reasons__img-box">
							<div class="reasons__img">
								<img src="<?php echo esc_url( $settings['layout_four_image']['url'] ); ?>" alt="<?php echo esc_attr(aivons_get_thumbnail_alt($settings['layout_four_image']['id'])); ?>">
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!--Reasons End-->
<?php endif; ?>