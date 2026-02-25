<?php
/**
 * Default footer template
 *
 * @package Apress
 */

$footer = apress_get_footer_layout();
$footer_builder_page_id = $footer['id'];
?>

      <?php 
		$footer_content = get_post_field( 'post_content', $footer_builder_page_id );
		//$footer_content = str_replace( 'vc_row', 'ap_footer_row', $header_content );
		//$footer_content = str_replace( 'vc_column', 'ap_footer_column', $header_content );
		echo do_shortcode( $footer_content );
	?>


