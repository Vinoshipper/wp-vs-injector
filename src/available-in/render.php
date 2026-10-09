<?php
/**
 * Vinoshipper Injector: Available In, Client Render
 *
 * @package VinoshipperInjector
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$vs_injector_wrapper_pre_attributes = array(
	'class' => 'vs-available',
);

if ( isset( $attributes['tooltip'] ) ) {
	$vs_injector_wrapper_pre_attributes['data-vs-tooltips'] = boolval( $attributes['tooltip'] ) ? 'true' : 'false';
}

if ( isset( $attributes['shipsTo'] ) ) {
	$vs_injector_wrapper_pre_attributes['data-vs-ships-to'] = boolval( $attributes['shipsTo'] ) ? 'true' : 'false';
}

if ( isset( $attributes['otherDelivery'] ) ) {
	$vs_injector_wrapper_pre_attributes['data-vs-other-delivery'] = boolval( $attributes['otherDelivery'] ) ? 'true' : 'false';
}

if ( isset( $attributes['restricted'] ) ) {
	$vs_injector_wrapper_pre_attributes['data-vs-restricted'] = boolval( $attributes['restricted'] ) ? 'true' : 'false';
}

if ( isset( $attributes['notShipsTo'] ) ) {
	$vs_injector_wrapper_pre_attributes['data-vs-not-ships-to'] = boolval( $attributes['notShipsTo'] ) ? 'true' : 'false';
}

?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( $vs_injector_wrapper_pre_attributes ) ); ?>></div>
