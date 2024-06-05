<?php
/**
 * @package VinoshipperInjector
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$wrapper_pre_attributes = [
	'class'              => 'vs-product-item',
	'data-vs-product-id' => isset( $attributes['productId'] ) ? $attributes['productId'] : null,
];

if ( isset( $attributes['accountId'] ) ) {
	$wrapper_pre_attributes['data-vs-account-id'] = $attributes['accountId'];
}
if ( isset( $attributes['cards'] ) ) {
	$wrapper_pre_attributes['data-vs-cards'] = boolval( $attributes['cards'] ) ? 'true' : 'false';
}
if ( isset( $attributes['image'] ) ) {
	$wrapper_pre_attributes['data-vs-product-image'] = boolval( $attributes['image'] ) ? 'true' : 'false';
}
if ( isset( $attributes['descForce'] ) ) {
	$wrapper_pre_attributes['data-vs-desc-force'] = boolval( $attributes['descForce'] ) ? 'true' : 'false';
}

?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( $wrapper_pre_attributes ) ); ?>></div>
