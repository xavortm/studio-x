<?php

/**
 * THEME HOME PAGE SETTINGS 
 * ============================================================================
 */
$this->sections[] = array(
	'title'   => 'General Settings',
	'icon'    => 'fa fa-cog',
	'heading' => 'The general settings for the home page.',
	'fields'  => array(

		array(
			'id'        => 'footer-text',
			'type'      => 'editor',
			'title'     => __('Footer text', 'studiox'),
			'default'	=> 'Proudly powered by WordPress',
			'subtitle'  => __('Decide what will be written in the site footer.', 'studiox'),
			'args'   => array(
		        'teeny'            => true,
		        'textarea_rows'    => 2
		    )
		),

		array(
			'id'        => 'show-header',
			'type'      => 'switch',
			'title'     => __('Display the site branding', 'studiox'),
			'default'	=> 1,
			'subtitle'  => __('This will hide the branding area only, not the menu', 'studiox'),
		),

	),
);

$this->sections[] = array(
	'title'   => 'Site Logo',
	'icon'    => 'fa fa-bookmark',
	'heading' => 'The general settings for the home page.',
	'fields'  => array(
	
		array(
			'id'       => 'logo',
			'type'     => 'media', 
			'url'      => true,
			'title'    => __('Select site logo', 'studiox'),
			'desc'     => __('Selecting a logo will remove the default text + description. Remove the logo to show them again.', 'studiox'),
			'subtitle' => __('Select your logo from the uploader', 'studiox'),
		),

		array(
			'id'             => 'logo-spacing',
			'type'           => 'spacing',
			'output'         => array('.site-title.logo'),
			'mode'           => 'margin',
			'units'          => array('em', 'px'),
			'units_extended' => 'false',
			'title'          => __('Padding/Margin Logo Option', 'studiox'),
			'subtitle'       => __('ASet the spacing around the logo', 'studiox'),
			'default'            => array(
				'margin-top'     => '0px', 
				'margin-right'   => '0px', 
				'margin-bottom'  => '0px', 
				'margin-left'    => '0px',
				'units'          => 'em', 
			),
		),

	),
);

$this->sections[] = array(
	'title'   => 'Home Page Settings',
	'icon'    => 'fa fa-home',
	'heading' => 'The general settings for the home page.',
	'fields'  => array(

		array(
			'id'        => 'home-thumbnail',
			'type'      => 'switch',
			'title'     => __('Display thumbnails on home page', 'studiox'),
			'default'	=> 1,
			'subtitle'  => __('Show or hide all thumbnails on home page', 'studiox'),
		),

		array(
			'id'        => 'home-entry-footer',
			'type'      => 'switch',
			'default'	=> 1,
			'title'     => __('Show entry footer on home page', 'studiox'),
			'subtitle'  => __('OFF will hide "read more" and informationa about the time the post was published and the comments count.', 'studiox'),
		),

		array(
			'id'        => 'read-more-options',
			'type'      => 'select',
			'default'	=> 'Default',
			'options'	=> array (
				'' => 'Default',
				'hidden' => 'None',
				'small' => 'Small',
				'solid' => 'Solid',
			),
			'title'     => __('Home Page read more button', 'studiox'),
			'subtitle'  => __('Select what type of "read more" button will be used', 'studiox'),
		),

	) // End Fields	
);

$this->sections[] = array(
	'title'   => 'Styling Options',
	'icon'    => 'fa fa-magic',
	'heading' => 'weight settings for Studio X.',
	'fields'  => array(

		array(
			'id'       => 'color-main',
			'type'     => 'color',
			'title'    => __('Main theme color', 'studiox'),
			'subtitle' => __('Select the main theme color', 'studiox'),
			'default'  => '#4fb509',
			'output'   => array(
				'color'	=> 'body a',
				'color' => '.entry .entry-title a:hover',
				'background-color' => '#site-branding'
			),
		),

		array(
			'id'        => 'color-link',
			'type'      => 'link_color',
			'title'     => __('Links Color', 'studiox'),
			'subtitle'  => __('Set the links color for your site', 'studiox'),
			'desc'      => __('Pick all the three states', 'studiox'),
			//'regular'   => false, // Disable Regular Color
			//'hover'     => false, // Disable Hover Color
			//'active'    => false, // Disable Active Color
			//'visited'   => true,  // Enable Visited Color
			'default'   => array(
			    'regular'   => '#4fb509',
			    'hover'     => '#000000',
			    'active'    => '#000000',
			),
			'output'   => array( 'a' )
		),

		array(
			'id'       => 'color-background',
			'type'     => 'background',
			'title'    => __('Page background color', 'studiox'),
			'subtitle' => __('Pick a background color for the theme (default: #fff).', 'studiox'),
			'default'  => '#FFFFFF',
			'output'   => array( 'body,html' ),
		),

		array(
			'id'        => 'menu-color-scheme',
			'type'      => 'select',
			'title'     => __('Menu color scheme', 'studiox'),
			'subtitle'  => __('Select one of the menu color schemes', 'studiox'),
			'options'   => array( 'dark' => 'dark', 'light' => 'light' ),
			'default'   => 'light',
		),

	) // End Fields	
);

