<?php
//Custom query for Portfolio Category
function apress_set_post_filters( $query ) {
	global $apress_data;
	if( ( is_tax( 'catportfolio' ) )&& $query->is_main_query() ) {
		$query->set( 'posts_per_page', $apress_data['portfolio_items'] );
	}
	return $query;
}

add_filter('pre_get_posts', 'apress_set_post_filters');


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function apress_gallery_add_custom_box() {

    $screens = array( 'zt_portfolio' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'apress_gallery_gallery',
            __( 'Images gallery', 'apcore' ),
            'apress_gallery_inner_custom_box',
            $screen,
            'side'
        );
    }
}
add_action( 'add_meta_boxes', 'apress_gallery_add_custom_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function apress_gallery_inner_custom_box( $post ) {

    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'apress_gallery_inner_custom_box', 'apress_gallery_inner_custom_box_nonce' );


    ?>

    <div id="gallery_images_container">
        <ul class="gallery_images">
            <?php
            if ( metadata_exists( 'post', $post->ID, '_gallery_image_gallery' ) ) {
                $gallery_image_gallery = get_post_meta( $post->ID, '_gallery_image_gallery', true );
            } else {
                // Backwards compat
                $attachment_ids = get_posts( 'post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids' );
                $attachment_ids = array_diff( $attachment_ids, array( get_post_thumbnail_id() ) );
                $gallery_image_gallery = implode( ',', $attachment_ids );
            }

            $attachments = array_filter( explode( ',', $gallery_image_gallery ) );

            if ( $attachments ) {
                foreach ( $attachments as $attachment_id ) {
                    echo '<li class="image" data-attachment_id="' . esc_attr($attachment_id) . '">
								' . wp_get_attachment_image( $attachment_id ) . '
								<ul class="actions">
									<li><a href="#" class="delete tips" data-tip="' . __( 'Delete image', 'apcore' ) . '">' . __( 'Delete', 'apcore' ) . '</a></li>
								</ul>
							</li>';
                }
			} ?>
        </ul>

        <input type="hidden" id="gallery_image_gallery" name="gallery_image_gallery" value="<?php echo esc_attr( $gallery_image_gallery ); ?>" />

    </div>
    <p class="add_gallery_images hide-if-no-js">
        <a class="button" href="#"><?php _e( 'Add gallery images', 'apcore' ); ?></a>
    </p>
    <script type="text/javascript">
        jQuery(document).ready(function($){

            // Uploading files
            var gallery_gallery_frame;
            var $image_gallery_ids = $('#gallery_image_gallery');
            var $gallery_images = $('#gallery_images_container ul.gallery_images');

            jQuery('.add_gallery_images').on( 'click', 'a', function( event ) {

                var $el = $(this);
                var attachment_ids = $image_gallery_ids.val();

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( gallery_gallery_frame ) {
                    gallery_gallery_frame.open();
                    return;
                }

                // Create the media frame.
                gallery_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: '<?php _e( 'Add Images to post Gallery', 'apcore' ); ?>',
                    button: {
                        text: '<?php _e( 'Add to gallery', 'apcore' ); ?>'
                    },
                    multiple: true
                });

                // When an image is selected, run a callback.
                gallery_gallery_frame.on( 'select', function() {

                    var selection = gallery_gallery_frame.state().get('selection');

                    selection.map( function( attachment ) {

                        attachment = attachment.toJSON();

                        if ( attachment.id ) {
                            attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

                            $gallery_images.append('\
									<li class="image" data-attachment_id="' + attachment.id + '">\
										<img src="' + attachment.url + '" />\
										<ul class="actions">\
											<li><a href="#" class="delete" title="<?php _e( 'Delete image', 'apcore' ); ?>"><?php _e( 'Delete', 'apcore' ); ?></a></li>\
										</ul>\
									</li>');
                        }

                    } );

                    $image_gallery_ids.val( attachment_ids );
                });

                // Finally, open the modal.
                gallery_gallery_frame.open();
            });

            // Image ordering
            $gallery_images.sortable({
                items: 'li.image',
                cursor: 'move',
                scrollSensitivity:40,
                forcePlaceholderSize: true,
                forceHelperSize: false,
                helper: 'clone',
                opacity: 0.65,
                placeholder: 'wc-metabox-sortable-placeholder',
                start:function(event,ui){
                    ui.item.css('background-color','#f6f6f6');
                },
                stop:function(event,ui){
                    ui.item.removeAttr('style');
                },
                update: function(event, ui) {
                    var attachment_ids = '';

                    $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                        var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                        attachment_ids = attachment_ids + attachment_id + ',';
                    });

                    $image_gallery_ids.val( attachment_ids );
                }
            });

            // Remove images
            $('#gallery_images_container').on( 'click', 'a.delete', function() {

                $(this).closest('li.image').remove();

                var attachment_ids = '';

                $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                    var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                    attachment_ids = attachment_ids + attachment_id + ',';
                });

                $image_gallery_ids.val( attachment_ids );

                return false;
            } );

        });
    </script>


