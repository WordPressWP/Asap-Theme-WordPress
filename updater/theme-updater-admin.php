<?php
/**
 * Theme updater admin page and functions.
 *
 * @package EDD Sample Theme
 */

class EDD_Theme_Updater_Admin {

	/**
	 * Variables required for the theme updater
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $remote_api_url = null;
	protected $theme_slug     = null;
	protected $version        = null;
	protected $author         = null;
	protected $download_id    = null;
	protected $renew_url      = null;
	protected $strings        = null;
	protected $item_name      = '';
	protected $beta           = false;
	protected $item_id        = null;

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function __construct( $config = array(), $strings = array() ) {

		$config = wp_parse_args(
			$config,
			array(
				'remote_api_url' => 'https://asaptheme.com',
				'theme_slug'     => get_template(),
				'item_name'      => '',
				'license'        => '',
				'version'        => '',
				'author'         => '',
				'download_id'    => '',
				'renew_url'      => '',
				'beta'           => false,
				'item_id'        => '',
			)
		);

		/**
		 * Fires after the theme $config is setup.
		 *
		 * @since x.x.x
		 *
		 * @param array $config Array of EDD SL theme data.
		 */
		do_action( 'post_edd_sl_theme_updater_setup', $config );

		// Set config arguments
		$this->remote_api_url = $config['remote_api_url'];
		$this->item_name      = $config['item_name'];
		$this->theme_slug     = sanitize_key( $config['theme_slug'] );
		$this->version        = $config['version'];
		$this->author         = $config['author'];
		$this->download_id    = $config['download_id'];
		$this->renew_url      = $config['renew_url'];
		$this->beta           = $config['beta'];
		$this->item_id        = $config['item_id'];

		// Populate version fallback
		if ( '' === $config['version'] ) {
			$theme         = wp_get_theme( $this->theme_slug );
			$this->version = $theme->get( 'Version' );
		}

		// Strings passed in from the updater config
		$this->strings = $strings;

