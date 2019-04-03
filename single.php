<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hivemind
 */

get_header();
?>

	<div id="primary" class="content-area col-md-8 offset-md-2">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation( array(
  				'prev_text' => __('<span class="fas fa-arrow-alt-circle-left"></span>'),
  				'next_text' => __('<span class="fas fa-arrow-alt-circle-right"></span>'),
			) );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
