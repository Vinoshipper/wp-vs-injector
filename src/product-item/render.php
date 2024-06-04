<?php
/**
 * @package VinoshipperInjector
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

?>
<div <?php echo esc_html( get_block_wrapper_attributes() ); ?>>
	<div
		class="vs-product-item"
		<?php
		if ( isset( $attributes['productId'] ) ) {
			echo 'data-vs-product-id="' . esc_attr( $attributes['productId'] ) . '"';
		}
		if ( isset( $attributes['accountId'] ) ) {
			echo 'data-vs-account-id="' . esc_attr( $attributes['accountId'] ) . '"';
		}
		if ( isset( $attributes['cards'] ) ) {
			$outputList = boolval( $attributes['cards'] ) ? 'true' : 'false';
			echo 'data-vs-cards="' . esc_attr( $outputList ) . '"';
		}
		if ( isset( $attributes['image'] ) ) {
			$outputList = boolval( $attributes['image'] ) ? 'true' : 'false';
			echo 'data-vs-product-image="' . esc_attr( $outputList ) . '"';
		}
		if ( isset( $attributes['descForce'] ) ) {
			$outputList = boolval( $attributes['descForce'] ) ? 'true' : 'false';
			echo 'data-vs-desc-force="' . esc_attr( $outputList ) . '"';
		}
		?>
	/>
</div>
