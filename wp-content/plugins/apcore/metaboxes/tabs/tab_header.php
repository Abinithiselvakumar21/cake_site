<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$menus = get_terms(
	'nav_menu',
	array(
		'hide_empty' => false,
	)
);
$menu_select['default'] = 'Default Menu';

foreach ( $menus as $menu ) { 
	$menu_select[ $menu->term_id ] = $menu->name;
}


$header_options[''] = 'Select';

$header_template = get_posts( array( 'post_type' => 'apcore_header', 'posts_per_page' => -1 ) );

foreach ( $header_template as $header_template ) {
	$header_options[$header_template->ID] = $header_template->post_title;
}

// Dependency check that which header builder active.
$display_header = array(
	array(
		'field'      => 'header_display',
		'value'      => 'yes',
		'comparison' => '==',
	)
);
$display_default_header = array(
	array(
		'field'      => 'header_display',
		'value'      => 'yes',
		'comparison' => '==',
	),
	array(
		'field'      => 'header_builder',
		'value'      => 'default',
		'comparison' => '==',
	),
);

$display_header_builder = array(
	array(
		'field'      => 'header_display',
		'value'      => 'yes',
		'comparison' => '==',
	),
	array(
		'field'      => 'header_builder',
		'value'      => 'page_editor',
		'comparison' => '==',
	),
);


$this->radio_buttonset(
		array(
			'title'    => __('Display Header', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to show or hide the header.','apcore' ),
			'id'       => 'header_display',
			'default'  => 'default',
			'options'  => array(
				'default' => esc_html__( 'Default', 'apcore' ),
				'yes' => esc_html__( 'On', 'apcore' ),
				'no' => esc_html__( 'Off', 'apcore' )
			),
		)			
);	

$this->radio_buttonset(
		array(
			'title'    => __('Header Builder', 'apcore'), 
			'subtitle' => esc_html__( 'Choose builder type.','apcore' ),
			'id'       => 'header_builder',
			'default'  => 'default',
			'options'		=> array(					
					'default'  		=> esc_html__( 'Default', 'apcore' ),
					'page_editor'   => esc_html__( 'Header Builder', 'apcore' ),
				),
		),
		array(
			array(
				'field'      => 'header_display',
				'value'      => 'yes',
				'comparison' => '==',
			),
		)
	);
	
$this->select(
	array(
		'title'    => __('Select Header Page', 'apcore'), 
		'subtitle' => esc_html__( 'First make your header from header custom types then select it from here.','apcore' ),
		'id'       => 'header_builder_template',
		'default'  => 'default',
		'options'  => $header_options ,
	),
	$display_header_builder
);	
		
$this->select(
		array(
			'title'    => __('100% Header Width', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to set header width to 100% of the browser width. Select "No" for site width.','apcore' ),
			'id'       => 'header_100_width',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Yes', 'apcore'), 'no' => __('No', 'apcore')),
			
		),
		$display_default_header
	);

$this->image_upload(	
		array(
				'title'    => __('Background Image', 'apcore'), 
				'subtitle' => esc_html__( 'Select an image to use for the header background.','apcore' ),
				'id'       => 'header_bg_img',
				'default'  => '',
			),
			$display_default_header
		); 

$this->color(
		array(
			'title'    => __('Background Color', 'apcore'), 
			'subtitle' => esc_html__( 'Controls the background color of the header.','apcore' ),
			'id'       => 'header_bg_color',
			'default'  => '',
		),
		$display_default_header
	);

$this->select(
		array(
				'title'    => __('100% Background Image', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to have the background image display at 100%.','apcore' ),
				'id'       => 'header_100per_bg',
				'default'  => 'no',
				'options'  => array('no' => __('No', 'apcore'), 'yes' => __('Yes', 'apcore')),
				
			),
			$display_default_header
	);

$this->select(
		array(
				'title'    => __('Background Repeat', 'apcore'), 
				'subtitle' => esc_html__( 'Select how the background image repeats.','apcore' ),
				'id'       => 'header_bg_repeat',
				'default'  => 'default',
				'options'  => array('repeat' => __('Repeat', 'apcore'), 'repeat-x' => __('Repeat-x', 'apcore'), 'repeat-y' => __('Repeat-y', 'apcore'), 'no-repeat' => __('No Repeat', 'apcore')),
				
			),
			$display_default_header
			
	);

$this->select(
	array(
		'title'    => __('Main Navigation Menu', 'apcore'), 
		'subtitle' => esc_html__( 'Select which menu displays on this page','apcore' ),
		'id'       => 'displayed_menu',
		'default'  => 'default',
		'options'  => $menu_select ,
		),
		$display_default_header
		
);

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
