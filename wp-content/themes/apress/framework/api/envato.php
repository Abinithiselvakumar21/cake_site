<?php
/**
* Webnus apress envato class.
*
* @author Webnus
*/
class Apress_Envato {

	/**
	 * User for cashing directory
	 */
	public $purchase_code;

	/**
	 * Apress remote update path
	 */
	public $update_path;

	/**
	 * Apress current version
	 */
	public $current_version;

	/**
	 * Apress slug
	 */
	public $slug;

	public function __construct() {
		$theme_data = wp_get_theme();
		$this->slug = $theme_data->Template;
		$this->current_version = $theme_data->Version;
		$this->purchase_code = get_option('apress_purchase', '');

		add_action( 'wp_ajax_purchase_activation', array( $this, 'purchase_activation' ) );   
		add_action( 'admin_init',array($this,'purchase_deactivation')); 
	}

	/**
	 * Set update path.
	 *
	 * @author Webnus
	 */
	public function set_update_path( $update_path ) {
		$this->update_path = $update_path;
	}

	/**
	 * Get update path.
	 *
	 * @author Webnus
	 */
	public function get_update_path() {
		return $this->update_path;
	}

	public function purchase_activation() {
		
		$purchase_code_val = $_POST['purchaseCodeVal'];		
		update_option( 'apress_purchase', $purchase_code_val);
		if ( ! empty( $purchase_code_val ) ) {
			$url = "https://api.envato.com/v3/market/author/sale?code=".$purchase_code_val;
			$curl = curl_init($url);
			$personal_token = "bIdHJifzf4wRs6KhFVoRQw4bYSc2UX6S";
			$header = array();
			$header[] = 'Authorization: Bearer '.$personal_token;
			$header[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:41.0) Gecko/20100101 Firefox/41.0';
			$header[] = 'timeout: 20';
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER,$header);
			$envatoRes = curl_exec($curl);
			curl_close($curl);
			$envatoRes = json_decode($envatoRes);
			
			if (isset($envatoRes->item->name)) {   
				$date = new DateTime($envatoRes->supported_until);
				$boughtdate = new DateTime($envatoRes->sold_at);
				$bresult = $boughtdate->format('Y-m-d H:i:s');
				$sresult = $date->format('Y-m-d H:i:s');
				update_option( 'apress_purchase_validation', 'success' );			
				echo 'success';	
			} else {  				
				update_option( 'apress_purchase_validation', 'failed' );	
				echo " - FAILED: Invalid Purchase Code";
			} 
		}
		wp_die();
	}
	public function purchase_deactivation() {
		
		$deactivate_theme = isset($_POST['deactivate_theme']) && !empty($_POST['deactivate_theme']) ? TRUE : FALSE;
		if((bool) $deactivate_theme){
			update_option( 'apress_purchase', '');
			update_option( 'apress_purchase_validation', 'failed' );	 
		}
	}
}

if ( is_admin() ) {
	new Apress_Envato;
}
