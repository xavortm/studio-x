<?php
/**
 * Archives template.
 * 
 * Pick whatever you want from the following cases of archives page, remove them all 
 * or leave them its your chouse! 
 * 
 * The author title is not presented because of the existance of author page. 
 * Same goes for category and tag.
 *
 * @package WordPress
 */

get_header(); ?>

	<?php if ( is_day() ) { ?>
		<h1 class="archive-title">
			<span><?php _e( 'Daily Archives:', 'studiox' ); ?></span> <?php the_time('l, F j, Y'); ?>
		</h1>

	<?php } elseif ( is_month() ) { ?>
			<h1 class="archive-title">
				<span><?php _e( 'Monthly Archives:', 'studiox' ); ?></span> <?php the_time('F Y'); ?>
			</h1>

	<?php } elseif ( is_year() ) { ?>
			<h1 class="archive-title">
				<span><?php _e( 'Yearly Archives:', 'studiox' ); ?></span> <?php the_time('Y'); ?>
			</h1>
	<?php 
	} // Endif

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

<?php get_footer(); ?>
