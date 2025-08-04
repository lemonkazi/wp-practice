<div class="footer-widget__column footer-widget__explore clearfix">

	<h3 class="footer-widget__title"><?php echo esc_html( $settings[ 'title' ] ); ?></h3>
	<?php $aivons_footer_nav = 0; ?>
	<?php foreach ($settings['nav_menus'] as $nav_menu) : 
		$aivons_secend_menu_class =  $aivons_footer_nav == 1 ? ' footer-widget__explore-list footer-widget__explore-list-two list-unstyled ml-0' : 'footer-widget__explore-list list-unstyled ml-0' ;
	?>
		<?php wp_nav_menu(array(
			'menu' => $nav_menu['nav_menu'],
			'menu_class' => $aivons_secend_menu_class,
			'container'  =>''
		)); ?>
	<?php $aivons_footer_nav ++; endforeach; ?>

</div>