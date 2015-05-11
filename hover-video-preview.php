<?php

/**
 * @link              http://hvp4wp.com
 * @since             1.0.0
 * @package           Hover_Video_Preview
 *
 * @wordpress-plugin
 * Plugin Name:       Hover Video Preview
 * Plugin URI:        http://hvp4wp.com
 * Description:       Provides a shortcode that displays an auto-playing YouTube video in a tooltip when a user hovers over any element.
 * Version:           1.0.2
 * Author:            Jason Pancake
 * Author URI:        http://jasonpancake.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hvp4wp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hover-video-preview-activator.php
 */
function activate_video_hover_preview() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hover-video-preview-activator.php';
	Hover_Video_Preview_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hover-video-preview-deactivator.php
 */
function deactivate_video_hover_preview() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hover-video-preview-deactivator.php';
	Hover_Video_Preview_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_video_hover_preview' );
register_deactivation_hook( __FILE__, 'deactivate_video_hover_preview' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hover-video-preview.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_video_hover_preview() {

	$plugin = new Hover_Video_Preview();
	$plugin->run();

}
run_video_hover_preview();
