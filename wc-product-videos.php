<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.glenscott.co.uk/
 * @since             1.0.0
 * @package           woocommerce_product_videos
 *
 * @wordpress-plugin
 * Plugin Name:       WC Product Videos
 * Description:       Use a video rather than a photo on product pages
 * Version:           1.0.0
 * Author:            Glen Scott
 * Author URI:        https://www.glenscott.co.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woocommerce-product-videos
 * Domain Path:       /languages
 * WC requires at least: 2.2
 * WC tested up to: 	 3.6.4
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'woocommerce_product_videos_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woocommerce-product-videos-activator.php
 */
function activate_woocommerce_product_videos() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-product-videos-activator.php';
	woocommerce_product_videos_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woocommerce-product-videos-deactivator.php
 */
function deactivate_woocommerce_product_videos() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-product-videos-deactivator.php';
	woocommerce_product_videos_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woocommerce_product_videos' );
register_deactivation_hook( __FILE__, 'deactivate_woocommerce_product_videos' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-product-videos.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woocommerce_product_videos() {

	$plugin = new woocommerce_product_videos();
	$plugin->run();

}
run_woocommerce_product_videos();
