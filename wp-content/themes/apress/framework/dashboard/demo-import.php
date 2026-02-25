<?php
$apress_theme = wp_get_theme();
$apress_version = $apress_theme->get( 'Version' );

$zolo_url = 'https://apresswp.com/';
$demos = array(
	'main'			=> array('siteurl'=>'demo1','type'=>'corporate'),
	'demo126'			=> array('siteurl'=>'demo126','type'=>'Bag Store','new'=>true),
	'demo127'			=> array('siteurl'=>'demo127','type'=>'Sky Resort','new'=>true),
	'demo118'			=> array('siteurl'=>'demo118','type'=>'corporate','new'=>true),
	'demo119'			=> array('siteurl'=>'demo119','type'=>'Resume','new'=>true),
	'demo120'			=> array('siteurl'=>'demo120','type'=>'Resume','new'=>true),
	'demo121'			=> array('siteurl'=>'demo121','type'=>'Resort','new'=>true),
	'demo122'			=> array('siteurl'=>'demo122','type'=>'Bike Tour','new'=>true),
	'demo124'			=> array('siteurl'=>'demo124','type'=>'Surf Club','new'=>true),
	'demo125'			=> array('siteurl'=>'demo125','type'=>'Healing','new'=>true),
	'twenty18'		=> array('siteurl'=>'twenty18','type'=>'corporate'),
	'demo20'		=> array('siteurl'=>'demo20','type'=>'Onepage'),
	'demo67'		=> array('siteurl'=>'demo67','type'=>'Modern Corp'),
	'demo68'		=> array('siteurl'=>'demo68','type'=>'corporate'),	
	'demo69'		=> array('siteurl'=>'demo69','type'=>'App'),
	'demo70'		=> array('siteurl'=>'demo70','type'=>'Agency'),
	'demo71'		=> array('siteurl'=>'demo71','type'=>'Agency'),
	'demo72'		=> array('siteurl'=>'demo72','type'=>'Agency'),
	'demo73'		=> array('siteurl'=>'demo73','type'=>'Agency'),
	'demo74'		=> array('siteurl'=>'demo74','type'=>'Agency'),
	'demo75'		=> array('siteurl'=>'demo75','type'=>'Agency'),
	'demo76'		=> array('siteurl'=>'demo76','type'=>'Agency'),
	'demo77'		=> array('siteurl'=>'demo77','type'=>'Agency'),
	'demo78'		=> array('siteurl'=>'demo78','type'=>'Agency'),
	
	'demo91'		=> array('siteurl'=>'demo91','type'=>'Agency'),
	'demo92'		=> array('siteurl'=>'demo92','type'=>'SAAS'),
	'demo93'		=> array('siteurl'=>'demo93','type'=>'corporate'),
	'demo94'		=> array('siteurl'=>'demo94','type'=>'Agency'),
	'demo95'		=> array('siteurl'=>'demo95','type'=>'Landing Page'),
	'demo96'		=> array('siteurl'=>'demo96','type'=>'Landing Page'),
	'demo97'		=> array('siteurl'=>'demo97','type'=>'Agency'),
	
	'demo98'		=> array('siteurl'=>'demo98/','type'=>'Consulting'),
	'demo99'		=> array('siteurl'=>'demo99/','type'=>'Consulting'),
	'demo100'		=> array('siteurl'=>'demo100/','type'=>'Consulting'),	
	
	'demo101'		=> array('siteurl'=>'demo101/','type'=>'Barber'),
	'demo102'		=> array('siteurl'=>'demo102/','type'=>'Cafe'),
	'demo103'		=> array('siteurl'=>'demo103/','type'=>'Engineering'),
	'demo104'		=> array('siteurl'=>'demo104/','type'=>'expert'),
	'demo105'		=> array('siteurl'=>'demo105/','type'=>'Handyman'),
	'demo106'		=> array('siteurl'=>'demo106/','type'=>'Holiday'),
	'demo107'		=> array('siteurl'=>'demo107/','type'=>'Industry'),
	'demo108'		=> array('siteurl'=>'demo108/','type'=>'logistic'),	
	'demo109'		=> array('siteurl'=>'demo109/','type'=>'Medical'),	
	'demo110'		=> array('siteurl'=>'demo110/','type'=>'Pet Clinic'),	
	'demo111'		=> array('siteurl'=>'demo111/','type'=>'winery'),	
	'demo112'		=> array('siteurl'=>'demo112/','type'=>'Bakery'),
	
	'demo113'			=> array('siteurl'=>'demo113','type'=>'creative'),
	'demo114'			=> array('siteurl'=>'demo114','type'=>'creative'),
	'demo115'			=> array('siteurl'=>'demo115','type'=>'creative'),
	'demo116'			=> array('siteurl'=>'demo116','type'=>'creative'),
	'demo117'			=> array('siteurl'=>'demo117','type'=>'creative'),	
	
	'demo75'		=> array('siteurl'=>'demo75','type'=>'creative'),
	'demo76'		=> array('siteurl'=>'demo76','type'=>'creative'),
	'demo77'		=> array('siteurl'=>'demo77','type'=>'creative'),
	'demo78'		=> array('siteurl'=>'demo78','type'=>'creative'),
	
	'demo79'		=> array('siteurl'=>'demo79','type'=>'Agency1'),
	'demo80'		=> array('siteurl'=>'demo80','type'=>'Agency2'),
	'demo81'		=> array('siteurl'=>'demo81','type'=>'architect'),
	'demo82'		=> array('siteurl'=>'demo82','type'=>'beauty'),
	'demo83'		=> array('siteurl'=>'demo83','type'=>'charity'),
	'demo84'		=> array('siteurl'=>'demo84','type'=>'creative'),
	'demo85'		=> array('siteurl'=>'demo85','type'=>'gym'),
	'demo86'		=> array('siteurl'=>'demo86','type'=>'seo'),
	'demo87'		=> array('siteurl'=>'demo87','type'=>'spa'),
	'demo88'		=> array('siteurl'=>'demo88','type'=>'yoga'),
	'demo89'		=> array('siteurl'=>'demo89','type'=>'woocommerce'),
	'demo90'		=> array('siteurl'=>'demo90','type'=>'woocommerce'),
	
	
	'demo2'			=> array('siteurl'=>'demo2','type'=>'cpa'),
	'demo3'			=> array('siteurl'=>'demo3','type'=>'creative'),
	'demo4'			=> array('siteurl'=>'demo4','type'=>'onepage'),
	'demo5'			=> array('siteurl'=>'demo5','type'=>'financial'),
	'demo6'			=> array('siteurl'=>'demo6','type'=>'lawyer'),
	'demo7'			=> array('siteurl'=>'demo7','type'=>'tax'),
	'demo8'			=> array('siteurl'=>'demo8','type'=>'onepage'),
	'demo9'			=> array('siteurl'=>'demo9','type'=>'insurance'),
	'demo10'		=> array('siteurl'=>'demo10','type'=>'barber'),
	'demo11'		=> array('siteurl'=>'demo11','type'=>'industry'),
	'demo12'		=> array('siteurl'=>'demo12','type'=>'architect'),
	'demo13'		=> array('siteurl'=>'demo13','type'=>'onepage health'),
	'demo14'		=> array('siteurl'=>'demo14','type'=>'seo'),
	'demo15'		=> array('siteurl'=>'demo15','type'=>'app'),
	'demo16'		=> array('siteurl'=>'demo16','type'=>'onepage'),
	'demo17'		=> array('siteurl'=>'demo17','type'=>'wocommerce'),
	'demo18'		=> array('siteurl'=>'demo18','type'=>'cafe'),
	'demo19'		=> array('siteurl'=>'demo19','type'=>'doctor'),
	'demo21'		=> array('siteurl'=>'demo21','type'=>'portfolio'),
	'demo22'		=> array('siteurl'=>'demo22','type'=>'blog'),
	'demo23'		=> array('siteurl'=>'demo23','type'=>'onepage'),
	'demo24'		=> array('siteurl'=>'demo24','type'=>'onepage'),
	'demo25'		=> array('siteurl'=>'demo25','type'=>'portfolio'),
	'demo26'		=> array('siteurl'=>'demo26','type'=>'blog'),
	'demo27'		=> array('siteurl'=>'demo27','type'=>'blog'),
	'demo28'		=> array('siteurl'=>'demo28','type'=>'blog'),
	'demo29'		=> array('siteurl'=>'demo29','type'=>'portfolio'),
	'demo30'		=> array('siteurl'=>'demo30','type'=>'blog'),
	'demo31'		=> array('siteurl'=>'demo31','type'=>'wocommerce'),
	'demo32'		=> array('siteurl'=>'demo32','type'=>'blog'),
	'demo33'		=> array('siteurl'=>'demo33','type'=>'blog'),
	'demo34'		=> array('siteurl'=>'demo34','type'=>'portfolio'),
	'demo36'		=> array('siteurl'=>'demo36','type'=>'blog'),
	'demo37'		=> array('siteurl'=>'demo37','type'=>'blog'),
	'demo38'		=> array('siteurl'=>'demo38','type'=>'blog'),
	'demo39'		=> array('siteurl'=>'demo39','type'=>'portfolio'),
	'demo40'		=> array('siteurl'=>'demo40','type'=>'blog'),
	'demo41'		=> array('siteurl'=>'demo41','type'=>'blog'),
	'demo42'		=> array('siteurl'=>'demo42','type'=>'blog'),
	'demo43'		=> array('siteurl'=>'demo43','type'=>'blog'),
	'demo44'		=> array('siteurl'=>'demo44','type'=>'blog'),
	'demo45'		=> array('siteurl'=>'demo45','type'=>'classic'),
	'demo46'		=> array('siteurl'=>'demo46','type'=>'portfolio'),
	'demo47'		=> array('siteurl'=>'demo47','type'=>'blog'),
	'demo48'		=> array('siteurl'=>'demo48','type'=>'blog'),
	'demo49'		=> array('siteurl'=>'demo49','type'=>'onepage'),
	'demo50'		=> array('siteurl'=>'demo50','type'=>'blog'),
	'demo51'		=> array('siteurl'=>'demo51','type'=>'eco'),
	'demo52'		=> array('siteurl'=>'demo52','type'=>'portfolio'),
	'demo53'		=> array('siteurl'=>'demo53','type'=>'construction'),
	'demo54'		=> array('siteurl'=>'demo54','type'=>'blog'),
	'demo56'		=> array('siteurl'=>'demo56','type'=>'onepage'),
	'demo57'		=> array('siteurl'=>'demo57','type'=>'wocommerce'),
	'demo58'		=> array('siteurl'=>'demo58','type'=>'portfolio'),
	'demo59'		=> array('siteurl'=>'demo59','type'=>'portfolio'),
	'demo60'		=> array('siteurl'=>'demo60','type'=>'blog'),
	'demo61'		=> array('siteurl'=>'demo61','type'=>'minimal'),
	'demo62'		=> array('siteurl'=>'demo62','type'=>'blog'),
	'demo63'		=> array('siteurl'=>'demo63','type'=>'onepage'),
	'demo64'		=> array('siteurl'=>'demo64','type'=>'portfolio'),
	'demo65'		=> array('siteurl'=>'demo65','type'=>'onepage'),
	'demo66'		=> array('siteurl'=>'demo66','type'=>'blog'),
);
?>
<div id="apress-dashboard" class="wrap about-wrap apc-admin-wrap ap-theme-browser-wrap">
<?php
// Dashboard Menu
Apress_Admin::theme_dashboard_heading();
?>	
<?php
		if (get_option( 'apress_purchase_validation', '' ) != 'success') {
			echo '
			<div id="apcPluginPurchaseCode">
				<div class="ppc-contents">
					<p style="font-size: 18px;"><b style="color: #ff7859;">' . esc_html__( 'Theme Activation', 'apress' ) . '</b>' . esc_html__( ' is required to install Plugins, Please visit the Welcome tab and enter a valid ', 'apress' )  . '<b>' . esc_html__( 'purchase code', 'apress' ) . '</b>.</p>
					<div class="btn-wrap">
						<a class="importer-button" href="' . esc_url( self_admin_url( 'admin.php?page=apc-dashboard-panel' ) ) . '">' . esc_html__( 'Welcome Tab', 'apress' ) . '</a>
					</div>
				</div>
			</div>
			';
		}
		?>
	<div class="updated error importer-notice importer-notice-1" style="display: none;">
		<p><strong><?php echo __( "We're sorry but the demo data could not be imported. It is most likely due to low PHP configurations on your server. There are two possible solutions.", 'apcore' ); ?></strong></p>

		<p><strong><?php _e( 'Solution 1:', 'apcore' ); ?></strong> <?php _e( 'Import the demo using an alternate method.', 'apcore' ); ?><a href="http://apresswp.com/help/alternate-demo-method/" class="button-primary" target="_blank" style="margin-left: 10px;"><?php _e( 'Alternate Method', 'apcore' ); ?></a></p>
		<p><strong><?php _e( 'Solution 2:', 'apcore' ); ?></strong> <?php echo sprintf( __( 'Fix the PHP configurations, then use the %s, then reimport.', 'apcore' ), '<a href="' . admin_url() . 'plugin-install.php?tab=plugin-information&amp;plugin=wordpress-reset&amp;TB_iframe=true&amp;width=830&amp;height=472' . '">Reset WordPress Plugin</a>' ); ?><a href="<?php echo admin_url( 'admin.php?page=apress-system-status' ); ?>" class="button-primary" target="_blank" style="margin-left: 10px;"><?php _e( 'System Status', 'apcore' ); ?></a></p>
	</div>

	<div class="updated importer-notice importer-notice-2" style="display: none;"><p><strong><?php echo __( "Demo data successfully imported. Now, please install and run", "apcore" ); ?> <a href="<?php echo admin_url();?>plugin-install.php?tab=plugin-information&amp;plugin=regenerate-thumbnails&amp;TB_iframe=true&amp;width=830&amp;height=472" class="thickbox" title="<?php echo __( "Regenerate Thumbnails", "apcore" ); ?>"><?php echo __( "Regenerate Thumbnails", "apcore" ); ?></a> <?php echo __( "plugin once", "apcore" ); ?>.</strong></p></div>

	<div class="updated error importer-notice importer-notice-3" style="display: none;">
		<p><strong><?php echo __( "We're sorry but the demo data could not be imported. It is most likely due to low PHP configurations on your server. There are two possible solutions.", 'apcore' ); ?></strong></p>

		<p><strong><?php _e( 'Solution 1:', 'apcore' ); ?></strong> <?php _e( 'Import the demo using an alternate method.', 'apcore' ); ?><a href="http://apresswp.com/help/alternate-demo-method/" class="button-primary" target="_blank" style="margin-left: 10px;"><?php _e( 'Alternate Method', 'apcore' ); ?></a></p>
		<p><strong><?php _e( 'Solution 2:', 'apcore' ); ?></strong> <?php echo sprintf( __( 'Fix the PHP configurations, then use the %s, then reimport.', 'apcore' ), '<a href="' . admin_url() . 'plugin-install.php?tab=plugin-information&amp;plugin=wordpress-reset&amp;TB_iframe=true&amp;width=830&amp;height=472' . '">Reset WordPress Plugin</a>' ); ?></p>
	</div>
	
    <?php
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
	// check for plugin using plugin name
	if ( is_plugin_active( 'apress-importer/apress-importer.php' ) ) {
		?>
        <div class="apress-important-notice">
		<p class="about-description"><span><?php echo __( "WARNING! This will overwrite all existing option values, please keep backup and proceed with caution!", "apcore" ); ?></span><br /><?php echo __( "IMPORTANT: The included plugins need to be installed and activated before you install a demo.<br />Installing a demo provides pages, posts, images, theme options, widgets, sliders and more.", "apcore" ); ?></p>
	</div>
        <?php
	} 
	?>
	 
	<div class="apress-demo-themes">
		<div class="feature-section theme-browser rendered">
			<?php
			// Loop through all demos
			if ( is_plugin_active( 'apress-importer/apress-importer.php' ) ) {
				define('VINCI_IMPORTER_PLUGIN_URL',plugins_url().'/apress-importer/');
			foreach ( $demos as $demo => $demo_details ) { ?>
				<div class="theme">
					<div class="theme-screenshot">
						<img src="<?php echo VINCI_IMPORTER_PLUGIN_URL . 'assets/images/' . $demo . '.jpg'; ?>" alt="apcore"/>
					</div>
					<h3 class="theme-name" id="<?php echo esc_attr($demo); ?>"><?php echo 'Apress - ' . esc_attr(ucfirst( $demo )); ?></h3>
					<div class="theme-actions">
						<?php printf( '<a class="button button-primary button-install-demo" data-demo-id="%s" href="#">%s</a>', strtolower( $demo ), __( "Install", "apcore" ) ); ?>
						<?php printf( '<a class="button button-primary" target="_blank" href="%1s">%2s</a>', ( $demo != 'classic' ) ? $zolo_url . $demo_details['siteurl'] : $apress_url, __( "Preview", "apcore" ) ); ?>
					</div>
					<div class="demo-import-loader preview-all"></div>
					<div class="demo-import-loader preview-<?php echo strtolower( $demo ); ?>"><span class="loader"></span></div>
					<?php if( isset( $demo_details['type'] )): ?>
					<div class="demo-type"><?php _e( $demo_details['type'], 'apcore' ); ?></div>
					<?php endif; ?>
                    
					<?php if( isset( $demo_details['new'] ) && $demo_details['new'] == true ): ?>
					<div class="plugin-required"><?php _e( 'New', 'apcore' ); ?></div>
					<?php endif; ?>
				</div>
			<?php }
			}else{
				echo '<h1>';
				_e( 'Please activate Apress Importer', 'apcore' );
				echo '</h1>';
				} ?>
		</div>
	</div>
	<div class="apress-thanks">
		<p class="description"><?php echo __( "Thank you for choosing Apress.", "apcore" ); ?></p>
	</div>
</div>

