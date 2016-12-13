<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://github.com/jonathan-dejong
 * @since             1.0.0
 * @package           Cw_Pll_Compatility
 *
 * @wordpress-plugin
 * Plugin Name:       Currency switcher Polylang compatibility
 * Plugin URI:        http://github.com/jonathan-dejong/cw-pll-compatibility
 * Description:       Adds ability to link a currency from the WooCommerce Currency Switcher plugin with a language in Polylang.
 * Version:           1.0.0
 * Author:            Jonathan de Jong
 * Author URI:        http://github.com/jonathan-dejong
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cw-pll-compatility
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cw-pll-compatility-activator.php
 */
function activate_cw_pll_compatility() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cw-pll-compatility-activator.php';
	Cw_Pll_Compatility_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cw-pll-compatility-deactivator.php
 */
function deactivate_cw_pll_compatility() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cw-pll-compatility-deactivator.php';
	Cw_Pll_Compatility_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cw_pll_compatility' );
register_deactivation_hook( __FILE__, 'deactivate_cw_pll_compatility' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cw-pll-compatility.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cw_pll_compatility() {

	$plugin = new Cw_Pll_Compatility();
	$plugin->run();

}
run_cw_pll_compatility();
