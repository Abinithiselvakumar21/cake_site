<?php
/**
 * Apcore Megamenu Framework
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {	die; }
add_action( 'wp_nav_menu_item_custom_fields', 'apress_theme_add_megamenu_fields', 10, 4 );
function apress_theme_add_megamenu_fields( $item_id, $item, $depth, $args ) { 
$blocks = apress_get_megamenu_array();
?>

	<div class="clear"></div>
    <div class="zolo-mega-menu-options">
    	<!-- Icon Name-->
    	<p class="field-megamenu-icon description description-wide">
            <label for="edit-menu-item-megamenu-icon-<?php echo $item_id; ?>">
                <?php _e( 'Mega Menu Icon (use full font awesome name)', 'apress' ); ?>
                <input type="text" id="edit-menu-item-megamenu-icon-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-icon" name="menu-item-zolo-megamenu-icon[<?php echo $item_id; ?>]" value="<?php echo $item->zolo_megamenu_icon; ?>" />
            </label>
        </p>
        <!-- Custom Image / SVG Icon -->
       
        <p class="field-megamenu-thumbnail description description-wide">
            <label for="edit-menu-item-megamenu-thumbnail-<?php echo $item_id; ?>">
             <?php esc_html_e('Custom Image/svg icon', 'apress'); ?><br>
            <a href="#" id="zolo-media-upload-<?php echo $item_id; ?>" class="zolo-open-media button button-primary zolo-megamenu-upload-thumbnail"><?php _e( 'Custom Image / SVG Icon', 'apress' ); ?></a>
                <input type="hidden" id="edit-menu-item-megamenu-thumbnail-<?php echo $item_id; ?>" class="zolo-new-media-image widefat code edit-menu-item-megamenu-thumbnail" name="menu-item-zolo-megamenu-thumbnail[<?php echo $item_id; ?>]" value="<?php echo $item->zolo_megamenu_thumbnail; ?>" />
                <img src="<?php echo $item->zolo_megamenu_thumbnail; ?>" id="zolo-media-img-<?php echo $item_id; ?>" class="zolo-megamenu-thumbnail-image" style="<?php echo ( trim( $item->zolo_megamenu_thumbnail ) ) ? 'display: inline;' : '';?>" /><br />
                <a href="#" id="zolo-media-remove-<?php echo $item_id; ?>" class="remove-zolo-megamenu-thumbnail" style="<?php echo ( trim( $item->zolo_megamenu_thumbnail ) ) ? 'display: inline;' : '';?>">Remove Image</a>
            </label>
        </p>
         <!-- Open on mouse event -->
        <p class="field-megamenu-event description description-wide">
            <label for="edit-menu-item-megamenu-event-<?php echo esc_attr( $item_id ); ?>">
                <?php esc_html_e('Open on mouse event', 'apress'); ?><br>
                <select id="edit-menu-item-megamenu-event-<?php echo esc_attr( $item_id ); ?>" class="widefat" name="menu-item-zolo-megamenu-event[<?php echo esc_attr( $item_id ); ?>]">
                    <option value="hover" <?php selected( $item->zolo_megamenu_event, 'hover', true); ?>><?php esc_html_e('Hover', 'apress'); ?></option>
                    <option value="click" <?php selected( $item->zolo_megamenu_event, 'click', true); ?>><?php esc_html_e('Click', 'apress'); ?></option>
                </select>
            </label>
        </p>
        
        <!-- Label text -->
        <p class="field-megamenu-label-text description description-wide">
            <label for="edit-menu-item-megamenu-label-text-<?php echo esc_attr( $item_id ); ?>">
                <?php esc_html_e('Label text', 'apress'); ?><br>
                <input type="text" id="edit-menu-item-megamenu-label-text-<?php echo esc_attr( $item_id ); ?>" class="widefat" name="menu-item-zolo-megamenu-label-text[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->zolo_megamenu_label_text ); ?>">
            </label>
        </p>
             <!-- Label color -->
			<p class="field-megamenu-label description description-wide">
				<label for="edit-menu-item-megamenu-label-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e('Label color', 'apress'); ?><br>
					<select id="edit-menu-item-megamenu-label-<?php echo esc_attr( $item_id ); ?>" class="widefat" name="menu-item-zolo-megamenu-label[<?php echo esc_attr( $item_id ); ?>]">
						<option value=""></option>
						<option value="primary" <?php selected( $item->zolo_megamenu_label, 'primary', true); ?>><?php esc_html_e('Primary Color', 'apress'); ?></option>
						<option value="red" <?php selected( $item->zolo_megamenu_label, 'red', true); ?>><?php esc_html_e('Red', 'apress'); ?></option>
						<option value="green" <?php selected( $item->zolo_megamenu_label, 'green', true); ?>><?php esc_html_e('Green', 'apress'); ?></option>
						<option value="blue" <?php selected( $item->zolo_megamenu_label, 'blue', true); ?>><?php esc_html_e('Blue', 'apress'); ?></option>
						<option value="orange" <?php selected( $item->zolo_megamenu_label, 'orange', true); ?>><?php esc_html_e('Orange', 'apress'); ?></option>
						<option value="grey" <?php selected( $item->zolo_megamenu_label, 'grey', true); ?>><?php esc_html_e('Grey', 'apress'); ?></option>
						<option value="black" <?php selected( $item->zolo_megamenu_label, 'black', true); ?>><?php esc_html_e('Black', 'apress'); ?></option>
						<option value="white" <?php selected( $item->zolo_megamenu_label, 'white', true); ?>><?php esc_html_e('White', 'apress'); ?></option>
					</select>
				</label>
			</p>
        
    
        <p class="field-megamenu-status description description-wide">
            <label for="edit-menu-item-megamenu-status-<?php echo $item_id; ?>">
                <input type="checkbox" id="edit-menu-item-megamenu-status-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-status" name="menu-item-zolo-megamenu-status[<?php echo $item_id; ?>]" value="enabled" <?php checked( $item->zolo_megamenu_status, 'enabled' ); ?> />
                <strong><?php _e( 'Enable Mega Menu', 'apress' ); ?></strong>
            </label>
        </p>
        
        <p class="field-megamenu-type description description-wide">
            <label for="edit-menu-item-megamenu-type-<?php echo esc_attr( $item_id ); ?>">
                <?php esc_html_e('Mega Menu Type', 'apress'); ?><br>
                <select id="edit-menu-item-megamenu-type-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-megamenu-type" name="menu-item-zolo-megamenu-type[<?php echo esc_attr( $item_id ); ?>]">
                    <option value="default" <?php selected( $item->zolo_megamenu_type, 'default', true); ?>><?php esc_html_e('Default', 'apress'); ?></option>
                    <option value="page-editor" <?php selected( $item->zolo_megamenu_type, 'page-editor', true); ?>><?php esc_html_e('Page Editor', 'apress'); ?></option>
                </select>
            </label>
        </p>    
            
      	<p class="field-megamenu-block description description-wide">
            <label for="edit-menu-item-megamenu-block-<?php echo esc_attr( $item_id ); ?>">
                <?php esc_html_e('Page Builder Template', 'apress'); ?><br>
                <select id="edit-menu-item-megamenu-block-<?php echo esc_attr( $item_id ); ?>" class="widefat" name="menu-item-zolo-megamenu-block[<?php echo esc_attr( $item_id ); ?>]">
                    <option value="" <?php selected( $item->zolo_megamenu_block, '', true); ?>><?php esc_html_e('None', 'apress'); ?></option>
                    <?php foreach ($blocks as $title => $id): ?>
                        <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $item->zolo_megamenu_block, $id, true); ?> data-edit-link="<?php echo admin_url( 'post.php?post=' . $id . '&action=edit' ); ?>"><?php echo esc_html( $title ); ?></option>
                    <?php endforeach ?>
                </select>
                <a href="<?php echo admin_url( 'post.php?post=' . $item->zolo_megamenu_block . '&action=edit' ); ?>" <?php if ( empty( $item->zolo_megamenu_block ) ): ?>style="display:none;"<?php endif ?> class="edit-block-link" target="_blank"><?php esc_html_e( 'Edit this block with WPBakery Page Builder', 'apress' ); ?></a> | 
                <a href="<?php echo admin_url( 'post-new.php?post_type=apcore_template' ); ?>" class="add-block-link" target="_blank"><?php esc_html_e( 'Add new', 'apress' ); ?></a>
            </label>
        </p>
        <p class="field-megamenu-width description description-wide">
            <label for="edit-menu-item-megamenu-width-<?php echo esc_attr( $item_id ); ?>">
                <?php esc_html_e('Design', 'apress'); ?><br>
                <select id="edit-menu-item-megamenu-width-<?php echo esc_attr( $item_id ); ?>" class="widefat" name="menu-item-zolo-megamenu-width[<?php echo esc_attr( $item_id ); ?>]">
                    <option value="default" <?php selected( $item->zolo_megamenu_width, 'default', true); ?>><?php esc_html_e('Default', 'apress'); ?></option>
                    <option value="fullwidth" <?php selected( $item->zolo_megamenu_width, 'fullwidth', true); ?>><?php esc_html_e('Full width', 'apress'); ?></option>
                    <option value="custom_sized" <?php selected( $item->zolo_megamenu_width, 'custom_sized', true); ?>><?php esc_html_e('Custom sizes', 'apress'); ?></option>
                </select>
            </label>
        </p>
        
        <p class="field-megamenu-pagewidth description description-thin">
            <label for="edit-menu-item-megamenu-pagewidth-<?php echo $item_id; ?>">
                <?php _e( 'Dropdown Width( e.g - 10 )', 'apress' ); ?>
                <input type="number" id="edit-menu-item-megamenu-pagewidth-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-pagewidth" name="menu-item-zolo-megamenu-pagewidth[<?php echo $item_id; ?>]" value="<?php echo $item->zolo_megamenu_pagewidth; ?>" />
            </label>
        </p>
        
        <p class="field-megamenu-pageheight description description-thin">
            <label for="edit-menu-item-megamenu-pageheight-<?php echo $item_id; ?>">
                <?php _e( 'Dropdown Height( e.g - 10 )', 'apress' ); ?>
                <input type="number" id="edit-menu-item-megamenu-pageheight-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-pageheight" name="menu-item-zolo-megamenu-pageheight[<?php echo $item_id; ?>]" value="<?php echo $item->zolo_megamenu_pageheight; ?>" />
            </label>
        </p>
        
        <p class="field-megamenu-columns description description-wide">
            <label for="edit-menu-item-megamenu-columns-<?php echo $item_id; ?>">
                <?php _e( 'Mega Menu Number of Columns', 'apress' ); ?>
                <select id="edit-menu-item-megamenu-columns-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-columns" name="menu-item-zolo-megamenu-columns[<?php echo $item_id; ?>]">
                
                    <option value="auto" <?php selected( $item->zolo_megamenu_columns, 'auto' ); ?>><?php _e( 'Auto', 'apress' ); ?></option>
                    <option value="1" <?php selected( $item->zolo_megamenu_columns, '1' ); ?>>1</option>
                    <option value="2" <?php selected( $item->zolo_megamenu_columns, '2' ); ?>>2</option>
                    <option value="3" <?php selected( $item->zolo_megamenu_columns, '3' ); ?>>3</option>
                    <option value="4" <?php selected( $item->zolo_megamenu_columns, '4' ); ?>>4</option>
                    <option value="5" <?php selected( $item->zolo_megamenu_columns, '5' ); ?>>5</option>
                    <option value="6" <?php selected( $item->zolo_megamenu_columns, '6' ); ?>>6</option>
                </select>
            </label>
        </p>
        <p class="field-megamenu-title description description-wide">
            <label for="edit-menu-item-megamenu-title-<?php echo $item_id; ?>">
                <input type="checkbox" id="edit-menu-item-megamenu-title-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-title" name="menu-item-zolo-megamenu-title[<?php echo $item_id; ?>]" value="disabled" <?php checked( $item->zolo_megamenu_title, 'disabled' ); ?> />
                <?php _e( 'Disable Mega Menu Column Title', 'apress' ); ?>
            </label>
        </p>
    </div><!-- .zolo-mega-menu-options-->
<?php }

// Dont duplicate me!
if( ! class_exists( 'ZOLOCoreFrontendWalker' ) ) {
	class ZOLOCoreFrontendWalker extends Walker_Nav_Menu {

		/**
		 * @var string $menu_megamenu_status are we currently rendering a mega menu?
		 */
		private $menu_megamenu_status = "";

		/**
		 * @var string $menu_megamenu_width use full width mega menu?
		 */
		private $menu_megamenu_width = "";

		/**
		 * @var int $num_of_columns how many columns should the mega menu have?
		 */
		private $num_of_columns = 0;

		/**
		 * @var int $max_num_of_columns mega menu allow for 6 columns at max
		 */
		private $max_num_of_columns = 6;

		/**
		 * @var int $total_num_of_columns total number of columns for a single megamenu?
		 */
		private $total_num_of_columns = 0;

		/**
		 * @var int $num_of_rows number of rows in the mega menu
		 */
		private $num_of_rows = 1;

		/**
		 * @var array $submenu_matrix holds number of columns per row
		 */
		private $submenu_matrix = array();

		/**
		 * @var float $menu_megamenu_columnwidth how large is the width of a column?
		 */
		private $menu_megamenu_columnwidth = 0;
		
		/**
		 * @var array $menu_megamenu_rowwidth_matrix how large is the width of each row?
		 */
		private $menu_megamenu_rowwidth_matrix = array();	

		/**
		 * @var float $menu_megamenu_maxwidth how large is the overall width of a column?
		 */
		private $menu_megamenu_maxwidth = 0;

		/**
		 * @var string $menu_megamenu_title should a colum title be displayed?
		 */
		private $menu_megamenu_title = '';

		/**
		 * @var string $menu_megamenu_widget_area should one column be a widget area?
		 */
		private $menu_megamenu_widget_area = '';

		/**
		 * @var string $menu_megamenu_icon does the item have an icon?
		 */
		private $menu_megamenu_icon = '';

		/**
		 * @var string $menu_megamenu_thumbnail does the item have a thumbnail?
		 */
		private $menu_megamenu_thumbnail = '';
		/**
		 * @var init Number of top level menu items.
		 */
		private $menu_megamenu_type = '';

		/**
		 * @var string $menu_megamenu_thumbnail does the item have a thumbnail?
		 */
		 private $menu_megamenu_block = '';

		/**
		 * @var string $menu_megamenu_thumbnail does the item have a thumbnail?
		 */
		 private $menu_megamenu_pagewidth = '';

		/**
		 * @var string $menu_megamenu_thumbnail does the item have a thumbnail?
		 */
		 private $menu_megamenu_pageheight = '';
		 
		 /**
		 * @var string $menu_megamenu_thumbnail does the item have a thumbnail?
		 */
		 private $menu_megamenu_event = '';
		 /**
		 * @var string $menu_megamenu_thumbnail does the item have a thumbnail?
		 */
		 private $menu_megamenu_label_text = '';
		 /**
		 * @var string $menu_megamenu_thumbnail does the item have a thumbnail?
		 */
		 private $menu_megamenu_label = '';

		/**
		 * @var string $menu_megamenu_thumbnail does the item have a thumbnail?
		 */
		 
		private $top_level_menu_items_count = 0;
		
		/**
		 * Middle logo menu breaking point
		 */
		private $middle_menu_break_point = null;
		
		/**
		 * Middle logo menu number of top level items displayed
		 */
		private $no_of_top_level_items_displayed = 0;

		/**
		 * Sets the overall width of the megamenu wrappers
		 *
		 */
		private function set_megamenu_max_width() {
			global $apress_data;
		
			// set overall width of megamenu
			$site_width = (int) str_replace( 'px', '', $apress_data['site_width']['width'] );
			$megamenu_max_width = (int) str_replace( 'px', '', $apress_data['megamenu_max_width']['width'] );
			$megmanu_width = 0;

			if( strpos( $apress_data['site_width']['width'], 'px' ) !== false ) {
				if( $site_width > $megamenu_max_width ) {
					$megamenu_width = $megamenu_max_width;	
				} else {
					$megamenu_width = $site_width;
				}
			} else {
				$megamenu_width = $megamenu_max_width;
			}
			$this->menu_megamenu_maxwidth = $megamenu_width;
		}

		/**
		 * @see Walker::start_lvl()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int $depth Depth of page. Used for padding.
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );

			if( $depth === 0 && $this->menu_megamenu_status == "enabled" ) {
				// set overall width of megamenu				
				if( ! $this->menu_megamenu_maxwidth ) {
					$this->set_megamenu_max_width();
				}
				
				$output .= '{first_level}';
				if($this->menu_megamenu_type == 'page-editor'){
					$output .= '<div class="zolo-megamenu-holder" {megamenu_final_width}><div class="zolo-container-remove"><ul class="zolo-megamenu {megamenu_border}">';
					
					$post = get_post( $this->menu_megamenu_block );
					
					$content = $post->post_content;
					
					$content = do_shortcode( $content );
					
					//$css = liquid_helper()->get_vc_custom_css( $id );
					echo apress_theme_get_vc_custom_css( $this->menu_megamenu_block );
					
					$output .= '' . $content . '';	
					
									
				}else{
					$output .= '<div class="zolo-megamenu-holder" {megamenu_final_width}><div class="zolo-container"><ul class="zolo-megamenu {megamenu_border}">';
				}
				
			} elseif( $depth >= 2 && $this->menu_megamenu_status == "enabled" ) {
				$output .= '<ul class="sub-menu deep-level">';
			} else {
				$output .= '<ul class="sub-menu">';
			}
		}

		/**
		 * @see Walker::end_lvl()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int $depth Depth of page. Used for padding.
		 */
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			global $apress_data;
		
			$indent = str_repeat( "\t", $depth );
			$row_width ='';

			if( $depth === 0  && $this->menu_megamenu_status == "enabled" ) {
				
				
					$output .= "\n</ul>\n</div>\n</div><div style='clear:both;'></div>\n</div>\n</div>\n";

					if( $this->total_num_of_columns < $this->max_num_of_columns ) {
						$col_span = " col-span-" . $this->total_num_of_columns * 2;
					} else {
						$col_span = " col-span-" . $this->max_num_of_columns * 2;
					}
					
					
					if ( $this->menu_megamenu_width == "default" ) {
						$col_span = " col-span-12 zolo-megamenu-fullwidth";
						$wrapper_width = $this->menu_megamenu_maxwidth;
					} else if( $this->menu_megamenu_width == "fullwidth") {
						$col_span = " zolo-megamenu-fullwidth-browser";
						$wrapper_width = '100vw';
					}else{
						$wrapper_width = max( $this->menu_megamenu_rowwidth_matrix ) * $this->menu_megamenu_maxwidth;
						$col_span = '';
					}
				
					
					$output = str_replace( "{first_level}", "<div class='zolo-megamenu-wrapper {zolo_columns} columns-".$this->total_num_of_columns . $col_span . "' data-maxwidth='" . $this->menu_megamenu_maxwidth . "'><div class='row'>", $output );
					
					$output = str_replace( "{megamenu_final_width}", sprintf( 'style="width:%spx;" data-width="%s"', $wrapper_width, $wrapper_width ), $output );
					
					if ( $this->total_num_of_columns > $this->max_num_of_columns ) {
						$output = str_replace( "{megamenu_border}","zolo-megamenu-border", $output );
					} else {
						$output = str_replace( "{megamenu_border}","", $output );
					}
	
					foreach($this->submenu_matrix as $row => $columns) {
						$layout_columns = 12 / $columns;
						if( $columns == '5' ) {
							$layout_columns = 2;
						}
	
						if( $columns < $this->max_num_of_columns ) {
							$row_width = "style=\"width:" . $columns / $this->max_num_of_columns * 100 . "%!important;\"";
						}
	
						$output = str_replace( "{row_width_".$row."}", $row_width, $output);
	
						if( ( $row - 1 ) * $this->max_num_of_columns + $columns < $this->total_num_of_columns ) {
							$output = str_replace( "{row_number_".$row."}", "zolo-megamenu-roapc-columns-" . $columns . " zolo-megamenu-border", $output);
						} else {
							$output = str_replace( "{row_number_".$row."}", "zolo-megamenu-roapc-columns-" . $columns, $output);
						}
						$output = str_replace( "{current_row_".$row."}", "zolo-megamenu-columns-".$columns." col-lg-" . $layout_columns . " col-md-" . $layout_columns . " col-sm-" . $layout_columns, $output );
						
						$output = str_replace( "{zolo_columns}", sprintf( 'zolo-columns-%s columns-per-row-%s', $columns, $columns ), $output );
					}
				
				
			} else {
				$output .= "$indent</ul>\n";
			}
		}

		/**
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $apress_data;
			
			$item_output = $class_columns = '';
			
			if ( $apress_data['middle_menu_break_point'] == 1 ) {
				if ( ! isset( $this->middle_menu_break_point ) ) {
					
					$middle_logo_menu_elements = wp_get_nav_menu_items( $args->menu );
		      		$middle_logo_menu_top_level_elements = 0;

					foreach ( $middle_logo_menu_elements as $menu_element ) {
						if ( '0' === $menu_element->menu_item_parent ) {
							$middle_logo_menu_top_level_elements++;
						}
						if ( '0' === $menu_element->menu_item_parent ) {
							$this->top_level_menu_items_count++;
						}
					}

					//$top_level_menu_items_count = count( $middle_logo_menu_top_level_elements );

					if ( 0 === $this->top_level_menu_items_count ) {
						$this->middle_menu_break_point = $middle_logo_menu_top_level_elements / 2;
					}else{
						$this->middle_menu_break_point = ceil( $middle_logo_menu_top_level_elements / 2 );
						}
				}
			}
			
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			// Megamenu new Control
			
			
			/* set some vars */
			if( $depth === 0 ) {

				$this->menu_megamenu_status = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_status', true );
				$this->menu_megamenu_width = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_width', true);
				$allowed_columns = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_columns', true );
				$this->menu_megamenu_type	 = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_type',  true );
				
				if( $allowed_columns != "auto" ) {
					$this->max_num_of_columns = $allowed_columns;
				}
				$this->num_of_columns = $this->total_num_of_columns = 0;
				$this->num_of_rows = 1;
				$this->menu_megamenu_rowwidth_matrix = array();
				$this->menu_megamenu_rowwidth_matrix[$this->num_of_rows] = 0;
			}
			$this->menu_megamenu_navgoto = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_navgoto', true);
			$this->menu_megamenu_title = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_title', true);
			$this->menu_megamenu_icon = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_icon', true);
			$this->menu_megamenu_thumbnail = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_thumbnail', true);			
			
			
			$this->menu_megamenu_block   = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_block',  true );
			$this->menu_megamenu_pagewidth   = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_pagewidth',   true );
			$this->menu_megamenu_pageheight  = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_pageheight',  true );
			
			$this->menu_megamenu_event	 = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_event',  true );
			$this->menu_megamenu_label_text	 = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_label-text',  true );
			$this->menu_megamenu_label	 = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_label',  true );

			
			/* we are inside a mega menu */
			
			
			if( $depth === 1 && $this->menu_megamenu_status == "enabled" ) {
			
			
				if( get_post_meta( $item->ID, '_menu_item_zolo_megamenu_columnwidth', true) ) {
					$this->menu_megamenu_columnwidth = get_post_meta( $item->ID, '_menu_item_zolo_megamenu_columnwidth', true);
				} else {
					if ( $this->menu_megamenu_width == "default" ) {
						$this->menu_megamenu_columnwidth = 100 / $this->max_num_of_columns . '%';
					} else {
						$this->menu_megamenu_columnwidth = '16.6666%';
					}
				}

				$this->num_of_columns++;
				$this->total_num_of_columns++;

				/* check if we need to start a new row */
				if( $this->num_of_columns > $this->max_num_of_columns ) {
					$this->num_of_columns = 1;
					$this->num_of_rows++;
					
					// start new row width calculation
					$this->menu_megamenu_rowwidth_matrix[$this->num_of_rows] =  floatval( $this->menu_megamenu_columnwidth ) / 100;
					
					$output .= "\n</ul>\n<ul class=\"zolo-megamenu zolo-megamenu-row-".$this->num_of_rows." {row_number_".$this->num_of_rows."}\" {row_width_".$this->num_of_rows."}>\n";
				} else {
					$this->menu_megamenu_rowwidth_matrix[$this->num_of_rows] +=  floatval( $this->menu_megamenu_columnwidth ) / 100;
				}
				
				$this->submenu_matrix[$this->num_of_rows] = $this->num_of_columns;

				if( $this->max_num_of_columns < $this->num_of_columns ) {
					$this->max_num_of_columns = $this->num_of_columns;
				}

				$title = apply_filters( 'the_title', $item->title, $item->ID );

				if( !(( empty( $item->url ) || $item->url == "#" || $item->url == 'http://' )  && $this->menu_megamenu_title == 'disabled' )) {
						$heading = do_shortcode($title);
						$link = '';
						$link_closing = '';
	
						if( ! empty( $item->url ) &&
							$item->url != "#" &&
							$item->url != 'http://'
						) {
							$link = '<a href="' . $item->url . '"><span class="menu-text">';
							$link_closing = '</span></a>';
						}
						
					$attributes = $heading = '';
					$attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url ) .'"' : '';
					
					$attributes .= ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
					$attributes .= ! empty( $item->target ) ? 'target="' . esc_attr( $item->target ) .'"' : '';
					$attributes .= ! empty( $item->xfn ) ? 'rel="'    . esc_attr( $item->xfn ) .'"' : '';
	
					$item_output .= $args->before;
					/* check if ne need to set an image */
					if ( ! empty( $this->menu_megamenu_thumbnail )) {
						$heading .= '<a ' . $attributes . '><span class="zolo-megamenu-icon"><img src="' . $this->menu_megamenu_thumbnail . '"></span>';
					} elseif( ! empty( $this->menu_megamenu_icon )) {
						$heading .= '<a ' . $attributes . '><span class="zolo-megamenu-icon text-menu-icon"><i class="fa ' . $this->menu_megamenu_icon . '"></i></span>';
					} elseif ( $depth !== 0) {
						$heading .= '<a ' . $attributes . '><span class="zolo-megamenu-bullet"></span>';
					} else {
						$heading .= '<a '. $attributes .'>';
					}
					
					$heading .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
					
					// Menu level and color
					if( !empty( $this->menu_megamenu_label ) ) {
						$heading .= '<span class="menu-label menu-label-' . $this->menu_megamenu_label . '">' . esc_attr( $this->menu_megamenu_label_text ) . '</span>';
					}
					$heading .= '</a>';
					
					if( $this->menu_megamenu_title != 'disabled' ) {
						$item_output .= "<div class='zolo-megamenu-title'>" . $heading . "</div>";
					} else {
						$item_output .= $heading;
					}	
						
				}


				$class_columns  = ' {current_row_'.$this->num_of_rows.'}';
				

			}  else {

				$attributes = $styles = '';
				if ($this->menu_megamenu_navgoto == 'section') {
					if ( !is_front_page() ) { 
							$frontpage = home_url(); 
						} else { 
							$frontpage = ''; 
						}    
					$attributes .= ' href="'.$frontpage. esc_attr( $item->url ) .'"';
				} else {
					$attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url ) .'"' : '';
				}
				
				$attributes .= ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target ) ? 'target="' . esc_attr( $item->target ) .'"' : '';
				$attributes .= ! empty( $item->xfn ) ? 'rel="'    . esc_attr( $item->xfn ) .'"' : '';

				$item_output .= $args->before;
				/* check if ne need to set an image */
				if ( ! empty( $this->menu_megamenu_thumbnail )) {
					$item_output .= '<a ' . $attributes . '><span class="zolo-megamenu-icon"><img src="' . $this->menu_megamenu_thumbnail . '"></span>';
				} elseif( ! empty( $this->menu_megamenu_icon )) {
					$item_output .= '<a ' . $attributes . '><span class="zolo-megamenu-icon text-menu-icon"><i class="fa ' . $this->menu_megamenu_icon . '"></i></span>';
				} elseif ( $depth !== 0) {
					$item_output .= '<a ' . $attributes . '><span class="zolo-megamenu-bullet"></span>';
				} else {
					$item_output .= '<a '. $attributes .'>';
				}

				
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				
				// Menu level and color
				if( !empty( $this->menu_megamenu_label ) ) {
					$classes[] = 'item-with-label';
					$classes[] = 'item-label-' . $this->menu_megamenu_label;
					$item_output .= '<span class="menu-label menu-label-' . $this->menu_megamenu_label . '">' . esc_attr( $this->menu_megamenu_label_text ) . '</span>';
				}
				
				
				// Controlled from Theme options
				if( $depth === 0 && $args->has_children && $apress_data['dropdown_indicator'] == 'dropdown_indicator_show' ) {
					
					$item_output .= ' <i class="ap-chevron-down" aria-hidden="true"></i></a>';
					
				} else {
					$item_output .= '</a>';
					
				}
				$item_output .= $args->after;
				
				if($this->menu_megamenu_type == 'page-editor'){
					
					$col_span = $wrapper_width ='';
					
					
					$post = get_post( $this->menu_megamenu_block );
					
					$content = $post->post_content;
					
					$content = do_shortcode( $content );
					
					//$css = liquid_helper()->get_vc_custom_css( $id );
					echo apress_theme_get_vc_custom_css( $this->menu_megamenu_block );
					
					if( ! $this->menu_megamenu_maxwidth ) {
						$this->set_megamenu_max_width();
					}
					
					if ( $this->menu_megamenu_width == "default" ) {
						$col_span = " col-span-12 zolo-megamenu-fullwidth";
						$wrapper_width = $this->menu_megamenu_maxwidth;
					} else if( $this->menu_megamenu_width == "fullwidth") {
						$col_span = " zolo-megamenu-fullwidth-browser";
						$wrapper_width = '100vw';
					}
					
					
				$item_output .= '<ul class="sub-menu"><li class="menu-item"><div class="zolo-megamenu-wrapper '. $col_span.'" data-maxwidth='. $this->menu_megamenu_maxwidth .'><div class="zolo-megamenu-holder" {megamenu_final_width}><div class="zolo-megamenu {megamenu_border}">' . $content . '</div></div></div></li></ul>';	
				
				$item_output = str_replace( "{megamenu_final_width}", sprintf( 'style="width:%spx;" data-width="%s"', $wrapper_width, $wrapper_width ), $item_output );
				
				if($this->menu_megamenu_width == 'custom_sized' && !empty($this->menu_megamenu_pageheight) && !empty($this->menu_megamenu_pagewidth) ) {
					$styles .= '.menu-item-' . $item->ID . ' .zolo-megamenu-holder {';
						$styles .= 'min-height: ' . $this->menu_megamenu_pageheight .'px; ';
						$styles .= 'width: ' . $this->menu_megamenu_pagewidth .'px!important; ';
					$styles .= '}';
				}
				
				if( $styles != '') {
					$item_output .= '<style>';
					$item_output .= $styles;
					$item_output .= '</style>';
				}
				
				}

			}

			/* check if we need to apply a divider */
			if ( $this->menu_megamenu_status != "enabled" && ( ( strcasecmp( $item->attr_title, 'divider' ) == 0) || ( strcasecmp( $item->title, 'divider' ) == 0 ) ) ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} else {

				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$class_names = '';
				$column_width = '';
				$classes = empty( $item->classes ) ? array() : ( array ) $item->classes;
				
				// Menu level and color
				if( !empty( $this->menu_megamenu_label ) ) {
					$classes[] = 'item-with-label';
					$classes[] = 'item-label-' . $this->menu_megamenu_label;
				}
				
				$classes[] = 'menu-item-' . $item->ID;

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );


