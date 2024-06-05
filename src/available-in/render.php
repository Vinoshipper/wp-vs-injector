<?php
/**
 * @package VinoshipperInjector
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$wrapper_pre_attributes = [
	'class' => 'vs-available',
];

if ( isset( $attributes['tooltip'] ) ) {
	$wrapper_pre_attributes['data-vs-tooltips'] = boolval( $attributes['tooltip'] ) ? 'true' : 'false';
}

?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( $wrapper_pre_attributes ) ); ?>></div>
