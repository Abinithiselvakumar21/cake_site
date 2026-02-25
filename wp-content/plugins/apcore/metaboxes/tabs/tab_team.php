<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
$this->select(
	array(
		'title'    => __('Layout Style', 'apcore'), 
		'subtitle' => esc_html__( 'Choose your single Testimonial page layout style.','apcore' ),
		'id'       => 'team_single_page_style',
		'default'  => 'default',
		'options'  => array(
			'default' => __('Default', 'apcore'), 
			'team_layout_style_1' => __('Layout Style 1', 'apcore'), 
			'team_layout_style_2' => __('Design Your Own', 'apcore')
		),
	)
);

$this->text(
		array(
			'title'    => __('Designation', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Designation.','apcore' ),
			'id'       => 'team_designation',
			'default'  => '',
		)
	);
$this->text(
		array(
			'title'    => __('Facebook', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Facebook URL.','apcore' ),
			'id'       => 'team_facebook',
			'default'  => '',
		)
	);
$this->text(
		array(
			'title'    => __('Twitter', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Twitter URL.','apcore' ),
			'id'       => 'team_twitter',
			'default'  => '',
		)
	);
$this->text(
		array(
			'title'    => __('Linkedin', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Linkedin URL.','apcore' ),
			'id'       => 'team_linkedin',
			'default'  => '',
		)
	);
	
$this->text(
		array(
			'title'    => __('Pinterest', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Pinterest URL.','apcore' ),
			'id'       => 'team_pinterest',
			'default'  => '',
		)
	);
	
$this->text(
		array(
			'title'    => __('Github', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Github URL.','apcore' ),
			'id'       => 'team_github',
			'default'  => '',
		)
	);	

$this->text(
		array(
			'title'    => __('Instagram', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Instagram URL.','apcore' ),
			'id'       => 'team_insta',
			'default'  => '',
		)
	);
	
$this->text(
		array(
			'title'    => __('Dribble', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Dribble URL.','apcore' ),
			'id'       => 'team_dribble',
			'default'  => '',
		)
	);

$this->text(
		array(
			'title'    => __('Behance', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Behance URL.','apcore' ),
			'id'       => 'team_behance',
			'default'  => '',
		)
	);

$this->text(
		array(
			'title'    => __('500px', 'apcore'), 
			'subtitle' => esc_html__( 'Enter 500px URL.','apcore' ),
			'id'       => 'team_500px',
			'default'  => '',
		)
	);

$this->text(
		array(
			'title'    => __('Deviantart', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Deviantart URL.','apcore' ),
			'id'       => 'team_deviantart',
			'default'  => '',
		)
	);
	
$this->text(
		array(
			'title'    => __('Xing', 'apcore'), 
			'subtitle' => esc_html__( 'Enter xing URL.','apcore' ),
			'id'       => 'team_xing',
			'default'  => '',
		)
	);	

$this->text(
		array(
			'title'    => __('Email Address', 'apcore'), 
			'subtitle' => esc_html__( 'Enter Email Address.','apcore' ),
			'id'       => 'team_email',
			'default'  => '',
		)
	);	
				
$this->select(
	array(
		'title'    => __('Show Social Share Box', 'apcore'), 
		'subtitle' => esc_html__( 'Choose to show or hide the social share box.','apcore' ),
		'id'       => 'share_box',
		'default'  => 'default',
		'options'  => array(
			'default' 	=> __('Default', 'apcore'), 
			'yes' 		=> __('Show', 'apcore'), 
			'no' 		=> __('Hide', 'apcore')
		),
	)
);

$this->select(
	array(
		'title'    => __('Show Related Posts', 'apcore'), 
		'subtitle' => esc_html__( 'Choose to show or hide related posts on this post.','apcore' ),
		'id'       => 'team_related_posts',
		'default'  => 'default',
		'options'  => array('default' => __('Default', 'apcore'), 'on' => __('Show', 'apcore'), 'off' => __('Hide', 'apcore')),
	)
);

// Dependency check that video format.
$related_posts_dependency = array(
	array(
		'field'      => 'team_related_posts',
		'value'      => 'on',
		'comparison' => '==',
	),
);
$this->select(
		array(
			'title'    => __('Related Team Number of Columns', 'apcore'), 
			'subtitle' => esc_html__( 'Select the number of columns for the related team on single team pages.','apcore' ),
			'id'       => 'related_team_columns',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), '2' => __('2', 'apcore'), '3' => __('3', 'apcore'), '4' => __('4', 'apcore'), '5' => __('5', 'apcore'), '6' => __('6', 'apcore')),
		),$related_posts_dependency
	);
	
	
$this->select(
	array(
		'title'    => __('Show Previous/Next Pagination', 'apcore'),
		'subtitle' => esc_html__( 'Choose to show or hide the post navigation.','apcore' ),
		'id'       => 'team_pagination',
		'default'  => 'default',
		'options'  => array(
			'default' 	=> __('Default', 'apcore'),
			'yes' 		=> __('Show', 'apcore'), 
			'no' 		=> __('Hide', 'apcore')
		),
	)
);
