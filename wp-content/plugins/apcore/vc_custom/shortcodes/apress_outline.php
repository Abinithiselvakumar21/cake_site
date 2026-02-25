<?php 
/*-----------------------------------------------------------------------------------*/
/* Outlinetext
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Outlinetext_Module')) {
	class Apress_Outlinetext_Module {
		function __construct() {
			add_shortcode( 'apress_outline', array( &$this, 'apress_outline' ) );
		}
		

		function apress_outline( $atts, $content=null ){		
			extract(shortcode_atts(array(
					'outlinetext'				=> 'Outline Text',
					'outlinetextcolor'			=> '#333333',
					'outlinefilltextcolor'		=> '#333333',
					'outlinestrokewidth' 		=> '1',
					'textcolorfillonhover' 		=> 'no',
					
			), $atts));
			
		ob_start();
		
		
		$textcolorfillonhover_class = $textcolorfillonhover_text = '';
		
		$uniqid = uniqid(rand());
		$zolo_outline_id = 'zolo_outline_id'.$uniqid;
		if($textcolorfillonhover == 'yes'){
			$textcolorfillonhover_class = 'textcolorfillonhover';
			$textcolorfillonhover_text = 'data-text="'.$outlinetext.'"';
		}
		?>



		<span id="<?php echo $zolo_outline_id;?>" class="zolo_outlinetext <?php echo $textcolorfillonhover_class; ?>" <?php echo $textcolorfillonhover_text; ?> ><?php echo $outlinetext; ?></span>


<?php        
$custom_css = '';
	$custom_css .= '#'.$zolo_outline_id.'.zolo_outlinetext{ 
	-webkit-text-fill-color:transparent;
	text-fill-color:transparent;
	-webkit-text-stroke-width:'.$outlinestrokewidth.'px;
	text-stroke-width:'.$outlinestrokewidth.'px;
	-webkit-text-stroke-color:'.$outlinetextcolor.';
	text-stroke-color:'.$outlinetextcolor.';
	-webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    transition: all .3s ease;
	}';
	$custom_css .= '#'.$zolo_outline_id.'.textcolorfillonhover:before{
	color:'.$outlinefilltextcolor.';
	-webkit-text-stroke-width:'.$outlinestrokewidth.'px;
	text-stroke-width:'.$outlinestrokewidth.'px;
	-webkit-text-stroke-color:'.$outlinefilltextcolor.';
	text-stroke-color:'.$outlinefilltextcolor.';
	}';
	
	/*if($textcolorfillonhover == 'yes'){
	$custom_css .= '#'.$zolo_outline_id.'.zolo_outlinetext:hover{ color:'.$outlinetextcolor.';
	-webkit-text-fill-color:inherit;
	text-fill-color:inherit;
	}';
	}*/

	apcore_save_plugin_dyn_styles( $custom_css );
?>	
		<?php 
		$output_string = ob_get_contents();
		ob_end_clean();
		return $output_string;
		} 
	}
	
	$Apress_Outlinetext_Module = new Apress_Outlinetext_Module;
}
?>