/*				if( $depth === 0 && $args->has_children ) {
					if( $this->menu_megamenu_status == "enabled" ) {
						$class_names .= ' zolo-megamenu-menu';
					} else {
						$class_names .= ' zolo-dropdown-menu';
					}
				}*/
				
				/*$design  = get_post_meta( $item->ID, '_menu_item_design',  true );
				$event   = get_post_meta( $item->ID, '_menu_item_event',   true );
				if( $depth == 0 && $args->menu_class != 'site-mobile-menu' ) {
					$classes[] = 'menu-item-design-' . $design;
					$classes[] = 'menu-' . ( (  in_array( $design, array( 'sized', 'full-width' ) ) ) ? 'mega-dropdown' : 'simple-dropdown' );
					$event = (empty($event)) ? 'hover' : $event;
					$classes[] = 'item-event-' . $event;
				}*/
				
				
				if( $depth === 0 ) {
						$event = $this->menu_megamenu_event;
						$event = (empty($event)) ? 'hover' : $event;											
						$class_names .= ' item-event-' . $event;
						
					if( $this->menu_megamenu_status == "enabled" ) {						
						$class_names .= ' zolo-megamenu-menu';	
					} else {
						if($this->menu_megamenu_status == "enabled" && $args->has_children){
							$class_names .= ' zolo-dropdown-menu';
						}
					}
				}
				
				if ( $depth === 1 ) {
					if( $this->menu_megamenu_status == "enabled" ) {
						if($this->menu_megamenu_type == 'default'){
							$class_names .= ' zolo-megamenu-submenu';
						}
						if ( $this->menu_megamenu_width != "default" ) {
							$width = $this->menu_megamenu_maxwidth * floatval( $this->menu_megamenu_columnwidth ) / 100;
							$column_width = sprintf( 'style="width:%spx;max-width:%spx;" data-width="%s"', $width, $width, $width );
						}
					} else {
						$class_names .= ' zolo-dropdown-submenu';
					}
				}
				if($this->menu_megamenu_type == 'page-editor'){
					$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
				}else{
					$class_names = $class_names ? ' class="' . esc_attr( $class_names ). $class_columns . '"' : '';
				}
				
				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
				
				if($this->menu_megamenu_type == 'page-editor'){
					$output .= sprintf( '%s<li %s %s >', $indent, $id, $class_names );
				}else{
					$output .= sprintf( '%s<li %s %s %s >', $indent, $id, $class_names, $column_width );
				}
				

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				
			}
		}

		/**
		 * @see Walker::end_el()
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Page data object. Not used.
		 * @param int $depth Depth of page. Not Used.
		 */
		function end_el( &$output, $item, $depth = 0, $args = array() ) {
			global $apress_data;
			$output .= "</li>";
			
			if ( '0' === $item->menu_item_parent ) {
				$this->no_of_top_level_items_displayed++;
			}

			if ( $apress_data['middle_menu_break_point'] == 1 && $this->middle_menu_break_point == $this->no_of_top_level_items_displayed && '0' === $item->menu_item_parent ) {
				ob_start();
				?>
                <?php
				// Header Logo
				apress_theme_header_logo();               
				$output .= ob_get_clean();
			}
		}

		/**
		 * Traverse elements to create list from elements.
		 *
		 * Display one element if the element doesn't have any children otherwise,
		 * display the element and its children. Will only traverse up to the max
		 * depth and no ignore elements under that depth.
		 *
		 * This method shouldn't be called directly, use the walk() method instead.
		 *
		 * @see Walker::start_el()
		 * @since 2.5.0
		 *
		 * @param object $element Data object
		 * @param array $children_elements List of elements to continue traversing.
		 * @param int $max_depth Max depth to traverse.
		 * @param int $depth Depth of current element.
		 * @param array $args
		 * @param string $output Passed by reference. Used to append additional content.
		 * @return null Null on failure with no changes to parameters.
		 */
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element )
				return;

			$id_field = $this->db_fields['id'];

			// Display this element.
			if ( is_object( $args[0] ) )
			   $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		/**
		 * Menu Fallback
		 * =============
		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
		 * and a manu has not been assigned to the theme location in the WordPress
		 * menu manager the function with display nothing to a non-logged in user,
		 * and will add a link to the WordPress menu manager if logged in as an admin.
		 *
		 * @param array $args passed from the wp_nav_menu function.
		 *
		 */
		public static function fallback( $args ) {
			if ( current_user_can( 'manage_options' ) ) {

				extract( $args );

				$fb_output = null;
				
				return $fb_output;
			}
		}
	}  // end ZOLOCoreFrontendWalker() class
}

