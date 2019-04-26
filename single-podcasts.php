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

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">

			<?php $url = wp_get_attachment_url( get_post_thumbnail_id() ); 'full' ?>
			<div class="img" style="background: url('<?php echo $url;?>') no-repeat center center;">
				
				<?php $audio = get_post_meta($post->ID, 'media_links_download-link', true); ?>
				<?php echo do_shortcode('[audio src="' . $audio . '"]'); ?>
				
			</div>

			<div class="row">
				<div class="col-md-9 no-padding">
					<h1 class="pod-title"><?php the_title(); ?></h1>
					<div class="entry-meta"><?php hivemind_posted_on(); ?></div>
					<div class="pod-content"><?php echo get_post_field('post_content', $post->ID); ?></div>
				</div>

				<div class="col-md-3 no-padding">
					<button type="button" class="pod-btn">
						<a href="<?php echo get_post_meta($post->ID, 'media_links_download-link', true); ?>">Download</a>	
					</button>

					<button type="button" class="pod-btn">
						<a href="<?php echo get_post_meta($post->ID, 'media_links_mixcloud-link', true); ?>">Mixcloud</a>	
					</button>

                	<div class="social addthis_inline_share_toolbox_n5pg"></div>
				</div>
			</div>
			<div class="row">
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
			</div>

		<?php the_post_navigation( array(
  			'prev_text' => __('<span class="fas fa-arrow-alt-circle-left"></span>'),
  			'next_text' => __('<span class="fas fa-arrow-alt-circle-right"></span>'),
		) ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
