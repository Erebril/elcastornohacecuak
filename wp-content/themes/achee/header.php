<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AChEE
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='https://fonts.googleapis.com/css?family=Titillium+Web:600,600italic,400italic,400,200italic,200,700,700italic,900|Open+Sans:400,400italic,700,700italic,600italic,600|Ubuntu:400,300,500,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'achee' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="nav-top-wrapper">
			<div class="container">
				<div class="row">
					<nav class="transparent top-navigation" role="navigation">
						<div class="left">
							<?php dynamic_sidebar( 'top-header-left' ); ?>
						</div>
						<div class="right">
							<?php dynamic_sidebar( 'top-header-right' ); ?>
							<div id="mobile-social-network"><?php dynamic_sidebar( 'top-header-right' ); ?></div>
						</div>
					</nav>
				</div>
			</div>
		</div>

		<div id="wrap-primary-menu" class="nav-main-wrapper nav">
			<div class="container">
				<div class="row">
					<div class="col s8 l4">
						<div class="site-branding">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php header_image(); ?>" class="main-logo responsive-img" alt="<?php bloginfo( 'name' ); ?>">
								<img src="<?php bloginfo('template_url'); ?>/img/color-iso.png" class="responsive-img iso-logo" alt="<?php bloginfo( 'name' ); ?>">
							</a>
						</div><!-- .site-branding -->
					</div>
					<div class="col s4 l8" id="theMenu">
						<div class="row">
							<div class="site-nav-wrap col m9">
									<nav id="site-navigation" class="main-navigation" role="navigation">
										<a href="#my-menu"  class="button-collapse" id="btn-show-menu"><p>MENÚ</p> <i class="mdi-navigation-menu"></i></a>
										<?php
											wp_nav_menu(
												array(
													'theme_location' 	=> 'primary',
													'menu_class' 		=> 'hide-on-med-and-down left',
													'menu_id'			=> 'menu-principal'
												)
											);
										?>
									</nav><!-- #site-Main-navigation -->
							</div>
							<div class="hide-on-med-and-down col m3">
									<?php
										get_search_form();
									?>
							</div>
						</div>

					</div>

					<div class="menu-responsive hide"><?php menu_responsive() ?></div>
				</div>
			</div><!-- m-container nav -->


			<div id="menu-secundario" class="secondMenu-navigation">
				<div class="container">
					<nav id="site-navigation" class="secondary-navigation" role="navigation">						

						<?php

							wp_nav_menu(
								array(
									'theme_location' => 'secondary-col1',
									'menu_class' => 'wrap-menu hide-on-med-and-down menu-second',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
								)
							);

							wp_nav_menu(
								array(
									'theme_location' => 'secondary-col2',
									'menu_class' => 'wrap-menu hide-on-med-and-down menu-second',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
								)
							);

							wp_nav_menu(
								array(
									'theme_location' => 'secondary-col3',
									'menu_class' => 'wrap-menu hide-on-med-and-down menu-second',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
								)
							);

							wp_nav_menu(
								array(
									'theme_location' => 'secondary-col4',
									'menu_class' => 'wrap-menu hide-on-med-and-down menu-second',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
								)
							);
						?>
					</nav><!-- #site-Main-navigation -->
				</div>
			</div>
		</div>
	</header><!-- #masthead -->


	<div id="content" class="site-content">
		<?php if ( is_page_template( 'plantilla-home.php' ) ) {
			echo '<div class="had-container" id="homeSlider">';
		} else {
			echo '<div class="had-container">';
		} ?>