		add_action( 'init', array( $this, 'updater' ) );
		add_action( 'admin_init', array( $this, 'register_option' ) );
		add_action( 'admin_init', array( $this, 'license_action' ) );
		add_action( 'admin_menu', array( $this, 'license_menu' ) );
		add_action( 'update_option_' . $this->theme_slug . '_license_key', array( $this, 'activate_license' ), 10, 2 );
		add_filter( 'http_request_args', array( $this, 'disable_wporg_request' ), 5, 2 );
		add_action( 'admin_notices', array( $this, 'show_activate_msg' ) );

	}

	/**
	 * Creates the updater class.
	 *
	 * since 1.0.0
	 */
	public function updater() {

		// To support auto-updates, this needs to run during the wp_version_check cron job for privileged users.
		$doing_cron = defined( 'DOING_CRON' ) && DOING_CRON;
		if ( ! current_user_can( 'manage_options' ) && ! $doing_cron ) {
			return;
		}

		/* If there is no valid license key status, don't allow updates. */
		if ( 'valid' !== get_option( $this->theme_slug . '_license_key_status', false ) ) {
			return;
		}

		if ( ! class_exists( 'EDD_Theme_Updater' ) ) {
			// Load our custom theme updater
			include dirname( __FILE__ ) . '/theme-updater-class.php';
		}

		new EDD_Theme_Updater(
			array(
				'remote_api_url' => $this->remote_api_url,
				'version'        => $this->version,
				'license'        => trim( get_option( $this->theme_slug . '_license_key' ) ),
				'item_name'      => $this->item_name,
				'author'         => $this->author,
				'beta'           => $this->beta,
				'item_id'        => $this->item_id,
				'theme_slug'     => $this->theme_slug,
			),
			$this->strings
		);
	}

	/**
	 * Adds a menu item for the theme license under the appearance menu.
	 *
	 * since 1.0.0
	 */
	public function license_menu() {

		$strings = $this->strings;

		add_theme_page(
			$strings['theme-license'],
			$strings['theme-license'],
			'manage_options',
			$this->theme_slug . '-license',
			array( $this, 'license_page' )
		);
	}

	/**
	 * Outputs the markup used on the theme license page.
	 *
	 * since 1.0.0
	 */
	public function license_page() {

		$strings = $this->strings;

		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$status  = get_option( $this->theme_slug . '_license_key_status', false );

		// Checks license status to display under license key
		if ( ! $license ) {
			$message = $strings['enter-key'];
		} else {
			// delete_transient( $this->theme_slug . '_license_message' );
			if ( ! get_transient( $this->theme_slug . '_license_message', false ) ) {
				set_transient( $this->theme_slug . '_license_message', $this->check_license(), ( 60 * 60 * 24 ) );
			}
			$message = get_transient( $this->theme_slug . '_license_message' );
		}
		?>
		<style>


.asaplicense-options .notice-error {
	border:none !important;
	border-left:4px solid #b53232 !important;
	border-radius:4px;
	padding:4px 42px 4px 12px !important;
	background:#faecec !important;
	color:#a30000 !important;
	margin-top:14px;
}

.asaplicense-options .notice-warning {  
	border:none !important;
	border-left:4px solid #a18a62 !important;
	border-radius:4px;
	padding:4px 42px 4px 12px !important;
	background:#fcf8e3 !important;
	color:#8a6d3b !important;
	margin-top:14px;
}

.asaplicense-options .notice-success {
	border:none !important;
	border-left:4px solid #659b70 !important;
	border-radius:4px;
	padding:4px 42px 4px 12px !important;
	background:#eef8f0 !important;
	color:#3f824d !important;
	margin-top:14px;
}

.asaplicense-options .notice-dismiss {
	padding:14px !important;
	
}

.asaplicense-options .notice-dismiss::hover:before {
	color:#282828 !important;
}

.switchify  input {
	display:none !important;
	margin: 0!important;
	padding: 0 !important;
    margin: 0px;
    border: none;
    outline: none;
    box-shadow: none;
	}

.asaplicense-options .form-table th {
	width:240px !important;
}

.wrapper-asaplicense-options {
    background: #f1f1f1;
    margin-top: 0px;
    position: relative;
    height: 100vh;
    margin-left: -20px;
    margin-right: 0px;
}


.asaplicense-options h2 {
  	font-size: 18px;
    line-height: normal;
    margin: 0px;
    padding-bottom: 15px;
    border-bottom: 1px solid #e2e4e7;
}
.asaplicense-options .form-table th {
	padding: 18px 10px 18px 0;
	font-weight: 400;
}

.form-table td {
	padding: 13px 10px;
}


#asaplicense-fieldset-one td {
	padding: 6px 0  6px 14px !important;
}

#asaplicense-fieldset-one .asaplicense-first-tr td {
	padding-bottom:0 !important;
}


.wrapper-asaplicense-options .nav-tab {
	font-size: 13px;
	line-height: 20px;
	font-weight: normal;
/*	border-radius: 5px 5px 0 0;
	-moz-border-radius: 5px 5px 0 0;
	-webkit-border-radius: 5px 5px 0 0;*/
	border:none !important;
	background: transparent !important;
	display: block;
    width: 100%;
    display: block;
    transition: 0.1s ease;
    outline: none !important;
    text-decoration: none !important;
    padding: 14px 18px;
    font-size: 14px;
    color: #757575;
    margin-left: 0;
	padding-left:14px !important;
	border-left:4px solid transparent !important;
}

.wrapper-asaplicense-options .nav-tab:hover,
.wrapper-asaplicense-options .nav-tab:hover svg {
	color: #1abc9c;
	stroke:  #1abc9c;
}

.wrapper-asaplicense-options  .nav-tab-active,
.wrapper-asaplicense-options .nav-tab-active:hover {
	/*background: #fff;*/
	font-weight: bold !important;
	border-bottom: 0px;
/*	background: white !important;
	border-top: 2px solid #0073AA;*/
	color: #1abc9c;
	border-left:4px solid #1abc9c !important;
	background:#fff !important;
}


.wrapper-asaplicense-options .nav-tab-wrapper img {
max-width: 164px;
    padding: 1rem;
    margin-bottom: 0.5rem;
    margin-top: 0.25rem;
}

.wrapper-asaplicense-options  .nav-tab-active svg {
	stroke:#1abc9c !important;
}
.asaplicense-options .button-primary {
	font-size: 15px;
	line-height: 40px;
	height: 42px;
	padding: 0 34px;
	background: #1abc9c !important;
	border: 1px solid #1abc9c;
}