// Don't duplicate me!
if( ! class_exists( 'ZOLOcodeCoreMegaMenus' ) ) {

    class ZOLOcodeCoreMegaMenus extends Walker_Nav_Menu {

		/**
		 * Starts the list before the elements are added.
		 *
		 * @see Walker_Nav_Menu::start_lvl()
		 *
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 */
		function start_lvl( &$output, $depth = 0, $args = array() ) {}

		/**
		 * Ends the list of after the elements are added.
		 *
		 * @see Walker_Nav_Menu::end_lvl()
		 *
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 */
		function end_lvl( &$output, $depth = 0, $args = array() ) {}

		/**
		 * Start the element output.
		 *
		 * @see Walker_Nav_Menu::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item   Menu item data object.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 * @param int    $id     Not used.
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $_wp_nav_menu_max_depth, $wp_registered_sidebars , $apress_data;
			$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

			ob_start();
			$item_id = esc_attr( $item->ID );
			$removed_args = array(
				'action',
				'customlink-tab',
				'edit-menu-item',
				'menu-item',
				'page-tab',
				'_wpnonce',
			);

			$original_title = '';
			if ( 'taxonomy' == $item->type ) {
				$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
				if ( is_wp_error( $original_title ) )
					$original_title = false;
			} elseif ( 'post_type' == $item->type ) {
				$original_object = get_post( $item->object_id );
				$original_title = get_the_title( $original_object->ID );
			}

			$classes = array(
				'menu-item menu-item-depth-' . $depth,
				'menu-item-' . esc_attr( $item->object ),
				'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
			);

			$title = $item->title;

			if ( ! empty( $item->_invalid ) ) {
				$classes[] = 'menu-item-invalid';
				/* translators: %s: title of menu item which is invalid */
				$title = sprintf( __( '%s (Invalid)', 'apress'), $item->title );
			} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
				$classes[] = 'pending';
				/* translators: %s: title of menu item in draft status */
				$title = sprintf( __('%s (Pending)', 'apress'), $item->title );
			}

			$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

			$submenu_text = '';
			if ( 0 == $depth )
				$submenu_text = 'style="display: none;"';

			?>
			<li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
				<dl class="menu-item-bar">
					<dt class="menu-item-handle">
						<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php _e( 'sub item', 'apress' ); ?></span></span>
						<span class="item-controls">
							<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
							<span class="item-order hide-if-js">
								<a href="<?php
									echo wp_nonce_url(
										add_query_arg(
											array(
												'action' => 'move-up-menu-item',
												'menu-item' => $item_id,
											),
											remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
										),
										'move-menu_item'
									);
								?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'apress'); ?>">&#8593;</abbr></a>
								|
								<a href="<?php
									echo wp_nonce_url(
										add_query_arg(
											array(
												'action' => 'move-down-menu-item',
												'menu-item' => $item_id,
											),
											remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
										),
										'move-menu_item'
									);
								?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'apress'); ?>">&#8595;</abbr></a>
							</span>
							<a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item', 'apress'); ?>" href="<?php
								echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
							?>"><?php _e( 'Edit Menu Item', 'apress' ); ?></a>
						</span>
					</dt>
				</dl>

				<div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
					<?php if( 'custom' == $item->type ) : ?>
						<p class="field-url description description-wide">
							<label for="edit-menu-item-url-<?php echo $item_id; ?>">
								<?php _e( 'URL' , 'apress'); ?><br />
								<input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
							</label>
						</p>
					<?php endif; ?>
					<p class="description description-thin">
						<label for="edit-menu-item-title-<?php echo $item_id; ?>">
							<?php _e( 'Navigation Label' , 'apress'); ?><br />
							<input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
						</label>
					</p>
					<p class="description description-thin">
						<label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
							<?php _e( 'Title Attribute' , 'apress'); ?><br />
							<input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
						</label>
					</p>
					<p class="field-link-target description">
						<label for="edit-menu-item-target-<?php echo $item_id; ?>">
							<input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
							<?php _e( 'Open link in a new window/tab' , 'apress'); ?>
						</label>
					</p>
					<p class="field-css-classes description description-thin">
						<label for="edit-menu-item-classes-<?php echo $item_id; ?>">
							<?php _e( 'CSS Classes (optional)' , 'apress'); ?><br />
							<input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
						</label>
					</p>
					<p class="field-xfn description description-thin">
						<label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
							<?php _e( 'Link Relationship (XFN)' , 'apress'); ?><br />
							<input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
						</label>
					</p>
					<p class="field-description description description-wide">
						<label for="edit-menu-item-description-<?php echo $item_id; ?>">
							<?php _e( 'Description' , 'apress'); ?><br />
							<textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
							<span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'apress'); ?></span>
						</label>
					</p>
                    <?php
	            /* Custom Menu field type -NAVGOTO- */
				if($apress_data['enable_onepage'] == 'on'){
	            ?>      
	            <p class="field-custom description description-wide">
	                <label for="edit-menu-item-navgoto-<?php echo $item_id; ?>"><?php _e( 'Go To', 'apress' ); ?>
					<select id="edit-menu-item-navgoto-<?php echo $item_id; ?>" name="menu-item-zolo-megamenu-navgoto[<?php echo $item_id; ?>]">                  	
                  	<option value="page" <?php selected( $item->zolo_megamenu_navgoto, 'page' ); ?>><?php _e( 'Page' , 'apress'); ?></option>
                    <option value="section" <?php selected( $item->zolo_megamenu_navgoto, 'section' ); ?>><?php _e( 'Section' , 'apress'); ?></option>
                  </select>
                  </label>
	            </p>
	            <?php
				}
	            /* Custom Menu field type -NAVGOTO- */
	            ?>
					<?php do_action( 'wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args ); ?>
					
					<p class="field-move hide-if-no-js description description-wide">
						<label>
							<span><?php _e( 'Move' , 'apress'); ?></span>
							<a href="#" class="menus-move-up"><?php _e( 'Up one', 'apress' ); ?></a>
							<a href="#" class="menus-move-down"><?php _e( 'Down one' , 'apress'); ?></a>
							<a href="#" class="menus-move-left"></a>
							<a href="#" class="menus-move-right"></a>
							<a href="#" class="menus-move-top"><?php _e( 'To the top' , 'apress'); ?></a>
						</label>
					</p>

					<div class="menu-item-actions description-wide submitbox">
						<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
							<p class="link-to-original">
								<?php printf( __('Original: %s', 'apress'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
							</p>
						<?php endif; ?>
						<a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
						echo wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'delete-menu-item',
									'menu-item' => $item_id,
								),
								admin_url( 'nav-menus.php' )
							),
							'delete-menu_item_' . $item_id
						); ?>"><?php _e( 'Remove' , 'apress'); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
							?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel', 'apress'); ?></a>
					</div>

					<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
					<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
					<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
					<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
					<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
					<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
				</div><!-- .menu-item-settings-->
				<ul class="menu-item-transport"></ul>
			<?php
			$output .= ob_get_clean();
		}

    } // end ZOLOcodeCoreMegaMenus() class

}


