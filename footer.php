<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 */

global $option_setting;
?>


		</div><!-- contentholder -->
	</div><!-- /content-wrapper -->
	<!-- FOOTER AREA 
		========================================================================== -->
	<footer class='site-footer clearfix'>
		<div class="container">
			<span class='site-info'><?php echo $option_setting['footer-text']; ?></span>
			<h6 class="codeispoetry">Code is poetry</h6>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>