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
		<?php if ( $option_setting[ 'show-date-author' ]) : ?>
			<h4 class='entry-author'><?php _e( 'Posted by', 'studiox' ) ?> <?php Diamond_Entry::author_link() ?> <?php _e( 'on', 'studiox' ) ?> <?php the_time( get_option( 'date_format' ) ); ?></h4>
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if ( $option_setting[ 'show-readingtime' ]) : ?>
			<span class='entry-readingtime'><?php _e( 'Reading time:', 'studiox' ) ?> <span class="reading-time"></span></span>
		<?php endif; ?>
		
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
		<div class="pull-left">
			<?php the_tags( '<span class="meta-tag-links"><span class="label label-white"><i class="fa fa-tag"></i>', '</span><span class="label label-white"><i class="fa fa-tag"></i>', '</span></span>' ); ?>
			<div class="meta-category"><span class="label label-white"><i class="fa fa-folder-o"></i><?php the_category( '</span><span class="label label-white"><i class="fa fa-folder-o"></i>' ); ?></span></div>
		</div>
		<a type="button" href="<?php echo get_edit_post_link() ?>" class="edit-link btn btn-default pull-right" title="<?php _e( 'Edit this article', 'studiox' ); ?>"><i class='fa fa-edit'></i></a>
	</footer>
	<?php endif; ?>
	

</article><!-- #post-## -->


