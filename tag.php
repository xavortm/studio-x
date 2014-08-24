<?php
/**
 * Tag template
 * 
 * Used to display archive-type pages for posts in a tag.
 *
 * @package WordPress
 */

get_header(); ?>

	<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'studiox' ), single_tag_title( '', false ) ); ?></h1>

	<?php 
	if ( have_posts() ) :

		// Start the Loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );
		endwhile;

		// Previous/next post navigation.
		posts_nav_link( ' - ', 'Previous', 'Next' );  // 'separator','prelabel','nextlabel'"
	else :

		// If no content, include the "No posts found" template.
		get_template_part( 'content', 'none' );
	endif; 
	?>

	

	<div class="navigation"><p><?php posts_nav_link(); ?></p></div>


<?php 
get_footer();