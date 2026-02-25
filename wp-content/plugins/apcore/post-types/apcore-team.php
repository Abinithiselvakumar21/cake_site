<?php
/**
 * Post Type: Team
 * Register Custom Post Type
 */

global $apress_data;

$labels = array(
	'name'					=> __( 'Teams', 'apcore' ),
	'singular_name'			=> __( 'Team', 'apcore' ),
	'add_new'				=> __( 'Add New', 'apcore' ),
	'add_new_item'			=> __( 'Add New Team', 'apcore' ),
	'edit_item'				=> __( 'Edit Team', 'apcore' ),
	'new_item'				=> __( 'New Team', 'apcore' ),
	'view_item'				=> __( 'View Team', 'apcore' ),
	'search_items'			=> __( 'Search Teams', 'apcore' ),
	'not_found'				=>  __( 'No teams found', 'apcore' ),
	'not_found_in_trash'	=> __( 'No teams found in Trash', 'apcore' ),
	'parent_item_colon'		=> '',
	'menu_name'				=> __( 'Teams', 'apcore' ),''

);	
$args = array(
	'labels'				=> $labels,
	'public'				=> true,
	'publicly_queryable'	=> true,
	'show_ui'				=> true,
	'query_var'				=> true,
	'menu_position'			=> 5,
	'menu_icon'				=> '', 
	'supports'				=> array('title','editor','author','thumbnail')
);

if(isset($apress_data['team_url_slug']) && !empty($apress_data['team_url_slug'])) {
	$args['rewrite'] = array('slug' => $apress_data['team_url_slug']);
}	
// The following is the main step where we register the post.
register_post_type('zt_team',$args);

// Initialize New Taxonomy Labels
$labels = array(
	'name'				=> _x( 'Category', 'Category general name', 'apcore' ),
	'singular_name'		=> _x( 'Category', 'taxonomy singular name', 'apcore' ),
	'search_items'		=> __( 'Search Category', 'apcore' ),
	'all_items'			=> __( 'All Categories', 'apcore' ),
	'parent_item'		=> __( 'Parent Category', 'apcore' ),
	'parent_item_colon' => __( 'Parent Category:', 'apcore' ),
	'edit_item'			=> __( 'Edit Category', 'apcore' ),
	'update_item'		=> __( 'Update Category', 'apcore' ),
	'add_new_item'		=> __( 'Add New Category', 'apcore' ),
	'new_item_name'		=> __( 'New Category Name', 'apcore' ),
);
// Custom taxonomy for Portfolio Tags	  
$args = array(
	'labels'		=> $labels,
	'hierarchical'	=> true,
	'show_ui'		=> true,	
);

if(isset($apress_data['team_url_slug']) && !empty($apress_data['team_url_slug'])) {
	$args['rewrite'] = array('slug' => $apress_data['team_url_slug'].'-category');
}
register_taxonomy( 'catteam', 'zt_team', $args );


add_filter("manage_edit-zt_team_columns", "team_edit_columns");

function team_edit_columns($columns){
   $columns = array(
                    "cb" => "<input type='checkbox' />",
                    "title" => __("Team", 'apcore'),
                    "photo" => __("Image", 'apcore'),
                    "catteam" => __("Categories", 'apcore'),
                    "date" => __("Date", 'apcore')
                   );

   return $columns;
}

add_action("manage_zt_team_posts_custom_column",  "team_custom_columns");

function team_custom_columns($column){
  global $post;
  switch ($column){ 
	case "photo":
		if(has_post_thumbnail()) the_post_thumbnail(array(50,50));
		break;
	case "catteam":
		echo get_the_term_list($post->ID, 'catteam', '', ', ','');
		break;
   }
}

/*--- Custom Messages - testimonial_updated_messages ---*/
add_filter('post_updated_messages', 'team_updated_messages');

	function team_updated_messages( $messages ) {
	global $post, $post_ID;
	
	$messages['zt_team'] = array(
	0 => '', // Unused. Messages start at index 1.
	1 => sprintf( ('Team updated. <a href="%s">View Team</a>'), esc_url( get_permalink($post_ID) ) ),
	2 => ('Custom field updated.'),
	3 => ('Custom field deleted.'),
	4 => ('Team updated.'),
	/* translators: %s: date and time of the revision */
	5 => isset($_GET['revision']) ? sprintf( ('Team restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	6 => sprintf( ('Team published. <a href="%s">View team</a>'), esc_url( get_permalink($post_ID) ) ),
	7 => ('Team saved.'),
	8 => sprintf( ('Team submitted. <a target="_blank" href="%s">Preview team</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	9 => sprintf( ('Team scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview team</a>'),
	// translators: Publish box date format, see http://php.net/date
	date_i18n( ( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	10 => sprintf( ('Team draft updated. <a target="_blank" href="%s">Preview team</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	
	return $messages;
}
  
