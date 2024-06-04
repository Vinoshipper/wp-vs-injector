import { InspectorControls } from "@wordpress/block-editor";
import {
	PanelBody,
	ToggleControl,
	SelectControl,
	__experimentalNumberControl as NumberControl
} from "@wordpress/components";

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { productId, accountId, cards, image, descForce } = attributes;

	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody title="Settings">
					<fieldset>
						<NumberControl
							label="Product ID"
							help='Display a specific product.'
							required={ true }
							value={ productId }
							onChange={ (newValue) => {
								if (newValue) {
									setAttributes( { productId: parseInt(newValue) } );
								} else {
									setAttributes( { productId: null } );
								}
							} }
							min={0}
							step={1}
						/>
						<p>
							Products Desc.
						</p>
					</fieldset>
				</PanelBody>
				<PanelBody title="Display">
					<fieldset>
						<SelectControl
							label="Catalog Layout"
							options={ [
								{ label: 'List', value: false },
								{ label: 'Cards', value: true },
							]}
							value={ cards }
							help={
								<div>
									See <a href="https://developer.vinoshipper.com/docs/injector-product-catalog-layouts" target="_blank">Product Catalog -&gt; Layouts</a> for more information.
								</div>
							}
							onChange={ (newValue) => {
								setAttributes( { cards: newValue } );
							} }
						/>
						<ToggleControl
							label="Display Product Image"
							help={
								image
									? 'Display the Product\s image.'
									: 'Do not display the Product\s image.'
							}
							checked={ image }
							onChange={ (newValue) => {
								setAttributes( { image: newValue } );
							} }
						/>
						<ToggleControl
							label="Force Description"
							help={
								descForce
									? 'Always show the full description of product and not render the "Show/Hide Description" actions, regardless of the layout and the width of the element.'
									: 'Render "Show/Hide Description", except when in list layout and the element is larger than 504px.'
							}
							checked={ descForce }
							onChange={ (newValue) => {
								setAttributes( { descForce: newValue } );
							} }
						/>
					</fieldset>
				</PanelBody>
			</InspectorControls>
			<div className="vs-injector-block-editor-content">
				<div className="vs-injector-block-product-item">
					<h2>Product Item</h2>
					<ul>
						{ productId &&
							<li>Product ID: { productId }</li>
						}
						{ cards &&
							<li>Display in the Cards Layout.</li>
						}
						{ !cards &&
							<li>Display in the List Layout.</li>
						}
						{ !image &&
							<li>Will not display the product image.</li>
						}
						{ descForce &&
							<li>Always show full description.</li>
						}
					</ul>
					<p>View page to see the fully rendered component.</p>
				</div>
			</div>
		</div>
	);
}
