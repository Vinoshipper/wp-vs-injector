import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import {
	PanelBody,
	ToggleControl,
	SelectControl,
	TextControl,
} from '@wordpress/components';
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @param {any} root0
 * @param {any} root0.attributes
 * @param {any} root0.setAttributes
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
						<TextControl
							label="List ID"
							type="number"
							help="Display a specific custom Product Catalog. Leave blank for default Product Catalog."
							value={ list }
							onChange={ ( newValue ) => {
								if ( newValue ) {
									setAttributes( {
										list: parseInt( newValue ),
									} );
								} else {
									setAttributes( { list: null } );
								}
							} }
							placeholder="Default Product Catalog"
							min={ 1 }
							step={ 1 }
						/>
						<p>
							To obtain the List ID for custom or brand catalogs,
							visit{ ' ' }
							<a
								href="https://vinoshipper.com/ui/producer/products/catalogs"
								target="_blank"
								rel="noreferrer"
							>
								&quot;Product Catalog -&gt; Types&quot;
							</a>{ ' ' }
							using your Vinoshipper Producer&apos;s Admin access.
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
							] }
							value={ cards }
							help={
								<div>
									See{ ' ' }
									<a
										href="https://developer.vinoshipper.com/docs/injector-product-catalog-layouts"
										target="_blank"
										rel="noreferrer"
									>
										Product Catalog -&gt; Layouts
									</a>{ ' ' }
									for more information.
								</div>
							}
							onChange={ ( newValue ) => {
								setAttributes( { cards: newValue } );
							} }
						/>
						<ToggleControl
							label="Force Description"
							help={
								descForce
									? 'Always show the full description of each product and not render the "Show/Hide Description" actions, regardless of the layout and the width of the element.'
									: 'Render the "Show/Hide Description" actions, except when in list layout and the element is larger than 504px.'
							}
							checked={ descForce }
							onChange={ ( newValue ) => {
								setAttributes( { descForce: newValue } );
							} }
						/>
					</fieldset>
				</PanelBody>
				<PanelBody
					title="'Available In' Component"
					initialOpen={ false }
				>
					<fieldset>
						<p>
							If using the standalone Available In component, turn
							off &quot;Display Available In&quot;.
						</p>
						<ToggleControl
							label="Display Available In"
							help={
								available
									? 'Display the "Available In" component.'
									: 'Do not display the "Available In" component.'
							}
							checked={ available }
							onChange={ ( newValue ) => {
								setAttributes( { available: newValue } );
							} }
						/>
						<ToggleControl
							label="Display Available In Tooltips"
							help={
								tooltip
									? 'Display tooltips when hovering over state code.'
									: 'Do not display tooltips when hovering over state code.'
							}
							disabled={ ! available }
							checked={ tooltip }
							onChange={ ( newValue ) => {
								setAttributes( { tooltip: newValue } );
							} }
						/>
					</fieldset>
				</PanelBody>
			</InspectorControls>
			<div className="vs-injector-block-editor-content">
				{ available && (
					<div className="vs-injector-block-available-in">
						<h2>Available In</h2>
						{ ! tooltip && (
							<ul>
								<li>Will hide Tooltips</li>
							</ul>
						) }
						<p>View page to see the fully rendered component.</p>
					</div>
				) }
				<div className="vs-injector-block-product-catalog">
					<h2>Product List</h2>
					<ul>
						{ list && (
							<li>Product Catalog #{ parseInt( list ) }</li>
						) }
						{ cards && <li>Display in the Cards Layout.</li> }
						{ ! cards && <li>Display in the List Layout.</li> }
					</ul>
					<p>View page to see the fully rendered component.</p>
				</div>
			</div>
		</div>
	);
}
