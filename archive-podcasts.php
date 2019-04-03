<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hivemind
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">
			
	<?php
	$counter = 0;
	while ( have_posts() ) : the_post();
		$counter++;
		if ($counter === 1) {
	        echo '<div class="row">';//start the row
	    }
	    
		    echo '<div class="col-md-4 block">';//start the col//
		    	the_post_thumbnail();
		    	echo '<div class="info">';
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
