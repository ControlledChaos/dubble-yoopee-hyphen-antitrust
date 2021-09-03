<?php
/**
 * Wp Hyphen Antitrust
 *
 * A plugin compatible with several website systems.
 *
 * @package Wp_Antitrust
 * @version 1.0.0
 * @link    https://github.com/ControlledChaos/wp-antitrust
 *
 * Plugin Name:  Wp Hyphen Antitrust
 * Plugin URI:   https://github.com/ControlledChaos/wp-antitrust
 * Description:  A plugin compatible with several website systems.
 * Version:      1.0.0
 * Author:       Controlled Chaos Design
 * Author URI:   http://ccdzine.com/
 * Text Domain:  wp-antitrust
 * Domain Path:  /languages
 * Requires PHP: 7.4
 */

namespace Wp_Antitrust;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin path.
define( 'HIGH_ROAD', plugin_dir_path( __FILE__ ) );

// Get class files.
foreach ( glob( plugin_dir_path( __FILE__ ) .  'classes/*.php' ) as $filename ) {
	require_once $filename;
}

/**
 * Register the activation & deactivation hooks
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
\register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
\register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );

/**
 * Activation callback
 *
 * The function that runs during plugin activation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function activate_plugin() {

	/**
	 * Deactivate plugins
	 *
	 * If the Hello Dolly plugin is active (ha!) then
	 * deactivate it because the space is needed for
	 * this plugin's messages.
	 */
	$hello = 'hello-dolly/hello.php';
	if ( is_plugin_active( $hello ) ) {

		// Goodbye.
		deactivate_plugins( $hello );
	}
}

/**
 * Deactivation callback
 *
 * The function that runs during plugin deactivation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function deactivate_plugin() {}

/**
 * Check for Wordpress
 *
 * @since  1.0.0
 * @return boolean Returns true if Wordpress could be the system in use.
 */
function is_wp_hyphen() {

	// If ClassicPress, calmPress, or another system are running.
	if (
		function_exists( 'classicpress_version' ) ||
		function_exists( 'calmpress_version' ) ||
		defined( 'APP_INC_PATH' )
	) {
		return false;
	}

	// Presuming that Wordpress is running.
	return true;
}

// Instantiate classes.
if ( is_wp_hyphen() ) {
	new Wp_Antitrust;
}
new ClassicPress;
