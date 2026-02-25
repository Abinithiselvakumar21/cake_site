<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
	
    $this->image_buttonset(
        array(
            'title'    => __('Post Design', 'apcore'), 
            'subtitle' => esc_html__( 'Select post layout','apcore' ),
            'id'       => 'single_post_layout_style',
            'default'  => 'default',
            'options'  => array(
                    'default'	=> array(
					'alt'   => 'default', 
					'img'   => get_template_directory_uri().'/assets/images/default.jpg',
					), 
					'layout_style1'	=> array(
					'alt'   => 'layout_style1', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout1.jpg',
					),      	
					'layout_style2'	=> array(
					'alt'   => 'layout_style2', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout2.jpg',
					),						
					'layout_style3'	=> array(
					'alt'   => 'layout_style3', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout3.jpg',
					),
					'layout_style4'	=> array(
					'alt'   => 'layout_style4', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout4.jpg',
					),
					'layout_style5'	=> array(
					'alt'   => 'layout_style5', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout5.jpg',
					),
					'layout_style6'	=> array(
					'alt'   => 'layout_style6',
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout6.jpg',
					),
            ),
        )
    );   
	$display_post_layout = array(
		array(
			'field'      => 'single_post_layout_style',
			'value'      => 'layout_style1',
			'comparison' => '==',
		),
	);
	$this->radio_buttonset(
		array(
			'title'    => __('Post Layout', 'apcore'), 
			'subtitle' => esc_html__( 'Controls Post Layout.','apcore' ),
			'id'       => 'post_single_post_layout_template',
			'default'  => 'default',
			'options'  => array('default' => __( 'Default', 'apcore' ),'post_layout_sidebar_template' => __( 'Sidebar Template', 'apcore' ),'post_layout_no_sidebar_template' => __( 'No Sidebar Template', 'apcore' )),
		),
		$display_post_layout
    );         
    $this->text(
		array(
			'title'    => __('Single Post Content Max Width', 'apcore'), 
			'subtitle' => esc_html__( 'Insert with px ex: 900px. Leave empty for default value.','apcore' ),
			'id'       => 'single_post_layout_width',
			'default'  => '',
		)
	);
    $this->select(
		array(
				'title'    => __('Featured Image', 'apcore'), 
				'subtitle' => esc_html__( 'Show / Hide featured images and videos on single post pages.','apcore' ),
				'id'       => 'show_hide_featured',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'),'hide' => __('Hide', 'apcore'), 'show' => __('Show', 'apcore')),
			)
		);
    
    $this->radio_buttonset(
		array(
				'title'    => __('Use 100% Width Page', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to set this post to 100% browser width.','apcore' ),
				'id'       => 'post_width_100',
				'default'  => 'default',
				'options'  => array('default' => __( 'Default', 'apcore' ),'no' => __( 'No', 'apcore' ),'yes' => __( 'Yes', 'apcore' )),
			)
    );
    
    $this->radio_buttonset(
		array(
			'title'    => __('Video Format', 'apcore'), 
			'subtitle' => esc_html__( 'Choose Video Format.','apcore' ),
			'id'       => 'video_format',
			'default'  => 'hide',
			'options'  => array('hide' => __('Hide', 'apcore'), 'self_hosted' => __('Self Hosted', 'apcore'), 'ap_youtube' => __('Youtube', 'apcore')),
			
		)
	);
	
	// Dependency check that video format.
	$self_hosted_video_dependency = array(
		array(
			'field'      => 'video_format',
			'value'      => 'hide',
			'comparison' => '!=',
		),
		array(
			'field'      => 'video_format',
			'value'      => 'self_hosted',
			'comparison' => '==',
		),
		
	);
	// Dependency check that video format.
	$youtube_video_dependency = array(
		array(
			'field'      => 'video_format',
			'value'      => 'hide',
			'comparison' => '!=',
		),
		array(
			'field'      => 'video_format',
			'value'      => 'ap_youtube',
			'comparison' => '==',
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
				'title'    => __('Show Related Posts', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to show or hide related posts on this post.','apcore' ),
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
			'title'    => __('Related Post Number of Columns', 'apcore'), 
			'subtitle' => esc_html__( 'Select the number of columns for the related Post on single post pages.','apcore' ),
			'id'       => 'related_post_columns',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), '2' => __('2', 'apcore'), '3' => __('3', 'apcore'), '4' => __('4', 'apcore'), '5' => __('5', 'apcore'), '6' => __('6', 'apcore')),
		),$related_posts_dependency
	);
	
    $this->select(
		array(
				'title'    => __('Show Social Share Box', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to show or hide the social share box.','apcore' ),
				'id'       => 'share_box',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),
			)
		);
    
    $this->select(
		array(
				'title'    => __('Show Previous/Next Pagination', 'apcore'), 
				'subtitle' => esc_html__('Choose to show or hide the post navigation', 'apcore'),
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
    $this->select(	
		array(
				'title'    => __('Show Author Info Box', 'apcore'), 
				'subtitle' => esc_html__('Choose to show or hide the author info box', 'apcore'),
				'id'       => 'author_info',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),				
			)
		);
    
    $this->select(	
		array(
				'title'    => __('Show Post Meta', 'apcore'), 
				'subtitle' => esc_html__('Choose to show or hide the post meta', 'apcore'),
				'id'       => 'post_meta',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),				
			)
		);
    
    $this->select(	
		array(
			'title'    => __('Show Comments', 'apcore'), 
			'subtitle' => esc_html__('Choose to show or hide comments area', 'apcore'),
			'id'       => 'post_comments',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),				
		)
	);
    

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
