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
			<div class="col-md-4">
				<?php
					if(is_active_sidebar('footer-one')){
					dynamic_sidebar('footer-one');
					}
				?>	
			</div>

			<div class="col-md-4">
				<?php
					if(is_active_sidebar('footer-two')){
					dynamic_sidebar('footer-two');
					}
				?>	
			</div>

			<div class="col-md-4">
				<?php
					if(is_active_sidebar('footer-three')){
					dynamic_sidebar('footer-three');
					}
				?>	
			</div>

		</div>
		<div class="row">
			<div class="site-info col-md-12">
				<small class="source-org copyright text-center">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</small>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
