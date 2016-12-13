<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://github.com/jonathan-dejong
 * @since      1.0.0
 *
 * @package    Cw_Pll_Compatility
 * @subpackage Cw_Pll_Compatility/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Cw_Pll_Compatility
 * @subpackage Cw_Pll_Compatility/includes
 * @author     Jonathan de Jong <jonathan@tigerton.se>
 */
class Cw_Pll_Compatility_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cw-pll-compatility',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
