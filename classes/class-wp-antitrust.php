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

		// Admin notice.
		add_action( 'admin_notices', [ $this, 'goodbye_dolly' ] );

		// Print styles.
		add_action( 'admin_head', [ $this, 'dolly_would' ] );

		// Remove the Draconian capital P filters.
		remove_filter( 'the_title', 'capital_P_dangit', 11 );
		remove_filter( 'the_content', 'capital_P_dangit', 11 );
		remove_filter( 'comment_text', 'capital_P_dangit', 31 );
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
			__( '"The power of the web is not in centralization…" —Matt Mullenweg' )
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
	 * Print styles
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
}
