<?php
/**
 * @package VinoshipperInjector
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$wrapper_pre_attributes = [
	'class' => 'vs-club-registration',
];

if ( ! boolval( $attributes['clubsDisplayAll'] ) && isset( $attributes['allow'] ) ) {
	$wrapper_pre_attributes['data-vs-club-allow'] = implode( ',', $attributes['allow'] );
}
if ( isset( $attributes['defaultClub'] ) ) {
	$wrapper_pre_attributes['data-vs-club-default'] = (int) $attributes['defaultClub'];
}
if ( isset( $attributes['headline'] ) ) {
	$wrapper_pre_attributes['data-vs-club-headline'] = $attributes['headline'];
}

?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( $wrapper_pre_attributes ) ); ?>></div>
