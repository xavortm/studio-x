<?php
/**
 * 404 template - used when the page the user is
 * trying to open does not exist. This template
 * rewrite the default server or browser error.
 *
 * @package WordPress
 */

get_header(); ?>

	<h1><?php _e( "Error 404", 'studiox' ); ?></h1>
	<p><?php _e( "The page you are trying to access does not exists.", 'studiox' ); ?></p>
	<hr>
	<h5><?php _e( "Recent posts:", 'studiox' ); ?></h5>
	

	<ul class="list-group search-results">
		<?php Diamond_Print::posts( 0, 10, 0, false, false, 'list-group-item' ); // $category_ID = 0 , $limit = 3, $offset = 1, $print_ul = true, $show_comments = true ?>
	</ul>

<?php 
get_footer();