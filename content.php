<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 * Most of the often used functions from WordPress are removed 
 * just to keep the file simpler. 
 *
 * @package WordPress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<?php Diamond_Entry::post_thumbnail(); ?>

	<header class="entry-header">
	<h4 class='entry-author'>Posted by <?php Diamond_Entry::author_link() ?></h4>
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );	?>
		<span class='entry-readingtime'>Reading time: <span class="reading-time"></span></span>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<footer class="entry-footer">
			<a href="<?php echo esc_url( get_permalink() ) ?>" class="btn read-more"><?php _e( 'Read more', 'studiox' ) ?></a>
			<span class="meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span> / 
			<span class="meta-comments"><a href='<?php comments_link(); ?>'><?php comments_number(); ?></a></span>
		</footer>

		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
