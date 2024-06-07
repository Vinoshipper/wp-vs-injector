<?php
/**
 * Vinoshipper Injector: Add To Cart, Client Render
 *
 * @package VinoshipperInjector
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$vs_injector_wrapper_pre_attributes = array(
	'class'              => 'vs-add-to-cart',
	'data-vs-product-id' => isset( $attributes['productId'] ) ? $attributes['productId'] : null,
);

if ( isset( $attributes['accountId'] ) ) {
	$vs_injector_wrapper_pre_attributes['data-vs-account-id'] = $attributes['accountId'];
}
if ( isset( $attributes['includeQty'] ) ) {
	$vs_injector_wrapper_pre_attributes['data-vs-include-qty'] = $attributes['includeQty'];
}
if ( isset( $attributes['productUnits'] ) ) {
	$vs_injector_wrapper_pre_attributes['data-vs-product-units'] = $attributes['productUnits'];
}

?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( $vs_injector_wrapper_pre_attributes ) ); ?>></div>