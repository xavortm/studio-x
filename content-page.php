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
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<span class='entry-readingtime'>Reading time: <span class="reading-time"></span></span>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			if ( $option_setting[ 'show-article-nav' ]) {
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'studiox' ),
					'after'  => '</div>',
				) );
			}
		?>
	</div><!-- .entry-content -->

	<?php if ( $option_setting[ 'show-entry-footer' ]) : ?>
	<footer class="entry-meta clearfix">
		<div class="btn-group pull-right">
			<a href="<?php echo get_edit_post_link( $id, $context ) ?>" class="edit-link btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Edit this article', 'studiox' ); ?>"><i class='fa fa-edit'></i></a>
			
			<?php if( comments_open() ) : ?>
				<a href="<?php comments_link(); ?>" class="edit-link btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Comments', 'studiox' ); ?>"><i class='fa fa-comments-o'></i></a>
			<?php endif; ?>
			
			<a class="edit-link btn btn-default popover-dismiss" data-toggle="tooltip popover" data-placement="top" title="<?php _e( 'This articles shortlink', 'studiox' ); ?>" data-content="<?php echo wp_get_shortlink(); ?>"><i class='fa fa-chain'></i></a>
		</div><!-- /btn-gtoup -->
	</footer>
	<?php endif; ?>
</article><!-- #post-## -->