<?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function apress_gallery_save_postdata( $post_id ) {

    /*
     * We need to verify this came from the our screen and with proper authorization,
     * because save_post can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['apress_gallery_inner_custom_box_nonce'] ) )
        return $post_id;

    $nonce = $_POST['apress_gallery_inner_custom_box_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'apress_gallery_inner_custom_box' ) )
        return $post_id;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    // Check the user's permissions.
    if ( 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) )
            return $post_id;
    }

    /* OK, its safe for us to save the data now. */

    // Sanitize user input.
    $mydata = $_POST['gallery_image_gallery'];

    // Update the meta field in the database.
    update_post_meta( $post_id, '_gallery_image_gallery', $mydata );
}
add_action( 'save_post', 'apress_gallery_save_postdata' );



#-----------------------------------------------------------------#
# Add URL option into attachment details for visual composer image gallery element
#-----------------------------------------------------------------#

function apress_add_attachment_field_credit( $form_fields, $post ) {

    $image_gal_masonry_sizing_mapping = null;	
	
    $image_gal_masonry_sizing_mapping_options = array(	'choose' 									=> __('Choose', 'apcore'),
														'apcore_shortcode_portfolio_small_squared' 	=> __('Small Squared', 'apcore'),
														'apcore_shortcode_portfolio_squared' 		=> __('Big Squared', 'apcore'), 
														'apcore_shortcode_portfolio_landscape' 		=> __('Landscape', 'apcore'), 
														'apcore_shortcode_portfolio_portrait' 		=> __('Portrait', 'apcore')
													);
	
    $meta = get_post_meta( $post->ID, 'apress_image_gal_packery_sizing', true );
    foreach( $image_gal_masonry_sizing_mapping_options as $key => $option ) {
		$image_gal_masonry_sizing_mapping .= '<option value="' . $key . '"';
		if( $meta ){
			if( $meta == $key ) $image_gal_masonry_sizing_mapping .= ' selected="selected"'; 
		} 
		$image_gal_masonry_sizing_mapping .=  '>'. $option .'</option>';
	} 

	$form_fields["packery-image-sizing"] = array(
     	'label' => 'Packery Sizing',
     	'input' => 'html',
        'html' => "<select name='attachments[{$post->ID}][packery-image-sizing]' id='attachments[{$post->ID}][packery-image-sizing]'>".$image_gal_masonry_sizing_mapping."</select>",
		'helps' => '',
		'value' => get_post_meta( $post->ID, 'apress_image_gal_packery_sizing', true )
	);

    return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'apress_add_attachment_field_credit', 10, 2 );

function apress_add_attachment_field_credit_save( $post, $attachment ) {

	if( isset( $attachment['packery-image-sizing'] ) ) {
		$packery_image_sizing_sanitized = sanitize_text_field($attachment['packery-image-sizing']);
	    update_post_meta( $post['ID'], 'apress_image_gal_packery_sizing', $packery_image_sizing_sanitized );
	}

    return $post;
}
add_filter( 'attachment_fields_to_save', 'apress_add_attachment_field_credit_save', 10, 2 );