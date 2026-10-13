import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import {
	PanelBody,
	PanelRow,
	ToggleControl,
	SelectControl,
	TextControl,
} from '@wordpress/components';
import './editor.scss';
import vsIcon from '../core/vinoshipper.svg';

export default function Edit( { attributes, setAttributes } ) {
	const {
		cards,
		list,
		available,
		availableShipsTo,
		availableOtherDelivery,
		availableRestricted,
		availableNotShipsTo,
		announcement,
		tooltip,
		descForce,
	} = attributes;

	function getAvailableInSectionSelectionStatus( requester ) {
		if ( available ) {
			if ( requester === 'availableShipsTo' ) {
				return availableShipsTo
					? ! availableOtherDelivery &&
							! availableRestricted &&
							! availableNotShipsTo
					: false;
			} else if ( requester === 'availableOtherDelivery' ) {
				return availableOtherDelivery
					? ! availableShipsTo &&
							! availableRestricted &&
							! availableNotShipsTo
					: false;
			} else if ( requester === 'availableRestricted' ) {
				return availableRestricted
					? ! availableShipsTo &&
							! availableOtherDelivery &&
							! availableNotShipsTo
					: false;
			} else if ( requester === 'availableNotShipsTo' ) {
				return availableNotShipsTo
					? ! availableShipsTo &&
							! availableOtherDelivery &&
							! availableRestricted
					: false;
			}
			return false;
		}
		return true;
	}

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
							__nextHasNoMarginBottom={ true }
							__next40pxDefaultSize={ true }
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
								{ label: 'List', value: 'list' },
								{ label: 'Cards', value: 'cards' },
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
							__nextHasNoMarginBottom={ true }
							__next40pxDefaultSize={ true }
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
							__nextHasNoMarginBottom={ true }
						/>
					</fieldset>
				</PanelBody>
				<PanelBody
					title="'Announcement' Component"
					initialOpen={ false }
				>
					<fieldset>
						<PanelRow>
							<p>
								If using the standalone Announcement component,
								turn off &quot;Display Announcement&quot;.
							</p>
						</PanelRow>
						<ToggleControl
							label="Display Announcement"
							help={
								announcement
									? 'Display the "Announcement" component.'
									: 'Do not display the "Announcement" component.'
							}
							checked={ announcement }
							onChange={ ( newValue ) => {
								setAttributes( { announcement: newValue } );
							} }
							__nextHasNoMarginBottom={ true }
						/>
						<p>
							When enabled, Announcement will render only when the
							defined in{ ' ' }
							<a
								href="https://vinoshipper.com/ui/producer/products/announcement"
								target="_blank"
								rel="noreferrer"
							>
								Products -&gt; Announcement
							</a>{ ' ' }
							using your Vinoshipper Producer&apos;s Admin access.
						</p>
					</fieldset>
				</PanelBody>
				<PanelBody
					title="'Available In' Component"
					initialOpen={ false }
				>
					<PanelRow>
						<p>
							If using the standalone Available In component, off
							&quot;Display Available In&quot;.
						</p>
					</PanelRow>
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
						__nextHasNoMarginBottom={ true }
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
					<PanelRow>
						<p>At least one section is required for display.</p>
					</PanelRow>
					<ToggleControl
						label="States Shippable"
						help={
							availableShipsTo
								? 'Display states that alcoholic products can ship to.'
								: 'Do not display states that alcoholic products can ship to.'
						}
						checked={ availableShipsTo }
						disabled={ getAvailableInSectionSelectionStatus(
							'availableShipsTo'
						) }
						onChange={ ( newValue ) => {
							setAttributes( { availableShipsTo: newValue } );
						} }
						__nextHasNoMarginBottom={ true }
					/>
					<ToggleControl
						label="Other Delivery Methods"
						help={
							availableOtherDelivery
								? 'Display methods such as "Local Delivery" or "Pick Up" when available.'
								: 'Do not display states that alcoholic products can ship to.'
						}
						checked={ availableOtherDelivery }
						disabled={ getAvailableInSectionSelectionStatus(
							'availableOtherDelivery'
						) }
						onChange={ ( newValue ) => {
							setAttributes( {
								availableOtherDelivery: newValue,
							} );
						} }
						__nextHasNoMarginBottom={ true }
					/>
					<ToggleControl
						label="Restricted States"
						help={
							availableRestricted
								? 'Display states where not all alcoholic products are available to ship.'
								: 'Do not display states where not all alcoholic products are available to ship.'
						}
						checked={ availableRestricted }
						disabled={ getAvailableInSectionSelectionStatus(
							'availableRestricted'
						) }
						onChange={ ( newValue ) => {
							setAttributes( { availableRestricted: newValue } );
						} }
						__nextHasNoMarginBottom={ true }
					/>
					<ToggleControl
						label="States Not Shippable"
						help={
							availableNotShipsTo
								? 'Display states where alcoholic products are not available to ship.'
								: 'Do not display states where alcoholic products are not available to ship.'
						}
						checked={ availableNotShipsTo }
						disabled={ getAvailableInSectionSelectionStatus(
							'availableNotShipsTo'
						) }
						onChange={ ( newValue ) => {
							setAttributes( { availableNotShipsTo: newValue } );
						} }
						__nextHasNoMarginBottom={ true }
					/>
				</PanelBody>
			</InspectorControls>
			<div className="vs-injector-block-editor-content">
				{ announcement && (
					<div className="vs-injector-block-announcement">
						<div className="vs-injector-block-header">
							<img
								src={ vsIcon }
								className="vs-icon"
								alt="Vinoshipper"
							/>
							<h2>Announcement</h2>
						</div>
						<p>
							Will render <em>only</em> when defined in the
							Vinoshipper Producer Admin. View page to see the
							fully rendered component.
						</p>
					</div>
				) }
				{ available && (
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
							{ availableShipsTo && (
								<li>
									Will display states with shipping enabled.
								</li>
							) }
							{ availableOtherDelivery && (
								<li>Will display other delivery methods.</li>
							) }
							{ availableRestricted && (
								<li>
									Will display states with restricted
									products.
								</li>
							) }
							{ availableNotShipsTo && (
								<li>
									Will display states where alcoholic products
									will not be shipped.
								</li>
							) }
							{ ! tooltip && <li>Will hide Tooltips</li> }
						</ul>
						<p>View page to see the fully rendered component.</p>
					</div>
				) }
				<div className="vs-injector-block-product-catalog">
					<div className="vs-injector-block-header">
						<img
							src={ vsIcon }
							className="vs-icon"
							alt="Vinoshipper"
						/>
						<h2>Product List</h2>
					</div>
					<ul>
						{ list && (
							<li>Product Catalog #{ parseInt( list ) }</li>
						) }
						{ cards === 'cards' && (
							<li>Display in the Cards Layout.</li>
						) }
						{ cards === 'list' && (
							<li>Display in the List Layout.</li>
						) }
					</ul>
					<p>View page to see the fully rendered component.</p>
				</div>
			</div>
		</div>
	);
}
