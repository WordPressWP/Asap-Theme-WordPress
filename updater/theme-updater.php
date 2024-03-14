<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( ! class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include dirname( __FILE__ ) . '/theme-updater-admin.php';
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(
	// Config settings
	array(
		'remote_api_url' => 'https://asaptheme.com', 
		'item_name'      => 'AsapTheme', 
		'theme_slug'     => 'asap', 
		'version'        => '3.4.2', 
		'author'         => 'AsapTheme', 
		'download_id'    => '', 
		'renew_url'      => '', 
		'beta'           => false, 
		'item_id'        => '',
	),
	// Strings
	array(
		'theme-license'             => __( 'Asap Theme License', 'asap' ),
		'enter-key'                 => __( 'Enter your license key.', 'asap' ),
		'license-key'               => __( 'Licence key', 'asap' ),
		'license-action'            => __( 'Estado', 'asap' ),
		'deactivate-license'        => __( 'Deactivate license', 'asap' ),
		'activate-license'          => __( 'Activar licencia', 'asap' ),
		'status-unknown'            => __( 'License status is unknown.', 'asap' ),
		'renew'                     => __( 'Renovate?', 'asap' ),
		'unlimited'                 => __( 'unlimited', 'asap' ),
		'license-key-is-active'     => __( 'Clave de licencia activa. ', 'asap' ),
		/* translators: the license expiration date */
		'expires%s'                 => __( 'Expires %s.', 'asap' ),
		'expires-never'             => __( 'Licencia lifetime. ', 'asap' ),
		/* translators: 1. the number of sites activated 2. the total number of activations allowed. */
		'%1$s/%2$-sites'            => __( 'Do you have %1$s / %2$s active sites.', 'asap' ),
		'activation-limit'          => __( 'Your license key has reached its activation limit.', 'asap' ),
		/* translators: the license expiration date */
		'license-key-expired-%s'    => __( 'License key expired %s.', 'asap' ),
		'license-key-expired'       => __( 'License key has expired.', 'asap' ),
		/* translators: the license expiration date */
		'license-expired-on'        => __( 'Your license key expired on %s.', 'asap' ),
		'license-keys-do-not-match' => __( 'Invalid license.', 'asap' ),
		'license-is-inactive'       => __( 'Inactive license.', 'asap' ),
		'license-key-is-disabled'   => __( 'The license key is disabled.', 'asap' ),
		'license-key-invalid'       => __( 'Invalid license.', 'asap' ),
		'site-is-inactive'          => __( 'El sitio está inactivo.', 'asap' ),
		/* translators: the theme name */
		'item-mismatch'             => __( 'Parece ser una licencia inválida para %s.', 'asap' ),
		'license-status-unknown'    => __( 'Unknown license status.', 'asap' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'asap' ),
		'error-generic'             => __( 'An error occurred, please try again.', 'asap' ),
	)
);
