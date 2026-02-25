<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div id="apress-dashboard" class="wrap about-wrap apc-admin-wrap">
<?php
// Dashboard Menu
Apress_Admin::theme_dashboard_heading();
?>
	<div class="wn-plugins ap-theme-browser-wrap">
		<?php
			$tgmpa_list_table	= new TGMPA_List_Table;
			$plugins			= TGM_Plugin_Activation::$instance->plugins;
		?>
		<div class="wn-plugins-categories">
			<a href="#" class="wn-plugin-selected" data-filter="*">All <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".premium">Premium <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".builder">Page Builder <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".slider">Slider <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".free">Free <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".woocommerce">Woocommerce <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".apress">Apress <span class="wn-filter-count"></span></a>
		</div>
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
		<div class="theme-browser rendered">
			<div class="themes">

			<?php
			foreach( $plugins as $plugin ) :

				$plugin_status				= '';
				$plugin['type']				= isset( $plugin['type'] ) ? $plugin['type'] : 'recommended';
				$plugin['sanitized_plugin']	= $plugin['name'];

				$plugin_action = $tgmpa_list_table->actions_plugin( $plugin );

				if ( is_plugin_active( $plugin['file_path'] ) ) {
					$plugin_status = 'active';
				}
				$category = $plugin['category']

				?>

				<div class="theme <?php echo esc_attr( $plugin_status ); ?> <?php echo $category; ?>">

					<?php if ( $plugin['type'] == 'Required' ) : ?>
						<div class="plugin-required"><?php esc_html_e( 'REQUIRED', 'apress' ); ?></div>
					<?php endif; ?>

					<div class="theme-screenshot">
						<img src="<?php echo esc_url( $plugin['image_src'] ); ?>" alt="">
					</div>

					<h3 class="theme-name"><?php echo esc_html( $plugin['name'] ); ?></h3>
					<div class="theme-actions"><?php echo '' . $plugin_action; ?></div>

				</div>

			<?php endforeach; ?>

			</div>
		</div>
	</div>

</div> <!-- end wrap -->