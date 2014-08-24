<?php
/**
 * Search template. The only diference is, that
 * at the top of the page is shown the search query.
 *
 * @package WordPress
 */

get_header(); ?>


	<div class="page-title clearfix">
		<h2 class='pull-left'>Search results for <small>"<?php echo get_search_query() ?>"</small></h2>
	</div>


	
	<?php 
		// Get all categories or only one.
		$the_query = new WP_Query( 'cat=0&posts_per_page=10' );

		// Print UL tag if required.
		echo '<ul class="list-group search-results">';

		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post(); 

				// Show the content ?>
				<a class="list-group-item" href='<?php the_permalink(); ?>'>
					<span class="date"><?php the_date(); ?></span>
					<?php the_title(); ?>
				</a>
			<?php }
		} 
		echo '</ul>';

		/* Restore original Post Data */
		wp_reset_postdata();
	?>

	<br>
	<p>Not finding what you are looking for? Check some of the <strong>most used keywords:</strong></p>
	<div class="tag-clould"><?php wp_tag_cloud(); ?></div>

<?php get_footer(); ?>