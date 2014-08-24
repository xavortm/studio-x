<?php

/**
 * Call Methods class
 *
 * Used like helpers class, to use diferent functionality from one place.
 * All methods are static, no objects are created, this is only for direct call.
 *
 * Used with Diamond_Print::HelpMethod()
 *
 * @package WordPress
 * @subpackage Diamond
 */

class Diamond_Print {

	/**
	 * Print message from php. Used as for debugging or user message.
	 * 
	 * @since v1.0.0
	 */
	public static function message( $msg, $class = 'notice' ) {

		// Print the surounding div and the type of message.
		echo "<div class='message-box $class'>";
		echo "<p>$msg</p>";
		echo "</div>";

	}

	/**
	 * When the class is used, it will be callsed " Diamond_Breadcrumb::print() ".
 	 * All the rest of the classes are protected. There is no need of initialization,
 	 * so no constructors will be created. (not created to work with parameters)
	 * 
	 * @since v1.0.0
	 */
	public static function breadcrumbs() {
		
		// Initialise the object for a breadcrumb
		$bc = new Diamond_Breadcrumb();

		// One method to rule them all!
		$bc->display();

	}

	/**
	 * Pagination. 
	 * 
	 * Print on the screen pagination links. Can be used from various
	 * of pages, like categories, tags and so on.
	 * 
	 * @since v1.0.0
	 */
	public static function pagination() {
		global $wp_query;

		// need an unlikely integer
		$big = 999999999; 
		
		// Preparing the arguments for  paginate_links();
		$args = array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		);

		echo "<div class='btn-group page-pagination'>";
		echo paginate_links( $args );
		echo "</div>";
	}

	/**
	 * List categories from given parent slug name. There is simpler wordpress function
	 * for this logic, but not with the parent category. This is why this comes in handy.
	 * (as well as the limit variable for the categories).
	 *
	 * @param string $parent Parent category
	 * @param bool $parent_ul Print or not <ul> tag
	 * @param int $limit How many to be dysplayed
	 * 
	 * @uses  get_categories Return Obj of category.
	 * @uses  get_category_by_slug Obj of category by given slug name only.
	 * 
	 * @since v1.0.0
	 */
	public static function list_categories( $parent = 'uncategorized', $print_ul = true, $limit = 3, $ul_class = '', $li_class = '' ) {

		// Get the category ID
		$catObj = get_category_by_slug( strtolower( $parent ) ); 

		// Security check if a currect category is printed;
		if ( ! $catObj ) {
			self::message("Wrong category name.");
			return;
		}

		// Query categories and get only the child ones. (doesnt hide empty categories)
		$categories = get_categories( array('child_of' => $catObj->term_id, 'hide_empty' => 0) );
		
		// Starting ul tags.
		if( $print_ul ) echo '<ul class="'. $ul_class .'">';

		// Print the categories in the loop.
		foreach( $categories as $category ) {
			if( $counter++ == $limit ) break;
		?>
			<li class="<?php echo $li_class ?>"><a href="<?php echo get_category_link( $category->cat_ID ) ?>"><?php echo $category->name ?></a></li>
		<?php } 

		// Close ul tags.
		if( $print_ul ) echo '</ul>';
	}

	/**
	 * Query $count posts in unordered list. This is in its own function, 
	 * because its helpful in many parts of the site, instead of
	 * writing queries in the template files.
	 *
	 * @param String $category From which category to display posts. If empty, it will query from all categories.
	 * @param int $limit How many to be queried
	 * @param int $offset Skip first posts
	 * @param bool $print_ul Display or not <ul> tags.
	 * @param bool $show_comments Display or not comments count after title.
	 * @param strong $li_class Add class to all li items.
	 * @since  v1.0.0
	 */
	public static function posts( $category_ID = 0 , $limit = 3, $offset = 0, $print_ul = true, $show_comments = true, $li_class = '' ) {

		if ( ! is_numeric( $category_ID ) ) {
			self::message("Use ID for the category!");
			return;
		}

		// Get all categories or only one.
		$the_query = new WP_Query( 'cat=' . $category_ID . '&posts_per_page=' . $limit . '&offset=' . $offset );

		// Print UL tag if required.
		if( $print_ul == true )
			echo '<ul>';

		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post(); 

				// Show the content ?>
				<li class='<?php echo $li_class ?>'>
					<a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
					<?php if( $show_comments == true ) {

						// Display how many comments the post has.
						$comments = get_comments_number();

						// Print the information
						echo "<i class='icon-comment'> </i>";
						echo "<span class='comments'>$comments</span>";
					
					} ?>
				</li>
			<?php }
		} else {

			// If no posts were found, message will be printed. (or send regular message).
			// echo '<strong>No Posts were found!</strong>';
			self::message( "No posts found!" );
		}

		// Close ul tag
		if( $print_ul == true )
			echo '</ul>';

		/* Restore original Post Data */
		wp_reset_postdata();

	}



	/**
	 * Category printed on screen.
	 * 
	 * @param bool $print_link Print link if TRUE
	 * @since  v1.0.0
	 */
	public static function category_name( $print_link = FALSE ) {

		// Get the most important - the category. (array of objects, we take the first one always)
		$post_category = get_the_category();

		// Print the link of category
		if( $print_link ) {
	
			$post_category_link = get_category_link( $post_category[0]->cat_ID );
			echo "<a href='{$post_category_link}'>{$post_category[0]->name}</a>";

		} 
		else echo $post_category[0]->name;
	}

}