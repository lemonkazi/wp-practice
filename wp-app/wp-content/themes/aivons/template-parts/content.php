<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aivons
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php aivons_post_thumbnail(); ?>

	<div class="clearfix news-details__content">
		<header class="entry-header">
			<?php
			if ('post' === get_post_type()) :
			?>
				<ul class="list-unstyled news-details__meta ml-0">
					<li><?php aivons_posted_on(); ?></li>
					<li><?php aivons_posted_by(); ?></li>
				</ul><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					esc_html__('Continue reading', 'aivons') . '<span class="screen-reader-text"> "%s"</span>',
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'aivons'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer news-details__bottom news-details__tags">
		<?php aivons_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->