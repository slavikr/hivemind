<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hivemind
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hivemind' ); ?></a>

	<header id="masthead" class="site-header container">
		<nav id="menu" class="navbar navbar-expand-md navbar-light" role="navigation">
			<div class="site-branding navbar-brand">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$hivemind_description = get_bloginfo( 'description', 'display' );
				if ( $hivemind_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $hivemind_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<button class="navbar-toggler navbar-light navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" area-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
			wp_nav_menu([
				'menu' 			  => 'primary',
				'theme_location'  => 'primary',
				'container' 	  => 'div',
				'container_id' 	  => 'bs4navbar',
				'container_class' => 'collapse navbar-collapse',
				'menu_id' 		  => 'main-menu',
				'menu_class' 	  => 'navbar-nav ml-auto',
				'depth' 		  => 2,
				'fallback_cb'	  => 'bs4navwalker::fallback',
				'walker'		  => new bs4navwalker()
			]);
			?>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
		