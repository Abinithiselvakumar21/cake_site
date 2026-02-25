<?php 
/*-----------------------------------------------------------------------------------*/
/* Vertical Text Block
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
	extract(shortcode_atts(array(
		'vertical_text_font_options' 	=> '',
		'show_item_in_side_panel'		=> 'disable',
		'side_panel_alignment'			=> 'right',
		'side_panel_vertical_alignment'	=> 'middle',
		'side_panel_top_offset'			=> '20px',
		'side_panel_middle_offset'		=> '50%',
		'side_panel_bottom_offset'		=> '20px',
		'side_panel_left_offset'		=> '0px',
		'side_panel_right_offset'		=> '0px',
		
		'vertical_text_block_position'			=> 'relative',
		'vertical_text_block_alignment'			=> 'left',
		'vertical_text_block_top_offset'		=> '20px',
		'vertical_text_block_right_offset'		=> '',
		'vertical_text_block_bottom_offset'		=> '',
		'vertical_text_block_left_offset'		=> '20px',
		
		
		'hide_under_screen_size'		=> '',
		'vertical_text_block_color_light'=> '#000',
		'vertical_text_block_color_dark'=> '#fff',
		'vertical_text_block_color_hover'=> '#333',
		'class'							=> '',
		
	), $atts));
		
		
	$uniqid = uniqid(rand());
	$c = 'acp_'.$uniqid; 
	
	if($show_item_in_side_panel == 'enable'){
		$show_item_in_side_panel_class = 'show_item_in_side_panel_enable';
		$vertical_text_block_alignment_class = $side_panel_alignment;
		$side_panel_vertical_alignment_class = $side_panel_vertical_alignment;
	}else{
		$show_item_in_side_panel_class = 'show_item_in_side_panel_disable';
		$vertical_text_block_alignment_class = $vertical_text_block_alignment;
		$side_panel_vertical_alignment_class = '';
		}			
				
// Title Text HTML.
	$title_options = _zolo_parse_text_shortcode_params($vertical_text_font_options, '');
?>

<!--zolo Media Post Start-->

<div id="zolo_vertical_text_block_<?php echo $c;?>" class="zolo_vertical_text_block_wrapper <?php echo $class.' '.$show_item_in_side_panel_class.' '.$vertical_text_block_alignment_class.' '.$side_panel_vertical_alignment_class;?>">

<?php //Content 
if (!empty($content)) {
		echo '<div class="zolo_vertical_text_block" ' . $title_options['style'] . '>';
 		echo apply_filters('the_content', $content);
    	echo '</div>';
		}?>
</div>




<?php
$shortcode_css = '';


$shortcode_css .= '#zolo_vertical_text_block_'.$c.',
#zolo_vertical_text_block_'.$c.' a,
.header_show_with_light_row #zolo_vertical_text_block_'.$c.',
.header_show_with_light_row #zolo_vertical_text_block_'.$c.' a{ color:'.$vertical_text_block_color_dark.';}';

$shortcode_css .= '.header_show_with_dark_row #zolo_vertical_text_block_'.$c.',
.header_show_with_dark_row #zolo_vertical_text_block_'.$c.' a{ color:'.$vertical_text_block_color_light.';}';

$shortcode_css .= '#zolo_vertical_text_block_'.$c.' a:hover{ color:'.$vertical_text_block_color_hover.';}';

if($show_item_in_side_panel == 'enable'){

	if($side_panel_alignment == 'right'){
		$shortcode_css .= '#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_enable{right:'.$side_panel_right_offset.';}';
	}else{
		$shortcode_css .= '#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_enable{left:'.$side_panel_left_offset.';}';
	}

	if($side_panel_vertical_alignment == 'top'){
		$shortcode_css .= '#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_enable{top:'.$side_panel_top_offset.';}';

	}else if($side_panel_vertical_alignment == 'middle'){
		$shortcode_css .= '#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_enable{top:'.$side_panel_middle_offset.';}';
	
	}else if($side_panel_vertical_alignment == 'bottom'){
		$shortcode_css .= '#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_enable{bottom:'.$side_panel_bottom_offset.';top: auto;}';
	}

}else{
	
	$shortcode_css .= '#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_disable{position:'.$vertical_text_block_position.';}';
	
	if($vertical_text_block_position == 'absolute'){
		if(! empty($vertical_text_block_top_offset)){
			$shortcode_css .= '#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_disable{top:'.$vertical_text_block_top_offset.';}';
		}
		if(! empty($vertical_text_block_right_offset)){
			$shortcode_css .= '#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_disable{right:'.$vertical_text_block_right_offset.';}';
		}
		if(! empty($vertical_text_block_bottom_offset)){
			$shortcode_css .= '#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_disable{bottom:'.$vertical_text_block_bottom_offset.';}';
		}
		if(! empty($vertical_text_block_left_offset)){
			$shortcode_css .= '#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_disable{left:'.$vertical_text_block_left_offset.';}';
		}
	
	}
	
	}

if($hide_under_screen_size != ''){
$shortcode_css .= '@media (max-width:'.$hide_under_screen_size.'px) {#zolo_vertical_text_block_'.$c.'.show_item_in_side_panel_enable{display: none;} }';
}

//apcore_save_plugin_dyn_styles( $shortcode_css );
echo '<style>'.$shortcode_css.'</style>';
