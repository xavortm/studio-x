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

global $option_setting;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<?php if ( $option_setting[ 'home-thumbnail' ] ) {
		Diamond_Entry::post_thumbnail();
	} ?>

	<header class="entry-header">
	<h4 class='entry-author'>Posted by <?php Diamond_Entry::author_link() ?></h4>
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );	?>
		<?php if ( $option_setting[ 'show-readingtime' ]) : ?>
			<span class='entry-readingtime'><?php _e( 'Reading time:', 'studiox' ) ?> <span class="reading-time"></span></span>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php if ( $option_setting[ 'home-entry-footer' ]) : ?>
		<footer class="entry-footer">
			<a href="<?php echo esc_url( get_permalink() ) ?>" class="btn read-more <?php echo $option_setting['read-more-options']; ?>"><?php _e( 'Read more', 'studiox' ) ?></a>
			<span class="meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span> / 
			<span class="meta-comments"><a href='<?php comments_link(); ?>'><?php comments_number(); ?></a></span>
		</footer>
		<?php endif; ?>

		<?php if ( $option_setting[ 'show-article-nav' ]) { wp_link_pages(); } ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
