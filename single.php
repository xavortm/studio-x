<?php
/**
 * Single page template for Subtle.
 *
 * @package WordPress
 */

get_header(); ?>

	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'content', 'single' );
			?>
			<ul class="pager">
				<li class="previous"><?php previous_post_link(); ?></li>
				<li class="next"><?php next_post_link(); ?></li>
			</ul>
		<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>

<?php 
get_footer();