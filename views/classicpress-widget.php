<?php
/**
 * ClassicPress widget output
 *
 * @package    Wp_Antitrust
 * @subpackage Views
 * @category   Admin
 * @since      1.0.0
 */

namespace Wp_Antitrust;

?>
<div class="wp-antitrust-dashboard-widget">

	<p class="description"><?php _e( 'Consider switching from Wordpress to ClassicPress.', 'wp-antitrust' ); ?></p>

	<h3><?php _e( 'What Is ClassicPress?', 'wp-antitrust' ); ?></h3>
	<p><?php _e( 'ClassicPress is a community-led open source content management system and a fork of Wordpress that preserves the TinyMCE classic editor as the default option.', 'wp-antitrust' ); ?></p>
	<p><?php printf(
		__( 'Read <a href="%s" target="_blank" rel="noopener noreferrer"><em>10 Reasons to Switch to ClassicPress</em></a>.' ),
		esc_url( 'https://www.classicpress.net/reasons-to-switch-to-classicpress-from-wordpress-4-9/' )
	); ?></p>
	<p><a href="https://classicpress.net/" target="_blank" rel="noopener noreferrer">https://classicpress.net/</a></p>

	<h3><?php _e( 'Download ClassicPress Now', 'wp-antitrust' ); ?></h3>
	<p><?php _e( 'ClassicPress makes it easy to convert your Wordpress website to ClassicPress with its migration plugin. Or you can manually install ClassicPress. For local development, ClassicPress is available in the Softaculous app installer.', 'wp-antitrust' ); ?></p>
	<p>
		<a class="button button-primary" href="https://www.classicpress.net/latest-migration-plugin.zip"><?php _e( 'Migration Plugin', 'wp-antitrust' ); ?></a>
		<a class="button button-primary" href="https://www.classicpress.net/latest.zip"><?php _e( 'Full CMS', 'wp-antitrust' ); ?></a>
	</p>
	<p>
		<a class="button button-primary" href="https://directory.classicpress.net/plugins" target="_blank" rel="noopener noreferrer"><?php _e( 'ClassicPress Plugins', 'wp-antitrust' ); ?></a>
	</p>
</div>