// Don't duplicate me!
if( ! class_exists( 'ApcoreCodeMegaMenu' ) ) {

    /**
     * Class to manipulate menus
     *
     * @since 3.4
     */
    class ApcoreCodeMegaMenu extends ApcoreMegaMenuFramework {

    	function __construct() {

            add_action( 'wp_update_nav_menu_item', array( $this, 'save_custom_fields' ), 10, 3 );

            add_filter( 'wp_edit_nav_menu_walker', array( $this, 'add_custom_fields' ) );
            add_filter( 'wp_setup_nav_menu_item', array( $this, 'add_data_to_menu' ) );

    	} // end __construct();


        /**
         * Function to replace normal edit nav walker for zolo core mega menus
         *
         * @return string Class name of new navwalker
         */
        function add_custom_fields() {

            return 'ZOLOcodeCoreMegaMenus';

        }

        /**
         * Add the custom fields menu item data to fields in database
         *
         * @return void
         */
        function save_custom_fields( $menu_id, $menu_item_db_id, $args ) {
						
			$field_name_suffix = array('navgoto', 'status', 'width', 'columns', 'title', 'icon', 'thumbnail', 'type' , 'block', 'design', 'pagewidth', 'pageheight','event', 'label-text', 'label'  );
	
			foreach ( $field_name_suffix as $key ) {
				if( !isset( $_REQUEST['menu-item-zolo-megamenu-'.$key][$menu_item_db_id] ) ) {
					$_REQUEST['menu-item-zolo-megamenu-'.$key][$menu_item_db_id] = '';
				}

				$value = $_REQUEST['menu-item-zolo-megamenu-'.$key][$menu_item_db_id];
				update_post_meta( $menu_item_db_id, '_menu_item_zolo_megamenu_'.$key, $value );
			}
        }

        /**
         * Add custom fields data to the menu
         *
         * @return object Add custom fields data to the menu object
         */
        function add_data_to_menu( $menu_item ) {
			global $apress_data; 
			$enable_onepage = isset($apress_data['enable_onepage']) ? $apress_data['enable_onepage'] : '';
        	$menu_item->zolo_megamenu_status = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_status', true );

			$menu_item->zolo_megamenu_width = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_width', true );

			$menu_item->zolo_megamenu_columns = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_columns', true );
			
			$menu_item->zolo_megamenu_columnwidth = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_columnwidth', true );

			$menu_item->zolo_megamenu_title = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_title', true );

			$menu_item->zolo_megamenu_icon = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_icon', true );

			$menu_item->zolo_megamenu_thumbnail = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_thumbnail', true );
			
			$menu_item->zolo_megamenu_type = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_type', true );
			$menu_item->zolo_megamenu_block = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_block', true );
			$menu_item->zolo_megamenu_pagewidth = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_pagewidth', true );			
			$menu_item->zolo_megamenu_pageheight = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_pageheight', true );
			
			
			$menu_item->zolo_megamenu_event = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_event', true );
			$menu_item->zolo_megamenu_label_text = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_label-text', true );
			$menu_item->zolo_megamenu_label = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_label', true );
			
			if($enable_onepage == 'on'){
			$menu_item->zolo_megamenu_navgoto = get_post_meta( $menu_item->ID, '_menu_item_zolo_megamenu_navgoto', true );
			}
			
            return $menu_item;

        }

    } // end ApcoreCodeMegaMenu() class

}