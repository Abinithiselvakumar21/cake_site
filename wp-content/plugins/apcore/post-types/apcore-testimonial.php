<?php
/**
 * Post Type: Testimoniala
 * Register Custom Post Type
 */

global $apress_data;

$labels = array(
	'name'					=> __( 'Testimonials', 'apcore' ),
	'singular_name'			=> __( 'Testimonial', 'apcore' ),
	'add_new'				=> __( 'Add New', 'apcore' ),
	'add_new_item'			=> __( 'Add New Testimonial', 'apcore' ),
	'edit_item'				=> __( 'Edit Testimonial', 'apcore' ),
	'new_item'				=> __( 'New Testimonial', 'apcore' ),
	'view_item'				=> __( 'View Testimonial', 'apcore' ),
	'search_items'			=> __( 'Search Testimonials', 'apcore' ),
	'not_found'				=> __( 'No testimonials found', 'apcore' ),
	'not_found_in_trash'	=> __( 'No testimonials found in Trash', 'apcore' ),
	'parent_item_colon'		=> '',
	'menu_name'				=> __( 'Testimonials', 'apcore' ),
);

$args = array(
	'labels'				=> $labels,
	'public'				=> true,
	'publicly_queryable' 	=> true,
	'show_ui'				=> true,
	'query_var'				=> true,
	'menu_icon'				=> '',
	'menu_position'			=> 5,
	'supports'				=> array('title','editor','author','thumbnail')
);

if(isset($apress_data['testimonial_url_slug']) && !empty($apress_data['testimonial_url_slug'])) {
	$args['rewrite'] = array('slug' => $apress_data['testimonial_url_slug']);
}

// The following is the main step where we register the post.
register_post_type('zt_testimonial',$args);

add_filter("manage_edit-zt_testimonial_columns", "testimonial_edit_columns");

function testimonial_edit_columns($columns){
   $columns = array(
                    "cb" => "<input type='checkbox' />",
                    "title" => __("Testimonial", 'apcore'),
                    "photo" => __("Image", 'apcore'),
                    "date" => __("Date", 'apcore')
                   );

   return $columns;
}

add_action("manage_zt_testimonial_posts_custom_column",  "testimonial_custom_columns");

function testimonial_custom_columns($column){
  global $post;
  switch ($column){ 
	case "photo":
		if(has_post_thumbnail()) the_post_thumbnail(array(50,50));
		break;
	case "cattestimonial":
		echo get_the_term_list($post->ID, 'cattestimonial', '', ', ','');
		break;
   }
}

/*--- Custom Messages - testimonial_updated_messages ---*/
add_filter('post_updated_messages', 'testimonial_updated_messages');

	function testimonial_updated_messages( $messages ) {
	global $post, $post_ID;
	
	$messages['zt_testimonial'] = array(
	0 => '', // Unused. Messages start at index 1.
	1 => sprintf( ('Testimonial updated. <a href="%s">View testimonial</a>'), esc_url( get_permalink($post_ID) ) ),
	2 => ('Custom field updated.'),
	3 => ('Custom field deleted.'),
	4 => ('Testimonial updated.'),
	/* translators: %s: date and time of the revision */
	5 => isset($_GET['revision']) ? sprintf( ('Testimonial restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	6 => sprintf( ('Testimonial published. <a href="%s">View testimonial</a>'), esc_url( get_permalink($post_ID) ) ),
	7 => ('Testimonial saved.'),
	8 => sprintf( ('Testimonial submitted. <a target="_blank" href="%s">Preview testimonial</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	9 => sprintf( ('Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview testimonial</a>'),
	// translators: Publish box date format, see http://php.net/date
	date_i18n( ( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	10 => sprintf( ('Testimonial draft updated. <a target="_blank" href="%s">Preview testimonial</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	
	return $messages;
}
