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

// Get class files.
foreach ( glob( plugin_dir_path( __FILE__ ) .  'classes/*.php' ) as $filename ) {
	require_once $filename;
}

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
