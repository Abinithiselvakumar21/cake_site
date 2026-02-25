<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$this->image_buttonset(
		array(
			'title'    => __('Layout', 'apcore'), 
			'subtitle' => esc_html__( 'Choose single portfolio layout','apcore' ),
			'id'       => 'choose_portfolio_layout',
			'default'  => 'default',
			'options'  => array(
				'default'	=> array(
					'alt'   => 'default', 
					'img'   => get_template_directory_uri().'/assets/images/default.jpg',
				),
				'layout_style1'	=> array(
					'alt'   => 'layout_style1', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePortfolio_Layout1.jpg',
				),      	
				'layout_style2'	=> array(
					'alt'   => 'layout_style2', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePortfolio_Layout2.jpg',
				),						
				'layout_style3'	=> array(
					'alt'   => 'layout_style3', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePortfolio_Layout3.jpg',
				),
				'layout_style4'	=> array(
					'alt'   => 'layout_style4', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePortfolio_Layout4.jpg',
				),
				'design_your_own'	=> array(
					'alt'   => 'Design your own', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePortfolio_Layout-5.jpg',
				),
            ),	
		)
	);
$this->radio_buttonset(
		array(
			'title'    => __('Listing type', 'apcore'), 
			'subtitle' => esc_html__( 'Choose listing format','apcore' ),
			'id'       => 'listing_format',
			'default'  => 'video',
			'options'  => array('video' => __('Video', 'apcore'), 'image' => __('Image', 'apcore')),
			
		),
		array(
			array(
				'field'      => 'choose_portfolio_layout',
				'value'      => 'design_your_own',
				'comparison' => '!=',
				)	
			)
	);	
$this->radio_buttonset(
		array(
			'title'    => __('Video Format', 'apcore'), 
			'subtitle' => esc_html__( 'Choose Video Format.','apcore' ),
			'id'       => 'video_format',
			'default'  => 'self_hosted',
			'options'  => array('self_hosted' => __('Self Hosted', 'apcore'), 'ap_youtube' => __('Youtube', 'apcore')),
			
		),
		array(
			array(
				'field'      => 'choose_portfolio_layout',
				'value'      => 'design_your_own',
				'comparison' => '!=',
				),
			array(
				'field'      => 'listing_format',
				'value'      => 'video',
				'comparison' => '==',
				),
			)
	);
	
	// Dependency check that video format.
	$self_hosted_video_dependency = array(
		array(
			'field'      => 'listing_format',
			'value'      => 'video',
			'comparison' => '==',
		),
		array(
			'field'      => 'video_format',
			'value'      => 'self_hosted',
			'comparison' => '==',
		),		
		array(
			'field'      => 'choose_portfolio_layout',
			'value'      => 'default',
			'comparison' => '!=',
		),
		array(
			'field'      => 'choose_portfolio_layout',
			'value'      => 'design_your_own',
			'comparison' => '!=',
		),		

		
	);
	// Dependency check that video format.
	$youtube_video_dependency = array(
		array(
			'field'      => 'listing_format',
			'value'      => 'video',
			'comparison' => '==',
		),
		array(
			'field'      => 'video_format',
			'value'      => 'ap_youtube',
			'comparison' => '==',
		),		
		array(
			'field'      => 'choose_portfolio_layout',
			'value'      => 'default',
			'comparison' => '!=',
			),
		array(
			'field'      => 'choose_portfolio_layout',
			'value'      => 'design_your_own',
			'comparison' => '!=',
			),		
	);
	
	$this->text(
		array(
				'title'    => __('Youtube Code', 'apcore'), 
				'subtitle' =>  'Insert youtube ID',
				'id'       => 'youtube_id',
				'default'  => '',
		),$youtube_video_dependency
	);
	$this->text(
		array(
				'title'    => __('Video Start Time', 'apcore'), 
				'subtitle' =>  'Insert time ex - 0',
				'id'       => 'video_start_time',
				'default'  => '',
		),$youtube_video_dependency
	);
	$this->text(
		array(
				'title'    => __('Video End Time', 'apcore'), 
				'subtitle' =>  'Insert time ex - 50',
				'id'       => 'video_end_time',
				'default'  => '',
		),$youtube_video_dependency
	);
	
	
	
	
	$this->text(
		array(
				'title'    => __('Self Hosted Video', 'apcore'), 
				'subtitle' => esc_html__( 'Insert url of self hosted video. Support mp4 only','apcore' ),
				'id'       => 'self_hosted_video_src',
				'default'  => '',
				
		),$self_hosted_video_dependency
	);	
