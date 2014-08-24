<?php
/**
 * Template name: Archives
 */
get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'studiox' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	</article><!-- #post-## -->

	<?php       
		$counter = 0;
		$ref_month = '';
		$monthly = new WP_Query( array( 'posts_per_page' => -1 ) );
		if( $monthly->have_posts() ) : while( $monthly->have_posts() ) : $monthly->the_post();

		if( get_the_date('mY') != $ref_month ) { 
			if( $ref_month ) {
				echo "\n".'</ul >';
			}
			echo "\n".'<h5>'.get_the_date( 'F' ).'</h5>';
			echo "\n".'<ul class="list-group black">';
			$ref_month = get_the_date( 'mY' );
			$counter = 0;
		}

		if( $counter++ < 5 ) {
			echo "\n".'   <li class="list-group-item"><span class="date">'. get_the_time( get_option( "date_format" ) ) . '</span><a href='.get_permalink( $post->ID ).'>'.get_the_title( $post->ID ).'</a></li>';
		}

		endwhile; 
		echo "\n".'</ul>';
		endif; 
	?>
			
	<?php endwhile; endif; ?>
<?php get_footer(); ?>