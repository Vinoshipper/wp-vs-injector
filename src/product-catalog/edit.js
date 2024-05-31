import { InspectorControls } from "@wordpress/block-editor";
import {
	PanelBody,
	ToggleControl,
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
	const { cards, list, available, tooltip, descForce } = attributes;

	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody title="Product Catalog Details">
					<fieldset>
						<NumberControl
							label="List ID"
							help='Display a specific custom Product Catalog. Leave blank for default Product Catalog.'
							value={ list }
							onChange={ (newValue) => {
								setAttributes( { list: newValue } );
							} }
						/>
					</fieldset>
				</PanelBody>
				<PanelBody title="Display">
					<fieldset>
						<ToggleControl
							label="Enable Cards View"
							help={
								cards
									? 'Cards View'
									: 'List View (default)'
							}
							checked={ cards }
							onChange={ (newValue) => {
								setAttributes( { cards: newValue } );
							} }
						/>
						<ToggleControl
							label="Force Description"
							help={
								descForce
									? 'Always show the full description of each product.'
									: 'Allow click to show description on smaller element widths. (default)'
							}
							checked={ descForce }
							onChange={ (newValue) => {
								setAttributes( { descForce: newValue } );
							} }
						/>
					</fieldset>
				</PanelBody>
				<PanelBody title="'Available In' Component" initialOpen={false}>
					<fieldset>
						<ToggleControl
							label="Display Available In"
							help={
								available
									? 'Will display the "Available In" component.'
									: 'Will not display the "Available In" component.'
							}
							checked={ available }
							onChange={ (newValue) => {
								setAttributes( { available: newValue } );
							} }
						/>
						<ToggleControl
							label="Display Available In Tooltips"
							help={
								tooltip
									? 'Display tooltips when hovering over state code.'
									: 'Will not display tooltips when hovering over state code.'
							}
							checked={ tooltip }
							onChange={ (newValue) => {
								setAttributes( { tooltip: newValue } );
							} }
						/>
					</fieldset>
				</PanelBody>
			</InspectorControls>
			<div className="vs-injector-block-editor-content">
				<div className="vs-injector-block-title">
					{ __(
						'Product Catalog',
						'vinoshipper-injector'
					) }
				</div>
				<p>
					Contents will be displayed when viewing this page outside the editor.
				</p>
			</div>
		</div>
	);
}
