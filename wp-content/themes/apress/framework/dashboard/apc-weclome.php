<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;

if(!function_exists('Apc_Status_Info_Helper')){
    function Apc_Status_Info_Helper() {
        return Apc_Status_Info_Helper::instance();
    }
}

if ( !class_exists( "Apc_Status_Info_Helper" ) ){
	class Apc_Status_Info_Helper{
		protected static $instance = null;

		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}    
		
		public function let_to_num( $v ) {
			$l = substr($v, -1);
			$ret = substr($v, 0, -1);
			switch(strtoupper($l)){
			   case 'P': $ret *= 1024;
			   case 'T': $ret *= 1024;
			   case 'G': $ret *= 1024;
			   case 'M': $ret *= 1024;
			   case 'K': $ret *= 1024;
			   break;
			}
  			return $ret;
 		}

		public function memory_limit(){
			$limit = $this->let_to_num( WP_MEMORY_LIMIT );
			if ( function_exists( 'memory_get_usage' ) ) {
				$limit = max( $limit, $this->let_to_num( @ini_get( 'memory_limit' ) ) );
			}

			return $limit;
		}

	}
}

	$theme = wp_get_theme();
	$allowed_html = array(
		'a' => array(
			'href' => true,
			'target' => true,
		),
	);
	$apress_theme = wp_get_theme();
	$theme_version = $apress_theme->get( 'Version' );
	$theme_name = $apress_theme->get( 'Name' );
	$mem_limit = ini_get('memory_limit');
	$mem_limit_byte = wp_convert_hr_to_bytes($mem_limit);
	$upload_max_filesize = ini_get('upload_max_filesize');
	$upload_max_filesize_byte = wp_convert_hr_to_bytes($upload_max_filesize);
	$post_max_size = ini_get('post_max_size');
	$post_max_size_byte = wp_convert_hr_to_bytes($post_max_size);
	$mem_limit_byte_boolean = ($mem_limit_byte < 268435456);
	$upload_max_filesize_byte_boolean = ($upload_max_filesize_byte < 67108864);
	$post_max_size_byte_boolean = ($post_max_size_byte < 67108864);
	$execution_time = ini_get('max_execution_time');
	$execution_time_boolean = ($execution_time < 180);
	$input_vars = ini_get('max_input_vars');
	$input_vars_boolean = ($input_vars < 2000);
	$input_time = ini_get('max_input_time');
	$input_time_boolean = ($input_time < 1000);

	$keyses = array(
		'a' => array(
			'href' => array(),
			'title' => array(),
			'target' => array(),
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'code' => array(
			'class' => array(),
		),
		'p' => array(
			'class' => array(),
		),
	);

	if( class_exists('ZipArchive', false) == false ){
		$ziparchive = 'Disabled';
	} else {
		$ziparchive = 'Enabled';
	}
	
	$purchase_code = get_option( 'apress_purchase', '' );
	$purchase_validation = get_option( 'apress_purchase_validation', '' );
	$purchase_form_class = $purchase_validation ? 'class="' . esc_attr( $purchase_validation ) . '"' : '';
?>

<div id="apress-dashboard" class="wrap about-wrap apc-admin-wrap">
<?php
// Dashboard Menu
Apress_Admin::theme_dashboard_heading();
?>
  <div class="apc-row">
    <div class="apc-col-sm-12">
      <div class="apc-box theme-activate">
        <div class="apc-box-head">
          <?php esc_html_e('Theme Activate','apress'); ?>
        </div>
        <?php if (get_option( 'apress_purchase_validation', '' ) != 'success') { ?>
        <div class="apc-box-content">
          <?php esc_html_e('In order to use all theme features and options, please enter your purchase code.','apress') ?>
        </div>
        <div class="apc-box-content">          
          <form <?php echo $purchase_form_class; ?> id="apcThemeActivate" method="post" action="#">
            <div id="apcGetLicense">
              <input placeholder="<?php echo esc_html__( 'Put your purchase code here', 'apress' ); ?>" id="apcPurchaseCode" name="apress_purchase" type="password" value="<?php echo $purchase_code; ?>">
              <input type="submit" value="Activate">              
              <div id="apcFailedMesaage"></div>
            </div>
          </form>
          <div class="apc-info-box-foot"><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e('How to find purchase code?', 'apress');?></a></div>
        </div>
        <?php }else{ ?>
			<div class="apc-box-content">
          <?php esc_html_e( 'Thank you!', 'apress' ); ?>
          <br/>
	    <?php esc_html_e( 'Your theme\'s license is activated successfully.', 'apress' ); ?>
        </div>
        <div class="apc-box-content">
            <form class="form apl-deactivate_theme" action="" method="post">
                <div class="form-group hidden_group">
                    <input type="hidden" name="deactivate_theme" value="1" class="form-control">
                </div>
            
                <input type="submit" class="button button-primary deactivate_theme-license" value="Deactivate">
                    <span>
                        <?php esc_html_e( 'Deactivate', 'apress' ); ?>
                    </span>
                </button>
            </form>
        </div>
		<?php	} ?>
      </div>
    </div>
  </div>
  <div class="welcome-content apc-clearfix extra">
    <div id="wSystemStatus" class="apc-row">
      <div class="apc-col-sm-12">
        <table class="apc-status-table_panel info_table widefat" cellspacing="0" style="margin-bottom: 30px;">
          <thead>
            <tr>
              <th colspan="4"><?php esc_html_e( 'Theme Config', 'apress' ); ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php esc_html_e( 'Theme Name', 'apress' ); ?>
                :</td>
              <td><?php echo esc_html(wp_get_theme()->get('Name')); ?></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'Version', 'apress' ); ?>
                :</td>
              <td><?php echo esc_html(wp_get_theme()->get('Version')); ?></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'Author URL', 'apress' ); ?>
                :</td>
              <td><a href="<?php echo esc_url_raw(wp_get_theme()->get('AuthorURI'))?>"> <?php echo esc_html(wp_get_theme()->get('AuthorURI')); ?> </a></td>
            </tr>
          </tbody>
        </table>
        <table class="apc-status-table_panel info_table widefat" cellspacing="0" style="margin-bottom: 30px;">
          <thead>
            <tr>
              <th colspan="4"><?php esc_html_e( 'Server Settings', 'apress' ); ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php esc_html_e( 'PHP Version', 'apress' ); ?>
                :</td>
              <td><?php
		      		$php_requirements = 5.3;
					if ( version_compare( phpversion(), $php_requirements, '<' ) ) {
						?>
                <span class="message_info message_info-error"> <span class="dashicons dashicons-warning"></span>
                <?php
									echo esc_html( phpversion() );
									esc_html_e( '- We recommend a minimum PHP version of ', 'apress');
									echo esc_html($php_requirements);
								?>
                </span>
                <?php
					} else {
						?>
                <span class="message_info message_info-success"><?php echo esc_html( phpversion() ); ?></span>
                <?php
					}
		      	?></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'PHP Post Max Size', 'apress' ); ?>
                :</td>
              <td><span class="message_info message_info-info info"> <span class="dashicons dashicons-warning"></span>
                <?php
								esc_html_e( ' You cannot upload images, themes and plugins that have a size bigger than this value: ', 'apress');
								
								echo esc_html(size_format(Apc_Status_Info_Helper()->let_to_num((ini_get('post_max_size')))));
							?>
                <br/>
                <a target="_blank" href="http://www.wpbeginner.com/wp-tutorials/how-to-increase-the-maximum-file-upload-size-in-wordpress/">
                <?php
								esc_html_e( ' To see how you can change this please check this guide', 'apress');
								?>
                </a> </span></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'PHP Max Execution Time Limit', 'apress' ); ?>
                :</td>
              <td><?php
		      	$max_execution_time_requirements = 600;
		      	
		      	if ( $max_execution_time_requirements > ini_get('max_execution_time') ) {
		      		?>
                <span class="message_info message_info-error"> <span class="dashicons dashicons-warning"></span>
                <?php
		      				echo esc_html( ini_get('max_execution_time') );
		      				esc_html_e( '- We recommend setting max execution time to at least ', 'apress');
		      				echo esc_html($max_execution_time_requirements);
		      			?>
                <br/>
                <a target="_blank" href="http://www.wpbeginner.com/wp-tutorials/how-to-increase-the-maximum-file-upload-size-in-wordpress/">
                <?php
		      				esc_html_e( ' To see how you can change this please check this guide', 'apress');
		      				?>
                </a> </span>
                <?php
		      	}
		      	else{
		      		?>
                <span class="message_info message_info-success"><?php echo esc_html(ini_get('max_execution_time')); ?></span>
                <?php
		      	}
		      	?></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'PHP Max Input Time', 'apress' ); ?>
                :</td>
              <td><?php
		      	$max_input_time_requirements = 600;
		      	if ( $max_input_time_requirements > ini_get('max_input_time') ) {
		      		?>
                <span class="message_info message_info-error"> <span class="dashicons dashicons-warning"></span>
                <?php
		      				echo esc_html(ini_get('max_input_time'));
		      				esc_html_e('- We recommend setting max input time to at least ', 'apress');
		      				echo esc_html($max_input_time_requirements);
		      			?>
                <br/>
                <a target="_blank" href="http://www.wpbeginner.com/wp-tutorials/how-to-increase-the-maximum-file-upload-size-in-wordpress/">
                <?php
		      				esc_html_e( ' To see how you can change this please check this guide', 'apress');
		      				?>
                </a> </span>
                <?php
		      	}
		      	else{
		      		?>
                <span class="message_info message_info-success"><?php echo esc_html(ini_get('max_input_time')); ?></span>
                <?php
		      	}
		      	?></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'PHP Max Input Vars', 'apress' ); ?>
                :</td>
              <td><?php
		      	$max_input_vars_requirements = 3000;
		      	
		      	if ( $max_input_vars_requirements > ini_get('max_input_vars') ) {
		      		?>
                <span class="message_info message_info-error"> <span class="dashicons dashicons-warning"></span>
                <?php
		      				echo esc_html(ini_get('max_input_vars'));
		      				echo sprintf( esc_html__( '. We recommend minimum value: %d. Max input vars limitation will truncate POST data such as menus.' , 'apress' ) ,$max_input_vars_requirements );
		      			?>
                <br/>
                <a target="_blank" href="https://premium.wpmudev.org/forums/topic/increase-wp-memory-limit-php-max-input-vars/">
                <?php
		      				esc_html_e( ' To see how you can change this please check this guide', 'apress');
		      				?>
                </a> </span>
                <?php
		      	}
		      	else{
		      		?>
                <span class="message_info message_info-success"><?php echo esc_html(ini_get('max_input_vars')); ?></span>
                <?php
		      	}
		      	?></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'MySql Version', 'apress' ); ?>
                :</td>
              <td><?php echo (!empty( $wpdb->is_mysql ) ? $wpdb->db_version() : ''); ?></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'Max upload size', 'apress' ); ?>
                :</td>
              <td><?php
		      		$max_upload_size = 134217728;
		      		if ( $max_upload_size > wp_max_upload_size() ) {
		      		?>
                <span class="message_info message_info-error"> <span class="dashicons dashicons-warning"></span>
                <?php
			      				echo esc_html(size_format(wp_max_upload_size()));
			      				esc_html_e( '. We recommend minimum value: 128 MB.' , 'apress')
			      			?>
                <br/>
                <a target="_blank" href="https://premium.wpmudev.org/forums/topic/increase-wp-memory-limit-php-max-input-vars/">
                <?php
			      				esc_html_e( ' To see how you can change this please check this guide', 'apress');
			      				?>
                </a> </span>
                <?php
			      	}
			      	else{
			      		?>
                <span class="message_info message_info-success"><?php echo esc_html(size_format(wp_max_upload_size())); ?></span>
                <?php
			      	}
		      	?></td>
            </tr>
          </tbody>
        </table>
        <table class="apc-status-table_panel info_table widefat" cellspacing="0" style="margin-bottom: 30px;">
          <thead>
            <tr>
              <th colspan="4"><?php esc_html_e( 'WordPress Settings', 'apress' ); ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php esc_html_e( 'Home Url', 'apress' ); ?>
                :</td>
              <td><?php echo esc_html(home_url( '/' )); ?></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'Site Url', 'apress' ); ?>
                :</td>
              <td><?php echo esc_html(site_url( '/' )); ?></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'Version', 'apress' ); ?>
                :</td>
              <td><?php echo esc_html(get_bloginfo( 'version' )); ?></td>
            </tr>
            <tr>
              <td><?php esc_html_e( 'Memory Limit', 'apress' ); ?>
                :</td>
              <td><?php
		      	$memory_limit_requirements = 134217728;
		      	
		      	if ( $memory_limit_requirements > Apc_Status_Info_Helper()->memory_limit() ) {
		      		?>
                <span class="message_info message_info-error"> <span class="dashicons dashicons-warning"></span>
                <?php
		      				echo esc_html(size_format(Apc_Status_Info_Helper()->memory_limit()));
		      				esc_html_e( ' .We recommend setting memory to be at least 128MB.' , 'apress')
		      			?>
                <br/>
                <a target="_blank" href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP">
                <?php
		      				esc_html_e( ' To see how you can change this please check this guide', 'apress');
		      				?>
                </a> </span>
                <?php
		      	}
		      	else{
		      		?>
                <span class="message_info message_info-success"> <?php echo esc_html(size_format(Apc_Status_Info_Helper()->memory_limit())); ?> </span>
                <?php
		      	}
		      	?></td>
            </tr>
            <tr>
              <td><?php echo esc_html('WP_DEBUG');?></td>
              <td><?php  
		    		if(defined('WP_DEBUG') and WP_DEBUG === true):
		    		?>
                <?php echo esc_html__('WP_DEBUG is enabled.','apress');?> <a target="_blank" href="https://codex.wordpress.org/Debugging_in_WordPress"> <?php echo esc_html__(' How to disable WP_DEBUG mode.','apress');?> </a>
                <?php else: ?>
                <?php echo esc_html__('WP_DEBUG is disabled.','apress');?>
                <?php endif; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
