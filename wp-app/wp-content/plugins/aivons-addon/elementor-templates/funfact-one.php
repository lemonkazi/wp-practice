	<!--Counters One Start-->
	<section class="counters-one">
			<?php if (!empty($settings['background_image']['url'])) : ?>
				<div class="counters-one-bg" style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>)">
				</div>
			<?php endif; ?>
			<?php if( is_array( $settings[ 'funfact_boxes' ] ) ) : ?>
				<div class="container">
					<ul class="counters-one__box list-unstyled">
						<?php foreach( $settings[ 'funfact_boxes' ] as $box ) : ?>
							<li class="counter-one__single">
								<div class="counter-one__icon">
									<span class="<?php echo esc_attr( $box[ 'icon' ][ 'value' ] ); ?>"></span>
								</div>
								<?php if( !empty( $box[ 'counter' ] ) ) : ?>
									<h3 class="odometer" data-count="<?php echo esc_attr( $box[ 'counter' ] ); ?>">00</h3>
								<?php endif; ?>
								<?php if( !empty( $box[ 'text' ] ) ):  ?>
									<p class="counter-one__text"><?php echo esc_html( $box[ 'text' ] ); ?></p>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
    </section>
    <!--Counters One Start-->
