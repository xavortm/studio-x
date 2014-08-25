<?php
/**
 * Template name: Minimal
 */

global $option_setting;
get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php 
	if ( ! $option_setting[ 'minimal-fullwidth-thumb' ] ) {
		Diamond_Entry::post_thumbnail('', 'entry-thumbnail');
	}

	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( $option_setting[ 'show-readingtime' ]) : ?>
		<span class='entry-readingtime'><?php _e( 'Reading time:', 'studiox' ) ?> <span class="reading-time"></span></span>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'studiox' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<a href="javascript:javascript:history.go(-1)">Go back</a>
	</article><!-- #post-## -->
			
	<?php endwhile; endif; ?>
<?php get_footer(); ?>