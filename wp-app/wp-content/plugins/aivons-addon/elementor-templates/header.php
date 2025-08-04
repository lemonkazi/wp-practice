<?php $search_status = $settings['search_status']; ?>
<?php if ('layout_one' === $settings['layout_type']) : ?>

	<header class="main-header clearfix">
		<nav class="main-menu clearfix">
			<div class="main-menu-wrapper">
				<div class="main-menu-wrapper__left">
					<div class="main-menu-wrapper__logo">
						<a href="<?php echo esc_url(home_url('/')); ?>"><img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['light_logo']['url']); ?>" id="thm-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
					</div>
					<div class="main-menu-wrapper__main-menu">
						<a href="#" class="mobile-nav__toggler">
							<span class="mobile-nav__toggler-bar"></span>
							<span class="mobile-nav__toggler-bar"></span>
							<span class="mobile-nav__toggler-bar"></span>
						</a>
						<?php
						wp_nav_menu(
							array(
								'menu' => $settings['nav_menu'],
								'menu_class' => 'main-menu__list',
							)
						);
						?>
					</div>
				</div>
				<div class="main-menu-wrapper__right">
					<div class="main-menu-wrapper__social-box">
						<div class="main-menu-wrapper__social">
							<?php foreach ($settings['nav_social_icons'] as $social_icon) : ?>
								<a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><i class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></i></a>
							<?php endforeach; ?>
						</div>
					</div>
					<?php if (('yes' == $search_status)) : ?>
						<div class="main-menu-wrapper__search-box">
							<a href="#" class="main-menu-wrapper__search search-toggler icon-magnifying-glass1"></a>
						</div>
					<?php endif; ?>
					<?php if (!empty($settings['call_number']) || !empty($settings['text'])) : ?>
						<div class="main-menu-wrapper__phone-contact">
							<p><?php echo esc_html($settings['text']); ?></p>
							<a href="tel:<?php echo esc_attr(str_replace(' ', '-', $settings['call_number'])); ?>"><?php echo esc_html($settings['call_number']); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</nav>
	</header>

	<?php if (get_theme_mod('header_stricked_menu', true) && !is_admin_bar_showing()) : ?>
		<div class="stricky-header stricked-menu main-menu">
			<div class="sticky-header__content"></div><!-- /.sticky-header__content -->
		</div><!-- /.stricky-header -->
	<?php endif; ?>

<?php endif; ?>


<?php if ('layout_two' === $settings['layout_type']) : ?>

	<header class="main-header main-header-three clearfix">
		<div class="container clearfix">
			<nav class="main-menu main-menu-three clearfix">
				<div class="main-menu-wrapper-three clearfix">
					<div class="main-menu-wrapper__logo-3">
						<a href="<?php echo esc_url(home_url('/')); ?>"><img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['dark_logo']['url']); ?>" id="thm-logo-two" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
					</div>
					<div class="main-menu-wrapper-three__main-menu">
						<div class="main-menu-wrapper-three__main-menu-inner">
							<a href="#" class="mobile-nav__toggler">
								<span class="mobile-nav__toggler-bar"></span>
								<span class="mobile-nav__toggler-bar"></span>
								<span class="mobile-nav__toggler-bar"></span>
							</a>
							<?php
							wp_nav_menu(
								array(
									'menu' => $settings['nav_menu'],
									'menu_class' => 'main-menu__list',
								)
							);
							?>
						</div>
						<div class="main-menu-wrapper-three__social-box">
							<div class="main-menu-wrapper-three__social">
								<?php foreach ($settings['nav_social_icons'] as $social_icon) : ?>
									<a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><i class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></i></a>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<?php if (get_theme_mod('header_stricked_menu', true) && !is_admin_bar_showing()) : ?>
		<div class="stricky-header stricked-menu main-menu main-menu-three">
			<div class="sticky-header__content"></div><!-- /.sticky-header__content -->
		</div><!-- /.stricky-header -->
	<?php endif; ?>
<?php endif; ?>