$this->image_buttonset(
		array(
			'title'    => __('Image Gallery Layout', 'apcore'), 
			'subtitle' => esc_html__( 'Portfolio Image Gallery Layout','apcore' ),
			'id'       => 'portfolio_gallery_layout',
			'default'  => 'gallery_layout_style1',
			'options'  => array(				
				'gallery_layout_style1'	=> array(
					'alt'   => 'gallery_layout_style1', 
					'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image1.jpg',
				),      	
				'gallery_layout_style2'	=> array(
					'alt'   => 'gallery_layout_style2', 
					'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image2.jpg',
				),						
				'gallery_layout_style3'	=> array(
					'alt'   => 'gallery_layout_style3', 
					'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image3.jpg',
				),
				'gallery_layout_style4'	=> array(
					'alt'   => 'gallery_layout_style4', 
					'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image4.jpg',
				),
				'gallery_layout_style5'	=> array(
					'alt'   => 'gallery_layout_style5', 
					'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image5.jpg',
				),
				'gallery_layout_style6'	=> array(
					'alt'   => 'gallery_layout_style6', 
					'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image6.jpg',
				),
				'gallery_layout_style7'	=> array(
					'alt'   => 'gallery_layout_style7', 
					'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image7.jpg',
				),
            ),		
		),
		array(
			array(
				'field'      => 'listing_format',
				'value'      => 'image',
				'comparison' => '==',
			),
			array(
				'field'      => 'choose_portfolio_layout',
				'value'      => 'default',
				'comparison' => '!=',
			),
			array(
				'field'      => 'choose_portfolio_layout',
				'value'      => 'design_your_own',
				'comparison' => '!=',
			),	
			)
	);

$this->text(
		array(
			'title'    => __('Portfolio Image Gutter', 'apcore'), 
			'subtitle' => esc_html__( 'Leave empty for default value.','apcore' ),
			'id'       => 'portfolio_gallery_gutter',
			'default'  => '',
		)
	);

$this->select(
		array(
				'title'    => __('Hover Effect', 'apcore'), 
				'subtitle' => esc_html__( 'Select the hover effect 2.','apcore' ),
				'id'       => 'portfolio_hover_effects',
				'default'  => 'no',
				'options'  => array(
						'default' => esc_html__( 'Default', 'apcore'),
						'fade_effect' => esc_html__( 'Fade', 'apcore'),
						'zoomin_effect' => esc_html__( 'Zoom In', 'apcore'),
						'zoomout_effect' => esc_html__( 'Zoom Out', 'apcore'),
						'bwtocolor_effect' => esc_html__( 'B/W to Color', 'apcore'),
						'colortobw_effect' => esc_html__( 'Color To B/W', 'apcore'),
						'gradient_effect' => esc_html__( 'Gradient', 'apcore'),
				),
			)
	);
