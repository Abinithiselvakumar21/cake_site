<?php

global $apress_data;	
$labels = array(
	'name'					=> isset($apress_data['portfolio_url_slug']) ? $apress_data['portfolio_url_slug'] : esc_html__( 'Portfolios' , 'apcore' ),
	'singular_name'			=> esc_html__( 'Portfolio' , 'apcore' ),
	'add_new'				=> esc_html__( 'Add New' , 'apcore' ),
	'add_new_item'			=> esc_html__( 'Add New Portfolio' , 'apcore'),
	'edit_item'				=> esc_html__( 'Edit Portfolio' , 'apcore' ),
	'new_item'				=> esc_html__( 'New Portfolio' , 'apcore' ),
	'view_item'				=> esc_html__( 'View Portfolio' , 'apcore' ),
	'search_items'			=> esc_html__( 'Search Portfolios' , 'apcore' ),
	'not_found'				=> esc_html__( 'No portfolios found' , 'apcore' ),
	'not_found_in_trash'	=> esc_html__( 'No portfolios found in Trash' , 'apcore' ),
	'parent_item_colon'		=> '',
	'menu_name'				=> esc_html__( 'Portfolio' , 'apcore' )

);	
$args = array(
	'labels'        => $labels,
	'description'   => esc_html('Holds our portfolios and portfolio specific data','apcore'),
	'public'        => true,
	'supports'      => array( 'title','editor','author','thumbnail' ),
	'has_archive'   => true,
	'menu_icon'		=> '',
	'menu_position' => 5,
);

if(isset($apress_data['portfolio_url_slug']) && !empty($apress_data['portfolio_url_slug'])) {
	$args['rewrite'] = array('slug' => $apress_data['portfolio_url_slug']);
}

register_post_type('zt_portfolio',$args);

	
$labels = array(
	'name'				=> _x( 'Category', 'Category general name', 'apcore' ),
	'singular_name'		=> _x( 'Category', 'taxonomy singular name', 'apcore' ),
	'search_items'		=> __( 'Search Category', 'apcore' ),
	'all_items'			=> __( 'All Categories', 'apcore' ),
	'parent_item'		=> __( 'Parent Category', 'apcore' ),
	'parent_item_colon'	=> __( 'Parent Category:', 'apcore' ),
	'edit_item'			=> __( 'Edit Category', 'apcore' ),
	'update_item'		=> __( 'Update Category', 'apcore' ),
	'add_new_item'		=> __( 'Add New Category', 'apcore' ),
	'new_item_name'		=> __( 'New Category Name', 'apcore' ),
);

// Custom taxonomy for Portfolio Tags	  
$args = array(
	'labels' => $labels,
	'hierarchical' => true,
	'show_ui' => true,	
);

if(isset($apress_data['portfolio_url_slug']) && !empty($apress_data['portfolio_url_slug'])) {
	$args['rewrite'] = array('slug' => $apress_data['portfolio_url_slug'].'-category');
}
register_taxonomy( 'catportfolio', 'zt_portfolio', $args );	  


add_filter("manage_edit-zt_portfolio_columns", "portfolio_edit_columns");
function portfolio_edit_columns($columns){
   $columns = array(
                    "cb" => "<input type='checkbox' />",
                    "title" => __("Portfolio", 'apcore'),
                    "photo" => __("Image", 'apcore'),
                    "catportfolio" => __("Categories", 'apcore'),
                    "date" => __("Date", 'apcore')
                   );

   return $columns;
}

add_action("manage_zt_portfolio_posts_custom_column",  "portfolio_custom_columns");

function portfolio_custom_columns($column){
  global $post;
  switch ($column){
	 case "photo":
		 if(has_post_thumbnail()) the_post_thumbnail(array(50,50));
	 break;
	 case "catportfolio":
		 echo get_the_term_list($post->ID, 'catportfolio', '', ', ','');
	 break;
   }
}

/*--- Custom Messages - portfolio_updated_messages ---*/
add_filter('post_updated_messages', 'portfolio_updated_messages');

function portfolio_updated_messages( $messages ) {
	global $post, $post_ID;
	
	$messages['zt_portfolio'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( ('Portfolio updated. <a href="%s">View portfolio</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => ('Custom field updated.'),
		3 => ('Custom field deleted.'),
		4 => ('Portfolio updated.'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( ('Portfolio restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( ('Portfolio published. <a href="%s">View portfolio</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => ('Portfolio saved.'),
		8 => sprintf( ('Portfolio submitted. <a target="_blank" href="%s">Preview portfolio</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( ('Portfolio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview portfolio</a>'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( ( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( ('Portfolio draft updated. <a target="_blank" href="%s">Preview portfolio</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	
	return $messages;
}
