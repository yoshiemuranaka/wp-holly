<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="logo no-wrap"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Holly Thompson</a></h1>
			<a class="hamburger-menu">
			<h1 class="reveal-small">&#9776;</h1>
			<h1 class="hide-small">menu</h1>
			</a>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="overlay"></div>
			<img class="menu-icon close" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon--close.svg">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	
	</header><!-- #masthead -->

	<div id="content" class="site-content">
