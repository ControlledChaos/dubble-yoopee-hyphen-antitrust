<?php
/**
 * Wp Antitrust class
 *
 * @package    Wp_Antitrust
 * @subpackage Classes
 * @category   General
 * @since      1.0.0
 */

namespace Wp_Antitrust;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Wp_Antitrust {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Print styles.
		add_action( 'admin_print_styles-index.php', [ $this, 'dolly_would' ] );
		add_action( 'admin_print_styles-index.php', [ $this, 'welcome_styles' ] );

		// Admin notice.
		add_action( 'admin_notices', [ $this, 'goodbye_dolly' ] );

		// Remove dashboard widgets.
		add_action( 'wp_dashboard_setup', [ $this, 'remove_widgets' ] );

		// Primary footer text.
		add_filter( 'admin_footer_text', [ $this, 'admin_footer_primary' ], 1 );

		// Secondary footer text.
		add_filter( 'update_footer', [ $this, 'admin_footer_secondary' ], 1 );

		// Print welcome panel scripts.
		add_action( 'admin_print_footer_scripts-index.php', [ $this, 'welcome_scripts' ] );

		// Remove the Draconian capital P filters.
		remove_filter( 'the_title', 'capital_P_dangit', 11 );
		remove_filter( 'the_content', 'capital_P_dangit', 11 );
		remove_filter( 'comment_text', 'capital_P_dangit', 31 );

		// Format Wordpress & WordPress.
		$format = [
			'the_content',
			'the_title',
			'wp_title',
			'document_title',
			'widget_display_callback',
			'widget_text_content',
			'comment_text'
		];
		foreach ( $format as $filter ) {
			add_filter( $filter, [ $this, 'capital_ISM_dangit' ], 31 );
		}
	}

	/**
	 * Print admin notice styles
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns a style block.
	 */
	public function dolly_would() {

		echo '
		<style>
		#goodbye-dolly {
			float: right;
			margin: 0;
			font-size: 1rem;
			line-height: 1.7;
		}

		.rtl #goodbye-dolly {
			float: left;
		}

		.block-editor-page #goodbye-dolly {
			display: none;
		}

		#goodbye-dolly .dashicons-warning {
			color: #d00;
			vertical-align: text-bottom;
		}

		#goodbye-dolly .dashicons-warning:before {
			font-size: 1.25rem;
		}

		@media screen and ( max-width: 782px ) {
			#goodbye-dolly,
			.rtl #dolly {
				float: none;
				padding-left: 0;
				padding-right: 0;
			}
		}
		</style>
		';
	}

	/**
	 * Print welcome panel styles
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns a style block.
	 */
	public function welcome_styles() {

		$styles  = '<style>';
		$styles .= '.js .welcome-panel-content h2 { display: none }';
		$styles .= '</style>';

		echo $styles;
	}

	/**
	 * Admin notice
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the markup and text of the notice.
	 */
	public function goodbye_dolly() {
		echo $this->megalomattic();
	}

	/**
	 * Admin notice output
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function megalomattic() {

		// Array of output strings.
		$messages = [
			__( 'Warning! Your website is in the grips of a megalomattic corporation.', 'wp-antitrust' ),
			__( 'When publishing is democratized the majority lords over your publishing.', 'wp-antitrust' ),
			__( '"The power of the web is not in centralization…" —Matt Mullenweg', 'wp-antitrust' )
		];

		// Shuffle the order of the merged array.
		$random = shuffle( $messages );

		// Count the number of keys in the array.
		$count = count( $messages );

		// If there is only one key, return that key.
		if ( ! empty( $random ) && 1 == $count ) {
			$message = $messages[0];

		// If there are more than one key, return a random key.
		} elseif ( is_array( $messages ) && ! empty( $messages ) && ! empty( $random ) ) {
			$message = $messages[ $random ];

		// Otherwise return a fallback message.
		} else {
			$message = __( 'Warning! Your website is in the grips of a megalomattic corporation.', 'wp-antitrust' );
		}

		return apply_filters( 'wp_antitrust', sprintf(
			'<p id="goodbye-dolly"><span class="dashicons dashicons-warning"></span> %s</p>',
			esc_html( $message )
		) );
	}

	/**
	 * Remove widgets
	 *
	 * @since  1.0.0
	 * @access public
	 * @global array wp_meta_boxes The metaboxes array holds all the widgets for wp-admin.
	 * @return void
	 */
	public function remove_widgets() {

		global $wp_meta_boxes;

		// Remove WordPress news.
		unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
	}

	/**
	 * Admin footer primary
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the text of the footer.
	 */
	public function admin_footer_primary() {

		printf(
			'<span class="dashicons dashicons-flag" style="color: #ee6600"></span> %s',
			__( 'You should consider alternatives to the monopolistic Wordpress.', 'wp-antitrust' )
		);
	}

	/**
	 * Admin footer secondary
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the text of the footer.
	 */
	public function admin_footer_secondary() {

		remove_filter( 'update_footer', 'core_update_footer' );

		printf(
			__( '<span class="dashicons dashicons-info" style="color: #4b9960"></span> Check out <a href="%s" target="_blank" rel="noopener noreferrer">ClassicPress</a> and <a href="%s" target="_blank" rel="noopener noreferrer">calmPress</a>', 'wp-antitrust' ),
			esc_url( 'https://www.classicpress.net/' ),
			esc_url( 'https://calmpress.org/' )
		);
	}

	/**
	 * Print welcome panel scripts
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the replacement text.
	 */
	public function welcome_scripts() {

		$script  = '<script>';
		$script .= "
		jQuery(document).ready( function ($) {
			$( '.welcome-panel-content h2' ).show().text( 'Welcome to Automattic!' );
		});
		";
		$script .= '</script>';

		echo $script;
	}

	/**
	 * Format Wordpress & WordPress
	 *
	 * Forever eliminate "Wordpress" from the planet (or at least the little bit we can influence).
	 *
	 * Nothing against capitalism, just putting things in the correct light.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $text The text to be modified.
	 * @return string The modified text.
	 */
	public function capital_ISM_dangit( $text ) {

		// Jealously guard the prefix.
		static $copy = false;
		if ( false === $copy ) {
			$copy = _x( '&copy;-', 'copyright symbol and hyphen' );
		}

		// Replacement arrays.
		$dubble_yoopee = [ 'Wordpress', 'WordPress', 'wordpress', 'wp-', 'WP-' ];
		$autocratic    = [ 'Automattic', 'Automattic', 'Automattic', $copy, $copy ];

		// Return filtered text.
		return str_replace( $dubble_yoopee, $autocratic, $text );
	}
}
