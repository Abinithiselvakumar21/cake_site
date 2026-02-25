<?php 
/*-----------------------------------------------------------------------------------*/
/* Google Map
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Google_Map extends WPBakeryShortCode {}

$doc_link = 'http://apresswp.com/help';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Google Map", 'apcore'),
					"base"			=> "apress_google_map",
					"weight"		=> 12,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"icon"				=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-iconbox.png",
					"params"		=> array(
						array(
							"type"			=>	"textfield",
							"class"			=>	"",
							"heading"		=>	esc_html__("Map name", "apcore"),
							"param_name"	=>	"map_name",
							"value"			=>	"",
							"description"	=>	esc_html__("Insert a unique map name.", "apcore"),
							"save_always"	=>	true,
						),

                        array(
                            "type"          => "textfield",
                            "class"         => "",
                            "heading"       => esc_html__("Location latitude", "apcore"),
                            "param_name"    => "map_latitude",
                            "value"         => "",
                            "description"   => esc_html__("Enter location latitude.", "apcore")
                        ),

                        array(
                            "type"          => "textfield",
                            "class"         => "",
                            "heading"       => esc_html__("Location longitude", "apcore"),
                            "param_name"    => "map_longitude",
                            "value"         => "",
                            "description"   => esc_html__("Enter location longitude.", "apcore")
                        ),

                        array(
                            "type"          => "dropdown",
                            "class"         => "",
                            "heading"       => esc_html__("Map zoom", "apcore"),
                            "param_name"    => "map_zoom",
                            "value"     =>  array(
                                "10 - City" => "10",
                                "11" => "11",
                                "12" => "12",
                                "13" => "13",
                                "14" => "14",
                                "15 - Streets" => "15",
                                "16" => "16",
                                "17" => "17",
                                "18" => "18",
                                "19" => "19",
                                "20 - Buildings" => "20",
                            ),
                            "description"   => esc_html__("Enter map zoom (default 14).", "apcore")
                        ),
						array(
							"type"			=>	"dropdown",
							"class"			=>	"",
							"heading"		=>	esc_html__("Map style", "apcore"),
							"param_name"	=>	"map_style",
							"value"			=>	array(
								esc_html__( 'Grayscale', 'apcore' ) 			=> 'gmap_style_grayscale',
								esc_html__( 'Google preset colors', 'apcore' )	=> 'gmap_style_normal',
							),
							"description"	=>	esc_html__("Choose map style.", "apcore"),
							"save_always"	=>	true,
						),

                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => esc_html__("Marker icon source", "apcore"),
                            "param_name" => "image_source",
                            "value" => array(
                                "Media library" => "media_library",
                                "External link" => "external_link",
                            ),
                            "description" => esc_html__("Select image source.", "apcore"),
                            "save_always" => true,
                        ),

                        array(
                            "type"          => "attach_image",
                            "heading"       => esc_html__("Map marker image", "apcore"),
                            "param_name"    => "map_icon",
                            "description"   => esc_html__("Upload map marker icon. Recommended image size: 50x50 (Width x Height).", "apcore"),
                            "dependency" =>	array(
                                "element" => "image_source",
                                "value" => array("media_library")
                            ),
                        ),

                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Marker image external source", "apcore"),
                            "param_name" => "ext_image",
                            "value" => "",
                            "description" => esc_html__("Enter image external link. Recommended image size: 50x50 (Width x Height).", "apcore"),
                            "dependency" =>	array(
                                "element" => "image_source",
                                "value" => array("external_link")
                            ),
                        ),

                        array(
                            "type"          => "textfield",
                            "class"         => "",
                            "heading"       => esc_html__("Map height", "apcore"),
                            "param_name"    => "map_height",
                            "value"         => "400px",
                            "description"   => esc_html__("Enter map height in pixels. Default is 400px.", "apcore")
                        ),

						array(
							"type"			=>	"dropdown",
							"class"			=>	"",
							"heading"		=>	esc_html__("Map info panel settings", "apcore"),
							"param_name"	=>	"map_business_panel_settings",
							"group"         => esc_html__("Business info", "apcore"),
							"value"			=>	array(
								esc_html__( "Hide business info panel", "apcore" ) => "hidden_info_panel",
								esc_html__( "Left aligned", "apcore" )	=> "left_info_panel",
								esc_html__( "Right aligned", "apcore" ) => "right_info_panel",
							),
							"save_always"	=>	true,
						),

						array(
							"type"          => "textfield",
							"class"         => "",
							"heading"       => esc_html__("Panel title", "apcore"),
							"param_name"    => "map_business_name",
							"value"         => "",
							"group"         => esc_html__("Business info", "apcore"),
							"description"   => esc_html__("Enter panel title.", "apcore"),
							"dependency" 	=>	array(
								"element" 	=> "map_business_panel_settings",
								"value" 	=> array("left_info_panel", "right_info_panel")
							),
						),

                        array(
                            "type"          => "textfield",
                            "class"         => "",
                            "heading"       => esc_html__("Address", "apcore"),
                            "param_name"    => "map_business_address",
                            "value"         => "",
                            "group"         => esc_html__("Business info", "apcore"),
                            "description"   => esc_html__("Enter business address.", "apcore"),
                            "dependency" =>	array(
                                "element" => "map_business_panel_settings",
                                "value" => array("left_info_panel", "right_info_panel")
                            ),
                        ),

                        array(
                            "type"          => "textfield",
                            "class"         => "",
                            "heading"       => esc_html__("Email", "apcore"),
                            "param_name"    => "map_business_email",
                            "value"         => "",
                            "group"         => esc_html__("Business info", "apcore"),
                            "description"   => esc_html__("Enter business email.", "apcore"),
                            "dependency" =>	array(
                                "element" => "map_business_panel_settings",
                                "value" => array("left_info_panel", "right_info_panel")
                            ),
                        ),

                        array(
                            "type"          => "textfield",
                            "class"         => "",
                            "heading"       => esc_html__("Phone", "apcore"),
                            "param_name"    => "map_business_phone",
                            "value"         => "",
                            "group"         => esc_html__("Business info", "apcore"),
                            "description"   => esc_html__("Enter business phone.", "apcore"),
                            "dependency" =>	array(
                                "element" => "map_business_panel_settings",
                                "value" => array("left_info_panel", "right_info_panel")
                            ),
                        ),

                        array(
                            "type"          => "textfield",
                            "class"         => "",
                            "heading"       => esc_html__("Opening hours title", "apcore"),
                            "param_name"    => "map_business_opening_hours",
                            "value"         => "",
                            "group"         => esc_html__("Business info", "apcore"),
                            "description"   => esc_html__("Enter opening hours title text.", "apcore"),
                            "dependency" =>	array(
                                "element" => "map_business_panel_settings",
                                "value" => array("left_info_panel", "right_info_panel")
                            ),
                        ),

						array(
							"type"         		=> "param_group",
							"class"         	=> "",
							"heading"       	=> esc_html__("Opening hours schedule", "apcore"),
							"value" 			=> urlencode( json_encode ( 
												array(
													array(
													"map_schedule_day"       => "",
													"map_schedule_day_info"  => "",
													)
												))),
							"param_name"   		=> "map_business_schedule",
							"group"        		=> esc_html__("Business info", "apcore"),
							"dependency" 		=>	array(
								"element" 		=> "map_business_panel_settings",
								"value" 		=> array("left_info_panel", "right_info_panel")
									),
							"params" 			=> array(
								array(
									"type" 			=> "textfield",
									"heading"		=> __("Day name","apcore"),
									"param_name" 	=> "map_schedule_day_name",
									"description" 	=> "",
									"admin_label" 	=> true,
								),
								array(
									"type" 			=> "textarea",
									"heading" 		=> __("Day opening/closing hours","apcore"),
									"param_name" 	=> "map_schedule_day_hours",
									"value" 		=> "",
									"description" 	=> "",
								),
							),							
						),
                    ),
					));	
			}		