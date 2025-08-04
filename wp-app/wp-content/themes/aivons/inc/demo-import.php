<?php
function aivons_demo_import()
{
	return array(
		array(
			'import_file_name'             => 'Aivons Demo Import',
			'categories'                   => array('aivons'),
			'local_import_file'            => trailingslashit(get_template_directory()) . 'inc/demo-data/sample-data.xml',
			'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'inc/demo-data/widgets.wie',
			'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-data/customizer.dat',
			'import_notice'                => esc_html__('Please keep patients while importing sample data.', 'aivons'),
		),
	);
}
add_filter('pt-ocdi/import_files', 'aivons_demo_import');

function aivons_after_import_setup()
{
	// Assign menus to their locations.
	$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

	set_theme_mod('nav_menu_locations', array(
		'menu-1' => $main_menu->term_id
	));

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title('Home One');
	$blog_page_id  = get_page_by_title('Blog Sidebar');

	update_option('show_on_front', 'page');
	update_option('page_on_front', $front_page_id->ID);
	update_option('page_for_posts', $blog_page_id->ID);
}
add_action('pt-ocdi/after_import', 'aivons_after_import_setup');
add_filter('pt-ocdi/disable_pt_branding', '__return_true');
