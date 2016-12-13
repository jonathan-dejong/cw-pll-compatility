<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://github.com/jonathan-dejong
 * @since      1.0.0
 *
 * @package    Cw_Pll_Compatility
 * @subpackage Cw_Pll_Compatility/admin/partials
 */
?>

<div class="form-field">
	<label for="cw_pll_wc_currency"><?php esc_html_e( 'WooCommerce Currency', 'polylang' );?></label>
	<?php if ( $currencies ) : ?>
		<select name="cw_pll_wc_currency" id="cw_pll_wc_currency">
			<?php foreach ( $currencies as $code => $currency ) : ?>
				<option value="<?php echo $code; ?>" <?php if ( $code == $current_lang_currency ) { echo 'selected'; } ?>>
					<?php echo $currency['name'] . ' (' . $currency['description'] . ')'; ?>
				</option>
			<?php endforeach; ?>
		</select>
	<?php else : ?>
		<?php _e( 'There are no currencies set up.', 'cw-pll-compatility' ); ?>
	<?php endif; ?>
	<p><?php esc_html_e( 'Set the WooCommerce currency for the language', 'polylang' );?></p>
</div>