.asaplicense-options .button-secondary  {
	font-size: 15px;
	line-height: 40px;
	height: 42px;
	padding: 0 34px;
	background:#f1faf9 !important;
	color:#1abc9c !important;
		border: 1px solid #1abc9c !important;
}

.asaplicense-options  .button-primary:hover {
	background: #17a98c !important;	
}


.asaplicense-options .button-secondary:hover {
	background:#e8f8f5 !important;
}
.asaplicense-options {
	background: #fff;
	border-top: 0 !important;
	padding: 20px 20px 20px 20px;
	border-radius: 0 5px 5px 5px;
	-moz-border-radius: 0 5px 5px 5px;
	-webkit-border-radius: 0 5px 5px 5px;
	font-size: 15px;
    box-sizing: border-box;
    float: right;
    padding: 30px 50px;
    position: absolute;
    left: 240px;
    min-height: 100%;
    width: calc(100% - 240px);
    background: white;

}

.asaplicense-admin-header img {
	max-width: 200px;
}

.asaplicense-options p.submit {
	margin-bottom: 0 !important;
	margin-top: 10px !important;
	padding-bottom: 10px !important;
}

.wrapper-asaplicense-options .nav-tab-wrapper {
	float: left;
    width: 240px;
    padding-top: 10px;
}

.wrapper-asaplicense-options .nav-tab-wrapper  a:not(.active) svg.fill#fill_as [fill], .nav-tab-wrapper a:not(.active) svg.fill {
    fill: #757575;
    color: #757575;
}

.wrapper-asaplicense-options .nav-tab-wrapper  a svg {
    vertical-align: middle;
    margin-right: 10px;
    width: 20px;
    height: 20px;
    position: absolute;
}

.wrapper-asaplicense-options .nav-tab-wrapper  a span {
	margin-left: 30px;

}

.wrapper-asaplicense-options .nav-tab-wrapper .asaplicense-support {
	float: right;
	margin-right: 0.5em;
	padding: 5px 10px;
	font-size: 14px;
	font-weight: 400;
	line-height: 1.71428571;
	white-space: nowrap;
	text-decoration: none;
}


.wrapper-asaplicense-options .nav-tab-wrapper .asaplicense-support i {
	width: auto;
	height: auto;
	font-size: 15px;
	margin: 4px 4px 0px 0px;
}

.wrapper-asaplicense-options .nav-tab-wrapper {
	border-bottom: none !important;
}

span.asaplicense-items {
	display: block;
	margin-bottom: 12px;
	margin-right: 10px;
}

span.asaplicense-items:first-child {
	margin-top:10px;
}


