<?php
/**
 * The Header file for the theme.
 *
 * @package WordPress
 */

global $option_setting;
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<title><?php wp_title( '-', true, 'right' ); ?></title>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="site-header">
		
		<?php // Show the branding
		if ( $option_setting[ 'show-header' ] ) {

			if ( is_single() && $option_setting[ 'big-thumbnail' ] ) {
				Diamond_Entry::post_thumbnail('', 'fullwidth entry-thumbnail');
			} else {
				get_template_part( 'templates/header-branding' ); 
			}

		} ?>

		<nav id="primary-navigation" class="navbar navbar-default <?php echo $option_setting[ 'menu-color-scheme' ] ?>" role="navigation">
			<div class="container">
			<div class="menu-text visible-xs">Menu</div>

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div><!-- /navbar-header -->

				<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
					<?php
	            	wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => false,
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
					);			
					?>


					<ul class="nav navbar-nav navbar-right">
						<form role="search" method="get" id="searchform" class="searchform navbar-form navbar-right" action="<?php esc_url( home_url( '/' )); ?>">
							<div class="form-group">
								<input type="text" class='form-control' placeholder="<?php _e("Search:", "studiox") ?>" value="<?php get_search_query(); ?>" name="s" id="s" />
							</div>
							<input type="submit" id="searchsubmit" value="<?php esc_attr_x( 'Search', 'submit button', 'studiox' ); ?>" />
							
						</form>
						<li class='search-icon'><a href="#"><i class="fa fa-search"></i></a></li>
					</ul>
				</div>

			</div><!-- /container -->
		</nav><!-- /navbar -->
	</header><!-- /site-header -->

	<?php // Check templates.

		if ( is_page_template( 'page-minimal.php' )) {
			if ( $option_setting[ 'minimal-fullwidth-thumb' ] ) {
				Diamond_Entry::post_thumbnail('', 'fullwidth entry-thumbnail');
			}
		}

	?>

	<div class="container-fluid content-wrapper"> 
		<div class="site-content">