<?php if ('layout_three' === $settings['layout_type']) : ?>
	<header class="main-header main-header-three clearfix main-header-three--dark">
		<div class="container clearfix">
			<nav class="main-menu main-menu-three main-menu-three--dark clearfix">
				<div class="main-menu-wrapper-three clearfix">
					<div class="main-menu-wrapper__logo-3">
						<a href="<?php echo esc_url(home_url('/')); ?>"><img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['light_logo']['url']); ?>" id="thm-logo-two" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
					</div>
					<div class="main-menu-wrapper-three__main-menu">
						<div class="main-menu-wrapper-three__main-menu-inner">
							<a href="#" class="mobile-nav__toggler">
								<span class="mobile-nav__toggler-bar"></span>
								<span class="mobile-nav__toggler-bar"></span>
								<span class="mobile-nav__toggler-bar"></span>
							</a>
							<?php
							wp_nav_menu(
								array(
									'menu' => $settings['nav_menu'],
									'menu_class' => 'main-menu__list one-page-scroll-menu',
								)
							);
							?>
						</div>
						<div class="main-menu-wrapper-three__social-box">
							<div class="main-menu-wrapper-three__social">
								<?php foreach ($settings['nav_social_icons'] as $social_icon) : ?>
									<a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><i class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></i></a>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<?php if (get_theme_mod('header_stricked_menu', true) && !is_admin_bar_showing()) : ?>
		<div class="stricky-header stricked-menu main-menu main-menu-three main-menu-three--dark">
			<div class="sticky-header__content"></div><!-- /.sticky-header__content -->
		</div><!-- /.stricky-header -->
	<?php endif; ?>
<?php endif; ?>

<div class="mobile-nav__wrapper">
	<div class="mobile-nav__overlay mobile-nav__toggler"></div>
	<!-- /.mobile-nav__overlay -->
	<div class="mobile-nav__content">
		<span class="mobile-nav__close mobile-nav__toggler"></span>

		<div class="logo-box">
			<a href="<?php echo esc_url(home_url('/')); ?>">
				<img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['mobile_menu_logo']['url']); ?>" id="mobile-thm-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
			</a>
		</div>
		<!-- /.logo-box -->
		<div class="mobile-nav__container"></div>
		<!-- /.mobile-nav__container -->
		<?php if (!empty($settings['mobile_menu_email']) && !empty($settings['mobile_menu_phone'])) : ?>
			<ul class="mobile-nav__contact list-unstyled ml-0">
				<?php if (!empty($settings['mobile_menu_email'])) : ?>
					<li>
						<i class="fa fa-envelope"></i>
						<a href="<?php echo esc_attr($settings['mobile_menu_email']); ?>"><?php echo esc_html($settings['mobile_menu_email']); ?></a>
					</li>
				<?php endif; ?>
				<?php if (!empty($settings['mobile_menu_phone'])) : ?>
					<li>
						<i class="fa fa-phone-alt"></i>
						<a href="tel:<?php echo esc_attr(str_replace(' ', '-', $settings['mobile_menu_phone'])); ?>"><?php echo esc_html($settings['mobile_menu_phone']); ?></a>
					</li>
				<?php endif; ?>
			<?php endif; ?>
			</ul><!-- /.mobile-nav__contact -->
			<div class="mobile-nav__top">
				<div class="mobile-nav__social">
					<?php foreach ($settings['mobile_menu_social_icons'] as $social_icon) : ?>
						<a href="<?php echo esc_url($social_icon['social_url']['url']); ?>" class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></a>
					<?php endforeach; ?>
				</div><!-- /.mobile-nav__social -->
			</div><!-- /.mobile-nav__top -->
	</div>
	<!-- /.mobile-nav__content -->
</div>


<?php if ('yes' == $search_status) : ?>

	<div class="search-popup">
		<div class="search-popup__overlay search-toggler"></div>
		<!-- /.search-popup__overlay -->
		<div class="search-popup__content">
			<form action="<?php echo esc_url(home_url('/')); ?>">
				<label for="search" class="sr-only"><?php echo esc_html__('search here', 'aivons-addon'); ?></label><!-- /.sr-only -->
				<input type="text" id="search" name="s" placeholder="<?php echo esc_attr_e('Search Here...', 'aivons-addon'); ?>" />
				<button type="submit" aria-label="search submit" class="thm-btn">
					<i class="icon-magnifying-glass"></i>
				</button>
			</form>
		</div>
		<!-- /.search-popup__content -->
	</div>


<?php endif; ?>


<?php $aivons_back_to_top_status = get_theme_mod('scroll_to_top', false); ?>
<?php if (true === $aivons_back_to_top_status) : ?>
	<span data-target="html" class="scroll-to-target scroll-to-top"><i class="fa <?php echo esc_attr(get_theme_mod('scroll_to_top_icon', 'fa-angle-up')); ?>"></i></span>

<?php endif; ?>