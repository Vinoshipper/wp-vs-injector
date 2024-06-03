import { InspectorControls } from "@wordpress/block-editor";
import {
	PanelBody,
	ToggleControl,
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
	const { tooltip } = attributes;

	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody title="Settings" initialOpen={false}>
					<fieldset>
						<ToggleControl
							label="Display Available In Tooltips"
							help={
								tooltip
									? 'Display tooltips when hovering over state code.'
									: 'Do not display tooltips when hovering over state code.'
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
				<div className="vs-injector-block-available-in">
					<h2>Available In</h2>
					{ !tooltip &&
						<ul>
							<li>Will hide Tooltips</li>
						</ul>
					}
					<p>View page to see the fully rendered component.</p>
				</div>
			</div>
		</div>
	);
}
