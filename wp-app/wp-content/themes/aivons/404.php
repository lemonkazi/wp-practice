<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package aivons
 */

get_header();
?>

<main id="primary" class="site-main">

	<!--Error Page Start-->
	<section class="error-page">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="error-page__inner">
						<h2 class="error-page__title"><?php esc_html_e( '404', 'aivons' ); ?></h2>
						<h3 class="error-page__tagline"><?php printf( esc_html__( 'Sorry We Can\'t Find %s That Page!', 'aivons' ), '<br/>' ); ?></h3>
						<p class="error-page__text"><?php echo esc_html_e( 'The page you are looking for was moved, removed, renamed or
							never existed.', 'aivons' ); ?></p>
						<form class="error-page__form">
							<div class="error-page__form-input">
								<?php echo get_search_form(); ?>
							</div>
						</form>
						<a href="<?php echo esc_url(home_url('/')); ?>" class="thm-btn error-page__btn"><?php echo esc_html_e('Back to home', 'aivons'); ?></a>
					</div>
				</div>
			</div>
		</div>
    </section>
    <!--Error Page End-->


</main><!-- #main -->

<?php
get_footer();
