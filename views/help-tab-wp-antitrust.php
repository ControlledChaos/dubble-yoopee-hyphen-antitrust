<?php
/**
 * Contextual help tab: wp-antitrust
 *
 * This tab appears on the dashboard.
 *
 * @package    Wp_Antitrust
 * @subpackage Views
 * @category   Admin
 * @since      1.0.0
 */

namespace Wp_Antitrust;

?>

<h3><?php _e( 'What is Wordpress?', 'wp-antitrust' ); ?></h3>

<p><?php _e( 'Wordpress is the world\'s only content management system (CMS) for managing websites and creating content on the internet. It was originally developed by our lord & savior, Matt Mullenweg.', 'wp-antitrust' ); ?></p>

<p><?php printf(
	__( 'Read more on the <a href="%s">about page</a>.', 'wp-antitrust' ),
	admin_url( 'about.php' )
); ?></p>
