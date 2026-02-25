<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$this->image_buttonset(
		array(
			'title'    => __('Header Style', 'apcore'), 
			'subtitle' => esc_html__( 'Choose Header Style','apcore' ),
			'id'       => 'choose_header_style',
			'default'  => 'default',
			'options'  => array(
				'top_header'	=> array(
					'alt'   => 'top_header', 
					'img'   => get_template_directory_uri().'/assets/images/headers/header_type/header_type1.jpg',
				),      	
				/*'bottom_header'	=> array(
					'alt'   => 'bottom_header', 
					'img'   => get_template_directory_uri().'/assets/images/headers/header_type/header_type2.jpg',
				),	*/					
				'left_header'	=> array(
					'alt'   => 'left_header', 
					'img'   => get_template_directory_uri().'/assets/images/headers/header_type/header_type3.jpg',
				),
				'right_header'	=> array(
					'alt'   => 'right_header', 
					'img'   => get_template_directory_uri().'/assets/images/headers/header_type/header_type4.jpg',
				),
            ),	
		)
	);
	
	$this->text(
		array(
			'title'    => __('Header Width', 'apcore'), 
			'subtitle' => esc_html__( 'Insert value with px/% ex: 10px. Leave empty for default value.','apcore' ),
			'id'       => 'vertical_header_width',
			'default'  => '',
		),//$header_dependency
		array(
			array(
				'field'      => 'choose_header_style',
				'value'      => 'bottom_header',
				'comparison' => '!=',
				),
			array(
				'field'      => 'choose_header_style',
				'value'      => 'top_header',
				'comparison' => '!=',
				),
			)
			
	);
	$this->radio_buttonset(
		array(
			'title'    => __('Enable Sticky Header', 'apcore'), 
			'subtitle' => esc_html__( 'Turn on to show sticky header.','apcore' ),
			'id'       => 'enable_sticky_header',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'off' => __('Off', 'apcore'), 'on' => __('On', 'apcore')),
			
		)
	);
	$this->select(
			array(
				'title'    => __('Sticky Header Style', 'apcore'), 
				'subtitle' => esc_html__( 'Select the Sticky effect.','apcore' ),
				'id'       => 'sticky_header_style',
				'default'  => 'default',
				'options'  => array(
						'default' => esc_html__( 'Default', 'apcore'),
						'slide_down' => esc_html__( 'Slide Down', 'apcore'),
						//'on_scroll_up' => esc_html__( 'On Scroll Up', 'apcore'),
				),
			),
			array(
				array(
				'field'      => 'enable_sticky_header',
				'value'      => 'on',
				'comparison' => '==',
				),
			)
		);
	$this->radio_buttonset(
			array(
				'title'    => __('Sticky Header Background Color Option', 'apcore'), 
				'subtitle' => esc_html__( 'Select the Color Type.','apcore' ),
				'id'       => 'sticky_header_bg_color_option',
				'default'  => 'color',
				'options'  => array('color' => __('Color', 'apcore'), 'gradient' => __('Gradient', 'apcore')),
				
			),
			array(
				array(
				'field'      => 'enable_sticky_header',
				'value'      => 'on',
				'comparison' => '==',
				),
			)
		);
		$this->color(
			array(
				'title'    => __('Background Color', 'apcore'), 
				'subtitle' => esc_html__( 'Controls the background color for the header background.','apcore' ),
				'id'       => 'sticky_bg_color',
				'default'  => '',
			),
			array(
				array(
					'field'      => 'enable_sticky_header',
					'value'      => 'on',
					'comparison' => '==',
				),
			)
		);
		$this->color(
			array(
				'title'    => __('Background 2nd Color', 'apcore'), 
				'subtitle' => esc_html__( 'Controls the background color for the header background.','apcore' ),
				'id'       => 'sticky_bg_color_2nd',
				'default'  => '',
			),
			array(
				array(
					'field'      => 'sticky_header_bg_color_option',
					'value'      => 'color',
					'comparison' => '!=',
				),
				array(
					'field'      => 'enable_sticky_header',
					'value'      => 'on',
					'comparison' => '==',
				),
			)
		);
		
		
		$this->color(
			array(
				'title'    => __('Text Color', 'apcore'), 
				'subtitle' => esc_html__( 'Controls the text color for the header text.','apcore' ),
				'id'       => 'sticky_text_color',
				'default'  => '',
			),
			array(
				array(
					'field'      => 'enable_sticky_header',
					'value'      => 'on',
					'comparison' => '==',
				),
			)
		);
		$this->radio_buttonset(
			array(
				'title'    => __('Text Hover Color Option', 'apcore'), 
				'subtitle' => esc_html__( 'Select the Color Type.','apcore' ),
				'id'       => 'sticky_text_hover_color_option',
				'default'  => 'color',
				'options'  => array('color' => __('Color', 'apcore'), 'gradient' => __('Gradient', 'apcore')),
				
			),
			array(
				array(
				'field'      => 'enable_sticky_header',
				'value'      => 'on',
				'comparison' => '==',
				),
			)
		);
		
		
		$this->color(
			array(
				'title'    => __('Text Hover Color', 'apcore'), 
				'subtitle' => esc_html__( 'Controls the text Hover color for the header text.','apcore' ),
				'id'       => 'sticky_hover_text_color',
				'default'  => '',
			),
			array(
				array(
					'field'      => 'enable_sticky_header',
					'value'      => 'on',
					'comparison' => '==',
				),
			)
		);
		$this->color(
					array(
						'title'    => __('Text 2nd Hover Color', 'apcore'), 
						'subtitle' => esc_html__( 'Controls the text Hover color for the header text.','apcore' ),
						'id'       => 'sticky_hover_text_color_2nd',
						'default'  => '',
					),
					array(
						array(
							'field'      => 'sticky_text_hover_color_option',
							'value'      => 'color',
							'comparison' => '!=',
						),
						array(
							'field'      => 'enable_sticky_header',
							'value'      => 'on',
							'comparison' => '==',
						),
					)
				);
				
		$this->radio_buttonset(
			array(
				'title'    => __('Sticky Header Shadow', 'apcore'), 
				'subtitle' => esc_html__( 'Turn on to show sticky header Shadow.','apcore' ),
				'id'       => 'enable_sticky_header_shadow',
				'default'  => 'off',
				'options'  => array('off' => __('Off', 'apcore'), 'on' => __('On', 'apcore')),
				
			)
		);
