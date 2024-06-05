<?php
/**
 * @package VinoshipperInjector
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$wrapper_pre_attributes = [
	'class'              => 'vs-add-to-cart',
	'data-vs-product-id' => isset( $attributes['productId'] ) ? $attributes['productId'] : null,
];

if ( isset( $attributes['accountId'] ) ) {
	$wrapper_pre_attributes['data-vs-account-id'] = $attributes['accountId'];
}
if ( isset( $attributes['includeQty'] ) ) {
	$wrapper_pre_attributes['data-vs-include-qty'] = $attributes['includeQty'];
}
if ( isset( $attributes['productUnits'] ) ) {
	$wrapper_pre_attributes['data-vs-product-units'] = $attributes['productUnits'];
}

?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( $wrapper_pre_attributes ) ); ?>></div>
