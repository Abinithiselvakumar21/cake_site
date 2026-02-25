<?php
/**
 * Default header template
 *
 * @package Apress
 */
$header = apress_get_header_layout();
?>

<header <?php apress_helper()->attr( 'header', $header['attributes'] ); ?>>
            <div class="zolo_header_builder zolo_vc_header_builder">
				<?php
                $header_content = get_post_field( 'post_content', $header['id'] );
                //$header_content = str_replace( 'vc_row', 'ld_header_row', $header_content );
                //$header_content = str_replace( 'vc_column', 'ld_header_column', $header_content );
                echo do_shortcode( $header_content );
                ?>
            </div>
</header>
