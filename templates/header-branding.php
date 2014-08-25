<div id="site-branding">
	<img src="<?php header_image(); ?>" class='header-background' height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<div class="container">

		<?php if ( empty( $option_setting['logo']['url'] ) ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php echo esc_html( bloginfo( 'description' ) ); ?></p>
		<?php else : ?>
			<h1 class="site-title logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo $option_setting['logo']['url'] ?>" alt="site-logo"> 
				</a>
			</h1>
		<?php endif; ?>

	</div>
</div><!-- /site-branding -->