$this->sections[] = array(
	'title'   => 'Articles and Pages',
	'icon'    => 'fa fa-pencil-square-o',
	'heading' => 'The settings for the articles.',
	'fields'  => array(

		array(
			'id'        => 'minimal-fullwidth-thumb',
			'type'      => 'switch',
			'title'     => __('Fullwidth thumbnails on minimal tempalte', 'studiox'),
			'subtitle'  => __('Use or not fullwidth thumbnail image when using the Minimal template for pages.', 'studiox'),
		),

		array(
			'id'        => 'big-thumbnail',
			'type'      => 'switch',
			'default'	=> 0,
			'title'     => __('Use fullwidth thumbnail on single post', 'studiox'),
			'subtitle'  => __('Having this feature, the thumbnail will be as wide as the viewport. This means you have to use high quality bit images.', 'studiox'),
		),

		array(
			'id'        => 'hide-header-single',
			'type'      => 'switch',
			'default'	=> 0,
			'title'     => __('Hide the header (branding, not menu) on single pages', 'studiox'),
			'subtitle'  => __('Combine this with the feature above for perfect effect.', 'studiox'),
		),

		array(
			'id'        => 'show-readingtime',
			'type'      => 'switch',
			'default'	=> 1,
			'title'     => __('Show reading time', 'studiox'),
			'subtitle'  => __('Show or not the reading time', 'studiox'),
		),

		array(
			'id'        => 'show-entry-footer',
			'type'      => 'switch',
			'default'	=> 1,
			'title'     => __('Show entry footer in single page', 'studiox'),
			'subtitle'  => __('This is all the data in the footer in single view', 'studiox'),
		),

		array(
			'id'        => 'show-date-author',
			'type'      => 'switch',
			'default'	=> 1,
			'title'     => __('Show date and author above title', 'studiox'),
			'subtitle'  => __('Setting to Off will not move them, but will just hide them.', 'studiox'),
		),

		array(
			'id'        => 'show-article-nav',
			'type'      => 'switch',
			'default'	=> 1,
			'title'     => __('Show navigation links between articles', 'studiox'),
			'subtitle'  => __('These are the links showing the next and previous post blow the posts.', 'studiox'),
		),

		array(
			'id'   => 'info_comments',
			'type' => 'info',
			'desc' => __('Comments settings.', 'studiox')
		),

		array(
			'id'        => 'show-comments-area',
			'type'      => 'switch',
			'default'	=> 1,
			'title'     => __('Show comments below articles', 'studiox'),
			'subtitle'  => __('Setting to Off will not move them, but will just hide them.', 'studiox'),
		),

		array(
			'id'        => 'simple-comments',
			'type'      => 'switch',
			'default'	=> 0,
			'title'     => __('Use minimal comments layout', 'studiox'),
			'subtitle'  => __('It will basicly remove many parts and make it look way simpler then it is by default.', 'studiox'),
		),

		
	), // End Fields	
);


