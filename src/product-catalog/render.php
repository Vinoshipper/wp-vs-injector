<?php
/**
 * @package VinoshipperInjector
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

?>
<div <?php echo esc_html( get_block_wrapper_attributes() ); ?>>
	<div
		class="vs-products"
		<?php
		if ( $attributes['cards'] ) {
			echo 'data-vs-cards="true"';
		}
		if ( isset( $attributes['list'] ) ) {
			$outputList = (int) $attributes['list'];
			echo 'data-vs-list="' . esc_attr( $outputList ) . '"';
		}
		if ( isset( $attributes['available'] ) ) {
			$outputList = boolval( $attributes['available'] ) ? 'true' : 'false';
			echo 'data-vs-available="' . esc_attr( $outputList ) . '"';
		}
		if ( isset( $attributes['tooltip'] ) ) {
			$outputList = boolval( $attributes['tooltip'] ) ? 'true' : 'false';
			echo 'data-vs-tooltip="' . esc_attr( $outputList ) . '"';
		}
		?>
	/>
</div>
