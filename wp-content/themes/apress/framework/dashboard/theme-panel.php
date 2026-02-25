<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Apress_Admin {

	public function __construct() {
		
		add_action( 'admin_menu', array( $this, 'theme_panel_admin_menu' ));
		add_action( 'admin_init', array( $this, 'theme_redirect' ) );
		
		add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10 );
		add_action( 'wp_ajax_apress_install_plugin', array( $this, 'install_plugin' ) );
		add_action( 'wp_ajax_apress_activate_plugin', array( $this, 'activate_plugin' ) );
		add_action( 'wp_ajax_apress_deactivate_plugin', array( $this, 'deactivate_plugin' ) );
		add_action( 'wp_ajax_apress_update_plugin', array( $this, 'update_plugin' ) );

		
	}
	public function theme_panel_admin_menu(){
		add_menu_page (
			esc_html__('Apress', 'Apress'),
			esc_html__('Apress', 'Apress'), 
			'manage_options', 
			'apc-dashboard-panel',  
			array( $this, 'theme_panel_welcome_render' ),   
			'dashicons-apress-logo',    
			2    
		);
		$submenu = array();
		$submenu[] = array(
			esc_html__('Welcome', 'Apress'),   
			esc_html__('Welcome', 'Apress'),    
			'manage_options',                              
			'apc-dashboard-panel',                         
			array( $this, 'theme_panel_welcome_render' ),  
		);
	
		if (current_user_can( 'activate_plugins' )):
			$submenu[] = array(
				esc_html__('Plugins', 'Apress'),   
				esc_html__('Plugins', 'Apress'),   
				'edit_posts',                          
				'apc-plugins',                   
				array( $this, 'theme_plugins' ),       
			);
		endif;     
		
		//if ( class_exists( 'Apress_Core' ) ) { 
			$submenu[] = array(
				esc_html__('Install Demos', 'Apress'),   
				esc_html__('Install Demos', 'Apress'),   
				'edit_posts',                           
				'apc-demo',             	
				array( $this, 'install_demos_options' ),       
			);
	   // }
	   
		/*$submenu[] = array(
			esc_html__('Tutorials', 'Apress'),   
			esc_html__('Tutorials', 'Apress'),   
			'edit_posts',                           
			'apc-tutorial',             
			array( $this, 'theme_tutorial_options' ),      
		); */
		
		$submenu = apply_filters('apc_panel_submenu', array( $submenu ) );
		
		foreach ($submenu[0] as $key => $value) {
			add_submenu_page(
				'apc-dashboard-panel',               
				$value[0],                           
				$value[1],                           
				$value[2],                          
				$value[3],                           
				$value[4]                           
			);
		}
	}
	
	public function theme_dashboard_heading(){
		global $submenu;
		$menu_items = '';
	
		if (isset($submenu['apc-dashboard-panel'])):
		  $menu_items = $submenu['apc-dashboard-panel'];
		endif;
	
		if (!empty($menu_items)) : 
		?>
		<div class="apc-welcome_page">
        <div class="apc-row">
			<div class="apc-col-sm-9">
			<div class="apc_theme_logo"><img src="<?php echo get_template_directory_uri() . '/assets/images/apress_logo.jpg'; ?>" alt="apcore"/>
            <?php /*?><div class="apc-version_theme">
			  <?php esc_html_e('Version - ', 'apress');?>
			  <?php echo esc_html(wp_get_theme()->get('Version')); ?> </div><?php */?>
              </div>
            <div class="apc-welcome_title">
			  <h1>
				<?php esc_html_e('Welcome to', 'apress');?>
				<?php echo esc_html(wp_get_theme()->get('Name')); ?> </h1>
			</div>
			<div class="apc-welcome_subtitle">
			  <?php
						echo sprintf(esc_html__('%s is already installed and ready to use! Let\'s build something impressive.', 'apress'), esc_html(wp_get_theme()->get('Name'))) ;
					?>
			</div>
            </div>
            <div class="apc-col-sm-3">
            
              
          </div>
          </div>
		  </div>
		  <div class="wrap apc-wrapper-notify">
			<div class="nav-tab-wrapper">
			  <?php foreach ($menu_items as $item): 
				$class = isset($_GET['page']) && $_GET['page'] == $item[2] ? ' nav-tab-active' : '';
				?>
				<a href="<?php echo esc_url(admin_url('admin.php?page='.$item[2].''));?>" 
					class="nav-tab<?php echo esc_attr($class);?>"
				>
					<?php echo esc_html($item[0]); ?>
						
				</a>
			  <?php endforeach; ?>
              
              
              <a href="#" class="nav-tab support_link" title="Support">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
  <g>
    <g>
      <path d="M366,396c-5.52,0-10,4.48-10,10c0,5.52,4.48,10,10,10c5.52,0,10-4.48,10-10C376,400.48,371.52,396,366,396z"/>
    </g>
  </g>
  <g>
    <g>
      <path d="M390.622,363.663l-47.53-15.84l-17.063-34.127c15.372-15.646,26.045-36.348,29.644-57.941L357.801,243H376
			c16.542,0,30-13.458,30-30v-63C406,67.29,338.71,0,256,0c-82.922,0-150,67.097-150,150v63c0,13.036,8.361,24.152,20,28.28V253
			c0,16.542,13.458,30,30,30h8.782c4.335,9.417,9.946,18.139,16.774,25.974c1.416,1.628,2.893,3.206,4.406,4.741l-17.054,34.108
			l-47.531,15.841C66.112,382.092,26,440.271,26,502c0,5.523,4.477,10,10,10h440c5.522,0,10-4.477,10-10
			C486,440.271,445.889,382.092,390.622,363.663z M386,213c0,5.514-4.486,10-10,10h-15.262c2.542-19.69,4.236-40.643,4.917-61.28
			c0.02-0.582,0.036-1.148,0.054-1.72H386V213z M136,223c-5.514,0-10-4.486-10-10v-53h20.298c0.033,1.043,0.068,2.091,0.107,3.146
			c0.001,0.036,0.003,0.071,0.004,0.107c0,0.003,0,0.006,0,0.009c0.7,20.072,2.372,40.481,4.856,59.737H136V223z M156,263
			c-5.514,0-10-4.486-10-10v-10h8.198l2.128,12.759c0.406,2.425,0.905,4.841,1.482,7.241H156z M146.017,140H126.38
			C131.445,72.979,187.377,20,256,20c68.318,0,124.496,52.972,129.619,120h-19.635c-0.72-55.227-45.693-100-101.033-100h-17.9
			C191.712,40,146.736,84.773,146.017,140z M247.05,60h17.9c44.809,0,81.076,36.651,81.05,81.41c0,3.147-0.025,5.887-0.078,8.38
			c0,0.032-0.001,0.065-0.001,0.098l-12.508-1.787c-33.98-4.852-66.064-20.894-90.342-45.172C241.195,101.054,238.652,100,236,100
			c-26.856,0-52.564,12.236-69.558,32.908C170.63,92.189,205.053,60,247.05,60z M178.54,263c-5.006-16.653-10.734-65.653-12-97.053
			l13.459-17.946c12.361-16.476,31.592-26.713,52.049-27.888c26.917,25.616,61.739,42.532,98.537,47.786l14.722,2.104
			c-0.984,20.885-2.995,41.843-5.876,61.118c-0.001,0.006-0.002,0.013-0.003,0.02c-0.916,6.197-1.638,10.185-3.482,21.324
			c-5.296,31.765-28.998,60.49-60.287,68.313c-12.877,3.215-26.443,3.214-39.313,0c-19.537-4.884-37.451-18.402-49.012-37.778
			h20.386c4.128,11.639,15.243,20,28.28,20h20c16.575,0,30-13.424,30-30c0-16.542-13.458-30-30-30h-20
			c-13.327,0-24.278,8.608-28.297,20H178.54z M235.159,341.016c6.859,1.445,13.852,2.184,20.841,2.184
			c5.471,0,10.943-0.458,16.353-1.346l-17.67,18.687L235.159,341.016z M240.935,375.079l-31.718,33.542
			c-8.732-16.714-16.235-34.109-22.389-51.917l11.911-23.822L240.935,375.079z M311.566,329.494l13.604,27.209
			c-6.164,17.838-13.669,35.239-22.392,51.933l-33.948-33.948L311.566,329.494z M226,273c0-5.521,4.478-10,10-10h20
			c5.514,0,10,4.486,10,10c0,5.522-4.479,10-10,10h-20C230.486,283,226,278.514,226,273z M46.4,492
			c3.963-49.539,36.932-94.567,81.302-109.363l42.094-14.028c7.712,21.325,17.266,42.052,28.463,61.74
			c0.019,0.034,0.037,0.068,0.056,0.101c0,0.001,0.001,0.001,0.001,0.002c8.181,14.389,17.389,28.45,27.372,41.799L237.99,492H46.4z
			 M256,483.086l-13.562-21.773c-0.152-0.244-0.314-0.481-0.486-0.711c-8.098-10.802-15.652-22.099-22.532-33.662l35.663-37.714
			l37.578,37.578c-6.926,11.647-14.506,22.991-22.611,33.796C269.56,461.253,270.255,460.224,256,483.086z M274.01,492
			l12.301-19.748c10.027-13.4,19.301-27.574,27.564-42.132c0.05-0.088,0.097-0.178,0.147-0.266c0.006-0.011,0.012-0.021,0.018-0.032
			c11.055-19.5,20.509-40.047,28.164-61.213l42.093,14.028c44.371,14.796,77.34,59.824,81.303,109.363H274.01z"/>
    </g>
  </g>
  <g>
    <g>
      <path d="M435.546,451.531c-6.683-13.377-16.472-25.261-28.309-34.367c-4.378-3.369-10.656-2.55-14.023,1.828
			c-3.368,4.378-2.549,10.656,1.828,14.024c9.454,7.273,17.272,16.766,22.611,27.453c2.473,4.949,8.483,6.941,13.415,4.477
			C436.008,462.478,438.013,456.472,435.546,451.531z"/>
    </g>
  </g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
  <g></g>
</svg></a>
              <a href="#" class="nav-tab documentation_link" title="Documentation">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
<g>
  <path d="M23.429,17H47c0.552,0,1-0.447,1-1s-0.448-1-1-1H23.429c-0.552,0-1,0.447-1,1S22.877,17,23.429,17z"/>
  <path d="M23.429,32H47c0.552,0,1-0.447,1-1s-0.448-1-1-1H23.429c-0.552,0-1,0.447-1,1S22.877,32,23.429,32z"/>
  <path d="M23.429,47H47c0.552,0,1-0.447,1-1s-0.448-1-1-1H23.429c-0.552,0-1,0.447-1,1S22.877,47,23.429,47z"/>
  <path d="M59,0H1C0.448,0,0,0.447,0,1v58c0,0.553,0.448,1,1,1h58c0.552,0,1-0.447,1-1V1C60,0.447,59.552,0,59,0z M58,58H2V2h56V58z"
		/>
  <polygon points="12.501,18.474 14.929,17.197 17.357,18.474 16.894,15.77 18.858,13.854 16.143,13.46 14.929,11 13.715,13.46 
		11,13.854 12.965,15.77 	"/>
  <polygon points="12.501,33.557 14.929,32.28 17.357,33.557 16.894,30.853 18.858,28.938 16.143,28.543 14.929,26.083 
		13.715,28.543 11,28.938 12.965,30.853 	"/>
  <polygon points="12.501,49 14.929,47.723 17.357,49 16.894,46.296 18.858,44.381 16.143,43.986 14.929,41.526 13.715,43.986 
		11,44.381 12.965,46.296 	"/>
</g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
</svg> </a>
<a href="#" class="nav-tab knowledge_link" title="Knowledge">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 464.87 464.87" style="enable-background:new 0 0 464.87 464.87;" xml:space="preserve">
<g>
  <g>
    <path d="M283.86,280.931c42.008-17.061,69.234-58.161,68.559-103.496c0-62.309-53.832-113-120-113s-120,50.691-120,113
			c-0.675,45.335,26.55,86.435,68.559,103.496l0.93,0.504l6.353,10.424c-11.342,6.565-15.214,21.081-8.65,32.422
			c0.863,1.491,1.886,2.884,3.051,4.154c-8.894,9.75-8.201,24.863,1.548,33.758c4.429,4.04,10.215,6.268,16.209,6.242h64
			c13.197,0.058,23.942-10.594,24-23.791c0.026-5.995-2.202-11.781-6.242-16.209c8.859-9.657,8.211-24.667-1.446-33.525
			c-1.27-1.165-2.662-2.188-4.154-3.051l6.353-10.424L283.86,280.931z M264.418,352.435h-64c-4.418,0-8-3.582-8-8s3.582-8,8-8h64
			c4.418,0,8,3.582,8,8S268.836,352.435,264.418,352.435z M264.418,320.435h-64c-4.418,0-8-3.582-8-8s3.582-8,8-8h64
			c4.418,0,8,3.582,8,8S268.836,320.435,264.418,320.435z M276.598,266.666l-3.199,1.738c-1.238,0.675-2.277,1.664-3.012,2.867
			l-10.461,17.164h-3.508v-60.688l37.656-37.656l-11.312-11.313l-40,40c-1.5,1.5-2.343,3.534-2.344,5.656v64h-16v-64
			c-0.001-2.122-0.844-4.156-2.344-5.656l-40-40l-11.312,11.312l37.656,37.656v60.688h-3.508l-10.461-17.164
			c-0.735-1.203-1.774-2.192-3.012-2.867l-3.199-1.738c-0.257-0.137-0.52-0.261-0.789-0.371
			c-36.169-14.551-59.637-49.878-59.031-88.859c0-53.484,46.652-97,104-97c57.348,0,104,43.516,104,97
			c0.606,38.981-22.863,74.308-59.031,88.859C277.118,266.405,276.854,266.529,276.598,266.666z"/>
  </g>
</g>
<g>
  <g>
    <rect x="80.417" y="57.602" transform="matrix(0.4472 -0.8944 0.8944 0.4472 -26.6442 125.7576)" width="16" height="53.664"/>
  </g>
</g>
<g>
  <g>
    <rect x="348.101" y="76.448" transform="matrix(0.9486 -0.3164 0.3164 0.9486 -7.4586 122.956)" width="53.664" height="16"/>
  </g>
</g>
<g>
  <g>
    <rect x="32.418" y="168.435" width="48" height="16"/>
  </g>
</g>
<g>
  <g>
    <rect x="384.418" y="168.435" width="48" height="16"/>
  </g>
</g>
<g>
  <g>
    <rect x="61.588" y="276.433" transform="matrix(0.8944 -0.4472 0.4472 0.8944 -117.8667 69.5699)" width="53.664" height="16"/>
  </g>
</g>
<g>
  <g>
    <rect x="368.424" y="257.615" transform="matrix(0.4472 -0.8944 0.8944 0.4472 -46.3343 493.9232)" width="16" height="53.664"/>
  </g>
</g>
<g>
  <g>
    <rect x="224.418" y="8.435" width="16" height="40"/>
  </g>
</g>
<g>
  <g>
    <path d="M464.418,384.435v-16c-104.371,0-215.281,25.23-215.996,72h-32.008c-0.715-46.77-111.625-72-215.996-72v16
			c117.199,0,199.037,29.414,199.957,56H0.418v16h464v-16H264.461C265.381,413.849,347.219,384.435,464.418,384.435z"/>
  </g>
</g>
<g>
  <g>
    <rect x="68.435" y="344.309" transform="matrix(0.0526 -0.9986 0.9986 0.0526 -347.4305 474.6621)" width="16" height="152.24"/>
  </g>
</g>
<g>
  <g>
    <rect x="312.314" y="412.43" transform="matrix(0.9986 -0.0527 0.0527 0.9986 -21.6328 21.071)" width="152.24" height="16"/>
  </g>
</g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
<g> </g>
</svg> </a>
              
			</div>
		  </div> 
		<?php endif;             
	}
	
	public function theme_panel_welcome_render(){
	
		/**
		 * Template View Welcome
		 */
		require_once(get_template_directory() . '/framework/dashboard/apc-weclome.php');
	}
	
	public function theme_plugins(){
	
		/**
		 * Template View Plugin
		 */
		require_once(get_template_directory() . '/framework/dashboard/apc-plugins.php');
	}               
	
	//public function theme_tutorial_options(){
	
		/**
		 * Template View Plugin
		 */
		//require_once(get_template_directory() . '/framework/dashboard/video-tutorial.php');
	//}
	
	public function install_demos_options() {

		/**
		 * Template View Plugin
		 */
		require_once(get_template_directory() . '/framework/dashboard/demo-import.php');
	}        
	
	public function theme_redirect() {
		global $pagenow;
		if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) {
			wp_safe_redirect( esc_url(admin_url( 'admin.php?page=apc-dashboard-panel' )) );
			exit;
		}
	}	
	public function tgmpa_load( $load ) {
		return true;
	}

	public function install_plugin() {
		
		if ( current_user_can( 'manage_options' ) ) {
			
			check_admin_referer( 'tgmpa-install', 'tgmpa-nonce' );
			
			global $tgmpa;
			
			$tgmpa->install_plugins_page();
			
			$url = wp_nonce_url(
				add_query_arg(
					array(
						'plugin'			=> urlencode( $_GET['plugin'] ),
						'tgmpa-deactivate'	=> 'deactivate-plugin',
					),
					$tgmpa->get_tgmpa_url()
				),
				'tgmpa-deactivate',
				'tgmpa-nonce'
			);
			echo htmlspecialchars_decode( $url );
			
		}
		
		// this is required to terminate immediately and return a proper response
		wp_die();
		
	}

	public function activate_plugin() {
		
		if ( current_user_can( 'edit_theme_options' ) ) {
			
			check_admin_referer( 'tgmpa-activate', 'tgmpa-nonce' );
			
			global $tgmpa;
			
			$plugins = $tgmpa->plugins;
			
			foreach ( $plugins as $plugin ) {
				
				if ( isset( $_GET['plugin'] ) && $plugin['slug'] === $_GET['plugin'] ) {
					
					activate_plugin( $plugin['file_path'] );
					
					$url = wp_nonce_url(
						add_query_arg(
							array(
								'plugin'			=> urlencode( $_GET['plugin'] ),
								'tgmpa-deactivate'	=> 'deactivate-plugin',
							),
							$tgmpa->get_tgmpa_url()
						),
						'tgmpa-deactivate',
						'tgmpa-nonce'
					);
					
					echo htmlspecialchars_decode( $url );
					
				}
				
			} // foreach
			
		}
		
		// this is required to terminate immediately and return a proper response
		wp_die();
		
	}
	
	public function deactivate_plugin() {
		
		if ( current_user_can( 'edit_theme_options' ) ) {
			
			check_admin_referer( 'tgmpa-deactivate', 'tgmpa-nonce' );
			
			global $tgmpa;
			
			$plugins = $tgmpa->plugins;
			
			foreach ( $plugins as $plugin ) {
				
				if ( isset( $_GET['plugin'] ) && $plugin['slug'] === $_GET['plugin'] ) {
					
					deactivate_plugins( $plugin['file_path'] );
					
					$url = wp_nonce_url(
						add_query_arg(
							array(
								'plugin'			=> urlencode( $_GET['plugin'] ),
								'tgmpa-activate'	=> 'activate-plugin',
							),
							$tgmpa->get_tgmpa_url()
						),
						'tgmpa-activate',
						'tgmpa-nonce'
					);
					
					echo htmlspecialchars_decode( $url );
					
				}
				
			} // foreach

			
		}
		
		// this is required to terminate immediately and return a proper response
		wp_die();
		
	}

	public function update_plugin() {
		if ( current_user_can( 'manage_options' ) ) {
			check_admin_referer( 'tgmpa-update', 'tgmpa-nonce' );
			global $tgmpa;
			$tgmpa->install_plugins_page();

			$url = wp_nonce_url(
				add_query_arg(
					array(
						'plugin'			=> urlencode( $_GET['plugin'] ),
						'tgmpa-deactivate'	=> 'deactivate-plugin',
					),
					$tgmpa->get_tgmpa_url()
				),
				'tgmpa-deactivate',
				'tgmpa-nonce'
			);

			echo htmlspecialchars_decode( $url );
		}
		
		// this is required to terminate immediately and return a proper response
		wp_die();
	}
}

new Apress_Admin();