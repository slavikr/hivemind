<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hivemind
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="row footer-widgets">
			<div class="col-md-3">
				<?php
					if(is_active_sidebar('footer-one')){
					dynamic_sidebar('footer-one');
					}
				?>	
			</div>

			<div class="col-md-3">
				<?php
					if(is_active_sidebar('footer-two')){
					dynamic_sidebar('footer-two');
					}
				?>	
			</div>

			<div class="col-md-3">
				<?php
					if(is_active_sidebar('footer-three')){
					dynamic_sidebar('footer-three');
					}
				?>	
			</div>

			<div class="col-md-3">
				<?php
					if(is_active_sidebar('footer-four')){
					dynamic_sidebar('footer-four');
					}
				?>	
			</div>
		</div>
		<div class="row">
			<div class="site-info col-md-12">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'hivemind' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'hivemind' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'hivemind' ), 'hivemind', '<a href="http://underscores.me/">Underscores.me</a>' );
					?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
