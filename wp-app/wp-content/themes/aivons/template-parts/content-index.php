<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aivons
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-single__content-single'); ?>>

	<?php aivons_post_thumbnail(); ?>

	<div class="blog-single__content-box">
		<?php
		if ('post' === get_post_type()) :
		?>
			<ul class="list-unstyled blog-single__meta ml-0">
				<li><?php aivons_posted_on(); ?></li>
				<li><?php aivons_posted_by(); ?></li>
				<?php if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
					<li><?php aivons_comment_count(); ?></li>
				<?php endif; ?>
			</ul><!-- .entry-meta -->
		<?php endif; ?>
		<h3 class="blog-single__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<?php $aivons_excerpt_count = apply_filters('aivons_excerpt_count', 39); ?>
		<p class="blog-single__text"><?php aivons_excerpt($aivons_excerpt_count); ?></p>
		<a href="<?php the_permalink(); ?>" class="blog-single__btn"><?php esc_html_e('Read more', 'aivons'); ?></a>

	</div><!-- .blog-sidebar__content-box -->

</article><!-- #post-<?php the_ID(); ?> -->