/**
 * Vinoshipper Injector for WordPress: Available In, Edit
 *
 * @package
 */

import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import './editor.scss';
import vsIcon from '../core/vinoshipper.svg';

export default function Edit( { attributes, setAttributes } ) {
	const { tooltip, shipsTo, otherDelivery, restricted, notShipsTo } =
		attributes;

	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody title="Sections" initialOpen={ true }>
					<fieldset>
						<p>At least one section is required for display.</p>
						<ToggleControl
							label="States Shippable"
							help={
								shipsTo
									? 'Display states that alcoholic products can ship to.'
									: 'Do not display states that alcoholic products can ship to.'
							}
							checked={ shipsTo }
							disabled={
								shipsTo
									? ! otherDelivery &&
										! restricted &&
										! notShipsTo
									: false
							}
							onChange={ ( newValue ) => {
								setAttributes( { shipsTo: newValue } );
							} }
							__nextHasNoMarginBottom={ true }
						/>
						<ToggleControl
							label="Other Delivery Methods"
							help={
								otherDelivery
									? 'Display methods such as "Local Delivery" or "Pick Up" when available.'
									: 'Do not display states that alcoholic products can ship to.'
							}
							checked={ otherDelivery }
							disabled={
								otherDelivery
									? ! shipsTo && ! restricted && ! notShipsTo
									: false
							}
							onChange={ ( newValue ) => {
								setAttributes( { otherDelivery: newValue } );
							} }
							__nextHasNoMarginBottom={ true }
						/>
						<ToggleControl
							label="Restricted States"
							help={
								restricted
									? 'Display states where not all alcoholic products are available to ship.'
									: 'Do not display states where not all alcoholic products are available to ship.'
							}
							checked={ restricted }
							disabled={
								restricted
									? ! shipsTo &&
										! otherDelivery &&
										! notShipsTo
									: false
							}
							onChange={ ( newValue ) => {
								setAttributes( { restricted: newValue } );
							} }
							__nextHasNoMarginBottom={ true }
						/>
						<ToggleControl
							label="States Not Shippable"
							help={
								notShipsTo
									? 'Display states where alcoholic products are not available to ship.'
									: 'Do not display states where alcoholic products are not available to ship.'
							}
							checked={ notShipsTo }
							disabled={
								notShipsTo
									? ! shipsTo &&
										! otherDelivery &&
										! restricted
									: false
							}
							onChange={ ( newValue ) => {
								setAttributes( { notShipsTo: newValue } );
							} }
							__nextHasNoMarginBottom={ true }
						/>
					</fieldset>
				</PanelBody>
				<PanelBody title="Settings" initialOpen={ false }>
					<fieldset>
						<ToggleControl
							label="Display Available In Tooltips"
							help={
								tooltip
									? 'Display tooltips when hovering over state code.'
									: 'Do not display tooltips when hovering over state code.'
							}
							checked={ tooltip }
							onChange={ ( newValue ) => {
								setAttributes( { tooltip: newValue } );
							} }
							__nextHasNoMarginBottom={ true }
						/>
					</fieldset>
				</PanelBody>
			</InspectorControls>
			<div className="vs-injector-block-editor-content">
				<div className="vs-injector-block-available-in">
					<div className="vs-injector-block-header">
						<img
							src={ vsIcon }
							className="vs-icon"
							alt="Vinoshipper"
						/>
						<h2>Available In</h2>
					</div>
					<ul>
						{ shipsTo && (
							<li>Will display states with shipping enabled.</li>
						) }
						{ otherDelivery && (
							<li>Will display other delivery methods.</li>
						) }
						{ restricted && (
							<li>
								Will display states with restricted products.
							</li>
						) }
						{ notShipsTo && (
							<li>
								Will display states where alcoholic products
								will not be shipped.
							</li>
						) }
						{ ! tooltip && <li>Will hide Tooltips</li> }
					</ul>
					<p>View page to see the fully rendered component.</p>
				</div>
			</div>
		</div>
	);
}
