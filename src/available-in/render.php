<?php
/**
 * @package VinoshipperInjector
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

?>
<div <?php echo esc_html( get_block_wrapper_attributes() ); ?>>
	<div
		class="vs-available"
		<?php
		if ( isset( $attributes['tooltip'] ) ) {
			$outputList = boolval( $attributes['tooltip'] ) ? 'true' : 'false';
			echo 'data-vs-tooltip="' . esc_attr( $outputList ) . '"';
		}
		?>
	/>
</div>