$this->select(
		array(
				'title'    => __('Use 100% Width Page', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to set this post to 100% browser width.','apcore' ),
				'id'       => 'portfolio_width_100',
				'default'  => 'no',
				'options'  => array('no' => __('No', 'apcore'),'yes' => __('Yes', 'apcore')),
			)
	);

$this->select(
		array(
				'title'    => __('Title', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to show or hide the project description title.','apcore' ),
				'id'       => 'portfolio_title',
				'default'  => 'yes',
				'options'  => array('yes' => __('Yes', 'apcore'), 'no' => __('No', 'apcore')),
			)
	);

$this->select(
		array(
			'title'    => __('Show Content Area', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to show or hide the Content area.','apcore' ),
			'id'       => 'show_contentarea_details',
			'default'  => 'yes',
			'options'  => array('yes' => __('Yes', 'apcore'), 'no' => __('No', 'apcore')),
		)
	);

$this->select(
		array(
				'title'    => __('Show Portfolio descriptions', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to show or hide the project details text.','apcore' ),
				'id'       => 'show_portfolio_details',
				'default'  => 'yes',
				'options'  => array('yes' => __('Yes', 'apcore'), 'no' => __('No', 'apcore')),
			)
		);
	
$this->select(
		array(
				'title'    => __('Featured Image', 'apcore'), 
				'subtitle' => esc_html__( 'Show / Hide featured images and videos on single portfolio.','apcore' ),
				'id'       => 'show_hide_portfolio_featured',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'),'hide' => __('Hide', 'apcore'), 'show' => __('Show', 'apcore')),
			)
		);

$this->select(
		array(
			'title'    => __('Select Thumbnail size for Packery Layout Portfolio', 'apcore'), 
			'subtitle' => esc_html__( 'Packery Thumbnail','apcore' ),
			'id'       => 'packery_layout_thumbnail',
			'default'  => 'portfolio_small_squared',
			'options'  => array('portfolio_small_squared' => __('Small Squared', 'apcore'),'portfolio_squared' => __('Big Squared', 'apcore'), 'portfolio_landscape' => __('Landscape', 'apcore'), 'portfolio_portrait' => __('Portrait', 'apcore'),),
		)
	);

$this->textarea(
		array(
			'title'    => __('Portfolio descriptions', 'apcore'), 
			'subtitle' => esc_html__( 'Enter descriptions','apcore' ),
			'id'       => 'portfolio_details',
			'default'  => '',
		)
	);

$this->text(
		array(
			'title'    => __('Client Name', 'apcore'), 
			'subtitle' => esc_html__( 'Enter here Client Name','apcore' ),
			'id'       => 'portfolio_client_name',
			'default'  => '',
		)
	);

$this->text(
		array(
			'title'    => __('Skills', 'apcore'), 
			'subtitle' => esc_html__( 'Enter here skill name','apcore' ),
			'id'       => 'portfolio_skills',
			'default'  => '',
		)
	);
	
$this->text(
		array(
			'title'    => __('Duration', 'apcore'), 
			'subtitle' => esc_html__( 'Enter here the project Duration','apcore' ),
			'id'       => 'portfolio_duration',
			'default'  => '',
		)
	);

$this->text(
		array(
			'title'    => __('Website/Button URL', 'apcore'), 
			'subtitle' => esc_html__( 'The URL the project text links to.','apcore' ),
			'id'       => 'portfolio_website_url',
			'default'  => '',
		)
	);

$this->text(
		array(
			'title'    => __('Website/Button URL Text', 'apcore'), 
			'subtitle' => esc_html__( 'The custom project text that will link.','apcore' ),
			'id'       => 'portfolio_website_url_text',
			'default'  => '',
		)
	);

$this->select(
		array(
			'title'    => __('Open Link URL In New Window', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to open the link in new window.','apcore' ),
			'id'       => 'link_icon_target',
			'default'  => '_self',
			'options'  => array('_self' => __('No', 'apcore'),'_blank' => __('Yes', 'apcore')),
		)
	);
$this->select(
			array(
				'title'    => __('Image Rollover Icons', 'apcore'), 
				'subtitle' => esc_html__( 'Choose Icons Show/Hide on this post.','apcore' ),
				'id'       => 'image_rollover_icons_show_hide',
				'default'  => 'default',
				'options'  => array('show' => __('Show', 'apcore'), 'hide' => __('Hide', 'apcore')),
			)
	);
	
$this->select(
		array(
			'title'    => __('Show Related Portfolios', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to show or hide related portfolios on this portfolio.','apcore' ),
			'id'       => 'related_posts',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'on' => __('Show', 'apcore'), 'off' => __('Hide', 'apcore')),
		)
	);
	// Dependency check that video format.
	$related_posts_dependency = array(
		array(
			'field'      => 'related_posts',
			'value'      => 'on',
			'comparison' => '==',
		),
	);
$this->select(
		array(
			'title'    => __('Related Portfolio Number of Columns', 'apcore'), 
			'subtitle' => esc_html__( 'Select the number of columns for the related portfolio on single portfolio pages.','apcore' ),
			'id'       => 'related_portfolio_columns',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), '2' => __('2', 'apcore'), '3' => __('3', 'apcore'), '4' => __('4', 'apcore'), '5' => __('5', 'apcore'), '6' => __('6', 'apcore')),
		),$related_posts_dependency
	);
	
$this->select(
		array(
			'title'    => __('Show Social Share Box', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to show or hide the social share box','apcore' ),
			'id'       => 'share_box',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),
		)
	);

$this->select(
		array(
			'title'    => __('Show Previous/Next Pagination', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to show or hide the post navigation','apcore' ),
			'id'       => 'post_pagination',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),
		)
	);
$this->radio_buttonset(
		array(
				'title'    => __('Navigation Style', 'apcore'), 
				'subtitle' => esc_html__( 'Controls the Navigation style.','apcore' ),
				'id'       => 'navigation_style',
				'default'  => 'style1',
				'options'  => array('style1' => __( 'Style 1', 'apcore' ),'style2' => __( 'Style 2', 'apcore' ),'style3' => __( 'Style 3', 'apcore' ),'style4' => __( 'Style 4', 'apcore' )),
			),
			array(
			array(
				'field'      => 'post_pagination',
				'value'      => 'yes',
				'comparison' => '==',
				)	
			)
);	
		
/* Omit closing PHP tag to avoid "Headers already sent" issues. */
