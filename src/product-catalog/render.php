<?php
/**
 * @package VinoshipperInjector
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$wrapper_pre_attributes = [
	'class' => 'vs-products',
];

if ( isset( $attributes['cards'] ) ) {
	$wrapper_pre_attributes['data-vs-cards'] = boolval( $attributes['cards'] ) ? 'true' : 'false';
}
if ( isset( $attributes['list'] ) ) {
	$wrapper_pre_attributes['data-vs-list'] = (int) $attributes['accountId'];
}
if ( isset( $attributes['available'] ) ) {
	$wrapper_pre_attributes['data-vs-available'] = boolval( $attributes['available'] ) ? 'true' : 'false';
}
if ( isset( $attributes['tooltip'] ) ) {
	$wrapper_pre_attributes['data-vs-tooltips'] = boolval( $attributes['tooltip'] ) ? 'true' : 'false';
}

?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( $wrapper_pre_attributes ) ); ?>></div>