$this->sections[] = array(
	'title'   => 'Typography Settings',
	'icon'    => 'fa fa-font',
	'heading' => 'The settings for the articles.',
	'fields'  => array(

		array(
			'id'          => 'typography-article',
			'type'        => 'typography', 
			'title'       => __('Article content', 'studiox'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.entry .entry-content'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'studiox'),
			'default'     => array(
				'color'       => '#383838', 
				'font-weight'  => '400', 
				'font-family' => 'PT Serif', 
				'google'      => true,
				'font-size'   => '21px', 
				'line-height' => '1.9em'
			)
		),

		array(
			'id'          => 'typography-default',
			'type'        => 'typography', 
			'title'       => __('Default font', 'studiox'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('body'),
			'units'       =>'px',
			'subtitle'    => __('This is used for tags, info text and similar.', 'studiox'),
			'default'     => array(
				'color'       => '#333333', 
				'font-weight'  => '400', 
				'font-family' => 'Arial', 
				'google'      => true,
				'font-size'   => '14px', 
				'line-height' => '20px'
			)
		),

		array(
			'id'          => 'typography-article-title',
			'type'        => 'typography', 
			'title'       => __('Articles: Post Title', 'studiox'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.entry-title, .entry-title a'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'studiox'),
			'default'     => array(
				'color'       => '#383838', 
				'font-weight'  => '800', 
				'font-family' => 'Raleway', 
				'google'      => true,
				'font-size'   => '45px', 
				'line-height' => '49px'
			)
		),

		array(
			'id'   => 'info_normal',
			'type' => 'info',
			'desc' => __('The following settings are for articles only. No other headings are affected.', 'studiox')
		),

		array(
			'id'          => 'typography-title-h1',
			'type'        => 'typography', 
			'title'       => __('Articles: H1 Headings', 'studiox'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.entry-content h1'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'studiox'),
			'default'     => array(
				'color'       => '#383838', 
				'font-weight'  => '800', 
				'font-family' => 'Raleway', 
				'google'      => true,
				'font-size'   => '38px', 
				'line-height' => '45px'
			)
		),

		array(
			'id'          => 'typography-title-h2',
			'type'        => 'typography', 
			'title'       => __('Articles: H2 Headings', 'studiox'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.entry-content h2'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'studiox'),
			'default'     => array(
				'color'       => '#383838', 
				'font-weight'  => '800', 
				'font-family' => 'Raleway', 
				'google'      => true,
				'font-size'   => '32px', 
				'line-height' => '38px'
			)
		),

		array(
			'id'          => 'typography-title-h3',
			'type'        => 'typography', 
			'title'       => __('Articles: H3 Headings', 'studiox'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.entry-content h3'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'studiox'),
			'default'     => array(
				'color'       => '#383838', 
				'font-weight'  => '800', 
				'font-family' => 'Raleway', 
				'google'      => true,
				'font-size'   => '26px', 
				'line-height' => '30px'
			)
		),

		array(
			'id'          => 'typography-title-h4',
			'type'        => 'typography', 
			'title'       => __('Articles: H4 Headings', 'studiox'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.entry-content h4'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'studiox'),
			'default'     => array(
				'color'       => '#383838', 
				'font-weight'  => '800', 
				'font-family' => 'Raleway', 
				'google'      => true,
				'font-size'   => '18px', 
				'line-height' => '22px'
			)
		),

		array(
			'id'          => 'typography-title-h5',
			'type'        => 'typography', 
			'title'       => __('Articles: H5 Headings', 'studiox'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.entry-content h5'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'studiox'),
			'default'     => array(
				'color'       => '#383838', 
				'font-weight'  => '800', 
				'font-family' => 'Raleway', 
				'google'      => true,
				'font-size'   => '16px', 
				'line-height' => '28px'
			)
		),

		array(
			'id'          => 'typography-title-h6',
			'type'        => 'typography', 
			'title'       => __('Articles: H6 Headings', 'studiox'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.entry-content h6'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'studiox'),
			'default'     => array(
				'color'       => '#383838', 
				'font-weight'  => '800', 
				'font-family' => 'Raleway', 
				'google'      => true,
				'font-size'   => '14px', 
				'line-height' => '16px'
			)
		),

	),
);

$this->sections[] = array(
	'title'   => 'Import/Export',
	'icon'    => 'fa fa-exchange',
	'heading' => 'Import or exeport settings',
	'fields'  => array(

		 array(
            'id'            => 'opt-import-export',
            'type'          => 'import_export',
            'title'         => 'Import Export',
            'subtitle'      => 'Save and restore your Redux options',
            'full_width'    => false,
        ),

	),
);