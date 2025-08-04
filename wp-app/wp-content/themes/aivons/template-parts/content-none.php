<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aivons
 */

?>

<section class="no-results not-found error-page__inner">
	<header class="not-found__page-header">
		<h2 class="page-title error-page__tagline"><?php esc_html_e('Nothing Found', 'aivons'); ?></h2>
	</header><!-- .not-found__page-header -->

	<div class="not-found__page-content">
		<?php
		if (is_home() && current_user_can('publish_posts')) :

			printf(
				'<p class="error-page__text">' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					esc_html__('Ready to publish your first post? ', 'aivons') . '<a href="%1$s">' .  esc_html__('Get started here', 'aivons') . '</a>.',
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url(admin_url('post-new.php'))
			);

		elseif (is_search()) : ?>

			<p class="error-page__text"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'aivons'); ?></p>
			<div class="error-page__form">
				<div class="error-page__form-input">
					<?php get_search_form(); ?>
				</div>
			</div>
		<?php else : ?>
			<p class="error-page__text"><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'aivons'); ?></p>
			<div class="error-page__form">
				<div class="error-page__form-input">
					<?php get_search_form(); ?>
				</div>
			</div>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->