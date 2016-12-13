<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://github.com/jonathan-dejong
 * @since      1.0.0
 *
 * @package    Cw_Pll_Compatility
 * @subpackage Cw_Pll_Compatility/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cw_Pll_Compatility
 * @subpackage Cw_Pll_Compatility/admin
 * @author     Jonathan de Jong <jonathan@tigerton.se>
 */
class Cw_Pll_Compatility_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Edit form
	 *
	 * @param PLL_Language $lang
	 */
	public function cw_pll_add_form( $lang = null ) {
		global $WOOCS;
		$currencies = $WOOCS->get_currencies();
		$current_lang_currency = get_option( "cw_pll_{$lang->slug}_currency", '' );
		include plugin_dir_path( __FILE__ ) . '/partials/cw-pll-compatility-admin-display.php';
	}


	/**
	 * Saves data from form
	 */
	public function cw_pll_save_form() {
	    //Check if action set
	    $action = isset( $_POST['pll_action'] ) ? $_POST['pll_action'] : '';

	    if ( 'update' === $action && ! empty( $_POST['slug'] ) ) {
	        $lang = $_POST['slug'];
	        $currency = isset( $_POST['cw_pll_wc_currency'] ) ? $_POST['cw_pll_wc_currency'] : '';
	        $lang_slugs = array();
	        foreach ( PLL()->model->get_languages_list() as $single_lang ) {
	            $lang_slugs[] = $single_lang->slug;
	        }
	        //Language valid
	        if ( in_array( $lang, $lang_slugs ) ) {
	            update_option( "cw_pll_{$lang}_currency", $currency );
	        }
	    }
	}

}
