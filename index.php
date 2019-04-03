<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hivemind
 */

get_header();
?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">
			
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php endif; ?>
		
			<!-- The Query -->
			<?php $query = new WP_Query(array( 'post_type' => array('podcasts','post'), 'posts_per_page' => 12 ) ); ?>
			<?php
	$counter = 0;
	while ( $query->have_posts() ) : $query->the_post();
		$counter++;
		if ($counter === 1) {
	        echo '<div class="row">';//start the row
	    }
	    
		    echo '<div class="col-md-4 block">';//start the col//
		    	the_post_thumbnail();
		    	echo '<div class="info">';
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					the_excerpt();
				echo '</div>';
			echo '</div>';//end the col
		
		if ($counter === 3) {
	        $counter = 0; //reset counter
	        echo '</div>'; //end row 
	    }
		
	endwhile; // End of the loop.
	
						
	if ($counter !== 0) {
	    echo '</div>'; //closes stray rows
	} 
	?>
		
		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
