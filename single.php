<?php
/**
 * Single page template for Subtle.
 *
 * @package WordPress
 */
global $option_setting;
get_header(); ?>

	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'content', 'single' );

			if ( $option_setting[ 'show-article-nav' ]) {
			?>
			<ul class="pager">
				<li class="previous"><?php previous_post_link(); ?></li>
				<li class="next"><?php next_post_link(); ?></li>
			</ul>
		<?php
			}

			// Check if comments are enabled in the options panel
			if ( $option_setting[ 'show-comments-area' ]) {
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			}
		endwhile;
		?>

<?php 
get_footer();