span.asaplicense-items label {
	margin-left:8px;
}
span.asaplicense-items input {
	margin-right: 4px;
}
				
	.wrapper-asaplicense-options input:not([type='number'], [type='submit'], [type='button'], [type='checkbox'], [type='color']) {
    width: 300px;
    padding: 8px !important;
    border-radius: 4px !important;
    border: 1px solid #8c8f94 !important;
}			
			</style>
		<div class="wrap wrapper-asaplicense-options ">
			
				<div class="nav-tab-wrapper">
							
				<a class="nav-tab nav-tab-active"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-key" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#757575" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="8" cy="15" r="4" />
  <line x1="10.85" y1="12.15" x2="19" y2="4" /><line x1="18" y1="5" x2="20" y2="7" /><line x1="15" y1="8" x2="17" y2="10" /></svg><span><?php _e('License', 'asap'); ?></span></a>
					
				
				</div>

				<section id="asaplicense-options options-general" class="asaplicense-options section-content active">
			<h2><?php echo esc_html( $strings['theme-license'] ); ?></h2>
			<form method="post" action="options.php">

				<?php settings_fields( $this->theme_slug . '-license' ); ?>

				<table class="form-table">
					<tbody>

						<tr valign="top">
							<th scope="row" valign="top">
								<?php echo $strings['license-key']; ?>
							</th>
							<td>
								<?php if ( 'valid' != $status ) { ?> 								
								<input id="<?php echo esc_attr( $this->theme_slug ); ?>_license_key" name="<?php echo $this->theme_slug; ?>_license_key" type="text" class="regular-text" value="<?php echo esc_attr( $license ); ?>" />
								<?php } ?>
								<p class="description">
									<?php echo $message; ?>
								</p>
							</td>
						</tr>

						<?php if ( $license ) { ?>
						<tr valign="top">
							<th scope="row" valign="top">
								<?php echo esc_html( $strings['license-action'] ); ?>
							</th>
							<td>
								<?php
								wp_nonce_field( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' );
								if ( 'valid' === $status ) {
									?>
									<span style="color:green;display:block;"><?php echo __( 'Active', 'asap' );?></span>
								<?php } else { ?>
									<span style="color:red;display:block;margin-bottom:6px;"><?php echo __( 'Inactive', 'asap' );?></span>
									<input type="submit" class="button-secondary" name="<?php echo esc_attr( $this->theme_slug ); ?>_license_activate" value="<?php echo esc_attr( $strings['activate-license'] ); ?>"/>
									<?php
								}
								?>
							</td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
				<?php if ( 'valid' != $status ) { ?> 
				<?php submit_button(); ?>
				<?php } ?>
			</form>

		</section>

	</div>
		<?php
	}

	/**
	 * Registers the option used to store the license key in the options table.
	 *
	 * since 1.0.0
	 */
	public function register_option() {
		register_setting(
			$this->theme_slug . '-license',
			$this->theme_slug . '_license_key',
			array( $this, 'sanitize_license' )
		);
	}

	/**
	 * Sanitizes the license key.
	 *
	 * since 1.0.0
	 *
	 * @param string $new License key that was submitted.
	 * @return string $new Sanitized license key.
	 */
	public function sanitize_license( $new ) {

		$old = get_option( $this->theme_slug . '_license_key' );

		if ( $old && $old !== $new ) {
			// New license has been entered, so must reactivate
			delete_option( $this->theme_slug . '_license_key_status' );
			delete_transient( $this->theme_slug . '_license_message' );
		}

		return $new;
	}

	/**
	 * Makes a call to the API.
	 *
	 * @since 1.0.0
	 *
	 * @param array $api_params to be used for wp_remote_get.
	 * @return array $response decoded JSON response.
	 */
	public function get_api_response( $api_params ) {

		// Call the custom API.
		$verify_ssl = (bool) apply_filters( 'edd_sl_api_request_verify_ssl', true );
		$response   = wp_remote_post(
			$this->remote_api_url,
			array(
				'timeout'   => 15,
				'sslverify' => $verify_ssl,
				'body'      => $api_params,
			)
		);

		return $response;
	}

	/**
	 * Activates the license key.
	 *
	 * @since 1.0.0
	 */
	public function activate_license() {

		$license = trim( get_option( $this->theme_slug . '_license_key' ) );

		// Data to send in our API request.
		$api_params = array(
			'edd_action'  => 'activate_license',
			'license'     => $license,
			'item_name'   => urlencode( $this->item_name ),
			'url'         => home_url(),
			'item_id'     => $this->item_id,
			'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
		);

		$response = $this->get_api_response( $api_params );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = $this->strings['error-generic'];
			}

			$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '-license' );
			$redirect = add_query_arg(
				array(
					'sl_theme_activation' => 'false',
					'message'             => urlencode( $message ),
				),
				$base_url
			);

			wp_redirect( $redirect );
			exit();

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			if ( false === $license_data->success ) {

				switch ( $license_data->error ) {

					case 'expired':
						$message = sprintf(
							$this->strings['license-expired-on'],
							date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
						);
						break;

					case 'disabled':
					case 'revoked':
						$message = $this->strings['license-key-is-disabled'];
						break;

					case 'missing':
						$message = $this->strings['license-key-invalid'];
						break;

					case 'invalid':
					case 'site_inactive':
						$message = $this->strings['site-is-inactive'];
						break;

					case 'item_name_mismatch':
						$message = sprintf( $this->strings['item-mismatch'], $this->item_name );
						break;

					case 'no_activations_left':
						$message = $this->strings['activation-limit'];
						break;

					default:
						$message = $this->strings['error-generic'];
						break;
				}

				if ( ! empty( $message ) ) {
					$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '-license' );
					$redirect = add_query_arg(
						array(
							'sl_theme_activation' => 'false',
							'message'             => urlencode( $message ),
						),
						$base_url
					);

					wp_redirect( $redirect );
					exit();
				}
			}
		}

		// $response->license will be either "active" or "inactive"
		if ( $license_data && isset( $license_data->license ) ) {
			update_option( $this->theme_slug . '_license_key_status', $license_data->license );
			delete_transient( $this->theme_slug . '_license_message' );
		}

		wp_redirect( admin_url( 'themes.php?page=' . $this->theme_slug . '-license' ) );
		exit();

	}

	/**
	 * Deactivates the license key.
	 *
	 * @since 1.0.0
	 */
	public function deactivate_license() {

		// Retrieve the license from the database.
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );

		// Data to send in our API request.
		$api_params = array(
			'edd_action'  => 'deactivate_license',
			'license'     => $license,
			'item_name'   => rawurlencode( $this->item_name ),
			'url'         => home_url(),
			'item_id'     => $this->item_id,
			'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
		);

		$response = $this->get_api_response( $api_params );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = $this->strings['error-generic'];
			}

			$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '-license' );
			$redirect = add_query_arg(
				array(
					'sl_theme_activation' => 'false',
					'message'             => urlencode( $message ),
				),
				$base_url
			);

			wp_redirect( $redirect );
			exit();

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// $license_data->license will be either "deactivated" or "failed"
			if ( $license_data && ( $license_data->license == 'deactivated' ) ) {
				delete_option( $this->theme_slug . '_license_key_status' );
				delete_transient( $this->theme_slug . '_license_message' );
			}
		}

		if ( ! empty( $message ) ) {
			$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '-license' );
			$redirect = add_query_arg(
				array(
					'sl_theme_activation' => 'false',
					'message'             => urlencode( $message ),
				),
				$base_url
			);

			wp_redirect( $redirect );
			exit();
		}

		wp_redirect( admin_url( 'themes.php?page=' . $this->theme_slug . '-license' ) );
		exit();

	}

	/**
	 * Constructs a renewal link
	 *
	 * @since 1.0.0
	 */
	public function get_renewal_link() {

		// If a renewal link was passed in the config, use that
		if ( '' !== $this->renew_url ) {
			return $this->renew_url;
		}

		// If download_id was passed in the config, a renewal link can be constructed
		$license_key = trim( get_option( $this->theme_slug . '_license_key', false ) );
		if ( '' !== $this->download_id && $license_key ) {
			$url  = esc_url( $this->remote_api_url );
			$url .= '/checkout/?edd_license_key=' . urlencode( $license_key ) . '&download_id=' . urlencode( $this->download_id );
			return $url;
		}

		// Otherwise return the remote_api_url
		return $this->remote_api_url;

	}

	/**
	 * Checks if a license action was submitted.
	 *
	 * @since 1.0.0
	 */
	public function license_action() {

		if ( isset( $_POST[ $this->theme_slug . '_license_activate' ] ) ) {
			if ( check_admin_referer( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ) ) {
				$this->activate_license();
			}
		}

		if ( isset( $_POST[ $this->theme_slug . '_license_deactivate' ] ) ) {
			if ( check_admin_referer( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ) ) {
				$this->deactivate_license();
			}
		}
	}

	/**
	 * Checks if license is valid and gets expire date.
	 *
	 * @since 1.0.0
	 *
	 * @return string $message License status message.
	 */
	public function check_license() {

		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$strings = $this->strings;

		$api_params = array(
			'edd_action'  => 'check_license',
			'license'     => $license,
			'item_name'   => rawurlencode( $this->item_name ),
			'url'         => home_url(),
			'item_id'     => $this->item_id,
			'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
		);

		$response = $this->get_api_response( $api_params );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = $strings['license-status-unknown'];
			}

			$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '-license' );
			$redirect = add_query_arg(
				array(
					'sl_theme_activation' => 'false',
					'message'             => urlencode( $message ),
				),
				$base_url
			);

			wp_redirect( $redirect );
			exit();

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// If response doesn't include license data, return
			if ( ! isset( $license_data->license ) ) {
				$message = $strings['license-status-unknown'];
				return $message;
			}

			// We need to update the license status at the same time the message is updated
			if ( $license_data && isset( $license_data->license ) ) {
				update_option( $this->theme_slug . '_license_key_status', $license_data->license );
			}

			// Get expire date
			$expires = false;
			if ( isset( $license_data->expires ) && 'lifetime' != $license_data->expires ) {
				$expires    = date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) );
				$renew_link = '<a href="' . esc_url( $this->get_renewal_link() ) . '" target="_blank">' . $strings['renew'] . '</a>';
			} elseif ( isset( $license_data->expires ) && 'lifetime' == $license_data->expires ) {
				$expires = 'lifetime';
			}

			// Get site counts
			$site_count    = $license_data->site_count;
			$license_limit = $license_data->license_limit;

			// If unlimited
			if ( 0 === $license_limit ) {
				$license_limit = $strings['unlimited'];
			}

			if ( 'valid' === $license_data->license ) {
				$message = $strings['license-key-is-active'] . ' ';
				if ( isset( $expires ) && 'lifetime' != $expires ) {
					$message .= sprintf( $strings['expires%s'], $expires ) . ' ';
				}
				if ( isset( $expires ) && 'lifetime' == $expires ) {
					$message .= $strings['expires-never'];
				}
				if ( $site_count && $license_limit ) {
					$message .= sprintf( $strings['%1$s/%2$-sites'], $site_count, $license_limit );
				}
			} elseif ( 'expired' === $license_data->license ) {
				if ( $expires ) {
					$message = sprintf( $strings['license-key-expired-%s'], $expires );
				} else {
					$message = $strings['license-key-expired'];
				}
				if ( $renew_link ) {
					$message .= ' ' . $renew_link;
				}
			} elseif ( 'invalid' === $license_data->license ) {
				$message = $strings['license-keys-do-not-match'];
			} elseif ( 'inactive' === $license_data->license ) {
				$message = $strings['license-is-inactive'];
			} elseif ( 'disabled' === $license_data->license ) {
				$message = $strings['license-key-is-disabled'];
			} elseif ( 'site_inactive' === $license_data->license ) {
				// Site is inactive
				$message = $strings['site-is-inactive'];
			} else {
				$message = $strings['license-status-unknown'];
			}
		}

		return $message;
	}

	/**
	 * Disable requests to wp.org repository for this theme.
	 *
	 * @since 1.0.0
	 */
	public function disable_wporg_request( $r, $url ) {

		// If it's not a theme update request, bail.
		if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
			return $r;
		}

		// Decode the JSON response
		$themes = json_decode( $r['body']['themes'] );

		// Remove the active parent and child themes from the check
		$parent = get_option( 'template' );
		$child  = get_option( 'stylesheet' );
		unset( $themes->themes->$parent );
		unset( $themes->themes->$child );

		// Encode the updated JSON response
		$r['body']['themes'] = json_encode( $themes );

		return $r;
	}

	function show_activate_msg() {
			
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );

		$page = '';
		
		if ( isset($_GET['page']) ) 
		{
			$page = $_GET['page'];
		}
		
		if( ! $license && $page != 'asap-license' ) { ?>
			
			<div class="update-nag notice-warning notice">
				<p><?php  _e( 'Enter your license key to activate Asap Theme updates.', 'asap' ); ?></p>
				<p><a href="<?php echo admin_url('themes.php?page=' . $this->theme_slug .'-license'); ?>"><?php  _e( 'Complete the installation now', 'asap' ); ?></a></p>
			</div>	
		
		<?php 
		
		} 
	
	}

}

/**
 * This is a means of catching errors from the activation method above and displyaing it to the customer
 */
function edd_sample_theme_admin_notices() {
	if ( isset( $_GET['sl_theme_activation'] ) && ! empty( $_GET['message'] ) ) {

		switch ( $_GET['sl_theme_activation'] ) {

			case 'false':
				$message = urldecode( $_GET['message'] );
				?>
				<div class="error">
					<p><?php echo $message; ?></p>
				</div>
				<?php
				break;

			case 'true':
			default:
				break;

		}
	}
}
add_action( 'admin_notices', 'edd_sample_theme_admin_notices' );
