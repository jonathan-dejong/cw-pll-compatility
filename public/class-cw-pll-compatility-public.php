<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://github.com/jonathan-dejong
 * @since      1.0.0
 *
 * @package    Cw_Pll_Compatility
 * @subpackage Cw_Pll_Compatility/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cw_Pll_Compatility
 * @subpackage Cw_Pll_Compatility/public
 * @author     Jonathan de Jong <jonathan@tigerton.se>
 */
class Cw_Pll_Compatility_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


	/**
	 * Changes currency according to the currency set for the chosen langauge.
	 * This runs on a Polylang filter which is actually made for modifying polylang language cookie.
	 * The reason is because it's the only hook I found that only fires when actually switching languages.
	 *
	 * @param  integer $time seconds the cookie should be valid.
	 */
	public function switch_currency( $time ) {

		/**
		 * Don't mess with admin.
		 */
		if ( is_admin() ) {
			return $time;
		}

		/**
		 * Make sure both polylang and currency switcher are there.
		 */
		if ( function_exists( 'pll_current_language' ) && array_key_exists( 'WOOCS', $GLOBALS ) ) {
			/**
			 * Fetch the selected currency for this language.
			 */
			$current_lang = pll_current_language();
			$lang_currency = get_option( "cw_pll_{$current_lang}_currency", '' );
			/**
			 * If there are one set, let's set it for currency Switcher.
			 */
			if ( $lang_currency ) {
				global $WOOCS;
				$WOOCS->set_currency( $lang_currency );
			}
		}

		return $time;

	}

}
